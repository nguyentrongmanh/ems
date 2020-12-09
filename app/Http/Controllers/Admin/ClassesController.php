<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\Enums\FileUploadPath;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassFormRequest;
use App\User;
use App\Major;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware('auth');
		$this->middleware(function ($request, $next) {
			$userRole = Auth::user()->role;
			if ($userRole != UserRole::ADMIN) {
				return redirect()->route("home");
			}
			return $next($request);
		});
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $queryParams = $request->query();
        $limit = $queryParams["limit"] ?? 10;
        $search = $queryParams["search"] ?? "";

        $classes = Classes::where("name", "like", "%$search%")
            ->paginate($limit);
        return view('admin.classes.index', [
            "classes" => $classes,
            "limit" => $limit,
        ]);
    }

    public function getAdd()
    {
        $class = new Classes;
        $teachers = User::where('role', UserRole::ADMIN)->get();
        $majors = Major::get();

        return view('admin.classes.add', [
            'teachers' => $teachers,
            'classes' => $class,
            'majors' => $majors,
        ]);
    }

    public function add(ClassFormRequest $request)
    {
        $data = $request->all();
        $data['teacher_id'] = (int) $data['teacher_id'];
        $data['major_id'] = (int) $data['major_id'];
        unset($data['_token']);
        try {
            $class = Classes::create($data);
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('index-classes')->with('error', __('error'));
        }
        return redirect()->route('index-classes')->with('success', __('success'));
    }

    public function getEdit($id)
    {
        $classDetail = Classes::find($id);
        $teachers = User::where('role', UserRole::ADMIN)->get();
        $majors = Major::get();


        return view('admin.classes.edit', [
            'teachers' => $teachers,
            'class' => $classDetail,
            'majors' => $majors,
        ]);
    }

    public function edit(ClassFormRequest $request, $id)
    {
        $data = $request->all();
        $data['teacher_id'] = (int) $data['teacher_id'];
        $data['major_id'] = (int) $data['major_id'];
		$class = Classes::find($id);
        try {
            $class->name = $data['name'];
            $class->teacher_id = $data['teacher_id'];
            $class->major_id = $data['major_id'];
            $class->academic_year = $data['academic_year'];
            $class->save();
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('index-classes')->with('error', __('error'));
        }
        return redirect()->route('index-classes')->with('edit', __('success'));
    }

    public function detail($id)
    {
        $classDetail = Classes::find($id);
        $students = $classDetail->users;

        return view('admin.classes.detail', [
            "class" => $classDetail,
            "students" => $students,
        ]);
    }

    public function delete($id)
    {
        try {
            Classes::destroy($id);
        } catch (\Exception $th) {
            Log::info($e);
            return redirect()->route('index-classes')->with('error', __('error'));
        }
        return redirect()->route('index-classes')->with('delete', __('success'));
    }
}
@extends('layouts.test')

@section('content')
<div class="top-nav">
	<h4 class="sm black bold">Part I: Picture Description</h4>
	<ul class="top-nav-list">
		<li><a href="#"><i class="fas fa-arrow-right"></i><b>Bách Khoa Toeic</b></a></li>
		<li class="timer" id="count-down"></li>
		<li class="outline-learn part-list">
			<a href="#"><i class="fas fa-list-alt"></i></a>
			<div class="list-item-body outline-learn-body ps-container ps-active-y"
				style="height: 417.443px; width: 352.8px;">
				<div class="ps-scrollbar-x-rail" style="width: 329.2px; display: none; left: 0px;">
					<div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
				</div>
				<div class="ps-scrollbar-y-rail" style="top: 0px; height: 360.813px; display: inherit; right: 0px;">
					<div class="ps-scrollbar-y" style="top: 0px; height: 150px;"></div>
				</div>
			</div>
		</li>
		<li class="exit">
			<a href="#" class="exit-test"><i class="fas fa-times-circle"></i></a>
		</li>
	</ul>
</div>

<section id="quizz-intro-section" class="quizz-intro-section learn-section"
	style="min-height: 466px; height: auto !important;">
	<div class="container" style="height: auto !important;">
		<div class="question-content-wrap" style="height: auto !important;">
			<div class="row" style="height: auto !important; justify-content: center;">
				<div class="col-md-10 col-md-push-1" style="height: auto !important; min-height: 0px !important;">
					<div class="question-content" style="height: auto !important; min-height: 0px !important;">
						@foreach ($listeningQuestions as $item )
						@php
						$question = $item->questions[0];
						@endphp
						<p><b>{{ $startIndex }}. Select the answer</b></p>
						<img src="{{ url('image/' . $item->main_img) }}" style="width: 100%">
						<div class="answer">
							<div class="audioplayer">
								<audio controls="">
									<source src="{{ url('audio/' . $item->audio) }}" type="audio/mp3">
								</audio>
							</div>
							<ul class="answer-list">
								<li>
									<input id="question_{{$question->id}}1" type="radio" data-id="{{$question->id}}"
										name="question_{{$question->id}}" value="A">
									<label for="question_{{$question->id}}1">
										<i class="icon icon_radio"></i>
										A
									</label>
								</li>
								<li>
									<input id="question_{{$question->id}}2" type="radio" data-id="{{$question->id}}"
										name="question_{{$question->id}}" value="B">
									<label for="question_{{$question->id}}2">
										<i class="icon icon_radio"></i>
										B
									</label>
								</li>
								<li>
									<input id="question_{{$question->id}}3" type="radio" data-id="{{$question->id}}"
										name="question_{{$question->id}}" value="C">
									<label for="question_{{$question->id}}3">
										<i class="icon icon_radio"></i>
										C
									</label>
								</li>
								<li>
									<input id="question_{{$question->id}}4" type="radio" data-id="{{$question->id}}"
										name="question_{{$question->id}}" value="D">
									<label for="question_{{$question->id}}4">
										<i class="icon icon_radio"></i>
										D
									</label>
								</li>
							</ul>
						</div>
						@php
						$startIndex++
						@endphp
						@endforeach
						<form method="POST" id="test" enctype='multipart/form-data'
							action="{{ route('test-part-two') }}">
							@csrf
							<input type="hidden" name="true_answer_part_one_ids">
							<input type="hidden" name="start_index" value="{{$startIndex}}">
							<input type="hidden" name="score">
							<input type="hidden" name="count_down">
							<button type="submit" class="mc-btn btn-style-6">Next</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	var list = {!! json_encode($listeningQuestions) !!};
	var hiddenInput = "true_answer_part_one_ids"
	var t1 = new Date();
	var defaultCountDown = 30*60;
</script>
<script src="{{ url('js/listening_test.js') }}">
</script>
@endsection
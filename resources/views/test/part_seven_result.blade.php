@extends('layouts.test')

@section('content')
<div class="top-nav">
	<h4 class="sm black bold">Part VII: Reading Comprehension</h4>
	<ul class="top-nav-list">
		<li><a href="#"><i class="fas fa-arrow-right"></i><b>Bách Khoa Toeic</b></a></li>
		<li class="timer" id="count-down"></a>
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
			<a href="#"><i class="fas fa-times-circle"></i></a>
		</li>
	</ul>
</div>

<section id="quizz-intro-section" class="quizz-intro-section learn-section"
	style="min-height: 466px; height: auto !important;">
	<div class="container" style="height: auto !important;">
		<div class="question-content-wrap" style="height: auto !important;">
			<div class="row" style="height: auto !important; justify-content: center;">
				<div class="col-md-10 col-md-push-1" style="height: auto !important; min-height: 0px !important;">
					@foreach ($readings as $index => $item)
					@php
					$fromIndex = $startIndex;
					$toIndex = $fromIndex + ( $item->number_of_questions - 1);
					$i = 1;
					@endphp
					<div class="question-content">
						<p class="text-justify">
							<b>Question {{__($fromIndex . " - " . $toIndex)}} refer to
								following paragraph:</b>
						</p>
						<div class="main-article">
						</div>
						@foreach ($item->questions as $question)
						<div class="answer">
							<p><b>{{ $startIndex }}. __({{$i}})__</b></p>
							<ul class="answer-list">
								<li>
									<input disabled id="question_{{$question->id}}1" type="radio"
										data-id="{{$question->id}}" name="question_{{$question->id}}" value="A"
										{{ (in_array($question->id, $trueAnswersIds) && $question->answer == 'A') ? "checked" : null }} />
									<label for="question_{{$question->id}}1">
										<i class="icon icon_radio"></i>
										A . {{ $question->option_a }}
										@if ($question->answer == "A")
										<i style="color: #37abf2" class="fas fa-check"></i>
										@endif
									</label>
								</li>
								<li>
									<input disabled id="question_{{$question->id}}2" type="radio"
										data-id="{{$question->id}}" name="question_{{$question->id}}" value="B"
										{{ (in_array($question->id, $trueAnswersIds) && $question->answer == 'B') ? "checked" : null }} />
									<label for="question_{{$question->id}}2">
										<i class="icon icon_radio"></i>
										B . {{ $question->option_b }}
										@if ($question->answer == "B")
										<i style="color: #37abf2" class="fas fa-check"></i>
										@endif
									</label>
								</li>
								<li>
									<input disabled id="question_{{$question->id}}3" type="radio"
										data-id="{{$question->id}}" name="question_{{$question->id}}" value="C"
										{{ (in_array($question->id, $trueAnswersIds) && $question->answer == 'C') ? "checked" : null }} />
									<label for="question_{{$question->id}}3">
										<i class="icon icon_radio"></i>
										C . {{ $question->option_a }}
										@if ($question->answer == "C")
										<i style="color: #37abf2" class="fas fa-check"></i>
										@endif
									</label>
								</li>
								<li>
									<input disabled id="question_{{$question->id}}4" type="radio"
										data-id="{{$question->id}}" name="question_{{$question->id}}" value="D"
										{{ (in_array($question->id, $trueAnswersIds) && $question->answer == 'D') ? "checked" : null }} />
									<label for="question_{{$question->id}}4">
										<i class="icon icon_radio"></i>
										D . {{ $question->option_d }}
										@if ($question->answer == "D")
										<i style="color: #37abf2" class="fas fa-check"></i>
										@endif
									</label>
								</li>
							</ul>
						</div>
						@php
						$startIndex++;
						$i++;
						@endphp
						@endforeach
					</div>
					@endforeach
					<a href="{{ url('/home') }}">
						<button type="button" class="mc-btn btn-style-6">Home</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		var post = {!! json_encode($readings) !!};
		$('.main-article').each(function(index,element) {
			$(this).html(post[index].post)
		});
	})
</script>
@endsection
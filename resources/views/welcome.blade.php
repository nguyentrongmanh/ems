@extends('layouts.app')

@section('content')

<div id="js-preloader" class="js-preloader">
	<div class="preloader-inner">
		<span class="dot"></span>
		<div class="dots">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(window).on('load', function() {
        $('#js-preloader').addClass('loaded');
    });
</script>

<div class="welcome-wrapper">
    <div class="row" style="margin: 0px !important;">
        <div class="col-6 ">
            <div class="welcome-substation-container">
                <a href="{{ url('tba/hung-nguyen') }}">
                    <img class="substation-logo" src="{{ url('image/substation-logo.PNG') }}" />
                    <div class="substation-name">Hưng Nguyên</div>
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="welcome-substation-container">
                <a href="{{ url('tba/bac-a') }}">
                    <img class="substation-logo" src="{{ url('image/substation-logo.PNG') }}" />
                    <div class="substation-name">Bắc Á</div>
                </a>
            </div>
        </div>
    </div>
    <div class="row"  style="margin: 0px !important;">
        <div class="col-6 ">
            <div class="welcome-substation-container">
                <a href="{{ url('tba/hung-nguyen') }}">
                    <img class="substation-logo" src="{{ url('image/substation-logo.PNG') }}" />
                    <div class="substation-name"> Nghĩa Đàn (E15-2)</div>
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="welcome-substation-container">
                <a href="{{ url('tba/bac-a') }}">
                    <img class="substation-logo" src="{{ url('image/substation-logo.PNG') }}" />
                    <div class="substation-name">Quỳ Hợp (E15-3)</div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
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

<div class="page-wrapper">
    <div class="row menu-page">
        <div class="col-6 menu-page-button-container">
            <a href="{{ url('tba/hung-nguyen') }}" class="menu-page-button">Hưng Nguyên</a>
        </div>
        <div class="col-6 menu-page-button-container">
            <a href="{{ url('tba/bac-a') }}" class="menu-page-button">Bắc Á</a>
        </div>
    </div>
</div>

@endsection
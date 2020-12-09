<div class="mchb {{ $data['class'] ?? '' }}" id="{{ $data['id'] }}">
    <div class="mchb-content">
        <div class="first-item-mchb"></div>
        <div class="second-item-mchb"></div>
        <div class="last-item-mchb"></div>
    </div>
    <div class="mchb-label">{{ $data['label'] }}</div>
</div>

<style type="text/css">
	.mchb {
		display: flex;
		position: absolute;
	}
	.mchb .mchb-content {
		display: block;
	}

	.mchb .mchb-label {
		padding-left: 5px;
	    color: white;
	    font-weight: 500;
	    font-size: 10px;
		width: 45px;
		display: flex;
	    align-items: center;
	}

	.mchb .first-item-mchb {
	    width: 10px;
	    height: 10px;
	    border-top: 2px solid white;
	    transform: rotate(45deg);
	    border-left: 2px solid white;
	    margin-left: 1px;
		margin-bottom: 2px;
		position: relative;

	}

	.mchb .first-item-mchb::before {
		content: "";
		position: absolute;
	    width: 10px;
	    height: 10px;
	    border-top: 2px solid white;
		border-left: 2px solid white;
		bottom: 4px;
	    right: 4px;
	}

	.mchb .second-item-mchb {
	    width: 12px;
	    height: 24px;
	    border: 2px solid yellow;
	    background-color: red;
	}

	.mchb .last-item-mchb {
		position: relative;
		width: 10px;
	    height: 10px;
	    border-bottom: 2px solid white;
	    border-right: 2px solid white;
	    transform: rotate(45deg);
	    margin-left: 1px;
	    margin-top: 2px;
	}

	.mchb .last-item-mchb:before {
		content: "";
		position: absolute;
		width: 10px;
	    height: 10px;
	    border-bottom: 2px solid white;
	    border-right: 2px solid white;
		top: 4px;
		left: 4px;
	}
</style>

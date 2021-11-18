<!DOCTYPE html>
<html>
<head>
	<title>Best Nationstates Issue Voting</title>
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" type="text/css" href="{{url('styles.css')}}">

	<style type="text/css">

		body {
			background:#ecf0f1 ;
		}

		.container {
			max-width: 900px;
			margin: 0 auto;
		}

		.container h2{
			padding: 30px 30px;
			text-align: center;
			font-size: 28px;

		}

		@media screen and (max-width: 480px) {
			.container h2{
				padding: 10px 5px;
				text-align: center;
				font-size: 25px;
			}

			.header a{
				font-size: 25px;
			}
		}

		.blue_bar {
			background-color: #07467c;
			text-align: center;
			margin-bottom: 6vh;
		}


		.header {
			height: 80px;
			font-family: 'Fira Sans', sans-serif;
			font-weight: 400;
			font-size: 35px;
			color: #FFFFFF;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		@font-face {
			font-family: 'Fira Sans';
			font-style: normal;
			font-weight: 400;
			src: url(https://fonts.gstatic.com/s/firasans/v11/va9E4kDNxMZdWfMOD5Vvl4jL.woff2) format('woff2');
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}

		label {
			width: 100%;
		}

		.card-input-element {
			display: none;
		}

		.card-input {
			margin: 10px;
			padding: 0px;
			border: 1px solid #002339;
		}

		.card-input:hover{
			transform: scale(1.020);
			transition: all .2s ease-in-out;
			margin: 10px;
			padding: 0px;
		}

		.card-input:hover {
			cursor: pointer;
		}

		.card-input-element:checked + .card-input {
			box-shadow: -2px 4px 10px 0px rgba(0,35,57,0.73);
			-webkit-box-shadow: -2px 4px 10px 0px rgba(0,35,57,0.73);
			-moz-box-shadow: -2px 4px 10px 0px rgba(0,35,57,0.73);
		}

		.mainDiv{
			text-align: center;
		}

		.card-header{
			/*background: #c2cdd4;*/
			background: #002339;
			padding: 5px 1.25rem;
			font-weight: 700;
			font-size: 20px;
			color: #FFFFFF;		
		}

		.card-body{
			font-size: 18px;
			font-weight: 500;
		}

	</style>
</head>

<div class="row blue_bar">
	<div class="col-md-12 col-lg-12 col-sm-12 header">
		<a style="color:white; text-decoration:none" href="#">Best Nationstates Issue Voting</a>
	</div>
</div>

<div class="container">
	<h2>Between the following two issues, which one do you prefer?</h2>
	<div class="row mainDiv" id="mainDiv">
		<div id="optionDiv" style="width: 100%">

			<div class="col-md-12 col-lg-12 col-sm-12">
				<label for="{{$option1->id}}">
					<input type="radio" name="option" id="{{$option1->id}}" value="{{$option1->id}}" class="card-input-element" />
					<div class="card card-default card-input">
						<div class="card-header">{!!$option1->title!!}</div>
						<div class="card-body">
							{{$option1->description}}
						</div>
					</div>
				</label>
			</div>

			<div class="col-md-12 col-lg-12 col-sm-12">
				<label for="{{$option2->id}}">
					<input type="radio" name="option" id="{{$option2->id}}" value="{{$option2->id}}" class="card-input-element" />
					<div class="card card-default card-input">
						<div class="card-header">{!!$option2->title!!}</div>
						<div class="card-body">
							{{$option2->description}}
						</div>
					</div>
				</label>
			</div>

		</div>
	</div>
</div>

<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<script type="text/javascript">
	$('#mainDiv').on('change', 'input[name="option"]', function() {
		var selctedVal = $('#optionDiv input[name="option"]:checked').val();
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: 'submitVote',
			type: 'GET',
			data: {
				id: selctedVal,
			},
			success: function( response ){
				$("#optionDiv").remove();
				$("#mainDiv").append(response);
				$("#optionDiv").toggle('slide',{direction : 'right'},200);
			},
			error: function (err) {
				console.log(err);
			},
		});
	});
</script>

</body>
</html>
<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: #000000}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}

	.hov div:hover{
		background: #ccc;
	}
	.receive{
		background:#6699ff;
		left: 0px;
		position: relative;
		float: left;
	}
	.sent{
		text-align: right;
		background:#b3ccff;
		right: 0px;
		position: relative;
		float: right;
	}
	.pmSize div p{
		padding:10px;
		min-width: 50px;
		max-width: 500px;
		min-height: 50px;
		border-radius: 10px;

	}
	.pmSize div{
		position: relative;
	}





</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<body style="margin: 0;">
	
	<div class="bootstrap-iso">
		<div class="container row" style="width: 100%;margin:0;padding:0;">
			<div style="background-color: #4267b2; border-bottom: 1px solid #29487d;color: #fff;height:42px; top: 0; text-align:center;">
				<label>ADMIN NAME</label>
			</div>
			<div class="col-md-4 col-lg-4" style="border: 1px solid rgba(0, 0, 0, .10); height:100%;">
				<div class="col-md-12 col-lg-12" style="height:42px; border-bottom: 1px solid rgba(0, 0, 0, .10);text-align:center;">
					<label>INQUIRIES</label>
				</div>
				<div class="hov col-md-12 col-lg-12">
					<div onclick="location.href='#';">
						<label>Anu po gagawin ko pag nawala yung I.D ko??</label><br>
						<label>1:22 PM</label>
					</div>
					<div onclick="location.href='#';">
						<label>cancel class na po ba sa tup lakas na po kasi ng bagyo ??</label><br>
						<label>12:31 PM</label>
					</div>
					<div onclick="location.href='#';">
						<label>panu pag enroll sa TUP gusto ko po kasi dto mag enroll</label><br>
						<label>10:46 PM</label>
					</div>

				</div>
			</div>
			<div class="col-md-8 col-lg-8" style="border: 1px solid rgba(0, 0, 0, .10); height:100%;">
				<div class="col-md-12 col-lg-12" style="height:42px; border-bottom: 1px solid rgba(0, 0, 0, .10);text-align:center;">
					<label>convo title</label>
				</div>
				<div class="col-md-12 col-lg-12" style="height:100%">
					<!--conversations here-->
					<div class="pmSize">
						<div class="col-md-12 col-lg-12">
							<p class="receive">as of now TUP has no declaire of cancelation of classes !</p>
						</div>
						<div class="col-md-12 col-lg-12">
							<p class="receive">hey!</p>
						</div>
						<div class="col-md-12 col-lg-12">
							<p class="sent">hoy!</p>
						</div>
					</div>
					<!--message/send-->
					<div style="bottom: 10; position: fixed; width: 100%;"> 
						<input type="textarea" name="yourMessage" style="height: 60px;" class="col-lg-7 col-md-7">
						<button style="height: 60px; width: 100px" >send</button>
					</div>
				</div>
				<!--div class="col-md-4 col-lg-4" style="border-left: 1px solid rgba(0, 0, 0, .10); height:100%;">
					report
				</div-->
			</div>
		
		</div>
	</div>
</body>
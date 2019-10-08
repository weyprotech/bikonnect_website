<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title>Bikonnect 後台登入</title>
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		@include('backend.shared._header')
	</head>
	
	<body class="animated fadeInDown">

		<header id="header">

			<div id="logo-group">
				<span id="logo"> <img src="/backend/img/logo.png"> </span>
			</div>

		</header>

		<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
						<h1 class="txt-color-red login-header-big">Bikonnect 官網後台</h1>
						<div class="hero">

							<div class="pull-left login-desc-box-l">
								<h4 class="paragraph-header">Connect Your Bike<br>Ride the Future</h4>
							</div>
							
							<img src="/backend/img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

						</div>

					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
						<div class="well no-padding">
							<form action="{{ URL::route('panel.loginprocess') }}" id="login-form" class="smart-form client-form" method="post">
								<header>
									登入後台
								</header>

								@if($errors->any())
								<p class="alert alert-danger">
								{{$errors->first()}}
								</p>
								@endif

								<fieldset>
									@csrf
									<section>
										<label class="label">帳號</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input id="username" name="username">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> 請輸入帳號</b>
                                        </label>
									</section>

									<section>
										<label class="label">密碼</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="password" name="password">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> 請輸入密碼</b> 
                                        </label>
									</section>

								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										登入
									</button>
								</footer>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--================================================== -->	

	    @include('backend.shared._script')

		<script>
			$(function(){
				$("#login-form").validate({
					rules:{
						username : {
							required : true
						},
						password : {
							required : true
						}
					},
					messages : {
						username : {
							required : '請輸入帳號'
						},
						password : {
							required : '請輸入密碼'
						}
					},
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
			});
		</script>

	</body>
</html>
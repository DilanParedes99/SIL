<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Expedientes</title>
		<meta name="description" content="Sistema para la administración de expedientes públicos">
		<meta name="author" content="Secretaría de Finanzas de Michoacán">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/smartadmin-skins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/smartadmin-rtl.min.css"> 
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/demo.min.css">

		<!-- #FAVICONS 
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/img/favicon.ico" type="image/x-icon">-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		<link rel="apple-touch-icon" href="assets/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="assets/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="assets/img/splash/touch-icon-ipad-retina.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="apple-touch-startup-image" href="/assets/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="/assets/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="/assets/img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		<style>
			html{
				background: none;
			}
			body { 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			  z-index: 9999;
			}
			@media screen and (min-width : 800px) {
				body {
					background : url('../assets/img/login.png');
					background-size : 100%;
					background-repeat : no-repeat;
				}
			}
			#extr-page{
				background: none;
			}
			#extr-page #main {
				background: none;
			}
			@media screen and (min-width : 1100px){
				#main {
					padding-top : 18% !important;
				}
			}
			@media screen and (min-width : 800px) and (max-width : 1100px) {
				#main {
					padding-top : 12% !important;
				}
			}
		</style>
	</head>
	<body class="animated fadeInDown">
		<div id="main" role="main">
			<div id="content" class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-6  text-center " id="modelo-img">
						<div class="row" id="login-container">
							<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">	
								<div class="no-padding">
									<form class="smart-form client-form" method="POST" action="{{ route('login') }}">
										@csrf
										<section class="form-group">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input class="allownumericwithoutdecimal" type="text" placeholder="Nombre de usuario" name="username" id="username" autofocus value="{{old('username')}}">
												<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Introduce tu nombre de usuario</b>
											</label>
										</section>

										<section class="form-group">
											<label class="input"> <i class="icon-append fa fa-lock"></i>
												<input type="password" placeholder="Contraseña" name="password" id="password">
												<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Introduce tu contrase&ntilde;a</b>
											</label>
										</section>
										
										<section class="form-group">
											<div class="col-md-4"></div>
											<div class="col-md-4">
											</div>								
										</section>

										<button class="form-control btn btn-primary" type="submit">
											Iniciar Sesión
										</button>
										<br>
										<br>

										<a class="btn btn-link" href="{{ route('password.request') }}">
                                        	¿Olvidaste tu Contraseña?
                                    	</a>
									</form>	
								</div>
							</div>
						</div>
					</div>
				</div> <br /> <br />
				<div class="row hidden-xs hidden-sm">
					<h5 class="col-md-4 col-md-offset-9" style="color: #666666; text-align: center;"> - Para una mejor experiencia es recomendable utilizar los siguientes navegadores -</h5>
					<p class="text-center col-md-12 col-md-offset-5"><a href="https://www.google.com/intl/es/chrome/browser/?hl=es" target="_blank" title="Chrome"><img src="/assets/img/imgChrome.png" alt="" style="width: 50px;"></a><a href="http://www.mozilla.org/es-ES/firefox/new/" target="_blank" title="Firefox"><img src="/assets/img/imgfirefox.png" alt="" style="width: 50px;"></a></p>
				</div>
			</div>
		</div>
		<!--================================================== -->			
	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="/assets/js/libs/jquery-2.1.1.min.js"></script>
	    <script src="/assets/js/libs/jquery-ui.min.js"></script>
		<script src="/assets/js/app.config.js"></script>
	    <script src="/assets/js/plugin/pace/pace.min.js"></script>
		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="/assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->
		<script src="/assets/js/bootstrap/bootstrap.min.js"></script>
		<script src="/assets/js/notification/SmartNotification.min.js"></script>
		<script src="/assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>
		<script src="/assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>
		<script src="/assets/js/app.min.js"></script>
		<script src="/js/utilerias.js"></script>
		<script>
			$('body').keyup(function(e) {
				if(e.which == 13){
					$('.client-form').submit();
				}
			});
		</script>
		@if (count($errors) > 0)
			<script>
				$(document).ready(function(){			
					_gen.notificacion_min('Falla de Autenticación', 'Los datos proporcionados no son validos', 4);
				});
			</script>		
		@endif
	</body>
</html>
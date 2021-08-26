<html class="no-js" lang="fr">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">

		<!-- Use the .htaccess and remove these lines to avoid edge case issues.
		More info: h5bp.com/b/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Accueil</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Mobile viewport optimized: j.mp/bplateviewport -->
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<!-----------------------Liens CSS --------------------------->
		<link rel="shortcut icon" href="interface/img/favicon.png"/>
		<link rel="stylesheet" href="interface/css/style.css">
		<link rel="stylesheet" href="interface/css/bootstrap.css">
		<link rel="stylesheet" href="interface/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="interface/js/jquery-steps/jquery.steps.css">
		<!---------------  Script JS---------------->
		<script src="interface/js/libs/jquery-3.2.1.min.js"></script>
	

	</head>

	<body>
		

			<div id="main" >

				
<!-- FENETRE OTP -->
				
					<div class="modal-dialog">

						<!-- Contenu de la fenêtre -->
						<div class="modal-content">
							<div class="modal-header" >
								<button type="button" class="close" data-dismiss="modal">
									&times;
								</button>
								<h4 class="titre-modal"><span class="glyphicon glyphicon-lock"></span> OTP</h4>
							</div>
							<!------corps de la fenêtre---->

							<div class="modal-body" style="padding:40px 50px;">

								<!------formulaire de connexion---->
								<form class="form-wizard2" action="#" method="post" enctype="multipart/form-data">
									<div class="form-group" id="otp">
										<label for="NomUtilisateur"><span class="glyphicon glyphicon-user"></span> Entrez votre Token</label>
										<input type="text" class="form-control" name="otp" placeholder="_ _ _ _ _ _" required>
									</div>
									<button type="submit" class="btn bouton border-radius btn-block" id="valid" name="valid">
										<span class="glyphicon glyphicon-off"> </span> Valider
									</button>
								</form>
								
							</div>
							<div class="modal-footer">
								<a href="index.php" style="float: left;">retourner</a>

								<p>
									<a href="#">Mot de passe oublié?</a>
								</p>
							</div>
						</div>

					</div>
				
				<!--FIN FENETRE OTP -->
			</div>

			
			
			</html>
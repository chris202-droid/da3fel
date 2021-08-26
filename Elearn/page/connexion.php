

<div class="container">	
	<div class="slideshow-container">
	
			<div class="connect" style="color: black;">
				<form  class="panel" role="form" method="post" enctype="multipart/form-data">
				    <h6 class="h4">Informations de Connexion</h6>

				    <div class="form-group has-feedback has-feedback-right">
				    	<label class="control-label">Votre Identifiant</label>
				    	<input type="text" name="username" class="form-control" placeholder="Identifiant(telephone, email ou username" id="username" required>
				    	<i class="glyphicon glyphicon-user form-control-feedback"></i>
				    </div>
				    
				    <div class="form-group has-feedback has-feedback-right">
				    	<label class="control-label">Mot de passe</label>
				    	<input type="password" name="apass" class="form-control apass" placeholder="Votre mot de passe..."  id="apass" required>
				    	<i class="glyphicon glyphicon-eye-close form-control-feedback"></i>
				    </div>
				    <div class="div form-group navbar fixed-bottom">
				    	<button name="validuser" class="next btn btn-primary">Suivant</button>
				    </div>
			    </form>
		  	</div>

		   <div class="otpConnect" style="color: black;" hidden>
			   	<form  class="panel" role="form" method="post" enctype="multipart/form-data">
			    	<h4 class="h4 panel">Information sur le code</h4>

				    <div class="form-group has-feedback has-feedback-right">
				    	<label class="control-label">Saisir le code Reçu</label>
				    	<input type="text" name="userotp" class="form-control" placeholder="__ __ __ __ __ __" required>
				    	<i class="glyphicon glyphicon-user form-control-feedback"></i>
				    </div>
				    <div class="div form-group navbar fixed-bottom">
				    	<button class="validOtp btn btn-primary">Valider</button>
				    </div>
				</form>
		   </div>
		   <div class="result">
		   	
		   </div>
	</div>
	
</div>
 <script type="text/javascript"></script>

				<div class="modal fade" id="fenetre-preinscription" role="dialog">
					<div class="modal-dialog">

						<!-- Contenu de la fenêtre inscription -->
						<div class="modal-content">
							<div class="modal-header" >
								<button type="button" class="close" data-dismiss="modal">
									
								</button>
								<h4 class="titre-modal"><span class="glyphicon glyphicon-pencil"></span> Inscription</h4>
							</div>
							<!------corps de la fenêtre inscription ---->

							<div class="panel-body" style="padding:30px 30px;">
								<div class="row">
									<div class="col-sm-12" >
										<h3>Assistance d'inscription</h3>
										<p>
											Veillez remplir étape par étape toutes les cases çi-dessous.
										</p>

										<!-- Debut de l'assistance de validation de formulaire d'inscription  -->

										<form class="form-wizard" method="post" enctype="multipart/form-data">

											<!-- Section 1  Informations personnelles-->

											<h1>Informations personnelles</h1>
											
											<section >
												<div class="form-group">
													<label for="nom">Nom <code>*</code></label>
													<input id="nom" name="nom" type="text" class="form-control ">
												</div>
												<div class="form-group">
													<label for="prenom">Prénom </label>
													<input id="prenom" name="prenom" type="text" class="form-control">
												</div>
												<div class="form-group row">
													<span class=" col-sm-4"> <label for="date-naiss">Date de naissance <code>*</code></label>
														<input id="date-naiss" name="dateNais" type="date" class="form-control ">
													</span>
													
													<span class=" col-sm-4"> <label for="sexe">sexe <code>*</code></label>
														<select  name="sexe" class="form-control " >
															<option value="">Choisir votre sexe</option>
															<option value="M">M </option>
															<option value="F">F</option>
														</select> </span>
												</div>
												

												<div class="form-group row">
													
													<span class="col-sm-6"> <label for="telephone"> Numéro de Téléphone <code>*</code></label>
														<input id="telephone" type="tel" name="telephone" maxlength="9"  placeholder="Exemple: 694740340" class="form-control " pattern="^(23|(6[5-9]))\d{1}(\d{3}){2}$">
													</span>
													<span class="col-sm-6">
														<label for="email">Email <code>*</code></label>
													<input id="email" type="email" name="email"   maxlength="50"   class="form-control " pattern="^(\w|\d){1,}@(\w|\d)+.(\w{3})$" placeholder="Exemple: CamerIT@tech.com" >
														
													</span>
													
												</div>
												
												<p>
													(<code>*</code>) Obligatoire
												</p>
											</section>

											<!-- Section 2 Informations urgentes-->

											<h1>Informations de Connexion</h1>
											<section>
												<div class="form-group">
													<label for="username"><span class="glyphicon glyphicon-user"></span> Nom d'utilisateur</label>
													<input type="text" class="form-control" id="username" name="username" placeholder="Entrez Nom utilisateur" >
												</div>
												<div class="form-group">
													<label for="pass"><span class="glyphicon glyphicon-lock"></span> Mot de passe</label>
													<input type="text" class="form-control" id="pass" name="pass" placeholder="Entrez le Mot de passe" >
												</div>
												<div class="form-group">
													<label for="confirmpass"><span class="glyphicon glyphicon-lock"></span> Mot de passe</label>
													<input type="text" class="form-control" id="confirmpass" name="confirmpass" placeholder="Confirmer le Mot de passe" >
												</div>

											</section>

											<!-- Section 3 Faculté et Filiaire-->
											<h1>Informations Biométrique</h1>
											<section>
												<div class="row">
													<div class="col-md-8">
														<center>
															<div class="form-group">
																<img class="img-circle" src="OwnFaceAPI/img/tmp/15.jpg">
															</div>
														</center>
														
														<div class="form-group" style="align:center;">
															<h5 class="h5">Veuillez regarder votre Webcam pendant 2 minutes... </h5>
														</div>
													</div>
													<div class="col-md-3"> 
														<video id="inputVideo" class="img-circle" width="180" height="160" onplay="onPlay(this)" autoplay ></video>
													</div>
												</div>
											</section>
											<!-- Section 4 Information sur la santé-->

											
										</form>
										<!----------------- Fin validation du formulaire d'inscription---------------------------- -->

									</div>

								</div>
							</div>

							<!----------- fin corps fenetre-------------->
						</div>

					</div>
				</div>
				

				<?php 

					if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['dateNais'])&&isset($_POST['sexe'])&&isset($_POST['telephone'])&&isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['pass'])&&isset($_POST['confirmpass']))
					{
						$nom = htmlspecialchars($_POST['nom']);
						$prenom = htmlspecialchars($_POST['prenom']);
						$dateNais = htmlspecialchars($_POST['dateNais']);
						$telephone = htmlspecialchars($_POST['telephone']);
						$email = htmlspecialchars($_POST['email']);
						$genre = htmlspecialchars($_POST['sexe']);
						$NomUser = htmlspecialchars($_POST['username']);
						$pass = htmlspecialchars($_POST['pass']);
						$confirmpass = htmlspecialchars($_POST['confirmpass']);


						if($pass==$confirmpass)
						{
							
							/*$pass = $public->encrypt(password_hash($pass, PASSWORD_DEFAULT));
							$NomUser = $public->encrypt($NomUser);
							$telephone = $public->encrypt($telephone);*/
							$info = $bd->SelectToConnect($NomUser,$pass);
							$info2 = $bd->SelectToConnect($telephone,$pass);
							$info3 = $bd->SelectToConnect($email,$pass);
							if((sizeof($info)==0)&&(sizeof($info3)==0)&&(sizeof($info2)==0))
							{
								$path = "OwnFaceAPI/img/$telephone/";
								$python = "OwnFaceAPI/";
								$rslt = $recognize->RecognizeInscription("$path","$python", "$telephone", "$email");
								//var_dump($rslt);
								if($rslt>0)
									{
										
										$result = $bd->InsertUser($nom,$prenom,$NomUser,$pass,$telephone,$email,$dateNais,$genre);
										echo " <h1 style='color:green;'> Inscription réussie...</h1>";
									}

								else{
										echo " <h1> Erreur: Vous devez Activer votre Webcam...</h1>";
									}
								
							}
							else
								{echo 'Veuillez changer de mot de passe ou d\'identifiant';}
							}
						
					}
					
				 ?>
				
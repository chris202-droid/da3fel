<!---------------------------------------------- FENÊTRE CONNEXION ----------------------------------------------->
				<div class="modal fade" id="fenetre-connexion" role="dialog">
					<div class="modal-dialog">

						<!-- Contenu de la fenêtre -->
						<div class="modal-content">
							<div class="modal-header" >
								<button type="button" class="close" data-dismiss="modal">
									&times;
								</button>
								<h4 class="titre-modal"><span class="glyphicon glyphicon-lock"></span> Connexion</h4>
							</div>
							<!------corps de la fenêtre---->

							<div class="modal-body" style="padding:40px 50px;">

								<!------formulaire de connexion---->
									<form class="form-wizard2"   method="post" enctype="multipart/form-data">
										<div class="form-group" >
											<label for="NomUtilisateur"><span class="glyphicon glyphicon-user"></span> Nom d'utilisateur</label>
											<input type="text" class="form-control" id="NomUser"  name="NomUtilisateur" placeholder="Entrez le username/ E-mail ou Telephone" required>
										</div>
										<div class="form-group">
											<label for="Mot2Pass"><span class="glyphicon glyphicon-lock"></span> Mot de passe</label>
											<input type="password" class="form-control" id="pass" name="Mot2Pass" placeholder="Entrez Mot de passe" required>
										</div>
										
										<div class="form-group" id="result">
											<h5 class="h5"><code>Vos informations sont erronées...</code></h5>
										</div>
				
										<button type="submit" class="btn bouton border-radius btn-block" id="conect" name="connect">
											<span class="glyphicon glyphicon-off"> </span> Connexion
										</button>
									</form>
								
							</div>
							
							<div class="modal-footer">
								<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
									<span class="glyphicon glyphicon-remove"></span> Fermer
								</button>

								<p>
									<a href="#">Mot de passe oublié?</a>
								</p>
							</div>
						</div>

					</div>
				</div>
				
<!------ fin Fenetre de connexion---------------------------->
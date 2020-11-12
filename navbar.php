	<!-- BARRE DE NAVIGATION-->

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<!-- LOGO --> <i class="fa fa-home fa-2x" style="color: green; margin-right: 10px">
		</i><a class="navbar-brand" href="Accueil.php" style="margin-right: 550px"><strong> VVA</strong></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="Accueil.php">Accueil</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="#about">A Propos</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="#hebergement">Hébergement</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="#galerie">Galerie</a>
				</li>

				<!-- LE BOUTON CONSULTER S'AFFICHE QUE LORSQUE L'ON EST ADMIN OU GEST -->


				<li class="nav-item active">
					<?php
					if(isset($_SESSION['type_compte']) && ($_SESSION['type_compte'] == 'Adm' || $_SESSION['type_compte'] == 'Ges'))
					{
						echo "<a href='consulter.php' class='btn btn-primary'>Consulter</a>";
						}
					?>

					<?php
					if(isset($_SESSION['type_compte']) && ($_SESSION['type_compte'] == 'Adm' || $_SESSION['type_compte'] == 'Ges'))
					{
						echo "<a href='reservation.php' class='btn btn-primary'>Réservation</a>";
						}
					?>
					
				</li>
			</ul>

			<?php //echo $row['TYPECOMPTE']; ?>


			<!-- FIN DU BOUTON CONSULTER QUI S'AFFICHE QUE LORSQUE L'ON EST ADMIN OU GEST -->
			<?php 
			if(!isset($_SESSION['login']) || $_SESSION['login']== ''){

			
			?>
			<form class="form-inline my-2 my-lg-0">
				<a href="connexion.php" class="btn btn-primary btn-lg active" role="button"
					aria-pressed="true">Connexion</a>
			</form>


			<form class="form-inline my-2 my-lg-0">
				<a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Inscription</a>
			</form>

			<?php } ?>

		</div>
	</nav>
	<br>
	<br>
	<br>
	<!-- FIN BARRE DE NAVIGATION -->
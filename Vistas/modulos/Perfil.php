<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Gestione su perfil</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<div class="row">
					
					<form method="post">
						
						<?php

						$perfil = new UsuariosC();
						$perfil -> VerPerfilC();
						$perfil -> EditarPerfilC();

						?>

					</form>

				</div>
				
			</div>

		</div>

	</section>

</div>
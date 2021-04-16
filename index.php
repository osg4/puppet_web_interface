<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

	<div class="contenedor">
		<?php 
			ini_set('display_errors', 1);
			ini_set('display_startup_erros', 1);
			error_reporting(E_ALL);
		?>

		<div class="item1">
			<?php 
				$f = exec('whoami');
				echo $f;
			?>			
		</div>

		<div class="item2">
			<h2>Creacion Modulo</h2>

			<form action="" method="POST">
				<input type="text" name="nombre_modulo">
				<br>
				<input type="submit">
			</form>	

			<?php
				$nombre_modulo = $_POST['nombre_modulo']; 
				exec("./creacion_modulo.sh '$nombre_modulo'");
			?>
		</div>

		<div class="item3">
			<h2>Creacion Clase</h2>

			<p>Elige el modulo para crear sus clases:</p>


			<p>Ponga un nombre a la clase:</p>

			<form action="" method="POST">
				<input type="text" name="nombre_clase">
				<br>
				<input type="submit">
			</form>	

			<?php
				$nombre_clase = $_POST['nombre_clase']; 
				exec("./creacion_clase.sh '$nombre_clase'");
			?>
		</div>

		<div class="4">
			<h2>Edicion clases:</h2>

			<?php 
				$fichero = 'prueba3.pp';
				$texto = file_get_contents($fichero);

				if (isset($_POST['textarea2'])) {
					
					file_put_contents($fichero, $_POST['textarea2']);

					header('Location: index.php');
					exit();
				}
			?>

			<form action="" method="POST">
				<textarea name="textarea2" cols="50" wrap="soft"><?php $salida = htmlspecialchars($texto); echo $salida; ?></textarea>
				<br>
				<input type="submit" />
			</form>			
		</div>

		<div class="item5">
			<h2>Prueba script bash</h2>

			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique veniam, autem. Unde soluta tenetur necessitatibus totam consequatur ea iure fuga reprehenderit, amet quaerat reiciendis itaque dicta doloremque ullam at, culpa.</p>
		</div>
	</div>

</body>
</html>

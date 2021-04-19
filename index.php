<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="">
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

		<div class="item3">
			<h2>Creacion Clase</h2>

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
			<h2>Prueba loop insercion datos desde un Array</h2>

			<?php 
				$nombres = array("Pepe", "Jose", "David");
				$salida2 = "";
				$fichero2 = "prueba4.pp";
				foreach ($nombres as $nombre) {
					$salida2 .= "user { '$nombre':\n\tensure => 'present',\n},\n";
					print_r($salida2);					
				}
				file_put_contents($fichero2, $salida2, FILE_APPEND);
			?>
			
		</div>

		<div>
			<h2>Prueba loop Form</h2>

			<?php 
				$coches = array("bmw", "volkswagen", "fiat", "skoda"); 
			?>
									
			<form action="" method="POST">
				<select name="cars">
					<?php 
						foreach ($coches as $opciones) {
						echo "<option value='$opciones'>$opciones</option>";
						};
					?>
				</select>

			</form>
			
		</div>
		<hr>
		<div>
			<h1>Integracion Total:</h1>

			<?php 
				$enlace = mysqli_connect("localhost", "Usuario", "password", "dashboard");	
			?>

			<p>Integracion de los foreach y escritura a arrays para usarlo con los modulos y las clases.</p>
			
			<h2>Creacion Modulo</h2>

			<form action="" method="POST">
				<input type="text" name="nombre_modulo">
				<br>
				<input type="submit">
			</form>	

			<?php
				$nombre_modulo = $_POST['nombre_modulo']; 
				exec("./creacion_modulo.sh '$nombre_modulo'");

				$sql_insercion_modulo = "insert into modulos (nombre) values ('$nombre_modulo');";
				if (mysqli_query($enlace, $sql_insercion_modulo)) {
					echo 'Insercion correcta en la Base de Datos';
				} else {
					echo 'Error: ' . $sql_insercion_modulo . "<br>" . mysqli_error($enlace);
				}
			?>

			<h2>Elegir Modulo y Clase Para Edicion</h2>

			<?php 
				
				$sql_nombre_modulo = "select nombre from modulos;";
				$resultado_modulo = mysqli_query($enlace, $sql_nombre_modulo);
			?>

			<form action="" method="POST">
				<p>Elegir Modulo</p>
				<select name="modulo">
					<?php 
						while ($array_nombre = mysqli_fetch_array($resultado_modulo, MYSQLI_ASSOC)) {
							foreach ($array_nombre as $nombre => $valor) {
								echo "<option value='$valor'>$valor</option>";
								echo '<br>';
							}							
						};
					?>					
				</select>
				<br>
				<p>Elegir clase a modificar:</p>
				<select name="clase">
					<option value="2">Clase 1</option>
				</select>
				<br>
				<textarea name="" id="" cols="30" rows="10"></textarea>
			</form>

 	
		</div>

	</div>

</body>
</html>

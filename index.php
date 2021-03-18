<?php 
//Crear archivo
if(isset($_POST['formulario__crear'])){
	$archivo = $_POST['nombre_archivo'].'.txt';
	$texto = $_POST['texto_archivo'];
	if(!file_exists($archivo)){
        $fp = fopen($archivo, "w");
        if(fwrite($fp, $texto)){
            echo 'Se creó el archivo correctamente';
            fclose($fp);
        }
    }else{
       echo 'El archivo que intentas crear, ya existe.';
    }
}
//Modificar archivo
if(isset($_POST['formulario__modificar'])){
	$archivo = $_POST['nombre_archivo'].'.txt';
	$texto = $_POST['texto_archivo'];
	if (!file_exists($archivo)){
		 echo "El archivo que quieres modificar no existe.";
	}else{
		$fp = fopen($archivo, "w");
		if(fwrite($fp, $texto)){
			echo 'Se modificó el archivo correctamente';
			fclose($fp);
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestor de archivos</title>
	<style>
		form{
			width: 320px;
			margin:auto;
		}
		form input{
			padding: 5px;
			width: 300px;
			display: inline-block;
		}
	</style>
</head>
<body>
	
	<form action="index.php" method="post">
		<h2>Crear archivo txt:</h2>
		<input type="text" name="nombre_archivo" placeholder="Ingrese el nombre del archivo"><br>
		<input type="text" name="texto_archivo" placeholder="Ingrese el texto del archivo"><br>
		<input type="hidden" name="formulario__crear">
		<input type="submit" value="Enviar">
	</form>
	<form action="index.php" method="post">
		<h2>Modificar Archivo txt:</h2>
		<input type="text" name="nombre_archivo" placeholder="Ingrese archivo a modificar"><br>
		<input type="text" name="texto_archivo" placeholder="Ingrese el texto nuevo del archivo"><br>
		<input type="hidden" name="formulario__modificar">
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
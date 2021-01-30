<?php
session_start();

include_once("autoload.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
	<title>Biblioteca</title>
</head>
<body>

<div class='container'>
	<h1 class='text-primary'>INCIDENCIAS</h1>

	<input type='text' id='movil' placeholder='+34656250882'>
	<button class='text-primary' id='nuevaIncidencia' data-toggle="modal" data-target="#insertarInc">Nueva Incidencia</button>

	<section id='container'>

		<div class='container'>
				<form id='formularioInsertar' class='mt-3'>
				<div class='form-row'>
					<div class="col">
						<label>Latitud</label>          
						<input type='text' name='latitud' class="form-control"> 
					</div>
					<div class="col">
						<label>Longitud</label>          
						<input type='text' name='longitud' class="form-control"> 
					</div>
				</div>	
				<div class='form-row'>
					<div class="col">
						<label>Ciudad</label>          
						<input type='text' name='ciudad' class="form-control"> 
					</div>
					<div class="col">
						<label>Dirección</label>          
						<input type='text' name='direccion' class="form-control"> 
					</div>	

					<div class="col">
						<label>Etiqueta</label>          
						<input type='text' name='etiqueta' class="form-control"> 
					</div>	
				</div>
				<div class='form-row'>
					<div class="col">
						<label>Descripción</label>          
						<textarea name='descripcion' class="form-control"> </textarea>
					</div>
				</div>
				
				<div class='form-row mt-3'>
					<div class="col">
						<button type="submit" class="btn btn-primary" action='insert'>Nueva</button>	  		  	  	  		  	 
					</div>
				</div>
				</form>
			
		</div>

		<div id='mensaje'>

	</section>
</div>


<script>
	//Cargar contenido principal
	document.addEventListener("DOMContentLoaded", async () => {
		$('#formularioInsertar').hide();
	});

	document.getElementById('nuevaIncidencia').addEventListener("click", function() {
		$('#formularioInsertar').show();
		document.getElementById("mensaje").innerHTML = "";
	});

	//Botón del formulario para insertar incidencia
	document.getElementById("formularioInsertar").addEventListener("submit", async function(e) {
		e.preventDefault(); //Para que no envíe el formulario antes

		//Añadir también el móvil del usario
		let movil = document.getElementById('movil').value;

		let formData = new FormData(e.target);
		formData.append("action", "newInc"); //Acción al controlador para insertar
		formData.append("movil",movil);

		let res = await fetch("Controllers/controller.php", {
			method: "POST",
			body: formData,
		});
		let data = await res.text();

		//Pintamos la respuesta en el contenedor
		$('#formularioInsertar').hide();
		document.getElementById("mensaje").innerHTML = data;

	});
	
</script>

</body>
</html>
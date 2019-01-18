<?php 

$username='HR';
$password='root';
$tabla='COUNTRIES';
$connection_string='localhost/xe';
$conn=oci_connect($username, $password,$connection_string);

if($conn){
	echo "<div class=\" bg-dark ml-4 rounded-bottom d-inline-flex\"> <p class=\" text-success px-3 pt-2\">CONECTADO A BD:".$username."</p> </div>";
}else
	echo "<div class=\" bg-dark ml-4 rounded-bottom d-inline-flex\"> <p class=\" text-danger px-3 pt-2\">ERROR AL CONECTAR CON:".$username."</h5> </div>";

		  		
	if (isset($_POST["agregar"])) {
				
	
	

			echo "<!DOCTYPE html>
			  <html>
			    <head>
			      <meta charset=\"utf-8\">
			      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/><!--ACOMODAR PAGINA A DIFERENTES DISPOSITIVOS-->
			      <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"imagenes/faviconn.ico\"><!--FAVICON-->
			      <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\"><!--REFERENCIA BOOTSTRAP-->
			      <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\"><!--Font awesome-->
			      <title>Registrate - Empleando CR </title>
			    </head>
				
			     <body class=\"bg-dark\">


			      	<div class=\"jumbotron bg-success pt-6\">
					  <div class=\"container\">
					    <h1 class=\"display-4\"> <i class=\"fa fa-thumbs-up mr-2\"></i>Se agregó un dato correctamente</h1>
					    <p class=\"lead\">Vuelve a la pagina principal para ver los cambios</p>
					    <a class=\"navbar-brand text-light\" href=\"HR_COUNTRIES.php\">
					        <i class=\"fa fa-arrow-circle-left mr-2\"></i>
					        Volver a la Página Principal
				        </a>
					  </div>
					</div>

			      </script><!--JavaScript DEL MATERIALIZE-->
			      <!--BOOTSTRAP JS REFERERENCIAS-->
			      <script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>        
			      <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"></script>
			      <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"></script>
			       <!-- jQuery CDN -->
			        <script src=\"https://code.jquery.com/jquery-1.12.0.min.js\"></script>
			       <!-- Bootstrap Js CDN -->
			        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
			        <!-- jQuery Custom Scroller CDN -->
			        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js\"></script>


			         </body>

			    <footer>
			      
			    </footer>
			  </html>";
}
		
?>
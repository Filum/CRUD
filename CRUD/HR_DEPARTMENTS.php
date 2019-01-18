
<?php
$username='HR';
$password='root';
$tabla='DEPARTMENTS';
$connection_string='localhost/xe';
$conn=oci_connect($username, $password,$connection_string);
if($conn){
	echo '<div class="bg-dark ml-4 rounded-bottom d-inline-flex"> <p class=" text-success px-3 pt-2">CONECTADO A BD:'.$username.'</p> </div>';
}else
	echo "<div class=\" bg-dark ml-4 rounded-bottom d-inline-flex\"> <p class=\" text-danger px-3 pt-2\">ERROR AL CONECTAR CON:".$username."</h5> </div>";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon.ico"><!--FAVICON-->
		 <link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon.ico"><!--FAVICON-->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><!--Link de bootstrap css-->
		<title>CRUD de la Tabla <?php echo $tabla; ?></title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--font awesome cnd-->
	</head>
	<body >
		
		<h1 class="display-4 text-muted text-center "><img src="\CRUDS\imagenes\Logo.png" class="" > CRUD DE LA TABLA <?php echo $tabla; ?></h1>
		<ul class="nav nav-fill bg-dark px-5 py-3" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#mostrar" role="tab" aria-controls="mostrar" aria-selected="true">
			   	<p class="h3"><i class="fa fa-list-ol text-primary h1"></i> </p> Visualizar Datos</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link"  data-toggle="tab" href="#agregar" role="tab" aria-controls="agregar" aria-selected="false">
			    <p class="h3"><i class="fa fa-plus-square text-primary h1"></i> </p>Agregar Datos</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#editar" role="tab" aria-controls="editar" aria-selected="false">
			    <p class="h3"><i class="fa fa-edit text-primary h1"></i> </p>Editar Datos</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#eliminar" role="tab" aria-controls="eliminar" aria-selected="false">
			    <p class="h3"><i class="fa fa-trash text-primary h1"></i> </p>Eliminar Datos</a>
			  </li>
		</ul>
		<div class="tab-content m-5">
		  <div class="tab-pane fade show active" id="mostrar" role="tabpanel" aria-labelledby="mostrar-tab">
		  	

		  	<?php	
				
				$stid = oci_parse($conn, "SELECT column_name FROM user_tab_columns where table_name='".$tabla."'");
				oci_execute($stid);
				echo "<table class=\"table w-auto mx-auto bg-dark table-hover text-white rounded\">";
				echo "<thead class=\" bg-primary\">";
				echo "<tr class=\"w-auto\">";
				while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			    	foreach ($fila as $elemento) {
			        	echo "    <th scope=\"col\">" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</th>\n";
			    	}
				}echo "</tr>";
			  	echo "</thead>";
 
			  	$stid = oci_parse($conn, "SELECT * FROM ".$tabla );
				oci_execute($stid);
				while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			    	echo "<tr>\n";
			    	foreach ($fila as $elemento) {
			        	echo "    <td>" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</td>\n";
			    	}
			    	echo "</tr>\n";
				}
				echo "</table>\n";

			?>


		  </div>
		  <div class="tab-pane fade bg-dark rounded w-50 mx-auto" id="agregar" role="tabpanel" aria-labelledby="agregar-tab">

		  	

		  	<form class="form-group row text-white mx-auto w-75 p-5" action=<?php echo $username."_".$tabla."_operaciones.php" ?> method="post">
		  		<h1 class="text-white h2 mx-auto">Ingrese los siguientes datos </h1>
		  		<?php 
		  			$stid = oci_parse($conn, "SELECT column_name FROM user_tab_columns where table_name='".$tabla."'");
					oci_execute($stid);
					while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			    	foreach ($fila as $elemento) {
			        	
					echo "<input type=\"text\" class=\"form-control mx-sm-3 py-2 m-3\" placeholder=".($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") ." name=".($elemento !== null ? htmlentities($elemento, ENT_QUOTES):"")."   placeholder=".($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") ." >"	;
			    	}
				}
		  		?>
			 <button type="submit" name="agregar" class="btn btn-primary mx-auto px-4 py-2"><i class="fa fa-plus-square"></i> Agregar datos</button>
			</form>

		</div>
		  <div class="tab-pane fade " id="editar" role="tabpanel" aria-labelledby="editar-tab">


		  	<?php	
				
				$stid = oci_parse($conn, "SELECT column_name FROM user_tab_columns where table_name='".$tabla."'");
				oci_execute($stid);
				echo "<table class=\"table w-auto mx-auto bg-dark table-hover text-white rounded \">";
				echo "<thead class=\" bg-primary\">";
				echo "<tr class=\"w-auto\">";
				while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			    	foreach ($fila as $elemento) {
			        	echo "    <th scope=\"col\">" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</th>\n";
			    	}
				}
				echo "    <th scope=\"col\"></th>\n";
				echo "</tr>";
			  	echo "</thead>";
 
			  	$stid = oci_parse($conn, "SELECT * FROM ".$tabla );
				oci_execute($stid);
				while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			    	echo "<tr>\n";
			    	foreach ($fila as $elemento) {
			        	echo "    <td><input type=\"text\"  class=\"bg-dark text-white border-0 \"  value=\"". ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") ."\" >  </td>\n";
			    	}echo "<td> <button  class=\"btn btn-outline-success m-3\"><i class=\"fa fa-edit\"></i></button></td>";
			    	echo "</tr>\n";
				}
				echo "</table>\n";


				

			?>



		  </div>
		  <div class="tab-pane fade" id="eliminar" role="tabpanel" aria-labelledby="eliminar-tab">
		  	
		 <?php	
				
				$stid = oci_parse($conn, "SELECT column_name FROM user_tab_columns where table_name='".$tabla."'");
				oci_execute($stid);
				echo "<table class=\"table w-auto mx-auto bg-dark table-hover text-white rounded\">";
				echo "<thead class=\" bg-primary\">";
				echo "<tr class=\"w-auto\">";
				while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			    	foreach ($fila as $elemento) {
			        	echo "    <th scope=\"col\" class=\"text-center \" >" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</th>\n";
			    	}
				}
				echo "    <th scope=\"col\"></th>\n";
				echo "</tr>";
			  	echo "</thead>";
 
			  	$stid = oci_parse($conn, "SELECT * FROM ".$tabla );
				oci_execute($stid);
				while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) 
				{

			    	echo "<tr>\n";
			    	foreach ($fila as $elemento) 
			    	{
			        	echo "    <td class=\"text-center \">" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</td>\n";
			    	}
			    	echo "<td> <button type=\"button\" class=\"btn btn-outline-danger m-1\"><i class=\"fa fa-times-circle\"></i></button></td>";
			    	echo "</tr>\n";
				}
				echo "</table>\n";

			?>

		  </div>
		</div>
		<!--CND de bootstrap jquery JS y ajax-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
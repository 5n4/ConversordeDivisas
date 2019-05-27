<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Conversor de Divisas</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script>
			function funcionDivisa(){
				var importe = document.getElementById("importe").value;
				var selectfrom = document.getElementById("sel1").value;
				var selectto = document.getElementById("sel2").value;
				var resultConversion = (importe/selectfrom)*selectto;
				resultConversion = resultConversion.toFixed(7);
				return resultConversion;
			}
		</script>
	</head>
<body>
	<?php
		try{
			$dom = new DOMDocument('1.0');
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			$dom->loadXML(file_get_contents('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml'));
			$auxml = simplexml_import_dom($dom);
			$base=new PDO("mysql:host=localhost; dbname=divisas", "root", ""); //Conexion
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");
			$query="UPDATE valoresdivisa SET valorDivisa= :valor WHERE idAbreviacion= :id";
			foreach($auxml->Cube[0]->Cube[0] as $aux){
				$result=$base->prepare($query);
				$result->bindValue(":valor", $aux['rate']);
				$result->bindValue(":id", $aux['currency']);
				$result->execute();
			}		
		}catch(Exception $e){
				die ("Error: ".$e->getMessage());
		}
	?>
	<div class="jumbotron text-center" style="background-color:#57A639">
	  <h1>Conversor de divisas</h1>
	<p>Cálculos y tipos de cambio en tiempo real.</p> 
	</div>  
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<br><h3>Ingresa el importe:</h3>
				<div class="form-group">
					<input type="text" class="form-control" id="importe">
				</div>
				<br><h3>Selecciona la divisa:<h3>
				<div class="form-group">
						<?php
							echo '<select class="form-control" id="sel1" name="listDivisa">';
								$query="SELECT * from valoresdivisa";
								$result=$base->prepare($query);
								$result->execute();
								while($row = $result->fetch(PDO::FETCH_ASSOC)) {	
									echo '<option value="'.$row["valorDivisa"].'">'.$row["nombreDivisa"].' ('. $row["idAbreviacion"].')</option>';
								}	
							echo '</select>';
						?>
				</div>
			</div>
			<div class="col-sm-4">
				<br><h3>Para:</h3>
				<div class="form-group">
						<?php
							echo '<select class="form-control" id="sel2" name="listDivisa2">';
								$query="SELECT * from valoresdivisa";
								$result=$base->prepare($query);
								$result->execute();
								while($row = $result->fetch(PDO::FETCH_ASSOC)) {	
									echo '<option value="'.$row["valorDivisa"].'">'.$row["nombreDivisa"].' ('. $row["idAbreviacion"].')</option>';
								}	
							echo '</select>';
						?>
				</div>
				<br><h3>Presiona el botón:<h3>
				<div class="form-group">
						<button type="button" class="btn btn-success btn-lg" style="float:right" onclick="document.getElementById('resultado').innerHTML = funcionDivisa()">Conversión</button>
				</div>
			</div>
			<div class="col-sm-4">
				        
				<div class="jumbotron">
					<br><h3>Resultado:</h3>
					<h2 id='resultado'>0.000000</h2> 
				</div>
			</div>
		</div>
	</div>
</body>
</html>

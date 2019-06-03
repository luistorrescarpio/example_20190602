<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo con lectora de barra</title>
	<script src="jquery-1.9.1.min.js"></script>
</head>
<body>
	<h1>Lectura de Barras</h1>
	<input type="text" id="codigo" style="position: absolute;top:-30px;">
	<table border="1" style="text-align: left;">
		<tr>
			<th>Nombres</th>
			<td class="nombres"></td>
		</tr>
		<tr>
			<th>Frecuencia</th>
			<td class="frecuencia"></td>
		</tr>
		<tr>
			<th>serie</th>
			<td class="serie"></td>
		</tr>
	</table>
	<script>
		var timer;
		$(function() {
			
			$("#codigo").focus();

			$("#codigo").delayPasteKeyUp(function(){
				//function 01
				var cod = $("#codigo").val();
				consulta(cod);
			}, 200);

			setInterval(function(){
				$("#codigo").focus();
			},500);
		});

		$.fn.delayPasteKeyUp = function(fn, ms){
	     timer = 0;
	     $(this).on("propertychange input", function()
	     {
	      clearTimeout(timer);
	      timer = setTimeout(fn, ms);
	     });
	    };

		function consulta(codBar){
			console.log("Consultando: "+codBar);

			$.post("consulta.php",{
				action: "getData"
				,dni: codBar
			},function(res){
				console.log(res[0]);
				$(".nombres").html(res[0].nombres);
				$(".frecuencia").html(res[0].frecuencia);
				$(".serie").html(res[0].serie);
			},"json");

			$("#codigo").val("");
			$("#codigo").focus();
		}
	</script>
</body>
</html>
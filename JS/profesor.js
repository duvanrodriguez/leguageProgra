		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var CodColegio= $("#CodColegio").val();
			var codigo= $("#codigo").val();
			var parametros={'action':'ajax','page':page,'q':q,'CodColegio':CodColegio,'codigo':codigo};
			//var parametros={'action':'ajax','page':page,'q':q};
			$("#loader").fadeIn('slow');
			$.ajax({
				data: parametros,
				url:'./ajax/buscar_profesor.php',
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	
		
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar este prfesor!")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_profesor.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}

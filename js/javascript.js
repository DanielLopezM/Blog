  $(document).ready(function() {
      $("#tablacomentarios").dataTable();
  });


$(document).ready(function(){
  $("#bregistro").click(function(){
    $("#registrooculto").slideToggle("slow");
  });

});

$(document).ready(function(){
  $("#bnuevaentrada").click(function(){
    $("#nuevaentrada").slideToggle("slow");
  });

});

$(document).ready(function(){
  $("#bcambiartitulo").click(function(){
    $("#cambiartitulo").slideToggle("slow");
  });

});

$(document).ready(function(){
  $("#bcontrolcomentarios").click(function(){
    $("#controlcomentarios").slideToggle("slow");
  });

});


 function vercomentarios(id)
{
	
	$(document).ready(function(){

	
		$("#"+id+"comments").slideToggle("slow");
	
	});
	
}

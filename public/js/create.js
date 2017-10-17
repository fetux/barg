$(function(){

	$('.error').siblings('input,textarea').css("border","1px solid red");

	$('.selectpicker').selectpicker();
	$('#barrio option').each(function(){
        console.log($(this).data('ciudad') != $('#ciudad option:selected').val());
		if ($(this).data('ciudad') != $('#ciudad option:selected').val()){
                $(this).hide();
        } else {
            // $(this).prop("selected",true)
            $(this).show();
        }
	});

	$('#barrio').change(function(){
    $('.selectpicker').selectpicker('refresh');
  });
  
	$('#ciudad').change(function(){
    // $('.selectpicker').selectpicker('refresh');

		var ciudad_id = $('#ciudad option:selected').val();
    console.log(ciudad_id);
		var i=0;
		var j = false;

		$('#barrio option').each(function(){

			if ($(this).data('ciudad') != ciudad_id){
        $(this).prop("selected", false);
				$(this).hide();
			} else {
        $(this).show();
        if (i++==0) {$(this).prop("selected", true);}
				// console.log($(this).html());
				$(this).removeAttr('style');
			}



		});

		$('.selectpicker').selectpicker('refresh');

	});

});



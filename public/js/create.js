$(function(){

	$('.error').siblings('input,textarea').css("border","1px solid red");

	$('.selectpicker').selectpicker();
	$('#barrio option').each(function(){
        console.log($(this).data('ciudad') != $('#ciudad option:selected').val());
		if ($(this).data('ciudad') != $('#ciudad option:selected').val()){
                $(this).hide();
        } else {
            $(this).prop("selected",true)
        }
	});

	$('#ciudad').change(function(){

		var ciudad_id = $('#ciudad option:selected').val();
		var i=0;
		var j = false;

		$('#barrio option').each(function(){

			if ($(this).data('ciudad') != ciudad_id){
				$(this).hide();
			} else {
				console.log($(this).html());
				if (i++ == 0) {$(this).prop("selected",true),j=true;}
				$(this).removeAttr('style');
			}
		});

		$('.selectpicker').selectpicker('refresh');

	});

});



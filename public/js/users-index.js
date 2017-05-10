$(function(){
	


	$('#users .glyphicon-remove').click(function(){
		
		$('#remove-modal .modal-body p span').html($(this).parent().siblings('td[class="name"]').html());
		
	});	
	
	
	/*
	$('span[data-target="#edit-modal"]').click(function(){
		var row  = $(this).parent('tr');	
		console.log(row);
		console.log($('#edit-modal #email'));
		console.log(row.find('.email').html());	
		$('#edit-modal #email').val(row.find('.email').html());
		$('#edit-modal #name').val(row.find('.name').html());
		$('#edit-modal #level option').each(function(){
			if ($(this).val() == row.find('.level').data('level')) { $(this).prop('selected',true); return false; }
		});
	});
	
	
	if($('#edit-modal .error').lenght != 0) $(this).modal();
	
	*/
	

});

$(document).ready(function(){

	$('#add').click(function(){
		
		var url = $('#add_inp').val();
		var id = $('#add').parent().attr('id');
		
		$.ajax({
			url: base_url+'index.php/user/add_url',
			type:'post',
			data:{ url: url, id: id },
			success: function(data){
				document.location.reload();
			}
		})
	 })

	$('.remove').click(function(){
		
		// var id = $(this).parent().parent().attr('id');
		var value = $(this).parent().prev().text();
				
		$.ajax({
			url: base_url+'index.php/user/remove_url',
			type:'post',
			data:{ value: value },
			success: function(data){
				document.location.reload();
			}
		})
	 })

})
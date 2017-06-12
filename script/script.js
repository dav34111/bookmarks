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

})
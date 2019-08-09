$(document).ready(function(){
	$('.delete').on('click', function(){
		
		var idForm = $(this).val();
		
		$.confirm({
		    title: '¿Estas seguro?',
		    content: 'Deseas eliminar el producto!',
		    buttons: {
		        confirmar: function () {
		            $("#"+idForm).submit();
		        },
		        cancelar: function () {
		            return;
		        }
		    }
		});
	});

});
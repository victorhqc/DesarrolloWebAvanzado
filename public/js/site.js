document.addEventListener('DOMContentLoaded', function() {
    var removeProductButtons = document.querySelectorAll('.remove-product');

    removeProductButtons.forEach(function(button) {
        button.addEventListener('click', handleRemoveProduct, false);
    });

    function handleRemoveProduct(e) {
        e.preventDefault();
        var button = e.target;

        var productId = button.getAttribute('data-product-id');
        if (!productId) return;

        $.confirm({
            title: 'Borrar un producto',
            content: 'Esto no puede revertirse ¿Estás seguro?',
            buttons: {
                confirmar: function() {
                    var form = document.querySelector(
                        'form[data-form-id="' + productId + '"]'
                    )
                    if (!form) return;

                    form.submit();
                },
                cancelar: function() {}
            }
        });
    }
});

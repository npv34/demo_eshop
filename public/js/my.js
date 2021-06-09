$(document).ready(function () {
    $('.update-quantity').click(function () {

        let idProduct = $(this).attr('data-id');
        let newQuantity = $('#quantity-' + idProduct).val();
        let location = window.location.origin;
        console.log(location)

        $.ajax({
            url: location + '/cart/update/' + idProduct,
            data: {
                newQuantity: newQuantity
            },
            method: 'GET',
            success: function (res) {
                $('#cart-subtotal').html(res.cart.totalPrice);
                $('#price-' + idProduct).html(res.cart.items[idProduct].price);
            }
        })
    })
})

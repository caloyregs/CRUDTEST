
$(document).ready(function () {

    $(':input[type="submit"]').prop('disabled', false);
    $('#product').on('change', function () {
        //alert('ready');
        var product_id = $(this).val();

        /*$.get('orders/product/'+product_id, function (data) {
            //$('#cust_id').val(data.id);
            $('#price').val(data.price);
        })*/
        $.ajax({
            url:'product.info',
            //url:"{{route('product.info')}}",
            //url:"orders/products"+product_id,
            method: 'get',
            headers:  {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'product_id':product_id
            },
            dataType:'json',
            success:function(data){
                console.log(data);
                alert(data);
            },
            complete: function() {
                //$('#wait').hide();
                //location.reload(true);
            },
            error: function (jqXHR, exception) {
                console.log(jqXHR);
            }
        });
    });

    $('#qty2').bind('click keyup', function(){
        var qty     = $('#qty2').val();
        var price   = $('#price2').val();

        var ttl = qty * price;

        $('#total2').val(ttl.toFixed(2));
    });

    $('.validd').on('change keyup', function () {
        var qty     = $('#qty').val();
        var price   = $('#price').val();

        var ttl = qty * price;

        $('#total').val(ttl.toFixed(2));

    });

    $('.validd2').on('change keyup', function () {
        var qty     = $('#qty2').val();
        var price   = $('#price2').val();

        var ttl = qty * price;

        $('#total2').val(ttl.toFixed(2));

    });

    /* Show customer */
    $('body').on('click', '#show-order', function () {
        $('#orderCrudModal-show').html("Order Details");
        $('#crud-modal-show').modal('show');
    });

    /* Delete Order */
    /*$('#delete-order').on('click', function () {
        var order_id = $(this).data("id");
        //var token = $("meta[name='csrf-token']").attr("content");
        confirm("Are You sure want to delete !");

        $.ajax({
            method: "post",
            headers:  {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //url: "http://localhost:8080/laravel7-crud/public/orders/"+order_id,
            //url: "orders/"+order_id+"/delete",
            //url:'{{route("orders.destroy")}}',
            url:"{{route('orders.delete')}}",
            data: {
                "id": order_id
                //"_token": token
            },
            success: function (data) {
                $('#msg').html('Order deleted successfully');
                $("#order_id_" + order_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });*/
});
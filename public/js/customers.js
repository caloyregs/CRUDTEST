
$(document).ready(function () {

    /* New customer */
    $('#new-customer').click(function () {
        $('#btn-save').val("create-customer");
        $('#customer').trigger("reset");
        $('#customerCrudModal').html("Add New Customer");
        $('#crud-modal').modal('show');
    });

    /* Edit customer */
    $('body').on('click', '#edit-customer', function () {
        var customer_id = $(this).data('id');

        axios.get('customers/'+customer_id+'/edit', {params: {id: customer_id}})
            .then(function(response) {
                console.log(response.data);
                $('#customerCrudModal').html("Edit customer");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled',false);
                $('#crud-modal').modal('show');
                $('#cust_id').val(response.data.id);
                $('#name').val(response.data.name);
                $('#email').val(response.data.email);
                $('#contact_no').val(response.data.contact_no);
            });
    });

    /* Show customer */
    $('body').on('click', '#show-customer', function () {
        $('#customerCrudModal-show').html("Customer Details");
        $('#crud-modal-show').modal('show');
    });

    /* Delete customer */
    $('body').on('click', '#delete-customer', function () {
    var customer_id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    confirm("Are You sure want to delete !");

    $.ajax({
        type: "DELETE",
        url: "http://localhost:8080/laravel7-crud/public/customers/"+customer_id,
        data: {
            "id": customer_id,
            "_token": token
        },
        success: function (data) {
            $('#msg').html('Customer entry deleted successfully');
            $("#customer_id_" + customer_id).remove();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
    });
    });


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.confirm_order').on('click', function(event) {
    // Prevent button default action.
    event.preventDefault();
    let id = $(this).attr('data-id');
    $(this).prop('disabled', true); // Disable add to cart button.
    // $(this).html() = "please wait";

        $.ajax({
            url: '/admin/order/confirm',
            type: 'GET',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                swal ({
                    title: "success",
                    text: "Order confirmed.",
                    icon: "success"
                });
            },
            error: function (xhr, status, error) {
                swal ({
                    title: "ERROR",
                    text: "Unable to confirm order. try again if the error persist please contact support",
                    icon: "error"
                });
            }
        });
        $(this).prop('disabled', false);
});

$('.cancel_order').on('click', function(event) {
    // Prevent button default action.
    event.preventDefault();
    let id = $(this).attr('data-id');
    $(this).prop('disabled', true); // Disable add to cart button.
    // $(this).html() = "please wait";

        $.ajax({
            url: '/admin/order/cancel',
            type: 'GET',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                swal ({
                    title: "success",
                    text: "Order canceled.",
                    icon: "success"
                });
            },
            error: function (xhr, status, error) {
                swal ({
                    title: "ERROR",
                    text: "Unable to cancel order. try again if the error persist please contact support",
                    icon: "error"
                });
            }
        });
        $(this).prop('disabled', false);
});
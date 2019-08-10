$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.verifyVCC').on('click', function(event) {
    // Prevent button default action.
    event.preventDefault();
    let id = $(this).attr('data-id');
        
    $(this).prop('disabled', true); // Disable add to cart button.
    // $(this).html() = "please wait";

        $.ajax({
            url: '/admin/vendoor/verify',
            type: 'GET',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                swal ({
                    title: "success",
                    text: "Verified.",
                    icon: "success"
                });
                let el = parseInt($('.cart-number').text());
                $('.cart-number').text(el+1);

            },
            error: function (xhr, status, error) {
                swal ({
                    title: "ERROR",
                    text: "unable to verify this shop",
                    icon: "error"
                });
            }
        });
        $(this).prop('disabled', false);
});


$('.blockVCC').on('click', function(event) {
    // Prevent button default action.
    event.preventDefault();
    let id = $(this).attr('data-id');
        
    $(this).prop('disabled', true); // Disable add to cart button.
    // $(this).html() = "please wait";

        $.ajax({
            url: '/admin/vendoor/block',
            type: 'GET',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                swal ({
                    title: "success",
                    text: "done",
                    icon: "success"
                });
                let el = parseInt($('.cart-number').text());
                $('.cart-number').text(el+1);

            },
            error: function (xhr, status, error) {
                swal ({
                    title: "ERROR",
                    text: "unable to perform operation",
                    icon: "error"
                });
            }
        });
        $(this).prop('disabled', false);
});
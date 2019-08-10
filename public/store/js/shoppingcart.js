$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#addToCartBtn').on('click', function(event) {
    // Prevent button default action.
    event.preventDefault();
    let id = $(this).attr('data-id'),
        name = $(this).attr('data-name'),
        price = $(this).attr('data-price'),
        quantity = $('.product-amount-input').val();
        size = $('.product-size').val();
        discountedPrice = $(this).attr('data-discounted');
        image = $(this).attr('data-image');
        slug = $(this).attr('data-slug');
        sku = $(this).attr('data-sku');
        discount = $(this).attr('data-discount');
        seller = $(this).attr('data-seller');

    $(this).prop('disabled', true); // Disable add to cart button.
    // $(this).html() = "please wait";
    if (size === undefined || size == "") {
        swal ({
            title: "Opps",
            text: "please choose a size",
            icon: "warning"
        });
    } else {
        $.ajax({
            url: '/cart/create',
            type: 'GET',
            data: {
                id: id,
                name: name,
                price: price,
                quantity: quantity,
                size: size,
                discountedPrice: discountedPrice,
                image: image,
                slug: slug,
                sku: sku,
                discount: discount,
                seller: seller
            },
            dataType: 'json',
            success: function (data) {
                swal ({
                    title: "success",
                    text: "Item added to cart.",
                    icon: "success"
                });
                let el = parseInt($('.cart-number').text());
                $('.cart-number').text(el+1);

            },
            error: function (xhr, status, error) {
                swal ({
                    title: "ERROR",
                    text: "unable to add item.",
                    icon: "error"
                });
            }
        });
        $(this).prop('disabled', false);
    }
});

$('.filter-size-box').on('click', function(event) {
    // Prevent button default action.
    event.preventDefault();

    // Remove all active class from sizes that are not clicked.
    $('.filter-box a.shop-size-ative').not(this).removeClass('shop-size-ative');

    // Add active class to size that is clicked.
    $(this).toggleClass('shop-size-ative');

    // Get clicked size from attribute and pass it 
    // to #addToCartBtn data-size attribute.
    let size = $(this).attr('data-size');
    $('#addToCartBtn').attr('data-size', size);
});

// Delete one item from the cart.
$('.deleteOneItem').on('click', function(event) {
    event.preventDefault();
    const itemId = $(this).attr('data-id');

    $.ajax({
        url: '/cart/remove-one',
        type: 'POST',
        data: {
            itemId: itemId
        },
        dataType: 'json',
        success: function(data) {
            swal ({
                title: "success",
                text: "Item removed from your cart",
                icon: "success"
            });
            location.reload();
        },
        error: function(xhr, status, error) {
            if (xhr.status == 400) {
                swal ({
                    title: "error",
                    text: "i was unable to remove item from your cart.",
                    icon: "error"
                });            }
        }
    });
});

// Delete all item from the cart.
$('.deleteAll').on('click', function(event) {
    event.preventDefault();

    $.ajax({
        url: '/cart/all',
        type: 'DELETE',
        dataType: 'json',
        success: function (data) {
            location.reload();
        },
        error: function (xhr, status, error) {
            if (xhr.status == 400) {
                alert('An error occurred while removing all items from your cart, please try again later');
            }
        }
    });
});

// Redirect to shopping cart page.
$('.cart-link').on('click', function(event) {
    window.location.href = '/cart';
});
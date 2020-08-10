'use strict'

$(function () {

    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        if ($input.val() <= 1) {
            return false;
        }
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    $('a.add-to-cart').on('click', function (e) {
        e.preventDefault();
        var that = $(this);
        var url = that.attr('href');

        $.ajax({
            url: url,
            method: 'get',
            success: function (response) {
                if (Number(response)) {
                    $('#mini-cart span').text(response);
                    $('#alert').slideDown().removeClass().addClass('alert alert-success').text('The product was added successfully.');
                } else {
                    $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('The action could not be completed.');
                }
            }
        }).fail(function () {
            $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('The action could not be completed.');
        }).always(function () {
            window.setTimeout(function () {
                $('#alert').slideUp();
            }, 3000);

        });
    });

    $('#add-to-cart').on('submit', function (e) {
        e.preventDefault();

        var that = $(this),
                url = that.attr('action'),
                data = that.serialize();

        $.post(url, data, function (response) {
            if (Number(response)) {
                $('#mini-cart span').text(response);
                $('#alert').slideDown().removeClass().addClass('alert alert-success').text('The product was added successfully.');
            } else {
                $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('The action could not be completed.');
            }
        }).fail(function () {
            $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('The action could not be completed.');
        }).always(function () {
            window.setTimeout(function () {
                $('#alert').slideUp();
            }, 3000);
        });

    });

    $('.product-quantity').on('change', debounce(function () {

        var that = $(this),
                parent = that.parents('.update-cart'),
                url = parent.attr('action'),
                data = parent.serialize();

        $.post(url, data, function (response) {
            if (Number(response.cart_count)) {
                $('#mini-cart span').text(response.cart_count);
                $('#alert').slideDown().removeClass().addClass('alert alert-success').text('The cart was updated successfully.');
                that.parents('tr').find('.product-total').text(response.product_total);
                $('.cart-total').text(response.cart_total);
            } else {
                $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('The action could not be completed.');
            }
        }, 'json').fail(function () {
            $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('The action could not be completed.');
        }).always(function () {
            window.setTimeout(function () {
                $('#alert').slideUp();
            }, 3000);
        });
    }, 500));

    $('a.delete-product').on('click', function () {
        return confirm('Are you sure that you want to delete this product?');
    });

    $('a.delete-cart').on('click', function () {
        return confirm('Are you sure that you want to delete the cart content?');
    });

    $('.open-modal').on('click', function () {
        var that = $(this),
                id = that.data('id'),
                name = that.data('name'),
                form = $('#delete-form'),
                route = form.data('route');

        form.attr('action', route + '/' + id);
        $('#confirmModal .modal-body').text('Are you sure you want to delete ' + name + '?');

    });
});

function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this, args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate)
                func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow)
            func.apply(context, args);
    };
}
;
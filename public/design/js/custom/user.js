$(function () {
    /**
     * All Functions for Create Offer Operation
     */
    function cryptoOffer() {
        function assignCryptoValue() {
            $('#crypto-total').text(accounting.formatMoney(_price, '₦'));
            $('#crypto-current').text(accounting.formatMoney(price, '₦'));
            $('#crypto-current1').html('<b>' + accounting.formatMoney(price, '₦') + '</b>');
        }

        /**
         * Change the percentage value in the <span> element
         * @param {any} val
         * @param {function} callback
         */
        function togglePercentage(val, callback) {
            if (val === '')
                val = 0;

            $('#crypto-percent').text(val);

            if (typeof callback === 'function')
                callback();
        }

        $(percentage_inp).on({
            input: function () {
                percentage = $(percentage_inp).val();

                togglePercentage(percentage, function () {
                    selectCryptoOffer(crypto_type, function () {
                        assignCryptoValue();
                    });
                });
            },
            blur: function () {
                let max = $(percentage_inp).attr('max'),
                    min = $(percentage_inp).attr('min');

                if ($(percentage_inp).val() === '')
                    $(percentage_inp).val($(percentage_inp).attr('max'));

                /*if (parseFloat($(percentage_inp).val()) > parseFloat(max) || parseFloat($(percentage_inp).val()) < parseFloat(min)) {
                    alert('Percentage value must be between ' + $(percentage_inp).attr('min') + ' to ' + $(percentage_inp).attr('max'));
                } else if (parseFloat($(percentage_inp).val()) < parseFloat($(percentage_inp).attr('min')))
                    $(percentage_inp).val();*/

                percentage = $(percentage_inp).val();

                togglePercentage(percentage, function () {
                    selectCryptoOffer(crypto_type, function () {
                        assignCryptoValue();
                    });
                });
            }
        });

        togglePercentage(percentage, function () {
            selectCryptoOffer(crypto_type, function () {
                assignCryptoValue();
            });
        });
    }

    /**
     * Delete an offer
     */
    function onDeleteOffer() {
        $('.delete-offer').on('click', function (e) {
            e.preventDefault();
            let uri = $(this).data('uri');

            if (confirm('Are you sure you want to remove this offer?'))
                $.ajax({
                    url: uri, method: 'POST', data: {_method: 'delete', _token: token}, dataType: 'json', complete: function (xhr) {
                        if (xhr.status === 200 || xhr.status === 201)
                            if (xhr.responseJSON === 1) {
                                alert('Offer Has been removed!');
                                urlLocation.reload();
                            } else
                                alert('An error has occurred, please refresh this page and try again.\n Please contact us if this continues!');
                        else
                            alert('An error has occurred, please refresh this page and try again.\n Please contact us if this continues!');
                    }
                });
            else
                alert('Offer deletion canceled!');
        });
    }

    $(view_offer).on('click', function (e) {
        e.preventDefault();
        let uri = $(this).data('uri');

        loadPageData('#user-modal-wrapper', uri, null, 'View Offer', () => {
            percentage_inp = '#percentage';
            percentage = $(percentage_inp).val();
            crypto_type = $('.crypto_type:checked').val();

            $('#show-offer-modal').modal({backdrop: true});
            cryptoOffer();
            onDeleteOffer();
        });
    });

    $('.crypto_type').on('change', function () {
        crypto_type = $(this).val();
        cryptoOffer();
    });

    if (urlLocation.href.includes('offers/create'))
        cryptoOffer();
});

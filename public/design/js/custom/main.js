$(function () {
    let price,
        _price,
        index_price,
        _index_price,
        requested = false,
        percentage_inp = '#percentage',
        view_offer = '.view-offer',
        percentage = $(percentage_inp).val(),
        crypto_type = $('.crypto_type:checked').val(),

        urlLocation = window.location,
        href = urlLocation.href,
        href_array = href.split('/'),
        token = $('meta[name="csrf-token"]').attr('content');


    /**
     * Function to load Page Data Asynchronously
     * @param {selector | string} _wrapper: Element to place BIO information when loaded.
     * @param {string} _uri: URI for the given operation
     * @param {string | object} data: Additional data to be passed with the URI (** optional **)
     * @param {string} _slug: Name of Page to be loaded
     * @param {function} callback: Callback function to be called on load completion (** optional **)
     */
    function loadPageData(_wrapper, _uri, data = null, _slug, callback = null) {
        $(_wrapper).load(_uri, data, function (response, status, xhr) {
            if (status === 'success') {
                if (typeof callback === 'function')
                    callback();
            } else
                alert('There was an error loading ' + _slug + '\r\nPlease reload this page.');
        });
    }

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
                if ($(percentage_inp).val() === '')
                    $(percentage_inp).val($(percentage_inp).attr('max'));

                if (parseFloat($(percentage_inp).val()) > parseFloat($(percentage_inp).attr('max')))
                    $(percentage_inp).val($(percentage_inp).attr('max'));
                else if (parseFloat($(percentage_inp).val()) < parseFloat($(percentage_inp).attr('min')))
                    $(percentage_inp).val($(percentage_inp).attr('min'));

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
     * Get Current Crypto rate and assign values
     * @param {string} _crypto_type
     * @param {function | string} _percentage
     * @param {function} callback
     */
    function selectCryptoOffer(_crypto_type, _percentage = percentage, callback = null) {
        let uri = 'https://api.coinbase.com/v2/exchange-rates?currency=' + _crypto_type;

        $.ajax({
            url: uri, method: 'GET', timeout: 8000, dataType: 'json', complete: function (xhr) {
                let /*_percentage,*/
                    resp = xhr.responseJSON;

                if (xhr.status === 200)

                    if (typeof _percentage === 'function') {
                        price = parseFloat(resp.data.rates.NGN);
                        _price = ((price * _percentage) / 100) + price;
                        /*_percentage = ((price * percentage) / 100);
                        _price = _percentage + price;*/
                    } else {
                        index_price = parseFloat(resp.data.rates.NGN);
                        _index_price = ((index_price * _percentage) / 100) + index_price;
                        console.log(_index_price)
                    }

                if (typeof _percentage === 'function')
                    _percentage();
                else if (typeof callback === 'function')
                    callback();
            }
        });
    }

    $('.crypto_type').on('change', function () {
        crypto_type = $(this).val();
        cryptoOffer();
    });

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

    /**
     * Get Current Crypto rate and assign values every 4000ms(4s)
     * @param target
     * @param _crypto_type
     * @param _percentage
     */
    function currentCryptoOffer(target, _crypto_type, _percentage) {
        (function currentCryptoOffer() {
            setTimeout(() => {
                selectCryptoOffer(_crypto_type, _percentage, function () {
                    $('.crypto-total', target).text(accounting.formatMoney(_index_price, '₦'));
                    $('.crypto-current', target).text(accounting.formatMoney(index_price, '₦'));
                });
                currentCryptoOffer();
            }, 4000);
        })();
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

    if (urlLocation.href.includes('offers/create'))
        cryptoOffer();

    if (urlLocation.pathname === '/offers' || urlLocation.pathname === '/offers/')
        $(view_offer).each(function (idx, val) {
            let target = this,
                _percentage = $(val).data('percent'),
                _crypto_type = $('.crypto-currency', this).html();

            selectCryptoOffer(_crypto_type, _percentage, function () {
                $('.crypto-total', target).text(accounting.formatMoney(_index_price, '₦'));
                $('.crypto-current', target).text(accounting.formatMoney(index_price, '₦'));
            });
            currentCryptoOffer(target, _crypto_type, _percentage);
        });
});

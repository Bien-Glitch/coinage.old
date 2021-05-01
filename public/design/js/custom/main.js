$(function () {
    let price,
        _price,
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
                alert('There was an error loading ' + _slug + '\r\nPlease reload this page.')
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

            $('#crypto-percent').text(val)

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
                if ($(percentage_inp).val() === '') {
                    $(percentage_inp).val(10);
                    percentage = $(percentage_inp).val();

                    togglePercentage(percentage, function () {
                        selectCryptoOffer(crypto_type, function () {
                            assignCryptoValue();
                        });
                    });
                }
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
     * @param {function} callback
     */
    function selectCryptoOffer(_crypto_type, callback = null) {
        /*if (requested)
            return;
        requested = true;*/

        $.ajax({
            url: 'https://api.coinbase.com/v2/exchange-rates?currency=' + _crypto_type,
            method: 'GET',
            timeout: 8000,
            dataType: 'json',
            complete: function (xhr) {
                let _percentage,
                    resp = xhr.responseJSON;

                if (xhr.status === 200) {
                    price = parseFloat(resp.data.rates.NGN);
                    _percentage = ((price * percentage) / 100);
                    _price = _percentage + price;
                }
                if (typeof callback === 'function')
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
        let uri = $(this).data('uri'),
            offer_id = $(this).data('id');

        loadPageData('#user-modal-wrapper', uri, null, 'Offer', () => {
            percentage_inp = '#percentage';
            percentage = $(percentage_inp).val();
            crypto_type = $('.crypto_type:checked').val();

            $('.crypto_type').on('change', function () {
                crypto_type = $(this).val();
                cryptoOffer();
            });
            cryptoOffer();

            $('#show-offer-modal').modal({backdrop: true});
        });
    });
    
    if (urlLocation.href.includes('create'))
        cryptoOffer();

    if (href_array[href_array.length - 1] === 'offers')
        $(view_offer).each(function (idx, val) {
            let target = this;
                percentage = $(val).data('percent');
                crypto_type = $('.crypto-currency', this).html();

            selectCryptoOffer(crypto_type, function () {
                $('.crypto-total', target).text(accounting.formatMoney(_price, '₦'));
            });
        });
});

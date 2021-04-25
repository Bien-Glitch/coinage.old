$(function () {
    let price,
        requested = false,
        percentage_inp = '#percentage',
        percentage = $(percentage_inp).val(),
        crypto_type = $('.crypto_type:checked').val();

    $('.crypto_type').on('change', function () {
        crypto_type = $(this).val();
        cryptoOffer();
    });

    /**
     * All Functions for Create Offer Operation
     */
    function cryptoOffer() {
        $(percentage_inp).on({
            input: function () {
                percentage = $(percentage_inp).val();

                togglePercentage(percentage, function () {
                    selectCryptoOffer(crypto_type);
                });
            },
            blur: function () {
                if ($(percentage_inp).val() === '') {
                    $(percentage_inp).val(10);
                    percentage = $(percentage_inp).val();

                    togglePercentage(percentage, function () {
                        selectCryptoOffer(crypto_type);
                    });
                }
            }
        });

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

        /**
         * Get Current Crypto rate and assign values
         * @param {string} coin
         */
        function selectCryptoOffer(coin = crypto_type) {
            if (requested)
                return;
            requested = true;

            $.ajax({
                url: 'https://api.coinbase.com/v2/exchange-rates?currency=' + coin,
                method: 'GET',
                timeout: 8000,
                dataType: 'json',
                complete: function (xhr) {
                    let _price,
                        _percentage,
                        resp = xhr.responseJSON;
                    console.log(xhr)
                    if (xhr.status === 200) {
                        price = parseFloat(resp.data.rates.NGN);
                        _percentage = ((price * percentage) / 100);
                        _price = _percentage + price;

                        $('#crypto-total').text(accounting.formatMoney(_price, '₦'));
                        $('#crypto-current').text(accounting.formatMoney(price, '₦'));
                    }
                    requested = false;
                }
            });
        }

        togglePercentage(percentage, function () {
            selectCryptoOffer(crypto_type)
        });
    }

    cryptoOffer();
});

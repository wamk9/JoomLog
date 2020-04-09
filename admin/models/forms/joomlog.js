jQuery(function() {
    document.formvalidator.setHandler('version',
        function (value) {
            regex=/^[^0-9]+$/;
            return regex.test(value);
        });
});
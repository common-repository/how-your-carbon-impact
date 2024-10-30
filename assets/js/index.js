jQuery(document).ready(function($) {
    $('.syci code').on('click', function() {
        var codeElement = $(this);
        var code = codeElement.text();

        copyToClipboard(code);
        codeElement.addClass('copied');
        setTimeout(function() {
            codeElement.removeClass('copied');
        }, 1000);
    });

    function copyToClipboard(text) {
        var tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        if (typeof syci_vars !== 'undefined') {
            alert(syci_vars.copyText);
        }
    }
});
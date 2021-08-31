var maxLength = 248;
$('textarea').keyup(function() {
    var length = $(this).val().length;
    var length = maxLength-length;
    $('#chars').text(length);
});

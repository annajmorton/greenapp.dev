$('#guess').on('change', function () {
    var guess = $("#guess").val();
    $('#guessinput').val(guess);
    console.log(guess)
}).change();


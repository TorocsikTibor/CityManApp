$(document).ready(function () {
    $(document).on('click', '.cancel', function () {
        $(this).closest('.city').children('.cityName').show();
        $(this).closest('.cityEditor').remove();
    });
});

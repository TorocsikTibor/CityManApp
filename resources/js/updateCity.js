$(document).ready(function () {
    $(document).on('click', '.update', function () {
        const button = $(this);
        let cityName = button.siblings('.cityValue').val();
        const cityId = button.closest('.city').children('.cityName').data('id');

        let data = {
            'name': cityName,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'county/city/update/' + cityId,
            type: 'POST',
            dataType: "json",
            data: data,
            success: function () {
                button.closest('.city').children('.cityName').text(cityName).show();
                button.closest('.cityEditor').remove();
            },
            error: function () {
                $('#error_message').html("");
                $('#error_message').addClass('alert alert-danger');
                $('#error_message').text('Váratlan hiba történt');
            }
        });
    });
});

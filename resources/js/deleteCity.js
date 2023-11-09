$(document).ready(function () {
    $(document).on('click', '.delete', function () {
        const button = $(this);
        const cityId = button.closest('.city').children('.cityName').data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/county/city/delete/" + cityId,
            success: function () {
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text('City deleted');
                button.closest('.cityEditor').remove();
            }
        });
    });
});

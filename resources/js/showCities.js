$(document).ready(function () {
    $('.selectInput').on('change', function () {
        const selectedInput = $(this).val();
        let cityNames = '';

        $.ajax({
            url: '/county/' + selectedInput,
            type: 'GET',
            dataType: "json",
            success: function (response) {
                $.each(response, function (index, city) {
                    cityNames += '<div class="city mb-3">' +
                        '<p data-id="' + city.id + '" class="cityName">' + city.name + '</p>' +
                        '</div>';
                });
                $('.showCities').append(cityNames);
                let inputHTML =
                    '<label class="form-label mt-5" for="cityName">Új város</label>' +
                    '<div class="d-flex justify-content-between">' +
                    '<input type="text" class="form-control newCityName">' +
                    '<input type="submit" class="btn btn-primary addCity">' +
                    '</div>';
                $('.showNewCity').append(inputHTML);
            }
        });
    });
});

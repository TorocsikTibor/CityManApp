$(document).ready(function () {
    $('.selectInput').on('change', function () {
        let selectedInput = $(this).val();
        let cityNames = '';


        console.log(selectedInput, cityNames);
        $.ajax({
            url: '/county/' + selectedInput,
            type: 'GET',
            dataType: "json",
            success: function (response) {
                $.each(response, function (index, city) {
                    cityNames += `
                        <div class="city mb-3">
                        <p data-id="${city.id}" class="cityName">${city.name}</p>
                        </div>
                    `;
                });
                $('.showCities').html(cityNames);
                $('.showNewCity').replaceWith(`
                    <label class="form-label mt-5" for="cityName">Új város</label>
                    <div class="d-flex justify-content-between">
                    <input type="text" class="form-control newCityName">
                    <input type="submit" class="btn btn-primary addCity">
                    </div>
                `);
            },
            error: function () {
                $('#error_message').html("");
                $('#error_message').addClass('alert alert-danger');
                $('#error_message').text('Váratlan hiba történt');
            }
        });
    });
});

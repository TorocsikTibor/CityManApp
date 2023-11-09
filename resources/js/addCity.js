$(document).ready(function () {
    $(document).on('click', '.addCity', function () {
        const selectedCounty = $('.selectInput').val();
        const cityName = $('.newCityName').val();
        const data = {
            'county_id': selectedCounty,
            'name': cityName,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'county/city/create',
            type: 'POST',
            dataType: "json",
            data: data,
            success: function (response) {
                $('.showCities').append(`
                    <div class="city mb-3">
                        <p data-id="${response.id}" class="cityName">${response.name}</p>
                    </div>
                `);
            }
        });
    });
});

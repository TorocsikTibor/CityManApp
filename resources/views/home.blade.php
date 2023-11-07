<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CityManApp</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <label class="form-label" for="select">Megye</label>
            <select class="form-select" id="selectInput" aria-label="Default select example" name="select">
                <option selected>Válasszon</option>
                @foreach($counties as $county)
                    <option value="{{ $county->id }}">{{ $county->name }}</option>
                @endforeach
            </select>

            <div class="container">
                <div class="col-md-10">
                    <div id="showCities"></div>
                </div>
            </div>

            <div class="container">
                <div class="col-md-10">
                    <div id="showNewCity"></div>
                </div>
            </div>

        </div>
    </div>
</main>

<script type="module">
    $(document).ready(function () {
        $('#selectInput').on('change', function () {
            let selectedInput = $(this).val();
            let cityNames = '';

            $.ajax({
                url: '/county/' + selectedInput,
                type: 'GET',
                dataType: "json",
                success: function (response) {
                    $.each(response, function (index, city) {
                        cityNames += '<p data-id="'+ city.id +'" class="cityId">' + city.name + '</p>';
                    });
                    $('#showCities').append(cityNames);
                    let inputHTML =
                        '<label class="form-label" for="cityName">Új város</label>' +
                        '<input type="text" class="form-control" id="cityName">' +
                        '<input type="submit" id="addCity" class="btn btn-primary">';
                    $('#showNewCity').append(inputHTML);
                }
            });
        });

        $(document).on('click', '#addCity', function () {
            let selectedCounty = $('#selectInput').val();
            let cityName = $('#cityName').val();
            let data = {
                'county_id': selectedCounty,
                'name': cityName,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            console.log(selectedCounty, cityName);
            $.ajax({
                url: 'county/city/create',
                type: 'POST',
                dataType: "json",
                data: data,
                success: function (response) {
                    $('#showCities').text(response.name);
                }
            });
        });

        $('#showCities').on('click', '.cityId', function () {
            let textId = $(this).data('id');
            let textValue = $(this).text();
            console.log(textValue);
            let inputText = '<input class="form-control" id="inputField" type="text" value="' + textValue + '">' +
                '<input class="btn btn-primary" id="modify" type="submit" value="módosít">' +
                '<input class="btn btn-primary" id="delete" type="submit" value="Törlés">' +
                '<input class="btn btn-primary" id="cancel" type="submit" value="Mégsem">';
            $(this).replaceWith(inputText);

            $(document).off('click', '#cancel');
            $(document).on('click', '#cancel', function () {
                let textValue = $('#inputField').val();
                let pElement = $('<p class="cityId" data-id="' + textId + '">' + textValue + '</p>');
                $(this).siblings('#modify, #delete, #cancel').remove(); // Remove the input fields and buttons
                $(this).siblings('#inputField').replaceWith(pElement); // Replace the "Cancel" button with the <p> element
                $(this).remove();
                console.log('Cancel button clicked');
            });
        });
    });
</script>
</body>
</html>

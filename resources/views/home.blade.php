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

        </div>
    </div>
</main>

<script type="module">
    $(document).ready(function () {
        $('#selectInput').on('change', function () {
            let selectedInput = $(this).val();
            console.log(selectedInput);
            let cityNames = '';

            $.ajax({
                url: '/county/' + selectedInput,
                type: 'GET',
                dataType: "json",
                success: function (response) {
                    $.each(response, function (index, city) {
                        cityNames += city.name;
                    });
                    console.log(cityNames);
                    $('#showCities').text(cityNames);
                    let inputHTML = '<label class="form-label" for="cityName">Új város</label>' +
                        '<input type="text" class="form-control" id="cityName">' +
                        '<input type="submit" id="addCity" class="btn btn-primary">';
                    $('#showCities').append(inputHTML);

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
                   console.log(response)
               }
           });
        });
    });
</script>
</body>
</html>

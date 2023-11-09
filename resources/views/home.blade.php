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
                    <div class="col-xl-4">
                        <div id="success_message"></div>
                        <div id="error_message"></div>

                        <label class="form-label" for="select">Megye</label>
                        <select class="form-select mb-3 selectInput" aria-label="Default select example" name="select">
                            <option selected>Válasszon</option>
                            @foreach($counties as $county)
                                <option value="{{ $county->id }}">{{ $county->name }}</option>
                            @endforeach
                        </select>

                        <div class="showCities mb-3"></div>
                        <div class="showNewCity"></div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

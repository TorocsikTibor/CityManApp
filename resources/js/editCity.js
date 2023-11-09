$(document).ready(function () {
    $('.showCities').on('click', '.city', function () {
        if ($(this).has('.cityEditor').length === 0) {
            const cityNameEl = $(this).children('.cityName');
            const cityName = cityNameEl.text();
            $(cityNameEl).hide();

            $(this).append(
                `
                 <div class="cityEditor d-flex justify-content-between">
                <input type="text" name="name" class="form-control cityValue" value="${cityName}">
                <input type="button" class="btn btn-primary update" value="Mentés">
                <input type="button" class="btn btn-danger mx-1 delete" value="Törlés">
                <input type="button" class="btn btn-primary cancel" value="Mégse">
                </div>
                `
            );
        }
    });
});

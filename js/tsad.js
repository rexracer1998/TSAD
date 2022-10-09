$(document).ready(function(){
    // Defining the local dataset
    var cars = $.getJSON('/autocomplete.php');
    
    // Constructing the suggestion engine
    var cars = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: cars
    });
    
    // Initializing the typeahead
    $('.typeahead').typeahead({
        hint: true,
        highlight: true, /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing suggestions */
    },
    {
        name: 'cars',
        source: cars
    });
    $(".tt-hint").addClass("form-control");
});

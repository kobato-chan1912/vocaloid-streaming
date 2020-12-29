$(document).ready(function($) {

    var baseUrl = "{{ asset('img/') }}";
    console.log(baseUrl);
    var engine1 = new Bloodhound({
        remote: {
            url: route("searching_value"),
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });



    $(".search-input").typeahead({
        hint: true,
        highlight: false,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'User-name',
            display: function(data) {
                return data.name;
                console.log(data.name);
            },
            templates: {
                empty: [
                    '<div class="header-title"></div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="header-title"></div><div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="watch/video=' + data.id  + '" class="list-group-item"><img style="padding-right: 10px" width="100px" src="' + route('screen', {id2: data.id_format, id: data.id_format})  +'">' + data.title  + '</a>';
                }
            }
        },

    ]);
});


    $(document).ready(function($) {
        var engine1 = new Bloodhound({
            remote: {
                url: '/search/name?value=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        var engine2 = new Bloodhound({
            remote: {
                url: '/search/email?value=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        $("#search").typeahead({
            hint: false,
            highlight: false,
            minLength: 1
        }, [
        {
            source: engine1.ttAdapter(),
            name: 'students-name',
            display: function(data) {
                return data.name;
            },
            templates: {
                        // empty: [
                        // '<div class="header-title">Name</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không có kết quả phù hợp</div></div>'
                        // ],
                        suggestion: function (data) {
                        return '<a href="../../detail/' + data.id + '/' + data.slug + '.html" class="list-group-item list-group-item-action list-group-item-success" style="margin-left:40px">' + '<img style="width:50px;height:50px;margin-right:20px" src="/bower_components/avatar/' + data.img +'">'  + data.name_product + '</a>'
                    }
                }
            }, 
        ]);
    });

$(document).ready(function() {

    function display(friends) {
        $(".row").empty();
        $(".row").append(friends);
    }

    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "app/friends",
                data: {term: request.term},
                success: function(data) {
                    display(data);
                    console.log(response);
                }
            });
        },
        minLength: 2,
        open: function(event, ui) {
            $(".ui-autocomplete").hide();
        }
    });

});

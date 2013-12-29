$(document).ready(function() {

    function display(friends) {
        $(".row").empty();
        $(".row").append(friends);
    }
    
    
    // Reload random friends on empty search field
    $("#search").on('input', function() {
        if($(this).val() == "") {
            $.ajax({
                url: "app/friends",
                data: {
                    term: "load.random"
                },
                success: function(data) {
                    display(data);
                //console.log(response);
                }
            });
        }
    })
    

    /**
    * Use autocomplete lib to load friend list 
    */
    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "app/friends",
                data: {
                    term: request.term
                },
                success: function(data) {
                    display(data);
                //console.log(response);
                }
            });
        },
        minLength: 2,
        open: function(event, ui) {
            $(".ui-autocomplete").hide();
        }
    });

});

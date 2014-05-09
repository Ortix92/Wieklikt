$(document).ready(function() {

    function display(friends) {
        $("#friendList").empty();
        $("#friendList").append(friends);
    }
    
    /*************************************
     * Load only males
     *************************************/
    $("#gender-male").click(function() {
        $("#gender-alert").slideDown().delay(4000).slideUp();
        $.ajax({
            url: "app/friends",
            data: {
                term: "gender.male"
            },
            success: function(data) {
                display(data);
            //console.log(response);
            }
        });
    })
    
    /*************************************
     * Load only females
     *************************************/
    
    $("#gender-female").click(function() {
        $.ajax({
            url: "app/friends",
            data: {
                term: "gender.female"
            },
            success: function(data) {
                display(data);
            //console.log(response);
            }
        });
    })
    
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

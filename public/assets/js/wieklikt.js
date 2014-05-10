$(document).ready(function() {
    
    function bubbleUp(speed) {
        var speedVar = 250;
        switch(speed) {
            case "fast":
                speedVar = 150;
                break;
            case "normal":
                speedVar = 250;
                break;
            case "slow":
                speedVar = 400;
                break;
            case undefined:
                speedVar = 250;
                break;
        }
         
        $('.bubble').each(function(i, el) {
            // Store current width
            $(el).data('width', $(el).css('width'));
                
            // Set width to 0 so we can resize it later to stored width
            $(el).css('width',0);
            $("p",el).css('display','none');
            $("img",el).css('width',0);
            $(el).removeClass('bubble');
                
            // First animate the container, then the image, then the name 
            // all of these events are nested in their parent's callback
            setTimeout(function(){
                $(el).animate({
                    'width':$(el).data('width')
                }, speedVar,"linear",function() {
                    $(el).removeAttr("style")
                    $("img",el).animate({
                        'width':"100%"
                    }, speedVar,"linear",function() {
                        $("img",el).removeAttr("style")
                        $("p",el).fadeIn();
                    });
                });
            },speedVar/2 + ( i * speedVar/2 ));
        });
        
    }
    function displayFriends(friends) {
        $("#friendList").empty().hide();
        $("#friendList").append(friends).waitForImages(function() {
            bubbleUp();
            $(this).fadeIn("slow");
        });
    }
    
    function getFriends(type) {
        $.ajax({
            url: "app/friends",
            data: {
                term: type
            },
            success: function(data) {
                displayFriends(data);
            //console.log(response);
            }
        });
    }
    
    function getNotification(notification) {
        $.ajax({
            url: "util/notification/"+notification,
            success: function(data) {
                if(!$("#"+notification).length) {
                    $(data).appendTo($("#notification-wrapper")).slideDown();
                }
            }
        });
    }
    
    /***************************************************************************/
    /***************************************************************************/
    /***************************************************************************/
    
    /***************************************************************************/
    /*
    /* Household shit to do right after the page is first loaded
    /* 
    /***************************************************************************/
    
    bubbleUp();
    
    $("#friendList").waitForImages(function() {
        $(this).fadeIn("fast");
    })
    
    /***************************************************************************/
    /*
    /* All the other event crap
    /* 
    /***************************************************************************/
    
    
    $("#gender-male").click(function() {
        getFriends("gender.male");
        setTimeout(function() {
            getNotification("gender-privacy")
        }, 250);
    })
    
    $("#gender-female").click(function() {
        getFriends("gender.female");
        setTimeout(function() {
            getNotification("gender-privacy")
        }, 250);
    })
    
    // Reload random friends on empty search field
    $("#search").on('input', function() {
        if($(this).val() == "") {
            getFriends("load.random");
        }
    })
    
    //Use autocomplete lib to load friend list 
    $("#search").autocomplete({
        source: function(request, response) {
            getFriends(request.term);
        },
        minLength: 2,
        open: function(event, ui) {
            $(".ui-autocomplete").hide();
        }
    });

});

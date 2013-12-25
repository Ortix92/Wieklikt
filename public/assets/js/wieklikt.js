$(document).ready(function() {

    $(function display(friends) {
        $("#container").empty();

        $.each(friends, function(index, friend) {
            var html = '<div class="profileImage" style="float:left;padding:20px; width:200px">';
            html += '<a href="/app/click/' + friend.id + '">';
            html += '<img  id="' + friend.id + ' " src="https://graph.facebook.com/' + friend.id + '/picture?width=200&height=200 " />';
            html += '</a>';
            html += '</div>';
            $("#container").append(html);
        });
    })
    $("#search").autocomplete({
        source: "/app/friends",
        minLength: 2,
        response: function(event, ui) {
            display(ui.content);
        },
        open: function(event, ui) {
            $(".ui-autocomplete").hide();
        }

    });
});


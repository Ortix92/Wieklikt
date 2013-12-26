$(document).ready(function () {
    function display(friends) {
        $(".row").empty();

        $.each(friends, function (index, friend) {
            var html = '<div class="col-xs-6 col-sm-4 col-md-2 fb-friend">';
            html += '<a href="/app/click/' + friend.id + '">';
            html += '<img class="img-rounded img-responsive" width="200px" src="https://graph.facebook.com/' + friend.id + '/picture?width=200&height=200 " title="' + friend.name + ' " alt="' + friend.name + ' " />';
            html += '<p class="text-center">' + friend.name + ' </p>';
            html += '</a>';
            html += '</div>';
            $(".row").append(html);
        });
    }
    
    $("#search").autocomplete({
        source: "/app/friends",
        minLength: 2,
        response: function (event, ui) {
            display(ui.content);
        },
        open: function (event, ui) {
            $(".ui-autocomplete").hide();
        }
    });

});

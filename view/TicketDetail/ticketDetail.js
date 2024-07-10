function init() {
    
}


$(document).ready(function () {
    var ticket_id = getUrlParameter('ID');
    $.post("../../controller/ticket.php?op=get_ticket_details_by_user",{ticket_id:ticket_id}, function (data) {
        $("#section-ticket-detail").html(data);
    })
    
});

//capture ID parameter
var getUrlParameter = function getUrlParameter(sParam)
{
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

    for (i=0; i< sURLVariables.length;i++)
    {
        sParameterName=sURLVariables[i].split('=');

        if(sParameterName[0] === sParam)
        {
            return sParameterName[1]=== undefined ? true: sParameterName[1];
        }
    }
}

init();
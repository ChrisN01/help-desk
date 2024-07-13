function init() {
    
}

$(document).ready(function () {
    var ticket_id = getUrlParameter('ID');

    listTicketDetails(ticket_id);
    
    console.log('entrando por primera vez')


    $('#ticket_description').summernote({
        height: 400,
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        },
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
    $('#ticket_description').summernote('disable');
    
    $('#ticket_details_description').summernote({
        height: 400,
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        },
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });



});

$(document).on( "click", "#btn-saveTicketDetails", function () {
    var ticket_id = getUrlParameter('ID');
    var user_id= $('#user_id').val();
    var description= $('#ticket_details_description').val();

    if($('#ticket_details_description').summernote('isEmpty'))
    {
        swal({
            title: "Error!",
            text: "Description field is empty!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ok"
        });
    }
    else
    {
        $.post("../../controller/ticket.php?op=insert_ticket_details",{ticket_id:ticket_id,user_id:user_id,description:description}, function (data) {
            listTicketDetails(ticket_id);
            
            console.log('entrando desde guardar ticket')
    
            $('#ticket_details_description').summernote('reset');
    
            swal({
                title: "Success!",
                text: "Records saved successfully! ",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Success"
            });
        })
    }



});

$(document).on( "click", "#btn-closeTicket", function () {
    var ticket_id = getUrlParameter('ID');
        swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this ticket!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.post("../../controller/ticket.php?op=close_ticket",{ticket_id:ticket_id}, function (data) {     })

                        swal({
                            title: "Closed!",
                            text: "Your ticket has been closed.",
                            type: "success",
                            confirmButtonClass: "btn-success"
                        });
                    }
                });


    
});


//obtains the ticket detail information
function listTicketDetails(ticket_id)
{
    //This is a list of ticket history
    $.post("../../controller/ticket.php?op=get_ticket_details_by_user",{ticket_id:ticket_id}, function (data) {
        $("#section-ticket-detail").html(data);
    })

    //The ticket information is listed in section-header
    $.post("../../controller/ticket.php?op=show_ticket_detail",{ticket_id:ticket_id}, function (data) {

        data= JSON.parse(data);
        $("#ticket_id_text").html('Ticket Detail - ' + data.id);
        $("#ticket_status").html(data.ticket_status);
        $("#ticket_username").html(data.name);
        $("#ticket_created_at").html(data.created_at);
        $("#category").val(data.category);
        $("#title").val(data.title);
        $("#ticket_description").summernote('code', data.description);      

    })
}






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
console.log("Hola");

function init()
{

    $('#ticket_form').on("submit", function(e)
    {
        saveTicket(e);
    });  
}
$(document).ready(function() {
    $('#description').summernote({
        "height":200,
    });

    $.post("../../controller/Category.php?op=combo", function(data, status){
        $('#category_id').html(data)

    });
    
});

/* TODO:Save ticket */
function saveTicket(e) {
        e.preventDefault();

        var formData = new FormData($("#ticket_form")[0]);
        if($('#description').summernote('isEmpty') || $('#title').val()=='')
        {
            swal({
                title: "Error!",
                text: "Editor content is empty!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok"
            });
        }
        else{
            $.ajax({

                url: "../../controller/Ticket.php?op=create",
                type: "POST",
                data: formData,
                contentType: false,
                processData:false,
                success: function(data){
                    $('#title').val('');
                    $('#description').summernote('reset');
        
                    swal({
                        title: "Success!",
                        text: "Your ticket has been created!",
                        type: "success",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Success"
                    });
                }
            });  
            
            
        }
    
}

init();
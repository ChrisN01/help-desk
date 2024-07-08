function init() {
    
}



$(document).ready(function () {
    
});

$(document).on("click", "#btn-support", function () {
   if( $('#rol_id').val() ==1)
    {
        $('#signInUserTitle').html("Support area Login");
        $('#btn-support').html("User Login");
        $('#rol_id').val(2);
    }
    else{
        $('#signInUserTitle').html("User Login");
        $('#btn-support').html("Login for support area");
        $('#rol_id').val(1);
    }

});

init();
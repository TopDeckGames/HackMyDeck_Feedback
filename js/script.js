$( document ).ready(function() {
   $(".well form button.submit").on("click", function()
   {
        var email = $(".well form input[name=email]").val();
        if(!isEmail(email))
        {
            alert("Adresse email incorrecte");
            return false;
        }

        var type = $(".well form input[name=type]:checked").val();
        if(!type)
        {
            alert("Type non sélectionné");
        }

        var message = $(".well form textarea[name=message]").val();
        if(!message || message.trim() == "")
        {
            alert("Un message est requis");
        }

       $(".well form button.submit").css("display", "none");
       $(".well form img.loader").css("display", "block");

       $.ajax({
            url: "rapport.php",
            type: $(".well form").attr("method"),
            data: {email: email, type: type, message: message.trim()}
       }).done(function(result)
       {
            var data = jQuery.parseJSON(result);
            if(data.code == 0)
            {
                $(".well form")[0].reset();
                alert(data.message);
            }
            else
            {
                alert("Erreur : " + data.message);
            }
       }).fail(function()
       {

       }).always(function()
       {
           $(".well form button.submit").css("display", "block");
           $(".well form img.loader").css("display", "none");
       });
   });
});

function isEmail(myVar){
    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
    return regEmail.test(myVar);
}
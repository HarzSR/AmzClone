$(document).ready(function() {

    var pageCheck = ((window.location.pathname).split("/").pop());

    if(pageCheck === 'admin-password')
    {
        $("#new_password").attr("disabled", "disabled");
        $("#new_password").val("");
        $("#confirm_password").attr("disabled", "disabled");
        $("#confirm_password").val("");
        $("#passUpdate").attr("disabled", "disabled");

        $("#current_password").keyup(function (){

            var current_password = $("#current_password").val();
            // console.log(current_password);

            $.ajax({
                type: 'post',
                data: {
                    current_password: current_password,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/check-current-password',
                success: function (response)
                {
                    console.log(response);
                    if(current_password == "")
                    {
                        $("#currentPassError").html("<font color='orange'> Please enter your current password to update to new One. </font>");
                        $("#new_password").attr("disabled", "disabled");
                        $("#new_password").val("");
                        $("#confirm_password").attr("disabled", "disabled");
                        $("#confirm_password").val("");
                    }
                    else if(response == "False")
                    {
                        $("#currentPassError").html("<font color='red'> Password is Incorrect. Please try again. </font>");
                        $("#new_password").attr("disabled", "disabled");
                        $("#new_password").val("");
                        $("#confirm_password").attr("disabled", "disabled");
                        $("#confirm_password").val("");
                    }
                    else if(response == "True")
                    {
                        $("#currentPassError").html("<font color='green'> Password is Correct. Please enter your new Password. </font>");
                        $("#new_password").removeAttr("disabled");
                        $("#confirm_password").removeAttr("disabled");
                        $("#passUpdate").removeAttr("disabled");
                    }
                },
                error: function (response)
                {
                    // console.log("Error : " + response);
                }
            });
        });
    }
});

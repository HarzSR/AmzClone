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
                    // console.log(response);
                    if(current_password == "")
                    {
                        $("#currentPassError").html("<font color='blue'> Please enter your current password to update to new one. </font>");
                        $("#new_password").attr("disabled", "disabled");
                        $("#new_password").val("");
                        $("#confirm_password").attr("disabled", "disabled");
                        $("#confirm_password").val("");
                        $("#passUpdate").attr("disabled", "disabled");
                    }
                    else if(response == "False")
                    {
                        $("#currentPassError").html("<font color='red'> Password is Incorrect. Please try again. </font>");
                        $("#new_password").attr("disabled", "disabled");
                        $("#new_password").val("");
                        $("#confirm_password").attr("disabled", "disabled");
                        $("#confirm_password").val("");
                        $("#passUpdate").attr("disabled", "disabled");
                    }
                    else if(response == "True")
                    {
                        $("#currentPassError").html("<font color='green'> Password is Correct. Please enter your new Password. </font>");
                        $("#new_password").removeAttr("disabled");
                        $("#confirm_password").removeAttr("disabled");
                    }
                },
                error: function (response)
                {
                    // console.log("Error : " + response);
                }
            });
        });

        $("#confirm_password").keyup(function () {

            var new_password = $("#new_password").val();
            $("#passUpdate").attr("disabled", "disabled");
            var confirm_password = $("#confirm_password").val();

            if(confirm_password == "")
            {
                $("#confirmPassError").html("<font color='blue'> Please enter the new password again for verification. </font>");
            }
            else if(new_password != confirm_password)
            {
                $("#confirmPassError").html("<font color='red'> Password don't match. </font>");
                $("#newPassError").html("");
            }
            else if(new_password == confirm_password)
            {
                $("#confirmPassError").html("<font color='green'> New password matched. </font>");
                $("#newPassError").html("");
                $("#passUpdate").removeAttr("disabled");
            }
        });

        $("#new_password").keyup(function () {

            var new_password = $("#new_password").val();
            $("#passUpdate").attr("disabled", "disabled");
            var confirm_password = $("#confirm_password").val();

            if(new_password == "" && confirm_password != "")
            {
                $("#newPassError").html("<font color='blue'> Please enter the new password. </font>");
                $("#confirm_password").val("");
            }
            else if(new_password != confirm_password && confirm_password != "")
            {
                $("#newPassError").html("<font color='red'> Password don't match. </font>");
            }
            else if(new_password == confirm_password && confirm_password != "")
            {
                $("#passUpdate").removeAttr("disabled");
            }
        });
    }
});

$(function() {
    $('#deleteAdmin').on('click', function() {
        var deleteName = $(this).attr('dataName');
        var deleteId = $(this).attr('dataId');
        swal({
            title: 'Requesting Confirmation',
            text: 'Do you want to delete ' + deleteName + ".",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#D33',
            confirmButtonText: 'Yes, Delete it',
            focusCancel: true,
        }, function() {
            window.location.href = "/admin/delete-" + deleteId;
        });
    });
});

$(function() {
    $('#deleteVendor').on('click', function() {
        var deleteName = $(this).attr('dataName');
        var deleteId = $(this).attr('dataId');
        var deleteSlug = $(this).attr('slug');
        swal({
            title: 'Requesting Confirmation',
            text: 'Do you want to delete ' + deleteName + ".",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#D33',
            confirmButtonText: 'Yes, Delete it',
            focusCancel: true,
        }, function() {
            window.location.href = "/admin/delete-" + deleteId + "/" + deleteSlug;
        });
    });
});

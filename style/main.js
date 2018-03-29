// Checking username availability
function checkUsernameAvailability() {
    var my_user = username.value;
    $.ajax({
        url: "config/check_field.php",
        data:'username='+my_user,
        type: "POST",
        success:function(data){

            if (data == 'True'){
                $('#register').prop('disabled', 'disabled');
                $('.username-failure').show()
                $('.username-success').hide();
            } else {
                $('#register').prop('disabled', false);
                $('.username-failure').hide();
                $('.username-success').show();
            }
        },
        error:function (){
        }
    });
}

// checking email address availability
function checkEmailAvailability() {
    var email_user = email.value;
    $.ajax({
        url: "config/check_field.php",
        data:'email='+email_user,
        type: "POST",
        success:function(data){

            if (data == 'True'){
                $('#register').prop('disabled', 'disabled');
                $('.email-failure').show()
            } else {
                $('#register').prop('disabled', false);
            }
        },
        error:function (){
        }
    });
}
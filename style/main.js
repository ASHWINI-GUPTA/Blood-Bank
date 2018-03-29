// Checking username availability
function checkUsernameAvailability() {
    var my_user = username.value;
    $("#loaderIcon").show();
    $.ajax({
        url: "config/check_field.php",
        data:'username='+my_user,
        type: "POST",
        success:function(data){

            if (data == 'True'){
                $('#register').prop('disabled', 'disabled');
                $('.username-failure').show()
                $('.username-success').hide();
                $("#loaderIcon").hide();
            } else {
                $('#register').prop('disabled', false);
                $('.username-failure').hide();
                $('.username-success').show();
                $("#loaderIcon").hide();
            }
        },
        error:function (){
        }
    });
}

// checking email address availability
function checkEmailAvailability() {
    var email_user = email.value;
    $("#loaderIcon").show();
    $.ajax({
        url: "config/check_field.php",
        data:'email='+email_user,
        type: "POST",
        success:function(data){
            if (data == 'True'){
                $('#register').prop('disabled', 'disabled');
                $('.email-failure').show()
                $("#loaderIcon").hide();
            } else {
                $('#register').prop('disabled', false);
                $("#loaderIcon").hide();
            }
        },
        error:function (){
        }
    });
}
/**
 * Created by Pablo Henrick Diniz on 19/08/14.
 */
$(document).ready(function(){
    var usuarioRequest = false;
    var emailRequest = false;

    var user = function(){
        if(!usuarioRequest){
            usuarioRequest = true;
            var username = $(this).val();
            $.ajax({
                url:'loginExists/'+username,
                success:function(data){
                    usuarioRequest = false;
                    if(data.trim()==='true'){
                        $("#user_check").show();
                    }
                    else{
                        $("#user_check").hide();
                    }
                },
                error:function(data){
                    usuarioRequest = false;

                }
            });
        }
    }

    var email = function(){
        if(!emailRequest){
            emailRequest = true;
            var email = $(this).val();
            $.ajax({
                url:'emailExists/'+email,
                success:function(data){
                    emailRequest = false;
                    if(data.trim() ==='true'){
                        $("#email_check").show();
                    }
                    else{
                        $("#email_check").hide();
                    }
                },
                error:function(data){
                    emailRequest = false;

                }
            });
        }
    }

    $("#usuario").keyup(user);
    $("#email").keyup(email);
    $("#usuario").change(user);
    $("#email").change(email);

});
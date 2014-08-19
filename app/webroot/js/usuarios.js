/**
 * Created by Pablo Henrick Diniz on 18/08/14.
 */
$(document).ready(function(){
    $('.apagar').click(function(){
        var id = parseInt($($(this).parent().parent().children()[0]).html());
        var user =   $(this).parent().parent();
        $.ajax({
            url:'delete/'+id,
            type:'post',
            success:function(data){
              $(user).remove();
            },
            error:function(data){
               $('tr').append(data);
            }
        });
    });
});
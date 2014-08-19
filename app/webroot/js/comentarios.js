$(document).ready(function(){
    $('.apg-btn').click(function(){
        var id = $(this).prop('id');
        var comentario = $(this).parent().parent().parent().parent();
        $.ajax({
            url:'../../comentarios/deletar/'+id,
            type:'post',
            success:function(data){
               $(comentario).remove();
            },
            error:function(data){
                //alert(data.responseText);
            }
        });
    });
});
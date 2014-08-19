/**
 * Created by Pablo Henrick Diniz on 18/08/14.
 */
$(document).ready(function(){
    $('.aprovar').click(function(){
        var id = parseInt($($(this).parent().parent().children()[0]).html());
        $.ajax({
            url:'aprovar/'+id,
            type:'post',
            success:function(data){

            },
            error:function(data){

            }
        })
    });

    $('.desaprovar').click(function(){
        var id = parseInt($($(this).parent().parent().children()[0]).html());
        $.ajax({
            url:'desaprovar/'+id,
            type:'post',
            success:function(data){

            },
            error:function(data){

            }
        })
    });
});
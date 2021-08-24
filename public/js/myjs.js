$(document).ready(
    
    $('.delete_item').on('click', function(){
        
        var data = $(this).attr('value');
        var path= $(this).attr('data-path');
        $.ajax({
            method:'POST',
            url: path,
            data: {id: data },
            susscess: function (){

            }
        });
    }),

    $('.new').on('click', function(){
       var task = $('.task').text();
       var category= $('.category').text();
       alert(task);
       $.ajax({
           method:'GET',
            url: path,
            data: {task: task, category:category},
            susscess: function (){

            }
        })
    })

    
);
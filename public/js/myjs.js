$(document).ready(
    
    $('.delete_item').on('click', function(){
        
        var data = $(this).attr('value');
        var path= $(this).attr('data-path');
        $('.'+data+'').remove();
        $.ajax({
            method:'POST',
            url: path,
            data: {id: data },
            success: function (){
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
         
        })
    })

    
);
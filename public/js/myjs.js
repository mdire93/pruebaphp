$(document).ready(
    
    $('.delete_item').on('click', function(){
        
        let data = $(this).attr('value');
        let path= $(this).attr('data-path');
        let element=$('.'+data+'');
        $.ajax({
            method:'POST',
            url: path,
            data: {id: data },
            success: function (){

                element.remove();
            }
        });
    }),

    $('.new').on('click', function(){
        let task = $('.task').text();
        let category= $('.category').tex();
        let path= $(this).attr('data-path');
       alert(task);
       $.ajax({
           method:'GET',
            url: path,
            data: {task: task, category:category},
         
        })
    })

    
);
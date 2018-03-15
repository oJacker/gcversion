$(function(){
    $(document).on('click','.language',function(){
        var lang = $(this).attr('id');
        $.post('index.php?r=site/language',{'lang' : lang}, function(data){
             location.reload();   
        });
    });
    
    
    $(document).on('click','.fc-day',function(){
        var date = $(this).attr('data-date');
        $.get('index.php?r=events/create',{'date' : date}, function(data){
            $('#modal').modal('show')
               .find('#modalContent').html(data);    
        });
    });
    
    
    //get the click of the crate button
   $('#mButton').click(function(){
       $('#modal').modal('show')
               .find('#modalContent')
               .load($(this).attr('value'));
   }) ;
});



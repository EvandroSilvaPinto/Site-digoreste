
;(function($){

    function SelectForm() {
        var url = $("#app_url").val();
        $('#category_id').change(function(e){
            var category = $('#category_id').val();
            
             
            $.getJSON(url + '/selector/'+category, function (dados){    
                
                console.log(dados);

               if (dados.length > 0){    
                var option = '<option value="">Selecione</option>';
                  $.each(dados, function(i, obj){
                      option += '<option value="'+obj.subcategory_id+'">'+obj.title+'</option>';
                  })
               }
               $('#subcategory_id').html(option).show(); 
            })
        })

    
    }

   	new SelectForm();

}(jQuery));
 
 
 
 



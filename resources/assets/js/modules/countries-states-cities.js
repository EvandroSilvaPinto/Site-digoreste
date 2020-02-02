;(function($){

    //C = Countries
    //S = States
    //C = Cities
    // CSC

    function CSC() {

        var _ = this;

        _.API = $("#app_url").val() + "/api/";

        $("select#countries_id").on("change", function()
        {
            _.reset();

            if($(this).val() == "")
            {
                return;
            }

            _.states($(this).val());

        });

        $("select#states_id").on("change", function()
        {
            $("select#cities_id").attr('disabled', true).html('<option value="">Selecione</option>');

            if($(this).val() == "")
            {
                return;
            }

            _.cities($("select#countries_id").val(), $(this).val());
        });

        _.reset();
        _.countries();
    }

    CSC.prototype.countries = function()
    {
        var _ = this;
       
       $.get(this.API + "paises", function(data)
       {
            var html = '<option value="">Selecione</option>';

            $.each(data, function(index, value) {
               var selectedStatus = ($("select#countries_id").data('active') == index) ? "selected" : "";
               html += '<option value="'+ index +'" '+ selectedStatus +'>'+ value +'</option>';
            });

           $("select#countries_id").attr('disabled', false).html(html);
        }).done(function() {
           if($("select#countries_id").val() != "")
           {
             _.states($("select#countries_id").val());
           }
        });       
    };

    CSC.prototype.states = function(countrie_id)
    {
       var _ = this;

       $.get(this.API + "pais/"+ countrie_id +"/estados", function(data)
       {
           var html = '<option value="">Selecione</option>';

            $.each(data, function(index, value) {
               var selectedStatus = ($("select#states_id").data('active') == index) ? "selected" : "";
               html += '<option value="'+ index +'" '+ selectedStatus +'>'+ value +'</option>';
            });

           $("select#states_id").attr('disabled', false).html(html);
        }).done(function() {
           if($("select#states_id").val() != "")
           {
             _.cities($("select#countries_id").val(), $("select#states_id").val());
           }
        });       
    };

    CSC.prototype.cities = function(countrie_id, state_id)
    {  
        var _ = this;

       $.get(this.API + "pais/"+ countrie_id +"/estado/"+ state_id +"/cidades", function(data)
       {
           var html = '<option value="">Selecione</option>';

            $.each(data, function(index, value) {
               var selectedStatus = ($("select#cities_id").data('active') == index) ? "selected" : "";
               html += '<option value="'+ index +'" '+ selectedStatus +'>'+ value +'</option>';
            });

           $("select#cities_id").attr('disabled', false).html(html);
       });
    };

    CSC.prototype.reset = function()
    {
        var _ = this;

        $("select#states_id").attr('disabled', true).html('<option value="">Selecione</option>');
        $("select#cities_id").attr('disabled', true).html('<option value="">Selecione</option>');
    }

   	new CSC();

}(jQuery));
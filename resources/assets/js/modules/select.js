;(function($){

    function Select()
    {
        $("select").select2();

        $("select").on("change", function(){
            $("select").select2();
        });

        $(window).resize(function() {
            $("select").select2();
        });
    }

   	new Select();

}(jQuery));
 
 
 
 

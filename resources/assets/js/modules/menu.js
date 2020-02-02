;(function($){

    function Menu()
    {
        $(".fa-bars").click(function(){
            $("#js").addClass("open");
            $("#menu-mobile").addClass("block");
          });

        $(".fa-times").click(function(){
            $("#js").removeClass("open");
            $("#menu-mobile").removeClass("block");
        });
    }

   	new Menu();

}(jQuery));
 
 
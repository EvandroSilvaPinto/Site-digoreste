;(function($){

    function Navigation() {
   	 	var _ =  this;

        _.resize();

        $(window).resize(function() {
            _.resize();
        });

   	 	//Events
        $(document).on("click", ".btn-menu, .btn-close", function(e){
            e.preventDefault();
            _.navInit();
            $("select").select2();
        }); 

        //sub-menu
        $(".sub-menu > a").on("click", function(e) {
            e.preventDefault();           

            if(!$(this).parent('.sub-menu').hasClass('active')) {
               $(this).parent('.sub-menu').addClass('active');
            } else {
                $(this).parent('.sub-menu').removeClass('active'); 
            }           
        });

        if($("#page-404").val() != undefined)
        {
            $("body").removeClass('navIsActive');
        }
    }

   	Navigation.prototype.navInit =  function() {
        var _ =  this;
        _.navIsActive() ? _.navInative() : _.navActive();
    };

    Navigation.prototype.navIsActive =  function() {
        return $("body").hasClass('navIsActive');
    };

    Navigation.prototype.navActive =  function() {
        $("body").addClass('navIsActive');
    };

    Navigation.prototype.navInative =  function() {
        $("body").removeClass('navIsActive');
    };

    Navigation.prototype.resize =  function() {

        if (window.matchMedia("(min-width: 992px)").matches) {
          $("body").addClass("navIsActive");
        } else {
           $("body").removeClass("navIsActive");
        }
    };

   	new Navigation();

}(jQuery));
 
 
 
 

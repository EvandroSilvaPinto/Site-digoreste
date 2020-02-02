;(function($){

    function Navigation() {
   	 	var _ =  this;

   	 	//Events
        $(document).on("click", ".btn-menu, .btn-close", function(e){
            e.preventDefault();
            _.navInit();
        });

        $('a[href*="#"]:not([href="#"])').click(function() {
            _.navInative();
           
            var hash = this.hash, 
            target   = $(hash);
            target   = target.length ? target : $('[name=' + this.hash.slice(1) +']');

            if (target.length) {
              $('html, body').animate({
                scrollTop: target.offset().top
              });
              return false;
            }            
        });

        $(".btn-top").on("click", function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            return true;
        });
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

   	new Navigation();

}(jQuery));
 
 
 
 

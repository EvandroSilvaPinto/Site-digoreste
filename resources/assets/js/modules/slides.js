;(function($){

	function Slides() {
		var _ =  this;

		$('.slider').slick({
			dots: false,
			arrows: false,
			infinite: false,
			speed: 1000,
			fade: true,
			autoplay: true,
			autoplaySpeed: 4500
		});
		
	}
	
	new Slides();

}(jQuery));





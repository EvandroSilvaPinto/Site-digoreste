const elixir = require('laravel-elixir');


//require('laravel-elixir-vue-2');


elixir(function(mix) {

	/*
	 |--------------------------------------------------------------------------
	 |	Core
	 |--------------------------------------------------------------------------
	*/
	 	mix.less(['core/404.less'], "public/css/404.css")
        .less(['core/default.less'], "public/css/default.css");  

    
    /*
	 |--------------------------------------------------------------------------
	 |	Site
	 |--------------------------------------------------------------------------
	*/
    	//LESS
   	 	mix.less(['pages/site/home.less'], "public/css/site-home.css");   
   	 	mix.less(['pages/site/contact.less'], "public/css/site-contact.css");   
   	 	mix.less(['pages/site/abouts.less'], "public/css/site-abouts.css");  
   	 	mix.less(['pages/site/menu.less'], "public/css/site-menu.css");  
   	 	mix.less(['pages/site/adress.less'], "public/css/site-adress.css");   
    
	    //JAVASCRIPT  LIBS
	    mix.scripts([
			'libs/jquery-3.1.0.js',
			'libs/jquery.validate.min.js',
			'libs/sweetalert2.min.js',
	        'libs/slick.js', 
	    ], 'public/js/site-home-libs.js'); 
	    mix.scripts([
			'libs/jquery-3.1.0.js',
			'libs/jquery.validate.min.js',
			'libs/sweetalert2.min.js',
	        'libs/slick.js', 
		], 'public/js/site-contact-libs.js'); 
		mix.scripts([
			'libs/jquery-3.1.0.js',
			'libs/jquery.validate.min.js',
			'libs/sweetalert2.min.js',
	        'libs/slick.js', 
	    ], 'public/js/site-abouts-libs.js'); 
		mix.scripts([
			'libs/jquery-3.1.0.js',
			'libs/jquery.validate.min.js',
			'libs/sweetalert2.min.js',
	        'libs/slick.js', 
	    ], 'public/js/site-menu-libs.js'); 
		mix.scripts([
			'libs/jquery-3.1.0.js',
			'libs/jquery.validate.min.js',
			'libs/sweetalert2.min.js',
	        'libs/slick.js', 
	    ], 'public/js/site-adress-libs.js'); 

	    //JAVASCRIPT  COMPONENTES
	    mix.scripts([
	        'modules/navigation.js',
			'modules/contact.js',
			'modules/menu.js',
	        'modules/slides.js',
	    ], 'public/js/site-home.js'); 
	    mix.scripts([
	        'modules/navigation.js',
			'modules/contact.js',
	        'modules/slides.js',
			'modules/menu.js',
		], 'public/js/site-contact.js'); 
		mix.scripts([
	        'modules/navigation.js',
			'modules/contact.js',
	        'modules/slides.js',
			'modules/menu.js',
	    ], 'public/js/site-abouts.js'); 
		mix.scripts([
	        'modules/navigation.js',
			'modules/contact.js',
	        'modules/slides.js',
			'modules/menu.js',
	    ], 'public/js/site-menu.js'); 
		mix.scripts([
	        'modules/navigation.js',
			'modules/contact.js',
	        'modules/slides.js',
			'modules/menu.js',
	    ], 'public/js/site-adress.js'); 

    /*
	 |--------------------------------------------------------------------------
	 |	CMS
	 |--------------------------------------------------------------------------
	*/
    	//LESS
        mix.less(['pages/cms/home.less'], "public/css/cms-home.css")
        .less(['pages/cms/auth.less'], "public/css/cms-auth.css");   
        
    
        //JAVASCRIPT  LIBS      
        mix.scripts([
            'libs/jquery-3.1.0.js',
            'libs/es6-promise.auto.min.js',
            'libs/sweetalert2.min.js',
            'libs/jquery.mask.js',
            'libs/select2.min.js'
        ], 'public/js/default-libs.js');       


        // JAVASCRIPT  COMPONENTES
        mix.scripts([
            'modules/navigation-sidebar.js',
            'modules/flexUpload.js',
            'modules/mask.js',
            'modules/selectForm.js',
            'modules/select.js'
        ], 'public/js/default.js'); 

    /*
	 |--------------------------------------------------------------------------
	 | Version files  
	 |--------------------------------------------------------------------------
	*/

    	mix.version(["css/*.css", "js/*.js"]);

    /*
	 |--------------------------------------------------------------------------
	 | Version files  
	 |--------------------------------------------------------------------------
	*/
   	
   		//mix.browserify('../../../public/js/home.js', null, null);   

    
    /*
	 |--------------------------------------------------------------------------
	 | Copy Fonts
	 |--------------------------------------------------------------------------
	*/
    
	    mix.copy('resources/assets/fonts', 'public/build/css/fonts');
	    mix.copy('resources/assets/img', 'public/img');
});
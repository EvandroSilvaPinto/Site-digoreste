	<input type="hidden" name="app_url" id="app_url" value="{!!url("/")!!}">
	@if (file_exists("public/js/".Route::currentRouteName()."-libs.js"))
		<script src="{{asset('public'.elixir('js/'.Route::currentRouteName().'-libs.js'))}}"></script> 
	@else
		<script src="{{asset('public'.elixir('js/default-libs.js'))}}"></script> 
	@endif

	@if (file_exists("public/js/".Route::currentRouteName().".js"))
		<script src="{{asset('public'.elixir('js/'.Route::currentRouteName().'.js'))}}" async></script>  
	@else
		<script src="{{asset('public'.elixir('js/default.js'))}}" async></script>  
	@endif
	<!-- AOS Scroll Animate -->
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script> AOS.init();</script>
	
	</body>
</html>
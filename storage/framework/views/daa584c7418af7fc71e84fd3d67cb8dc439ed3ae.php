	<input type="hidden" name="app_url" id="app_url" value="<?php echo url("/"); ?>">
	<?php if(file_exists("public/js/".Route::currentRouteName()."-libs.js")): ?>
		<script src="<?php echo e(asset('public'.elixir('js/'.Route::currentRouteName().'-libs.js'))); ?>"></script> 
	<?php else: ?>
		<script src="<?php echo e(asset('public'.elixir('js/default-libs.js'))); ?>"></script> 
	<?php endif; ?>

	<?php if(file_exists("public/js/".Route::currentRouteName().".js")): ?>
		<script src="<?php echo e(asset('public'.elixir('js/'.Route::currentRouteName().'.js'))); ?>" async></script>  
	<?php else: ?>
		<script src="<?php echo e(asset('public'.elixir('js/default.js'))); ?>" async></script>  
	<?php endif; ?>
	<!-- AOS Scroll Animate -->
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script> AOS.init();</script>
	
	</body>
</html>
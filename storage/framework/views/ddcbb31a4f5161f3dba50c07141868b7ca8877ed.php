<!-- Include the header -->
<?php echo $__env->make('layouts._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Set the content page -->
<?php echo $__env->yieldContent('content'); ?>

<!-- Include the footer -->
<?php echo $__env->make('layouts._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('site/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<?php echo $__env->make('site/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts._app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
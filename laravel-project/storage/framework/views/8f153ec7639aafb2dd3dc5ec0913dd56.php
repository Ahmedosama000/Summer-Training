

<?php $__env->startSection('title' , 'Home'); ?>

<?php $__env->startSection('content'); ?>

<div class="my-5 container bg-dark py-4 rounded w-50 text-center mx-auto">
    <h2 class="text-white"> Courses List </h2>
</div>

<div class="my-5 container">
    <?php if(count($courses) > 0): ?>
        <div class="row text-center">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-sm-12 my-3">
                    <div class="card py-3 px-3 text-bg-light mb-3" 
                    style="max-width: 22rem;">
                        <div class="card-header">
                            Let's Get Started
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo e($course->title); ?></h5>
                          <p class="card-text">
                            <?php echo e($course->desc); ?>

                          </p>
                          <hr>
                          <div class="bg-warning p-3 rounded shadow">
                            Designed By <strong>
                                <?php echo e($course->instructor); ?></strong> At <?php echo e($course->created_at); ?>

                                <br> <strong class="bg-info">Course Price <?php echo e($course->price); ?></strong>
                          </div>
                          <hr>
                          <a href="<?php echo e('/courses/' . $course->id); ?>" class="btn my-2 btn-primary">show</a>
                          <a href="<?php echo e('/courses/' . $course->id . '/edit'); ?>" class="btn my-2 btn-success">edit</a>
                          <form action="<?php echo e(route('destroy' , ['id' => $course->id])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger">delete</button>
                         </form>
                        </div>
                      </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-center py-2 my-4">
        <?php echo e($courses->links()); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\XAMPP\htdocs\CourseSys-laravel\resources\views/pages/courses.blade.php ENDPATH**/ ?>
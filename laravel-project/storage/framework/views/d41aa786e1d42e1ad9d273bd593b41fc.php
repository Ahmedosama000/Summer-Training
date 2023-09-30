

<?php $__env->startSection('title' , 'Home'); ?>

<?php $__env->startSection('content'); ?>

<div class="my-5 container bg-dark py-4 rounded w-50 text-center mx-auto">
    <h2 class="text-white"> Edit Course </h2>
</div>

<div class="container w-50 mx-auto my-5">
    <form action="<?php echo e('/courses/' . $course-> id); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group my-2">
            <label for="title">Course Title</label>
            <input type="text" class="form-control"
            name="title" id="title" value="<?php echo e($course->title); ?>">
        </div>
        <div class="form-group my-2">
            <label for="price">Course Price</label>
            <input type="number" name="price" id="price" 
            class="form-control" value="<?php echo e($course->price); ?>">
        </div>
        <div class="form-group my-2">
            <label for="instructor">Course Instructor</label>
            <input type="text" class="form-control" name="instructor"
            id="instructor" value="<?php echo e($course->instructor); ?>">
        </div>
        <div class="form-group my-2">
            <label for="description">Course Description</label>
            <textarea class="form-control py-4" name="desc" 
            id="desc"> 
                <?php echo e($course->desc); ?>

            </textarea>
        </div>
        <input type="submit" value="Edit Course" class="btn btn-success mt-3">
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\XAMPP\htdocs\CourseSys-laravel\resources\views/pages/edit.blade.php ENDPATH**/ ?>
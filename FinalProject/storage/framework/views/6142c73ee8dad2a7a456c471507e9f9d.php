

<?php $__env->startSection('title','Students'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <?php if(session()->has('msg')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('msg')); ?>

                </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($student['id']); ?></td>
                            <td><?php echo e($student['name']); ?></td>
                            <td><?php echo e($student['email']); ?></td>
                            <td><?php echo e($student['status']==0?'Active':'Not active'); ?></td>
                            <td>
                                <a href="<?php echo e(route('edit',$student['id'])); ?>" class="btn btn-info mx-1">Edit</a>
                                <form class="d-inline" action="<?php echo e(route('delete',$student['id'])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center p-4">
                <?php echo e($students->links()); ?>

            </div>
            <?php if(!$students->hasMorePages()): ?>
            <div class="alert alert-info text-center h3">Finish</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Ahmed\Courses\My courses\Summer-Train\FinalProject\resources\views/Teacher/students.blade.php ENDPATH**/ ?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <div class="card-body p-4 p-md-5">
        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Create New Task</h3>

        <form action="<?php echo e(route('store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="taskname">Task name</label>
                        <input type="text" name="taskname" id="firstName" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline">
                        <label class="form-label" for="username">User name</label>
                        <input type="text" name="username" id="firstName" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline">
                        <label class="form-label" for="date">Date</label>
                        <input type="date" name="date" id="firstName" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" value="Create" />
                </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html><?php /**PATH F:\Ahmed\Courses\My courses\Summer-Train\to-do-list\resources\views/create.blade.php ENDPATH**/ ?>
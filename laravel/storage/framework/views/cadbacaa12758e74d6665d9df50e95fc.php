<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Users List</h3>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-11 d-flex justify-content-end">
                <a href="<?php echo e(route('users.create')); ?> " class="btn btn-success">Add New User</a>
            </div>
            <?php if(Session::has('success')): ?>
                <div class="col-md-11 mt-4">
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-11">
                <div class="card  my-4">
                    <div class="card-header bg-info">
                        <h3 class="text-white">Users</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Company Name</th>
                                <th>Action</th>
                            </tr>
                            <?php if($users->isNotEmpty()): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index+1); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->username); ?></td>
                                        <td><?php echo e($user->phone); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->website); ?></td>
                                        <td><?php echo e($user->companyname); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-secondary">Edit</a>
                                            <a href="<?php echo e(route('projects.list', $user->id)); ?>" class="btn btn-primary">Project</a>
                                            <a href="#" onclick="deleteUser(<?php echo e($user->id); ?>)"
                                                class="btn btn-danger">Delete</a>
                                            <form id="delete-user-from-<?php echo e($user->id); ?>"
                                                action="<?php echo e(route('users.delete', $user->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
    function deleteUser(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById("delete-user-from-" + id).submit();

        }

    }
</script>
<?php /**PATH D:\laravel\resources\views\users\list.blade.php ENDPATH**/ ?>
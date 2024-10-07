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
        <h3 class="text-white text-center">Project List Of <?php echo e($user->name); ?> </h3>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <?php if(Session::has('success')): ?>
                <div class="col-md-10">
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-10">
                <div class="card  my-4">
                    <div class="card-header bg-info">
                        <h3 class="text-white">Projects Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>S.No.</th>
                                <th>user_id</th>
                                <th>title</th>
                                <th>body</th>
                                <th>Action</th>
                            </tr>
                            <?php if($projects->isNotEmpty()): ?>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index+1); ?></td>
                                        <td><?php echo e($project->user_id); ?></td>
                                        <td><?php echo e($project->title); ?></td>
                                        <td><?php echo e($project->body); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('projects.edit', [$user->id, $project->id])); ?>" class="btn btn-secondary">Edit</a>
                                            <a href="#" onclick="deleteProject(<?php echo e($project->id); ?>)"
                                                class="btn btn-danger">Delete</a>
                                            <form id="delete-project-from-<?php echo e($project->id); ?>"
                                                action="<?php echo e(route('projects.delete', [$user->id, $project->id])); ?>"
                                                method="post">
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
            <div class="text-center">
                <a href="<?php echo e(route('projects.create', $user->id)); ?> " class="btn btn-success">Add More Project</a>

                <a href="<?php echo e(route('users.index')); ?> " class="btn btn-dark">Back</a>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
</body>

</html>

<script>
    function deleteProject(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById("delete-project-from-" + id).submit();

        }

    }
</script>
<?php /**PATH D:\laravel\resources\views\projects\listPro.blade.php ENDPATH**/ ?>
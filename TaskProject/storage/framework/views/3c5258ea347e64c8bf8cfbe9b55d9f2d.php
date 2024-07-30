<!DOCTYPE html>
<html>

<head>
    <title>Task Project</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?php echo e(asset('js/users.js')); ?>"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Submit User Form</h2>
        <form id="userForm" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label>Role:</label>
                <select class="form-control" name="role_id" required>
                    <?php $__currentLoopData = App\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Profile Image:</label>
                <input type="file" class="form-control" name="profile_image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h2 class="mt-5">Users Table</h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Role</th>
                    <th>Profile Image</th>
                </tr>
            </thead>
            <tbody id="usersTableBody">
            </tbody>
        </table>
    </div>
</body>

</html>
<?php /**PATH D:\f\TaskProject\resources\views/welcome.blade.php ENDPATH**/ ?>
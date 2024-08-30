<?php

include '../extends/header.php';

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>username update</h4>
            </div>
            <form action="settings_manage.php" method="POST">
            <div class="card-body">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <!-- php success code -->
            <?php if(isset($_SESSION['name_update'])) : ?>
            <div id="emailHelp" class="form-text text-success">
                <?= $_SESSION['name_update'] ?>
            </div>
            <?php endif; unset($_SESSION['name_update']);?>
            <!-- php success code -->
            <!-- php error code -->
            <?php if(isset($_SESSION['name_error'])) : ?>
            <div id="emailHelp" class="form-text">
                <?= $_SESSION['name_error'] ?>
            </div>
            <?php endif; unset($_SESSION['name_error']);?>
            <!-- php error code -->
            <div class="d-grid gap-2 mt-3">
            <button class="btn btn-primary" name="nameubtn" type="submit">update</button>
            </div>
        </div>
        </form>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>password update</h4>
            </div>
            <form action="settings_manage.php" method="POST">
            <div class="card-body">
            <label for="exampleInputEmail1" class="form-label">Current password</label>
            <input type="password" name="oldpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1 my-2" class="form-label">New password</label>
            <input type="password" name="newpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1 my-2" class="form-label">Confirm password</label>
            <input type="password" name="cpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <!-- php success code -->
            <?php if(isset($_SESSION['pass_update'])) : ?>
            <div id="emailHelp" class="form-text text-success">
                <?= $_SESSION['pass_update'] ?>
            </div>
            <?php endif; unset($_SESSION['pass_update']);?>
            <!-- php success code -->
            <!-- php error code -->
            <?php if(isset($_SESSION['pass_error'])) : ?>
            <div id="emailHelp" class="form-text">
                <?= $_SESSION['pass_error'] ?>
            </div>
            <?php endif; unset($_SESSION['pass_error']);?>
            <!-- php error code -->
            
            <div class="d-grid gap-2 mt-3">
            <button class="btn btn-primary" name="passubtn" type="submit">update</button>
            </div>
        </div>
        </form>
        </div>
    </div>

    <!-- imageb part start -->

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Image update</h4>
            </div>
        <form action="settings_manage.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="d-grid gap-2 mt-3">
            <button class="btn btn-primary" name="imageubtn" type="submit">update</button>
            </div>
        </div>
        </form>
        </div>
    </div>
    <!-- imageb part end -->
</div>

<?php

include '../extends/footer.php';

?>
<?php

include '../extends/header.php';

$portfolio_query = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db,$portfolio_query);
$portfolio = mysqli_fetch_assoc($portfolios) ;


?>


<?php if(isset($_SESSION['port_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['port_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_success']) ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Portfolios List</h4>
                <a href="create.php" class="btn btn-primary"><i class="material-icons">add</i>create</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($portfolio)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-danger">No Data Found!!</td>
                    </tr>
                    <?php else :?>
            <?php 
                
                $num = 1;
                foreach($portfolios as $portfolio): ?>
            <tr>
                    <th scope="row">
                       <?= $num++ ?>
                    </th>
                    <td>
                        <img style="width: 80px; height:80px; border-radius:50%;" src="../../public/uploads/portfolio/<?= $portfolio['image'] ?>">
                         
                    </td>
                    <td>
                    <?= $portfolio['title'] ?>
                    </td>
                    <td>
                        <a href="store.php?statusid=<?= $portfolio['id'] ?>" class="<?= ($portfolio['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $portfolio['status'] ?></a>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="edit.php?editid=<?= $portfolio['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-chain"></i>
                            </a>
                            <a href="store.php?deleteid=<?= $portfolio['id'] ?>" class="text-danger fa-2x">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; endif ?>
            </tbody>
        </table>
    </div>
            </div>
        </div>
    </div>
</div>


<?php
 include '../extends/footer.php';
?>
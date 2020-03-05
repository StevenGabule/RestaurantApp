<?php require '../layouts/_header.php'?>
<?php
    global $connect;
    $sql = 'SELECT * from tblrestaurants';
    $res = $connect->query($sql);
    $results = $res->fetchAll();
?>
<style>
    tbody tr td {
        vertical-align: middle !important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="restaurants.php">
                            <span data-feather="file"></span>
                            Restaurants
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Restaurant</h1>
                <a href="restaurant_add.php" class="btn btn-secondary btn-sm">New Restaurant</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm" id="RestaurantTable">
                    <thead>
                    <tr>
                        <th class="small">#</th>
                        <th class="small">Logo</th>
                        <th class="small">Restaurant Name</th>
                        <th class="small">Owner</th>
                        <th class="small">Email</th>
                        <th width="40%"  class="small">Short Desc.</th>
                        <th class="small">City</th>
                        <th class="small">Status</th>
                    </tr>
                    </thead>
                    <tbody style="font-size: 13px;">
                    <?php
                        $i = 1;
                    ?>
                    <?php foreach ($results as $result) : ?>
                    <tr>
                        <td><?= $i++?></td>
                        <td><img src="../images/uploads/<?= $result['restaurant_avatar'] ?>" width="40" height="40" class="rounded-circle" alt=""></td>
                        <td class="text-capitalize"><?= $result['restaurant_name'] ?></td>
                        <td class="text-capitalize"><?= $result['restaurant_firstname'] . ' ' . $result['restaurant_lastname'] ?></td>
                        <td><?= $result['restaurant_business_email'] ?></td>
                        <td><?= substr($result['restaurant_short_description'], 0,40) ?></td>
                        <td class="text-capitalize"><?= $result['restaurant_city'] ?></td>
                        <td><?= $result['restaurant_status'] === 1 ? 'Available' : 'Unavailable' ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php require '../layouts/_footer.php'?>
<script>
    (function () {
        $("#RestaurantTable").DataTable();
    }())
</script>

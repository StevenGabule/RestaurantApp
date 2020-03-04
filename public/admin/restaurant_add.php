<?php require '../layouts/_header.php' ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['restaurant_firstname'];
    $lastname = $_POST['restaurant_lastname'];
    $name = $_POST['restaurant_name'];
    $business_email = $_POST['restaurant_business_email'];
    $short_description = $_POST['restaurant_short_description'];
    $full_description = $_POST['restaurant_full_description'];
    $street_address = $_POST['restaurant_street_address'];
    $city = $_POST['restaurant_city'];
    $areas = $_POST['restaurant_areas'];
    $zip = $_POST['restaurant_zip'];
    $business_hour = $_POST['restaurant_business_hour'];
    $date_established = $_POST['restaurant_date_established'];
}

?>

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
                        <a class="nav-link" href="#">
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

            <div class="bg-white p-3">

                <h4 class="mb-3">New Restaurant</h4>

                <form class="needs-validation" action="" method="post">

                    <div class="row">
                        <div class="col-md-12">
                            <h6>Restaurant Owner</h6>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="restaurant_firstname">First name</label>
                            <input type="text" class="form-control" id="restaurant_firstname"
                                   name="restaurant_firstname" placeholder="" value="">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="restaurant_lastname">Last name</label>
                            <input type="text" class="form-control" id="restaurant_lastname" name="restaurant_lastname"
                                   placeholder="" value="">
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="restaurant_name">Restaurant Name</label>
                        <input type="text" class="form-control" id="restaurant_name" name="restaurant_name"
                               placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="restaurant_email">Business Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="restaurant_email" name="restaurant_business_email">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="restaurant_short_description">Short description</label>
                        <textarea rows="5" id="restaurant_short_description" class="form-control"
                                  name="restaurant_short_description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="restaurant_full_description">Full Description</label>
                        <textarea rows="10" id="restaurant_full_description" class="form-control"
                                  name="restaurant_full_description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="restaurant_street_address">Street Address</label>
                        <input type="text" class="form-control" id="restaurant_street_address" placeholder="">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="restaurant_city">City</label>
                            <select class="custom-select d-block w-100" id="restaurant_city" name="restaurant_city">
                                <option value="">Choose...</option>
                                <option>Valencia City</option>
                                <option>Malaybalay City</option>
                                <option>Maramag City</option>
                                <option>Manolo Fortich</option>
                                <option>Quezon</option>
                                <option>Baungon</option>
                                <option>Talakag</option>
                                <option>Libona</option>
                                <option>Sumilao</option>
                                <option>Kalilangan</option>
                                <option>Lantapan</option>
                                <option>Impasug-ong</option>
                                <option>Kitaotao</option>
                                <option>Kibawe</option>
                                <option>Don Carlos</option>
                                <option>Dangcagan</option>
                                <option>Cabanglasan</option>
                                <option>Malitbog</option>
                                <option>Damulog</option>
                                <option>Pangantucan</option>
                                <option>San Fernando</option>
                                <option>Iligan City</option>
                                <option>Magsaysay</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="restaurant_areas">Areas</label>
                            <select class="custom-select d-block w-100" id="restaurant_areas" name="restaurant_areas">
                                <option value="">Choose...</option>
                                <option>Bagontaas</option>
                                <option>Banlag</option>
                                <option>Barobo</option>
                                <option>Batangan</option>
                                <option>Catumbalon</option>
                                <option>Colonia</option>
                                <option>Concepcion</option>
                                <option>Dagat-Kidavao</option>
                                <option>Guinoyuran</option>
                                <option>Kahapunan</option>
                                <option>Laligan</option>
                                <option>Lilingayon</option>
                                <option>Lourdes</option>
                                <option>Lourdes</option>
                                <option>Lumbayao</option>
                                <option>Lumbo</option>
                                <option>Lurugan</option>
                                <option>Maapag</option>
                                <option>Mabuhay</option>
                                <option>Mailag</option>
                            </select>

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="restaurant_zip">Zip</label>
                            <input type="text" class="form-control" id="restaurant_zip" name="restaurant_zip"
                                   placeholder="">
                        </div>
                    </div>

                    <hr class="mb-4">

                    <div class="mb-3">
                        <label for="restaurant_business_hour">Business Hour</label>
                        <textarea rows="10" id="restaurant_business_hour" class="form-control"
                                  name="restaurant_business_hour"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="restaurant_date_established">Date established</label>
                            <input type="date" class="form-control" id="restaurant_date_established" name="restaurant_date_established">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="restaurant_contact_person">Contact person</label>
                            <input type="text" class="form-control" id="restaurant_contact_person" name="restaurant_contact_person">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="restaurant_contact_number">Contact Number</label>
                            <input type="text" class="form-control" id="restaurant_contact_number" placeholder="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="restaurant_telephone_number">Telephone Number</label>
                            <input type="text" class="form-control" id="restaurant_telephone_number" placeholder="">
                        </div>
                    </div>

                    <hr class="mb-4">

                    <h6 class="mb-3">Payment Method</h6>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="payment_credit_card" name="payment_credit_card">
                        <label class="custom-control-label" for="payment_credit_card">Credit Card</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="payment_debit_card" name="payment_debit_card">
                        <label class="custom-control-label" for="payment_debit_card">Debit Card</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="Paypal" name="payment_paypal">
                        <label class="custom-control-label" for="Paypal">Paypal</label>
                    </div>

                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-12">
                            <label for="restaurant_status">Restaurant Current Status</label>
                            <select name="restaurant_status" id="restaurant_status" class="form-control">
                                <option value="1">Available</option>
                                <option value="0">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>

                </form>
            </div>

        </main>
    </div>
</div>
<?php require '../layouts/_footer.php' ?>

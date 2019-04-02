<div id="add" data-add="<?= $this->session->flashdata('add'); ?>"><?=           $this->session->flashdata('add'); ?>
</div>
<div class="container-scroller">
<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
<a class="navbar-brand brand-logo" href="index.html"><img src="<?= base_url() ?>assets/admin/images/logo.svg" alt="logo"/></a>
<a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url() ?>assets/admin/images/logo-mini.svg" alt="logo"/></a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-stretch">
<div class="search-field d-none d-md-block">
    <form class="d-flex align-items-center h-100" action="#">
    <div class="input-group">
        <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>                
        </div>
        <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
    </div>
    </form>
</div>
<ul class="navbar-nav navbar-nav-right">
    <li class="nav-item nav-profile dropdown">
    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        <div class="nav-profile-img">
        <img src="<?= base_url() ?>assets/admin/images/faces/face1.jpg" alt="image">
        <span class="availability-status online"></span>             
        </div>
        <div class="nav-profile-text">
        <p class="mb-1 text-black"><?= $admin[0]['name'] ?></p>
        </div>
    </a>
    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="#">
        <i class="mdi mdi-cached mr-2 text-success"></i>
        Activity Log
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">
        <i class="mdi mdi-logout mr-2 text-primary"></i>
        Signout
        </a>
    </div>
    </li>
    <li class="nav-item d-none d-lg-block full-screen-link">
    <a class="nav-link">
        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
    </a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        <i class="mdi mdi-email-outline"></i>
        <span class="count-symbol bg-warning"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
        <h6 class="p-3 mb-0">Messages</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <img src="<?= base_url() ?>assets/admin/images/faces/face4.jpg" alt="image" class="profile-pic">
        </div>
        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
            <p class="text-gray mb-0">
            1 Minutes ago
            </p>
        </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <img src="<?= base_url() ?>assets/admin/images/faces/face2.jpg" alt="image" class="profile-pic">
        </div>
        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
            <p class="text-gray mb-0">
            15 Minutes ago
            </p>
        </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <img src="<?= base_url() ?>assets/admin/images/faces/face3.jpg" alt="image" class="profile-pic">
        </div>
        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
            <p class="text-gray mb-0">
            18 Minutes ago
            </p>
        </div>
        </a>
        <div class="dropdown-divider"></div>
        <h6 class="p-3 mb-0 text-center">4 new messages</h6>
    </div>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
        <i class="mdi mdi-bell-outline"></i>
        <span class="count-symbol bg-danger"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
        <h6 class="p-3 mb-0">Notifications</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-success">
            <i class="mdi mdi-calendar"></i>
            </div>
        </div>
        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
            <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
            <p class="text-gray ellipsis mb-0">
            Just a reminder that you have an event today
            </p>
        </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-warning">
            <i class="mdi mdi-settings"></i>
            </div>
        </div>
        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
            <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
            <p class="text-gray ellipsis mb-0">
            Update dashboard
            </p>
        </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-info">
            <i class="mdi mdi-link-variant"></i>
            </div>
        </div>
        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
            <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
            <p class="text-gray ellipsis mb-0">
            New admin wow!
            </p>
        </div>
        </a>
        <div class="dropdown-divider"></div>
        <h6 class="p-3 mb-0 text-center">See all notifications</h6>
    </div>
    </li>
    <li class="nav-item nav-logout d-none d-lg-block">
    <a class="nav-link" href="#">
        <i class="mdi mdi-power"></i>
    </a>
    </li>
    <li class="nav-item nav-settings d-none d-lg-block">
    <a class="nav-link" href="#">
        <i class="mdi mdi-format-line-spacing"></i>
    </a>
    </li>
</ul>
<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
    <span class="mdi mdi-menu"></span>
</button>
</div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
    <li class="nav-item nav-profile">
    <a href="#" class="nav-link">
        <div class="nav-profile-image">
        <img src="<?= base_url() ?>assets/admin/images/faces/face1.jpg" alt="profile">
        <span class="login-status online"></span> <!--change to offline or busy as needed-->              
        </div>
        <div class="nav-profile-text d-flex flex-column">
        <span class="font-weight-bold mb-2"><?= $admin[0]['name'] ?></span>
        <span class="text-secondary text-small"><?= $admin[0]['level']  ?></span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url() ?>User_admin/index">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url() ?>User_admin/products">
        <span class="menu-title">Products</span>
        <i class="mdi mdi-package-variant-closed menu-icon"></i>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url() ?>User_admin/allAccounts">
        <span class="menu-title">Accounts</span>
        <i class="mdi mdi-account-multiple menu-icon"></i>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url() ?>User_admin/orders">
        <span class="menu-title">Orders & Transaction</span>
        <i class="mdi mdi-square-inc-cash menu-icon"></i>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url() ?>User_admin/testimonials">
        <span class="menu-title">Testimonials</span>
        <i class="mdi mdi-basket menu-icon"></i>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Charts</span>
        <i class="mdi mdi-chart-bar menu-icon"></i>
    </a>
    </li>
    <li class="nav-item sidebar-actions">
    <span class="nav-link">
        <button class="btn btn-block btn-lg btn-gradient-primary mt-4" data-toggle="modal" data-target=".bd-example-modal-md">+ Add a Product</button>
    </span>
    </li>
</ul>
</nav>

<!-- Modal Add Product -->
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="font-size:25px;color:#b66dff;"><i class="mdi mdi-package-variant-closed menu-icon"></i>Products</h4>
                <p class="card-description">
                    + Add Products
                </p>
                <?php echo form_open_multipart('User_admin/addProduct');?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label><br>
                        <input type="file" name="upload" size="100" required/>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-danger text-white">Rp. </span>
                            </div>
                            <input type="number" class="form-control" aria-label="Amount (to the nearest rupiah)" placeholder="Price" name="price" autocomplete="off" required>
                                <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" class="form-control" id="weight" placeholder="Weight" name="weight" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" placeholder="Stock" name="stock" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                    <label for="catagory">Discount</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Discount" aria-label="Recipient's discount" aria-describedby="basic-addon2" name="discount" autocomplete="off" required>
                            <div class="input-group-append">
                            <button class="btn btn-sm btn-gradient-success" type="button">%</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="catagory">Catagory</label>
                        <input type="text" class="form-control" id="catagory" placeholder="Catagory" name="catagory" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" autocomplete="off" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
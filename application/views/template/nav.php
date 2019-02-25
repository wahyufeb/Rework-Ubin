<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="#">UBIN</a>
    <a href="<?= base_url() ?>User/shopping_cart"><i class="fas fa-shopping-cart fa-lg"></i> <?php echo  $this->cart->total_items(); ?> items</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" autocomplete="off">
            <button class="btn my-2 my-sm-0" type="submit" id="btn-search"><i class="fas fa-search"></i></button>
        </form>
        <ul class="navbar-nav">
            <?php if($this->session->userdata('level') != "member"):?>
            <li class="nav-item">
                    <div class="sign">
                        <a href="<?= base_url() ?>Registration">Sign Up</a>
                    </div>
            <?php endif;?>
                <!-- User Login -->
            <?php if($this->session->userdata('level') == "member"):?>
                <div class="login-profile">
                    <div class="pp">
                        <img src="<?= base_url() ?>uploads/<?= $user[0]->photo;?>">
                    </div>
                </div>
            </li>
            <li class="nav-item" id='login_user'>
                <?php 
                    $userlog =  $user[0]->name;
                    echo substr($userlog, 0, 5);
                ?> 
                <i class="fas fa-caret-down" id="arrow-menu"></i>
                <ul id="login-menu">
                    <li><a href="<?= base_url() ?>User/profile">View profile</a></li>
                    <li><a href="#">Setting</a></li>
                    <li><a href="<?= base_url() ?>User/logout" class="logout">Logout</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="<?= base_url() ?>Cart/index"><i class="fas fa-shopping-cart fa-md dua mt-2"></i><span> <?php echo  $this->cart->total_items(); ?> items</span></a>
            </li>
        </ul>
    </div>
</nav>
<div class="menu">
    <ul class="slimmenu" id="navigation">
        <li>
            <a href="#">All Product</a>
        </li>
        <li>
            <a href="#">Catagories</a>
            <ul>
                <li><a href="#">Bowl </a></li>
                <li><a href="#">Plate </a></li>
                <li><a href="#">Vase </a></li>
                <li><a href="#">Mugs </a></li>
                <li><a href="#">Kettle </a></li>
            </ul>
        </li>
        <li>
            <a href="#">Hot Sale</a>
        </li>
        <li>
            <a href="#">Testimonial</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
        <li>
            <a href="#">About</a>
        </li>
    </ul>
</div>

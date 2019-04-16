<nav class="navbar navbar-expand-lg navbar-light bg-white" >
    <a class="navbar-brand" href="<?= base_url() ?>Ubin">UBIN</a>
    <a href="<?= base_url() ?>User/shopping_cart"><i class="fas fa-shopping-cart fa-lg"></i> <?php echo  $this->cart->total_items(); ?> items</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0" action="<?= base_url(); ?>Ubin/search" id="form-search" method="get">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search"  id="search" autocomplete="off">
            <button class="btn" type="submit" id="btn-search"><i class="fas fa-search"></i></button>
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
                <i class="fas fa-caret-down " id="arrow-menu"></i>
                <ul id="login-menu">
                    <li><a href="<?= base_url() ?>User/profile">View profile</a></li>
                    <li><a href="<?= base_url() ?>User/logout" class="logout">Logout</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="<?= base_url() ?>Cart/index"><i class="fas fa-shopping-cart fa-md dua mt-2 "></i>
                <span> <?php echo  $this->cart->total_items(); ?> items</span></a>
            </li>
        </ul>
    </div>
</nav>   



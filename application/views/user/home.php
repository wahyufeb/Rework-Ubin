<style>
    .breadcrumb-item a{
        color:#333;
    }
    .breadcrumb-item a:hover{
        color:skyblue;
    }
</style>
    <div class="col-lg-9 col-md-9 col-sm-11 col-11 offset-lg-1 offset-md-1 right-side">
        <nav aria-label="breadcrumb" style="margin-top:20px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>User">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Hello, <?= $user[0]->name; ?></h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt facilis, optio similique in corporis eius placeat ducimus totam sit eaque voluptatum perferendis nulla neque quis suscipit velit nam. Sapiente.</p>
        </div>
    </div>
</body>
</html>
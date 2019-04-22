<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Data Users</title>
    <!-- Bootstrap -->
    <?php $a =  $_SERVER["DOCUMENT_ROOT"]."/rework/assets/"?>
    <script src="<?=$a?>custom/js/jquery.js"></script>
    <link rel="stylesheet" href="<?= $a ?>bootstrap/css/bootstrap.min.css">
    <script src="<?=$a?>bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Jquery -->
    <style>
    @page { 
        margin: 100px 25px; 
    }
    header { 
        position: absolute;
        top: -80px; 
        left: 0px; 
        right: 0px;
        height: 50px; 
        text-align: center;
        border-bottom: 3px solid #333;
        font-family: sans-serif;
    }

    header i {
        font-size: 13px;
    }

    footer { 
        position: fixed; 
        bottom: -60px; 
        left: 0px; 
        right: 0px; 
        height: 50px;
        text-align: right;
        font-family: arial;
    }
    p { 
        page-break-after: always;
    }
    p:last-child { 
        page-break-after: never;
    }
    </style>
</head>
<body>
    <div id="header">
        <img src="<?=$_SERVER["DOCUMENT_ROOT"]."/rework/assets/img/images.png"?>" 
        style="position:absolute;left:-15px;top:-90px;width:85px;height:70px;">
    </div>    
<header>
    <h5><?=$tittle?></h5>
    <i>www.cubinwebsite.com</i>
</header>
<div class="alert alert-secondary" role="alert" style="font-weight:400;">
    <table>
        <tr>
            <td>Date</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=date("d-M-Y")?></td>
        </tr>
        <tr>
            <td>Tittle</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$tittle?></td>
        </tr>
        <tr>
            <td>Total Users</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?= $totalusers[0]['users'] ?></td>
        </tr>
    </table>
</div>
<footer>
    <i>www.cubinwebsite.com</i>
</footer>
    <table class="table table-bordered" id="table" style="margin-top:20px;">
    <thead align="center" style="text-align:center;"> 
        <tr align="center">                                
            <th>No</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Name</th>
            <th>Telephone</th>
            <th>Province</th>
            <th>City</th>
            <th>Street</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        <?php foreach($users as $row): ?>
        <?php $i++ ?>
            <tr align="center">
                <td><?= $i ?></td>            \
                <td align="center"><img src="<?=$_SERVER["DOCUMENT_ROOT"]."/rework/uploads/".$row['photo']?>" style="border-radius:50%;width:60px;height:60px;"></td>
                <td align="left"><?= $row['email']; ?></td>
                <td align="left"><?= $row['name'] ?></td>
                <td><?=  $row['telephone']?></td>
                <td><?= $row['province'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['street'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>


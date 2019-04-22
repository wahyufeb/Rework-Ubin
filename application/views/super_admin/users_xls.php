<?php header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=$filename-$datereport.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>

<table>
    <thead>
        <tr align="center">
            <th><h2>REPORT DATA PRODUCTS</h2></th>
        </tr>
        <tr align="center">
            <td><i>www.cubinwebsite.com</i></td>
        </tr>
    </thead>
</table>
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
<br/>
    <table class="table table-bordered" id="table" style="margin-top:20px;">
    <thead align="center" style="text-align:center;"> 
        <tr align="center">                                
            <th>No</th>
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
                <td><?= $i ?></td>
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
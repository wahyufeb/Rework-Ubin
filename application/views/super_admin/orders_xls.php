<?php header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=$filename-$datereport.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>

<table>
    <thead>
        <tr align="center">
            <th><h2>REPORT DATA ORDERS</h2></th>
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
        <td>Total Orders</td>
        <td>&nbsp;:&nbsp;</td>
        <td><?= $totalorders[0]['orders'] ?></td>
    </tr>
    <tr>
        <td>Total Sold Products</td>
        <td>&nbsp;:&nbsp;</td>
        <td><?= $soldout[0]['sold'] ?></td>
    </tr>
</table>
<br/>
    <table class="table table-bordered" id="table" style="margin-top:20px;">
    <thead align="center" style="text-align:center;"> 
        <tr align="center">                 
            <th>No</th>
            <th>Email</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Date</th>
            <th>Province</th>
            <th>City</th>
            <th>Courier</th>
            <th>Adress</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        <?php foreach($orders as $row): ?>
        <?php $i++ ?>
            <tr align="center">
                <td><?= $i ?></td>
                <td align="left"><?= $row['email']; ?></td>
                <td><?= $row['namapro'] ?></td>
                <td><?=  $row['qty']?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['province'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['courier'] ?>, <?= $row['service'] ?></td>
                <td><?= $row['street_adress'] ?>, <?= $row['postal_code'] ?></td>
                <td><?= $row['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
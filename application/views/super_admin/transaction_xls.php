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
        <td>Total Transaction</td>
        <td>&nbsp;:&nbsp;</td>
        <td><?= $totaltrans[0]['total'] ?></td>
    </tr>
    <tr>
        <td>Total All Payment</td>
        <td>&nbsp;:&nbsp;</td>
        <td>Rp.<?= number_format($totalPay[0]['payment'], 0,',','.') ?></td>
    </tr>
</table>
<br/>
    <table class="table table-bordered" id="table" style="margin-top:20px;">
    <thead align="center" style="text-align:center;"> 
        <tr>
            <th>No</th>
            <th>Transaction Code</th>
            <th>Date</th>
            <th>Email</th>
            <th>Name</th>
            <th>Telephone</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        <?php foreach($transaction as $row): ?>
        <?php $i++ ?>
            <tr align="center">
                <td><?= $i ?></td>
                <td><?= $row['transaction_code'] ?></td>
                <td><?= $row['date'] ?></td>
                <td align="left"><?= $row['email']; ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['telephone'] ?></td>
                <td><?= $row['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
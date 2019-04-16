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
        <td>Total Products</td>
        <td>&nbsp;:&nbsp;</td>
        <td><?= $totalproducts[0]['totalpro'] ?> pcs</td>
    </tr>
    <tr>
        <td>Total Products Sold</td>
        <td>&nbsp;:&nbsp;</td>
        <td><?= $soldout[0]['sold'] ?> pcs</td>
    </tr>
</table>
<br/>
    <table width="100%" cellspacing="60" border="1">
    <thead  align="center" > 
        <tr bgcolor="skyblue">
            <th>No</th>
            <th width="220">Name</th>
            <th width="200">Price</th>
            <th>Weight</th>
            <th>Sold</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($products as $row): ?>
    <?php $i++ ?>
        <tr>
            <td align="center"><?= $i ?></td>
            <td align="left"><?= $row['name']; ?></td>
            <td>Rp.<?= number_format($row['price'], 0,',','.') ?></td>
            <td><?=  $row['weight']?> grams</td>
            <td align="center"><?=  $row['sold']?> </td>
            <td align="center"><?=  $row['stock']?> </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
<?php
include_once("../../cek-login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PENJUALAN</title>
    <style>
        @media print{
            .no-print{
                display:none;
            }
        }
        
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once("../../navbar.php"); ?>
        <form action="" method="post" class="no-print">
            <label for="waktu">Waktu Transaksi</label><br>
            <input type="date" id="waktu" name="from" value="<?=isset($_POST['from']) ? htmlspecialchars($_POST['from']) : ''; ?>">
            <input type="date" id="waktu" name="to" value="<?=isset($_POST['to']) ? htmlspecialchars($_POST['to']) : ''; ?>"><br><br>
            <button type="submit" name="display">Tampilkan</button>
        </form>
</body>
</html>

<?php
require_once("../../koneksi.php");
require_once("validate.inc");
if(isset($_POST['display'])){
    $error=[];
    validateRequired($_POST,'from',$error);
    validateRequired($_POST,'to',$error);
    
    if(empty($error)){
    $from = $_POST['from'];
    $to = $_POST['to'];

    $query = "SELECT waktu_transaksi, SUM(total) as total  FROM transaksi WHERE waktu_transaksi BETWEEN '$from' AND '$to' GROUP BY waktu_transaksi";
    $result = mysqli_query($conn,$query);

    $tanggal =[];
    $total =[];
    $data =[];

    if($result){
        while($row = mysqli_fetch_assoc($result)){
        $total[] = $row["total"];
        $tanggal[] = $row["waktu_transaksi"];
        $data[] = $row;
        }
    }
    $queryTotal = "SELECT sum(total) as total_pendapatan, count(distinct id) as total_pelanggan FROM transaksi WHERE waktu_transaksi BETWEEN '$from' AND '$to'";
        $resultTotal = mysqli_query($conn, $queryTotal);
        $Total = mysqli_fetch_assoc($resultTotal);
}else {
    $errorr = implode("\\n",$error);
    echo "<script>alert('$errorr');</script><br>";
}
}
?>

<?php if (!empty($data)): ?>
        <canvas id="myChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
        @media print{
            .no-print{
                display:none;
            }
        }
    </style>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?=json_encode($tanggal)?>,
                    datasets: [{
                        label: "Total",
                        data: <?=json_encode($total)?>,
                        backgroundColor: "gray",
                        borderColor:  "black",
                        borderWidth: 1
                    }]
                }
            });
        </script>
        <br>
        <table border="1">
            <tr>
                <th>NO</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
            <?php foreach ($data as $i => $row): ?>
                <tr>
                    <td><?=$i+1?></td>
                    <td><?=htmlspecialchars($row['total'])?></td>
                    <td><?=htmlspecialchars($row['waktu_transaksi'])?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <table border="1">
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
            <tr>
                    <td><?=htmlspecialchars($Total['total_pelanggan'])?></td>
                    <td><?=htmlspecialchars($Total['total_pendapatan'])?></td>
            </tr>
        </table>
        <br>
        <button onclick="window.print()" class="no-print">Cetak Halaman</button>
        <form action="excel.php" method="post" style="display: inline;" >
            <input type="hidden" name="from" value="<?=$from?>" >
            <input type="hidden" name="to" value="<?=$to?>" >
            <button name="unduh" class="no-print">Unduh Excel</button>
        </form>
    <?php endif; ?>

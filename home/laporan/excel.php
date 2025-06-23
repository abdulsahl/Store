<?php
require_once("../../koneksi.php");
if(isset($_POST['unduh'])){
    $from = $_POST['from'];
    $to = $_POST['to'];

    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=laporan.xls");
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
    $queryTotal = "SELECT SUM(total) as total_pendapatan, COUNT(DISTINCT id) as total_pelanggan FROM transaksi WHERE waktu_transaksi BETWEEN '$from' AND '$to'";
        $resultTotal = mysqli_query($conn, $queryTotal);
        $Total = mysqli_fetch_assoc($resultTotal);
}
?>
<h3>Rekap Laporan Penjualan <?=htmlspecialchars($_POST['from'])." Sampai ".htmlspecialchars($_POST['to']) ?></h3>
<?php if (!empty($data)): ?>
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
        
    <?php endif; ?>
</body>
</html>
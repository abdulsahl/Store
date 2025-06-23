<nav class="navbar">
        <div class="navbar-brand">Rekap Laporan Penjualan <?=isset($_POST['from'])&& isset($_POST['to']) ? htmlspecialchars($_POST['from'])." Sampai ".htmlspecialchars($_POST['to'])  : ''; ?></div>
        <ul class="navbar-links">
            <li class="no-print"><a href="../index.php">Home</a></li>
            <?php if(isset($_SESSION['level'])&& $_SESSION['level']== 1):?>
            <li class="dropdown no-print" >
                <a href="" class="dropdown-toggle">Data Master &#9662;</a>
                <ul class="dropdown-menu">
                    <li><a href="../barang/index.php">Data Barang</a></li>
                    <li><a href="../supplier/index.php">Data Supplier</a></li>
                    <li><a href="../pelanggan/index.php">Data Pelanggan</a></li>
                    <li><a href="../user/index.php">Data User</a></li>
                </ul>
            </li>
            <?php endif ?>
            <li class="no-print"><a href="../transaksi/index.php">Transaksi</a></li>
            <li class="no-print"><a href="../laporan/index.php">Laporan</a></li>
            <li class="dropdown no-print">
                <a href="" class="dropdown-toggle"><?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : '';?> &#9662;</a>
                <ul class="dropdown-menu">
                    <li><a href="../../logout.php">Logout</a></li>
                </ul>
        </ul>
    </nav>
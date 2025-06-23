<?php if(isset($_GET['transaksi_id'])): ?>
    <input type="hidden" name="barang" value="<?= isset($_GET['transaksi_id']) ? htmlspecialchars($_GET['transaksi_id']) : ''; ?>">
<?php else: ?>
    <label for="transaksi"> ID Transaksi</label><br>
    <select name="transaksi" id="transaksi">
        <option value="">Pilih ID transaksi</option>
        <?php foreach ($result_transaksi as $row): ?>
            <option value="<?=$row['id']?>" <?= isset($_POST['transaksi']) && $_POST['transaksi'] == $row['id'] ? 'selected' : ''; ?>><?=$row['nama']?></option>
        <?php endforeach; ?>
    </select><br><br>
<?php endif; ?>
<label for="barang">Pilih Barang</label><br>
<select name="barang" id="barang">
    <option value="">Pilih barang</option>
    <?php foreach ($result_barang as $row): ?>
        <?php if($row['id'] == $result['id']): ?>
            <?php continue; ?>
        <?php else: ?>
            <option value="<?=$row['id']?>" <?= isset($_POST['barang']) && $_POST['barang'] == $row['id'] ? 'selected' : ''; ?>><?=$row['nama_barang']?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select><br><br>
<label for="qty">Quantity</label>
<input type="number" name="qty" placeholder="Masukkan jumlah barang" value="<?= isset($_POST['qty']) ? htmlspecialchars($_POST['qty']) : ''; ?>"><br><br>
<button type="submit" name="submit" value="true">Tambah Detail Transaksi</button>

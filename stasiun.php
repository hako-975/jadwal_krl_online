<?php 
    require_once 'koneksi.php';

    $stasiun = mysqli_query($koneksi, "SELECT * FROM stasiun ORDER BY nama_stasiun ASC");

    if (isset($_POST['btnCari'])) {
        $cari = $_POST['cari'];
        $stasiun = mysqli_query($koneksi, "SELECT * FROM stasiun WHERE nama_stasiun LIKE '%$cari%' OR kota LIKE '%$cari%' ORDER BY nama_stasiun ASC");
    }
?>

<html>
<head>
    <?php include_once 'head.php'; ?>
    <title>Stasiun</title>
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container anti-navbar">
        <div class="bg-table">
            <div class="head-left">
                <h2>Stasiun</h2>
            </div>
            <div class="head-right">
                <a href="tambah_stasiun.php" class="button">Tambah Stasiun</a>
            </div>
            <div class="clear">
                <form method="post" class="form-cari">
                    <input class="input" type="text" id="cari" name="cari" placeholder="Cari" required value="<?= (isset($_POST['cari'])) ? $_POST['cari'] : ''; ?>">
                    <button type="submit" class="button align-right" name="btnCari">Cari</button>
                </form>
            </div>
            <?php if (isset($_POST['cari'])): ?>
                <div class="clear">
                    <h2>Cari: <?= $_POST['cari']; ?></h2>
                    <h2>Ditemukan: <?= mysqli_num_rows($stasiun); ?></h2>
                    <a href="stasiun.php" class="button">Reset</a>
                </div>
            <?php endif ?>
            <div class="table-responsive clear">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Nama Stasiun</th>
                        <th>Kota</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php if (mysqli_num_rows($stasiun) > 0): ?>
                        <?php foreach ($stasiun as $data): ?>
                            <tr>
                                <td><?= $i++; ?>.</td>
                                <td><?= $data['nama_stasiun']; ?></td>
                                <td><?= $data['kota']; ?></td>
                                <td>
                                    <a href="ubah_stasiun.php?id_stasiun=<?= $data['id_stasiun']; ?>" class="button bg-green">Ubah</a>
                                    <a onclick="return confirm('Apakah Anda yakin ingin menghapus stasiun <?= $data['nama_stasiun']; ?>?')" href="hapus_stasiun.php?id_stasiun=<?= $data['id_stasiun']; ?>" class="button bg-red">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Tidak ada data</td>
                        </tr>
                    <?php endif ?>
                </table>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
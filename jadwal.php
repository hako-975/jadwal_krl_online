<?php 
    require_once 'koneksi.php';

    $jadwal = mysqli_query($koneksi, "SELECT jadwal.*, stasiun_asal.nama_stasiun AS stasiun_asal, stasiun_tujuan.nama_stasiun AS stasiun_tujuan
    FROM jadwal
    INNER JOIN stasiun AS stasiun_asal ON jadwal.id_stasiun_asal = stasiun_asal.id_stasiun
    INNER JOIN stasiun AS stasiun_tujuan ON jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun
    ORDER BY jam_berangkat ASC
    ");

    if (isset($_POST['btnCari'])) {
        $cari = $_POST['cari'];
        $jadwal = mysqli_query($koneksi, "SELECT jadwal.*, stasiun_asal.nama_stasiun AS stasiun_asal, stasiun_tujuan.nama_stasiun AS stasiun_tujuan
    FROM jadwal
    INNER JOIN stasiun AS stasiun_asal ON jadwal.id_stasiun_asal = stasiun_asal.id_stasiun
    INNER JOIN stasiun AS stasiun_tujuan ON jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun 
    WHERE stasiun_asal.nama_stasiun LIKE '%$cari%' OR 
    stasiun_tujuan.nama_stasiun LIKE '%$cari%' OR
    stasiun_asal.kota LIKE '%$cari%' OR
    stasiun_tujuan.kota LIKE '%$cari%' OR
    jam_berangkat LIKE '%$cari%' OR
    jam_tiba LIKE '%$cari%' OR
    harga LIKE '%$cari%'
    ORDER BY jam_berangkat ASC
    ");
    }
?>

<html>
<head>
    <?php include_once 'head.php'; ?>
    <title>Jadwal</title>
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container anti-navbar">
        <div class="bg-table">
            <div class="head-left">
                <h2>Jadwal</h2>
            </div>
            <div class="head-right">
                <a href="tambah_jadwal.php" class="button">Tambah Jadwal</a>
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
                    <h2>Ditemukan: <?= mysqli_num_rows($jadwal); ?></h2>
                    <a href="jadwal.php" class="button">Reset</a>
                </div>
            <?php endif ?>
            <div class="table-responsive clear">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Stasiun Asal</th>
                        <th>Stasiun Tujuan</th>
                        <th>Jam Berangkat</th>
                        <th>Jam Tiba</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php if (mysqli_num_rows($jadwal) > 0): ?>
                        <?php foreach ($jadwal as $data): ?>
                            <tr>
                                <td><?= $i++; ?>.</td>
                                <td><?= $data['stasiun_asal']; ?></td>
                                <td><?= $data['stasiun_tujuan']; ?></td>
                                <td><?= $data['jam_berangkat']; ?></td>
                                <td><?= $data['jam_tiba']; ?></td>
                                <td>Rp. <?= str_replace(",", ".", number_format($data['harga'])); ?></td>
                                <td>
                                    <a href="ubah_jadwal.php?id_jadwal=<?= $data['id_jadwal']; ?>" class="button bg-green">Ubah</a>
                                    <a onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal <?= $data['stasiun_asal']; ?> menuju <?= $data['stasiun_tujuan']; ?>?')" href="hapus_jadwal.php?id_jadwal=<?= $data['id_jadwal']; ?>" class="button bg-red">Hapus</a>
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
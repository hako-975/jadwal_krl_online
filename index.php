<?php 
    require_once 'koneksi.php';

    $stasiun = mysqli_query($koneksi, "SELECT * FROM stasiun ORDER BY nama_stasiun ASC");

    $jadwal = mysqli_query($koneksi, "SELECT jadwal.*, stasiun_asal.nama_stasiun AS stasiun_asal, stasiun_tujuan.nama_stasiun AS stasiun_tujuan
    FROM jadwal
    INNER JOIN stasiun AS stasiun_asal ON jadwal.id_stasiun_asal = stasiun_asal.id_stasiun
    INNER JOIN stasiun AS stasiun_tujuan ON jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun
    ORDER BY jam_berangkat ASC");

    if (isset($_POST['btnCari'])) {
        $stasiun_asal = $_POST['stasiun_asal'];
        $stasiun_tujuan = $_POST['stasiun_tujuan'];
        if ($stasiun_asal == 0 || $stasiun_tujuan == 0) {
            header("Location: index.php");
            exit;
        }

        $stasiun_asal_nama = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM stasiun WHERE id_stasiun = '$stasiun_asal'"))['nama_stasiun'];
        $stasiun_tujuan_nama = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM stasiun WHERE id_stasiun = '$stasiun_tujuan'"))['nama_stasiun'];

        $jadwal = mysqli_query($koneksi, "SELECT jadwal.*, stasiun_asal.nama_stasiun AS stasiun_asal, stasiun_tujuan.nama_stasiun AS stasiun_tujuan
        FROM jadwal
        INNER JOIN stasiun AS stasiun_asal ON jadwal.id_stasiun_asal = stasiun_asal.id_stasiun
        INNER JOIN stasiun AS stasiun_tujuan ON jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun
        WHERE stasiun_asal.id_stasiun = '$stasiun_asal' AND stasiun_tujuan.id_stasiun = '$stasiun_tujuan'
        ORDER BY jam_berangkat ASC
        ");
    }
?>

<html>
<head>
    <?php include_once 'head.php'; ?>
    <title>Jadwal KRL Online</title>
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container anti-navbar">
        <div class="bg-table">
            <h2 class="text-center">Jadwal KRL Online</h2>
            <form method="post">
                <div class="form-row">
                    <div>
                        <label class="label" for="stasiun_asal">Stasiun Asal</label>
                        <select id="stasiun_asal" name="stasiun_asal" class="input">
                            <option value="<?= (isset($_POST['btnCari']) ? $_POST['stasiun_asal'] : '0'); ?>"><?= (isset($_POST['btnCari']) ? $stasiun_asal_nama : '--- Stasiun Asal ---'); ?></option>
                            <?php foreach ($stasiun as $data): ?>
                                <option value="<?= $data['id_stasiun']; ?>"><?= $data['nama_stasiun']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div>
                        <label class="label" for="stasiun_tujuan">Stasiun Tujuan</label>
                        <select id="stasiun_tujuan" name="stasiun_tujuan" class="input">
                            <option value="<?= (isset($_POST['btnCari']) ? $_POST['stasiun_tujuan'] : '0'); ?>"><?= (isset($_POST['btnCari']) ? $stasiun_tujuan_nama : '--- Stasiun Tujuan ---'); ?></option>
                            <?php foreach ($stasiun as $data): ?>
                                <option value="<?= $data['id_stasiun']; ?>"><?= $data['nama_stasiun']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <button type="submit" name="btnCari" class="button btn-cari">Cari</button>
                    <a href="index.php" class="button btn-cari">Reset</a>
                </div>
            </form>
            <div>
                <h2>Jumlah Jadwal: <?= mysqli_num_rows($jadwal); ?></h2>
            </div>
            <div class="table-responsive">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Stasiun Asal</th>
                        <th>Stasiun Tujuan</th>
                        <th>Jam Berangkat</th>
                        <th>Jam Tiba</th>
                        <th>Harga</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php if (mysqli_num_rows($jadwal) > 0): ?>
                        <?php foreach ($jadwal as $data): ?>
                            <tr>
                                <td><?= $i++; ?>.</td>
                                <td><?= $data['stasiun_asal']; ?></td>
                                <td><?= $data['stasiun_tujuan']; ?></td>
                                <td><?= substr($data['jam_berangkat'], 0, 5); ?></td>
                                <td><?= substr($data['jam_tiba'], 0, 5); ?></td>
                                <td>Rp. <?= str_replace(",", ".", number_format($data['harga'])); ?></td>
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
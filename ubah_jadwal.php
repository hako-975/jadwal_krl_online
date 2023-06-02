<?php 
    require_once 'koneksi.php';
    $stasiun = mysqli_query($koneksi, "SELECT * FROM stasiun ORDER BY nama_stasiun ASC");

    $id_jadwal = $_GET['id_jadwal'];

    $data_jadwal = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT jadwal.*, stasiun_asal.nama_stasiun AS stasiun_asal, stasiun_tujuan.nama_stasiun AS stasiun_tujuan
    FROM jadwal
    INNER JOIN stasiun AS stasiun_asal ON jadwal.id_stasiun_asal = stasiun_asal.id_stasiun
    INNER JOIN stasiun AS stasiun_tujuan ON jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun WHERE jadwal.id_jadwal = '$id_jadwal'"));

    if (isset($_POST['btnUbah'])) {
        $id_stasiun_asal = $_POST['id_stasiun_asal'];
        $id_stasiun_tujuan = $_POST['id_stasiun_tujuan'];

        if ($id_stasiun_asal == 0) {
            echo "
                <script>
                    alert('Pilih stasiun asal terlebih dahulu!')
                    window.history.back()
                </script>
            ";
            exit;     
        }

        if ($id_stasiun_tujuan == 0) {
            echo "
                <script>
                    alert('Pilih stasiun tujuan terlebih dahulu!')
                    window.history.back()
                </script>
            ";
            exit;     
        }

        $jam_berangkat = $_POST['jam_berangkat'];
        $jam_tiba = $_POST['jam_tiba'];
        $harga = $_POST['harga'];

        $ubah_jadwal = mysqli_query($koneksi, "UPDATE jadwal SET id_stasiun_asal = '$id_stasiun_asal', id_stasiun_tujuan = '$id_stasiun_tujuan', jam_berangkat = '$jam_berangkat', jam_tiba = '$jam_tiba', harga = '$harga' WHERE jadwal.id_jadwal = '$id_jadwal'");

        if ($ubah_jadwal) {
            echo "
                <script>
                    alert('Jadwal berhasil diubah!')
                    window.location.href='jadwal.php'
                </script>
            ";
            exit;
        } else {
            echo "
                <script>
                    alert('Jadwal gagal diubah!')
                    window.history.back()
                </script>
            ";
            exit;
        }
    }
?>

<html>
<head>
    <?php include_once 'head.php'; ?>
    <title>Ubah Jadwal</title>
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container anti-navbar">
        <div class="container">
            <form method="post" class="form form-left">
                <h2>Ubah Jadwal</h2>
                <label class="label" for="id_stasiun_asal">Stasiun Asal</label>
                <select id="id_stasiun_asal" name="id_stasiun_asal" class="input">
                    <option value="<?= $data_jadwal['id_stasiun_asal']; ?>"><?= $data_jadwal['stasiun_asal']; ?></option>
                    <?php foreach ($stasiun as $data): ?>
                        <?php if ($data_jadwal['id_stasiun_asal'] != $data['id_stasiun']): ?>
                            <option value="<?= $data['id_stasiun']; ?>"><?= $data['nama_stasiun']; ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>

                <label class="label" for="id_stasiun_tujuan">Stasiun Tujuan</label>
                <select id="id_stasiun_tujuan" name="id_stasiun_tujuan" class="input">
                    <option value="<?= $data_jadwal['id_stasiun_tujuan']; ?>"><?= $data_jadwal['stasiun_tujuan']; ?></option>
                    <?php foreach ($stasiun as $data): ?>
                        <?php if ($data_jadwal['id_stasiun_tujuan'] != $data['id_stasiun']): ?>
                            <option value="<?= $data['id_stasiun']; ?>"><?= $data['nama_stasiun']; ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>

                <label class="label" for="jam_berangkat">Jam Berangkat</label>
                <input type="time" name="jam_berangkat" value="<?= $data_jadwal['jam_berangkat']; ?>" class="input" required>

                <label class="label" for="jam_tiba">Jam Tiba</label>
                <input type="time" name="jam_tiba" value="<?= $data_jadwal['jam_tiba']; ?>" class="input" required>

                <label class="label" for="harga">Harga</label>
                <input type="number" name="harga" value="<?= $data_jadwal['harga']; ?>" class="input" required>

                <button type="submit" class="button align-right" name="btnUbah">Kirim</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
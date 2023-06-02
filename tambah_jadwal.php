<?php 
    require_once 'koneksi.php';
    $stasiun = mysqli_query($koneksi, "SELECT * FROM stasiun ORDER BY nama_stasiun ASC");

    if (isset($_POST['btnTambah'])) {
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

        $tambah_jadwal = mysqli_query($koneksi, "INSERT INTO jadwal VALUES ('', '$id_stasiun_asal', '$id_stasiun_tujuan', '$jam_berangkat', '$jam_tiba', '$harga')");

        if ($tambah_jadwal) {
            echo "
                <script>
                    alert('Jadwal berhasil ditambahkan!')
                    window.location.href='jadwal.php'
                </script>
            ";
            exit;
        } else {
            echo "
                <script>
                    alert('Jadwal gagal ditambahkan!')
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
    <title>Tambah Jadwal</title>
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container anti-navbar">
        <div class="container">
            <form method="post" class="form form-left">
                <h2>Tambah Jadwal</h2>
                <label class="label" for="id_stasiun_asal">Stasiun Asal</label>
                <select id="id_stasiun_asal" name="id_stasiun_asal" class="input">
                    <option value="0">--- Stasiun Asal ---</option>
                    <?php foreach ($stasiun as $data): ?>
                        <option value="<?= $data['id_stasiun']; ?>"><?= $data['nama_stasiun']; ?></option>
                    <?php endforeach ?>
                </select>

                <label class="label" for="id_stasiun_tujuan">Stasiun Tujuan</label>
                <select id="id_stasiun_tujuan" name="id_stasiun_tujuan" class="input">
                    <option value="0">--- Stasiun Tujuan ---</option>
                    <?php foreach ($stasiun as $data): ?>
                        <option value="<?= $data['id_stasiun']; ?>"><?= $data['nama_stasiun']; ?></option>
                    <?php endforeach ?>
                </select>

                <label class="label" for="jam_berangkat">Jam Berangkat</label>
                <input type="time" name="jam_berangkat" class="input" required>

                <label class="label" for="jam_tiba">Jam Tiba</label>
                <input type="time" name="jam_tiba" class="input" required>

                <label class="label" for="harga">Harga</label>
                <input type="number" name="harga" class="input" required>

                <button type="submit" class="button align-right" name="btnTambah">Kirim</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
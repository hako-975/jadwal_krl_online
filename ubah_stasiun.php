<?php 
    require_once 'koneksi.php';

    $id_stasiun = $_GET['id_stasiun'];

    $data_stasiun = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM stasiun WHERE id_stasiun = '$id_stasiun'"));

    if (isset($_POST['btnUbah'])) {
        $nama_stasiun = $_POST['nama_stasiun'];
        $kota = $_POST['kota'];

        $ubah_stasiun = mysqli_query($koneksi, "UPDATE stasiun SET nama_stasiun = '$nama_stasiun', kota = '$kota' WHERE id_stasiun = '$id_stasiun'");

        if ($ubah_stasiun) {
            echo "
                <script>
                    alert('Stasiun berhasil diubah!')
                    window.location.href='stasiun.php'
                </script>
            ";
            exit;
        } else {
            echo "
                <script>
                    alert('Stasiun gagal diubah!')
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
    <title>Ubah Stasiun - <?= $data_stasiun['nama_stasiun']; ?></title>
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container anti-navbar">
        <div class="container">
            <form method="post" class="form form-left">
                <h2>Ubah Stasiun - <?= $data_stasiun['nama_stasiun']; ?></h2>
                <label class="label" for="nama_stasiun">Nama Stasiun</label>
                <input type="text" class="input" id="nama_stasiun" name="nama_stasiun" value="<?= $data_stasiun['nama_stasiun']; ?>" required>

                <label class="label" for="kota">Kota</label>
                <input type="text" class="input" id="kota" name="kota" value="<?= $data_stasiun['kota']; ?>" required>

                <button type="submit" class="button align-right" name="btnUbah">Kirim</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
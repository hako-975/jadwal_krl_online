<?php 
    require_once 'koneksi.php';

    if (isset($_POST['btnTambah'])) {
        $nama_stasiun = $_POST['nama_stasiun'];
        $kota = $_POST['kota'];

        $tambah_stasiun = mysqli_query($koneksi, "INSERT INTO stasiun VALUES ('', '$nama_stasiun', '$kota')");

        if ($tambah_stasiun) {
            echo "
                <script>
                    alert('Stasiun berhasil ditambahkan!')
                    window.location.href='stasiun.php'
                </script>
            ";
            exit;
        } else {
            echo "
                <script>
                    alert('Stasiun gagal ditambahkan!')
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
    <title>Tambah Stasiun</title>
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container anti-navbar">
        <div class="container">
            <form method="post" class="form form-left">
                <h2>Tambah Stasiun</h2>
                <label class="label" for="nama_stasiun">Nama Stasiun</label>
                <input type="text" class="input" id="nama_stasiun" name="nama_stasiun" required>

                <label class="label" for="kota">Kota</label>
                <input type="text" class="input" id="kota" name="kota" required>

                <button type="submit" class="button align-right" name="btnTambah">Kirim</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
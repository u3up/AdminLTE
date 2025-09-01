<?php
include 'koneksi.php';

$id = isset($_GET['id_data']) ? $_GET['id_data'] : null;
if (!$id) {
    header("Location: index.php");
    exit();
}

$data = $koneksi->query("SELECT * FROM data_diri WHERE id_data=$id")->fetch_assoc();
if (!$data) {
    echo "Data tidak ditemukan";
    exit();
}

if (isset($_POST['simpan'])) {
    $nama   = $koneksi->real_escape_string($_POST['nama']);
    $alamat = $koneksi->real_escape_string($_POST['alamat']);
    $jk     = $koneksi->real_escape_string($_POST['jk']);
    $nope   = (int) $_POST['nope'];

    $query = "UPDATE data_diri SET 
                nama='$nama', 
                alamat='$alamat', 
                jk='$jk', 
                nope=$nope 
              WHERE id_data=$id";

    if ($koneksi->query($query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal update data: " . $koneksi->error;
    }
}
?>

<form method="POST">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
    Alamat: <input type="text" name="alamat" value="<?= $data['alamat'] ?>"><br>
    JK: <input type="text" name="jk" value="<?= $data['jk'] ?>"><br>
    No HP: <input type="text" name="nope" value="<?= $data['nope'] ?>"><br>
    <button type="submit" name="simpan">Simpan</button>
</form>
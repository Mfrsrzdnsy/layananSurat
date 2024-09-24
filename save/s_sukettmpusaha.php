<?php
include '../koneksi.php';

$kodejenis        = $_POST['kodejenis'];
$kode             = $_POST['kodesurat'];
$kode_klasi       = $_POST['kode_klasi'];
$nmsurat          = $_POST['nmsurat'];
$no               = $_POST['nosurat'];
$idstf            = $_POST['idstf'];
$nmusaha          = $_POST['nmusaha'];
$bdgusaha         = $_POST['bdgusaha'];
$thnberdiri       = $_POST['thnberdiri'];
$jmlpekerja       = $_POST['jmlpekerja'];
$izinusaha        = $_POST['izinusaha'];
$alamatusaha      = $_POST['alamatusaha'];
$nik              = $_POST['nik'];
$nama             = $_POST['nama'];
$blnr             = $_POST['blnr'];
$kades            = $_POST['kades'];
$thn              = date('Y');
$slash            = '/';
$nosur            = $kode_klasi . $slash . $no . $slash . $blnr . $slash . $thn;
$detail           = $nmusaha . ';' . $bdgusaha . ';' . $thnberdiri . ';' . $nama . ';' . $jmlpekerja . ';' . $izinusaha . ';' . $alamatusaha;

// Proses upload foto
if (isset($_FILES['fotousaha']['name'])) {
    $fotousaha = $_FILES['fotousaha']['name'];
    $target_dir = "../uploads/"; // Tentukan folder tempat menyimpan file foto
    $target_file = $target_dir . basename($fotousaha);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek tipe file yang diizinkan
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $allowed_types)) {
        // Pindahkan file foto yang diupload ke folder tujuan
        if (move_uploaded_file($_FILES['fotousaha']['tmp_name'], $target_file)) {
            // Jika file berhasil diupload, lanjutkan ke proses insert data
            if (isset($_POST['cetak'])) {
                // isi qrcode yang ingin dibuat
                $isi = $nosur . 'nik:' . $nik . 'nama:' . $nama;
                $nama_qr = md5($isi);

                // memanggil library phpqrcode
                include "../phpqrcode/qrlib.php";
                $penyimpanan = "../qrcode/";

                // membuat folder jika belum ada
                if (!file_exists($penyimpanan))
                    mkdir($penyimpanan);

                // perintah membuat qrcode
                QRcode::png($isi, $penyimpanan . $nama_qr . '.png', QR_ECLEVEL_L, 10, 5);

                // menampilkan qrcode 
                echo '<img src="' . $penyimpanan . $nama_qr . '.png">';

                // Insert ke tabel t_buatsendiri
                mysqli_query($con, "INSERT INTO t_buatsendiri (nik, nama, kode_surat, kode_jenis, no_surat, nmsurat, tgl, status) VALUES ('$nik','$nama','$kode','$kodejenis','$nosur','$nmsurat','" . date('Y-m-d') . "','onprocess')");

                // Insert ke tabel t_datasurat
                mysqli_query($con, "INSERT INTO t_datasurat(kode, kodejenis, nmsurat, no, id_stf, tanggal, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','" . date('Y-m-d') . "','onprocess')");

                // Insert ke tabel t_detailsurat beserta nama file foto yang diupload
                mysqli_query($con, "INSERT INTO t_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, tanggal, ttd, qrcode, id_ptg, foto_usaha) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail','" . date('Y-m-d') . "','$kades','" . $nama_qr . ".png','$idstf', '$fotousaha')");

                echo "<script>alert('Surat berhasil dibuat!'); window.location = '../buat_sendiri.php?page=tunggu&kode=$kode'</script>";
            }
        } else {
            echo "Terjadi kesalahan saat mengupload foto.";
        }
    } else {
        echo "Format file yang diperbolehkan hanya JPG, JPEG, PNG, dan GIF.";
    }
} else {
    echo "Harap upload foto usaha.";
}

mysqli_close($con);
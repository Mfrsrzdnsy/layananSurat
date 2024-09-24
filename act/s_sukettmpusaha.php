<?php
include '../koneksi.php';

// Ambil data dari form
$kodejenis  = $_POST['kodejenis'];
$kode       = $_POST['kodesurat'];
$kode_klasi = $_POST['kode_klasi'];
$nmsurat    = $_POST['nmsurat'];
$no         = $_POST['nosurat'];
$idstf      = $_POST['idstf'];
$nmusaha    = $_POST['nmusaha'];
$bdgusaha   = $_POST['bdgusaha'];
$thnberdiri = $_POST['thnberdiri'];
$jmlpekerja = $_POST['jmlpekerja'];
$izinusaha  = $_POST['izinusaha'];
$alamatusaha= $_POST['alamatusaha'];
$nik        = $_POST['nik'];
$nama       = $_POST['nama'];
$blnr       = $_POST['blnr'];
$kades      = $_POST['kades'];
$thn        = date('Y');
$slash      = '/';
$nosur      = $kode_klasi . $slash . $no . $slash . $blnr . $slash . $thn;
$detail     = $nmusaha . ';' . $bdgusaha . ';' . $thnberdiri . ';' . $nama . ';' . $jmlpekerja . ';' . $izinusaha . ';' . $alamatusaha;

// Penanganan file upload
$target_dir = "../uploads/";
$foto_name = basename($_FILES["foto"]["name"]);
$target_file = $target_dir . $foto_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek apakah file yang diupload adalah gambar
$check = getimagesize($_FILES["foto"]["tmp_name"]);
if($check !== false) {
    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "File ". htmlspecialchars($foto_name). " berhasil diunggah.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
} else {
    echo "File bukan gambar.";
}

// Menyimpan data ke database
if(isset($_POST['cetak'])){
    include "../phpqrcode/qrlib.php"; 
    $isi = $nosur.'nik:'.$nik.'nama:'.$nama;
    $nama_qr = md5($isi);
    $penyimpanan = "../qrcode/";
    if (!file_exists($penyimpanan)) mkdir($penyimpanan);
    QRcode::png($isi, $penyimpanan.$nama_qr.'.png', QR_ECLEVEL_L, 10, 5);

    // Insert ke tabel t_datasurat
    mysqli_query($con, "INSERT INTO t_datasurat(kode, kodejenis, nmsurat, no, id_stf, tanggal, status) 
                        VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','".date('Y-m-d')."','acc')");

    // Insert ke tabel t_detailsurat termasuk kolom foto
    mysqli_query($con, "INSERT INTO t_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, tanggal, ttd, qrcode, id_ptg, foto) 
                        VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail','".date('Y-m-d')."','$kades','".$nama_qr.".png','$idstf','$foto_name')");

    echo "<script>alert('Surat Keterangan Tempat Usaha berhasil dibuat!'); window.location = '../cetak/c_sukettmpusaha.php?kode=$kode'</script>";
}
?>

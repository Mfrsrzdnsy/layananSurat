<?php
//include '../sesi.php';
include 'koneksi.php';
include_once "assets/inc.php";
?>

<body>
    <div class="au-card recent-report">
        <!-- Left Panel -->
        <section class="welcome p-t-1s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-5">SURAT KETERANGAN TEMPAT USAHA
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>


        <!-- Header-->

        <!-- MODAL SURAT KETERANGAN UMUM -->


        <?php
        $query = mysqli_query($con, "SELECT max(kode) as kodeTerbesar FROM t_datasurat");
        $data = mysqli_fetch_array($query);
        $kodesurat = $data['kodeTerbesar'];

        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kodesurat, 2, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode surat baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "SR";
        $kodesurat = $huruf . sprintf("%03s", $urutan);
        $nourut = sprintf("%03s", $urutan);
        ?>

        <form action="save/s_sukettmpusaha.php" onsubmit="return validasi_input(this)" method="post"
            enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                    <div class="col-12 col-md-3"><input type="text" id="kodesurat" name="kodesurat"
                            value="<?php echo $kodesurat ?>" readonly="readonly" class="form-control"></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="nmusaha" class=" form-control-label">Nama Surat</label></div>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM t_jenissurat WHERE kode='JS002' ORDER BY id ASC ");
                    while ($r = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-12 col-md-9"><input type="text" id="nmsurat" name="nmsurat" class="form-control"
                            value="<?php echo $r['nmsurat']; ?>" readonly> </div>
                </div>

                <?php
                        $query = mysqli_query($con, "SELECT * FROM t_desa WHERE id='1'");
                        while ($rdes = mysqli_fetch_array($query)) {
                ?>


                <div class="row form-group">
                    <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                    <?php $nik = $_SESSION['nik']; ?>
                    <input type="hidden" id="idstf" name="idstf" value="<?php echo $nik; ?>">
                    <input type="hidden" id="kode_klasi" name="kode_klasi" value="<?php echo $r['kode_klasi'] ?>">
                    <input type="hidden" id="blnr" name="blnr" value="<?php echo getRomawi(date('m')); ?>">

                    <input type="hidden" id="kades" name="kades" value="<?php echo $rdes['kades']; ?>">
                    <input type="hidden" id="kodejenis" name="kodejenis" value="<?php echo $r['kode']; ?>">
                    <div class="col-12 col-md-3"><input type="text" id="nosurat" name="nosurat" maxlength="3"
                            class="form-control" value="<?php echo $nourut ?>" readonly></div>
                </div>
                <?php }
                    } ?>
                <hr>
                <h6> KETERANGAN TEMPAT USAHA</h6>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nmusaha" class=" form-control-label">Nama Usaha</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nmusaha" name="nmusaha" class="form-control"
                            placeholder="Nama Usaha yang di Jalankan" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="bdgusaha" class=" form-control-label">Bidang Usaha</label>
                    </div>
                    <div class="col-12 col-md-8"><input type="text" id="bdgusaha" name="bdgusaha" class="form-control"
                            placeholder="Bidang Usaha yang dijalankan" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="thnbediri" class=" form-control-label">Tahun Berdiri</label>
                    </div>
                    <div class="col-12 col-md-3"><input type="text" id="thnberdiri" name="thnberdiri"
                            class="form-control" placeholder="1999" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="jmlpekerja" class=" form-control-label">Jumlah Pekerja</label>
                    </div>
                    <div class="col-12 col-md-3"><input type="number" id="jmlpekerja" name="jmlpekerja"
                            class="form-control" placeholder="0" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="izinusaha" class=" form-control-label">Jenis Usaha yang di
                            Miliki</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="izinusaha" name="izinusaha" class="form-control"
                            placeholder="Nama Surat Izin Usaha yang di miliki" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="alamtusaha" class=" form-control-label">Alamat Usaha</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="alamatusaha" name="alamatusaha"
                            class="form-control" placeholder="Alamat/Lokasi Tempat Usaha yang dijalankan" required>
                    </div>
                </div>
                <hr>
                <h6>KETERANGAN PEMILIK</h6>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="nik" name="nik" onkeyup="isinik()"
                            class="form-control" maxlength="16" placeholder="NIK Pemilik" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Nama Pemilik"
                            readonly="readonly" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="fotousaha" class="form-control-label">Upload Foto
                            Usaha</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="fotousaha" name="fotousaha" class="form-control"
                            required></div>
                </div>


                <div class="modal-footer">
                    <div class="col col-md-6"><button type="reset"
                            class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                    <div class="col col-md-6"><button type="submit" name="cetak"
                            class="btn btn-primary btn-sm pull pull-right">Cetak</button></div>
                </div>
            </div>
        </form>
    </div>

    <!-- END MODAL SUKET UMUM -->





    <!-- END MODAL SUKET UMUM -->

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Surat</strong>
                        </div>

                        <div class="card-body scroll">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Surat</th>
                                        <th>Tanggal</th>
                                        <th>Pemilik</th>
                                        <th>Usaha</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM t_buatsendiri, t_detailsurat WHERE t_buatsendiri.kode_jenis='JS002' AND t_buatsendiri.nik='$nik' AND t_buatsendiri.status='acc' AND t_detailsurat.kode=t_buatsendiri.kode_surat ORDER BY t_buatsendiri.id DESC ");
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        $dt = explode(';', $data['detail']);
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_surat']; ?></td>
                                        <td><?php echo $data['tgl']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $dt[0]; ?></td>
                                        <td>
                                            <a href="cetak/c_sukettmpusaha.php?kode=<?php echo $data['kode']; ?>"
                                                target="_BLANK" class="btn"><i class="fa fa-print"></i></a>
                                            <a href="?page=edit_sukettmpusaha&amp;kode=<?php echo "$data[kode]"; ?>"
                                                class="btn"><i class="fa fa-edit"></i></a>
                                            <a href="del/h_detailsurat.php?kode=<?php echo $data['kode']; ?>"
                                                class="btn"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- .animated -->

    </div><!-- .content -->

    <!-- jQuery 3 -->
    <script src="assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->



    <script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });
    </script>

    <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
    </script>


    <script type="text/javascript">
    function isinik() {
        var nik = $("#nik").val();
        $.ajax({
            url: 'data/panggildatawarga.php',
            data: "nik=" + nik,
        }).success(function(data) {
            var json = data,
                obj = JSON.parse(json);
            $('#nama').val(obj.nama);
            $('#jk').val(obj.jk);
            $('#tmp_lahir').val(obj.tmp_lahir);
            $('#tgl_lahir').val(obj.tgl_lahir);
            $('#agama').val(obj.agama);
            $('#status').val(obj.status);
            $('#pend').val(obj.pend);
            $('#kerjaan').val(obj.kerjaan);
            $('#rt').val(obj.rt);
            $('#dusun').val(obj.dusun);
        });
    }
    </script>


    <script type="text/javascript">
    function isiredaksi() {
        var nmsurat = $("#nmsurat").val();
        $.ajax({
            url: 'data/panggiljenissurat.php',
            data: "nmsurat=" + nmsurat,
        }).success(function(data) {
            var json = data,
                obj = JSON.parse(json);
            $('#kode_klasi').val(obj.kode_klasi);
            $('#rdawal').val(obj.rdawal);
            $('#rdtengah').val(obj.rdtengah);
            $('#rdakhir').val(obj.rdakhir);
        });
    }
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#buatSurat').click(function() {
            $('#modalSurat , #bg').fadeIn("slow");
        });
        $('#tombol-tutup').click(function() {
            $('#modalSurat , #bg').fadeOut("slow");
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#editSurat').click(function() {
            $('#modalEditSurat , #bg').fadeIn("slow");
        });
        $('#tombol-tutup').click(function() {
            $('#modalEditSurat , #bg').fadeOut("slow");
        });
    });
    </script>



    <script type="text/javascript">
    function validasi_input(form) {
        var mincar = 16;
        var minruf = 3;
        if (form.nmsurat.value == "") {
            alert('Jenis Surat harus dipilih!');
            form.nmsurat.focus();
            return false;
        } else if (form.nosurat.value == "") {
            alert('Nomor Surat harus di isi !');
            form.nosurat.focus();
            return false;
        } else if (form.nik.value.length < mincar) {
            alert("Panjang NIK Minimal 16 Karater!");
            form.nik.focus();
            return (false);
        } else if (form.nosurat.value.length < minruf) {
            alert("Panjang Nomor Surat Minimal 3 Angka!");
            form.nosurat.focus();
            return (false);
        }
        return (true);
    }
    </script>


    <script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
    </script>


</body>

</html>
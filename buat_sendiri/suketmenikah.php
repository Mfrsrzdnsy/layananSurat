<?php
//include '../sesi.php';
include 'koneksi.php';
include_once "assets/inc.php";
?>
<body>
    <div class="au-card recent-report">
               <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5">SURAT KETERANGAN MENIKAH
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>

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

                                <form action="save/s_suketmenikah.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                                    <div class="col-12 col-md-3"><input type="text" id="kodesurat" name="kodesurat" value="<?php echo $kodesurat ?>" readonly="readonly" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="nmsurat" class=" form-control-label">Jenis / Nama Surat</label></div>
                                        <div class="col-12 col-md-8">
                                            <select name="nmsurat" id="nmsurat" onchange="isiredaksi()" class="form-control">
                                                <option value="">Pilih Jenis atau Nama Surat</option>
                                    <?php 
                                    $query = mysqli_query ($con, "SELECT * FROM t_jenissurat WHERE kode='JS011' ORDER BY id ASC ");
                                    while ($r = mysqli_fetch_array($query)){
                                    ?>
                                                <option value="<?php echo $r['nmsurat'];?>"><?php echo $r['kode'];?>--><?php echo $r['nmsurat'];?></option>
                                    
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    $query = mysqli_query ($con, "SELECT * FROM t_desa WHERE id='1'");
                                    while ($rdes = mysqli_fetch_array($query)){
                                    ?>
   

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                                        <?php $nik=$_SESSION['nik']; ?>
                                        <input type="hidden" id="idstf" name="idstf" value="<?php echo $nik; ?>">
                                        <input type="hidden" id="kode_klasi" name="kode_klasi">
                                        <input type="hidden" id="blnr" name="blnr" value="<?php echo getRomawi(date('m'));?>" >
                                        <input type="hidden" id="kades" name="kades" value="<?php echo $rdes['kades']; ?>" >
                                        <input type="hidden" id="kodejenis" name="kodejenis" value="<?php echo $r['kode']; ?>" >
                                        <div class="col-12 col-md-3"><input type="text" id="nosurat" name="nosurat" maxlength="3" class="form-control" value="<?php echo $nourut ?>" readonly></div>
                                    </div>
                                <?php }}?>
                                <h6>DATA SUAMI :</h6>
                                <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="nik" name="nik" onkeyup="isinik()" class="form-control" maxlength="16" placeholder="NIK Suami" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" placeholder="Nama Suami" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="jk" class=" form-control-label">Jenis Kelamin</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="jk" name="jk" placeholder="Jenis Kelamin" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmp_lahir" class=" form-control-label">Tempat Lahir</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir Suami" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tgl_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir Suami" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="agama" class=" form-control-label">Agama</label></div>
                                        <div class="col-12 col-md-4">
                                            <select name="agama" id="agama" class="form-control">
                                                <option value="-" selected="selected" readonly="readonly">Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Katholik">Katholik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="prov" class=" form-control-label">Provinsi</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="prov" name="prov"  placeholder="Provinsi" class="form-control" required><small class="form-text text-muted">Contoh : Lampung</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kab" class=" form-control-label">Kabupaten/Kota</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="kab" name="kab" placeholder="Kabupaten/Kota" class="form-control" required><small class="form-text text-muted">Contoh : Lampung Selatan</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kec" class=" form-control-label">Kecamatan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="kec" name="kec" placeholder="Kecamatan" class="form-control" required><small class="form-text text-muted">Contoh : Way Sulan</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="desa" class=" form-control-label">Desa</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="desa" name="desa" placeholder="Desa" class="form-control" required><small class="form-text text-muted">Contoh : Pamulihan</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="almt" class=" form-control-label">Alamat/Rt./Rw.</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="almt" name="almt" placeholder="xxx/xxx" class="form-control"><small class="form-text text-muted">Contoh : Kp. Durian Runtuh, RT./RW. 001/002</small></div>
                                    </div>
                                    <!-- ISTRI -->
                                    <h6>DATA ISTRI :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="niki" class=" form-control-label">NIK</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="niki" name="niki" onkeyup="isiniki()" class="form-control" maxlength="16"  placeholder="NIK Istri" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="namai" class=" form-control-label">Nama</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="namai" name="namai" placeholder="Nama Istri" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="jki" class=" form-control-label">Jenis Kelamin</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="jki" name="jki" placeholder="Jenis Kelamin" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmp_lahiri" class=" form-control-label">Tempat Lahir</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tmp_lahiri" name="tmp_lahiri" placeholder="Tempat Lahir Istri" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tgl_lahiri" class=" form-control-label">Tanggal Lahir</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="tgl_lahiri" name="tgl_lahiri" placeholder="Tanggal Lahir Istri" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="agamai" class=" form-control-label">Agama</label></div>
                                        <div class="col-12 col-md-4">
                                            <select name="agamai" id="agamai" class="form-control">
                                                <option value="-" selected="selected" readonly="readonly">Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Katholik">Katholik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="provi" class=" form-control-label">Provinsi</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="provi" name="provi" placeholder="Provinsi" class="form-control" required><small class="form-text text-muted">Contoh : Lampung</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kabi" class=" form-control-label">Kabupaten/Kota</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="kabi" name="kabi" placeholder="Kabupaten/Kota" class="form-control" required><small class="form-text text-muted">Contoh : Lampung Selatan</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="keci" class=" form-control-label">Kecamatan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="keci" name="keci" placeholder="Kecamatan" class="form-control" required><small class="form-text text-muted">Contoh : Way Sulan</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="desai" class=" form-control-label">Desa</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="desai" name="desai" placeholder="Desa" class="form-control" required><small class="form-text text-muted">Contoh : Pamulihan</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="almti" class=" form-control-label">Alamat/Rt./Rw.</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="almti" name="almti" placeholder="xxx/xxx" class="form-control"><small class="form-text text-muted">Contoh : Kp. Durian Runtuh, RT./RW. 001/002</small></div>
                                    </div>
                                    <hr>
                                    <h6>KETERANGAN PERNIKAHAN </h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tgl_nikah" class=" form-control-label">Tanggal Pernikahan</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="tgl_nikah" name="tgl_nikah" class="form-control" placeholder="Tanggal pernikahan" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="secara" class=" form-control-label">Menikah Secara</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="secara" name="secara" class="form-control" placeholder="Misalnya : Menikah Siri" required ></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="mahar" class=" form-control-label">Mahar Pernikahan</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="mahar" name="mahar" class="form-control" placeholder="Jenis dan nilai mahar" required></div>
                                    </div>
                                                                        <div class="row form-group">
                                        <div class="col col-md-3"><label for="saksi1" class=" form-control-label">Saksi 1</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="saksi1" name="saksi1" class="form-control" placeholder="Nama Saksi 1" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="saksi2" class=" form-control-label">Saksi 2</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="saksi2" name="saksi2" class="form-control" placeholder="Nama Saksi 2" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="alasan" class=" form-control-label">Alasan Surat</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="alasan" name="alasan" class="form-control" placeholder="Alasan pembuatan surat ini" required><small class="form-text text-muted">Contoh : Menikah Siri atau Buku Nikah Dalam Proses, dll.</small></div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div><div class="col col-md-6"><button type="submit" name="cetak" class="btn btn-primary btn-sm pull pull-right">Cetak</button></div>
                                    </div>
                            </div>
                        </form>
                    </div>

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
                                            <th>Nama Suami</th>
                                            <th>Nama Istri</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                        <?php 
                        $query = mysqli_query ($con, "SELECT * FROM t_buatsendiri, t_detailsurat WHERE t_buatsendiri.kode_jenis='JS011' AND t_buatsendiri.nik='$nik' AND t_buatsendiri.status='acc' AND t_detailsurat.kode=t_buatsendiri.kode_surat ORDER BY t_buatsendiri.id DESC ");
                            $no=1;
                            while ($data = mysqli_fetch_assoc($query)){
                            $dt=explode(';', $data['detail']);
                         ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['no_surat'];?></td>
                                            <td><?php echo $data['tgl'];?></td>
                                            <td><?php echo $dt[1];?></td>
                                            <td><?php echo $dt[12];?></td>
                                            <td>
                                                <a href="cetak/c_suketmenikah.php?kode=<?php echo $data['kode'];?>" target="_BLANK" class="btn"><i class="fa fa-print"></i></a>
                                                <a href="?page=edit_suketmenikah&amp;kode=<?php echo "$data[kode]"; ?>" class="btn"><i class="fa fa-edit"></i></a>
                                                <a href="del/h_detailsurat.php?kode=<?php echo $data['kode'];?>" class="btn"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
    
                                     <?php }?>    

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
      } );
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
            function isinik(){
                var nik = $("#nik").val();
                $.ajax({
                    url: 'data/panggildatawarga.php',
                    data:"nik="+nik ,
                }).success(function (data) {
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
                    $('#prov').val(obj.prov);
                    $('#kab').val(obj.kab);
                    $('#kec').val(obj.kec);
                    $('#desa').val(obj.desa);
                    $('#almt').val(obj.alamat);
                });
            }
        </script>

                <script type="text/javascript">
            function isiniki(){
                var nik = $("#niki").val();
                $.ajax({
                    url: 'data/panggildatawarga.php',
                    data:"nik="+nik ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#namai').val(obj.nama);
                    $('#jki').val(obj.jk);
                    $('#tmp_lahiri').val(obj.tmp_lahir);
                    $('#tgl_lahiri').val(obj.tgl_lahir);
                    $('#agamai').val(obj.agama);
                    $('#statusi').val(obj.status);
                    $('#pendi').val(obj.pend);
                    $('#kerjaani').val(obj.kerjaan);
                    $('#provi').val(obj.prov);
                    $('#kabi').val(obj.kab);
                    $('#keci').val(obj.kec);
                    $('#desai').val(obj.desa);
                    $('#almti').val(obj.alamat);
                });
            }
        </script>
        <script type="text/javascript">
            function isiredaksi(){
                var nmsurat = $("#nmsurat").val();
                $.ajax({
                    url: 'data/panggiljenissurat.php',
                    data:"nmsurat="+nmsurat ,
                }).success(function (data) {
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
function validasi_input(form){
  var mincar = 16;
  var minruf = 3;
  if (form.nmsurat.value=="") {
      alert('Jenis Surat harus dipilih!');
      form.nmsurat.focus();
      return false;
    }else if(form.nosurat.value=="") {
      alert('Nomor Surat harus di isi !');
      form.nosurat.focus();
      return false;
    }else if (form.nik.value.length < mincar){
    alert("Panjang NIK Minimal 16 Karater!");
    form.nik.focus();
    return (false);
  }else if (form.nosurat.value.length < minruf){
    alert("Panjang Nomor Surat Minimal 3 Angka!");
    form.nosurat.focus();
    return (false);
  }
   return (true);
}
</script>


<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>


</body>

</html>

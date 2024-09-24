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
                            <h1 class="title-5" align="center">CETAK SURAT PENGANTAR NIKAH (N1-N6)
                            </h1>
                        </div>
                            <hr class="line-seprate">
                    </div>
                </div>
            </section>
<div class="card-body card-block">
            <?php
            $KodeEdit= isset($_GET['page']) ?  $_GET['kode'] : $_POST['kodesurat'];
            $data=mysqli_query($con, "SELECT * FROM t_detailsurat  where kode='$KodeEdit' ");
            $no=1;
            while($row =mysqli_fetch_array($data)){ 
            ?>  
                        <form action=""  method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="kodesurat" name="kodesurat" value="<?php echo $row ['kode']; ?>" readonly="readonly" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nosurat" name="nosurat" readonly="readonly" class="form-control" value="<?php echo $row ['no']; ?>" ></div>
                                </div>
                                <hr>

                                <div class="card">
                                    <div class="card-body" style="text-align-last: center;">
                                        <a href="cetak/c_n1.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-primary" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N1</a>
                                        <a href="cetak/c_n2.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-secondary" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N2</a>
                                        <a href="cetak/c_n3.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-success" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N3</a>

                                        <a href="cetak/c_n4.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-warning" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N4 </a>
                                        <a href="cetak/c_n5.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-danger" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N5</a>
                                        <a href="?page=n6&amp;kode=<?php echo $row['kode'];?>" type="button" class="btn btn-info" ><i class="fa fa-print"></i>&nbsp;N6</a>
                                        <!--
                                        <a href="../suratpernikahan/n7.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-info" ><i class="fa fa-print"></i>&nbsp;N7</a>
                                        <a href="../suratpernikahan/n8.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-info"><i class="fa fa-print"></i>&nbsp;N8</a>
                                        -->
                                    </div>
                                </div><!-- /# card -->
                            </div>
                            </form>

                    </div>
                     <?php 
                        }
                                                //mysql_close($host);
                        ?>


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

 
 <script src="assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->
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
                    $('#rt').val(obj.rt);
                    $('#dusun').val(obj.dusun);
                });
            }
        </script>
        <script type="text/javascript">
            function isinik1(){
                var nik = $("#nik1").val();
                $.ajax({
                    url: 'data/panggildatawarga.php',
                    data:"nik="+nik ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama1').val(obj.nama);
                    $('#jk1').val(obj.jk);
                    $('#tmp_lahir1').val(obj.tmp_lahir);
                    $('#tgl_lahir1').val(obj.tgl_lahir);
                    $('#agama1').val(obj.agama);
                    $('#status1').val(obj.status);
                    $('#pend1').val(obj.pend);
                    $('#kerjaan1').val(obj.kerjaan);
                    $('#rt1').val(obj.rt);
                    $('#dusun1').val(obj.dusun);
                });
            }
        </script>
                <script type="text/javascript">
            function isinik2(){
                var nik = $("#nik2").val();
                $.ajax({
                    url: 'data/panggildatawarga.php',
                    data:"nik="+nik ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama2').val(obj.nama);
                    $('#jk2').val(obj.jk);
                    $('#tmp_lahir2').val(obj.tmp_lahir);
                    $('#tgl_lahir2').val(obj.tgl_lahir);
                    $('#agama2').val(obj.agama);
                    $('#status2').val(obj.status);
                    $('#pend2').val(obj.pend);
                    $('#kerjaan2').val(obj.kerjaan);
                    $('#rt2').val(obj.rt);
                    $('#dusun2').val(obj.dusun);
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
            function isikode(){
                var no = $("#no").val();
                $.ajax({
                    url: 'data/panggilkodesurat.php',
                    data:"no="+no ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#kodesuratw').val(obj.kode);

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


</body>

</html>

<?php
if(!defined('OFFDIRECT')) include 'error404.php';

?>
<body class="no-skin">
<?php
  include "base_template_topnav.php";  //akan memanggil file base_template_topnav.php sebagai header
  echo '<div class="main-container ace-save-state" id="main-container">';
  include "menu.php";  //akan memanggil file menu.php sebagai pembuatan menu
  
?>

<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="fa fa-tachometer"></i>
          <a href="#">Dashboard</a>
        </li>
        <li>
          <i class=""></i>
          <a href="#">Transaksi</a>
        </li>
      </ul><!-- /.breadcrumb -->
      <div class="nav-search" id="nav-search">
      </div><!-- /.nav-search -->
    </div>
    <div class="page-content">
      <div class="row">
        <div class="col-xs-12">
          <div class="clearfix">
            <h4 class="pink">
              <i class=" "></i>
              Transaksi
              <div class="pull-right tableTools-container"></div>
            </h4>
          </div>
          <div class="table-header">
              Daftar Transaksi
          </div>
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="center" width="3%">No</th>    
                <th class="center" width="10%">ID Transaksi</th>
                <th class="center" width="15%">Nama Pelanggan</th>
                <th class="center" width="10%">ID Tiket</th>
                <th class="center" width="15%">Jumlah Tiket</th>
                <th class="center" width="15%">Nama Penginapan</th>
                <th class="center" width="15%">Lama Menginap</th>
                <th class="center" width="15%">Total Harga</th>
                <th class="center" width="20%">
                  <a href="#m_kategori" onclick="return tambah_kategori('0');" class="tooltip-info" data-toggle="modal" data-rel="tooltip" title="Tambah">
                  <span class="blue"><i class="ace-icon fa fa-search-plus bigger-120"></i></span></a>
                </th>
              </tr>
            </thead>          
              <tr>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
              </tr>
          </table>
          <!-- BATAS DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
        </div>
      </div>
    </div>
  </div> 
</div>      
  <div class="modal fade" id="m_kategori" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="white">&times;</span>
          </button>
          Tambah Transaksi
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" action="" method="post">
          <input type="hidden" name="id" id="id" value="">
          <div id="notif"></div>
          <div id="konfirmasihapus"></div>          
          <table class="table table-form">
            <tr><td style="width: 25%">ID Transaksi</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="idtransaksi" id="idtransaksi" >
              </td>
            </tr>
            <tr><td style="width: 25%">Nama Pelanggan</td>
              <td style="width: 50%">
              <select class="form-control" name="namapelanggan" id="namapelanggan" class="form-control" >
											<option value="">- - select - -</option>
											<?php
										 	$con = mysqli_connect("localhost", "root", "", "tourr");

										 	$result=mysqli_query($con,"SELECT * FROM pelanggan order by id_pelanggan ASC ");
										 		while ($row=mysqli_fetch_assoc($result)) {
										 			echo "<option value='$row[id_pelanggan]'>$row[nama_pelanggan]</option>";
										 		}
										 	?>

										 </select>
              </td>
            </tr>
            <tr><td style="width: 25%">ID Tiket</td>
              <td style="width: 50%">
              <select class="form-control" name="idtiket" id="idtiket" class="form-control" >
											<option value="">- - select - -</option>
											<?php
										 	$con = mysqli_connect("localhost", "root", "", "tourr");

										 	$result=mysqli_query($con,"SELECT * FROM tiket order by id_tiket ASC ");
										 		while ($row=mysqli_fetch_assoc($result)) {
										 			echo "<option value='$row[id_tiket]'>$row[id_tiket]</option>";
										 		}
										 	?>

										 </select>
              </td>
            </tr>
            <tr><td style="width: 25%">Jumlah Tiket</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="jumlahtiket" id="jumlahtiket" >
              </td>
            </tr>
            <tr><td style="width: 25%">Nama Penginapan</td>
              <td style="width: 50%">
              <select class="form-control" name="namapenginapan" id="namapenginapan" class="form-control" >
											<option value="">- - select - -</option>
											<?php
										 	$con = mysqli_connect("localhost", "root", "", "tourr");

										 	$result=mysqli_query($con,"SELECT * FROM penginapan order by id_penginapan ASC ");
										 		while ($row=mysqli_fetch_assoc($result)) {
										 			echo "<option value='$row[id_penginapan]'>$row[nama_penginapan]</option>";
										 		}
										 	?>

										 </select>
              </td>
            </tr>
            <tr><td style="width: 25%">Lama Menginap</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="lamamenginap" id="lamamenginap" >
              </td>
            </tr>
          </table>
          </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-white btn-info btn-bold" type="button" id="btnsimpan">
          <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Simpan</button>
        <button class="btn btn-white btn-danger btn-round" type="reset">
          <i class="fa fa-refresh "></i> Reset</button>
        <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
          <i class="fa fa-minus-circle"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>

<?php
  include "base_template_footer.php"; //akan memanggil base_template_footer.php sebagai footer
?>
 
</body>

<script type="text/javascript">
  $(document).ready(function(){

    $('#btnsimpan').click(function(){
    // alert($('#idpelanggan').val())
    $.post("<?php echo $baseURL;?>library/api.transaksi.php",{
      type:1,
      txtId:$('#idtransaksi').val(),
      txtnamapelanggan:$('#namapelanggan').val(),
      txtidtiket:$('#idtiket').val(),
      txtjumlahtiket:$('#jumlahtiket').val(),
      txtnamapenginapan:$('#namapenginapan').val(),
      txtlamamenginap:$('#lamamenginap').val()
    },function(data){
        console.log (data);
    obj = $.parseJSON(data);
    
    if (obj.msg[0]=="ok"){
        $('#notif').html(
            '<div class ="alert alert-success alert-dismissible fade in" role="alert">'+
            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
              +
            '   <strong>Sukses</strong><br/>' +obj.msg[1]+
          '</div>');

        setTimeout(function() {
            $('#notif').html('');
        },2000);

        $('#idtransaksi').val('');
        $('#namapelanggan').val('');
        $('#idtiket').val('');
        $('#jumlahtiket').val('');
        $('#namapenginapan').val('');
        $('#lamamenginap').val('');
    } else {
        $('#notif').html(
            '<div class="alert alert-danger alert-dismissible fade in" role="alert">'+
            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"> &times;</span></button>'
                +
            '   <strong>Error</strong><br/>'+obj.msg[1]+
          '</div>');
  
      } 

    myTable.ajax.reload();
    });
  });

  var myTable = $('#datatable').DataTable({
      "ajax": {
        type   : "POST",
        url: "<?php echo $baseURL;?>library/api.transaksi.php", 
        data   : function(d) {
          d.type = "97";
        }
     },
      "columnDefs": [
          {"orderable": true, "targets":5},
          {"visible":   true, "targets":[6], "searchable": false}
      ],
      select: {
        style: 'multi'
      }
   });

   $('#datatable tbody').on('click','.fa-pencil-square-o', function(){
      $("#m_kategori").modal('show');

      idtransaksi     =myTable.row($(this).parents('tr')).data()[1];
      namapelanggan   =myTable.row($(this).parents('tr')).data()[2];
      idtiket         =myTable.row($(this).parents('tr')).data()[3];
      jumlahtiket     =myTable.row($(this).parents('tr')).data()[4];
      namapenginapan  =myTable.row($(this).parents('tr')).data()[5];
      lamamenginap    =myTable.row($(this).parents('tr')).data()[6];
      harga           =myTable.row($(this).parents('tr')).data()[7];

      $('#idtransaksi').val(idtransaksi);
      $('#namapelanggan').val(namapelanggan);
      $('#idtiket').val(idtiket);
      $('#jumlahtiket').val(jumlahtiket);
      $('#namapenginapan').val(namapenginapan);
      $('#lamamenginap').val(lamamenginap);

      // myTable.ajax.reload();
   });


   $('#datatable tbody').on('click','.fa-trash-o',function(){
      
      var jawab;
      obj          = $(this).parents('tr');
      idtransaksi   = myTable.row($(this).parents('tr')).data()[1];

      jawab = confirm("Apakah Anda Yakin Ingin Menghapus record? \n");

      if(jawab==false){
        exit();
      }
      
      console.log(idtransaksi);

      $.post("<?php echo $baseURL ;?>library/api.transaksi.php",{
        
        type:"2", idtransaksi:idtransaksi}, function(data){

          obj=$.parseJSON(data);
          if (obj,msg[0]=="hapus"){
            $("#m_kategori").modal('show');

            $('#konfirmasihapus').html(
               '<div class="alert alert-success alert-dismissible fade in" role="alert">'+'<button type ="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+'<strong>Hapus Data</strong><br/>'+obj.msg[1]+'</div>');
        
                setTimeout(function(){
                    $('#konfirmasihapus').html('');
                    $('#m_kategori').modal('hide');
                },5000);
                myTable.ajax.reload();
          }
          
        });  
    });


  });
</script>      


<?php
if(!defined('OFFDIRECT')) include 'error404.php';
include '../config/config.php';
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
          <a href="#">pelanggan</a>
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
              Pelanggan
              <div class="pull-right tableTools-container"></div>
            </h4>
          </div>
          <div class="table-header">
              Daftar Pelanggan
          </div>
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>    
                <th class="center" width="2%">No</th>
                <th class="center" width="5%">ID Pelanggan</th>
                <th class="center" width="20%">Nama</th>
                <th class="center" width="10%">Tanggal Lahir</th>
                <th class="center" width="20%">Alamat</th>
                <th class="center" width="10%">Jenis Kelamin</th>
                <th class="center" width="10%">No. Telpon</th>
                <th class="center" width="15%">Email</th>
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
          Tambah Pelanggan 
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" action="" method="post">
          <input type="hidden" name="id" id="id" value="">
          <div id="notif"></div>
          <table class="table table-form">
            <tr><td style="width: 25%">ID Pelanggan</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="idpelanggan" id="idpelanggan">
              </td>
            </tr>
            <tr><td style="width: 25%">Nama</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="namapelanggan" id="namapelanggan" >
              </td>
            </tr>
            <tr><td style="width: 25%">Tanggal Lahir</td>
              <td style="width: 50%">
                <input type="date" class="form-control" name="tgl" id="tgl">
              </td>
            </tr>
            <tr><td style="width: 25%">Alamat</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="alamat" id="alamat">
              </td>
            </tr>
            <tr><td style="width: 25%">Jenis Kelamin</td>
              <td>
                <select class="form-control" name="jeniskelamin" id="jeniskelamin"> 
                  <option value="">-Pilih-</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </td>
            </tr>
            <tr><td style="width: 25%">No. Telpon</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="notelpon" id="notelpon">
              </td>
            </tr>
            <tr><td style="width: 25%">Email</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="email" id="email">
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

<div class="modal fade" id="myModal2" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header no-padding">
            <div class="table-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                <span class="white">&times;</span>
              </button>
              Hapus data 
            </div>
          </div>
          <!-- /.modal-body-->
          <div class="modal-body">
            <div id="konfirmasihapus"></div>
          </div>
        </div> <!-- /.modal content--> 
      </div> <!-- /.modal dialog--> 
    </div>

<?php
  include "base_template_footer.php"; //akan memanggil base_template_footer.php sebagai footer
?>

      </div>
    </div>
 
</body>
<script type="text/javascript">
  $(document).ready(function(){
    
    var myTable = $('#datatable').DataTable({
      "ajax": {
        type   : "POST",
        url: "<?php echo $baseURL;?>library/api.keyword.php", 
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

      idpelanggan   =myTable.row($(this).parents('tr')).data()[1];
      namapelanggan =myTable.row($(this).parents('tr')).data()[2];
      tgl           =myTable.row($(this).parents('tr')).data()[3];
      alamat        =myTable.row($(this).parents('tr')).data()[4];
      jeniskelamin  =myTable.row($(this).parents('tr')).data()[5];
      notelpon      =myTable.row($(this).parents('tr')).data()[6];
      email         =myTable.row($(this).parents('tr')).data()[7];

      $('#idpelanggan').val(idpelanggan);
      $('#namapelanggan').val(namapelanggan);
      $('#tgl').val(tgl);
      $('#alamat').val(alamat);
      $('#jeniskelamin').val(jeniskelamin);
      $('#notelpon').val(notelpon);
      $('#email').val(email);

      myTable.ajax.reload();
   });
   

  
  $('#btnsimpan').click(function(){
    // alert($('#idpelanggan').val())
    $.post("<?php echo $baseURL;?>library/api.keyword.php",{
      type:1,
      txtnamapelanggan:$('#namapelanggan').val(),
      txtId:$('#idpelanggan').val(),
      txttgl:$('#tgl').val(),
      txtalamat:$('#alamat').val(),
      txtjeniskelamin:$('#jeniskelamin').val(),
      txtnotelpon:$('#notelpon').val(),
      txtemail:$('#email').val()
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

        $('#idpelanggan').val('');
        $('#namapelanggan').val('');
        $('#tgl').val('');
        $('#alamat').val('');
        $('#jeniskelamin').val('');
        $('#notelpon').val('');
        $('#email').val('');
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

   $('#datatable tbody').on('click','.fa-trash-o',function(){
      var jawab;
      obj         = $(this).parents('tr');
      idpelanggan = myTable.row($(this).parents('tr')).data()[1];

      jawab = confirm("Apakah Anda Yakin Ingin Menghapus record?" );

      if(jawab==false){
        exit();
      }
      
      console.log(idpelanggan);

      $.post("<?php echo $baseURL ;?>library/api.keyword.php",{
        type:"2", idpelanggan:idpelanggan}, function(data){

          obj=$.parseJSON(data);
          if (obj,msg[0]=="hapus"){
            $("#myModal2").modal('show');

            $('#konfirmasihapus').html(
                '<div class="alert alert-success alert-dismissible fade in" role="alert">' + '<button type=button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;>/span></button>' + '<strong> Hapus Data</strong><br/>' + obj.msg[1] + '</div>');
        
                setTimeout(function(){

                    $('#konfirmasihapus').html('');
                    $('#myModal2').modal('hide');
                },5000);
                myTable.ajax.reload();
          }
          
        })  
    })
  });
    
</script>
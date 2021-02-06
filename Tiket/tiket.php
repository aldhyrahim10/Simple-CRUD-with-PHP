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
          <a href="#">Tiket Transpotasi</a>
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
              Tiket Transportasi
              <div class="pull-right tableTools-container"></div>
            </h4>
          </div>
          <div class="table-header">
              Daftar Tiket Transportasi
          </div>
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="center" width="5%">No</th>    
                <th class="center" width="15%">ID tiket</th>
                <th class="center" width="30%">Nama Kendaraan</th>
                <th class="center" width="15%">kategori kendaraan</th>
                <th class="center" width="20%">Harga Tiket</th>
                <th class="center" width="10%">
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
          Tambah Tiket Kendaraan 
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" action="" method="post">
          <input type="hidden" name="id" id="id" value="">
          <div id="notif">
          </div>
          <table class="table table-form">
            <tr><td style="width: 25%">ID Tiket</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="idtiket" id="idtiket">
              </td>
            </tr>
            <tr><td style="width: 25%">Nama Kendaraan</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="namakendaraan" id="namakendaraan" >
              </td>
            </tr>
            <tr><td style="width: 25%">Kategori Kendaraan</td>
              <td style="width: 50%">
              <select class="form-control" name="kategorikendaraan" id="kategorikendaraan">
                  <option value="">-Pilih-</option>
                  <option value="Darat">Darat</option>
                  <option value="Laut">Laut</option>
                  <option value="Udara">Udara</option>  
                </select>
              </td>
            </tr>
            <tr><td style="width: 25%">Harga Tiket</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="hargatiket" id="hargatiket">
              </td>
            </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-white btn-info btn-bold" type="button" id="btnsimpan">
          <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Simpan</button>
        <button class="btn btn-white btn-danger btn-round" type="reset">
          <i class="fa fa-refresh "></i> Reset</button>
        <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
          <i class="fa fa-minus-circle"></i> Tutup</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
  include "base_template_footer.php"; //akan memanggil base_template_footer.php sebagai footer
?>

      </div>
    </div>
 
</body>    

<script>
$(document).ready(function(){
   $('#btnsimpan').click(function(){
    // alert($('#idpelanggan').val())
    $.post("<?php echo $baseURL;?>library/api.tiket.php",{
      type:1,
      txtId:$('#idtiket').val(),
      txtnamakendaraan:$('#namakendaraan').val(),
      txtkategorikendaraan:$('#kategorikendaraan').val(),
      txthargatiket:$('#hargatiket').val()
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

        $('#idtiket').val('');
        $('#namakendaraan').val('');
        $('#kategorikendaraan').val('');
        $('#hargatiket').val('');
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
        url: "<?php echo $baseURL;?>library/api.tiket.php", 
        data   : function(d) {
          d.type = "97";
        }
     },
      "columnDefs": [
          {"orderable": true, "targets":4},
          {"visible":   true, "targets":[5], "searchable": false}
      ],
      select: {
        style: 'multi'
      }
   });

   $('#datatable tbody').on('click','.fa-pencil-square-o', function(){
      $("#m_kategori").modal('show');

      idtiket           = myTable.row($(this).parents('tr')).data()[1];
      namakendaraan     = myTable.row($(this).parents('tr')).data()[2];
      kategorikendaraan = myTable.row($(this).parents('tr')).data()[3];
      hargatiket        = myTable.row($(this).parents('tr')).data()[4];
      
      $('#idtiket').val(idtiket);
      $('#namakendaraan').val(namakendaraan);
      $('#kategorikendaraan').val(kategorikendaraan);
      $('#hargatiket').val(hargatiket);
      
      myTable.ajax.reload();
   });


   $('#datatable tbody').on('click','.fa-trash-o',function(){
      var jawab;
      obj         = $(this).parents('tr');
      idtiket = myTable.row($(this).parents('tr')).data()[1];

      jawab = confirm("Apakah Anda Yakin Ingin Menghapus record?" );

      if(jawab==false){
        exit();
      }
      
      console.log(idtiket);

      $.post("<?php echo $baseURL ;?>library/api.tiket.php",{type:"2", idtiket:idtiket}, function(data){

          obj=$.parseJSON(data);
          if (obj,msg[0]=="hapus"){
            $("#m_kategori").modal('hide');

            $('konfirmasihapus').html(
                '<div class="alert alert-success alert-dismissible fade in" role="alert">' + '<button type=button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;>/span></button>' + '<strong> Hapus Data</strong><br/>' + obj.msg[1] + '</div>');
        
                setTimeout(function(){
                    $('#konfirmasihapus').html('');
                    $('#m_kategori').modal('hide');
                },5000);
                myTable.ajax.reload();
          }
          
        })  
    })

})

</script>
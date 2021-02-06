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
          <a href="#">Tempat Wisata</a>
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
              Tempat Wisata
              <div class="pull-right tableTools-container"></div>
            </h4>
          </div>
          <div class="table-header">
              Daftar Tempat Wisata
          </div>
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>    
                <th class="center" width="2%">No</th>
                <th class="center" width="5%">ID Tempat Wisata</th>
                <th class="center" width="20%">Tempat Wisata</th>
                <th class="center" width="20%">Alamat</th>
                <th class="center" width="20%">Provinsi</th>
                <th class="center" width="25%">Fasilitas</th>
                <th class="center" width="25%">Waktu</th>
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
          Tambah Tempat Wisata 
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" action="" method="post">
          <input type="hidden" name="id" id="id" value="">
          <div id="notif">
          </div>
          <table class="table table-form">
            <tr><td style="width: 25%">ID Tempat Wisata</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="idtempatwisata" id="idtempatwisata">
              </td>
            </tr>
            <tr><td style="width: 25%">Tempat Wisata</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="tempatwisata" id="tempatwisata" >
              </td>
            </tr>
            <tr><td style="width: 25%">Alamat</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="alamat" id="alamat">
              </td>
            </tr>
            <tr><td style="width: 25%">Provinsi</td>
              <td style="width: 50%">
                <select type="text" class="form-control" name="provinsi" id="provinsi">
                <option value="">-Pilih-</option>
                  <option value="aceh">Aceh</option>
                  <option value="sumaterautara">Sumatera Utara</option>
                  <option value="sumaterbarat">Sumatera Barat</option>
                  <option value="riau">Riau</option>
                  <option value="kepulauanriau">Kepulauan Riau</option>
                  <option value="jambi">Jambi</option>
                  <option value="bengkulu">Bengkulu</option>
                  <option value="sumateraselatan">Sumatera Selatan</option>
                  <option value="bangkabelitung"> Bangka Belitung</option>
                  <option value="lampung">Lampung</option>
                  <option value="banten">Banten</option>
                  <option value="jawabarat">Jawa Barat</option>
                  <option value="dkijakarta">DKI Jakarta</option>
                  <option value="jawatengah">Jawa Tengah</option>
                  <option value="diyogyakarta">DI Yogyakarta</option>
                  <option value="jawatimur">Jawa Timur</option>
                  <option value="bali">Bali</option>
                  <option value="nusatenggarabarat">Nusa Tenggara Barat</option>
                  <option value="nusatenggaratimur">Nusa Tenggara Timur</option>
                  <option value="kalimantanutara">Kalimantan Utara</option>
                  <option value="kalimatanbarat">Kalimantan Barat</option>
                  <option value="kalimantantengah">Kalimantan Tengah</option>
                  <option value="kalimantanselatan">Kalmantan Selatan</option>
                  <option value="kalimantantimur">Kalimantan Timur</option>
                  <option value="golontaro">Golontaro</option>
                  <option value="sulawesiutara">Sulawesi Utara</option>
                  <option value="sulawesibarat">Sulawesi Barat</option>
                  <option value="sulawesitengah">Sulawesi Tengah</option> 
                  <option value="sulawesiselatan">Sulawesi Selatan</option>
                  <option value="sulawesitenggara">Sulawesi Tenggara</option>
                  <option value="malukuutara">Maluku Utara</option>
                  <option value="maluku">Maluku</option>
                  <option value="papuabarat">Papua Barat</option>
                  <option value="papua">Papua</option>
                </select>
              </td>
            </tr>
            <tr><td style="width: 25%">Fasilitas</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="fasilitas" id="fasilitas">
              </td>
            </tr>
            <tr><td style="width: 25%">Waktu</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="waktu" id="waktu">
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

<script type="text/javascript">
  $(document).ready(function(){

    $('#btnsimpan').click(function(){
    $.post("<?php echo $baseURL;?>library/api.tempatwisata.php",{
      type:1,
      txtId:$('#idtempatwisata').val(),
      txttempatwisata:$('#tempatwisata').val(),
      txtalamat:$('#alamat').val(),
      txtprovinsi:$('#provinsi').val(),
      txtfasilitas:$('#fasilitas').val(),
      txtwaktu:$('#waktu').val()
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

        $('#idtempatwisata').val('');
        $('#tempatwisata').val('');
        $('#alamat').val('');
        $('#provinsi').val('');
        $('#fasilitas').val('');
        $('#waktu').val('');
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
        url: "<?php echo $baseURL;?>library/api.tempatwisata.php", 
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

      idtempatwisata   =myTable.row($(this).parents('tr')).data()[1];
      tempatwisata     =myTable.row($(this).parents('tr')).data()[2];
      alamat           =myTable.row($(this).parents('tr')).data()[3];
      provinsi         =myTable.row($(this).parents('tr')).data()[4];
      fasilitas        =myTable.row($(this).parents('tr')).data()[5];
      waktu            =myTable.row($(this).parents('tr')).data()[6];
      
      $('#idtempatwisata').val(idtempatwisata);
      $('#tempatwisata').val(tempatwisata);
      $('#alamat').val(alamat);
      $('#provinsi').val(provinsi);
      $('#fasilitas').val(fasilitas);
      $('#waktu').val(waktu);

      myTable.ajax.reload();
   });

   $('#datatable tbody').on('click','.fa-trash-o',function(){
      var jawab;
      obj            = $(this).parents('tr');
      idtempatwisata = myTable.row($(this).parents('tr')).data()[1];

      jawab = confirm("Apakah Anda Yakin Ingin Menghapus record?" );

      if(jawab==false){
        exit();
      }
      
      console.log(idtempatwisata);

      $.post("<?php echo $baseURL ;?>library/api.tempatwisata.php",{type:"2", idtempatwisata:idtempatwisata}, function(data){

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
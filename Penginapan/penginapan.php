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
          <a href="#">Penginapan</a>
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
              Penginapan
              <div class="pull-right tableTools-container"></div>
            </h4>
          </div>
          <div class="table-header">
              Daftar Penginapan
          </div>
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="center" width="3%">No </th>    
                <th class="center" width="10%">ID Penginapan</th>
                <th class="center" width="20%">Nama penginapan</th>
                <th class="center" width="10%">Jenis Penginapan</th>
                <th class="center" width="25%">Alamat</th>
                <th class="center" width="20%">Provinsi</th>
                <th class="center" width="20%">Fasilitas</th>
                <th class="center" width="20%">Harga penginapan/malam</th>
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
          Tambah Penginapan
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" action="" method="post">
          <input type="hidden" name="id" id="id" value="">
          <div id="notif">
          </div>
          <table class="table table-form">
            <tr><td style="width: 25%">id penginapan</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="idpenginapan" id="idpenginapan">
              </td>
            </tr>
            <tr><td style="width: 25%">nama penginapan</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="namapenginapan" id="namapenginapan">
              </td>
            </tr>
            <tr><td style="width: 25%">jenis penginapan</td>
                <td style="width: 50%">
                  <select class="form-control" name="jenispenginapan" id="jenispenginapan">
                        <option value="">-Pilih-</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Villa">Villa</option>
                        <option value="Resort">Resort</option>
                        <option value="guesthouse">Guest House</option>
                  </select>
                </td>
              </tr>
            <tr><td style="width: 25%">alamat </td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="alamat" id="alamat">
              </td>
            </tr>
            <tr><td style="width: 25%">provinsi</td>
              <td style="width: 50%">
                <select class="form-control" name="provinsi" id="provinsi">
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
            <tr><td style="width: 25%">fasilitas</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="fasilitas" id="fasilitas">
              </td>
            </tr>
            <tr><td style="width: 25%">harga</td>
              <td style="width: 50%">
                <input type="text" class="form-control" name="harga" id="harga">
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




<!--     </div> -->

<?php
  include "base_template_footer.php"; //akan memanggil base_template_footer.php sebagai footer
?>
      </div>
    </div>
 

</body>    

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnsimpan').click(function(){
    // alert($('#idpelanggan').val())
    $.post("<?php echo $baseURL;?>library/api.penginapan.php",{
      type:1,
      txtId:$('#idpenginapan').val(),
      txtnamapenginapan:$('#namapenginapan').val(),
      txtjenispenginapan:$('#jenispenginapan').val(),
      txtalamat:$('#alamat').val(),
      txtprovinsi:$('#provinsi').val(),
      txtfasilitas:$('#fasilitas').val(),
      txtharga:$('#harga').val()
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

        $('#idpenginapan').val('');
        $('#namapenginapan').val('');
        $('#jenispenginapan').val('');
        $('#alamat').val('');
        $('#provinsi').val('');
        $('#fasilitas').val('');
        $('#harga').val('');
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
        url: "<?php echo $baseURL;?>library/api.penginapan.php", 
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

      idpenginapan    =myTable.row($(this).parents('tr')).data()[1];
      namapenginapan  =myTable.row($(this).parents('tr')).data()[2];
      jenispenginapan =myTable.row($(this).parents('tr')).data()[3];
      alamat          =myTable.row($(this).parents('tr')).data()[4];
      provinsi        =myTable.row($(this).parents('tr')).data()[5];
      fasilitas       =myTable.row($(this).parents('tr')).data()[6];
      harga           =myTable.row($(this).parents('tr')).data()[7];

      $('#idpenginapan').val(idpenginapan);
      $('#namapenginapan').val(namapenginapan);
      $('#jenispenginapan').val(jenispenginapan);
      $('#alamat').val(alamat);
      $('#provinsi').val(provinsi);
      $('#fasilitas').val(fasilitas);
      $('#harga').val(harga);

      myTable.ajax.reload();
   });
  
  
   $('#datatable tbody').on('click','.fa-trash-o',function(){
      var jawab;
      obj          = $(this).parents('tr');
      idpenginapan = myTable.row($(this).parents('tr')).data()[1];

      jawab = confirm("Apakah Anda Yakin Ingin Menghapus record?" );

      if(jawab==false){
        exit();
      }
      
      console.log(idpenginapan);

      $.post("<?php echo $baseURL ;?>library/api.penginapan.php",{type:"2", idpenginapan:idpenginapan}, function(data){

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

  })

</script>  
<?php
$this->load->view('template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">


  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') ?>">
<style>
.input-validation-error {
    border: solid 1px #ff0000;
}

th, td, p, input {
    font:14px Verdana;
}
table, th, td 
{
    border: solid 1px #DDD;
    border-collapse: collapse;
    padding: 2px 3px;
    text-align: center;
}
th {
    font-weight:bold;
}

</style>
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<style>
	.pull-left{float:left!important;}
	.pull-right{float:right!important;}
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Report
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Report</li>
    </ol>
</section>
<section class="content">
    <div class="row">
    <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Parameters</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" id="formkirim">
              <div class="box-body">
                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control select" id="select" >
                        <option id="1" value="qHasbie">Query Hasbie</option>
                        <option id="2" value="qHasbieMfee">Query Hasbie Mfee</option>
                        <option id="3" value="qMfeeSlCb">Query Mfee Sales Cabang</option>
                        <option id="4" value="qAum">Query Aum</option>
                        <option id="5" value="qNab">Query NAB</option>
                        <option id="6" value="qDjpIndividual">Query DJP Individual</option>
                        <option id="7" value="qDjpOrganisation">Query DJP Organisation</option>
                        <option id="8" value="djpTin23">Query djpTin23</option>
                        <option id="9" value="djpTin24">Query djpTin24</option>
                        <option id="10" value="djpTin25">Query djpTin25</option>
                        <option id="11" value="djpTin26">Query djpTin26</option>
                        <option id="12" value="djpTin30">Query djpTin30</option>
                        <option id="13" value="djpTin31">Query djpTin31</option>
                    </select>
                </div>


                <div class="form-group" id="dateRange">
                    <label>Date range:</label>

                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="reservation">
                    </div>
                    <!-- /.input group -->
                </div>



                <div class="form-group" id="SalesSelect">
                    <label>Select</label>
                    <select class="form-control" id="Sales">
                        <option id="1" value="0110275">MIRNA ELOK</option>
                    </select>
                </div>

                <div class="form-group" id="CabangSelect">
                    <label>Select</label>
                    <select class="form-control" id="Cabang">
                        <option id="1" value="SL">SOLO</option>
                        <option id="2" value="AG">AG</option>
                        <option id="3" value="PL">PLUIT</option>
                        <option id="4" value="BSD">BSD</option>
                        <option id="5" value="KG">KELAPA GADING</option>
                    </select>
                </div>
                <div class="form-group" id="SelectQty">
                    <label>Select</label>
                    <select class="form-control" id="Sales">
                        <option id="1" value="0">0</option>
                        <option id="2" value="1">Lebih dr 1</option>
                    </select>
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>        

    </div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Report</h3><BR/><BR/>
			</div>
            <!-- /.box-header -->
            <div class="box-body">

         
            
            <div class = "table-responsive">
                <table id="table" class="table table-striped">
                    <thead id="headTable">
                    </thead>    
                    <tbody id="bodyTable">
                    </tbody>
                </table>
            </div>



            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
	</div>	
    
</section>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-body">
          <p><center><img src="<?php echo base_url(); ?>assets/loading.gif" /></center></p>
        </div>

      </div>
    </div>
</div> 
<?php
$this->load->view('template/js');
?>

<!-- date-range-picker -->
<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>



<script type="text/javascript">
    $( document ).ready(function() {
        $('#CabangSelect').hide();
        $('#SalesSelect').hide();
        $('#SelectQty').hide();

        var startDate;
        var endDate;
        $('#reservation').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            startDate = start.format('DDMMYYYY');
            endDate = end.format('DDMMYYYY');
        });
        var inputFile = $('#select option:selected').val();

        $( "select" ).change(function () {
            var item=$(this);
            //alert(item.val());
            if(item.val() == 'qMfeeSlCb'){   
                $('#CabangSelect').show();
                $('#SalesSelect').show();
                $('#SelectQty').hide();
            }else if(item.val() == 'qAum'){
                $('#CabangSelect').hide();
                $('#SalesSelect').hide();
                $('#SelectQty').show();
            }else if(item.val() == 'qNab'){
                $('#CabangSelect').hide();
                $('#SalesSelect').show();
                $('#SelectQty').hide(); 
                $('#dateRange').hide();          
            }else if(item.val() == 'qDjpIndividual'){
                $('#CabangSelect').hide();
                $('#SalesSelect').hide();
                $('#SelectQty').hide(); 
                $('#dateRange').show(); 
            }
        });

        var inputcb = $('#Cabang option:selected').val();
        var inputSl = $('#SalesSelect option:selected').val();
        var qty = $('#SelectQty option:selected').val();

        $("#formkirim").on("submit", function(){
            if(inputFile == 'qHasbie'){   
                Getjson(startDate,endDate);
            }else if(inputFile == 'qHasbieMfee'){
                GetjsonMfee(startDate,endDate);
            }else if(inputFile == 'qMfeeSlCb'){
                GetJsonMfeeCabang(startDate,endDate,inputSl,inputcb);
            }else if(inputFile == 'qAum'){
                getAum(startDate,endDate,qty);
            }else if(inputFile == 'qNab'){
                getNab(inputSl);
            }else if(inputFile == 'qDjpIndividual'){
                getDjpTinInvidual(startDate,endDate);
            }
        })

    });

    function djpTinOrganisation(stDate,enDate){

    }

    function getDjpTinInvidual(stDate,enDate){
        $("#myModal").modal("show");
        var url = "http://172.16.16.12:8080/testla/rest-points/asmgService/djpTinIndividual/"+stDate+"/"+enDate;
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#headTable').append('<tr><th>MI_ID</th><th>DocRefID_AccountReport</th><th>TIN </th><th>IssuedBy </th><th>TINType </th></tr>');

            $("#myModal").modal("hide");
            $.each(JSON.parse(msg), function(key, val) {
                $('#bodyTable').append('<tr><td>'+val.MI_ID+'</td><td>'+val.DocRefID_AccountReport+'</td><td>'+val.TIN+'</td><td>'+val.IssuedBy+'</td><td>'+val.TINType+'</td></tr>');
            });    
        });        
    }

    function getNab(sellercd){
        $("#myModal").modal("show");
        var url = "http://172.16.16.12:8080/testla/rest-points/asmgService/datanab/"+sellercd;
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#headTable').append('<tr><th>BRANCH_CD</th><th>sales_id</th><th>sales_name </th><th>cif_no </th><th>first_name </th><th>mid_name </th><th>last_name </th><th>BIRTH_PLACE </th><th>BIRTH_DATE  </th><th>NPWP_REG_DATE  </th><th>ADDRESS1   </th><th>ADDRESS2   </th><th>email   </th><th>MOBILE_PHONE   </th><th>HOME_PHONE   </th></tr>');

            $("#myModal").modal("hide");
            $.each(JSON.parse(msg), function(key, val) {
                $('#bodyTable').append('<tr><td>'+val.BRANCH_CD+'</td><td>'+val.sales_id+'</td><td>'+val.sales_name+'</td><td>'+val.cif_no+'</td><td>'+val.first_name+'</td><td>'+val.mid_name+'</td><td>'+val.last_name+'</td><td>'+val.BIRTH_PLACE+'</td><td>'+val.BIRTH_DATE+'</td><td>'+val.NPWP_REG_DATE+'</td><td>'+val.ADDRESS1+'</td><td>'+val.ADDRESS2+'</td><td>'+val.email+'</td><td>'+val.MOBILE_PHONE+'</td><td>'+val.HOME_PHONE+'</td></tr>');
            });    
        });  

    }

    function getAum(stDate,enDate,qty){
        $("#myModal").modal("show");
        var url = "http://172.16.16.12:8080/testla/rest-points/asmgService/selectbyAum/"+stDate+"/"+enDate+"/"+qty;
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $("#myModal").modal("hide");
            $('#headTable').append('<tr><th>ASDATE</th><th>BRANCHNAME</th><th>AMT_BAL </th></tr>');
            $.each(JSON.parse(msg), function(key, val) {
                
                
                $('#bodyTable').append('<tr><td>'+val.ASDATE+'</td><td>'+val.BRANCHNAME+'</td><td>'+val.AMT_BAL+'</td></tr>');               

            });
        });        

    }

    function GetJsonMfeeCabang(stDate,enDate,sl,cb){
        $("#myModal").modal("show");
        var url = "http://172.16.16.12:8080/testla/rest-points/asmgService/selectHasbieMfeeSalesCb/"+stDate+"/" +enDate+"/"+sl+"/"+cb ;
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#headTable').append('<tr><th>MGTFEE_DT</th><th>BRANCH_CD</th><th>SALES_ID </th><th>SELLER_NAME </th><th>FUND_CD </th><th>FUNDNAME </th><th>MFEE_NAV </th><th>MFEE_NAVDT </th><th>MFEE_PERC  </th><th>SHARING_FEE_PCTG  </th><th>CCY_RATE   </th><th>AUM   </th><th>MFEE   </th><th>SHARING_FEE   </th><th>REFFERAL_ID   </th><th>REFFERAL_NAME   </th><th>REFFERAL_BRANCH   </th><th>REFERRAL_LASTPAYMENT_DATE   </th><th>FIRST_SUBS_AMT   </th><th>REFERRAL_SHARING_FEE   </th><th>REFERRAL_PAID_FEE   </th><th>SALES_SHARING_FEE   </th><th>SALES_PAID_FEE   </th></tr>');
            $.each(JSON.parse(msg), function(key, val) {
                $("#myModal").modal("hide");
                
                $('#bodyTable').append('<tr><td>'+val.MGTFEE_DT+'</td><td>'+val.BRANCH_CD+'</td><td>'+val.SALES_ID+'</td><td>'+val.SELLER_NAME+'</td><td>'+val.FUND_CD+'</td><td>'+val.FUNDNAME+'</td><td>'+val.MFEE_NAV+'</td><td>'+val.MFEE_NAVDT+'</td><td>'+val.MFEE_PERC+'</td><td>'+val.SHARING_FEE_PCTG+'</td><td>'+val.CCY_RATE+'</td><td>'+val.AUM+'</td><td>'+val.MFEE+'</td><td>'+val.SHARING_FEE+'</td><td>'+val.REFFERAL_ID+'</td><td>'+val.REFFERAL_NAME+'</td><td>'+val.REFFERAL_BRANCH+'</td><td>'+val.REFERRAL_LASTPAYMENT_DATE+'</td><td>'+val.FIRST_SUBS_AMT+'</td><td>'+val.REFERRAL_SHARING_FEE+'</td><td>'+val.REFERRAL_PAID_FEE+'</td><td>'+val.SALES_SHARING_FEE+'</td><td>'+val.SALES_PAID_FEE+'</td></tr>');               

            });
        });

    }

    function GetjsonMfee(stDate,enDate){
        $("#myModal").modal("show");
        var url = "http://172.16.16.12:8080/testla/rest-points/asmgService/selectHasbieMfeeSales/"+stDate+"/" +enDate ;
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#headTable').append('<tr><th>MGTFEE_DT</th><th>BRANCH_CD</th><th>SALES_ID </th><th>SELLER_NAME </th><th>FUND_CD </th><th>FUNDNAME </th><th>MFEE_NAV </th><th>MFEE_NAVDT </th><th>MFEE_PERC  </th><th>SHARING_FEE_PCTG  </th><th>CCY_RATE   </th><th>AUM   </th><th>MFEE   </th><th>SHARING_FEE   </th><th>REFFERAL_ID   </th><th>REFFERAL_NAME   </th><th>REFFERAL_BRANCH   </th><th>REFERRAL_LASTPAYMENT_DATE   </th><th>FIRST_SUBS_AMT   </th><th>REFERRAL_SHARING_FEE   </th><th>REFERRAL_PAID_FEE   </th><th>SALES_SHARING_FEE   </th><th>SALES_PAID_FEE   </th></tr>');
            $.each(JSON.parse(msg), function(key, val) {
                $("#myModal").modal("hide");
                
                $('#bodyTable').append('<tr><td>'+val.MGTFEE_DT+'</td><td>'+val.BRANCH_CD+'</td><td>'+val.SALES_ID+'</td><td>'+val.SALES_ID+'</td><td>'+val.FUND_CD+'</td><td>'+val.FUNDNAME+'</td><td>'+val.MFEE_NAV+'</td><td>'+val.MFEE_NAVDT+'</td><td>'+val.MFEE_PERC+'</td><td>'+val.SHARING_FEE_PCTG+'</td><td>'+val.CCY_RATE+'</td><td>'+val.AUM+'</td><td>'+val.MFEE+'</td><td>'+val.SHARING_FEE+'</td><td>'+val.REFFERAL_ID+'</td><td>'+val.REFFERAL_NAME+'</td><td>'+val.REFFERAL_BRANCH+'</td><td>'+val.REFERRAL_LASTPAYMENT_DATE+'</td><td>'+val.FIRST_SUBS_AMT+'</td><td>'+val.REFERRAL_SHARING_FEE+'</td><td>'+val.REFERRAL_PAID_FEE+'</td><td>'+val.SALES_SHARING_FEE+'</td><td>'+val.SALES_PAID_FEE+'</td></tr>');               
            });
        });
    }


    function CreateTableFromJSON(){

        $.getJSON('http://localhost:8080/testla/rest-points/asmgService/selectHasbie/01012018/01012018', function(data) {
            $.each(JSON.parse(data), function(key, val) {
                //alert(val.FUND_CD);
                $('#bodyTable').append('<tr><td>'+val.MGTFEE_DT+'</td><td>'+val.FUND_CD+'</td><td>'+val.OS_UNIT+'</td><td>'+val.AUM+'</td><td>'+val.SHARING_FEE+'</td><td>'+val.MFEE_NAV+'</td><td>'+val.MFEE_NAVDT+'</td><td>'+val.MFEE_PERC+'</td><td>'+val.SHARING_FEE_PCTG+'</td><td>'+val.CCY_RATE+'</td></tr>');
                
            })
        });
    }

    function Getjson(stDate,enDate){
        $("#myModal").modal("show");
        var url = "http://localhost:8080/testla/rest-points/asmgService/selectHasbie/"+stDate+"/" +enDate ;
        
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#headTable').append('<tr><th>MGTFEE_DT</th><th>FUND_CD</th><th>FUNDNAME </th><th>OS_UNIT </th><th>AUM </th><th>SHARING_FEE </th><th>MFEE_NAV </th><th>MFEE_NAVDT </th><th>MFEE_PERC  </th><th>SHARING_FEE_PCTG  </th><th>CCY_RATE   </th></tr>');

            $.each(JSON.parse(msg), function(key, val) {
                
                //alert(val.MGTFEE_DT);
                $("#myModal").modal("hide");
                $('#bodyTable').append('<tr><td>'+val.MGTFEE_DT+'</td><td>'+val.FUND_CD+'</td><td>'+val.FUNDNAME+'</td><td>'+val.OS_UNIT+'</td><td>'+val.AUM+'</td><td>'+val.SHARING_FEE+'</td><td>'+val.MFEE_NAV+'</td><td>'+val.MFEE_NAVDT+'</td><td>'+val.MFEE_PERC+'</td><td>'+val.SHARING_FEE_PCTG+'</td><td>'+val.CCY_RATE+'</td></tr>');

            })


        });       

    }

    function GetJsonDataMfee(){
        var url = "http://localhost:8080/testla/rest-points/asmgService/selectHasbieMfeeSalesCb/01122015/31012016/SL/0102179";
        $("#table").remove();
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#bodyTable').append('<tr><td>'+val.MGTFEE_DT+'</td><td>'+val.BRANCH_CD+'</td><td>'+val.SALES_ID+'</td><td>'+val.SELLER_NAME+'</td><td>'+val.FUND_CD+'</td><td>'+val.FUNDNAME+'</td><td>'+val.MFEE_NAV+'</td><td>'+val.MFEE_NAVDT+'</td><td>'+val.MFEE_PERC+'</td><td>'+val.SHARING_FEE_PCTG+'</td><td>'+val.CCY_RATE+'</td><td>'+val.AUM+'</td><td>'+val.MFEE+'</td><td>'+val.SHARING_FEE+'</td><td>'+val.REFFERAL_ID+'</td><td>'+val.REFFERAL_NAME+'</td><td>'+val.REFFERAL_BRANCH+'</td><td>'+val.REFERRAL_LASTPAYMENT_DATE+'</td><td>'+val.FIRST_SUBS_AMT+'</td><td>'+val.REFERRAL_SHARING_FEE+'</td><td>'+val.REFERRAL_PAID_FEE+'</td><td>'+val.SALES_SHARING_FEE+'</td><td>'+val.SALES_PAID_FEE+'</td></tr>');

        });   
    }

    function GetJsonAum(){
        var url = "http://localhost:8080/testla/rest-points/asmgService/selectbyAum/24102016/24102016/1";
        $("#table").remove();
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#bodyTable').append('<tr><td>'+val.ASDATE+'</td><td>'+val.BRANCHNAME+'</td><td>'+val.AMT_BAL+'</td></tr>');

        });        
    }

    function getNasabahBySales(){
        var url = "http://172.16.16.12:8080/testla/rest-points/asmgService/selectBySales/0110275";
        $("#table").remove();
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#bodyTable').append('<tr><td>'+val.BRANCH_CD+'</td><td>'+val.SALES_ID+'</td><td>'+val.SALES_NAME+'</td><td>'+val.CIF_NO+'</td><td>'+val.FIRST_NAME+'</td><td>'+val.MID_NAME+'</td><td>'+val.LAST_NAME+'</td></tr>');

        });         
    }

    function getNasabahBySalesAll(){
        var url = "http://172.16.16.12:8080/testla/rest-points/asmgService/datanab/0110275";
        $("#table").remove();
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#bodyTable').append('<tr><td>'+val.BRANCH_CD+'</td><td>'+val.sales_id+'</td><td>'+val.sales_name+'</td><td>'+val.CIF_NO+'</td><td>'+val.FIRST_NAME+'</td><td>'+val.MID_NAME+'</td><td>'+val.LAST_NAME+'</td><td>'+val.BIRTH_PLACE+'</td><td>'+val.BIRTH_DATE+'</td><td>'+val.NPWP_REG_DATE+'</td><td>'+val.ADDRESS1+'</td><td>'+val.ADDRESS2+'</td><td>'+val.email+'</td><td>'+val.MOBILE_PHONE+'</td><td>'+val.HOME_PHONE+'</td></tr>');

        });  

    }
    function getNasabahTinDJP(){
        var url = "http://172.16.16.12:8080/testla/rest-points/asmgService/djpTinIndividual/24102016/GAMA";
        $("#table").remove();
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#bodyTable').append('<tr><td>'+val.BRANCH_CD+'</td><td>'+val.sales_id+'</td><td>'+val.sales_name+'</td><td>'+val.CIF_NO+'</td><td>'+val.FIRST_NAME+'</td><td>'+val.MID_NAME+'</td><td>'+val.LAST_NAME+'</td><td>'+val.BIRTH_PLACE+'</td><td>'+val.BIRTH_DATE+'</td><td>'+val.NPWP_REG_DATE+'</td><td>'+val.ADDRESS1+'</td><td>'+val.ADDRESS2+'</td><td>'+val.email+'</td><td>'+val.MOBILE_PHONE+'</td><td>'+val.HOME_PHONE+'</td></tr>');

        });         
    }

    


</script>
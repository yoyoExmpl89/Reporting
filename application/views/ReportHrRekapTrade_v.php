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

table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
}

table th {
  padding: 15px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #beee31;
}

table th:first-child{  
  border-left:none;  
}

table tr {
  text-align: center;
  padding-left: 20px;
}

table td:first-child {
  text-align: left;
  padding-left: 20px;
  border-left: 0;
}

table td {
  padding: 15px 35px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}

table tr:last-child td {
  border-bottom: 0;
}

table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}

table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
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

            <form role="form" action="#" id="formkirim">
                <div class="box-body">

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
 <!-- 
                    <div class="form-group" id="dateRange2">
                        <label>Date range:</label>

                        <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservation2">
                        </div>
                        <!-- /.input group
                    </div> -->
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control pull-right" id="salescode">
                        </div>
                    </div>
                    
                </div>
                <div class="box-footer">
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
					<button type="button" id="buttonrefresh" class="btn btn-primary">Refresh</button>
                </div>
                </form>
          </div>        

    </div>
    </section>
<section class="content">  
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
        var startDate;
        var endDate;
		var startDate2;
        var endDate2;
        $('#reservation').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            startDate = start.format('MM-DD-YYYY');
            endDate = end.format('MM-DD-YYYY');
			startDate2 = start.format('MM-DD-YYYY');
            endDate2 = end.format('MM-DD-YYYY');
        });

        $('#reservation2').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {

        });
        var salescode = $("#salescode").val();

        $("#formkirim").submit(function(e){
			e.preventDefault();
            getHr(startDate,endDate,startDate2,endDate2,$("#salescode").val());
			$("#submit").prop("disabled","disabled");
        });
		$("#buttonrefresh").click(function(){
            location.reload(true);
        });
    });

    function getHr(startDate,endDate,startDate2,endDate2,salescode){
        $("#myModal").modal({backdrop: 'static', keyboard: false, show : true});
        var url = "http://172.16.3.126:8080/testla/rest-points/s21Service/QueryHrRekapTrade/"+startDate+"/"+endDate+"/"+startDate2+"/"+endDate2+"/"+salescode;
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
            $('#headTable').append('<tr><th>Date</th><th>ClientID</th><th>SalesPersonID</th><th>OfficeID</th><th>BoardID</th><th>TradeBuySell</th><th>StockID</th><th>trxqty</th><th>TradePrice</th><th>TradeAmount</th><th>TRXAmount</th><th>TradeFee</th></tr>');

            $("#myModal").modal("hide");
            $.each(JSON.parse(msg), function(key, val) {
                $('#bodyTable').append('<tr><td>'+val.Date+'</td><td>'+val.ClientID+'</td><td>'+val.SalesPersonID+'</td><td>'+val.OfficeID+'</td><td>'+val.BoardID+'</td><td>'+val.TradeBuySell+'</td><td>'+val.StockID+'</td><td>'+val.trxqty+'</td><td>'+val.TradePrice+'</td><td>'+val.TradeAmount+'</td><td>'+val.TRXAmount+'</td><td>'+val.TradeFee+'</td></tr>');
            });    
        });        
    }
</script>

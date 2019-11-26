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

                    <div class="form-group" id="SalesSelect">
                        <label>Select</label>
                        <select class="form-control" id="Sales">
                            <option>No Select</option>
                            <!--<option id="1" value="0110275">MIRNA ELOK</option>-->
                        </select>
                    </div>

                    <div class="form-group" id="CabangSelect">
                        <label>Cabang</label>
                        <select class="form-control" id="Cabang" nama="Cabang">
                            <option>No Select</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
                    <button id="SaveCSV">Export HTML table to CSV file</button>
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


		$.ajax({
			url : "<?php echo site_url('ReportMfeeCabang/get_data_sales');?>",
			method : "GET",
			async : true,
			dataType : 'json',
			success: function(data){
                //alert(data.salesid.length);
				var html = '';
				for(i=0;i<data.salesid.length;i++){
					html += '<option value='+data.salesid[i].sellercd+'>'+data.salesid[i].sellername+'</option>';
				}
				$('#Sales').append(html);

			}
		});
		$.ajax({
			url : "<?php echo site_url('ReportMfeeCabang/get_data_branch');?>",
			method : "POST",
			async : true,
			dataType : 'json',
			success: function(data){
                //alert(data);
				var html = '';
				for(i=0;i<data.branch.length;i++){
					html += '<option value='+data.branch[i].kodebranch+'>'+data.branch[i].namebranch+'</option>';
				}
				$('#Cabang').append(html);

			}
        });
        
        var startDate;
        var endDate;
        $('#reservation').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            startDate = start.format('DDMMYYYY');
            endDate = end.format('DDMMYYYY');
        });
        var inputcb;
        var inputSl;
        $("#Sales").change(function () {
            //alert($('#Sales option:selected').val());
            inputSl = $('#Sales option:selected').val();
        });
       //alert(inputcb);
        $("#Cabang").change(function () {
            //alert($('#SalesSelect option:selected').val());
            inputcb = $('#Cabang option:selected').val();
        });
        //var inputSl = $('#SalesSelect option:selected').val();
        var qty = $('#SelectQty option:selected').val();



        $("#formkirim").submit(function(e){
			e.preventDefault();
            GetJsonMfeeCabang(startDate,endDate,inputSl,inputcb);
			$("#submit").prop("disabled","disabled");
        });
		$("#buttonrefresh").click(function(){
            location.reload(true);
        });
        $("#SaveCSV").click(function(){
        // action goes here!!
            var html = document.querySelector("#table").outerHTML;
            export_table_to_csv(html, "table.csv");
        }); 




    });

    function download_csv(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV FILE
        csvFile = new Blob([csv], {type: "text/csv"});

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // We have to create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Make sure that the link is not displayed
        downloadLink.style.display = "none";

        // Add the link to your DOM
        document.body.appendChild(downloadLink);

        // Lanzamos
        downloadLink.click();
    }

    function export_table_to_csv(html, filename) {
        var csv = [];
        var rows = document.querySelectorAll("#table tr");
        
        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");
            
            for (var j = 0; j < cols.length; j++) 
                row.push(cols[j].innerText);
            
            csv.push(row.join(","));		
        }

        // Download CSV
        download_csv(csv.join("\n"), filename);
    }
    function GetJsonMfeeCabang(stDate,enDate,sl,cb){
        showModal();
        var url = "http://172.16.3.126:8080/testla/rest-points/asmgService/selectHasbieMfeeSalesCb/"+stDate+"/" +enDate+"/"+sl+"/"+cb ;        
        $.ajax({
            url: url,
            dataType: 'json'
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
			$('body').loadingModal('hide');
			$('body').loadingModal('destroy') ;
            $('#headTable').append('<tr><th>MGTFEE_DT</th><th>BRANCH_CD</th><th>SALES_ID </th><th>SELLER_NAME </th><th>FUND_CD </th><th>FUNDNAME </th><th>MFEE_NAV </th><th>MFEE_NAVDT </th><th>MFEE_PERC  </th><th>SHARING_FEE_PCTG  </th><th>CCY_RATE   </th><th>AUM   </th><th>MFEE   </th><th>SHARING_FEE   </th><th>REFFERAL_ID   </th><th>REFFERAL_NAME   </th><th>REFFERAL_BRANCH   </th><th>REFERRAL_LASTPAYMENT_DATE   </th><th>FIRST_SUBS_AMT   </th><th>REFERRAL_SHARING_FEE   </th><th>REFERRAL_PAID_FEE   </th><th>SALES_SHARING_FEE   </th><th>SALES_PAID_FEE   </th></tr>');
            $("#myModal").modal("hide");
            $.each(JSON.parse(msg), function(key, val) {
                $('#bodyTable').append('<tr><td>'+val.MGTFEE_DT+'</td><td>'+val.BRANCH_CD+'</td><td>'+val.SALES_ID+'</td><td>'+val.SELLER_NAME+'</td><td>'+val.FUND_CD+'</td><td>'+val.FUNDNAME+'</td><td>'+val.MFEE_NAV+'</td><td>'+val.MFEE_NAVDT+'</td><td>'+val.MFEE_PERC+'</td><td>'+val.SHARING_FEE_PCTG+'</td><td>'+val.CCY_RATE+'</td><td>'+val.AUM+'</td><td>'+val.MFEE+'</td><td>'+val.SHARING_FEE+'</td><td>'+val.REFFERAL_ID+'</td><td>'+val.REFFERAL_NAME+'</td><td>'+val.REFFERAL_BRANCH+'</td><td>'+val.REFERRAL_LASTPAYMENT_DATE+'</td><td>'+val.FIRST_SUBS_AMT+'</td><td>'+val.REFERRAL_SHARING_FEE+'</td><td>'+val.REFERRAL_PAID_FEE+'</td><td>'+val.SALES_SHARING_FEE+'</td><td>'+val.SALES_PAID_FEE+'</td></tr>');             
                
                 });
                 $("#reservation").prop('disabled', true);     
        });        
    }
	function showModal() {
		 $('body').loadingModal({text: 'Don`t close data on processing...'});
		 $('body').loadingModal('animation', 'wanderingCubes').loadingModal('backgroundColor', 'red');
	}	
</script>

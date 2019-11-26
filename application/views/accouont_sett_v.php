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

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<style>
	.pull-left{float:left!important;}
	.pull-right{float:right!important;}
	
	.vertical-scrollbar
	{
		overflow-x: hidden; /*for hiding horizontal scroll bar*/
		max-height: 300px;
		overflow-y: scroll;
	}
</style>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Setting Account
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting Account</li>
    </ol>
</section>

<section class="content">
    <div class="row">
		<div class="col-md-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Setting Account</h3><BR/><BR/>
			  <button class="btn btn-success" onclick="add_user()" data-toggle="modal">Add New</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table"  class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>eid</th>
					  <th>email</th>
					  <th>name</th>
					  <th>division</th>
					  <th>level</th>
					  <th>menu_id</th>
					  <th>action</th>
                </thead>
                <tbody>

                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
	</div>
</section>


<?php
$this->load->view('template/js');
?>

<div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog" style="width:60%;">
		   <div class="modal-content">
			   <div class="modal-header">
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				   <h4 class="modal-title" id="myModalLabel">Add New</h4>
			   </div>
			   <div id="bodymodal" class="modal-body">
					<div class="row">
						<div class="col-md-12">
						<form id="form"  role="form" action="#" method="post">
							<div class="col-md-6">
								<div class="box box-primary">
								
								<input type="hidden" class="form-control" id="id" name="id" placeholder="ID">
									<div class="box-body">
										<div class="form-group">  
										  <div class="errorhandling">
										    <label for="">email</label>
										  	<input type="text" class="form-control" id="tahun" name="tahun" placeholder="tahun" maxlength="4">
										  	

										  </div>
										</div>
										<div class="form-group">
											<div class="errorhandling">	
										  		<label for="">name</label>
										  		<input type="text" class="form-control" id="no_rkt" name="no_rkt" placeholder="no_rkt" maxlength="50">
											</div>
										</div>
										<div class="form-group">
											<div class="errorhandling">	
										  		<label for="">division</label>
										  		<input type="text" class="form-control" id="kode_rkak" name="kode_rkak" placeholder="kode_rkak" maxlength="50">
											</div>
										</div>
										<div class="form-group">
											<div class="errorhandling">	
										  		<label for="">level</label>
										  		<input type="text" class="form-control" id="nama_rkak" name="nama_rkak" placeholder="nama_rkak" maxlength="50">
											</div>
										</div>  
 

				
									</div>

									<div class="box-footer">
										
									</div>				
								

							</div>							
							</div>
							<div class="col-md-6">
								<label>Menu List</label>
								<div id="menu" class="vertical-scrollbar">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" id="buttonid"  id="add-row" class="btn btn-success">Save</button>
								<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						</form>
						
					</div>
				</div>
			</div>
	</div>
</div>


<script type="text/javascript">
	var save_method;
	var table;
	$(document).ready(function() {
		table = $('#table').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.
			"dom": '<"pull-left"f><"pull-right"l>tip',
			"ajax": {
				"url": "<?php echo site_url('AccountSetting/ajax_list')?>",
				"type": "POST"
			},
			"scrollX": true,
			"columnDefs": [
				{ 
					"targets": [ -1 ], //last column
					"orderable": false, //set not orderable
					"width": '10%', 
					"targets": 0
				},
			],
		});
		
		$('#buttonid').click(function() {
			if($("#form").valid() == true){
				save_user();
			};
			
		});	
		
	});
	
	function save_user(){
		$('#btnSave').text('saving....');
		$('#btnSave').attr('disabled',true);
		var url;
		var myarray = [];
		$("input[type=checkbox]:checked").each(function() {
			//alert( $(this).val() );
			myarray.push($(this).val());
		});
		console.log(myarray);
		if(save_method == 'add')
		{
			url = "<?php echo site_url('AccountSetting/ajax_add')?>";
		}else{
			url = "<?php echo site_url('AccountSetting/ajax_update')?>";
		}
		
		$.ajax({
			url		: url,
			type	: "POST",
			data 	: {menuid:myarray},
			dataType: "JSON",
			success : function(data)
			{
				
				if(data.status){
					$('#myModalAdd').modal('hide');
					reload_table();
				}
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable 
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error adding / update data');
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable 
			
			}	
		});
	}
	
	function add_user()
	{
		save_method = 'add';
		$('#myModalAdd').modal('show'); // show bootstrap modal
		$.ajax({
			url : "<?php echo site_url('AccountSetting/getmenu')?>",
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				var i;
				
				for (i = 0; i < data.length; i++) { 
					
					$('#menu').append('<input type="checkbox" name="selector[]" value="'+data[i].id+'">'+data[i].name+' <br>');
				}; 
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});		
	
	}	
</script>   	

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/avatar.png') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>x</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>


			<!--<li>
			  <a href="<?php echo site_url('Report') ?>">
				<i class="fa fa-th"></i> <span>Report ASMG</span>
			  </a>
            </li>-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
					<?php if($this->session->userdata('divisi') == 'IT') { ;?>
						<span>DATA Report</span>
					<?php }else if($this->session->userdata('divisi') == 'ADMIN'){ ?>
						<span>DATA Report</span>
					<?php }else{ ?>
						<span>DATA Report</span>
					<?php } ?>
                    <span class="pull-right-container">
                    
                    </span>
                </a>

                <ul class="treeview-menu">
					<!--<li><a href="<?php echo site_url('DjpTin30') ?>"><i class="fa fa-circle-o"></i> ASMG DJP30</a></li>
					<li><a href="<?php echo site_url('DjpTin26') ?>"><i class="fa fa-circle-o"></i> ASMG DJP26</a></li>
					<li><a href="<?php echo site_url('DjpTin25') ?>"><i class="fa fa-circle-o"></i> ASMG DJP25</a></li>
					<li><a href="<?php echo site_url('DjpTin24') ?>"><i class="fa fa-circle-o"></i> ASMG DJP24</a></li>
					<li><a href="<?php echo site_url('DjpTin23') ?>"><i class="fa fa-circle-o"></i> ASMG DJP23</a></li>
                    <li><a href="<?php echo site_url('DjpTinOrganisation') ?>"><i class="fa fa-circle-o"></i> Asmg_DjpTinOrganisation</a></li>
                    <li><a href="<?php echo site_url('ReportAsmg_DjpTinInvidual') ?>"><i class="fa fa-circle-o"></i> ReportAsmg_DjpTinInvidual</a></li>-->
					
					<?php 
					$varcount = count($data);
					for($i=0;$i<$varcount;$i++) {?>
						<li><a href="<?php echo site_url($data[$i]->menu_url) ?>"><i class="fa fa-circle-o"></i> <?php echo $data[$i]->name; ?></a></li>
					<?php } ?>
                </ul>                
            </li>
			<?php if($this->session->userdata('level') == 'admin') { ;?>
			<li class="treeview">
				<a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>ACCOUNT</span>
                    <span class="pull-right-container">
                    
                    </span>
                </a>
				<ul class="treeview-menu">
                    <li><a href="<?php echo site_url('AccountSetting') ?>"><i class="fa fa-circle-o"></i> Account Setting</a></li>
				</ul>
			</li>
			<?php }?>
			
            <!--
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report MFEE Bulanan</span>
                    <span class="pull-right-container">
                    
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('ReportNab') ?>"><i class="fa fa-circle-o"></i> ReportNab</a></li>
                    <li><a href="<?php echo site_url('ReportAum') ?>"><i class="fa fa-circle-o"></i>ReportAum</a></li>
                    <li><a href="<?php echo site_url('ReportAumSalesByNasabah') ?>"><i class="fa fa-circle-o"></i>Report Aum by Nasabah</a></li>
                    <li><a href="<?php echo site_url('ReportMfeeCabang') ?>"><i class="fa fa-circle-o"></i>ReportMfeeCabang</a></li>
                    <li><a href="<?php echo site_url('ReportMfee') ?>"><i class="fa fa-circle-o"></i>ReportMfee</a></li>
                </ul>
            </li>

            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report UNIVERSAL SALES</span>
                    <span class="pull-right-container">
                    
                    </span>
                </a>

            </li>            
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report COMPLIANCE</span>
                    <span class="pull-right-container">
                   
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('ReportBej') ?>"><i class="fa fa-circle-o"></i> TINA BULANAN REPORT BEJ</a></li>
                    <li><a href="<?php echo site_url('ReportQueryPPATK') ?>"><i class="fa fa-circle-o"></i> QueryPPATK</a></li>
                    <li><a href="<?php echo site_url('ReportQuerySipesat') ?>"><i class="fa fa-circle-o"></i> QuerySipesat</a></li>
                    <li><a href="<?php echo site_url('ReportApuPPTBondrev1') ?>"><i class="fa fa-circle-o"></i> ApuPPTBondrev1</a></li>
                    <li><a href="<?php echo site_url('ReportAuditClientRisk') ?>"><i class="fa fa-circle-o"></i> AuditClientRisk</a></li>
                    <li><a href="<?php echo site_url('ReportClientResiko') ?>"><i class="fa fa-circle-o"></i> AuditClientResiko</a></li>
                    <li><a href="<?php echo site_url('ReportApuPptInv') ?>"><i class="fa fa-circle-o"></i> ApuPptInv</a></li>
                    <li><a href="<?php echo site_url('ReportCbestNasabah') ?>"><i class="fa fa-circle-o"></i> CBEST NASABAH</a></li>
                    <li><a href="<?php echo site_url('ReportAuditBei') ?>"><i class="fa fa-circle-o"></i> AUDIT BEI NASABAH</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report KEUANGAN</span>
                    <span class="pull-right-container">
                    
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('ReportQueryDjpIvy') ?>"><i class="fa fa-circle-o"></i> QueryDjpIvy</a></li>
                    <li><a href="<?php echo site_url('ReportJournalEntry') ?>"><i class="fa fa-circle-o"></i> JournalEntry</a></li>
                    <li><a href="<?php echo site_url('ReportListNasabahEY') ?>"><i class="fa fa-circle-o"></i> ListNasabahEY</a></li>
                    <li><a href="<?php echo site_url('ReportEYClient') ?>"><i class="fa fa-circle-o"></i> ReportEYClient</a></li>
                    <li><a href="<?php echo site_url('ReportEyInterestRate') ?>"><i class="fa fa-circle-o"></i> ReportEyInterestRate</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Report S21</span>
                    <span class="pull-right-container">
                    
                    </span>
                </a>
                <ul class="treeview-menu"> 
                    <li><a href="<?php echo site_url('ReportNsb') ?>"><i class="fa fa-circle-o"></i> Query Nasabah</a></li>
                    <li><a href="<?php echo site_url('ReportAudit') ?>"><i class="fa fa-circle-o"></i>  Query Audit</a></li>
                    <li><a href="<?php echo site_url('ReportSahamSekunder') ?>"><i class="fa fa-circle-o"></i> SahamSekunder</a></li>
                    
                    <li><a href="<?php echo site_url('ReportOjkJessica') ?>"><i class="fa fa-circle-o"></i> OjkJessica</a></li>
                    <li><a href="<?php echo site_url('ReportHrRekapTrade') ?>"><i class="fa fa-circle-o"></i> HrRekapTrade</a></li>


                </ul>
            </li>
			-->

		
  
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
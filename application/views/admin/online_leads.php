<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    if($this->session->userdata("user_type") == "admin")
        $this->load->view('inc/admin_header');
    else
        $this->load->view('inc/header');    
?>
<body>
	 <div class="se-pre-con"></div>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
						        <!--<div class="main-search">
											<form>
											   <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
												<input type="submit" value="">
											</form>
									<div class="close"><img src="<?php echo base_url()?>assets/images/cross.png" /></div>
								</div>
									<div class="srch"><button></button></div>
									<script type="text/javascript">
										 $('.main-search').hide();
										$('button').click(function (){
											$('.main-search').show();
											$('.main-search text').focus();
										}
										);
										$('.close').click(function(){
											$('.main-search').hide();
										});
									</script>
							profile_details-->
								<div class="profile_details_left">
									<?php $this->load->view('notification');?>
							</div>
							<div class="clearfix"></div>	
							<!--//profile_details-->
						</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->
						<div class="outter-wp">
<style>
	@media screen and (min-width: 768px) {
		modal_
		.modal-dialog  {
			width:900px;
		}
	}
	.form-group input[type="checkbox"] {
		display: none;
	}
	.form-group input[type="checkbox"] + .btn-group > label span {
		width: 20px;
	}
	.form-group input[type="checkbox"] + .btn-group > label span:first-child {
		display: none;
	}
	.form-group input[type="checkbox"] + .btn-group > label span:last-child {
		display: inline-block;
	}
	.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
		display: inline-block;
	}
	.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
		display: none;
	}
	tr.highlight_past td.due_date{
		background-color: #cc6666 !important;
	}
	tr.highlight_now td.due_date{
		background-color: #e4b13e !important;
	}
	tr.highlight_future td.due_date{
		background-color: #65dc68 !important;
	}
	#history_table td {
		border: 1px solid #aaa;
		padding: 5px
	}
</style>
<div class="container">
	<?php

	$source_name=$this->uri->segment(2);
	$lead_controller=$source_name;
	if($source_name=='magicbricks_leads')
		$source_name='Magicbricks';
	elseif ($source_name=='acres99_leads') {
		
	}
	elseif ($source_name=='commonfloor_leads') {
		$source_name='commonfloor';
	}
			$today_leads="";
			$Yestreday_leads="";
			$total_leads="";
			$today=date('Y-m-d');
			$yesterday=date('Y-m-d',strtotime("-1 days"));
			$today_leads=$this->common_model->lead_count($source_name,$today);
			$Yestreday_leads= $this->common_model->lead_count($source_name,$yesterday);
			$total_lead_count=$this->common_model->total_lead_count($source_name);
			$this->session->unset_userdata('SRCHTXT');
			$this->session->unset_userdata('project');
	?>

	<div class="page-header">
		<h1><?= $heading; ?></h1>
	</div>
	<br>
		<?php
	if($heading == '99 Acres Online Callbacks' && $this->session->userdata('99acre_authenication_fail')!='')
	{
		?>
			<form method="POST" action="update_99acre_credentials"autocomplete="off">
      
        <div class="col-sm-2">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username"  placeholder="New Username"  />
                <input type="hidden" class="form-control" name="lead"  value="99acre" />
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>Password:</label>
                <input type="Password" class="form-control" name="Password" placeholder="New Password"  />
            </div>
        </div>
         
        <div class="clearfix"></div>
        <!--<div class="col-sm-6">
            <button class="btn btn-info btn-block" id="admin-reset"onclick="reset_data()" >Reset</button>
        </div>-->
        <div class="col-sm-6">
            <button type="submit"  name="update_99acre"class="btn btn-success btn-block">Update</button>
        </div>
    </form>
		<?php
 
	}
	else
	{
	?>
	<form method="POST" id="search_form" autocomplete="off">
       <div class="col-md-2 form-group">
            <label for="emp_code">Project:</label>
            <select  class="form-control"  id="project" name="project" >
                <option value="">Select</option>
                <?php $projects= $this->common_model->all_active_projects(); 
                foreach( $projects as $project){ ?>
                    <option value="<?php echo $project->name ?>" <?php //if(($this->session->userdata("project"))==$project->name) echo 'selected' ?>><?php echo $project->name ?></option>
                <?php }?>              
            </select>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>Search:</label>
                <input type="text" class="form-control" name="srxhtxt" id="srxhtxt" placeholder="name / Email / Contact Number / Project" value="<?= ($this->session->userdata('SRCHTXT')) ? $this->session->userdata('SRCHTXT') : '' ?>" />
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>From Date:</label>
                <input type="text" class="form-control" name="fromDate" id="from" placeholder="From Date" value=""  />
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>To Date:</label>
                <input type="text" class="form-control" name="toDate" id="to" placeholder="To Date" value="" />
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <button class="btn btn-info btn-block" id="admin-reset"onclick="reset_data()" >Reset</button>
        </div>
        <div class="col-sm-6">
            <button type="submit" id="admin-search" class="btn btn-success btn-block">Search</button>
        </div>
    </form>
    <br>
	<table  class="table table-striped table-bordered dt-responsive" cellspacing="0" >
		<tr>
			<th>Today's Leads :</th>
			<th>Yestredays's Leads :</th>
			<th>Total Leads :</th>
		</tr>
		<tr>
			<td><?= $today_leads['count']?></td>
			<td><?= $Yestreday_leads['count']?></td>
			<td><?= $total_lead_count['count']?></td>
		</tr>
		
	</table>
	<!--
<?php
$search = $search ? $search :'';
if($search['count']!=0)
{?>
<table  class="table table-striped table-bordered dt-responsive" cellspacing="0" width="50">
		<tr>
			<th>From Date</th>
			<th>To Date :</th>
			<th>Lead Count :</th>
		</tr>
		<tr>
			<td><?= $fromdate?></td>
			<td><?= $todate?></td>
			<td><?= $search['count']?></td>
		</tr>
		
	</table>

<?php } ?>-->
	
	<form method="POST" class="main-from" action="<?php echo base_url()?>admin/save_online_leads">
		
		<table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Select</th>
					<th>Delete</th>
					<th>Source</th>
					<th>Contact Name</th>
					<th>Contact No</th>
					<!--<th>Email</th>-->
					<th><?php if($source_name=='commonfloor') echo'Project / Area';else echo 'Project'; ?></th>
					<!--<th>Lead Id</th>-->
					<th>Notes</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody id="table_body">
				<?php if(count($leads)>0){
					foreach ($leads as $lead) { ?>
						<tr id="row_<?= $lead->id ?>">
							<td><input type='checkbox' name='check[]' class='check' value="<?= $lead->id ?>"></td>
							<td><button type="button" class="btn btn-success" onclick="window.location='<?php echo site_url("admin/delete_online_lead/".$lead->id.'/'.$lead_controller);?>'">Delete Lead</button></td>
							<td><?= $lead->source ?></td>
							<td><?= $lead->name ?></td>
							<td><?= $lead->phone ?></td>
							<!--<td><?= $lead->email ?></td>-->
							<td>
								<!--<select name='project_<?= $lead->id ?>' required>
									<?php foreach( $projects as $project){ ?>
										<option value="<?= $project->id ?>"><?= $project->name ?></option>
									<?php } ?>
								</select>-->
								<?= $lead->project ?>
							</td>
						<!--	<td><?= $lead->leadid ?></td>-->
							<td><?= $lead->notes ?></td>
							<td><?= $lead->lead_date ?></td>
						</tr>
					<?php }
				}
				else{ ?>
						<tr>
							<td colspan='8'>No Leads for Now</td>
						</tr>
				<?php } ?>
			</tbody>
		</table>


		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="page-header text-center">
					<h1>Default Callback Assignment</h1>
				</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-3">Dept*</label>
						<div class="col-sm-9">
							<select type="email" class="form-control" name="dept" required>
								<?php $all_department=$this->common_model->all_active_departments();
								foreach($all_department as $department){ ?>
									<option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-3">Callback type*</label>
						<div class="col-sm-9">
							<select type="email" class="form-control" name="callback_type" required>
								<?php $all_callback_types=$this->common_model->all_active_callback_types();
								foreach($all_callback_types as $callback_type){ ?>
									<option value="<?php echo $callback_type->id; ?>"><?php echo $callback_type->name; ?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-3">Assigned to*</label>
						<div class="col-sm-9">
							<select type="email" class="form-control" name="user" required>
								<?php $all_user= $this->user_model->all_users("type in (1,2,3,4)");
								foreach( $all_user as $user){
									switch ($user->type) {
										case '1':
											$role = "User";
											break;

										case '2':
											$role = "Manager";
											break;

										case '3':
											$role = "VP";
											break;

										case '4':
											$role = "Director";
											break;
									} ?>
									<option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-3">Broker*</label>
						<div class="col-sm-9">
							<select type="email" class="form-control" name="broker" required>
								<?php $brokers= $this->common_model->all_active_brokers();
								foreach( $brokers as $broker){ ?>
									<option value="<?php echo $broker->id; ?>"><?php echo $broker->name ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-3">Status*</label>
						<div class="col-sm-9">
							<select type="email" class="form-control" name="status" required>
								<?php $statuses= $this->common_model->all_active_statuses();
								foreach( $statuses as $status){ ?>
									<option value="<?php echo $status->id; ?>"><?php echo $status->name ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-3">Due Date*</label>
						<div class="col-sm-9">
							<input type="date" id="dt" class="form-control" name="due_date" required />
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-3">Due Time*</label>
						<div class="col-sm-9">
							<input type="time" id="dt" class="form-control" name="due_time" value="00:00"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-success btn-block">Save Data</button>
						</div>
					</div>
			</div>
		</div>
	</form>

	</iframe>
	<?php
}
?>
</div>


<script type="text/javascript">

    function reset_data(){
      
        $('#project').val("");
		$('#srxhtxt').val("");
        $("#search_form").submit();
    }
	/*$(".main-from").submit(function(e){
		e.preventDefault();
		$(".se-pre-con").show();
		var url = $(".main-from").attr('action');
		var formdata = $(".main-from").serialize();
		if($('.check:checked').length == 0){
			alert("You need to select atleast one entry");
			$(".se-pre-con").hide();
			return false;
		}
		$.post(url, formdata, function(resp){
			data = JSON.parse(resp);
			$.each(data, function( index, value ){
				$("#row_"+value).remove();
			});
			if($('#table_body tr').length == 0)
				window.location.replace("<?= base_url('admin/callbacks') ?>");
			$(".se-pre-con").hide();
		});
	})*/

	$(document).ready(function() {
		// $('#example').DataTable();
		if (!Modernizr.inputtypes.date) {
			// If not native HTML5 support, fallback to jQuery datePicker
			$('input[type=date]').datepicker({
				// Consistent format with the HTML5 picker
					dateFormat : 'dd/mm/yy'
				}
			);
		}
		if (!Modernizr.inputtypes.time) {
			// If not native HTML5 support, fallback to jQuery timepicker
			$('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
		}

	});
	$(function(){
        $("#to").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#from").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#to").datepicker( "option", "minDate", minValue );
        })
    });
</script>
<!--/tabs-->
										 <div class="tab-main">
											 <!--/tabs-inner-->
												
												</div>
											  <!--//tabs-inner-->

									 <!--footer section start-->
										<footer>
										   <p>&copy 2020 Countryside Group . All Rights Reserved | Design by <a href="https://secondsdigital.com/" target="_blank">Seconds Digital Solutions.</a></p>
										</footer>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo"> <!--<h1>CSG</h1>--></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <?php $this->load->view('profile_pic');?>
									  <a href="#"><span class=" name-caret"><?php echo $this->session->userdata('user_name'); ?></span></a>
									   <p><?php echo $this->session->userdata('user_type'); ?></p>
									
									<ul>
									<li><a class="tooltips" href="#"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" href="#"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
										<li><a class="tooltips" href="<?php echo base_url()?>login/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <?php $this->load->view('inc/header_nav'); ?>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js --
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vroom.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/vroom.js"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url()?>assets/js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   
   <script>
    $(document).ready(function() {
        $('#example').DataTable();
        if (!Modernizr.inputtypes.date) {
            // If not native HTML5 support, fallback to jQuery datePicker
            $('input[type=date]').datepicker({
                // Consistent format with the HTML5 picker
                    dateFormat : 'dd/mm/yy'
                }
            );
        }
        if (!Modernizr.inputtypes.time) {
            // If not native HTML5 support, fallback to jQuery timepicker
            $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
        }
        $('#revenueMonth').MonthPicker({
            Button: false
        });
        get_revenues();

        $('.view_callbacks').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "user_total":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date = "<?php echo date('Y-m-d'); ?>";
                    data.access = 'read_write'; 
                    break;

                case "user_overdue":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date_to = "<?php echo date('Y-m-d H:i:s'); ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_close": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;

                case "user_important":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.access = 'read_write'; 
                    data.important = 1;
                    break;

                case "manager_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "manager_close":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;
            }
            
            view_callbacks(data,'post');

        });

        $("#refresh").click(function(){
            $(".se-pre-con").show();
            $.get("<?php echo base_url(); ?>dashboard/get_live_feed_back", function(response){
                $("#live_feed_back_body").html(response);
                $(".se-pre-con").hide("slow");
            });
        });

        $("#overdue_lead_count").click(function(){
            var form = document.createElement('form');
            form.method = "POST";
            form.action = "<?php echo base_url()."dashboard/generate_report" ?>";
            
            var input = document.createElement('input');
            input.type = "text";
            input.name = "toDate";
            input.value = $(this).data('datetime');
            form.appendChild(input);

            input = document.createElement('input');
            input.type = "text";
            input.name = "reportType";
            input.value = "due";
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        });

        $('.emailSiteVisit').on('click', function(){
            $(".se-pre-con").show();
            $.ajax({
                type : 'POST',
                url : "<?= base_url('site-visit-report-mail');?>",
                data:1,
                success: function(res){
                    $(".se-pre-con").hide("slow");
                    if(res == 1)
                        alert('Email Sent Successfully.');
                    else
                        alert('Email Sent fail!');
                }
            });
        });

    });
    // $('#filter_revenue').click(get_revenues());
    function get_revenues(){
        $.get( "<?php echo base_url()."dashboard/get_revenue/" ?>"+$('#revenueMonth').val(), function( data ) {
            $('#revenue_data').html(data);
        });
    }
    function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }

</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        if (!Modernizr.inputtypes.date) {
            // If not native HTML5 support, fallback to jQuery datePicker
            $('input[type=date]').datepicker({
                // Consistent format with the HTML5 picker
                    dateFormat : 'dd/mm/yy'
                }
            );
        }
        if (!Modernizr.inputtypes.time) {
            // If not native HTML5 support, fallback to jQuery timepicker
            $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
        }
        $('#revenueMonth').MonthPicker({
            Button: false
        });
        get_revenues();

        $('.view_callbacks').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "user_total":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date = "<?php echo date('Y-m-d'); ?>";
                    data.access = 'read_write'; 
                    break;

                case "user_overdue":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date_to = "<?php echo date('Y-m-d H:i:s'); ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_close": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;

                case "user_important":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.access = 'read_write'; 
                    data.important = 1;
                    break;

                case "manager_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "manager_close":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;
            }
            
            view_callbacks(data,'post');

        });

        $("#refresh").click(function(){
            $(".se-pre-con").show();
            $.get("<?php echo base_url(); ?>dashboard/get_live_feed_back", function(response){
                $("#live_feed_back_body").html(response);
                $(".se-pre-con").hide("slow");
            });
        });

        $("#overdue_lead_count").click(function(){
            var form = document.createElement('form');
            form.method = "POST";
            form.action = "<?php echo base_url()."dashboard/generate_report" ?>";
            
            var input = document.createElement('input');
            input.type = "text";
            input.name = "toDate";
            input.value = $(this).data('datetime');
            form.appendChild(input);

            input = document.createElement('input');
            input.type = "text";
            input.name = "reportType";
            input.value = "due";
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        });

        $('.emailSiteVisit').on('click', function(){
            $(".se-pre-con").show();
            $.ajax({
                type : 'POST',
                url : "<?= base_url('site-visit-report-mail');?>",
                data:1,
                success: function(res){
                    $(".se-pre-con").hide("slow");
                    if(res == 1)
                        alert('Email Sent Successfully.');
                    else
                        alert('Email Sent fail!');
                }
            });
        });

    });
    // $('#filter_revenue').click(get_revenues());
    function get_revenues(){
        $.get( "<?php echo base_url()."dashboard/get_revenue/" ?>"+$('#revenueMonth').val(), function( data ) {
            $('#revenue_data').html(data);
        });
    }
    function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }

</script>
</body>
</html>
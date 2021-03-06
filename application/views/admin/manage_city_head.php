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
							<!--/profile_details-->
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

<div class="container">
    <div class="page-header">
        <h1><?php echo $heading; ?></h1>
    </div>
    <form name="save_seller_form" id="save_seller_form" method="POST" enctype="multipart/form-data">
        <div class="col-sm-3 form-group">
            <label for="director">Enter First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
        </div>

        <div class="col-sm-3 form-group">
            <label for="director">Enter Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" >
        </div>

        <div class="col-sm-3 form-group">
            <label for="email">Enter Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
        </div>

        <div class="col-sm-3 form-group">
            <label for="emp_code">Enter Emp code:</label>
            <input type="text" class="form-control" onblur="code_check(this.value)" id="emp_code" name="emp_code" placeholder="Enter Employee Id" required>
        </div>
        <div class="col-sm-6 form-group">
            <label for="emp_last_name">Mobile Number:</label>
            <input type="text" class="form-control" id="emp_last_name" name="employee_mobile" placeholder="Employee Mobile Number" required="required">
        </div>
        <div class="col-sm-6 form-group">
            <label for="emp_last_name">Address:</label>
            <textarea name="employee_address"></textarea>
        </div>

        <div class="col-md-3 form-group">
            <label for="emp_code">Deprtment:</label>
            <select  class="form-control"  id="user_type" name="department" required="required" >
                <option value="">Select</option>
                <?php $all_department=$this->common_model->all_active_departments();
                foreach($all_department as $department){ ?>
                    <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                <?php }?>
            </select>
        </div>

        <div class="col-md-3 form-group">
            <label for="emp_code">City:</label>
            <select  class="form-control"  id="user_type" name="city" required="required" >
                <option value="">Select</option>
                <?php $all_city=$this->common_model->all_active_cities();
                foreach($all_city as $city){ ?>
                    <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                <?php }?>
            </select>
        </div>

        <div class="col-md-6 form-group">
            <label for="emp_code">VP:</label>
            <select  class="form-control"  id="director" name="director" required="required" >
                <option value="">Select</option>
                <?php $all_vps=$this->user_model->all_users("(type=3 AND active=1)");
                foreach($all_vps as $vp){ ?>
                    <option value="<?php echo $vp->id; ?>"><?php echo $vp->first_name." ".$vp->last_name; ?></option>
                <?php }?>
            </select>
        </div>

        <div class="col-sm-12 form-group">
            <button type="submit" style="margin-top:25px;" id="add_manager" class="btn btn-success btn-block" disabled>Add City Head</button>
        </div>
    </form>

    <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Manager Name</th>
                <th>Manager Email</th>
                <th>City</th>
                <th>Department</th>
                <th>Emp Code</th>
                <th>Reports to</th>
                <th>Date Added</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Change Password</th> 
                <th>Privilege</th>
            </tr>
        </thead> 
        <tbody>
            <?php if(isset($all_city_heads) && $all_city_heads){
                foreach($all_city_heads as $city_head){?>
                    <tr>
                        <td><?php echo $city_head->id; ?></td>
                        <td><?php echo $city_head->first_name." ".$city_head->last_name; ?></td>
                        <td><?php echo $city_head->email; ?></td>
                        <td><?php echo $city_head->city_name; ?></td>
                        <td><?php echo $city_head->department_name; ?></td>
                        <td><?php echo $city_head->emp_code; ?></td>
                        <td><?php echo $city_head->reports_to; ?></td>
                        <td><?php echo $city_head->date_added; ?></td>
                        <td align="middle"><button type="button" id="b1<?php echo $city_head->id; ?>" class="btn <?php echo $city_head->active?'btn-info':'btn-danger'; ?>" onclick="change_state(<?php echo $city_head->id; ?>)"><span id="stateus_sp_<?php echo $city_head->id; ?>"><?php echo $city_head->active?'Active':'Inactive'; ?></span></button></td>
                        <td align="middle"><button type="button" class="btn btn-info" onclick="edit_user(<?php echo $city_head->id; ?>)" data-toggle="modal" data-target="#modal_edit">Edit</button></td>
                        <td align="middle"><button type="button" class="btn btn-info" onclick="reset_password(<?php echo $city_head->id; ?>)">Reset Password</button></td>
                        <td align="middle">
                            <button type="button" class="btn btn-info" onclick="permissionModal(<?php echo $city_head->id; ?>)" data-toggle="modal" data-target="#modalPermission">Permission</button>
                        </td>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_edit" role="dialog" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit City Head</h4>
                <div class="modal-body">
                    <input type="hidden" id="hid" name="hid">
                    <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="emp_code">Employee Code:</label>
                                <input type="text" class="form-control" id="m_emp_code" name="emp_code" placeholder="Employee Code" disabled="disabled">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="emp_code">First name:</label>
                                <input type="text" class="form-control" id="m_first_name" name="m_first_name" placeholder="First name">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="emp_code">Last name:</label>
                                <input type="text" class="form-control" id="m_last_name" name="m_last_name" placeholder="Last name">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="emp_last_name">Mobile Number:</label>
                                <input type="text" class="form-control" id="m_employee_mobile" name="m_employee_mobile" placeholder="Employee Mobile Number" required="required">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="emp_last_name">Address:</label>
                                <textarea name="m_employee_address" id="m_employee_address"></textarea>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="emp_code">Email-id:</label>
                                <input type="text" class="form-control" id="m_email" name="m_email_id" placeholder="Email id">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="emp_code">VP:</label>
                                <select  class="form-control"  id="m_vp" name="manager" required="required" >
                                    <option value="">Select</option>
                                    <?php $all_vps=$this->user_model->all_users("(type=3 AND active=1)");
                                    foreach($all_vps as $vp){ ?>
                                        <option value="<?php echo $vp->id; ?>"><?php echo $vp->first_name." ".$vp->last_name; ?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="emp_code">Deprtment:</label>
                                <select  class="form-control"  id="m_dept_id" name="department" required="required" >
                                    <option value="">Select</option>
                                    <?php $all_department=$this->common_model->all_active_departments();
                                    foreach($all_department as $department){ ?>
                                        <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label for="emp_code">City:</label>
                                <select  class="form-control"  id="m_city_id" name="city" required="required" >
                                    <option value="">Select</option>
                                    <?php $all_city=$this->common_model->all_active_cities();
                                    foreach($all_city as $city){ ?>
                                        <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="emp_code">User type:</label>
                                <select  class="form-control"  id="m_select_user" name="select_user" required="required" >
                                    <option value="user">User</option>
                                    <option value="City_head">City Head</option>
                                    <option value="crm">CRM</option>
                                    <option value="manager">Manager</option>
                                    <option value="vp">VP</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="update_user()" >Submit</button>
            </div>
        </div>
    </div>
</div>


<script>
    function change_state(id){
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/change_status_user",
            data:{
                id:id
            },
            success:function(data){
                if(data.active){
                    $('#stateus_sp_'+id).text('Active');
                    $('#b1'+id).removeClass("btn-danger");
                    $('#b1'+id).addClass("btn-info");
                }else{
                    $('#stateus_sp_'+id).text('Inactive');
                    $('#b1'+id).removeClass("btn-info");
                    $('#b1'+id).addClass("btn-danger");
                }
                $(".se-pre-con").hide("slow");
            }
        });
    }

    function code_check(name){
        $('#add_manager').prop('disabled', true);
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/check_user",
            data:{
                code:name
            },
            success:function(data){
                if(data.count){
                    alert("Duplicate Code! try again");
                    $('#emp_code').val('');
                }
                else
                    $('#add_manager').prop('disabled', false);
                $(".se-pre-con").hide("slow");
            }
        });
    }

    function edit_user(v){
        $(".se-pre-con").show();
        console.log(v);
        $("#hid").val(v);
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/get_user_data",
            data:{id:v},
            success:function(data) {
                
                data = JSON.parse(data);
                var city_id=data.city_id;
                var dept_id=data.dept_id;
                var email=data.email;
                var first_name=data.first_name;
                var last_name=data.last_name;
                var reports_to=data.reports_to;
                var emp_code=data.emp_code;
                var select_user=data.select_user; 
                var mobile=data.mobile_number;
                var address=data.address;

                $("#m_emp_code").val(emp_code);
                $("#m_first_name").val(first_name);
                $("#m_last_name").val(last_name);
                $("#m_email").val(email);
                $("#m_vp").val(reports_to);
                $("#m_dept_id").val(dept_id);
                $("#m_city_id").val(city_id);
                $("#m_select_user").val(select_user); 
                $("#m_employee_address").val(address);
                $("#m_employee_mobile").val(mobile);
                $(".se-pre-con").hide("slow");
            }
        });
    }

    function reset_password(id){
        $(".se-pre-con").show();
        $.get("<?php echo base_url()?>admin/reset_password/"+id,function(response){
            $(".se-pre-con").hide("slow");
            if(response.status)
                alert("Success");
        })
    }
    
    function update_user(){
        $(".se-pre-con").show();
        
        var first_name=$("#m_first_name").val();
        var last_name=$("#m_last_name").val();
        var email=$("#m_email").val();
        var reports_to=$("#m_vp").val();
        var dept_id=$("#m_dept_id").val();
        var city_id=$("#m_city_id").val();
        var select_user=$("#m_select_user").val();

        var emp_address=$("#m_employee_address").val();
        var emp_mobile=$("#m_employee_mobile").val();
        var id=$("#hid").val(); 
            
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/update_user/"+id,
            data:{
                first_name:first_name,
                last_name:last_name,
                email:email,
                reports_to:reports_to,
                dept_id:dept_id,
                city_id:city_id,
                select_user:select_user,
                address:emp_address,
                mobile_number:emp_mobile
            },
            success:function(data) {
                data = JSON.parse(data);
                if(data.response){
                    alert("success");
                }
                location.reload();
            }
        });
    }
    
</script>
						</div><!--/tabs-->
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
					<header class="logo">
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
<!--js -->

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
   

</script>
<script>
   
    // $('#filter_revenue').click(get_revenues());
   
</script>
</body>
</html>

<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/header'); 
    $this->load->model('user_model');
   $user_ids =$this->session->userdata('user_ids');
   $user_ids =json_decode( json_encode($user_ids), true);
   $string_ids='';
   foreach ($user_ids as $id) {
    //print_r($id['id']);
    $string_ids.=$id['id'].',';
   }
   //echo $string_ids;

    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
    .alrtMsg{padding-top: 50px;}
    .alrtMsg i {
        font-size: 60px;
        color: #f1c836;
    }
    img.ribbon{
      position: fixed;
      z-index: 1;
      top: 0;
      right: 0;
      border: 0;
      cursor: pointer;
     }

  .starrr {
   display: inline-block; 
   
   }

   .starrr a {
    font-size: 16px;
    padding: 0 1px;
    cursor: pointer;
    color: #FFD119;
    text-decoration: none; 
    }

    
    </style>
    <div class="container"> 
        <div class="row"> 
            <div class="text-center alrtMsg">
                <i class="fa fa-exclamation-triangle"></i>
                <h3>You Do Not have permission as of now. Please contact your Administration and Request for Permission.</h3>
            </div>
        </div>
    </div>
    <?php
}


    ?>
<body>
     <div class="se-pre-con"></div>
   <div class="page-container" style="height: 1000px;">
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
    <style type="text/css">
        textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        resize: none;
        }

    </style>

    <!--<form name="save_seller_form" id="save_seller_form" action="<?=base_url('admin/manage_answers'); ?>" method="POST" enctype="multipart/form-data">
        <div class="col-sm-5 form-group">
            <label for="emp_code">Search:</label>
            <input type="text" class="form-control" id="answer" onblur="code_check(this.value)" name="answer" placeholder="Please enter Lead Id" required="required">
             
        </div>
 
        <div class="col-sm-5 form-group">
        <button type="submit" id="add_answer" style="margin-top: 26px; !important" class="btn btn-success btn-block">Search</button>
    </div>
    </form>-->
</div>

<div class="container">
    <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Lead Id</th>
                <th>View</th> 
                <th>Print</th> 
            </tr>
        </thead> 
        <tbody>
        <?php
      // print_r($feedbacks);die;
        foreach ($feedbacks as $f) {
            ?>
            <tr>
                <td><?=$f['lead_id'];?></td>
                <td><a href="<?=base_url('admin/view_feedback/'.$f['lead_id']);?>?id=<?=$f['fs_id']?>" target="_blank">View</a></td>
                <td><a href="#" onclick="feedback('<?=$f['lead_id'];?>','<?=$f['fs_id']?>');">Print</a></td>
            </tr>


            <?php
        }
        ?>
        <script type="text/javascript">
            function feedback(lead_id,id){ 
          //  alert(id);
            if(lead_id!=''){
                $.ajax({
                    type:"POST",
                    url: "<?=base_url('admin/print_feedback/');?>?id="+id,
                    dataType:'html',
                    data:{lead_id:lead_id},
                    success:function(data){ 
                 var printWindow = window.open('', '', 'height=500,width=800');
                 printWindow.document.write(data);
                 console.log(data);
                 printWindow.document.close();
               
                //    $('#formdata').append(data);
                   printWindow.print();
                    }
                });
               // location.reload();
            }
            else{
                $(".se-pre-con").hide("slow");
                alert("Please Enter a value");
            }
        }
        </script>
            
        </tbody>
    </table>
    <!--
    <div style="margin-top: 20px">
        <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(3)) ? $this->uri->segment(3)+1 : 1; ?> to <?= ($this->uri->segment(3)+count($all_user)); ?> of <?= $totalRecords; ?> entries</p></span>
        <ul class="pagination pull-right"><?php echo $links; ?></ul>
    </div>-->
</div>
                                    </div>
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
                                    <?php if($this->session->userdata('user_type')=='user')
                                       {?>
                                      <a href="#"><span class="name-caret">RM:</span> <?php echo $this->session->userdata('manager_name'); ?></a><br>
                                        <?php } ?>
                                    <ul>
                                    <li><a class="tooltips" href="<?= base_url('dashboard/profile'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                                        <li><a class="tooltips" href="#"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
                                        <li><a class="tooltips" href="<?php echo base_url()?>login/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
                                        </ul>
                                    </div>
                               <!--//down-->
                           <?php $this->load->view('inc/header_nav'); ?>
                           <div style="height: 100%"></div>
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
<script type="text/javascript" src="<?php echo base_url()?>assets/js/starrr.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url()?>assets/js/scripts.js"></script>


<!-- Bootstrap Core JavaScript -->
  
<script>
  $('#star1').starrr({
      change: function(e, value){
        if (value) {
          $('.your-choice-was').show();
          $('.choice').text(value);
          console.log("m in feedback submission")
        } else {
          $('.your-choice-was').hide();
        }
      }
    });
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
         
 
 
  

    }); 
   

</script> 
<!----------------------------->
    <div id="formdata"></div>
</body>
</html>
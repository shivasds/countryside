<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url()?>assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<link href="<?php echo base_url()?>assets/css/fabochart.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url()?>assets/css/dropdown.css" rel='stylesheet' type='text/css' />
<!--<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />




<script src="<?php echo base_url()?>assets/js/amcharts.js"></script>    
<script src="<?php echo base_url()?>assets/js/serial.js"></script>  
<script src="<?php echo base_url()?>assets/js/light.js"></script>   
<script src="<?php echo base_url()?>assets/js/radar.js"></script>  --> 

<!--clock init--
<script src="<?php echo base_url()?>assets/js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="<?php echo base_url()?>assets/js/skycons.js"></script>

<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

<!--//skycons-icons-->
 <link rel="stylesheet" href="https://rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/MonthPicker.min.css"/>
        
 
        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> 
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/MonthPicker.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('.datepicker').each(function(){
                    $(this).datepicker({
                        dateFormat: 'yy-mm-dd',
                        beforeShow: function() {
                            setTimeout(function(){
                                $('.ui-datepicker').css('z-index', 99999999999999);
                            }, 0);
                        }
                     });
                });
                $('#ui-datepicker-div').draggable();
                $('#c_bkngMnth, #c_estMonthofInvoice').MonthPicker({
             Button: false
                  });
                $('.timePicker').each(function(){
                    $(this).timepicker({ 'timeFormat': 'H:i' });
                });
            });
        </script>
        <style type="text/css">
    td
    {
        white-space: nowrap;
    }
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
label.m-list {
    width: 200px; 
     font-size: 12px; 
    margin: 0; 
}
label.pm-list {
    font-size: 15px;
}
</style>
 
</head> 
<div class="modal fade" id="modalPermission" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form id="privilege-frm" class="" name="" method="post">
                <div class="modal-content">
                    <div class="modal-header">                    
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Give Permission</h4> 
                    </div>
                    <div class="modal-body permission-lists">                        
                            <!-- fetch from ajax jquery -->                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success sbmt"  data-dismiss="modal">Submit</button>
                        <input type="hidden" name="userId" value="" class="userId">                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 errMsg"></div>
                    <div class="clearfix"></div>
                </div>            
            </form>
        </div>
    </div>
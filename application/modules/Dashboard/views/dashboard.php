<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <?php $this->load->view('layout/theme.php'); ?>    
      <!-- END THEME PANEL -->
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <a href="<?=base_url('Dashboard');?>">Home</a>
               <i class="fa fa-circle"></i>
            </li>
            <li>
               <span>Dashboard</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title">Dashboard
         <small>Here you can view all statistics and more.</small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
               <div class="visual">
                  <i class="fa fa-envelope"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="sms_balance">0</span>
                  </div>
                  <div class="desc"> Total SMS Balance </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
               <div class="visual">
                  <i class="fa fa-user"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="members">0</span>
                  </div>
                  <div class="desc"> Total Users </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow" href="#">
               <div class="visual">
                  <i class="fa fa-users"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="total_members">0</span>
                  </div>
                  <div class="desc"> Total Members </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
               <div class="visual">
                  <i class="fa fa-mobile"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="active_device">0</span> 
                  </div>
                  <div class="desc"> Active Device Users </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow-gold" href="#">
               <div class="visual">
                  <i class="fa fa-heart"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="total_matrimony">0</span>
                  </div>
                  <div class="desc"> Total Matrimony Profile </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 grey-mint" href="#">
               <div class="visual">
                  <i class="fa fa-briefcase"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="total_business">0</span>
                  </div>
                  <div class="desc"> Total Business Profile </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue-steel" href="#">
               <div class="visual">
                  <i class="fa fa-rupee"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="total_income" class="small">0</span> / <span id="total_expense" class="small">0</span>
                  </div>
                  <div class="desc"> Total Income / Expense </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 grey-gallery" href="#">
               <div class="visual">
                  <i class="fa fa-rupee"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="total_balance" class="small">0</span>
                  </div>
                  <div class="desc"> Total Balance </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red-haze" href="#">
               <div class="visual">
                  <i class="fa fa-ban"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="user_reject">0</span>
                  </div>
                  <div class="desc"> Total Rejected Users </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red-haze" href="#">
               <div class="visual">
                  <i class="fa fa-ban"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="family_reject">0</span>
                  </div>
                  <div class="desc"> Total Rejected Family Members </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red-haze" href="#">
               <div class="visual">
                  <i class="fa fa-ban"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="matrimony_reject">0</span>
                  </div>
                  <div class="desc"> Total Rejected Matrimony Profiles </div>
               </div>
            </a>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red-haze" href="#">
               <div class="visual">
                  <i class="fa fa-ban"></i>
               </div>
               <div class="details">
                  <div class="number">
                     <span id="business_reject">0</span>
                  </div>
                  <div class="desc"> Total Rejected Business </div>
               </div>
            </a>
         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<script type="text/javascript">

  var get_dashboard_statics = base_url+"Dashboard/get_dashboard_statics";

          $.ajax({
            type: "POST",
            url: get_dashboard_statics,
            dataType: "JSON",
            success: function (data) {
              
              $('#sms_balance').html(data.sms_balance);
              $('#members').html(data.members);
              $('#total_members').html(data.total_members);
              $('#active_device').html(data.active_device);

              $('#total_matrimony').html(data.total_matrimony);
              $('#total_business').html(data.total_business);
              $('#total_income').html(data.total_income);
              $('#total_expense').html(data.total_expense);
              $('#total_balance').html(data.total_balance);

              $('#user_reject').html(data.user_reject);
              $('#family_reject').html(data.family_reject);
              $('#matrimony_reject').html(data.matrimony_reject);
              $('#business_reject').html(data.business_reject);
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               alert('Error! Something Went Wrong'); 
            }
          });


</script>
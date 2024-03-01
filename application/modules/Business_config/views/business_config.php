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
               <a href="<?=base_url('Business_config');?>">Bussiness</a>
               <i class="fa fa-circle"></i>
            </li>
            <li>
               <span>Business Config</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"> Business Config
         <small><?=$this->lang->line('member_small_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body">
                  <ul class="nav nav-tabs">
                     <li class="active" id="tab_1_1_nav">
                        <a href="#tab_1_1" data-toggle="tab"> View Business Config
                        </a>
                     </li>
                     <li id="tab_1_2_nav">
                        <a href="#tab_1_2" data-toggle="tab"> Add/Edit Business Config
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="tab_1_1">
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-home"></i>
                                 <span class="caption-subject sbold uppercase">View Business Configuration</span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> Duration </th>
                                          <th> Price </th>
                                          <th> Action </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <!-- End: life time stats -->
                     </div>
                     <div class="tab-pane fade " id="tab_1_2">
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-edit"></i>
                                 <span class="caption-subject sbold uppercase"> Add/Edit Business Config
                                 </span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal business_config-form" id="business_config-form" 
                              method="post">
                                 <div class="form-body">
                                  <input type="hidden" name="adc_id" id="adc_id">
                                  <div class="form-group form-md-line-input">
                                     <label class="col-md-3 control-label sbold">Duration
                                     <span class="required">*</span>
                                     </label>
                                     <div class="col-md-9">
                                        <div class="input-group">
                                           <span class="input-group-addon">
                                           <i class="fa fa-calendar"></i>
                                           </span>
                                           <input type="text" class="form-control" name="duration" id="duration">
                                           <div class="form-control-focus"> </div>
                                           <span class="help-block">Enter Duration in Year</span>
                                        </div>
                                     </div>
                                  </div>

                                  <div class="form-group form-md-line-input">
                                     <label class="col-md-3 control-label sbold">Price
                                     <span class="required">*</span>
                                     </label>
                                     <div class="col-md-9">
                                        <div class="input-group">
                                           <span class="input-group-addon">
                                           <i class="fa fa-rupee"></i>
                                           </span>
                                           <input type="text" class="form-control" name="price" id="price">
                                           <div class="form-control-focus"> </div>
                                           <span class="help-block">Enter Price</span>
                                        </div>
                                     </div>
                                  </div>

                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                          <button type="button" id="submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
                                          <button onclick="jsRedirect();" type="button" class="btn default"><?=$this->lang->line('reset')?></button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                              <!-- END FORM-->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="statusform" method="post">
            <div class="modal-header bg-yellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Change Status</h6>
            </div>

            <input type="hidden" id="sp_ids" name="sp_id"/>
            <input type="hidden" id="set_as_active" name="set_as_active"/>
            
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-ban"></i>&nbsp;Are you sure you want to change status of this slider page?</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="change_status()">Change Status</button>
            </div>
        </form>
        </div>
    </div>
</div>   
</div>
<!-- END CONTENT -->
<script type = "text/javascript">
var business_form = 'business_config-form';  
var save_business_config = "<?=base_url('Business_config/save_business_config');?>";
var fetch_business_config = "<?=base_url('Business_config/fetch_business_config');?>";
var change_url = "<?=base_url('Slider_config/change_status');?>";
var fetch_single_data = "<?=base_url('Business_config/fetch_single_data');?>";

 $(document).ready(function() {
    
        dataTable = $('#dataTable').DataTable({ 
        dom: 'Bfrtip',
        lengthMenu: [[50, 100, 200, -1], [50, 100, 200, "All"]],
        buttons: [
                {
                    extend: 'pageLength',
                },
            'colvis'
        ],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": fetch_business_config,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

  });

$('#submit_btn').on('click', function (e) {
    e.preventDefault();
    if($(".business_config-form").valid())
    save_data_modal(save_business_config,business_form,'submit_btn');   
});

function set_details(id)
{
  $("#tab_1_1_nav").removeClass("active");
  $('#tab_1_2_nav').addClass('active');
  $("#tab_1_1").removeClass("active in");
  $('#tab_1_2').addClass('active in');
  
  $.ajax({
    url : fetch_single_data,
    type: "POST",
    data: { adc_id : id},
    dataType: "JSON",
    success: function(data)
    {
      $('#adc_id').val(data[0].adc_id);
      $('#duration').val(data[0].duration);
      $('#price').val(data[0].price);
    }
  });
}
</script>
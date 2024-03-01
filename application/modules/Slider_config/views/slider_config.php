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
               <a href="<?=base_url('Slider_config');?>">Slider Settings</a>
               <i class="fa fa-circle"></i>
            </li>
            <li>
               <span>Slider Config</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"> Slider Config
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
                        <a href="#tab_1_1" data-toggle="tab"> View Slider Config
                        </a>
                     </li>
                     <li id="tab_1_2_nav" style="display: none;">
                        <a href="#tab_1_2" data-toggle="tab"> Edit Slider Config
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
                                 <span class="caption-subject sbold uppercase">View Slider Configuration</span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> Slider Name </th>
                                          <th> Slider Price </th>
                                          <th> Status </th>
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
                                 <span class="caption-subject sbold uppercase"> Add Slider Config
                                 </span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal slider_config-form" id="slider_config-form" 
                              method="post">
                                 <div class="form-body">
                                  <input type="hidden" name="sp_id" id="sp_id">
                                  <div class="form-group form-md-line-input">
                                     <label class="col-md-3 control-label sbold" for="form_control_1">Slider Name
                                     <span class="required">*</span>
                                     </label>
                                     <div class="col-md-9">
                                        <div class="input-group">
                                           <span class="input-group-addon">
                                           <i class="fa fa-image"></i>
                                           </span>
                                           <input type="text" class="form-control" name="slider_name" id="slider_name" readonly="readonly">
                                           <div class="form-control-focus"> </div>
                                           <span class="help-block">Enter Slider Name</span>
                                        </div>
                                     </div>
                                  </div>

                                  <div class="form-group form-md-line-input">
                                     <label class="col-md-3 control-label sbold" for="form_control_1">Slider Price
                                     <span class="required">*</span>
                                     </label>
                                     <div class="col-md-9">
                                        <div class="input-group">
                                           <span class="input-group-addon">
                                           <i class="fa fa-rupee"></i>
                                           </span>
                                           <input type="text" class="form-control" name="slider_price" id="slider_price">
                                           <div class="form-control-focus"> </div>
                                           <span class="help-block">Enter Slider Price</span>
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
var slider_form = 'slider_config-form';  
var save_slider_config = "<?=base_url('Slider_config/save_slider_config');?>";
var fetch_slider_config = "<?=base_url('Slider_config/fetch_slider_config');?>";
var change_url = "<?=base_url('Slider_config/change_status');?>";
var fetch_single_config = "<?=base_url('Slider_config/fetch_single_config');?>";

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
            "url": fetch_slider_config,
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
    if($(".slider_config-form").valid())
    save_data(save_slider_config,slider_form,'submit_btn');   
});

function show_popup(sid,status)
{
  
  $('#sp_ids').val(sid);
  $('#set_as_active').val(status);
  $('#modal_theme_danger').modal('show');
}

function change_status()
{

     $.ajax({
        url : change_url,
        type: "POST",
        data: $('#statusform').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.update_status)
            {
                $('#modal_theme_danger').modal('hide');
                dataTable.ajax.reload();
            }
            else
            {
                $('#modal_theme_danger').modal('hide');
                dataTable.ajax.reload();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Sorry! Something went wrong'); 
        }
      });
}

function edit_details(id)
{

  $.ajax({
    url : fetch_single_config,
    type: "POST",
    data: { sp_id : id},
    dataType: "JSON",
    success: function(data)
    {
      $("#tab_1_1_nav").removeClass("active");
      $('#tab_1_2_nav').show();
      $('#tab_1_2_nav').addClass('active');
      $("#tab_1_1").removeClass("active in");
      $('#tab_1_2').addClass('active in');

      $('#sp_id').val(data[0].sp_id);
      $('#slider_name').val(data[0].slider_name);
      $('#slider_price').val(data[0].slider_price);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Sorry! Something went wrong'); 
    }
  });
}
</script>
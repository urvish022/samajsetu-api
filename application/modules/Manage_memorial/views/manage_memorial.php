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
               <a href="<?=base_url('Pending_matrimony');?>">Memorial</a>
               <i class="fa fa-circle"></i>
            </li>
            <li>
               <span>Manage Matrimony</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold">Manage Memorial
         <small><?=$this->lang->line('member_small_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body" id="blockui_sample_1_portlet_body">
                  <ul class="nav nav-tabs" id="nav">
                     <li class="active">
                        <a href="#tab_1_1" data-toggle="tab">
                        View Manage Memorial
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_2" id="tab_1_2_nav" data-toggle="tab" style="display: none;"> 
                        Edit Manage Memorial 
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="tab_1_1">
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-users"></i>
                                 <span class="caption-subject sbold uppercase">View Pending Memorial</span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" 
                                 width="100%" id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> Name </th>
                                          <th> Date </th>
                                          <th> Village </th>
                                          <th> Photo </th>
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
                     <div class="tab-pane fade" id="tab_1_2">
                        <div class="portlet light portlet-fit portlet-form">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-user-plus"></i>
                                 <span class="caption-subject sbold uppercase"> Edit Matrimony</span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal pending_memorial-form" enctype="multipart/form-data" method="post" id="pending_memorial-form">
                                <input type="hidden" name="memorial_id" id="memorial_id">

                                 <div class="form-body">
                                    <table class="table table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th> <?=$this->lang->line('village');?>  </th>
                                                        <th><?=$this->lang->line('name');?>  </th>
                                                        <th> <?=$this->lang->line('member_mobile');?>  </th>
                                                        <th> <?=$this->lang->line('photo');?>  </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <td id="td_village"></td>
                                                      <td id="td_mname"></td>
                                                      <td id="td_mobile"></td>
                                                      <td id="td_photo"></td>
                                                    </tr>
                                                </tbody>
                                    </table>
                                  
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >Name in English
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                             </span>
                                             <input type="text" class="form-control" id="full_name_eng" 
                                             name="full_name_eng" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">full name in english</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >Name in Gujarati
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                             </span>
                                             <input type="text" class="form-control" id="full_name_guj" name="full_name_guj" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">full name in gujarati</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Select Village
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select autofocus="autofocus" class="form-control select2me" name="village_id" 
                                          id="village_id" disabled="disabled">
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Dead Date<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                             </span>
                                             <input class="form-control date-picker" 
                                              id="dead_date" type="text" name="dead_date" readonly="readonly"/>
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Dead date </span>
                                          </div>
                                       </div>
                                    </div> 
                                    
                                     <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">Dead Day Name
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar-plus-o"></i>
                                             </span>
                                             <input type="text" class="form-control" id="dead_day_name" 
                                             name="dead_day_name" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Dead Day Name</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Memorial Date 1<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                             </span>
                                             <input class="form-control date-picker" 
                                              id="memorial_date" type="text" name="memorial_date" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Memorial date 1</span>
                                          </div>
                                       </div>
                                    </div>   

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">Memorial Day 1
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar-plus-o"></i>
                                             </span>
                                             <input type="text" class="form-control" id="memorial_day_name" 
                                             name="memorial_day_name" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Memorial Day 1</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">Memorial Time 1
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                             </span>
                                             <input type="text" class="form-control" id="memorial_time" 
                                             name="memorial_time" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Memorial Time 1</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Address1
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                             <textarea class="form-control" rows="6" id="memorial_place" readonly="readonly"></textarea>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Memorial Date 2<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                             </span>
                                             <input class="form-control date-picker" 
                                              id="memorial_date1" type="text" name="memorial_date1" readonly="readonly"/>
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Memorial date 2</span>
                                          </div>
                                       </div>
                                    </div>   

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">Memorial Day 2
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar-plus-o"></i>
                                             </span>
                                             <input type="text" class="form-control" id="memorial_day_name1" 
                                             name="memorial_day_name1" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Memorial Day 2</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">Memorial Time 2
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                             </span>
                                             <input type="text" class="form-control" id="memorial_time1" 
                                             name="memorial_time1" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Memorial Time 2</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Address2
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <textarea class="form-control" rows="6" id="memorial_place1" readonly="readonly"> 
                                          </textarea>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Family Details
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                             <textarea class="form-control" rows="6" id="memorial_from" readonly="readonly"></textarea>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input last">
                                       <label class="control-label col-md-3 sbold">
                                       Photo
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                             <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                                <img id="img_preview" src="<?=MEMORIAL_PHOTO?>/no_memorial.jpg" alt="No Image" /> 
                                             </div>
                                             <div class="fileinput-preview fileinput-exists thumbnail" 
                                             style="max-width: 135px; max-height: 135px;"> 
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>     

                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Full Message</label>
                                       <div class="col-md-9">
                                          <textarea class="ckeditor form-control" id="memorial_fulltext" disabled="disabled">
                                          </textarea>
                                       </div>
                                    </div>                               
                                    
                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                        <button type="button" onclick="back_tab_view('tab_1_1','pending_memorial-form')" class="btn default">
                                          <i class="fa fa-long-arrow-left"></i>&nbsp;Back</button>
                                          <button type="button" style="display: none;" id="approve_btn" class="btn green">
                                            <i class="fa fa-check"></i>&nbsp;Approve</button>
                                          <button type="button" style="display: none;" id="reject_btn" class="btn red">
                                            <i class="fa fa-times"></i>&nbsp;Reject</button>
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
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" id="crop_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Image preview</h4>
        </div>
        <div class="modal-body">
          <img src="" id="cropimagepreview" style="width: 250px;height: 250px;">
          <input type="hidden" name="mem_crop_id" id="mem_crop_id">
          <input type="hidden" id="x" name="x" />
          <input type="hidden" id="y" name="y" />
          <input type="hidden" id="w" name="w" />
          <input type="hidden" id="h" name="h" />
          
          <div class="modal-footer">
            <input type="button" class="btn btn-success" name="crop_btn" title="Crop Image" value="Crop Image" id="crop_btn">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </form>
    </div>
</div>

<div id="modal_theme_approve" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-green">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Approve</h6>
            </div>
            <form id="approve_form" method="post" name="approve_form">
              <input type="hidden" name="memorial_id" id="approve_memorial_id">
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-check"></i>&nbsp;Are you sure you want to approve this post?</h6>
            </div>
          </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="approve_account()">Approve
                </button>
            </div>
        
        </div>
    </div>
</div>  
<div id="modal_theme_reject" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-red">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Reject</h6>
            </div>
            <form id="reject_form" method="post" name="reject_form">
              <input type="hidden" name="memorial_id" id="reject_memorial_id">
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-times"></i>&nbsp;Are you sure do you want to reject this account?</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="reject_account()">Reject
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_theme_delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-red">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Delete</h6>
            </div>
            <form id="delete_form" method="post" name="delete_form">
              <input type="hidden" name="memorial_id" id="delete_memorial_id">
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-trash"></i>&nbsp;Are you sure do you want to delete this data?</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="delete_account()">Delete
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- END CONTENT -->
<script type="text/javascript">
var approve_url = "<?=base_url('Manage_memorial/approve_memorial')?>";
var reject_url = '<?=base_url('Manage_memorial/reject_memorial')?>';
var delete_url = "<?=base_url('Manage_memorial/delete_memorial')?>";
var view_datatable_url = "<?=base_url('Manage_memorial/view_datatable_memorial')?>";     
var get_memorial_data = "<?=base_url('Manage_memorial/get_memorial_data')?>";
var crop_image_url = "<?=base_url('Pending_memorial/crop_photo')?>";
var dataTable;

$(document).ready(function() {
    get_gujvillage_list();
    get_countries_list();
    matrimony_tbl();
});

CKEDITOR.config.toolbar = [
   ['Styles','Format','Font','FontSize'],
   '/',
   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste'],
   '/',
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Link']
];

CKEDITOR.config.height = 800;

$('#approve_btn').click(function(e) {
  var my_memorial_id = document.getElementById("memorial_id").value;
  $('#approve_memorial_id').val(my_memorial_id);
  $('#modal_theme_approve').modal('show');
});

$('#reject_btn').click(function(e) {
  var my_memorial_id = document.getElementById("memorial_id").value;
  $('#reject_memorial_id').val(my_memorial_id);
  $('#modal_theme_reject').modal('show');
});

function set_modal_image(id,photo)
{
    $('#cropimagepreview').attr('src', photo); 
    $('#mem_crop_id').val(id);
    $('#imagemodal').modal('show');
    //return false;
}

$('#crop_btn').click(function(e) {  
  if(parseInt($('#x').val()=='')) 
    alert('Please select a crop region then press upload.');
  else
  {
    $.ajax({
      url : crop_image_url,
      type: "POST",
      data: $('#crop_form').serialize(),
      dataType: "JSON",
      success: function(data)
      {
          if(data.update_status)
          {
            $('#imagemodal').modal('hide');      
            document.location.reload(true);
          }
          else
          {
             alert('Error!Image cant crop successfully');  
          }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
         $('#imagemodal').modal('hide');
         alert('Error! Something Went Wrong'); 
      }
    });
  }           
});

function delete_details(id)
{
  $('#delete_memorial_id').val(id);
  $('#modal_theme_delete').modal('show');
}

function approve_account()
{
 $.ajax({
    url : approve_url,
    type: "POST",
    data: $('#approve_form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      $('#modal_theme_approve').modal('hide');
      if(data.reject_status)
        reject_modal();
      else
        reject_fail_modal();
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
  });
}

function reject_account()
{
 $.ajax({
    url : reject_url,
    type: "POST",
    data: $('#reject_form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      $('#modal_theme_reject').modal('hide');
      if(data.reject_status)
        reject_modal();
      else
        reject_fail_modal();
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
  });
}

function delete_account()
{
  $.ajax({
    url : delete_url,
    type: "POST",
    data: $('#delete_form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      $('#modal_theme_delete').modal('hide');
      if(data.delete_status)
        delete_modal();
      else
        fail_delete_modal();
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
  });
}

function set_details(id)
{
  $('#tab_1_2_nav').show();
  $('#nav a[href="#tab_1_2"]').tab('show');

  $.ajax({
    url : get_memorial_data,
    type: "POST",
    data: { memorial_id : id},
    dataType: "JSON",
    success: function(data)
    {
      if(data[0].mem_active_flag == 0)
        $('#approve_btn').show();  
      else
        $('#reject_btn').show();

       $('#memorial_id').val(id); 

       $('#td_village').html(data[2].eng_name);
       $('#td_mname').html(data[1].full_name_eng);
       $('#td_mobile').html(data[1].mobile_no);
       $('#td_photo').html('<img src="<?=ASSET_USER_PHOTO?>'+data[1].photo+'" height="100" width="100">');

       $('#village_id').width("100%");
       $('#village_id').select2().select2('val',data[0].village_id);
       $('#village_id').val(data[0].village_id).trigger('change');
       var guj_village = $("#village_id :selected").text();

       var dead_date = customjs_date(data[0].dead_date);
       $("#dead_date").datepicker("update",dead_date);

       $('#full_name_eng').val(data[0].full_name_eng);
       $('#full_name_guj').val(data[0].full_name_guj);      
       $('#dead_day_name').val(data[0].dead_day_name);
       $('#memorial_from').val(data[0].memorial_from);

       var memorial_date = customjs_date(data[0].memorial_date);
       $("#memorial_date").datepicker("update",memorial_date);

       $('#memorial_day_name').val(data[0].memorial_day_name);
       $('#memorial_time').val(data[0].memorial_time);
       $('#memorial_place').val(data[0].memorial_place);

       CKEDITOR.instances['memorial_fulltext'].setData(data[0].memorial_fulltext); 

       if(data[0].photo != 'no_memorial.jpg') 
       {
        $("#img_preview").attr("src","<?=MEMORIAL_PHOTO?>"+data[0].photo);
       }

       if(data[0].memorial_date1!=null)
       {
        var memorial_date1 = customjs_date(data[0].memorial_date1);
        $("#memorial_date1").datepicker("update",memorial_date1); 
        $('#memorial_day_name1').val(data[0].memorial_day_name1);
        $('#memorial_time1').val(data[0].memorial_time1);
        $('#memorial_place1').val(data[0].memorial_place1);
       }
       
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
  });
}

function matrimony_tbl()
{
  dataTable = $('#dataTable').DataTable({ 
        dom: 'Bfrtip',
        lengthMenu: [[100, 500, 1000, -1], [100, 500, 1000, "All"]],
        buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6]
                    }
                },
                {
                    extend : 'excelHtml5',
                    exportOptions:{
                        columns: [0,1,2,3,4,5,6]
                    }
                },
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
            "url": view_datatable_url,
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
    
}
</script>                
             
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
               <a href="<?=base_url('Dashboard');?>"><?=$this->lang->line('dashboard_ttl');?></a>
               <i class="fa fa-circle"></i>
            </li>
            <li>
               <span>Pending families</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold">Pending families
         <small>Here you can approve, reject member's family.</small>
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
                        View Pending Family
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_2" id="tab_1_2_nav" data-toggle="tab" style="display: none;"> 
                        Edit Pending Family 
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
                                 <span class="caption-subject sbold uppercase">View Pending Family</span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
                                  id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> Village </th>
                                          <th> Main Member </th>
                                          <th> Relation </th>
                                          <th> Family Member </th>
                                          <th> Photo </th>                                          
                                          <th> Mobile </th>
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
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-user-plus"></i>
                                 <span class="caption-subject sbold uppercase"> <?=$this->lang->line('add_members');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal pending_family-form" enctype="multipart/form-data" 
                              method="post" id="pending_family-form">
                                <input type="hidden" name="family_id" id="family_id">
                                 <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                       <button class="close" data-close="alert"></button> <?=$this->lang->line('form_error');?>
                                    </div>
                                    <table class="table table-bordered table-hover" width="100%">
                                            <thead>
                                                <tr>
                                                    <th> Village </th>
                                                    <th> Main Member Name </th>
                                                    <th> Mobile </th>
                                                    <th> Photo </th>
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
                                       <label class="col-md-3 control-label sbold" for="form_control_1">Member Name in English
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="ffull_name_eng" 
                                             autofocus="autofocus" name="ffull_name_eng">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member full name in english</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">Member Name in Gujarati
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="ffull_name_guj" name="ffull_name_guj">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member full name in gujarati</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Relation
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select autofocus="autofocus" class="form-control select2me" name="relation_id" id="relation_id">
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Birth Date<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar sbold"></i>
                                             </span>
                                             <input class="form-control date-picker" 
                                              id="fbirth_date" type="text" name="fbirth_date" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Member's birth date </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Married Status
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select class="form-control select2me" name="fmarried_status" 
                                             data-placeholder="Select" id="fmarried_status">
                                             <option value=""></option>
                                             <option value="Single">Single</option>
                                             <option value="Married">Married</option>
                                             <option value="Widow">Widow</option>
                                             <option value="Divorced">Divorced</option>
                                          </select>
                                          <div class="form-control-focus"> </div>
                                          <span class="help-block"></span>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Blood Group
                                       </label>
                                       <div class="col-md-9">
                                          <select class="form-control select2me" name="fblood_grp" 
                                          data-placeholder="Select" id="fblood_grp">
                                            <option value=""></option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                          </select>
                                          <div class="form-control-focus"> </div>
                                          <span class="help-block"></span>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Mosad
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-home sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="fmosad" name="fmosad">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member mosad</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Piyar
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-home sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="fpiyar" name="fpiyar">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member's piyar</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Education
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-book sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="feducation" name="feducation">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Education</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Occupation
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-briefcase sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="foccupation" 
                                             name="foccupation">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Occupation</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Mobile Number
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <a id="tel"><i class="fa fa-phone sbold"></i></a>
                                             </span>
                                             <input type="text" class="form-control" id="fmobile_no" name="fmobile_no">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member mobile number</span>
                                          </div>
                                       </div>
                                    </div>
                                     <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Email Id
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <a id="mail"><i class="fa fa-envelope sbold"></i></a>
                                             </span>
                                             <input type="text" class="form-control" id="femail_id" name="femail_id">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member email id</span>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       City Name
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-building sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="fcity_name" name="fcity_name">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member city name</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Country
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select autofocus="autofocus" class="form-control select2me" name="country_id" id="country_id">
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">
                                       Business Address
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                             <textarea class="form-control" rows="6" id="fbussiness_address">
                                             </textarea>
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
                                                <img id="img_preview" src="<?=ASSET_USER_PHOTO?>no_user.jpg" alt="No Image" /> 
                                             </div>
                                             <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 135px; max-height: 135px;"> </div>
                                             <div class="upload_custom">
                                                
                                                <input type="hidden" name="image_angle" id="image_angle">
                                                <input type="hidden" name="path" id="path">
                                                <input type="hidden" name="old_photo" id="old_photo">
                                                </span>
                                                <a href="#modal_theme_danger" data-toggle="modal" class="btn red remove_img" style="display: none;"> Remove </a>
                                                <input type="button" id="0angle" class="btn" value="0" onClick="rotateImage(this.value);" style="display: none;"/>
                                                <input type="button" id="90angle" class="btn" value="90" onClick="rotateImage(this.value);" style="display: none;"/>
                                                <input type="button" id="180angle" class="btn" value="180" onClick="rotateImage(this.value);" style="display: none;"/>
                                                <input type="button" id="270angle" class="btn" value="270" onClick="rotateImage(this.value);" style="display: none;"/>
                                             </div>
                                             
                                          </div>
                                          
                                       </div>
                                    </div>                                   
                                    
                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                        <button type="button" onclick="back_tab_view('tab_1_1','pending_users-form')" class="btn default">
                                          <i class="fa fa-long-arrow-left"></i>&nbsp;Back</button>
                                          <button type="button" id="approve_btn" class="btn green">
                                            <i class="fa fa-check"></i>&nbsp;Approve</button>
                                          <button type="button" href="#modal_theme_reject" data-toggle="modal" id="reject_btn" class="btn red">
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
      <div id="throbber" style="display:none;">
        <img src="<?=ASSETS_PATH?>global/img/loading-spinner-default.gif" />&nbsp;Please wait! Sending Details...
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
          <input type="hidden" name="fam_crop_id" id="fam_crop_id">
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

<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-red">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Delete</h6>
            </div>
            
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-trash"></i>&nbsp;Are you sure you want to delete this photo?</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="remove_image()">Remove Photo
                </button>
            </div>
        
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
            <form method="post" id="delete_form" name="delete_form">
               <input type="hidden" name="family_id" id="delete_family_id">
               <div class="modal-body">
                  <h6 class="text-semibold"><i class="fa fa-trash"></i>&nbsp;Are you sure you want to delete this account?</h6>
               </div>
            </form>
            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-danger" onclick="delete_account()">Delete Account
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
              <input type="hidden" name="family_id" id="reject_family_id">
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-times"></i>&nbsp;Are you sure do you want to reject this account?</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="reject_account()">Reject Account
                </button>
            </div>
            </form>
        </div>
    </div>
</div>   
</div>
<!-- END CONTENT -->
<script type="text/javascript">
var member_approve_url = "<?=base_url('Pending_family/approve_member')?>";
var reject_url = '<?=base_url('Pending_family/reject_family')?>';
var view_members_url = "<?=base_url('Pending_family/view_family_table')?>";     
var fetch_url = "<?=base_url('Pending_family/get_family_data')?>";
var delete_url = '<?=base_url('Pending_family/delete_family')?>';
var crop_image_url = "<?=base_url('Pending_family/crop_photo')?>";
var dataTable;

$(document).ready(function() {
    
    get_relation_list();
    get_countries_list();
    member_details_tbl();

});

$('#approve_btn').click(function(e) {
  e.preventDefault();
  if ($('.pending_family-form').valid()) 
      aprove_member();
  });

function aprove_member()
{
    $('#approve_btn').text('Saving...'); //change button text
    $('#approve_btn').attr('disabled',true);

    $.blockUI({ message: $('#throbber'),target: '#blockui_sample_1_portlet_body' });
    var data = new FormData($('#pending_family-form')[0]);
    data.append('fbussiness_address', $('#fbussiness_address').val());

    $.ajax({
      url : member_approve_url,
      method: "POST",
      dataType: "JSON",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        $.unblockUI();
        if(data.insert_status == true)
          success_modal();
        else
          fail_modal();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        $.unblockUI();
        alert('Error! Something Went Wrong'); 
      }
    });
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
  $('#delete_family_id').val(id);

  $('#modal_theme_delete').modal('show');

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
       $('#modal_theme_delete').modal('hide');
       alert('Error! Something Went Wrong'); 
    }
  });
}

function rotateImage(degree)
{
  $('#image_angle').val(degree);
  $('#img_preview').animate({  transform: degree }, {
    step: function(now,fx) {
      
        $(this).css({
            '-webkit-transform':'rotate('+degree+'deg)', 
            '-moz-transform':'rotate('+degree+'deg)',
            'transform':'rotate('+degree+'deg)'
        });
    }
    });
}

function remove_image()
{
  $('#modal_theme_danger').modal('hide');
  $('.remove_img').hide();
  $('#0angle').hide();
  $('#90angle').hide();
  $('#180angle').hide();
  $('#270angle').hide();
  $('#path').val('true');
  $("#img_preview").attr("src",<?=ASSET_USER_PHOTO?>+"no_user.jpg");
}

function set_modal_image(id,photo)
{
    $('#cropimagepreview').attr('src', photo); 
    $('#fam_crop_id').val(id);
    $('#imagemodal').modal('show');
    //return false;
}

function reject_account()
{
 var my_family_id = document.getElementById("family_id").value;
 $('#reject_family_id').val(my_family_id);

 $.ajax({
    url : reject_url,
    type: "POST",
    data: $('#reject_form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      if(data.reject_status)
      {
        $('#modal_theme_reject').modal('hide');
        reject_modal();
      }
      else
      {
        $('#modal_theme_reject').modal('hide');
        reject_fail_modal();
      }
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
    url : fetch_url,
    type: "POST",
    data: { family_id : id},
    dataType: "JSON",
    success: function(data)
    {
       $('#family_id').val(id); 
       $('#td_village').html(data[1].eng_name);
       $('#td_mname').html(data[1].full_name_eng);
       $('#td_mobile').html(data[1].mobile);
       $("#tel").attr("href", "tel:"+data[0].mobile);
       $('#td_photo').html('<img src="<?=ASSET_USER_PHOTO?>'+data[1].photo+'" height="100" width="100">');

       $('#fcity_name').val(data[0].fcity_name);
       $('#ffull_name_eng').val(data[0].ffull_name_eng);
       $('#ffull_name_guj').val(data[0].ffull_name_guj);
       
       $('#fmarried_status').val(data[0].fmarried_status).trigger('change');

       $('#fmosad').val(data[0].fmosad);
       $('#fpiyar').val(data[0].fpiyar);
       $('#feducation').val(data[0].feducation);
       $('#foccupation').val(data[0].foccupation);
       
       if(data[0].fphoto != 'no_user.jpg') 
       {
        $('.remove_img').show();
        $('#0angle').show();
        $('#90angle').show();
        $('#180angle').show();
        $('#270angle').show();
        $("#img_preview").attr("src","<?=ASSET_USER_PHOTO?>"+data[0].fphoto);
        $('#old_photo').val(data[0].fphoto);
       }
       else
          $('.remove_img').hide();
       
         $('#fblood_grp').val(data[0].fblood_grp).trigger('change');

         $('#relation_id').width("100%");
         $('#relation_id').select2().select2('val',data[0].relation_id);
         $('#relation_id').val(data[0].relation_id).trigger('change');
         
         $('#country_id').width("100%");
         $('#country_id').select2().select2('val',data[0].country_id);
         $('#country_id').val(data[0].country_id).trigger('change');

        var bdte = js_date(data[0].fbirth_date);
       
        $(".date-picker").datepicker("update",bdte);
        $('#fmobile_no').val(data[0].fmobile_no);
        $('#femail_id').val(data[0].femail_id);
        $("#mail").attr("href", "mailto:"+data[0].femail_id);
        $('#fbussiness_address').val(data[0].fbussiness_address);

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
  });
}

function member_details_tbl()
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
            "url": view_members_url,
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
             
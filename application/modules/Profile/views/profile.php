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
               <a href="<?=base_url('change_owner');?>"><?=$this->lang->line('profile_ttl');?></a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span><?=$this->lang->line('update_profile');?></span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"> <?=$this->lang->line('update_profile');?>
         <small><?=$this->lang->line('member_small_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body">
                  <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-user-plus"></i>
                                 <span class="caption-subject sbold uppercase"> <?=$this->lang->line('update_profile');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal" id="profile-form" method="POST">
                                 <div class="form-body">
                                    <input type="hidden" name="admin_id" 
                                    value="<?=$this->session->userdata('admin_id');?>">
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('fullname');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" value="<?=$this->session->userdata('admin_fullname');?>" autofocus="autofocus" name="admin_fullname">
                                             <div class="form-control-focus"> </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('username');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" value="<?=$this->session->userdata('admin_username');?>" name="admin_username">
                                             <div class="form-control-focus"> </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('password');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-lock sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" name="admin_password">
                                             <div class="form-control-focus"> </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input last">
                                                    <label class="control-label col-md-3 sbold">
                                                      Profile Photo
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
                                                                <img id="img_preview" 
                                                                src="<?php if($this->session->userdata('admin_img')) 
                                                                {
                                                                echo ASSETS_PATH."images/".$this->session->userdata('admin_img'); }
                                                                else {echo ASSETS_PATH."images/no_img.png";} ?>" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                            <div>
                                                              <div class="custom_hide">
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    
                                                                    <input type="file" name="admin_img"
                                                                     id="admin_img" accept="image/jpg, image/jpeg, image/png"> 
                                                                     <input type="hidden" name="remove_photo" id="remove_photo">
                                                                   </span>
                                                                   <?php
                                                                   if($this->session->userdata('admin_img') != 'no_user.jpg')
                                                                   {
                                                                   ?>
                                                                <a href="#modal_theme_danger" data-toggle="modal" href="javascript:;" class="btn red remove_image" data-dismiss="fileinput"> Remove </a>
                                                              <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">NOTE!</span> Image must in .PNG File. </div>
                                                    </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('email');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-envelope sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" value="<?=$this->session->userdata('admin_email');?>" name="admin_email">
                                             <div class="form-control-focus"> </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('mobile');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-phone sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" value="<?=$this->session->userdata('admin_mobile');?>" name="admin_mobile">
                                             <div class="form-control-focus"> </div>
                                          </div>
                                       </div>
                                    </div>
                                    
                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                          <button type="button" onclick="edit_profile();" id="submit_btn" class="btn green">Update Profile</button>
                                          
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
   <!-- END CONTENT BODY -->
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
</div>
<!-- END CONTENT -->
<script type="text/javascript">
var update_profile_url = "<?=base_url('Profile/edit_profile')?>";  
var admin_img_name = "<?=$this->session->userdata('admin_img')?>";
var sucess_url = "<?=base_url('Logout');?>";

function remove_image()
{
  $('#modal_theme_danger').modal('hide');
  $('.custom_hide').hide();
  if(admin_img_name != 'no_user.jpg')
  {
    $('#remove_photo').val(admin_img_name);  
  }
  $("#img_preview").attr("src",upload_url+"no_user.jpg");
}

$("#admin_img").change(function() {
       readImgURL(this);
});

function edit_profile()
{
    $('#submit_btn').text('Saving...'); //change button text
    $('#submit_btn').attr('disabled',true);   

    $.ajax({
      url : update_profile_url,
      method: "POST",
      dataType: "JSON",
      data: new FormData($('#profile-form')[0]),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        if(data.update_status)
        {
          window.location.href = sucess_url;

        }
        else
        {
            swal({
              title: "Fail",
              text: "Profile could not be update!",
              type: "warning"
          }, function() {
             location.reload();
          });
        }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error! Something Went Wrong'); 
      }
    });
}

</script>
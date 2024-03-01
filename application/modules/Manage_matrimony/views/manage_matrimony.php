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
               <a href="<?=base_url('Dashboard');?>">Dashboard</a>
               <i class="fa fa-circle"></i>
            </li>
            <li>
               <span>Manage Matrimony</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold">Manage Matrimony
         <small>Here you can edit and view matrimony profiles.</small>
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
                        View Manage Matrimony
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_2" id="tab_1_2_nav" data-toggle="tab" style="display: none;"> 
                        Manage Matrimony 
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="tab_1_1">
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-heart"></i>
                                 <span class="caption-subject sbold uppercase">Manage Matrimony</span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
                                  id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> Name </th>
                                          <th> Gender </th>
                                          <th> Birthdate </th>
                                          <th> Village </th>
                                          <th> Country </th>
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
                                 <i class="fa fa-eye"></i>
                                 <span class="caption-subject sbold uppercase"> View Matrimony Details</span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <table class="table table-bordered table-hover" width="100%">

                                            <thead>

                                                <tr>

                                                    <th> Village </th>

                                                    <th> Member name </th>

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

                              <form class="form-horizontal pending_matrimony-form" id="pending_matrimony-form">
                                 <div class="form-body">
                                    <input type="hidden" name="matrimony_id" id="matrimony_id">
                                  
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
                                             autofocus="autofocus" name="full_name_eng" >
                                             
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
                                             <input type="text" class="form-control" id="full_name_guj" name="full_name_guj" >
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Select Village
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select class="form-control select2me" name="village_id" id="village_id" >
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Mosad
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-home"></i>
                                             </span>
                                             <input type="text" class="form-control" id="mosad" name="mosad" >
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Sakh
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-tree"></i>
                                             </span>
                                             <input type="text" class="form-control" id="sakh" name="sakh" >
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-radios">
                                       <label class="control-label col-md-3 sbold">Gender
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                        <div class="md-radio-inline">
                                          <div class="md-radio">
                                            <input type="radio" id="male" class="md-radiobtn" name="gender" value="Male" >
                                            <label for="male">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Male </label>
                                        </div>
                                        <div class="md-radio">
                                          <input type="radio" id="female" class="md-radiobtn" name="gender" value="Female" >
                                            <label for="female" >
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Female </label>
                                          </div>
                                          
                                          <div class="form-control-focus"> </div>
                                          <span class="help-block"></span>
                                          </div>
                                       </div>
                                    </div>
                                   <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Birth Date<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                             </span>
                                             <input class="form-control date-picker" 
                                              id="birth_date" type="text" name="birth_date"  />
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Height
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="height" name="height" >
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Weight
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                             </span>
                                             <input type="text" class="form-control" id="weight" name="weight" >
                                             
                                          </div>
                                       </div>
                                    </div>                                    
                                    
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Maritual Status<span class="required">*</span></label>
                                      <div class="col-md-9">
                                          <select class="form-control select2me" name="maritual_status" 
                                             data-placeholder="Select" id="maritual_status">
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
                                       <label class="control-label col-md-3 sbold">Education<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-mortar-board"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="education" type="text" name="education"  />
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Occupation<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-briefcase"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="occupation" type="text" name="occupation"  />
                                             
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Select Country
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select autofocus="autofocus" class="form-control select2me" name="country_id" id="country_id" >
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Address
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                             <textarea class="form-control" rows="6" id="address" ></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Land<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-tree"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="land" type="text" name="land" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Land </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Mother Name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="mother_name" type="text" name="mother_name" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Mother Name </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Mosad Sakh<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-tree"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="mosad_sakh" type="text" name="mosad_sakh" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Mosad Sakh </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Father Occupation<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-briefcase"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="father_occupation" type="text" name="father_occupation" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Father Occupation </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Mother Occupation<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-briefcase"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="mother_occupation" type="text" name="mother_occupation" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Mother Occupation </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Brothers<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="brother" type="text" name="brother" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Brothers </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Sisters<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="sister" type="text" name="sister" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Sisters </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Annual Income<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-rupee"></i>
                                             </span>
                                             <input class="form-control" 
                                              id="income" type="text" name="income" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Annual Income </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Father Mobile<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <a id="tel"><i class="fa fa-phone"></i></a>
                                             </span>
                                             <input class="form-control" 
                                              id="father_mobile" type="text" name="father_mobile" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Father Mobile </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Candidate Mobile<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <a id="ctel"><i class="fa fa-phone"></i></a>
                                             </span>
                                             <input class="form-control" 
                                              id="mobile_no" type="text" name="mobile_no" />
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> Candidate Mobile </span>
                                          </div>
                                       </div>
                                    </div>
                                     <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" >
                                       Extra Details
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                             <textarea class="form-control" rows="6" id="extra_details"></textarea>
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
                                                <img id="img_preview" src="<?=ASSETS_PATH?>images/no_user.jpg" alt="No Image" /> 
                                             </div>
                                             <div class="fileinput-preview fileinput-exists thumbnail" 
                                             style="max-width: 135px; max-height: 135px;"> 
                                             </div>
                                             
                                          </div>
                                       </div>
                                    </div>                                   
                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                        <button type="button" onclick="back_tab_view('tab_1_1','pending_matrimony-form')" class="btn default">
                                          <i class="fa fa-long-arrow-left"></i>&nbsp;Back</button>
                                        <button type="button" style="display: none;" id="update_btn" 
                                        class="btn green">
                                            <i class="fa fa-check"></i>&nbsp;Update</button>
                                          <button type="button" style="display: none;" id="approve_btn" href="#modal_theme_approve" data-toggle="modal" class="btn green">
                                            <i class="fa fa-check"></i>&nbsp;Approve</button>
                                          <button type="button" style="display: none;" href="#modal_theme_reject" data-toggle="modal" id="reject_btn" class="btn red">
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
          <input type="hidden" name="mat_crop_id" id="mat_crop_id">
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
              <input type="hidden" name="matrimony_id" id="approve_matrimony_id">
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-check"></i>&nbsp;Are you sure you want to approve this account?</h6>
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
              <input type="hidden" name="matrimony_id" id="reject_matrimony_id">
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
              <input type="hidden" name="matrimony_id" id="delete_matrimony_id">
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-trash"></i>&nbsp;Are you sure do you want to delete this post?</h6>
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
var reject_url = '<?=base_url('Pending_matrimony/reject_member')?>';
var approve_url = '<?=base_url('Manage_matrimony/approve_matrimony')?>';
var delete_url = '<?=base_url('Pending_matrimony/delete_matrimony')?>';
var view_datatable_url = "<?=base_url('Manage_matrimony/view_datatable_matrimony')?>";     
var get_matrimony_data = "<?=base_url('Manage_matrimony/get_matrimony_data')?>";
var update_url = "<?=base_url('Manage_matrimony/update_matrimony')?>";
var crop_image_url = "<?=base_url('Pending_matrimony/crop_photo')?>";
var dataTable;

$(document).ready(function() {
    get_villages_list();
    get_countries_list();
    matrimony_tbl();
});

function set_modal_image(id,photo)
{
    $('#cropimagepreview').attr('src', photo); 
    $('#mat_crop_id').val(id);
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
  $('#delete_matrimony_id').val(id);
  $('#modal_theme_delete').modal('show');
}

$('#update_btn').click(function(e) {
      update_account();
  });

function approve_account()
{
 var my_member_id = document.getElementById("matrimony_id").value;
 $('#approve_matrimony_id').val(my_member_id);

 $.ajax({
    url : approve_url,
    type: "POST",
    data: $('#approve_form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      $('#modal_theme_approve').modal('hide');
      if(data.reject_status)
        approve_modal();
      else
        approve_fail_modal();
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

function reject_account()
{
 var my_member_id = document.getElementById("matrimony_id").value;
 $('#reject_matrimony_id').val(my_member_id);

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

function view_details(id,val)
{
  $('#tab_1_2_nav').show();
  $('#nav a[href="#tab_1_2"]').tab('show');

  if(val == "edit")
  {
    $.ajax({
    url : get_matrimony_data,
    type: "POST",
    data: { matrimony_id : id},
    dataType: "JSON",
    success: function(data)
    {

      if(data[0].met_active_flag == 0)
      {
        $('#approve_btn').show();  
      }
      else
      {
        $('#update_btn').show();
        $('#reject_btn').show();
      }
       $('#td_village').html(data[1].eng_name);

       $('#td_mname').html(data[1].full_name_eng);

       $('#td_mobile').html(data[1].mobile);

       $('#td_photo').html('<img src="<?=ASSET_USER_PHOTO?>'+data[1].photo+'" height="100" width="100">');

       $('#matrimony_id').val(id); 
       $('#full_name_eng').val(data[0].full_name_eng);
       $('#full_name_guj').val(data[0].full_name_guj);
       $('#sakh').val(data[0].sakh);
       $('#education').val(data[0].education);
       $('#height').val(data[0].height);
       $('#weight').val(data[0].weight);
       $('#mosad').val(data[0].mosad);
       $('#occupation').val(data[0].occupation);
       $('#address').val(data[0].address);
       $('#extra_details').val(data[0].extra_details);

       $('#land').val(data[0].land);
       $('#mother_name').val(data[0].mother_name);
       $('#mosad_sakh').val(data[0].mosad_sakh);
       $('#father_occupation').val(data[0].father_occupation);
       $('#mother_occupation').val(data[0].mother_occupation);
       $('#brother').val(data[0].brother);
       $('#sister').val(data[0].sister);
       $('#income').val(data[0].income);
       $('#father_mobile').val(data[0].father_mobile);
       $('#mobile_no').val(data[0].mobile_no);
       $("#tel").attr("href", "tel:"+data[0].father_mobile);
       $("#ctel").attr("href", "tel:"+data[0].mobile_no);

       $('#maritual_status').val(data[0].maritual_status).trigger('change');

       if(data[0].gender == "Male")
        $('#male').prop("checked",true);
       else
        $('#female').prop("checked",true);

       $("#img_preview").attr("src","<?=MATRIMONY_PHOTO?>"+data[0].photo);

       
       $('#village_id').width("100%");
       $('#village_id').select2().select2('val',data[0].village_id);
       $('#village_id').val(data[0].village_id).trigger('change');
       $('#country_id').width("100%");
       $('#country_id').select2().select2('val',data[0].country_id);

       var bdte = js_date(data[0].birth_date);
       $(".date-picker").datepicker("update",bdte);

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
    });
  }
  else
  {
    $('#pending_matrimony-form :input').attr('readonly','readonly');

    $.ajax({
    url : get_matrimony_data,
    type: "POST",
    data: { matrimony_id : id},
    dataType: "JSON",
    success: function(data)
    {
      $('#td_village').html(data[1].eng_name);

       $('#td_mname').html(data[1].full_name_eng);

       $('#td_mobile').html(data[1].mobile);

       $('#td_photo').html('<img src="<?=ASSET_USER_PHOTO?>'+data[1].photo+'" height="100" width="100">');

       $('#full_name_eng').val(data[0].full_name_eng);
       $('#full_name_guj').val(data[0].full_name_guj);
       $('#sakh').val(data[0].sakh);
       $('#education').val(data[0].education);
       $('#height').val(data[0].height);
       $('#weight').val(data[0].weight);
       $('#mosad').val(data[0].mosad);
       $('#occupation').val(data[0].occupation);
       $('#address').val(data[0].address);
       $('#extra_details').val(data[0].extra_details);

       $('#land').val(data[0].land);
       $('#mother_name').val(data[0].mother_name);
       $('#mosad_sakh').val(data[0].mosad_sakh);
       $('#father_occupation').val(data[0].father_occupation);
       $('#mother_occupation').val(data[0].mother_occupation);
       $('#brother').val(data[0].brother);
       $('#sister').val(data[0].sister);
       $('#income').val(data[0].income);
       $('#father_mobile').val(data[0].father_mobile);
       $('#mobile_no').val(data[0].mobile_no);
       $("#tel").attr("href", "tel:"+data[0].father_mobile);
       $("#ctel").attr("href", "tel:"+data[0].mobile_no);

       $('#maritual_status').val(data[0].maritual_status).trigger('change');

       if(data[0].gender == "Male")
        $('#male').prop("checked",true);
       else
        $('#female').prop("checked",true);

       $("#img_preview").attr("src","<?=MATRIMONY_PHOTO?>"+data[0].photo);

       
       $('#village_id').width("100%");
       $('#village_id').select2().select2('val',data[0].village_id);
       $('#village_id').val(data[0].village_id).trigger('change');
       $('#country_id').width("100%");
       $('#country_id').select2().select2('val',data[0].country_id);

       var bdte = js_date(data[0].birth_date);
       $(".date-picker").datepicker("update",bdte);

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
    });
  }
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
                        columns: [0,1,2,3,4,5]
                    }
                },
                {
                    extend : 'excelHtml5',
                    exportOptions:{
                        columns: [0,1,2,3,4,5]
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

function update_account()
{
    $('#update_btn').text('Updating...'); //change button text
    $('#update_btn').attr('disabled',true);

    var data = new FormData($('#pending_matrimony-form')[0]);
    data.append('address', $('#address').val());
    data.append('extra_details', $('#extra_details').val());

    $.ajax({
      url : update_url,
      method: "POST",
      dataType: "JSON",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        
        $('#update_btn').text('Submit');
        $('#update_btn').attr('disabled',false); //set button enable   

        if(data.update_status)
          update_modal();
        else
          fail_update_modal();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error! Something Went Wrong'); 
      }
    });
}
</script>                
             
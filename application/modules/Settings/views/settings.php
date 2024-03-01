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
               <span><?=$this->lang->line('all_settings');?></span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"> <?=$this->lang->line('settings');?>
         <small>Here you can view and change general settings.</small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body">
                  <ul class="nav nav-tabs">
                     <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> <?=$this->lang->line('village_setting');?> 
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_2" data-toggle="tab"> <?=$this->lang->line('app_ui_setting');?> 
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_3" data-toggle="tab"> <?=$this->lang->line('translate_setting');?> 
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_4" data-toggle="tab"> SMS API Setting
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_5" data-toggle="tab"> Message Template Setting
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_6" data-toggle="tab"> Business Category
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_7" data-toggle="tab"> App Info
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="tab_1_1">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-home"></i>
                                       <span class="caption-subject sbold uppercase"> <?=$this->lang->line('add_village');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="village_form">
                                      <input type="hidden" name="village_id" id="village_id">
                                       <div class="form-body">
                                          
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('village_name_eng');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-home "></i>
                                                   </span>
                                                   <input type="text" class="form-control" onblur="translate_handler(this.value,'guj_name')" name="eng_name" id="eng_name" onkeyup="capitalizeFirstLetter(this.value)">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter your village name in english</span>
                                                </div>
                                             </div>
                                          </div>
                                            <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('village_name_guj');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-home "></i>
                                                   </span>
                                                   <input type="text" class="form-control" id="guj_name" name="guj_name">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter your village name in gujarati</span>
                                                </div>
                                             </div>
                                          </div>


                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" onclick="location.reload()" class="btn default"><?=$this->lang->line('reset')?></button>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                    <!-- END FORM-->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <!-- Begin: life time stats -->
                              <div class="portlet light portlet-fit portlet-datatable">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-home"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('view_villages');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <div class="table-container">
                                       <table class="table table-striped table-bordered dt-responsive table-hover" width="100%" id="village_datatable">
                                          <thead>
                                             <tr>
                                                <th> # </th>
                                                <th> <?=$this->lang->line('village_name');?> </th>
                                                <th> <?=$this->lang->line('village_name');?> </th>
                                                <th> <?=$this->lang->line('action');?> </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="tab_1_2">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase"> <?=$this->lang->line('add_ui_setting');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" 
                                    id="app_ui_form">
                                       <div class="form-body">
                                          
                                          <div class="form-group form-md-line-input">
                                             <label class="control-label col-md-3 sbold"><?=$this->lang->line('select_ui_category'); ?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <select autofocus="autofocus" class="form-control select2me" name="ui_category" data-placeholder="<?=$this->lang->line('select_ui_category'); ?>">
                                                   <option></option>
                                                   <option value="grid">Grid View</option>
                                                   <option value="navigation">Navigation View</option>
                                                </select>
                                             </div>
                                              
                                          </div>
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('eng_name');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <input type="text" onblur="translate_handler(this.value,'guj_name_ui')" class="form-control" id="eng_name" name="eng_name">
                                                <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter your ui title in english</span>
                                             </div>
                                          </div>

                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('guj_name');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <input type="text" class="form-control" id="guj_name_ui" name="guj_name">
                                                <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter your ui title in gujarati</span>
                                             </div>
                                          </div>

                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('activity_name');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <input type="text" class="form-control" name="activity_name">
                                                <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter your activity name</span>
                                             </div>
                                             
                                          </div>

                                          <div class="form-group form-md-line-input last">
                                                    <label class="control-label col-md-3 sbold">
                                                      <?=$this->lang->line('upload_icon');?>
                                                      <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img id="img_preview" src="<?=ASSETS_PATH?>images/no_img.png" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="icon" id="img_file" 
                                                                    accept="image/png"> </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">NOTE!</span> Image must in .PNG File. </div>
                                                    </div>
                                          </div>
                                          
                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="submit_btn_app_ui" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" class="btn default"><?=$this->lang->line('reset')?></button>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                    <!-- END FORM-->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <!-- Begin: life time stats -->
                              <div class="portlet light portlet-fit portlet-datatable">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('view_ui_setting');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <div class="table-container">
                                       <table class="table table-striped table-bordered table-hover dt-responsive" id="app_ui_datatable" width="100%">
                                          <thead>
                                             <tr>
                                                <th> # </th>
                                                <th> <?=$this->lang->line('eng_name');?> </th>
                                                <th> <?=$this->lang->line('activity_name');?> </th>
                                                <th> <?=$this->lang->line('action');?> </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="tab_1_3">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase"> <?=$this->lang->line('translate_setting');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="translateapi_form">
                                       <div class="form-body">
                                          
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('api_name');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-gear "></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="api_name">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter translate API Name</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('api_url');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-globe "></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="api_url">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter translate API Url</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('api_key');?>
                                             
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-key "></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="api_key">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter translate API Key</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('api_email');?>
                                             
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-envelope"></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="api_email">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter translate API Email</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="submit_btn_api" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" class="btn default"><?=$this->lang->line('reset')?></button>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                    <!-- END FORM-->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <!-- Begin: life time stats -->
                              <div class="portlet light portlet-fit portlet-datatable">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('traslate_view_setting');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <div class="table-container">
                                       <table class="table table-striped table-bordered table-hover dt-responsive" 
                                       width="100%" id="api_datatable">
                                          <thead>
                                             <tr>
                                                <th> # </th>
                                                <th> <?=$this->lang->line('api_name');?> </th>
                                                <th> <?=$this->lang->line('active');?> </th>
                                                <th> <?=$this->lang->line('action');?> </th>
                                             </tr>
                                          </thead>
                                          
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="tab_1_4">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase">SMS API Setting</span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="smsapi_form">
                                      <input type="hidden" id="sms_api_id" name="sms_api_id">
                                       <div class="form-body">
                                          
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">SMS API Name
                                             
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-gear "></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="sms_api_name" id="sms_api_name">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter SMS API Name</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">SMS Send API Url
                                             
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-globe "></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="sms_api_send_url" id="sms_api_send_url">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter SMS Send API Url</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">SMS Balance Url
                                             
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-envelope"></i>
                                                   </span>
                                                   <input type="text" id="sms_api_view_balance_url" class="form-control" name="sms_api_view_balance_url">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter SMS Balance Url</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">SMS API Key
                                             
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-key "></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="sms_api_key" id="sms_api_key">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter SMS API Key</span>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="submit_btn_smsapi" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" class="btn default"><?=$this->lang->line('reset')?></button>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                    <!-- END FORM-->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <!-- Begin: life time stats -->
                              <div class="portlet light portlet-fit portlet-datatable">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase">List of SMS API</span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <div class="table-container">
                                       <table class="table table-striped table-bordered table-hover dt-responsive" 
                                       width="100%" id="smsapi_datatable">
                                          <thead>
                                             <tr>
                                                <th> # </th>
                                                <th> <?=$this->lang->line('api_name');?> </th>
                                                <th> <?=$this->lang->line('active');?> </th>
                                                <th> <?=$this->lang->line('action');?> </th>
                                             </tr>
                                          </thead>
                                          
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="tab_1_5">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase">Message Template Setting</span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="message_form">
                                      <input type="hidden" id="sms_temp_id" name="sms_temp_id">
                                       <div class="form-body">
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold">Message Title
                                             
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-info "></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="sms_title" id="sms_title">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter Message Title</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">Message
                                             </label>
                                             <div class="col-md-9">
                                                <textarea class="form-control" id="sms_context" rows="6"></textarea>

                                             </div>
                                          </div>
                                          <div class="form-group form-md-line-input">
                                          <label class="col-md-3 control-label sbold">Dynamic Tags
                                          </label>
                                          <div class="col-md-9">
                                          [username]&nbsp;[password]&nbsp;[OTP]
                                          </div>
                                          </div>
                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="submit_btn_message" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" class="btn default"><?=$this->lang->line('reset')?></button>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                    <!-- END FORM-->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <!-- Begin: life time stats -->
                              <div class="portlet light portlet-fit portlet-datatable">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase">List of Message Templates</span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <div class="table-container">
                                       <table class="table table-striped table-bordered table-hover dt-responsive" 
                                       width="100%" id="msgtemp_datatable">
                                          <thead>
                                             <tr>
                                                <th> # </th>
                                                <th> Message Title </th>
                                                <th> <?=$this->lang->line('action');?> </th>
                                             </tr>
                                          </thead>
                                          
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="tab_1_6">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase"> Add Business Category</span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="bc_cate_form">
                                      <input type="hidden" name="bc_id" id="bc_id">
                                       <div class="form-body">
                                          
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">Bussiness Category English
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-home "></i>
                                                   </span>
                                                   <input type="text" class="form-control" onblur="translate_handler(this.value,'bc_guj_name')" name="bc_eng_name" id="bc_eng_name">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter business category in english</span>
                                                </div>
                                             </div>
                                          </div>
                                            <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">Bussiness Category Gujarati
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-home "></i>
                                                   </span>
                                                   <input type="text" class="form-control" id="bc_guj_name" name="bc_guj_name">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter business category in gujarati</span>
                                                </div>
                                             </div>
                                          </div>


                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="bc_submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" onclick="location.reload()" class="btn default"><?=$this->lang->line('reset')?></button>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                    <!-- END FORM-->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <!-- Begin: life time stats -->
                              <div class="portlet light portlet-fit portlet-datatable">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase">List of Business Category</span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <div class="table-container">
                                       <table class="table table-striped table-bordered dt-responsive table-hover" width="100%" id="business_datatable">
                                          <thead>
                                             <tr>
                                                <th> # </th>
                                                <th> Business Category </th>
                                                <th> <?=$this->lang->line('action');?> </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="tab_1_7">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-gear"></i>
                                       <span class="caption-subject sbold uppercase">Application Information</span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="app_form">
                                      <input type="hidden" name="app_id" id="app_id">
                                       <div class="form-body">
                                          <div class="form-group form-md-line-input">
                                             <label class="control-label col-md-2 sbold">Application Information</label>
                                             <div class="col-md-10">
                                                <textarea class="ckeditor form-control" id="app_desc">
                                                </textarea>
                                             </div>
                                          </div> 
                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="app_info_btn" class="btn green">Update App Info</button>
                                                <button type="button" onclick="location.reload();" class="btn default">Reload</button>
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
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<script type="text/javascript">
   var save_village_url = base_url+'Settings/add_village';
   var save_bc_cate_url = base_url+'Settings/add_business_cat';
   var save_translateapi_url = base_url+'Settings/add_translate_api';
   var save_app_ui_url = base_url+'Settings/add_app_ui';
   var save_sms_api_url = base_url+'Settings/add_sms_api';
   var save_message_url = base_url+'Settings/add_message';
   var update_app_info = base_url+'Settings/update_appinfo';

   var fetch_villageurl = base_url+'Settings/view_village';
   var fetch_businessurl = base_url+'Settings/view_business';
   var fetch_apiurl = base_url+'Settings/view_api';
   var fetch_appuiurl = base_url+'Settings/view_appui';
   var fetch_smsapiurl = base_url+'Settings/view_smsapi';
   var fetch_message_template = base_url+'Settings/view_msgtemplate';
   var fetch_app_detail = base_url+'Settings/fetch_app_info';

   var village_form = "village_form";
   var translateapi_form = "translateapi_form";
   var smsapi_form = "smsapi_form";
   var business_form = "bc_cate_form";
   var app_ui_form = "app_ui_form";
   var message_form = "message_form";

   $('#submit_btn').on('click', function(e) {
           e.preventDefault();
           if($("#village_form").valid())
            save_data(save_village_url,village_form,'submit_btn');
   }); 

   $('#bc_submit_btn').on('click', function(e) {
        e.preventDefault();
        save_data(save_bc_cate_url,business_form,'bc_submit_btn');
   }); 
   
   $('#submit_btn_api').on('click', function(e) {
          save_data(save_translateapi_url,translateapi_form,'submit_btn_api');    
   }); 
   
   $('#submit_btn_smsapi').on('click', function(e) {
        save_data(save_sms_api_url,smsapi_form,'submit_btn_smsapi');    
   });
   
   $('#submit_btn_message').on('click', function(e) {
       save_message_data();
   });

   $('#app_info_btn').on('click', function(e) {
          save_appinfo_data();
   });

   function save_message_data()
   {
            $('#submit_btn_message').text('Saving...'); //change button text
            $('#submit_btn_message').attr('disabled',true);

            var form_data = new FormData($('#message_form')[0]);
            form_data.append('sms_context', $('#sms_context').val());

            $.ajax({
              url : save_message_url,
              method: "POST",
              dataType: "JSON",
              data: form_data,
              contentType: false,
              cache: false,
              processData: false,
              success: function(data)
              {
                
                if(data.insert_status == true)
                {
                  $('#submit_btn_message').text('Submit');
                  $('#submit_btn_message').attr('disabled',false); //set button enable       
                  document.getElementById('message_form').reset();
                  success_toast();
                  dataTable.ajax.reload();
                }
                else
                {
                  $('#submit_btn_message').text('Submit');
                  $('#submit_btn_message').attr('disabled',false); //set button enable       
                  document.getElementById('message_form').reset();
                  fail_toast();
                  dataTable.ajax.reload();
                }
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                 alert('Error! Something Went Wrong'); 
              }
            });
   }

   function save_appinfo_data()
   {
            $('#app_info_btn').text('Saving...'); //change button text
            $('#app_info_btn').attr('disabled',true);

            var myformdata = new FormData($('#app_form')[0]);
            myformdata.append('app_desc', CKEDITOR.instances['app_desc'].getData());

            $.ajax({
              url : update_app_info,
              method: "POST",
              dataType: "JSON",
              data: myformdata,
              contentType: false,
              cache: false,
              processData: false,
              success: function(data)
              {
                
                if(data.update_status)
                {
                  $('#app_info_btn').text('Submit');
                  $('#app_info_btn').attr('disabled',false); //set button enable       
                  update_toast();
                }
                else
                {
                  $('#app_info_btn').text('Submit');
                  $('#app_info_btn').attr('disabled',false); //set button enable       
                  fail_toast();
                }
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                 alert('Error! Something Went Wrong'); 
              }
            });
   }

    $('#submit_btn_app_ui').on('click', function(e) {
          e.preventDefault();
          if($('#img_file').val() == '')
          {
            alert('Please Upload App Icon');
          }
          else
          {
            var img = $('#img_file').val();
            
            var filename = img.replace(/^.*[\\\/]/, '');
            var ext = filename.split('.').pop();
            if(ext == "png" || ext == "PNG")
            {
              
              $('#submit_btn_app_ui').text('Saving...'); //change button text
              $('#submit_btn_app_ui').attr('disabled',true); //set button disable 

             $.ajax({
                url: save_app_ui_url,
                method: "POST",
                dataType: "JSON",
                data: new FormData($('#'+app_ui_form)[0]),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                  if(data.insert_status)
                  {
                    $('#submit_btn_app_ui').text('Submit');
                    $('#submit_btn_app_ui').attr('disabled',false); //set button enable       
                    
                    document.getElementById(app_ui_form).reset();
                    $('#img_preview').val('');
                    $('#img_preview').attr('src', base_url+'assets/images/no_img.png');
                    success_toast();
                    dataTable.ajax.reload();
                  }
                  else if(data.duplicate_status == true)
                  {
                    $('#submit_btn_app_ui').text('Submit');
                    $('#submit_btn_app_ui').attr('disabled',false); //set button enable       
                    
                    $('#img_preview').val('');
                    document.getElementById(app_ui_form).reset();
                    $('#img_preview').attr('src', base_url+'assets/images/no_img.png');
                    warning_toast();
                    dataTable.ajax.reload();
                  }
                  else
                  {
                    $('#submit_btn_app_ui').text('Submit');
                    $('#submit_btn_app_ui').attr('disabled',false); //set button enable       
                    
                    document.getElementById(app_ui_form).reset();
                    $('#img_preview').val('');
                    $('#img_preview').attr('src', base_url+'assets/images/no_img.png');
                    fail_toast();
                    dataTable.ajax.reload();
                  }
                     
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                   alert('Error! Something Went Wrong'); 
                }
             });
              
            }
            else
            {
                alert('Image must be in .PNG format');
            }                
          }
   }); 

 $(document).ready(function() {
    view_villages_table(fetch_villageurl);

    $('.nav a').click(function (e) {
            
        var tab = this.hash;
        if(tab == '#tab_1_2')
          view_appui_table(fetch_appuiurl);
        else if(tab == '#tab_1_3')
          view_api_table(fetch_apiurl);
        else if(tab == '#tab_1_4')
          view_sms_api_table(fetch_smsapiurl);
        else if(tab == '#tab_1_5')
          view_message_template_table(fetch_message_template);
        else if(tab == '#tab_1_6')
          view_business_table(fetch_businessurl);
        else if(tab == '#tab_1_7')
          fetch_appinfo();
     }); 

    $("#img_file").change(function() {
       readImgURL(this);
    });

 });

 function fetch_appinfo()
 {
   $.ajax({
    url : fetch_app_detail,
    type: "POST",
    dataType: "JSON",
    success: function(data)
    {
      
      $('#app_id').val(data[0].app_id);
      CKEDITOR.instances['app_desc'].setData(data[0].app_desc);
    }
  });

 }

 CKEDITOR.config.toolbar = [
   ['Styles','Format','Font','FontSize'],
   '/',
   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste'],
   '/',
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Link']
];
CKEDITOR.config.height = 500;
  
 var unsaved = false;

$(":input").change(function(){ //triggers change in all input fields including text type
    unsaved = true;
});

function unloadPage(){ 
    if(unsaved){
        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
    }
}

window.onbeforeunload = unloadPage; 

</script>
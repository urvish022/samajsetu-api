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
               <span><?=$this->lang->line('org_team_ttl');?></span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"><?=$this->lang->line('org_team_ttl');?>
         <small><?=$this->lang->line('org_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body">
                  <ul class="nav nav-tabs">
                     <li class="active" id="tab_1_1_nav">
                        <a href="#tab_1_1" data-toggle="tab"> <?=$this->lang->line('view_org');?>
                        </a>
                     </li>
                     <li id="tab_1_2_nav">
                        <a href="#tab_1_2" data-toggle="tab"> <?=$this->lang->line('add_org');?> 
                        </a>
                     </li>
                     <li id="tab_1_3_nav">
                        <a href="#tab_1_3" data-toggle="tab"> <?=$this->lang->line('add_team');?>
                        </a>
                     </li>
                     <li id="tab_1_4_nav">
                        <a href="#tab_1_4" data-toggle="tab"> <?=$this->lang->line('view_team');?>
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     
                     <div class="tab-pane fade active in" id="tab_1_1">
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-building"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('view_org');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" id="org_datatable" width="100%">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> <?=$this->lang->line('org_name');?> </th>
                                          <th> <?=$this->lang->line('photo');?> </th>
                                          <th> <?=$this->lang->line('action');?> </th>
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
                        <div class="row">
                           <div class="col-md-12">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-building"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('add_org');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal organ_form" method="post" id="organ_form"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="org_id" id="org_edit_id">
                                       <div class="form-body">

                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">
                                              <?=$this->lang->line('org_name');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <input type="text" class="form-control" id="org_name" name="org_name">
                                                <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter organization name in gujarati</span>
                                             </div>
                                          </div>

                                          <div class="form-group form-md-line-input last">
                                                    <label class="control-label col-md-3 sbold">
                                                      <?=$this->lang->line('org_pic');?>
                                                      <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 150px; height: 100px;">
                                                                <img id="img_preview" src="<?=ORG_PHOTO?>no_img.png" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
                                                            </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                <input type="hidden" id="old_photo" name="old_photo">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="org_photo" id="org_photo" 
                                                                    accept="image/jpg, image/jpeg, image/png"> </span>
                                                                <a href="#modal_theme_danger" data-toggle="modal" class="btn red remove_img" style="display: none;"> Remove 
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">NOTE!</span> Image must be in .jpg or .jpeg or .png File. </div>
                                                    </div>
                                          </div>

                                           <div class="form-group form-md-line-input">
                                             <label class="control-label col-md-3 sbold">
                                              <?=$this->lang->line('org_detail');?>
                                              </label>
                                             <div class="col-md-9">
                                                <textarea class="ckeditor form-control" 
                                                id="org_details" rows="10">
                                                  
                                                </textarea>
                                             </div>
                                          </div>
                                          
                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="submit_org_btn" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" onclick="location.reload();" class="btn default"><?=$this->lang->line('reset')?></button>
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

                      <div class="tab-pane fade" id="tab_1_3">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="portlet light portlet-fit portlet-form ">
                                 <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-group"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('add_team');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal team_form" method="post" 
                                    enctype="multipart/form-data" id="team_form">
                                    <input type="hidden" name="team_id" id="team_id">
                                      <div class="form-body">
                                         <div class="form-group form-md-line-input">
                                             <label class="control-label col-md-3 sbold">
                                              <?=$this->lang->line('select_org');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <select class="form-control select2me" id="org_id" 
                                                name="org_id" data-placeholder="Select Organization">
                                                </select>
                                             </div>
                                          </div>

                                          <div class="form-group form-md-line-input">
                                             <label class="control-label col-md-3 sbold">
                                              <?=$this->lang->line('select_des');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <select class="form-control select2me" id="designation" 
                                                name="designation" data-placeholder="Select Designation">
                                                <option value=""></option>
                                                <option value="અધ્યક્ષ">અધ્યક્ષ</option>
                                                <option value="પ્રમુખ">પ્રમુખ</option>
                                                <option value="મંત્રી">મંત્રી</option>
                                                <option value="ઉપ પ્રમુખ">ઉપ પ્રમુખ</option>
                                                <option value="સહ મંત્રી">સહ મંત્રી</option>
                                                <option value="સંગઠન મંત્રી">સંગઠન મંત્રી</option>
                                                <option value="આંતરિક ઓડિટર">આંતરિક ઓડિટર
                                                </option>
                                                <option value="ખજાનચી">ખજાનચી</option>
                                                </select>
                                             </div>
                                          </div>

                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">
                                              <?=$this->lang->line('member_name');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <input type="text" class="form-control" id="member_name" name="member_name">
                                                <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter member name in gujarati</span>
                                             </div>
                                          </div>

                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1">
                                              <?=$this->lang->line('member_mobile');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                                                <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter member's mobile number</span>
                                             </div>
                                          </div>

                                          <div class="form-group form-md-line-input">
                                             <label class="control-label col-md-3 sbold">
                                              <?=$this->lang->line('select_village');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <select class="form-control select2me" id="village_id" name="village_id" data-placeholder="Select Village">
                                                </select>
                                             </div>
                                          </div>

                                          <div class="form-group form-md-line-input last">
                                                    <label class="control-label col-md-3 sbold">
                                                      <?=$this->lang->line('member_photo');?>
                                                      <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
                                                                <img id="member_pic_preview" src="<?=ORG_PHOTO?>no_user.jpg" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;"> 
                                                            </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <input type="hidden" name="old_team_photo" id="old_team_photo">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="member_photo" id="member_photo" 
                                                                    accept="image/jpg, image/jpeg, image/png"> </span>
                                                                <a href="#modal_team_danger" data-toggle="modal" class="btn red remove_team_img" style="display: none;"> Remove 
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">NOTE!</span> Image must be in .jpg or .jpeg or .png File. </div>
                                                    </div>
                                          </div>
                                          
                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="submit_team_btn" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" onclick="location.reload();" class="btn default"><?=$this->lang->line('reset')?></button>
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
                     <div class="tab-pane fade" id="tab_1_4">
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-group"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('view_team');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" id="team_datatable" width="100%">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> <?=$this->lang->line('org_name');?> </th>
                                          <th> <?=$this->lang->line('member_name');?> </th>
                                          <th> <?=$this->lang->line('village');?> </th>
                                          <th> <?=$this->lang->line('designation');?> </th>
                                          <th> <?=$this->lang->line('member_mobile');?> </th>
                                          <th> <?=$this->lang->line('photo');?> </th>
                                          <th> <?=$this->lang->line('action');?> </th>
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
               <button type="button" class="close" data-dismiss="modal">×
               </button>
               <h6 class="modal-title">Delete
               </h6>
            </div>
            <div class="modal-body">
               <h6 class="text-semibold">
                  <i class="fa fa-trash">
                  </i>&nbsp;Are you sure you want to delete this photo?
               </h6>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close
               </button>
               <button type="button" class="btn btn-danger" onclick="remove_image()">Remove Photo
               </button>
            </div>
         </div>
      </div>
   </div>

   <div id="modal_team_danger" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-red">
               <button type="button" class="close" data-dismiss="modal">×
               </button>
               <h6 class="modal-title">Delete
               </h6>
            </div>
            <div class="modal-body">
               <h6 class="text-semibold">
                  <i class="fa fa-trash">
                  </i>&nbsp;Are you sure you want to delete this photo?
               </h6>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close
               </button>
               <button type="button" class="btn btn-danger" onclick="remove_team_image()">Remove Photo
               </button>
            </div>
         </div>
      </div>
   </div>

    <div id="modal_theme_delete" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-red">
               <button type="button" class="close" data-dismiss="modal">×
               </button>
               <h6 class="modal-title">Delete
               </h6>
            </div>
            <form method="post" id="deleteform">
               <div class="modal-body">
                  <input type="hidden" name="org_id" id="org_id_delete_id">
                  <h6 class="text-semibold">
                     <i class="fa fa-trash">
                     </i>&nbsp;Are you sure you want to delete this data?
                  </h6>
               </div>
            </form>
            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close
               </button>
               <button type="button" class="btn btn-danger" onclick="delete_data()">Delete
               </button>
            </div>
         </div>
      </div>
    </div>

    <div id="modal_team_delete" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-red">
               <button type="button" class="close" data-dismiss="modal">×
               </button>
               <h6 class="modal-title">Delete
               </h6>
            </div>
            <form method="post" id="deleteteamform">
               <div class="modal-body">
                  <input type="hidden" name="team_id" id="team_id_delete_id">
                  <h6 class="text-semibold">
                     <i class="fa fa-trash">
                     </i>&nbsp;Are you sure you want to delete this data?
                  </h6>
               </div>
            </form>
            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close
               </button>
               <button type="button" class="btn btn-danger" onclick="delete_team()">Delete
               </button>
            </div>
         </div>
      </div>
    </div>


</div>
<!-- END CONTENT -->
<script type="text/javascript">
   var save_org = "<?=base_url('Organization_team/add_organization');?>";
   var save_team = "<?=base_url('Organization_team/add_team');?>";
   var fetch_single_data = "<?=base_url('Organization_team/fetch_single_data');?>";
   var fetch_single_team_data = "<?=base_url('Organization_team/fetch_single_team_data');?>";
   var fetch_organization = "<?=base_url('Organization_team/view_organization');?>";
   var fetch_team = "<?=base_url('Organization_team/view_team');?>";
   var delete_single_data = "<?=base_url('Organization_team/delete_single_data');?>";
   var delete_team_data = "<?=base_url('Organization_team/delete_team_data');?>";
   var dataTable = '';
   var old_photo = '';
   var old_team_photo = '';
   var organ_form = "organ_form";
   var team_form = "team_form";

    $('#submit_org_btn').on('click', function(e) {
          e.preventDefault();
          if(CKEDITOR.instances.org_details.getData() == '')
          {
            alert('Please Enter Organization Details');
          }
          else
          {
              if($(".organ_form").valid())
              {
                $('#submit_org_btn').text('Saving...'); //change button text
                $('#submit_org_btn').attr('disabled',true); //set button disable 

                var data = new FormData($('#organ_form')[0]);
                data.append('org_details', CKEDITOR.instances['org_details'].getData());

               $.ajax({
                  url: save_org,
                  method: "POST",
                  dataType: "JSON",
                  data: data,
                  contentType: false,
                  cache: false,
                  processData: false,
                  success:function(data)
                  {
                    $('#submit_org_btn').text('Submit');
                    $('#submit_org_btn').attr('disabled',false); //set button enable       

                    if(data.insert_status)
                      success_modal();
                    else if(data.duplicate_status == true)
                      warning_modal();
                    else if(data.update_status == true)
                      update_modal();
                    else if(data.update_status == false)
                      fail_update_modal();
                    else
                      fail_modal();
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    $('#submit_org_btn').text('Submit');
                    $('#submit_org_btn').attr('disabled',false); //set button enable       

                    alert('Error! Something Went Wrong'); 
                  }
               });
              }
            }    
    }); 

    $('#submit_team_btn').on('click', function(e) {
          e.preventDefault();
              if($(".team_form").valid())
              {
                $('#submit_team_btn').text('Saving...'); //change button text
                $('#submit_team_btn').attr('disabled',true); //set button disable 

                var data = new FormData($('#team_form')[0]);

                 $.ajax({
                    url: save_team,
                    method: "POST",
                    dataType: "JSON",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                      $('#submit_team_btn').text('Submit');
                      $('#submit_team_btn').attr('disabled',false); //set button enable       

                      if(data.insert_status)
                        success_modal();
                      else if(data.duplicate_status == true)
                        warning_modal();
                      else if(data.update_status == true)
                        update_modal();
                      else if(data.update_status == false)
                        fail_update_modal();
                      else
                        fail_modal();
                         
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                      $('#submit_team_btn').text('Submit');
                      $('#submit_team_btn').attr('disabled',false); //set button enable       

                      alert('Error! Something Went Wrong'); 
                    }
                 });
              }
    }); 

 $(document).ready(function() {
   organization_table();
   get_organization_list();
   get_villages_list();

    $('.nav a').click(function (e) {
            
        var tab = this.hash;        
        if(tab == '#tab_1_4')
        {
          dataTable = $('#team_datatable').DataTable({ 
              dom: 'Bfrtip',
              "destroy": true,
              lengthMenu: [[50, 100, 200, -1], [50, 100, 200, "All"]],
              buttons: [
                      {
                          extend: 'pageLength',
                      },
                  'colvis'
              ],
              "processing": true, //Feature control the processing indicator.
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "destroy": true,
              "order": [], //Initial no order.

              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": fetch_team,
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
             
     }); 

    $("#org_photo").change(function() {
       readImgURL(this);
    });

     $("#member_photo").change(function() {
      if (this.files && this.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#member_pic_preview').attr('src', e.target.result);
      }

      reader.readAsDataURL(this.files[0]);
    }
    });

 });

CKEDITOR.config.toolbar = [
   ['Styles','Format','Font','FontSize'],
   '/',
   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste'],
   '/',
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Link']
];

function edit_details(id)
{
  $("#tab_1_1_nav").removeClass("active");
  $('#tab_1_2_nav').addClass('active');
  $("#tab_1_1").removeClass("active in");
  $('#tab_1_2').addClass('active in');
  
  $.ajax({
    url : fetch_single_data,
    type: "POST",
    data: { org_id : id},
    dataType: "JSON",
    success: function(data)
    {
      $('#org_edit_id').val(data[0].org_id);
      $('#org_name').val(data[0].org_name);
      $('.btn-file').hide();
      
      if(data[0].org_photo!="no_img.png")
      {
        $('.remove_img').show();
        $('#img_preview').attr("src", "<?=ORG_PHOTO?>" + data[0].org_photo);
        old_photo = data[0].org_photo;
      }

      CKEDITOR.instances['org_details'].setData(data[0].org_details);
    }
  });
}

function edit_team_details(id)
{

  $("#tab_1_4_nav").removeClass("active");
  $('#tab_1_3_nav').addClass('active');
  $("#tab_1_4").removeClass("active in");
  $('#tab_1_3').addClass('active in');
  
  $.ajax({
    url : fetch_single_team_data,
    type: "POST",
    data: { team_id : id},
    dataType: "JSON",
    success: function(data)
    {
      $('#team_id').val(data[0].team_id);
      $('#member_name').val(data[0].member_name);
      $('#mobile_no').val(data[0].mobile_no);

      $('#org_id').width("100%");
      $('#org_id').select2().select2('val',data[0].org_id);
      $('#org_id').val(data[0].org_id).trigger('change');

      $('#designation').width("100%");
      $('#designation').select2().select2('val',data[0].designation);
      $('#designation').val(data[0].designation).trigger('change');

      $('#village_id').width("100%");
      $('#village_id').select2().select2('val',data[0].village_id);
      $('#village_id').val(data[0].village_id).trigger('change');

      $('.btn-file').hide();
      
      if(data[0].member_photo!="no_user.jpg")
      {
        $('.remove_team_img').show();
        $('#member_pic_preview').attr("src", "<?=ORG_PHOTO?>" + data[0].member_photo);
        old_team_photo = data[0].member_photo;
      }

    }
  });
}

function organization_table()
{
   dataTable = $('#org_datatable').DataTable({ 
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
              "destroy": true,
              "order": [], //Initial no order.

              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": fetch_organization,
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

function remove_image() {
  $('#old_photo').val(old_photo);
  $('.remove_img').hide();
  $('#modal_theme_danger').modal('hide');
  $("#img_preview").attr("src", "<?=ORG_PHOTO?>" + "no_img.png");
}

function remove_team_image()
{
  $('#old_team_photo').val(old_team_photo);
  $('.remove_team_img').hide();
  $('#modal_team_danger').modal('hide');
  $("#member_pic_preview").attr("src", "<?=ORG_PHOTO?>" + "no_user.jpg"); 
}

function delete_team_details(id)
{
  $('#team_id_delete_id').val(id);
  $('#modal_team_delete').modal('show');
}

function delete_details(id) {
  $('#org_id_delete_id').val(id);
  $('#modal_theme_delete').modal('show');
}

function delete_data() {
  $.ajax({
    url: delete_single_data,
    type: "POST",
    data: $('#deleteform').serialize(),
    dataType: "JSON",
    success: function (data) {
      $('#modal_theme_delete').modal('hide');

      if (data.delete_status) {
        delete_modal();
      } else {
        fail_delete_modal();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $('#modal_theme_delete').modal('hide');
      alert('Error! Something Went Wrong');
    }

  });
}

function delete_team()
{
  $.ajax({
    url: delete_team_data,
    type: "POST",
    data: $('#deleteteamform').serialize(),
    dataType: "JSON",
    success: function (data) {
      $('#modal_team_delete').modal('hide');

      if (data.delete_status) {
        delete_modal();
      } else {
        fail_delete_modal();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $('#modal_team_delete').modal('hide');
      alert('Error! Something Went Wrong');
    }

  });
}

</script>
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
               <span><?=$this->lang->line('post_for_carrer');?></span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"><?=$this->lang->line('post_for_carrer');?>
         <small><?=$this->lang->line('carerr_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body" id="blockui_sample_1_portlet_body">
                  <ul class="nav nav-tabs">
                     <li class="active" id="tab_1_1_nav">
                        <a href="#tab_1_1" data-toggle="tab"> <?=$this->lang->line('create_category');?>
                        </a>
                     </li>
                     <li id="tab_1_2_nav">
                        <a href="#tab_1_2" data-toggle="tab"> <?=$this->lang->line('view_carrer_post');?> 
                        </a>
                     </li>
                     <li id="tab_1_3_nav">
                        <a href="#tab_1_3" data-toggle="tab"> <?=$this->lang->line('add_carrer_post');?> 
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
                                       <i class="fa fa-edit"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('create_category');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="cate_form">
                                      <input type="hidden" name="cp_id" id="cp_id">
                                       <div class="form-body">
                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('category_name');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-edit"></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="carrer_cat" id="carrer_cat">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter Carrer Category Name</span>
                                                </div>
                                             </div>
                                          </div>

                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="cat_submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
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
                                       <i class="fa fa-edit"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('view_category');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <div class="table-container">
                                       <table class="table table-striped table-bordered dt-responsive table-hover" width="100%" id="category_datatable">
                                          <thead>
                                             <tr>
                                                <th> # </th>
                                                <th> <?=$this->lang->line('category_name');?> </th>
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
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-edit"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('view_carrer_post');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" 
                                    width="100%" id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> <?=$this->lang->line('carrer_title');?> </th>
                                          <th> <?=$this->lang->line('category_name');?> </th>
                                          <th> <?=$this->lang->line('date');?> </th>
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
                     <div class="tab-pane fade" id="tab_1_3">
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-edit"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('add_carrer_post');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal posts-form" method="post" enctype="multipart/form-data" 
                                 id="posts_form">
                                 <div class="form-body">
                                    <input type="hidden" id="cpost_id" name="cpost_id">
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('select_cat');?>
                                        <span class="required">*</span>
                                       </label>
                                       <div class="col-md-10">
                                          <select class="form-control select2me" 
                                          name="cp_id" id="cps_id">
                                          </select>
                                       </div>
                                     </div>   
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('carrer_title');?><span class="required">*</span></label>
                                       <div class="col-md-10">
                                          <input class="form-control" id="cpost_title" name="cpost_title" type="text" />
                                          <span class="help-block">Enter post title</span>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('carrer_date');?><span class="required">*</span></label>
                                       <div class="col-md-10">
                                          <input class="form-control date-picker" type="text" id="cpost_date" 
                                          name="cpost_date" />
                                          <span class="help-block"> Select date </span>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('carrer_content');?></label>
                                       <div class="col-md-10">
                                          <textarea class="ckeditor form-control" id="cpost_desc" rows="10">
                                          </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold">
                                       <?=$this->lang->line('carrer_photo');?>
                                       </label>
                                       <div class="col-md-10">
                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                             <div class="fileinput-new thumbnail" 
                                                style="width: 200px; height: 130px;">
                                                <img id="img_preview" src="<?=CARRER_PHOTO?>no_carrer.jpg" alt="No Image" /> 
                                             </div>
                                             <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height: 120px;"> </div>
                                             <div>
                                                <input type="hidden" id="old_photo" name="old_photo">
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new" id="file_upload"> Select image </span>
                                                <input type="file" name="cpost_photo"
                                                   id="img_file" accept="image/jpg, image/jpeg, image/png"> 
                                                </span>
                                             </div>
                                             <a href="#modal_theme_danger" data-toggle="modal" class="btn red remove_img" style="display: none;"> Remove 
                                             </a>
                                          </div>
                                          <div class="clearfix margin-top-10">
                                             <span class="label label-danger">NOTE!</span> Image must be in .jpg or .jpeg or .png File.
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input" id="attachments">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('carrer_attach'); ?></label>
                                       <div class="col-md-10">
                                          <input type="file" name="cpost_attachment[]" accept="application/pdf" multiple>
                                          <div class="clearfix margin-top-10">
                                             <span class="label label-danger">NOTE!</span> File must be in .PDF File. 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                          <button type="button" id="submit_btn" class="btn green">
                                            <?=$this->lang->line('submit')?></button>
                                          <button type="reset" onclick="jsRedirect();" class="btn default"><?=$this->lang->line('reset')?></button>
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

   <div id="modal_cat_delete" class="modal fade">
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
                  <input type="hidden" name="cp_id" id="delete_cp_id">
                  <h6 class="text-semibold">
                     <i class="fa fa-trash">
                     </i>&nbsp;Are you sure you want to delete this data?
                  </h6>
               </div>
            </form>
            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close
               </button>
               <button type="button" class="btn btn-danger" onclick="delete_cat_data()">Delete
               </button>
            </div>
         </div>
      </div>
   </div>

   <div id="modal_post_delete" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-red">
               <button type="button" class="close" data-dismiss="modal">×
               </button>
               <h6 class="modal-title">Delete
               </h6>
            </div>
            <form method="post" id="deletepostform">
               <div class="modal-body">
                  <input type="hidden" name="cpost_id" id="delete_cpost_id">
                  <h6 class="text-semibold">
                     <i class="fa fa-trash">
                     </i>&nbsp;Are you sure you want to delete this data?
                  </h6>
               </div>
            </form>
            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close
               </button>
               <button type="button" class="btn btn-danger" onclick="delete_post_data()">Delete
               </button>
            </div>
         </div>
      </div>
   </div>

   <div id="throbber" style="display:none;">
    <img src="<?=ASSETS_PATH?>global/img/loading-spinner-default.gif" />&nbsp;
    <?=$this->lang->line('throbber_notification');?>
   </div>

</div>
<!-- END CONTENT -->
<script type = "text/javascript">
var save_post = "<?=base_url('Post_career/save_post_carrer');?>";
var view_post = "<?=base_url('Post_career/view_post_carrer')?>";
var fetch_single_post = "<?=base_url('Post_career/view_single_post')?>";
var delete_single_cate = "<?=base_url('Post_career/delete_single_cate')?>";
var send_notification = "<?=base_url('Post_career/send_notification')?>";
var delete_post = "<?=base_url('Post_career/delete_post_data')?>";
var save_cat = "<?=base_url('Post_career/save_cat_data')?>";
var cat_list = "<?=base_url('Post_career/view_cate_list')?>";
var old_photo;
var cat_form = "cate_form";

$("#img_file").change(function () {
  readImgURL(this);
});

CKEDITOR.config.toolbar = [
  ['Styles', 'Format', 'Font', 'FontSize'],
  '/', ['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste'],
  '/', ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'Link','Image']
];
CKEDITOR.config.height = 500;

$(document).ready(function () {
  view_category_list(cat_list);
});

function delete_cat_data()
{
  $.ajax({
    url: delete_single_cate,
    type: "POST",
    data: $('#deleteform').serialize(),
    dataType: "JSON",
    success: function (data) {
      $('#modal_cat_delete').modal('hide');

      if (data.delete_status) {
        delete_modal();
      } else {
        fail_delete_modal();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $('#modal_cat_delete').modal('hide');
      alert('Error! Something Went Wrong');
    }

  }); 
}

$('.nav a').click(function (e) {
            
        var tab = this.hash;

        if(tab == '#tab_1_2')
        {
          get_carrer_cat_list();

            dataTable = $('#dataTable').DataTable({
            dom: 'Bfrtip',
            "destroy": true,
            lengthMenu: [
              [50, 100, 200, -1],
              [50, 100, 200, "All"]
            ],
            buttons: [{
                extend: 'pageLength',
              },
              'colvis'
            ],
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.

            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
              "url": view_post,
              "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
              "targets": [-1], //last column
              "orderable": false, //set not orderable
            }, ],

          });

        }
        else if(tab == '#tab_1_3')
        {
          get_carrer_cat_list();
        }
  });
 
 $('#cat_submit_btn').on('click', function (e) {
    e.preventDefault();
           if($("#carrer_cat").val() != '')
           {
              save_data(save_cat,cat_form,'cat_submit_btn');
           }
           else
           {
            alert('Please enter carrer category name');
           }
  });

$('#submit_btn').on('click', function (e) {
  e.preventDefault();
  if ($(".posts-form").valid()) {

    $('#submit_btn').text('Saving...'); //change button text
    $('#submit_btn').attr('disabled', true); //set button disable 
    var data = new FormData($('#posts_form')[0]);
    data.append('cpost_desc', CKEDITOR.instances['cpost_desc'].getData());

    $.ajax({
      url: save_post,
      method: "POST",
      dataType: "JSON",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        $('#submit_btn').text('Submit');
        $('#submit_btn').attr('disabled', false); //set button enable   

        if (data.insert_status) {
          success_toast();
          send_notify(data.insert_id);
        } else if (data.duplicate_status == true) {
          warning_modal();
        } else if (data.update_status == true) {
          update_modal();
        } else if (data.update_status == false) {
          fail_update_modal();
        } else {
          fail_modal();
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert('Error! Something Went Wrong');
      }
    });

  }
});

function set_details(id) {
  $("#tab_1_2_nav").removeClass("active");
  $('#tab_1_3_nav').addClass('active');
  $("#tab_1_2").removeClass("active in");
  $('#tab_1_3').addClass('active in');

  $.ajax({
    url: fetch_single_post,
    type: "POST",
    data: {
      cpost_id: id
    },
    dataType: "JSON",
    success: function (data) {
      $('#cps_id').width("100%");
      $('#cps_id').select2().select2('val',data[0].cp_id);
      $('#cps_id').val(data[0].cp_id).trigger('change');

      $('#cpost_id').val(data[0].cpost_id);
      $('#cpost_title').val(data[0].cpost_title);
      $('#attachments').hide();

      $('.btn-file').hide();

      if (data[0].cpost_photo != "no_carrer.jpg") {
        $('.remove_img').show();
        $('#img_preview').attr("src", "<?=CARRER_PHOTO?>" + data[0].cpost_photo);
        old_photo = data[0].cpost_photo;
      }

      $('#cpost_date').datepicker("setDate", customjs_date(data[0].cpost_date));
      CKEDITOR.instances['cpost_desc'].setData(data[0].cpost_desc);
    }
  });
}


function remove_image() {
  $('#old_photo').val(old_photo);
  $('.remove_img').hide();
  $('#modal_theme_danger').modal('hide');
  $("#img_preview").attr("src", "<?=CARRER_PHOTO?>" + "no_carrer.jpg");
}

function delete_details(id) {
  $('#delete_cpost_id').val(id);
  $('#modal_post_delete').modal('show');
}

function delete_post_data()
{
  $.ajax({
    url: delete_post,
    type: "POST",
    data: $('#deletepostform').serialize(),
    dataType: "JSON",
    success: function (data) {
      $('#modal_post_delete').modal('hide');

      if (data.delete_status) {
        delete_modal();
      } else {
        fail_delete_modal();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $('#modal_post_delete').modal('hide');
      alert('Error! Something Went Wrong');
    }

  });
}

function delete_data(id) {
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

function send_notify(id)
{
  $.blockUI({ message: $('#throbber'),target: '#blockui_sample_1_portlet_body',boxed: true });
  $.ajax({
    url: send_notification,
    type: "POST",
    data: {
      cpost_id: id
    },
    dataType: "JSON",
    success: function (data) {
        
        if(data.status)
        {
          $.unblockUI();
          location.reload(true);
        }
        else{
          $.unblockUI();
          location.reload(true);
        }
    }
  });
}


</script>
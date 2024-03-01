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
               <span><?=$this->lang->line('create_event');?></span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"><?=$this->lang->line('create_event');?>
         <small><?=$this->lang->line('event_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body" id="blockui_sample_1_portlet_body">
                  <ul class="nav nav-tabs">
                     <li class="active" id="tab_1_1_nav">
                        <a href="#tab_1_1" data-toggle="tab"> <?=$this->lang->line('view_event_post');?> 
                        </a>
                     </li>
                     <li id="tab_1_2_nav">
                        <a href="#tab_1_2" data-toggle="tab"> <?=$this->lang->line('create_event');?> 
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="tab_1_1">
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-edit"></i>
                                 <span class="caption-subject sbold uppercase"> <?=$this->lang->line('view_event_post');?> </span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" 
                                    width="100%" id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th>  <?=$this->lang->line('event_title');?>  </th>
                                          <th>  <?=$this->lang->line('date_time');?>  </th>
                                          <th>  <?=$this->lang->line('place');?>  </th>
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
                                 <i class="fa fa-edit"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('create_event');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal event_form" method="post" 
                              enctype="multipart/form-data" id="event_form">
                                 <div class="form-body">
                                    <input type="hidden" id="event_id" name="event_id">
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('event_title');?><span class="required">*</span></label>
                                       <div class="col-md-10">
                                          <input class="form-control" id="event_title" name="event_title" type="text" />
                                          <span class="help-block">Enter event title</span>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('event_date');?><span class="required">*</span></label>
                                       <div class="col-md-10">
                                          <input class="form-control date-picker" type="text" id="event_date" 
                                          name="event_date" />
                                          <span class="help-block"> Select date </span>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-2 sbold"><?=$this->lang->line('event_time');?><span class="required">*</span></label>
                                        <div class="col-md-10">
                                            <input data-provide="timepicker" type="text" class="form-control timepicker timepicker-default" id="event_time" name="event_time">
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('event_place');?><span class="required">*</span></label>
                                       <div class="col-md-10">
                                          <input class="form-control" id="event_place" name="event_place" type="text" />
                                          <span class="help-block">Enter event place</span>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('event_content');?></label>
                                       <div class="col-md-10">
                                          <textarea class="ckeditor form-control" id="event_content" rows="10">
                                          </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold">
                                       <?=$this->lang->line('event_photo');?>
                                       </label>
                                       <div class="col-md-10">
                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                             <div class="fileinput-new thumbnail" 
                                                style="width: 200px; height: 130px;">
                                                <img id="img_preview" src="<?=EVENT_PHOTO?>no_event.jpg" alt="No Image" /> 
                                             </div>
                                             <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height: 120px;"> </div>
                                             <div>
                                                <input type="hidden" id="old_photo" name="old_photo">
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new" id="file_upload"> Select image </span>
                                                <input type="file" name="event_photo"
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
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('event_attachment'); ?></label>
                                       <div class="col-md-10">
                                          <input type="file" name="event_attachment[]" 
                                          accept="application/pdf" multiple>
                                          <div class="clearfix margin-top-10">
                                             <span class="label label-danger">NOTE!</span> File must be in .PDF File. 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                          <button type="button" id="submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
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
                  <input type="hidden" name="event_id" id="event_delete_id">
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

   <div id="throbber" style="display:none;">
    <img src="<?=ASSETS_PATH?>global/img/loading-spinner-default.gif" />&nbsp;
    <?=$this->lang->line('throbber_notification');?>
   </div>
   
</div>
<!-- END CONTENT -->
<script type = "text/javascript">
var save_post_event = "<?=base_url('Post_event/save_post_event');?>";
var view_post = "<?=base_url('Post_event/view_post_event')?>";
var fetch_single_post = "<?=base_url('Post_event/view_single_event')?>";
var delete_single_data = "<?=base_url('Post_event/delete_single_data')?>";
var send_notification = "<?=base_url('Post_event/send_notification')?>";
var old_photo;
var dataTable = '';

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

  dataTable = $('#dataTable').DataTable({
    dom: 'Bfrtip',
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
});

$('#submit_btn').on('click', function (e) {
  e.preventDefault();
  if ($(".event_form").valid()) {
    save_event();
  }
});

function save_event()
{
  if(CKEDITOR.instances['event_content'].getData() == '')
  {
    alert('Please enter event content');
  }
  else{
     
      $('#submit_btn').text('Saving...'); //change button text
      $('#submit_btn').attr('disabled', true); //set button disable 

    var data = new FormData($('#event_form')[0]);
    data.append('event_content', CKEDITOR.instances['event_content'].getData());

    $.ajax({
      url: save_post_event,
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
  
}

function set_details(id) {
  $("#tab_1_1_nav").removeClass("active");
  $('#tab_1_2_nav').addClass('active');
  $("#tab_1_1").removeClass("active in");
  $('#tab_1_2').addClass('active in');

  $.ajax({
    url: fetch_single_post,
    type: "POST",
    data: {
      event_id: id
    },
    dataType: "JSON",
    success: function (data) {
      $('#event_id').val(data[0].event_id);
      $('#event_title').val(data[0].event_title);
      $('#event_time').val(data[0].event_time);
      $('#event_place').val(data[0].event_place);
      $('#attachments').hide();

      $('.btn-file').hide();

      if (data[0].event_photo != "no_event.jpg") {
        $('.remove_img').show();
        $('#img_preview').attr("src", "<?=EVENT_PHOTO?>" + data[0].event_photo);
        old_photo = data[0].event_photo;
      }

      $('#event_date').datepicker("setDate", customjs_date(data[0].event_date));
      CKEDITOR.instances['event_content'].setData(data[0].event_content);
    }
  });
}


function remove_image() {
  $('#old_photo').val(old_photo);
  $('.remove_img').hide();
  $('#modal_theme_danger').modal('hide');
  $("#img_preview").attr("src", "<?=EVENT_PHOTO?>" + "no_event.jpg");
}

function delete_details(id) {
  $('#modal_theme_delete').modal('show');
  $('#event_delete_id').val(id);
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
      event_id: id
    },
    dataType: "JSON",
    success: function (data) {
        
        if(data.status)
        {
          $.unblockUI();
          location.reload(true);
        }
        else
        {
          $.unblockUI();
          location.reload(true);
        } 
    }
  });
}

</script>
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
               <span><?=$this->lang->line('village_ttl');?></span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"><?=$this->lang->line('village_ttl');?>
         <small><?=$this->lang->line('village_history_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body">
                  <ul class="nav nav-tabs">
                     <li class="active" id="tab_1_1_nav">
                        <a href="#tab_1_1" data-toggle="tab"> <?=$this->lang->line('view_village_history');?>
                        </a>
                     </li>
                     <li id="tab_1_2_nav">
                        <a href="#tab_1_2"  data-toggle="tab"> <?=$this->lang->line('add_village_history');?>
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
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('list_village_history');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" 
                                 width="100%" id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> <?=$this->lang->line('village_name');?> </th>
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
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-edit"></i>
                                 <span class="caption-subject sbold uppercase"> Add new village history
                                 </span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal history-form" id="history-form" method="post" 
                              enctype="multipart/form-data">
                              <input type="hidden" name="history_id" id="history_id">
                                 <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold">
                                        <?=$this->lang->line('select_village');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-10">
                                          <select class="form-control select2me" id="village_id" name="village_id" data-placeholder="Select Village">
                                          </select>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                                    <label class="control-label col-md-2 sbold">
                                                      <?=$this->lang->line('photo');?>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img id="img_preview" src="<?=VILLAGE_PHOTO?>no_village.jpg" alt="No Village Photo" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                              <input type="hidden" id="old_photo" name="old_photo">
                                                                <span class="btn default btn-file">     
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="village_photo"
                                                                     id="village_photo" accept="image/jpg, image/jpeg, image/png"> </span>
                                                                <a href="#modal_theme_danger" data-toggle="modal" class="btn red remove_img" style="display: none;"> Remove 
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">NOTE!</span> Image must be in .PNG, .JPG, .JPEG File. </div>
                                                    </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('village_history');?></label>
                                       <div class="col-md-10">
                                          <textarea class="ckeditor form-control" id="village_history" 
                                          rows="10">
                                          </textarea>
                                       </div>
                                    </div>                                    

                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                          <button type="button" id="submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
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
                  <input type="hidden" name="history_id" id="history_delete_id">
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
</div>
<!-- END CONTENT -->
<script type = "text/javascript">
var save_history = "<?=base_url('Village_history/save_history');?>";
var fetch_single_history = "<?=base_url('Village_history/fetch_single_history');?>";
var delete_single_data = "<?=base_url('Village_history/delete_single_data')?>";
var old_photo = '';
var dataTable;
 $(document).ready(function() {
    
    get_villages_list();

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
            "url":"<?=base_url('Village_history/view_village_history')?>",
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
      if(CKEDITOR.instances.village_history.getData() == '')
      {
        alert('Please Enter Village History');
      }
      else
      {
        if($(".history-form").valid())
        {
          $('#submit_btn').text('Saving...'); 
          $('#submit_btn').attr('disabled',true); 
         
          var data = new FormData($('#history-form')[0]);
          data.append('village_history', CKEDITOR.instances['village_history'].getData());

           $.ajax({
              url: save_history,
              method: "POST",
              dataType: "JSON",
              data: data,
              contentType: false,
              cache: false,
              processData: false,
              success:function(data)
              {
                $('#submit_btn').text('Submit');
                $('#submit_btn').attr('disabled',false); //set button enable       

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
                $('#submit_btn').text('Submit');
                $('#submit_btn').attr('disabled',false); //set button enable       
                 
                alert('Error! Something Went Wrong'); 
              }
           });
        
        }  
      }

});

$("#village_photo").change(function() {
       readImgURL(this);
});

CKEDITOR.config.toolbar = [
   ['Styles','Format','Font','FontSize'],
   '/',
   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste'],
   '/',
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Link']
];

CKEDITOR.config.height = 600;

function delete_details(id) {
  $('#modal_theme_delete').modal('show');
  $('#history_delete_id').val(id);
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

function edit_details(id)
{

  $("#tab_1_1_nav").removeClass("active");
  $('#tab_1_2_nav').addClass('active');
  $("#tab_1_1").removeClass("active in");
  $('#tab_1_2').addClass('active in');
  
  $.ajax({
    url : fetch_single_history,
    type: "POST",
    data: { history_id : id},
    dataType: "JSON",
    success: function(data)
    {
      $('#history_id').val(data[0].history_id);
      $('.btn-file').hide();
      $('#village_id').width("100%");
      $('#village_id').select2().select2('val',data[0].village_id);
      $('#village_id').val(data[0].village_id).trigger('change');

      if(data[0].village_photo!="no_village.jpg")
      {
        $('.remove_img').show();
        $('#img_preview').attr("src", "<?=VILLAGE_PHOTO?>" + data[0].village_photo);
        old_photo = data[0].village_photo;
      }

      CKEDITOR.instances['village_history'].setData(data[0].village_history);
    }
  });
}

function remove_image() {
  $('#old_photo').val(old_photo);
  $('.remove_img').hide();
  $('#modal_theme_danger').modal('hide');
  $("#img_preview").attr("src", "<?=VILLAGE_PHOTO?>" + "no_village.jpg");
}

</script>
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
               <span><?=$this->lang->line('samaj_ttl');?></span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"><?=$this->lang->line('samaj_ttl');?>
         <small><?=$this->lang->line('samaj_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body" id="blockui_sample_1_portlet_body">
                  <ul class="nav nav-tabs">
                     <li class="active" id="tab_1_1_nav">
                        <a href="#tab_1_1" data-toggle="tab"><?=$this->lang->line('samaj_proud_cat');?>
                        </a>
                     </li>
                     <li id="tab_1_2_nav">
                        <a href="#tab_1_2"  data-toggle="tab"><?=$this->lang->line('view_samaj_proud');?>
                        </a>
                     </li>
                     <li id="tab_1_3_nav">
                        <a href="#tab_1_3"  data-toggle="tab"><?=$this->lang->line('add_samaj_proud');?>
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
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('samaj_proud_cat');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="cate_form" method="post">
                                      <input type="hidden" name="prc_id" id="prc_id">
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
                                                   <input type="text" class="form-control" name="prc_name" id="prc_name">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter Proud Category Name</span>
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
                                       <table class="table table-striped table-bordered dt-responsive table-hover" width="100%" id="proud_cat_tbl">
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
                                 <i class="fa fa-trophy"></i>
                                 <span class="caption-subject sbold uppercase">
                                  <?=$this->lang->line('view_samaj_proud');?>
                                  </span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> <?=$this->lang->line('category_name');?> </th>
                                          <th> <?=$this->lang->line('name');?> </th>
                                          <th> <?=$this->lang->line('village');?></th>
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
                                 <span class="caption-subject sbold uppercase">
                                  <?=$this->lang->line('add_samaj_proud');?>
                                 </span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal proud-form" id="proud-form" method="post" 
                              enctype="multipart/form-data">
                              <input type="hidden" name="pr_id" id="pr_id">
                                 <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('select_cat');?>
                                        <span class="required">*</span>
                                       </label>
                                       <div class="col-md-10">
                                          <select class="form-control select2me" 
                                          name="sprc_id" id="sprc_id">
                                          </select>
                                       </div>
                                     </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-2 control-label sbold">
                                        <?=$this->lang->line('name');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-10">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                             </span>
                                             <input type="text" class="form-control" name="full_name" id="full_name">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Enter Full Name in english</span>
                                          </div>
                                       </div>
                                    </div>

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
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('desc');?></label>
                                       <div class="col-md-10">
                                          <textarea class="ckeditor form-control" id="proud_details" 
                                          rows="10">
                                          </textarea>
                                       </div>
                                    </div>  

                                    <div class="form-group form-md-line-input" id="images">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('upload_photos');?></label>
                                       <div class="col-md-10">
                                          <input type="file" id="photo_list" name="photo_list[]" accept="image/jpg, image/jpeg" multiple>
                                          <div class="clearfix margin-top-10">
                                             <span class="label label-danger">NOTE!</span> Image must be in .jpg or .jpeg or .png File. 
                                          </div>
                                       </div>
                                    </div> 

                                    <div class="form-group form-md-line-input" id="attachments">
                                       <label class="control-label col-md-2 sbold">Upload Attachment</label>
                                       <div class="col-md-10">
                                          <input type="file" id="post_attachment" name="post_attachment[]" accept="application/pdf" multiple>
                                          <div class="clearfix margin-top-10">
                                             <span class="label label-danger">NOTE!</span> File must be in .PDF File. 
                                          </div>
                                       </div>
                                    </div>


                                    <div class="form-group form-md-line-input" id="images_previews" style="display: none;">
                                       <label class="control-label col-md-2 sbold">Images</label>
                                        <div id="image_setter"> 
                                          
                                          </div>
                                       </div>
                                    </div>                                  

                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                          <button type="button" id="submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
                                          <button type="reset" onclick="location.reload();" class="btn default">Cancel</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                              <div id="throbber" style="display:none;">
                                <img src="<?=ASSETS_PATH?>global/img/loading-spinner-default.gif" />&nbsp;
                                <?=$this->lang->line('throbber_desc');?>
                              </div>
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
   <div id="throbber_noti" style="display:none;">
    <img src="<?=ASSETS_PATH?>global/img/loading-spinner-default.gif" />&nbsp;
    <?=$this->lang->line('throbber_notification');?>
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
            <form method="post" id="deletecatform">
               <div class="modal-body">
                  <input type="hidden" name="prc_id" id="delete_prc_id">
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

      <div id="modal_det_delete" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-red">
               <button type="button" class="close" data-dismiss="modal">×
               </button>
               <h6 class="modal-title">Delete
               </h6>
            </div>
            <form method="post" id="deletedetform">
               <div class="modal-body">
                  <input type="hidden" name="id" id="modal_det_id">
                  <h6 class="text-semibold">
                     <i class="fa fa-trash">
                     </i>&nbsp;Are you sure you want to delete this data?
                  </h6>
               </div>
            </form>
            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close
               </button>
               <button type="button" class="btn btn-danger" onclick="delete_det_data()">Delete
               </button>
            </div>
         </div>
      </div>
      </div>

</div>
<!-- END CONTENT -->
<script type = "text/javascript">
var save_proud = "<?=base_url('Samaj_proud/save_proud');?>";
var fetch_single_proud = "<?=base_url('Samaj_proud/fetch_single_proud');?>";
var view_proud = "<?=base_url('Samaj_proud/view_proud')?>";
var send_notification = "<?=base_url('Samaj_proud/send_notification')?>";
var send_proud_notification = "<?=base_url('Samaj_proud/send_proud_notification')?>";
var getcounter = "<?=base_url('Samaj_proud/set_counter')?>";
var proud_cat_list = "<?=base_url('Samaj_proud/proud_cat_list')?>";
var save_proud_cat = "<?=base_url('Samaj_proud/save_proud_cat')?>";
var delete_single_cate = "<?=base_url('Samaj_proud/delete_single_cate')?>";
var delete_det = "<?=base_url('Samaj_proud/delete_single_detail')?>";
var dataTable = '';
var cat_form = "cate_form";


 $(document).ready(function() {    
    view_proud_category_tbl(proud_cat_list);
  });

function delete_cat_data()
{
  $.ajax({
    url: delete_single_cate,
    type: "POST",
    data: $('#deletecatform').serialize(),
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

function delete_det_data()
{
  $.ajax({
    url: delete_det,
    type: "POST",
    data: $('#deletedetform').serialize(),
    dataType: "JSON",
    success: function (data) {
      $('#modal_det_delete').modal('hide');

      if (data.delete_status) {
        delete_modal();
      } else {
        fail_delete_modal();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $('#modal_det_delete').modal('hide');
      alert('Error! Something Went Wrong');
    }

  }); 
}

function samaj_table()
{
  dataTable = $('#dataTable').DataTable({ 
        "destroy": true,
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
            "url": view_proud,
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

$('#cat_submit_btn').on('click', function (e) {
    e.preventDefault();
           if($("#prc_name").val() != '')
           {
              save_data(save_proud_cat,cat_form,'cat_submit_btn');
           }
           else
           {
            alert('Please enter proud category name');
           }
  });

$('#submit_btn').on('click', function (e) {
      e.preventDefault();
      if($('#photo_list').val()!="")
      {
        if($(".proud-form").valid())
        {
           
          $('#submit_btn').text('Saving...'); 
          //$('#submit_btn').attr('disabled',true); 
          
         
          var data = new FormData($('#proud-form')[0]);
          data.append('proud_details', CKEDITOR.instances['proud_details'].getData());

         $.ajax({
            url: save_proud,
            method: "POST",
            dataType: "JSON",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
              if(data.insert_status)
              {
                success_toast();
                send_notification_users(data.insert_id,data.name,data.photo);
              }
              else if(data.update_status == true)
                update_modal();
              else if(data.update_status == false)
                fail_update_modal();
              else
                fail_modal();
                 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               alert('Error! Something Went Wrong'); 
            }
         });
          
        } 
      }
      else
      {
        alert('Photo is required. Please upload photo first!');
      }
                        
     
});

CKEDITOR.config.toolbar = [
   ['Styles','Format','Font','FontSize'],
   '/',
   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste'],
   '/',
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Link']
];

CKEDITOR.config.height = 500;

function delete_details(id)
{
  $('#modal_det_delete').modal('show');
  $('#modal_det_id').val(id);

}

function send_notification_users(id,name,photo)
{
  $.blockUI({ message: $('#throbber_noti'),target: '#blockui_sample_1_portlet_body',boxed: true });
  $.ajax({
    url: send_proud_notification,
    type: "POST",
    data: {
      pr_id: id,
      full_name : name,
      photo : photo
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

function edit_details(id)
{
  var html = '';
  $("#tab_1_2_nav").removeClass("active");
  $('#tab_1_3_nav').addClass('active');
  $("#tab_1_2").removeClass("active in");
  $('#tab_1_3').addClass('active in');
  
  $.ajax({
    url : fetch_single_proud,
    type: "POST",
    data: { pr_id : id},
    dataType: "JSON",
    success: function(data)
    {
      $('#pr_id').val(data[0].pr_id);
      
      $('#sprc_id').width("100%");
      $('#sprc_id').select2().select2('val',data[0].prc_id);
      $('#sprc_id').val(data[0].prc_id).trigger('change');

      $('#full_name').val(data[0].full_name);

      $('#village_id').width("100%");
      $('#village_id').select2().select2('val',data[0].village_id);
      $('#village_id').val(data[0].village_id).trigger('change');

      for(var i=0;i<data[0].photo_list.length;i++)
      {        
        html  = '<label class="control-label col-md-2 sbold"></label><div class="col-md-10" style="margin-bottom:10px"><img src="<?=PROUD_PHOTO?>'+data[0].photo_list[i]+'" height="150" width="200"/></div>';
        $('#image_setter').append(html);
      }     

      $('#images_previews').show();
      $('#images').hide();
      $('#attachments').hide();

      CKEDITOR.instances['proud_details'].setData(data[0].proud_details);
    }
  });
}

$('.nav a').click(function (e) {
            
        var tab = this.hash;

        if(tab == '#tab_1_2')
        {
          get_villages_list();
          get_proud_cat_list();
          samaj_table();
          view_proud_category_tbl(proud_cat_list);
        }
        else if(tab == '#tab_1_3')
        {
          get_villages_list();
          get_proud_cat_list();
          view_proud_category_tbl(proud_cat_list);
        }
  });

</script>
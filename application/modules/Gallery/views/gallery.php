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
               <span><?=$this->lang->line('gallery_ttl');?></span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold"> <?=$this->lang->line('gallery_ttl');?>
         <small><?=$this->lang->line('gallery_desc');?></small>
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
                        <?=$this->lang->line('album_category');?>
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_2" data-toggle="tab">
                        <?=$this->lang->line('add_image_gallery');?>
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_3" data-toggle="tab"> 
                        <?=$this->lang->line('view_image_gallery');?>
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
                                       <i class="fa fa-image"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('add_album_category');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal album_form" id="album_form" >
                                      <input type="hidden" name="album_id" id="album_id">

                                       <div class="form-body">

                                          <div class="form-group form-md-line-input">
                                             <label class="col-md-3 control-label sbold" for="form_control_1"><?=$this->lang->line('album_name');?>
                                             <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9">
                                                <div class="input-group">
                                                   <span class="input-group-addon">
                                                   <i class="fa fa-image"></i>
                                                   </span>
                                                   <input type="text" class="form-control" name="album_name" id="album_name">
                                                   <div class="form-control-focus"> </div>
                                                   <span class="help-block">Enter Album Name</span>
                                                </div>
                                             </div>
                                          </div>
                                           
                                          <div class="form-group form-md-line-input">
                                           <label class="control-label col-md-3 sbold"><?=$this->lang->line('album_date');?><span class="required">*</span></label>
                                           <div class="col-md-9">
                                            <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                             </span>
                                              <input class="form-control date-picker" id="date" type="text" name="date" />
                                              <span class="help-block"> Album date </span>
                                            </div>
                                           </div>
                                          </div> 


                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="album_submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
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
                                       <i class="fa fa-image"></i>
                                       <span class="caption-subject sbold uppercase"><?=$this->lang->line('album_category');?></span>
                                    </div>
                                 </div>
                                 <div class="portlet-body">
                                    <div class="table-container">
                                       <table class="table table-striped table-bordered dt-responsive table-hover" width="100%" id="album_datatable">
                                          <thead>
                                             <tr>
                                                <th> # </th>
                                                <th> <?=$this->lang->line('album_name');?> </th>
                                                <th> <?=$this->lang->line('album_date');?> </th>
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
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-file-photo-o"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('add_image_gallery');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal gallery-form" method="post" 
                              enctype="multipart/form-data" id="gallery_form">

                                 <div class="form-body">
                                     <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('album_name');?>
                                        <span class="required">*</span>
                                       </label>
                                       <div class="col-md-10">
                                          <select class="form-control select2me" 
                                          name="album_id" id="albums_id">
                                          </select>
                                       </div>
                                     </div>                                  

                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-2 sbold"><?=$this->lang->line('upload_photos');?></label>
                                       <div class="col-md-10">
                                          <input type="file" id="img_file" name="photo_name[]" accept="image/png,image/jpg,image/jpeg" multiple>
                                          <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">NOTE!</span> Image must be in .jpg or .jpeg or .png File. </div>
                                       </div>
                                    </div>
                                    
                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                          <button type="button" id="submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
                                          <button type="reset" class="btn default"><?=$this->lang->line('reset')?></button>
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
                     <div class="tab-pane fade" id="tab_1_3">
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-file-photo-o"></i>
                                 <span class="caption-subject sbold uppercase"> <?=$this->lang->line('view_image_gallery');?></span>
                              </div>
                           </div>
                           
                           <div class="portlet-body">
                            <div align="right" id="pagination_link"></div>
                            <div class="content" id="gallery_content"></div>
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
<div id="modal_album_delete" class="modal fade">
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
                  <input type="hidden" name="album_id" id="delete_album_id">
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
<div id="modal_theme_danger" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="delete_form" method="post">
                                <div class="modal-header bg-red">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h6 class="modal-title">Delete</h6>
                                </div>

                                <input type="hidden" id="hiddenid" name="photo_id"/>
                                <input type="hidden" id="hiddenpic" name="photo_name"/>
                                
                                <div class="modal-body">
                                    <h6 class="text-semibold"><i class="fa fa-trash"></i>&nbsp;Are you sure you want to delete this photo?</h6>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" onclick="delete_photo()">Delete</button>
                                </div>
                            </form>
                            </div>
                        </div>
</div>
</div>
<!-- END CONTENT -->
<script type="text/javascript">
  var save_gallery = "<?=base_url('Gallery/save_gallery');?>";
  var save_album = "<?=base_url('Gallery/save_album');?>";
  var dataTable;
  var view_album = "<?=base_url('Gallery/view_album');?>";
  var album_form = 'album_form';
  var delete_single_data = "<?=base_url('Gallery/delete_album');?>";

  $(document).ready(function() {
      view_album_category(view_album);
  });

  $('#album_submit_btn').on('click', function (e) {
    e.preventDefault();
           if($(".album_form").valid())
              save_data(save_album,album_form,'album_submit_btn');
  });

  $('#submit_btn').on('click', function (e) {
      e.preventDefault();
      if($('#img_file').val() == '')
      {
        alert('Please Upload Photos');
      }
      else
      {
          if($(".gallery-form").valid())
          {
            
            $('#submit_btn').text('Saving...'); //change button text
            $('#submit_btn').attr('disabled',true); //set button disable 
              
            $.blockUI({ message: $('#throbber'),target: '#blockui_sample_1_portlet_body',boxed: true });

             $.ajax({
                url: save_gallery,
                method: "POST",
                dataType: "JSON",
                data: new FormData($('#gallery_form')[0]),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                  $('#submit_btn').text('Submit');
                  $('#submit_btn').attr('disabled',false); //set button enable       
                  $.unblockUI();  
                  document.getElementById('gallery_form').reset();
                  $("#albums_id").val('').trigger('change');

                  if(data.insert_status)
                    success_toast();
                  else
                    fail_toast();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                   $.unblockUI();
                   alert('Error! Something Went Wrong');
                }
             });
              
          } 
      }
                            
});

 $(document).ready(function() {

   lc_lightbox('.elem', {
    wrap_class: 'lcl_fade_oc',
    gallery : true, 
    thumb_attr: 'data-lcl-thumb', 
    
    skin: 'minimal',
    radius: 0,
    padding : 0,
    border_w: 0,
  });

    $('.nav a').click(function (e) {
            
        var tab = this.hash;

        if(tab == '#tab_1_2')
          get_album_list();
        else if(tab == '#tab_1_3')
        {
          load_gallery(1);
          $(document).on("click", ".pagination li a",function(event)
          {
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_gallery(page);            
          });
        }
     }); 
    }); 

function load_gallery(page){

  $.ajax({
  url: "<?=base_url('Gallery/fetch_gallery/')?>"+page,
  method: "GET",
  dataType: "JSON",
  success: function(data)
  {
    $('#gallery_content').html(data.gallery_content);
    $('#pagination_link').html(data.pagination_link);
  }
});

}

function set_photo_id(id,photo)
{
  $('#hiddenid').val(id);
  $('#hiddenpic').val(photo);
  $('#modal_theme_danger').modal('show');
}

function delete_photo()
{
    var delete_url = "<?=base_url('Gallery/delete_gallery_photo');?>";
     $.ajax({
        url : delete_url,
        type: "POST",
        data: $('#delete_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.response_status)
            {
                $('#modal_theme_danger').modal('hide');
                location.reload();
            }
            else
            {
                 $('#modal_theme_danger').modal('hide');
                 location.reload();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Sorry! Photo could not be delete'); 
        }
      });
}

function delete_data() {
  $.ajax({
    url: delete_single_data,
    type: "POST",
    data: $('#deleteform').serialize(),
    dataType: "JSON",
    success: function (data) {
      $('#modal_album_delete').modal('hide');

      if (data.delete_status) {
        delete_modal();
      } else {
        fail_delete_modal();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $('#modal_album_delete').modal('hide');
      alert('Error! Something Went Wrong');
    }

  });
}

</script>              
             
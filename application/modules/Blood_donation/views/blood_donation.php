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

               <span><?=$this->lang->line('blood_ttl');?></span>

            </li>

         </ul>

      </div>

      <!-- END PAGE BAR -->

      <!-- BEGIN PAGE TITLE-->

      <h1 class="page-title sbold"><?=$this->lang->line('blood_ttl');?>

         <small><?=$this->lang->line('blood_desc');?></small>

      </h1>

      <!-- END PAGE TITLE-->

      <!-- END PAGE HEADER-->

      <div class="row">

         <div class="col-md-12">

            <div class="portlet light bordered">

               <div class="portlet-body" id="blockui_sample_1_portlet_body">

                  <ul class="nav nav-tabs">

                     <li class="active" id="tab_1_1_nav">

                        <a href="#tab_1_1" data-toggle="tab"><?=$this->lang->line('view_blood_noti');?>

                        </a>

                     </li>

                     <li id="tab_1_2_nav">

                        <a href="#tab_1_2"  data-toggle="tab"><?=$this->lang->line('add_blood_noti');?>

                        </a>

                     </li>

                     <li id="tab_1_3_nav">

                        <a href="#tab_1_3"  data-toggle="tab">Birthday Notification

                        </a>

                     </li>

                  </ul>

                  <div class="tab-content">

                     <div class="tab-pane fade active in" id="tab_1_1">

                        <!-- Begin: life time stats -->

                        <div class="portlet light portlet-fit portlet-datatable">

                           <div class="portlet-title">

                              <div class="caption">

                                 <i class="fa fa-tint"></i>

                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('view_blood_noti');?></span>

                              </div>

                           </div>

                           <div class="portlet-body">

                              <div class="table-container">

                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="dataTable">

                                    <thead>

                                       <tr>

                                          <th> # </th>

                                          <th> <?=$this->lang->line('blood_grp');?> </th>

                                          <th> <?=$this->lang->line('date');?> </th>

                                          <th> <?=$this->lang->line('place');?> </th>

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

                     <div class="tab-pane fade" id="tab_1_2">

                        <div class="portlet light portlet-fit portlet-form ">

                           <div class="portlet-title">

                              <div class="caption">

                                 <i class="fa fa-tint"></i>

                                 <span class="caption-subject sbold uppercase"> <?=$this->lang->line('add_blood_noti');?>

                                 </span>

                              </div>

                           </div>

                           <div class="portlet-body">

                              <!-- BEGIN FORM-->

                              <form class="form-horizontal blood-form" id="blood-form" 

                                method="post" enctype="multipart/form-data">



                                 <div class="form-body">

                                    <div class="form-group form-md-line-input">

                                       <label class="control-label col-md-2 sbold">

                                        <?=$this->lang->line('blood_grp');?>

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-10">

                                          <select class="form-control select2me" name="blood_grp" 

                                          data-placeholder="Select" id="blood_grp">

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

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                           <label class="control-label col-md-2 sbold">

                                            <?=$this->lang->line('date');?>

                                            <span class="required">*</span></label>

                                           <div class="col-md-10">

                                            <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-calendar"></i>

                                             </span>

                                              <input class="form-control date-picker" id="req_date" type="text" 

                                              name="req_date" value="<?php date('dd-mm-YY');?>" />

                                              <span class="help-block">Require date</span>

                                           </div>

                                         </div>

                                          </div> 



                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-2 control-label sbold" for="form_control_1">

                                        <?=$this->lang->line('place');?>

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-10">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-map-marker"></i>

                                             </span>

                                             <input type="text" class="form-control" name="place" id="place">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">Enter Place Name</span>

                                          </div>

                                       </div>

                                    </div>      



                                    <div class="form-group form-md-line-input">

                                       <label class="control-label col-md-2 sbold">

                                        <?=$this->lang->line('desc');?>

                                        </label>

                                       <div class="col-md-10">

                                          <textarea class="ckeditor form-control" id="description" 

                                          rows="10">

                                          </textarea>

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

                     <div class="tab-pane fade" id="tab_1_3">

                        <!-- Begin: life time stats -->

                        <div class="portlet light portlet-fit portlet-datatable">

                           <div class="portlet-title">

                              <div class="caption">

                                 <i class="fa fa-calander"></i>

                                 <span class="caption-subject sbold uppercase">Birthday Notification</span>

                              </div>

                           </div>

                           <div class="portlet-body">

                              <div class="table-container">

                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="bday_dataTable">

                                    <thead>

                                       <tr>

                                          <th> # </th>

                                          <th> Name </th>

                                          <th> Birthday </th>

                                          <th><?=$this->lang->line('action');?></th>

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

                  <input type="hidden" name="bd_id" id="bd_id">

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

var save_blood = "<?=base_url('Blood_donation/save_blood');?>";

var fetch_data = "<?=base_url('Blood_donation/view_blood')?>";

var delete_single_data = "<?=base_url('Blood_donation/delete_single_data')?>";

var bday_list = "<?=base_url('Blood_donation/get_birthday_list')?>";

var send_notifications = "<?=base_url('Blood_donation/send_bday_notification')?>";

 $(document).ready(function() {    

   $('.nav a').click(function (e) {
            
        var tab = this.hash;
        if(tab == '#tab_1_3')
          view_bday_table(bday_list,send_notifications);
    });

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

            "url": fetch_data,

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

      if($(".blood-form").valid())

      {

        $('#submit_btn').text('Saving...'); 

        $('#submit_btn').attr('disabled',true);



        $.blockUI({ message: $('#throbber'),target: '#blockui_sample_1_portlet_body',boxed: true });

        var data = new FormData($('#blood-form')[0]);

        data.append('description', CKEDITOR.instances['description'].getData());



       $.ajax({

          url: save_blood,

          method: "POST",

          dataType: "JSON",

          data: data,

          contentType: false,

          cache: false,

          processData: false,

          success:function(data)

          {

            $.unblockUI();

            if(data.insert_status)

              success_modal();

            else if(data.duplicate_status == true)

              warning_modal();

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

     

});



CKEDITOR.config.toolbar = [

   ['Styles','Format','Font','FontSize'],

   '/',

   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste'],

   '/',

   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Link']

];



function delete_setdata(id)

{

  $('#modal_theme_delete').modal('show');

  $('#bd_id').val(id);

}



function delete_data()

{

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

</script>
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
               <a href="<?=base_url('Pending_users');?>">Members Directory</a>
               <i class="fa fa-circle"></i>
            </li>
            <li>
               <span>Pending Users</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold">Pending users
         <small><?=$this->lang->line('member_small_desc');?></small>
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
                        View Pending Users
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_2" id="tab_1_2_nav" data-toggle="tab" style="display: none;"> 
                        Edit Pending User 
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="tab_1_1">
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-users"></i>
                                 <span class="caption-subject sbold uppercase">View Pending Users</span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
                                    id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> Member Name </th>
                                          <th> Village </th>
                                          <th> Mobile </th>
                                          <th> Photo </th>
                                          <th> City </th>
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
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-user-plus"></i>
                                 <span class="caption-subject sbold uppercase"> <?=$this->lang->line('add_members');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal pending_users-form" enctype="multipart/form-data" method="post" id="pending_users-form">
                                 <input type="hidden" name="member_id" id="member_id">
                                 <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                       <button class="close" data-close="alert"></button> <?=$this->lang->line('form_error');?>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">Member Name in English
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="full_name_eng" 
                                                autofocus="autofocus" name="full_name_eng">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member full name in english</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">Member Name in Gujarati
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-user sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="full_name_guj" name="full_name_guj">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member full name in gujarati</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Select Village
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select autofocus="autofocus" class="form-control select2me" name="village_id" id="village_id">
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Select Country
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select autofocus="autofocus" class="form-control select2me" name="country_id" id="country_id">
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Blood Group
                                       </label>
                                       <div class="col-md-9">
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
                                          <div class="form-control-focus"> </div>
                                          <span class="help-block"></span>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       City Name
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-building sbold"></i>
                                             </span>
                                             <input type="text" class="form-control" id="city_name" name="city_name">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member city name</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Mobile Number
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <a id="tel"><i class="fa fa-phone sbold"></i></a>
                                             </span>
                                             <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member mobile number</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Email Id
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <a id="mail"><i class="fa fa-envelope sbold"></i></a>
                                             </span>
                                             <input type="text" class="form-control" id="email_id" name="email_id">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Member email id</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">Birth Date<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar sbold"></i>
                                             </span>
                                             <input class="form-control date-picker" 
                                                id="birth_date" type="text" name="birth_date" />
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"> Member's birth date </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold" for="form_control_1">
                                       Address
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <textarea class="form-control" rows="6" id="address"></textarea>
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
                                                <img id="img_preview" src="<?=USER_PHOTO?>no_user.jpg" alt="No Image" /> 
                                             </div>
                                             <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 135px; max-height: 135px;"> </div>
                                             <div class="upload_custom">
                                                <input type="hidden" name="image_angle" id="image_angle">
                                                <input type="hidden" name="path" id="path">
                                                <input type="hidden" name="old_photo" id="old_photo">
                                                </span>
                                                <a href="#modal_theme_danger" data-toggle="modal" class="btn red remove_img" style="display: none;"> Remove </a>
                                                <input type="button" id="0angle" class="btn" value="0" onClick="rotateImage(this.value);" style="display: none;"/>
                                                <input type="button" id="90angle" class="btn" value="90" onClick="rotateImage(this.value);" style="display: none;"/>
                                                <input type="button" id="180angle" class="btn" value="180" onClick="rotateImage(this.value);" style="display: none;"/>
                                                <input type="button" id="270angle" class="btn" value="270" onClick="rotateImage(this.value);" style="display: none;"/>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-actions">
                                    <div class="row">
                                       <div class="col-md-offset-3 col-md-9">
                                          <button type="button" onclick="back_tab_view('tab_1_1','pending_users-form')" class="btn default">
                                          <i class="fa fa-long-arrow-left"></i>&nbsp;Back</button>
                                          <button type="button" id="approve_btn" class="btn green">
                                          <i class="fa fa-check"></i>&nbsp;Approve</button>
                                          <button type="button" href="#modal_theme_reject" data-toggle="modal" id="reject_btn" class="btn red">
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
          <input type="hidden" name="user_crop_id" id="user_crop_id">
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
   <div id="modal_theme_reject" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-red">
               <button type="button" class="close" data-dismiss="modal">×</button>
               <h6 class="modal-title">Reject</h6>
            </div>
            <form id="reject_form" method="post" name="reject_form">
               <input type="hidden" name="member_id" id="reject_member_id">
               <div class="modal-body">
                  <h6 class="text-semibold"><i class="fa fa-times"></i>&nbsp;Are you sure do you want to reject this account?</h6>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger" onclick="reject_account()">Reject Account
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div id="modal_theme_del" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-red">
               <button type="button" class="close" data-dismiss="modal">×</button>
               <h6 class="modal-title">Delete</h6>
            </div>
            <form id="del_form" method="post" name="del_form">
               <input type="hidden" name="member_id" id="del_member_id">
               <div class="modal-body">
                  <h6 class="text-semibold"><i class="fa fa-trash"></i>&nbsp;Are you sure do you want to delete this data?</h6>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger" onclick="delete_member()">Delete
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- END CONTENT -->

<script type="text/javascript">

var member_approve_url = "<?=base_url('Pending_users/approve_member')?>";

var reject_url = '<?=base_url('Pending_users/reject_member')?>';

var view_members_url = "<?=base_url('Pending_users/view_datatable_members')?>";     

var fetch_url = "<?=base_url('Pending_users/get_member_data')?>";

var delete_member_url = "<?=base_url('Pending_users/delete_member')?>";

var crop_image_url = "<?=base_url('Pending_users/crop_photo')?>";

var dataTable;



$(document).ready(function() {

    

    get_villages_list();

    get_countries_list();

    member_details_tbl();

});

function set_modal_image(id,photo)
{
    $('#cropimagepreview').attr('src', photo); 
    $('#user_crop_id').val(id);
    $('#imagemodal').modal('show');
    //return false;
}


$('#approve_btn').click(function(e) {

  e.preventDefault();

  if ($('.pending_users-form').valid()) 

      aprove_member();

  });

function delete_member()
{
  $.ajax({

      url : delete_member_url,

      type: "POST",

      data: $('#del_form').serialize(),

      dataType: "JSON",

      success: function(data)
      {
        $('#modal_theme_del').modal('hide');

        if(data.delete_status)
        {
          delete_modal();

        }
        else
        {
          fail_delete_modal();
        }
      },

      error: function (jqXHR, textStatus, errorThrown)

      {
          $('#modal_theme_del').modal('hide');
         alert('Error! Something Went Wrong'); 

      }


    });
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

function aprove_member()

{

    $('#approve_btn').text('Saving...'); //change button text

    $('#approve_btn').attr('disabled',true);



    $.blockUI({ message: $('#throbber'),target: '#blockui_sample_1_portlet_body' });

    var data = new FormData($('#pending_users-form')[0]);

    data.append('address', $('#address').val());


    $.ajax({

      url : member_approve_url,

      method: "POST",

      dataType: "JSON",

      data: data,

      contentType: false,

      cache: false,

      processData: false,

      success: function(data)

      {

        if(data.insert_status == true)

        {

          $.unblockUI();

          $('#approve_btn').text('Submit');

          $('#approve_btn').attr('disabled',false); //set button enable       

          swal({

              title: "Success",

              text: "એકાઉન્ટ અપ્રુવલ થઇ ગયું છે અને ડિટેઇલ મોકલાઈ ગઈ છે",

              type: "success"

          }, function() {

              location.reload();

          });

        }

        else if(data.acc_info_status == true)

        {

          $.unblockUI();

          $('#approve_btn').text('Submit');

          $('#approve_btn').attr('disabled',false); //set button enable       

          swal({

              title: "Fail",

              text: "એકાઉન્ટ ડિટેઇલ નથી પોંહચી",

              type: "warning"

          }, function() {

             location.reload();

          });

        }

        

        else

        {

          $.unblockUI();

          $('#approve_btn').text('Submit');

          $('#approve_btn').attr('disabled',false); //set button enable       

          swal({

              title: "Fail",

              text: "સોરી ! એકાઉન્ટ એકટીવ ના થયું",

              type: "warning"

          }, function() {

              location.reload();

          });

        }

      },

      error: function (jqXHR, textStatus, errorThrown)

      {

        $.unblockUI();

        alert('Error! Something Went Wrong'); 

      }

    });

}



function rotateImage(degree)

{

  $('#image_angle').val(degree);

  $('#img_preview').animate({  transform: degree }, {

    step: function(now,fx) {

      

        $(this).css({

            '-webkit-transform':'rotate('+degree+'deg)', 

            '-moz-transform':'rotate('+degree+'deg)',

            'transform':'rotate('+degree+'deg)'

        });

    }

    });

}



function remove_image()

{

  $('#modal_theme_danger').modal('hide');

  $('#0angle').hide();

  $('#90angle').hide();

  $('#180angle').hide();

  $('.remove_img').hide();

  $('#270angle').hide();

  $('#path').val('true');

  $("#img_preview").attr("src","<?=USER_PHOTO?>"+"no_user.jpg");

}

function delete_details(id)
{
  $('#del_member_id').val(id);
  $('#modal_theme_del').modal('show');
}

function reject_account()

{

 var my_member_id = document.getElementById("member_id").value;

 $('#reject_member_id').val(my_member_id);



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



        swal({

            title: "Success",

            text: "એકાઉન્ટ રિજેક્ટ થઇ ગયું છે",

            type: "success"

        }, function() {

           location.reload();

        });

      }

      else

      {

        $('#modal_theme_reject').modal('hide');



        swal({

            title: "Fail",

            text: "એકાઉન્ટ રિજેક્ટ થયુ નથી",

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



function set_details(id)

{

  $('#tab_1_2_nav').show();

  $('#nav a[href="#tab_1_2"]').tab('show');



  $.ajax({

    url : fetch_url,

    type: "POST",

    data: { member_id : id},

    dataType: "JSON",

    success: function(data)

    {

       $('#member_id').val(id); 

       $('#city_name').val(data[0].city_name);

       $('#full_name_eng').val(data[0].full_name_eng);

       $('#full_name_guj').val(data[0].full_name_guj);

       

       if(data[0].photo != 'no_user.jpg') 

       {

        $('.remove_img').show();

        $('#0angle').show();

        $('#90angle').show();

        $('#180angle').show();

        $('#270angle').show();

        $("#img_preview").attr("src","<?=USER_PHOTO?>"+data[0].photo);

        $("#photo").val(data[0].photo);

        $('#old_photo').val(data[0].photo);

        $('.remove_img').show();

       }

       else

       {

          $('.remove_img').hide();

       }

       $('#blood_grp').val(data[0].blood_grp).trigger('change');

       $('#village_id').width("100%");

       $('#village_id').select2().select2('val',data[0].village_id);

       $('#village_id').val(data[0].village_id).trigger('change');

       $('#country_id').width("100%");

       $('#country_id').select2().select2('val',data[0].country_id);



       var bdte = js_date(data[0].birth_date);

       

       $(".date-picker").datepicker("update",bdte);

       $('#mobile_no').val(data[0].mobile_no);

       $("#tel").attr("href", "tel:"+data[0].mobile_no);

       $('#email_id').val(data[0].email_id);
       $("#mail").attr("href", "mailto:"+data[0].email_id);

       $('#address').val(data[0].address);

    },

    error: function (jqXHR, textStatus, errorThrown)

    {

       alert('Error! Something Went Wrong'); 

    }

  });

}



function member_details_tbl()

{

  dataTable = $('#dataTable').DataTable({ 

        dom: 'Bfrtip',

        lengthMenu: [[100, 500, 1000, -1], [100, 500, 1000, "All"]],

        buttons: [

                {

                    extend: 'print',

                    exportOptions: {

                        columns: [0,1,2,3,4,5,6]

                    }

                },

                {

                    extend : 'excelHtml5',

                    exportOptions:{

                        columns: [0,1,2,3,4,5,6]

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

            "url": view_members_url,

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

</script>                

             
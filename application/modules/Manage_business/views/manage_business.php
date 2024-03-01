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

               <span>Manage Business</span>

            </li>

         </ul>

      </div>

      <!-- END PAGE BAR -->

      <!-- BEGIN PAGE TITLE-->

      <h1 class="page-title sbold">Manage Business

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

                        View Manage Business

                        </a>

                     </li>

                     <li>

                        <a href="#tab_1_2" id="tab_1_2_nav" data-toggle="tab" style="display: none;"> 

                        Edit Manage Business 

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

                                 <span class="caption-subject sbold uppercase">View Manage Business</span>

                              </div>

                           </div>

                           <div class="portlet-body">

                              <div class="table-container">

                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"

                                  id="dataTable">

                                    <thead>

                                       <tr>

                                          <th> # </th>

                                          <th> Village </th>

                                          <th> Business Name </th>

                                          <th> Category </th>

                                          <th> Mobile </th>

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

                                 <i class="fa fa-user-plus"></i>

                                 <span class="caption-subject sbold uppercase"> Edit Matrimony</span>

                              </div>

                           </div>

                           <div class="portlet-body">

                              <!-- BEGIN FORM-->

                              <form class="form-horizontal pending_business-form" enctype="multipart/form-data" method="post" id="pending_business-form">

                                <input type="hidden" name="business_id" id="business_id">



                                 <div class="form-body">

                                    <div class="alert alert-danger display-hide">

                                       <button class="close" data-close="alert"></button> <?=$this->lang->line('form_error');?>

                                    </div>

                                    <table class="table table-bordered table-hover" width="100%">

                                            <thead>

                                                <tr>

                                                    <th> Village </th>

                                                    <th> Member Name </th>

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

                                    <div class="form-group form-md-line-input">

                                       <label class="control-label col-md-3 sbold">Payment Status

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <label class="label label-danger" id="fail_label" style="display: none;"></label>

                                          <label class="label label-success" id="success_label" style="display: none;">

                                          </label>

                                       </div>

                                    </div>

                                    <div class="form-group form-md-line-input">

                                       <label class="control-label col-md-3 sbold">Ad Duration

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <label class="control-label sbold" id="duration" style="display: none;"></label>

                                       </div>

                                    </div>

                                    <div class="form-group form-md-line-input">

                                       <label class="control-label col-md-3 sbold">Order Number

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <label class="control-label sbold" id="order" style="display: none;"></label>

                                       </div>

                                    </div>

                                    <div class="form-group form-md-line-input">

                                       <label class="control-label col-md-3 sbold">Business category

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <select class="form-control select2me" name="bc_id" 

                                          id="bc_id">

                                          </select>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                       <label class="control-label col-md-3 sbold">Country

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <select class="form-control select2me" name="country_id" 

                                          id="country_id">

                                          </select>

                                       </div>

                                    </div>

                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Owner Name

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-user"></i>

                                             </span>

                                             <input type="text" class="form-control" id="owner_name" 

                                             autofocus="autofocus" name="owner_name">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">owner name in english</span>

                                          </div>

                                       </div>

                                    </div>

                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Company name in English

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-briefcase"></i>

                                             </span>

                                             <input type="text" class="form-control" id="company_name_eng" 

                                             autofocus="autofocus" name="company_name_eng">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">company name in english</span>

                                          </div>

                                       </div>

                                    </div>

                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Company name in Gujarati

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-briefcase"></i>

                                             </span>

                                             <input type="text" class="form-control" id="company_name_guj" 

                                             name="company_name_guj">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">company name in gujarati</span>

                                          </div>

                                       </div>

                                    </div>

                                    

                                     <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Service Area

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-map-marker"></i>

                                             </span>

                                             <input type="text" class="form-control" id="area" 

                                             name="area">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">Service area name</span>

                                          </div>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Mobile Number

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-phone"></i>

                                             </span>

                                             <input type="text" class="form-control" id="mobile_no" 

                                             name="mobile_no">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">Mobile number</span>

                                          </div>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Whatsapp mobile Number

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-whatsapp"></i>

                                             </span>

                                             <input type="text" class="form-control" id="wp_mobile_no" 

                                             name="wp_mobile_no">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">Whatsapp mobile number</span>

                                          </div>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Email

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-envelope"></i>

                                             </span>

                                             <input type="text" class="form-control" id="email" 

                                             name="email">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">Email</span>

                                          </div>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Website

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-globe"></i>

                                             </span>

                                             <input type="text" class="form-control" id="website" 

                                             name="website">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">Website name</span>

                                          </div>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold">Timing

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="input-group">

                                             <span class="input-group-addon">

                                             <i class="fa fa-clock-o"></i>

                                             </span>

                                             <input type="text" class="form-control" id="timing" 

                                             name="timing">

                                             <div class="form-control-focus"> </div>

                                             <span class="help-block">Business timing</span>

                                          </div>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold" >

                                       Business Address

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <textarea class="form-control" rows="6" id="address"></textarea>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input">

                                       <label class="col-md-3 control-label sbold" >

                                       Business Details

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                             <textarea class="form-control" rows="6" id="details"></textarea>

                                       </div>

                                    </div>



                                    <div class="form-group form-md-line-input last">

                                       <label class="control-label col-md-3 sbold">

                                       Photo

                                       <span class="required">*</span>

                                       </label>

                                       <div class="col-md-9">

                                          <div class="fileinput fileinput-new" data-provides="fileinput">

                                             <div class="fileinput-new thumbnail" style="width: 250px; height: 150px;">

                                                <img id="img_preview" src="<?=BUSINESS_PHOTO?>no_business.jpg" 

                                                alt="No Image" /> 

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

                                        <button type="button" onclick="back_tab_view('tab_1_1','pending_business-form')" class="btn default">

                                          <i class="fa fa-long-arrow-left"></i>&nbsp;Back</button>

                                          <button type="button" style="display: none;" id="update_btn" class="btn green">

                                            <i class="fa fa-check"></i>&nbsp;Update</button>

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
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" id="crop_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Image preview</h4>
        </div>
        <div class="modal-body">
          <img src="" id="cropimagepreview" style="width: 350px;height: 250px;border: 2px solid;">
          <input type="hidden" name="bus_crop_id" id="bus_crop_id">
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

<div id="modal_theme_disable" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            

            <div class="modal-header bg-red">

                <button type="button" class="close" data-dismiss="modal">×</button>

                <h6 class="modal-title">Disable</h6>

            </div>

            <form id="disable_form" method="post" name="disable_form">
              <input type="hidden" name="business_id" id="disable_hidden_id">            

            <div class="modal-body">


                <h6 class="text-semibold"><i class="fa fa-trash"></i>&nbsp;Are you sure you want to disable this ad?</h6>

            </div>

            </form>

            <div class="modal-footer">

                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-danger" onclick="disable_account()">Disable Ad

                </button>

            </div>

        

        </div>

    </div>
</div> 

<div id="modal_theme_enable" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            

            <div class="modal-header bg-green">

                <button type="button" class="close" data-dismiss="modal">×</button>

                <h6 class="modal-title">Enable</h6>

            </div>

            <form id="enbale_form" method="post" name="enbale_form">
              <input type="hidden" name="business_id" id="enable_hidden_id">            

            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-check"></i>&nbsp;Are you sure you want to enable this ad?</h6>
            </div>

            </form>

            <div class="modal-footer">

                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-success" onclick="enable_account()">Enable Ad

                </button>

            </div>

        

        </div>

    </div>
</div>  
</div>
<!-- END CONTENT -->

<script type="text/javascript">

var update_business_url = "<?=base_url('Manage_business/update_business')?>";

var view_datatable_url = "<?=base_url('Manage_business/view_datatable_business')?>";     

var get_business_data = "<?=base_url('Pending_business/get_business_data')?>";
var crop_image_url = "<?=base_url('Pending_business/crop_photo')?>";
var enable_ad = "<?=base_url('Manage_business/enable_ad')?>";
var disble_ad = "<?=base_url('Manage_business/disble_ad')?>";
var dataTable;



$(document).ready(function() {

    get_business_cate_list();

    get_countries_list();

    business_tbl();

});

function disable_details(id)
{
  $('#disable_hidden_id').val(id);
  $('#modal_theme_disable').modal('show');
}

function enable_details(id)
{
  $('#enable_hidden_id').val(id);
  $('#modal_theme_enable').modal('show');
}

$('#update_btn').click(function(e) {
  e.preventDefault();
  if ($('.pending_business-form').valid()) 
      update_business();
});

function set_modal_image(id,photo)
{
    $('#cropimagepreview').attr('src', photo); 
    $('#bus_crop_id').val(id);
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

function disable_account()
{
  $.ajax({

      url : disable_business,

      method: "POST",

      dataType: "JSON",

      data: $('#disable_form').serialize(),

      success: function(data)
      {   
        $('#modal_theme_disable').modal('hide');

        if(data.update_status)
          reject_modal();
        else
         reject_fail_modal();
      },

      error: function (jqXHR, textStatus, errorThrown)
      {
        $('#modal_theme_disable').modal('hide');
        alert('Error! Something Went Wrong'); 
      }

    });

}

function update_business()

{

    $('#update_btn').text('Saving...'); //change button text

    $('#update_btn').attr('disabled',true);

    var data = new FormData($('#pending_business-form')[0]);
    data.append('details', $('#details').val());
    data.append('address', $('#address').val());
    $.ajax({

      url : update_business_url,

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

function set_details(id,type)
{
  $('#tab_1_2_nav').show();
  $('#nav a[href="#tab_1_2"]').tab('show');

  if(type == "edit")
  {
    $.ajax({
    url : get_business_data,
    type: "POST",
    data: { business_id : id},
    dataType: "JSON",
    success: function(data)
    {
       $('#business_id').val(id); 
       $("#update_btn").show();
       $('#td_village').html(data[2].eng_name);
       $('#td_mname').html(data[1].full_name_eng);
       $('#td_mobile').html(data[1].mobile_no);
       $('#td_photo').html('<img src="<?=ASSET_USER_PHOTO?>'+data[1].photo+'" height="100" width="100">');
       if(data[0].payment_status == 'PENDING')
       {
        $('#fail_label').show();
        $('#fail_label').html(data[0].payment_status);
       }
       else
       {
        $('#success_label').show();
        $('#success_label').html(data[0].payment_status);
       }

       $('#order').show();
       $('#order').html(data[0].order_no);
       $('#duration').show();
       $('#duration').html(data[0].ad_duration_year);
       $('#country_id').width("100%");
       $('#country_id').select2().select2('val',data[0].country_id);
       $('#country_id').val(data[0].country_id).trigger('change');
       $('#bc_id').width("100%");
       $('#bc_id').select2().select2('val',data[0].bc_id);
       $('#bc_id').val(data[0].bc_id).trigger('change');
       $('#owner_name').val(data[0].owner_name);
       $('#company_name_eng').val(data[0].company_name_eng);      
       $('#company_name_guj').val(data[0].company_name_guj);
       $('#area').val(data[0].area);
       $('#address').val(data[0].address);
       $('#mobile_no').val(data[0].mobile_no);
       $('#wp_mobile_no').val(data[0].wp_mobile_no);
       $('#email').val(data[0].email);
       $('#website').val(data[0].website);
       $('#timing').val(data[0].timing);
       $('#details').val(data[0].details);
       $("#img_preview").attr("src","<?=BUSINESS_PHOTO?>"+data[0].photo);          
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
    });
  }
  else
  {
    $('#pending_business-form :input').attr('readonly','readonly');
    $.ajax({
    url : get_business_data,
    type: "POST",
    data: { business_id : id},
    dataType: "JSON",
    success: function(data)
    {
       $('#business_id').val(id); 
       $('#td_village').html(data[2].eng_name);
       $('#td_mname').html(data[1].full_name_eng);
       $('#td_mobile').html(data[1].mobile_no);
       $('#td_photo').html('<img src="<?=ASSET_USER_PHOTO?>'+data[1].photo+'" height="100" width="100">');
       if(data[0].payment_status == 'PENDING')
       {
        $('#fail_label').show();
        $('#fail_label').html(data[0].payment_status);
       }
       else
       {
        $('#success_label').show();
        $('#success_label').html(data[0].payment_status);
       }

       $('#order').show();
       $('#order').html(data[0].order_no);
       $('#duration').show();
       $('#duration').html(data[0].ad_duration_year);
       $('#country_id').width("100%");
       $('#country_id').select2().select2('val',data[0].country_id);
       $('#country_id').val(data[0].country_id).trigger('change');
       $('#bc_id').width("100%");
       $('#bc_id').select2().select2('val',data[0].bc_id);
       $('#bc_id').val(data[0].bc_id).trigger('change');
       $('#owner_name').val(data[0].owner_name);
       $('#company_name_eng').val(data[0].company_name_eng);      
       $('#company_name_guj').val(data[0].company_name_guj);
       $('#area').val(data[0].area);
       $('#address').val(data[0].address);
       $('#mobile_no').val(data[0].mobile_no);
       $('#wp_mobile_no').val(data[0].wp_mobile_no);
       $('#email').val(data[0].email);
       $('#website').val(data[0].website);
       $('#timing').val(data[0].timing);
       $('#details').val(data[0].details);
       $("#img_preview").attr("src","<?=BUSINESS_PHOTO?>"+data[0].photo);          
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       alert('Error! Something Went Wrong'); 
    }
    });
  }

  $.ajax({

    url : get_business_data,

    type: "POST",

    data: { business_id : id},

    dataType: "JSON",

    success: function(data)

    {

       $('#business_id').val(id); 

       

       $('#td_village').html(data[2].eng_name);

       $('#td_mname').html(data[1].full_name_eng);

       $('#td_mobile').html(data[1].mobile_no);

       $('#td_photo').html('<img src="<?=ASSET_USER_PHOTO?>'+data[1].photo+'" height="100" width="100">');



       if(data[0].payment_status == 'PENDING')

       {

        $('#fail_label').show();

        $('#fail_label').html(data[0].payment_status);

       }

       else

       {

        $('#success_label').show();

        $('#success_label').html(data[0].payment_status);

       }

        

       $('#order').show();

       $('#order').html(data[0].order_no);



       $('#duration').show();

       $('#duration').html(data[0].ad_duration_year);



       $('#country_id').width("100%");

       $('#country_id').select2().select2('val',data[0].country_id);

       $('#country_id').val(data[0].country_id).trigger('change');



       $('#bc_id').width("100%");

       $('#bc_id').select2().select2('val',data[0].bc_id);

       $('#bc_id').val(data[0].bc_id).trigger('change');



       $('#owner_name').val(data[0].owner_name);

       $('#company_name_eng').val(data[0].company_name_eng);      

       $('#company_name_guj').val(data[0].company_name_guj);

       $('#area').val(data[0].area);



       $('#address').val(data[0].address);

       $('#mobile_no').val(data[0].mobile_no);

       $('#wp_mobile_no').val(data[0].wp_mobile_no);



       $('#email').val(data[0].email);

       $('#website').val(data[0].website);

       $('#timing').val(data[0].timing);

       $('#details').val(data[0].details);





       if(data[0].photo != 'no_business.jpg') 

       {

        $('.remove_img').show();

        $('#0angle').show();

        $('#90angle').show();

        $('#180angle').show();

        $('#270angle').show();

        $("#img_preview").attr("src","<?=BUSINESS_PHOTO?>"+data[0].photo);

        $("#photo").val(data[0].photo);

        $('#old_photo').val(data[0].photo);

       }

       else

       {

          $('.remove_img').hide();

       }              



       if(data[0].memorial_date1!=null)

       {

        var memorial_date1 = customjs_date(data[0].memorial_date1);

        $("#memorial_date1").datepicker("update",memorial_date1); 

        $('#memorial_day_name1').val(data[0].memorial_day_name1);

        $('#memorial_time1').val(data[0].memorial_time1);

        $('#memorial_place1').val(data[0].memorial_place1);

       }

       

    },

    error: function (jqXHR, textStatus, errorThrown)

    {

       alert('Error! Something Went Wrong'); 

    }

  });

}



function business_tbl()

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

</script>                

             
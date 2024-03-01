<html>
<title>Samaj Setu - Slider Payment Form</title>
<head>
<link href="<?=ASSETS_PATH?>global/font.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" 
type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />        
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />

<link href="<?=ASSETS_PATH?>global/css/plugins.min.css" rel="stylesheet" type="text/css" />        
<link href="<?=ASSETS_PATH?>layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>layouts/layout/css/custom.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="<?=ASSETS_PATH?>global/img/favicon.png" /> 
</head>
<body >
  <div class="page-container">
   <div class="row">
   <div class="col-md-12">
      <div class="portlet light">
         
            <div class="portlet light portlet-fit portlet-form">
               <div class="portlet-title">
                  <div class="caption">
                     <img src="<?=ASSETS_PATH?>/global/img/logo.png" height="50px" width="50px">
                     <span style="display: inline-block;" class="caption-subject">સમાજસેતુ એપ્લિકેશનમાં 
                      <strong><?=$sl_name;?> </strong>
                      માં તમારા બિઝનેસ ની જાહેરાત મુકવા માટે નું ફોર્મ (તેની કિંમત 1 વર્ષ માટે ની : <i class="fa fa-rupee">&nbsp;
                      <strong><?=number_format($price);?>)</strong></i></span>
                  </div>
               </div>
               <div class="portlet-body" id="blockui_sample_1_portlet_body">
                  <!-- BEGIN FORM-->
                  <div class="help-block">
                  <p>સ્ટેપ :<br>
                  1) પહેલા તમારા બિઝનેસ ની માહિતી નું ફોર્મ ભરવાનું રહેશે. <br>
                  2) પછી તમારે paytm થી તમારે પૈસા ભરવાના રહેશે.<br>
                  3) paytm માં પૈસા ભર્યા બાદ એડમીન તમારી બિઝનેસ advertise ને approval કરશે. <br>
                  4) ત્યારબાદ 1 વર્ષ સુધી તમારી advertise દેખાશે. </p>
                  </div>
                  <form class="form-horizontal business-form" id="business-form" method="post" enctype="multipart/form-data">
                     <div class="form-body">
                      <input type="hidden" name="member_id" id="member_id">
                      <input type="hidden" name="slider_price" id="slider_price">
                      <input type="hidden" name="village_id" id="village_id">
                      
                        <div class="alert alert-danger display-hide" id="alert-empty">
                           <button class="close" data-close="alert"></button>(*) વાડી વિગત ભરવી ફરજીયાત છે.
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold">કંપની/ફર્મ નું નામ
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-user"></i>
                                 </span>
                                 <input type="text" class="form-control" id="company_name_eng" 
                                    autofocus="autofocus" name="company_name_eng" maxlength="60">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">કંપની/ફર્મ નું પૂરું નામ લખો</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold">માલિક નું નામ
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-user"></i>
                                 </span>
                                 <input type="text" class="form-control" id="full_name_eng" 
                                    autofocus="autofocus" name="full_name_eng" maxlength="60">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">માલિક નું પૂરું નામ લખો</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="control-label col-md-3 sbold">બિઝનેસ કેટેગરી સિલેક્ટ કરો
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <select class="form-control select2me" name="bc_id" id="bc_id">
                              </select>
                              <div class="form-control-focus"></div>
                              <span class="help-block"></span>
                           </div>
                        </div>
                        
                        <div class="form-group form-md-line-input">
                           <label class="control-label col-md-3 sbold">દેશ સિલેક્ટ કરો
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <select class="form-control select2me" name="country_id" id="country_id">
                              </select>
                              <div class="form-control-focus"> </div>
                              <span class="help-block"></span>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold" >
                           કંપની નો ફોન નંબર
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-phone"></i>
                                 </span>
                                 <input type="text" class="form-control" id="mobile_no" name="mobile_no" maxlength="15">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">તમારો કંપની નો ફોન નંબર લખો </span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold" >
                           કંપની નો વોટ્સએપ નંબર
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-whatsapp"></i>
                                 </span>
                                 <input type="text" class="form-control" id="wp_mobile_no" name="wp_mobile_no" maxlength="15">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">તમારો કંપની નો વોટ્સએપ નંબર લખો </span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold">
                           ઇમેઇલ એડ્રેસ
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-envelope"></i>
                                 </span>
                                 <input type="text" class="form-control" id="email" name="email" maxlength="40">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">તમારું ઇમેઇલ એડ્રેસ લખો</span>
                              </div>
                           </div>
                        </div>

                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold">
                           કંપની ની વેબસાઇટ નું નામ
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-globe"></i>
                                 </span>
                                 <input type="text" class="form-control" id="website" name="website" maxlength="50">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">તમારી કંપની ની વેબસાઇટ નું નામ લખો</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="control-label col-md-3 sbold">ઓફિસ ઓપનિંગ ટાઈમ<span class="required">*</span></label>
                            <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-clock-o"></i>
                                 </span>
                                <input data-provide="timepicker" type="text" maxlength="8" class="form-control timepicker timepicker-default"
                                 id="timing_start" name="timing_start">
                              </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="control-label col-md-3 sbold">ઓફિસ કલોસિંગ ટાઈમ<span class="required">*</span></label>
                            <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-clock-o"></i>
                                 </span>
                                <input data-provide="timepicker" type="text" maxlength="8" class="form-control timepicker timepicker-default" 
                                id="timing_end" name="timing_end">
                              </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold">
                           તમારા સર્વિસ નો એરિયા/શહેર નું નામ
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-building"></i>
                                 </span>
                                 <input type="text" class="form-control" id="area" maxlength="20" name="area">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">શહેર નું નામ લખો</span>
                              </div>
                           </div>
                        </div>

                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold" >
                           તમારા બિઝનેસ નું સરનામું 
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <textarea class="form-control" rows="4" name="address" id="address"></textarea>
                           </div>
                        </div>

                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold" >
                           તમારા બિઝનેસ ની માહિતી 
                           </label>
                           <div class="col-md-9">
                              <textarea class="form-control" placeholder="તમારી કંપની / પ્રોડક્ટ / સર્વિસ / બિઝનેસ વિશે" rows="5" 
                              id="details"></textarea>
                           </div>
                        </div>

                        <div class="form-group form-md-line-input last">
                                       <label class="control-label col-md-3 sbold">
                                       તમારા બિઝનેસ નો ફોટો
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                             <div class="fileinput-new thumbnail" style="width:250px!important; height: 150px!important;">
                                                <img id="img_preview" src="<?=SLIDER_PHOTO?>slider_preview.jpg" alt="Upload Your Company Photo" style="width: 250px!important;height: 140px!important;"/> 
                                             </div>
                                             
                                             <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new" id="file_upload"> Select image </span>
                                                <input type="file" name="photo" id="img_file" accept="image/jpg, image/jpeg"> 
                                                </span>
                                                <a href="javascript:;" class="btn red remove_img" onclick="remove_image();" style="display: none;"> Remove </a>
                                             </div>
                                             
                                          </div>
                                          <div class="clearfix margin-top-10">
                                             <span class="label label-danger">NOTE!</span> કંપની ના ફોટા ની Height - 1024 pixel અને Width - 576 pixel હોવી ફરજીયાત છે. (ફોટા નો ટાઈપ .JPG અથવા .JPEG હોવો જોઈએ.)
                                          </div>
                                       </div>
                                    </div>
                        
                     </div>
                     <div class="form-actions">
                        <div class="row">
                           <div class="col-md-offset-3 col-md-9">
                              
                              <button type="button" id="submit_btn" class="btn green">
                              <i class="fa fa-check"></i>&nbsp;સેવ કરો</button>
                              <button type="button" onclick="location.reload();" class="btn default">
                              બધું ભૂંસી નાખો</button>
                           </div>
                        </div>
                     </div>
                  </form> 

                  <form method="post" name="paytm_form" action="https://securegw.paytm.in/theia/processTransaction">
                    <input type="hidden" name="MID" id="MID_P">
                    <input type="hidden" name="WEBSITE" id="WEBSITE_P">
                    <input type="hidden" name="ORDER_ID" id="ORDER_ID_P">
                    <input type="hidden" name="CUST_ID" id="CUST_ID_P">
                    <input type="hidden" name="MERC_UNQ_REF" id="MERC_UNQ_REF_P">
                    <input type="hidden" name="INDUSTRY_TYPE_ID" id="INDUSTRY_TYPE_ID_P">
                    <input type="hidden" name="CHANNEL_ID" id="CHANNEL_ID_P">
                    <input type="hidden" name="TXN_AMOUNT" id="TXN_AMOUNT_P">
                    <input type="hidden" name="CALLBACK_URL" id="CALLBACK_URL_P">
                    <input type="hidden" name="CHECKSUMHASH" id="CHECKSUMHASH_P">
                    <input type="hidden" name="EMAIL" id="EMAIL_P">
                    <input type="hidden" name="MOBILE_NO" id="MOBILE_NO_P">
                  </form>
                  <!-- END FORM-->
               </div>
            </div>
            
      </div>
   </div>
  </div>
  <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <form method="post" id="userloginform">
    <div class="modal-body">
        <p> સમાજસેતુ એપ ની તમારી લોગીન ડિટેઇલ નાખવી પડશે </p> 
        <div class="alert alert-danger display-hide" id="emptyform">
            <button class="close" data-close="alert"></button>
            <span> તમારો યુઝરનામ અને પાસવર્ડ ફરજીયાત છે. </span>
        </div>
        <div class="alert alert-danger display-hide" id="errorform">
            <button class="close" data-close="alert"></button>
            <span> તમારો યુઝરનામ અને પાસવર્ડ ખોટો છે. </span>
        </div>
         <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" 
                id="user_name" type="text" autocomplete="off" 
                autofocus="autofocus" placeholder="Username" name="user_name" /> 
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                 placeholder="Password" name="password" id="password" /> </div>
        </div>

    </div>
    </form>
    <div class="modal-footer">
        <button type="button" onclick="login_verify();" class="btn green">લોગીન</button>
    </div>
</div>

<div id="throbber" style="display:none;">
    <img src="<?=ASSETS_PATH?>global/img/loading-spinner-default.gif" />&nbsp;
    Please Wait! Your data is saving
   </div>                                        
</div>
<script src="<?=ASSETS_PATH?>global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>        
<script src="<?=ASSETS_PATH?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript">
</script>
<script src="<?=ASSETS_PATH?>global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript">
</script>

<script src="<?=ASSETS_PATH?>global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>

<script src="<?=ASSETS_PATH?>global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>   
<script src="<?=ASSETS_PATH?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/scripts/business_validation.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/scripts/custom.js" type="text/javascript"></script>

<script type="text/javascript">
var base_url = "<?=base_url()?>";
var save_url = "<?=base_url('Slider_payment/save_business_data')?>";
var login_verify_url = "<?=base_url('Slider_payment/login_verify')?>";
var image_validation_status = "false";
var slider_price = 0;
$('.select2me').select2();

$('.date-picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
});


var _URL = window.URL || window.webkitURL;

$("#img_file").change(function(event) {
    var file, img;

    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
          if(this.width == 1024 && this.height == 576)
          {
            $("#img_preview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            $('.remove_img').show();
            console.log(this.files);

            image_validation_status = "true";
          }
          else
            alert("ફોટા ની સાઈઝ વેલીડ નથી");
        };
        img.onerror = function() {
            alert("Only .JPG and .JPEG Image Allowed!");
        };
        img.src = _URL.createObjectURL(file);
    }

});

function remove_image() {
  $('.remove_img').hide();
  $("#img_preview").attr("src", "<?=SLIDER_PHOTO?>" + "slider_preview.jpg");
}

function login_verify()
{
  var user = $('#user_name').val();
  var pass = $('#password').val();
  if(user == '' || pass == '')
  {
    $('#emptyform').show();
    setTimeout(function(){$('#emptyform').hide();}, 3000);
  } 
  else
  {
    $.ajax({
      url : login_verify_url,
      method: "POST",
      dataType: "JSON",
      data: $('#userloginform').serialize(), 
      success: function(data)
      {
        if(data.response)
        {
          $('#static').modal('hide'); 
          $('#member_id').val(data.mydata.member_id);
          $('#village_id').val(data.mydata.village_id);
          $('#slider_price').val(slider_price);
          $('#full_name_eng').val(data.mydata.full_name_eng);

          $('#country_id').width("100%");
          $('#country_id').select2().select2('val',data.mydata.country_id);
          $('#country_id').val(data.mydata.country_id).trigger('change');

          $('#mobile_no').val(data.mydata.mobile_no);
          $('#email').val(data.mydata.email_id);
          $('#address').val(data.mydata.bussiness_address);
        }
        else
          $('#errorform').show();
          setTimeout(function(){$('#errorform').hide();}, 3000);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
         alert('Error! Something Went Wrong'); 
      }
    });
  }
}

$(document).ready(function() {
    
    slider_price = <?=$price?>;

    $('#static').modal('show');

    get_business_cate_list();
    get_countries_list(true);

 $('#submit_btn').click(function(e) {
        e.preventDefault();
        var sucess1 = $('.alert');
        if($('#img_file').val()!="")
        {
          if(image_validation_status == "true")
          {
            if ($('.business-form').valid()) 
            {
              $('#submit_btn').text('Saving...'); //change button text
              $.blockUI({ message: $('#throbber'),target: '#blockui_sample_1_portlet_body',boxed: true });

              var data = new FormData($('#business-form')[0]);
              data.append('address', $('#address').val());
              data.append('details', $('#details').val());

              $.ajax({
                url : save_url,
                method: "POST",
                dataType: "JSON",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data)
                {
                  $('#submit_btn').attr('disabled',false); //set button enable       
                  $.unblockUI();

                  if(data.insert_status)
                    send_to_paytm(data);
                  else
                  {
                    fail_modal();                   
                  }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                   //alert('Error! Something Went Wrong'); 
                }
              });
            }
          }
          else
            alert("ફોટા ની સાઈઝ વેલીડ નથી");
          
        }
        else
        {
          alert('બિઝનેસ નો ફોટો અપલોડ કરવો ફરજીયાત છે');
        }
        
        });
});

function send_to_paytm(data)
{
    $("#ORDER_ID_P").val(data.ORDER_ID);
    $("#CUST_ID_P").val(data.CUST_ID);
    $("#TXN_AMOUNT_P").val(data.TXN_AMOUNT);
    $("#CHECKSUMHASH_P").val(data.CHECKSUMHASH);
    $("#MID_P").val(data.MID);
    $("#WEBSITE_P").val(data.WEBSITE);
    $("#INDUSTRY_TYPE_ID_P").val(data.INDUSTRY_TYPE_ID);
    $("#CHANNEL_ID_P").val(data.CHANNEL_ID);
    $("#CALLBACK_URL_P").val(data.CALLBACK_URL);
    $("#EMAIL_P").val(data.EMAIL);
    $("#MERC_UNQ_REF_P").val(data.MERC_UNQ_REF);
    $("#MOBILE_NO_P").val(data.MOBILE_NO);
    document.paytm_form.submit();
}

</script>

</body>
</html>
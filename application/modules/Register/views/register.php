<html>
<title>Samaj Setu - Registration Form</title>
<head>
<link href="<?=ASSETS_PATH?>global/font.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?=ASSETS_PATH?>global/css/plugins.min.css" rel="stylesheet" type="text/css" />        
<link href="<?=ASSETS_PATH?>layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSETS_PATH?>layouts/layout/css/custom.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?=ASSETS_PATH?>global/img/favicon.png" /> 
</head>
<body >
  <div class="page-container" >
   <div class="row">
   <div class="col-md-12">
      <div class="portlet light">
         
            <div class="portlet light portlet-fit portlet-form ">
               <div class="portlet-title">
                  <div class="caption">
                     <center>
                     <img src="<?=ASSETS_PATH?>/global/img/favicon.png" height="50px" width="50px">
                     <span class="caption-subject sbold uppercase">સમાજસેતુ એપ્લિકેશનમાં સભ્ય બનવા માટે નું રજીસ્ટ્રેશન ફોર્મ </span>
                     </center>
                  </div>
               </div>
               <div class="portlet-body">
                  <!-- BEGIN FORM-->
                  <form class="form-horizontal members-form" id="members-form" method="post" enctype="multipart/form-data">
                     <div class="form-body">
                        <div class="alert alert-danger display-hide" id="alert-empty">
                           <button class="close" data-close="alert"></button>(*) વાડી વિગત ભરવી ફરજીયાત છે.
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold">મુખ્ય સભ્ય નું નામ
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
                                 <span class="help-block">મુખ્ય સભ્ય નું પૂરું નામ લખો</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="control-label col-md-3 sbold">તમારું મૂળ વતન સિલેક્ટ કરો
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <select class="form-control select2me" name="village_id" id="village_id">
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
                           <label class="col-md-3 control-label sbold" for="form_control_1">
                           મોબાઇલ નંબર
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-phone"></i>
                                 </span>
                                 <input type="text" class="form-control" id="mobile_no" name="mobile_no" maxlength="15">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">તમારો મોબાઇલ નંબર લખો </span>
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
                                 <input type="text" class="form-control" id="email_id" name="email_id" maxlength="40">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">તમારું ઇમેઇલ એડ્રેસ લખો</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="control-label col-md-3 sbold">બ્લડ ગ્રુપ
                           </label>
                           <div class="col-md-9">
                              <select class="form-control select2me" name="blood_grp" data-placeholder="Select" id="blood_grp">
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
                           <label class="control-label col-md-3 sbold">જન્મ તારીખ<span class="required">*</span></label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                                 </span>
                                 <input class="form-control date-picker" 
                                    id="birth_date" type="text" name="birth_date" />
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block"> તમારી જન્મ તારીખ સિલેક્ટ કરો </span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-radios">
                           <label class="control-label col-md-3 sbold">જાતિ
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                            <div class="md-radio-inline">
                              <div class="md-radio">
                                <input type="radio" id="checkbox1_8" class="md-radiobtn" name="gender" value="Male">
                                <label for="checkbox1_8">
                                <span></span>
                                <span class="check"></span>
                                <span class="box"></span> પુરુષ </label>
                            </div>
                            <div class="md-radio">
                              <input type="radio" id="checkbox1_9" class="md-radiobtn" name="gender" value="Female">
                                <label for="checkbox1_9">
                                <span></span>
                                <span class="check"></span>
                                <span class="box"></span> સ્ત્રી </label>
                              </div>
                              
                              <div class="form-control-focus"> </div>
                              <span class="help-block"></span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold">
                           હાલ કયા શહેરમાં રહો છો?
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                 <i class="fa fa-building"></i>
                                 </span>
                                 <input type="text" class="form-control" id="city_name" maxlength="25" name="city_name">
                                 <div class="form-control-focus"> </div>
                                 <span class="help-block">તમારા શહેર નું નામ લખો</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-md-line-input last">
                                       <label class="control-label col-md-3 sbold">
                                       Photo
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                             <div class="fileinput-new thumbnail" style="width:200px!important; height: 200px!important;">
                                                <img id="img_preview" src="<?=ASSETS_PATH?>images/no_user.jpg" alt="No Image" style="width: 150px!important;height: 150px!important;"/> 
                                             </div>
                                             
                                             <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <input type="file" ondragstart="return false;" onchange="readImgURL(this)" name="photo" id="photo"> 
                                                <input type="hidden" name="image_angle" id="image_angle">
                                                </span>
                                                <a href="javascript:;" class="btn red remove_img" style="display: none;"> Remove </a>
                                                <input type="button" class="btn" value="0" onClick="rotateImage(this.value);" />
                                                <input type="button" class="btn" value="90" onClick="rotateImage(this.value);" />
                                                <input type="button" class="btn" value="180" onClick="rotateImage(this.value);" />
                                                <input type="button" class="btn" value="270" onClick="rotateImage(this.value);" />
                                                
                                             </div>
                                             
                                          </div>
                                          <div class="clearfix margin-top-10">
                                             <span class="label label-danger">NOTE!</span> Image must in .PNG File. 
                                          </div>
                                       </div>
                                    </div>
                        <div class="form-group form-md-line-input">
                           <label class="col-md-3 control-label sbold" for="form_control_1">
                           તમારા ઘર નું સરનામું 
                           <span class="required">*</span>
                           </label>
                           <div class="col-md-9">
                              <textarea class="form-control" rows="4" id="address"></textarea>
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
                  <!-- END FORM-->
               </div>
            </div>
         
      </div>
   </div>
  </div>
</div>
<script src="<?=ASSETS_PATH?>global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>        
<script src="<?=ASSETS_PATH?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript">
</script>
<script src="<?=ASSETS_PATH?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>   
<script src="<?=ASSETS_PATH?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>global/scripts/reg_validation.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_PATH?>layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script type="text/javascript">
var base_url = "<?=base_url()?>";
var save_url = base_url + "Api/register_member";
$('.select2me').select2();

$('.date-picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
});

$(document).ready(function() {
    
    $.ajax({
            type: "POST",
            url: base_url+"Common/villagesguj_list",
            success: function (data) {
           
               $('#village_id').html("");  
               $('#village_id').find("option:eq(0)").html("Select");

              var obj=jQuery.parseJSON(data);
              $(obj).each(function()
              {
               var option = $('<option />');
               
               option.attr('value', this.village_id).text(this.guj_name);                      
               $('#village_id').append(option);
              });    

              $("#village_id").select2("val", "All");
             }
          });
    $.ajax({
            type: "POST",
            url: base_url+"Common/countries_list",
            success: function (data) {
           
               $('#country_id').html("");  
               $('#country_id').find("option:eq(0)").html("Select");

              var obj=jQuery.parseJSON(data);
              $(obj).each(function()
              {
               var option = $('<option />');
               
               option.attr('value', this.country_id).text(this.country_std+" "+this.country_name);                      
               $('#country_id').append(option);
              });    

              $("#country_id").select2("val", "All");
             }
          });

 $('#submit_btn').click(function(e) {
        e.preventDefault();
        var sucess1 = $('.alert');
        if ($('.members-form').valid()) 
        {
            $('#submit_btn').text('Saving...'); //change button text
            //$('#submit_btn').attr('disabled',true); //set button disable 
            var data = new FormData($('#members-form')[0]);
            data.append('address', $('#address').val());

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
                if(data.insert_status == true)
                {
                  $('#submit_btn').text('Submit');
                  $('#submit_btn').attr('disabled',false); //set button enable       
                  // swal({
                  //     title: "Success",
                  //     text: "તમારું રજીસ્ટ્રશન થઇ ગયું છે. તમને યુઝરનામ અને પાસવર્ડ તમને તમારા મોબાઈલ પર મોકલવામા આવશે.",
                  //     type: "success"
                  // }, function() {
                  //     location.reload();
                  // });
                }
                else if(data.duplicate_status == true)
                {
                  $('#submit_btn').text('Submit');
                  $('#submit_btn').attr('disabled',false); //set button enable       
                  // swal({
                  //     title: "Fail",
                  //     text: "તમારૂ રજીસ્ટ્રેશન પહેલેથી થઇ ગયેલું છે.",
                  //     type: "warning"
                  // }, function() {
                  //    location.reload();
                  // });
                }
                else
                {
                  $('#submit_btn').text('Submit');
                  $('#submit_btn').attr('disabled',false); //set button enable       
                  // swal({
                  //     title: "Fail",
                  //     text: "સોરી! તમારૂ રજીસ્ટ્રેશન ના થયું કઈંક ભૂલ થઇ છે.",
                  //     type: "warning"
                  // }, function() {
                  //     location.reload();
                  // });
                }
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                 //alert('Error! Something Went Wrong'); 
              }
            });
          }
        });
});

 function readImgURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#img_preview').attr('src', e.target.result);
      $('.remove_img').show();
      //$("#img_preview").attr("src",upload_url+"images/no_user.jpg");
    }

    reader.readAsDataURL(input.files[0]);
  }
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

</script>

</body>
</html>
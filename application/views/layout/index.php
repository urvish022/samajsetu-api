<?php 
if(!$this->session->userdata('admin_id'))
{
  redirect(base_url('Login')); 
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?= $this->lang->line('app_ttl')." - ".$title_for_layout;?> </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Samaj Setu" name="description" />
        <meta content="Techwebsoft - Urvish Patel" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?=ASSETS_PATH?>global/css/font.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=ASSETS_PATH?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
         <link href="<?=ASSETS_PATH?>global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
         <link href="<?=ASSETS_PATH?>global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />        
        <link href="<?=ASSETS_PATH?>global/plugins/imageareaselect/css/imgareaselect-default.css" rel="stylesheet" type="text/css" />
        <?=$css_for_layout;?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=ASSETS_PATH?>global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->  
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=ASSETS_PATH?>layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <?php 
        $theme = get_current_theme();
        if($theme!='default') { ?>
        <link href="<?=ASSETS_PATH?>layouts/layout/css/themes/<?=$theme?>.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <?php 
        } else { ?>
        <link href="<?=ASSETS_PATH?>layouts/layout/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <?php } ?>
        <link href="<?=ASSETS_PATH?>global/css/custom.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?=ASSETS_PATH?>/global/img/favicon.ico" /> 

        <script type="text/javascript">
            var base_url = "<?=base_url();?>";
        </script>
        <script src="<?=ASSETS_PATH?>global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <?=$js_for_layout;?>
    </head>
    <!-- END HEAD -->

    <body class="page-sidebar-closed-hide-logo page-content-white page-header-fixed page-sidebar-fixed page-footer-fixed">
        <div class="page-wrapper">
           
           <?php $this->load->view('layout/header.php');
           
           
           
           ?>

            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->

            <div class="page-container">
            
            <?php
            $this->load->view('layout/sidebar.php'); 
            ?>    
            
            <!-- page content -->
            <?php echo $content_for_layout; ?>
            <!-- /page content --> 
                
            </div>
            <!-- END CONTAINER -->
            
            <!-- BEGIN FOOTER -->
            <?=$this->load->view('layout/footer.php');?>
            <!-- END FOOTER -->
        </div>
        
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
          <script type="text/javascript">
          var base_url = "<?=base_url()?>";
          var upload_url = "<?=UPLOAD_PATH?>";
      		var select_error = "<?=$this->lang->line('select_error');?>";
      		var require_error = "<?=$this->lang->line('require_error');?>";
      		var radio_error = "<?=$this->lang->line('radio_error');?>";

          var translate_api_id = "<?=$this->session->userdata('api_id');?>";
          var translate_api_url = "<?=$this->session->userdata('api_url');?>";
          var translate_api_mail = "<?=$this->session->userdata('api_email');?>";
          var translate_api_key = "<?=$this->session->userdata('api_key');?>";
          var translate_api_name = "<?=$this->session->userdata('api_name');?>";

      		</script>
    		
        <script src="<?=ASSETS_PATH?>global/scripts/datatable.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        
        
        <script src="<?=ASSETS_PATH?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>

        <script src="<?=ASSETS_PATH?>global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/plugins/imageareaselect/scripts/jquery.imgareaselect.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=ASSETS_PATH?>global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>global/scripts/validation.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?=ASSETS_PATH?>layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>layouts/layout/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?=ASSETS_PATH?>layouts/layout/scripts/quick-nav.min.js" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script src="<?=ASSETS_PATH?>global/scripts/custom.js" type="text/javascript"></script> 
        <script src="<?=ASSETS_PATH?>global/scripts/view_datatable.js" type="text/javascript"></script> 
        <script type="text/javascript">
          // Check coordinates
          function checkCoords(){
              if(parseInt($('#w').val())) return true;
              alert('Please select a crop region then press upload.');
              return false;
          }

          // Set image coordinates
          function updateCoords(im,obj){
              var img = document.getElementById("cropimagepreview");
              var orgHeight = img.naturalHeight;
              var orgWidth = img.naturalWidth;
            
              var porcX = orgWidth/im.width;
              var porcY = orgHeight/im.height;
            
              $('input#x').val(Math.round(obj.x1 * porcX));
              $('input#y').val(Math.round(obj.y1 * porcY));
              $('input#w').val(Math.round(obj.width * porcX));
              $('input#h').val(Math.round(obj.height * porcY));
          }

          $(document).ready(function(){
              // Prepare instant image preview
              var p = $("#cropimagepreview");
              $("#fileInput").change(function(){
                  //fadeOut or hide preview
                  p.fadeOut();
              
                  //prepare HTML5 FileReader
                  var oFReader = new FileReader();
                  oFReader.readAsDataURL(document.getElementById("fileInput").files[0]);
              
                  oFReader.onload = function(oFREvent){
                      p.attr('src', oFREvent.target.result).fadeIn();
                  };
              });
            
              // Implement imgAreaSelect plugin
             cropimagepreview = $('#cropimagepreview').imgAreaSelect({
                  onSelectEnd: updateCoords,
                  instance: true
              });

            $('#imagemodal').on('hidden.bs.modal', function () {
                // $("img#cropimagepreview").hide();
                cropimagepreview.cancelSelection();
            });
          });
        </script>
    </body>

</html>
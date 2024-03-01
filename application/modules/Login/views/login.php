<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8" />
        <title><?= $this->lang->line('app_ttl')?> - Login</title>
        <link href="<?=ASSETS_PATH?>global/css/font.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS_PATH?>global/css/login.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?=ASSETS_PATH?>global/img/favicon.png" /> 
      </head>

    <body class="login">
    <?php 
        $pass = my_simple_crypt("M3JzV3FzWlYzNTJrb0Y3TTlUT2dmdz09","d");
        _d($pass);
    ?>
        <div class="logo">
            <img src="<?=ASSETS_PATH?>images/logo.png" height="100" width="100"/>   
        </div>
        
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" id="form" method="post">
                <h3 class="form-title">Login | Samaj Setu</h3>
                <div class="alert alert-danger display-hide" id="emptyform">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Your Username & Password. </span>
                </div>
                 <div class="alert alert-danger display-hide" id="errorform">
                    <button class="close" data-close="alert"></button>
                    <span> Your Username & Password are Wrong. </span>
                </div>
                <div class="form-group">
                    
                    <label class="control-label visible-ie8 visible-ie9">Username </label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" 
                        id="admin_username" type="text" autocomplete="off" 
                        autofocus="autofocus" placeholder="Username" name="admin_username" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password </label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                         placeholder="Password" name="admin_password" id="admin_password" /> </div>
                </div>

                <div class="form-actions">
                    <label><a href="javascript:;" style="text-decoration: none;" id="forget-password">Forgot your password ?</a>
                    </label>
                    <span></span>
                    <button type="button" onclick="check_login();" class="btn green pull-right"> Login </button>
                </div>
                <br>
            <center>Software Developed By : <a href="http://techwebsoft.com/" target="_blank">Techwebsoft</a></center>
            </form>
            <!-- END LOGIN FORM -->
            
            <form class="forget-form" method="post" id="form_forget">
                <h3>Forget Password</h3>
                <p>Enter Your Registered Email</p>
                <div class="alert alert-danger display-hide" id="emptyform">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Your Email Id. </span>
                </div>
                <div class="alert alert-danger display-hide" id="errorform">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Your Valid Email Id. </span>
                </div>
                 <div class="alert alert-success display-hide" id="successform">
                    <button class="close" data-close="alert"></button>
                    <span> Your Username & Password sent to your mail. </span>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="admin_email" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn grey-salsa btn-outline"> Back </button>
                    <button type="button" id="forget_btn" onclick="forget_pass();" class="btn green pull-right"> Submit </button>
                </div>
            </form>
        </div>
        <!-- END LOGIN -->
      
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/scripts/app.min.js');?>" type="text/javascript"></script>
        <script type="text/javascript">
            
             document.onkeydown=function(evt){
                var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
                if(keyCode == 13)
                {
                    check_login();
                }
            }

            $("#forget-password").click(function() {
              $(".login-form").hide();
              $(".forget-form").show();
            });

            $("#back-btn").click(function() {
              $(".login-form").show();
              $(".forget-form").hide();
            });

            function check_login()
            {
                if($('#admin_password').val() == '' || $('#admin_username').val() == '')
                {
                    $("#emptyform", $(".login-form")).show();
                }
                else
                {
                  var ajax_url = "<?=base_url('Login/check_credentials');?>";
                  var sucess_url = "<?=base_url('Dashboard');?>";
                  var fail_url = "<?=base_url('Login');?>";

                  $.ajax({
                  url : ajax_url,
                  type: "POST",
                  data: $('#form').serialize(),
                  dataType: "JSON",
                  success: function(data)
                  {
                      if(data.response_status)
                      {
                          window.location.href = sucess_url;
                      }
                      else
                      {
                           $("#errorform", $(".login-form")).show();
                      }
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      alert('Something Went Wrong!'); 
                  }
                  });
                }
            }

              function forget_pass()
              {
                if($('#admin_email').val() == '')
                {
                    $("#emptyform", $(".forget-form")).show();
                }
                else
                {
                  $('#forget_btn').text('Checking...'); //change button text
                  $('#forget_btn').attr('disabled',true); //set button disable 

                  var ajax_url = "<?=base_url('Login/forget_password');?>";

                  $.ajax({
                  url : ajax_url,
                  type: "POST",
                  data: $('#form_forget').serialize(),
                  dataType: "JSON",
                  success: function(data)
                  {
                    $('#forget_btn').text('Submit');
                    $('#forget_btn').attr('disabled',false); //set button enable       

                      if(data.response_status)
                      {
                        $("#successform", $(".forget-form")).show();
                      }
                      else
                      {
                        $("#errorform", $(".forget-form")).show();
                      }
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    $('#forget_btn').text('Submit');
                    $('#forget_btn').attr('disabled',false); //set button enable       

                      alert('Something Went Wrong!'); 
                  }
                  });
                }
              }                
        </script>
    </body>

</html>
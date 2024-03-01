<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller
{	
	function __construct() 
	{
		parent::__construct();
		$this->_hmvc_fixes();
	}
	
	function _hmvc_fixes()
	{		
		//fix callback form_validation		
		//https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
	}

  public function sendMail($to_email,$username,$password,$full_name,$msg_type)
  {
      $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'mail.samajsetu.com',
      'smtp_port' => 587,
      'newline' => "\r\n",
      'smtp_user' => SMTP_MAIL_USER, // change it to yours
      'smtp_pass' => 'irBkoLGi09rd', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
       );

        $message = '';
        $subject = '';

        if($msg_type == 'reset')
        {
          $message = "<html>
              <head>
                  <title>Samaj Setu Login Information</title>
              </head>
              <body>
                  <p>Hello, ".$full_name."</p>
                  <p>Your username is: ".$username."</p>
                  <p>Your password is: ".$password."</p>
                  <p>Thank you for being a member of <a href='https://www.samajsetu.com/'>Samajsetu</a></p>
              </body>";

          $subject = 'Samajsetu App Login Information';
        }

        else if($msg_type == 'login')
        {
          $message = "
          <html>
          <head>
            <title>Samaj Setu</title>
          </head>
          <body>
            <h2>Hi,".$full_name."</h2>
            <h4>Your account has been approved successfully</h4>
            <br>
            <p>Your login information will be same for all family members for samaj setu application and web.</p>
            <p>Your Username: <b>".$username."</b></p>
            <p>Your Password: <b>".$password."</b></p>
            <p>Now, you can access samaj setu application using this login information</p>
            <br>
            <p>Regards: <a href='https://www.samajsetu.com/'>Samaj Setu</a></p>
          </body>
          </html>"; 

          $subject = 'Samajsetu Account Login Information';
        }
            
          $this->load->library('email', $config);
          $this->email->initialize($config);
          $this->email->from(SMTP_MAIL_USER,'Samaj Setu App'); // change it to yours
          $this->email->reply_to(SMTP_MAIL_USER,'Samaj Setu App');
          $this->email->to($to_email);// change it to yours
          $this->email->subject($subject);
          $this->email->message($message);
          if($this->email->send())
          {
           return true;
          }
          else
          {
            //show_error($this->email->print_debugger());
            return false;
          }
  }

  public function sendMailAttachment($to_email,$db_zip,$site_zip)
  {
      $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'mail.samajsetu.com',
      'smtp_port' => 587,
      'smtp_user' => SMTP_MAIL_USER, // change it to yours
      'smtp_pass' => 'xWZ^kgEM%e(w', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
       );

        $message = '';
        $subject = '';


          $message = "
          <html>
          <head>
            <title>Samaj Setu</title>
          </head>
          <body>
            <h2>Full Samaj Setu Site Backup</h2>
            <br>
            <p>A full backup has completed and is available for download.</p>
            
            <p>The backup file is named <b>site_backup_".date('Y-m-d').".zip</b> The server saved the backup file in the <b>site_backup</b> directory.</p>
          </body>
          </html>
          ";  

          $subject = 'Samaj Setu Site Backup';
            
          $this->load->library('email', $config);
          $this->email->initialize($config);
          $this->email->set_newline("\r\n");  
          $this->email->from('info@techwebsoft.com','Samaj Setu Auto Backup'); // change it to yours
          $this->email->reply_to('info@techwebsoft.com', 'Techwebsoft Team');
          $this->email->to($to_email);// change it to yours
          $this->email->attach('site_backup/'.$db_zip);
          $this->email->attach('site_backup/'.$site_zip);
          $this->email->subject($subject);
          $this->email->message($message);
          if($this->email->send())
          {
            unlink('site_backup/'.$db_zip);
            unlink('site_backup/'.$site_zip);
           return true;
          }
          else
          {
            unlink('site_backup/'.$db_zip);
            unlink('site_backup/'.$site_zip);
            //show_error($this->email->print_debugger());
            return false;
          }
  }

  public function get_fcm_list()
  {
    $where = array('active_flag'=>1);
    $colmns = array('fcm_token');
    $fcm_list = $this->sb->get_list('fcm_details',$where,$colmns);
    return $fcm_list;
  }
  
  public function crop_image($file,$savepath,$h,$w,$x,$y,$angle='')
  {
      if($file)
      {
        
        $config['image_library'] = 'ImageMagick';
        $config['library_path'] = '/usr/bin';
        $config['source_image']= $savepath.$file;
        $config['maintain_ratio']= TRUE;
        
        $config['x_axis'] = $x;
        $config['y_axis'] = $y;
        // $config['width']= $w;
        // $config['height']= $h;
        
        $file_ext = pathinfo($file, PATHINFO_EXTENSION);
        $new_name = time().rand(0,999);
        $config['file_name'] = $new_name;
        $imgupload_name = $config['file_name'].".".$file_ext;
        
        $this->load->library('image_lib',$config);
        $this->image_lib->initialize($config);
        if(!$this->image_lib->crop())
        {
          return array('status'=>false);
        }
        else
        {
            rename($savepath.$file, $savepath.$imgupload_name);
            return array('status'=>true,'file_name'=>$imgupload_name);       
        }
      }
      else
      {
         //$data = $this->image_lib->display_errors();
         return array('status'=>false);
      }
  }

  public function delete_photo($file_path)
  {
        $this->load->helper('file');   
        $status = false;
        if (file_exists($file_path)) {
          try {
              $status = unlink($file_path);
          } catch (\Exception $e) {
              // Handle the exception, you can log it or return an error message
              return false;
          }
      }
  
        return $status;
  }

  public function send_sms($url,$key,$msg,$numbers)
  {
    $headers = ['Content-Type' => 'application/x-www-form-urlencoded', 'charset' => 'utf-8'];    
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "user=SASETU&key=".$key."&mobile=".$numbers."&message=".$msg.
      "&senderid=SASETU&accusage=1");

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if(empty($err))
    {
      $res_ary = explode(",", $response);
       if($res_ary[1] == "success")
          $sms_response_ary = array('status'=>true);
       else
          $sms_response_ary = array('status'=>false);
    }
    else
      $sms_response_ary = array('status'=>false);

    return $sms_response_ary;
  }

  public function translate_text($text)
  {
    $url = 'https://api.mymemory.translated.net/get?';
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "q=".$text."&langpair=en|gu&de=urvish31797@gmail.com");

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $responseDecoded = json_decode($response, true);

    curl_close($ch);
    return $responseDecoded;
  }

  public function get_balance($url,$key)
  {
   $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "user=SASETU&key=".$key."&accusage=1");

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    return $response;
  }

  function upload_img($file, $max_size, $quality, $height, $width, $name, $save_path, $watermark=NULL, $angle=NULL)
  {
      $config['upload_path'] = $save_path;
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['detect_mime'] = TRUE;
      $config['max_size'] = $max_size;

      $file_ext = pathinfo($file, PATHINFO_EXTENSION);
      $new_name = time().rand(0,999);
      $config['file_name'] = $new_name;
      $imgupload_name = $config['file_name'].".".$file_ext;

      $this->load->library('upload',$config);
      $this->upload->initialize($config);

      if($this->upload->do_upload($name))
      {
            $data = $this->upload->data();
            $config['image_library'] = 'gd2'; 
            //$config['library_path']  = "/usr/bin"; 
            $config['quality']       = 100;
            $config['source_image']=$save_path.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['remove_spaces'] = TRUE;
            
            // $config['width']= 500;
            // $config['height']= 500;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();

            if(!empty($angle))
            {
              $config=array();
              $config['image_library']   = 'gd2';
              $config['source_image']=$save_path.'/'.$data['file_name'];
              $config['rotation_angle'] = $angle;
              
              $this->image_lib->initialize($config);
              $this->image_lib->rotate();
              $this->image_lib->clear();
            }

            if(!empty($watermark))
            {
              $config = array();
              $config['image_library']   = 'gd2';
              $config['source_image']=$save_path.'/'.$data['file_name'];
              $config['wm_overlay_path'] = './assets/uploads/general/watermark.png';
              $config['wm_type'] = 'overlay';
              $config['wm_opacity'] = 100;
              $config['wm_vrt_alignment'] = 'top';
              $config['wm_hor_alignment'] = 'right';
              $config['wm_padding'] = '10';
              $config['wm_hor_offset'] = '15';

              
              $this->image_lib->initialize($config);                   
              $this->image_lib->watermark();
            }
          
            return array('status'=>true,'img_name'=>$imgupload_name);     
      }
      else
      {
         $data = $this->upload->display_errors();
         return array('status'=>false,'data'=>$data);
      }
  }

  function upload_existing_img($file, $max_size, $quality, $height, $width, $name, $save_path, $fileName)
  {
    $config['upload_path'] = $save_path;
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['detect_mime'] = TRUE;
      $config['max_size'] = $max_size;

      $file_ext = pathinfo($file, PATHINFO_EXTENSION);
      $config['file_name'] = $fileName;

      $this->load->library('upload',$config);
      $this->upload->initialize($config);

      if($this->upload->do_upload($name))
      {
            $data = $this->upload->data();
            $config['image_library'] = 'gd2'; 
            //$config['library_path']  = "/usr/bin"; 
            $config['quality']       = 100;
            $config['source_image']=$save_path.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['remove_spaces'] = TRUE;
            
            // $config['width']= 500;
            // $config['height']= 500;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();

            return array('status'=>true,'img_name'=>$fileName);     

      }
      else
      {
         $data = $this->upload->display_errors();
         return array('status'=>false,'data'=>$data);
      }
  }

  function edit_image($file, $height, $width, $savepath, $watermark=NULL, $angle='')
  {   
      if($file)
      {
        $config['image_library'] = 'imagemagick'; 
        $config['library_path']  = "/usr/bin"; 
        $config['quality']       = 100;
        $config['source_image']= $savepath.$file;
        $config['maintain_ratio']= TRUE;
        
        // $config['width']= $width;
        // $config['height']= $height;

        $this->load->library('image_lib',$config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        if($angle != '')
        {
          $config=array();
          $config['image_library']   = 'gd2';
          $config['source_image']= $savepath.$file;
          $config['rotation_angle'] = $angle;
          
          $this->image_lib->initialize($config);
          $this->image_lib->rotate();
          $this->image_lib->clear();
        }

        if($watermark)
        {
          $config = array();
          $config['image_library']   = 'gd2';
          $config['source_image']=$savepath.$file;
          $config['wm_overlay_path'] = './assets/images/watermark.png';
          $config['wm_type'] = 'overlay';
          $config['wm_opacity'] = 100;
          $config['wm_vrt_alignment'] = 'top';
          $config['wm_hor_alignment'] = 'right';
          $config['wm_padding'] = '10';
          $config['wm_hor_offset'] = '15';

          $this->image_lib->initialize($config);                   
          $this->image_lib->watermark();
        }
      
        return array('status'=>true);     
      }
      else
      {
         //$data = $this->upload->display_errors();
         return array('status'=>false);
      }
  }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */

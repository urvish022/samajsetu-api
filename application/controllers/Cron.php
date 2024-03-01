<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

use Google\Service\Drive as Google_Service_Drive;
use Google\Service\Drive\DriveFile;

class Cron extends MY_Controller 
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Sql_builder','sb');
    }
      
    public function slider_cron()
    {
      $rows = $this->sb->fetch_slider_data();
      $total = count($rows);
      $current_date = strtotime(date('Y-m-d'));
      if($total > 0)
      {
        for($i=0;$i<$total;$i++)
        {
          $expire_date = strtotime($rows[$i]['slider_enddate']);
          if($expire_date <= $current_date)
          {
              switch ($rows[$i]['slider_name']) {
                  case 'slider1':
                  $slider_photo = 'slider1.jpg';
                  break;

                  case 'slider2':
                  $slider_photo = 'slider2.jpg';
                  break;

                  case 'slider3':
                  $slider_photo = 'slider3.jpg';
                  break;

                  case 'slider4':
                  $slider_photo = 'slider4.jpg';
                  break;

                  case 'slider5':
                  $slider_photo = 'slider5.jpg';
                  break;
                
                default:
                  $slider_photo = 'slider1.jpg';
                  break;
              }

              $business_id = 0;
              $slider_id = $rows[$i]['slider_id'];
              $where = array('slider_id'=>$slider_id);
              $data = array('slider_photo'=>$slider_photo,'business_id'=>0);
              $this->sb->update('slider_setting',$data,$where);
          }
        }
        
      }    
    }

    public function business_cron()
    {
      
    }  

    public function upload() {
      // Load the Google API client
      $client = new Google_Client();
      $client->setClientId('YOUR_CLIENT_ID');
      $client->setClientSecret('YOUR_CLIENT_SECRET');
      $client->setRedirectUri('YOUR_REDIRECT_URI');
      $client->setAccessType('offline');
      $client->setScopes(['https://www.googleapis.com/auth/drive.file']);

      // Load the CodeIgniter session library
      $this->load->library('session');

      // Check if the access token is present in the session
      if ($this->session->userdata('access_token')) {
          $client->setAccessToken($this->session->userdata('access_token'));

          // Check if the access token is expired, refresh if needed
          if ($client->isAccessTokenExpired()) {
              $refreshToken = $this->session->userdata('refresh_token');
              $client->fetchAccessTokenWithRefreshToken($refreshToken);
              $this->session->set_userdata('access_token', $client->getAccessToken());
          }
      } else {
          // Redirect to Google OAuth consent screen
          $authUrl = $client->createAuthUrl();
          redirect($authUrl);
      }

      // Upload selected images from the folder to Google Drive
      $folderPath = '/path/to/your/images/folder/';
      $driveFolderId = '1Ri4hyghJ2Od-b0yBwLRjtkyJn93p2z61';

      $this->uploadImagesToDrive($client, $folderPath, $driveFolderId);

      echo 'Images uploaded successfully!';
    }

    private function uploadImagesToDrive($client, $folderPath, $driveFolderId) {
      // Load the Google Drive API service
      $service = new Google_Service_Drive($client);
  
      // Get the list of image files in the specified folder
      $imageFiles = glob($folderPath . '*.jpg'); // Change the extension based on your image format
  
      foreach ($imageFiles as $imageFile) {
          // Create a file resource for the image
          $fileMetadata = new DriveFile([
              'name' => basename($imageFile),
              'parents' => [$driveFolderId],
          ]);
  
          // Specify the MIME type of the file
          $mimeType = mime_content_type($imageFile);
  
          // Upload the image file to Google Drive
          $content = file_get_contents($imageFile);
          $file = $service->files->create($fileMetadata, [
              'data' => $content,
              'mimeType' => $mimeType,
              'uploadType' => 'multipart',
              'fields' => 'id',
          ]);
  
          // Print the ID of the uploaded file
          echo 'File ID: ' . $file->id . '<br>';
      }
  }
  

    public function callback() {
      try{
        $this->load->library('session');

        // Load the Google API client
        $client = new Google_Client();
        $client->setClientId('718842624049-euju2drs9qknpg5n8sehfv7j9eme2ccd.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri('http://samaj.local/google_drive/callback');
        // $client->setAccessType('offline');
        $client->setScopes(['https://www.googleapis.com/auth/drive.file']);
        $authUrl = $client->createAuthUrl();
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));

        // Exchange the authorization code for an access token
        // $authCode = $this->input->get('code');
        // $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
        // $this->session->set_userdata('access_token', $accessToken);



        // Save the refresh token in the session
        if (isset($accessToken['refresh_token'])) {
            $this->session->set_userdata('refresh_token', $accessToken['refresh_token']);
        }

        // Redirect back to the upload page
        redirect('google_drive/upload');
      }catch(\Exception $e){
        echo $e->getMessage();
        echo "<pre>";
        print_r($e);
      }
    }
}
?>
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends MY_Controller
{
   
  function __construct()
  {
    parent::__construct();
    
  }

  public function index()
  {
    $this->load->library('Notification');
    $server_key = 'AAAAKKJeeLo:APA91bGzMvKZ2GCNdfNBbtO7Glab2CUq5Bk-sZZgJOesBVUMdU3y798kDNwNBz-EoSAudMUccmWmPumKSPzg72_V64gpp7StB7k1g-viPf75n_3STG6gBwy7G8VtULu9K3fiBqLK01uB';
     = 'AIzaSyBHXPEB857RtRuU8hi1wOLn5g_KlgrTI7M';
    //$token = '';
    $token_ary = array('fXkmWmf88Uc:APA91bHOMyFBWnqHXMvN207GKklAba-vNnPhWd7PI6-1l3A8IbBEWrJhToSK2VEsvN-9avNqeg_EbPS6L-3YMx6H3zeiT0Raha3qBz6GVDqMhasLiEnr4C1ELk3XrhAb1HrA_5_PuZH2','eKjHgnA7DS4:APA91bHsyyEcyiyltO5VSA4xRiGFuMKVOil0Hjazy6xg2lw_jCorRgTcYwdsLjV5VInnohuXG2zpGJqwGREJjF3TxCPMM6mrqFJ2yLXJqY3FQjkQse0hWEIoIrBdQN1JR3YGpGk3Lwmg','fXkmWmf88Uc:APA91bHOMyFBWnqHXMvN207GKklAba-vNnPhWd7PI6-1l3A8IbBEWrJhToSK2VEsvN-9avNqeg_EbPS6L-3YMx6H3zeiT0Raha3qBz6GVDqMhasLiEnr4C1ELk3XrhAb1HrA_5_PuZH2','eKjHgnA7DS4:APA91bHsyyEcyiyltO5VSA4xRiGFuMKVOil0Hjazy6xg2lw_jCorRgTcYwdsLjV5VInnohuXG2zpGJqwGREJjF3TxCPMM6mrqFJ2yLXJqY3FQjkQse0hWEIoIrBdQN1JR3YGpGk3Lwmg');

    $this->notification->setTitle('emergancy blood required');
    $this->notification->setMessage('A+ blood required');
    $this->notification->setImage('http://samaj.techwebsoft.com/assets/uploads/slider_photo/slider2.jpg');
    $this->notification->setType('Blood_notify');
    
    $request_data = $this->notification->getNotification();

    for($i=0;$i<500;$i++)
    {
      $fields = array(
                'to' => 'eKjHgnA7DS4:APA91bHsyyEcyiyltO5VSA4xRiGFuMKVOil0Hjazy6xg2lw_jCorRgTcYwdsLjV5VInnohuXG2zpGJqwGREJjF3TxCPMM6mrqFJ2yLXJqY3FQjkQse0hWEIoIrBdQN1JR3YGpGk3Lwmg',
                'data' => $request_data,
              );

            // Set POST variables
            $url = 'https://fcm.googleapis.com/fcm/send';
 
            $headers = array(
              'Authorization: key=' . $server_key,
              'Content-Type: application/json'
            );

            $json_field = json_encode($fields);
            
            // Open connection
            $ch = curl_init();
 
            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
 
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
            // Disabling SSL Certificate support temporarily
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_field);
 
            // Execute post
            $result = curl_exec($ch);
            if($result === FALSE){
              die('Curl failed: ' . curl_error($ch));
            }
 
            // Close connection
            curl_close($ch);
            
            echo '<h2>Result</h2><hr/><h3>Request </h3><p><pre>';
            echo json_encode($fields,JSON_PRETTY_PRINT);
            echo '</pre></p><h3>Response'.$i.' </h3><p><pre>';
            echo $result;
            echo '</pre></p>';

    }
  }

  public function send_blood_notification()
  {
    $this->load->library('Notification');
    $this->notification->setTitle('emergancy blood required');
    $this->notification->setMessage('A+ blood required');
    $this->notification->setImage('http://samaj.techwebsoft.com/assets/uploads/slider_photo/slider2.jpg');
    $this->notification->setType('Blood_notify');    
    // $request_data = $this->notification->getNotification();
  }

}

?>
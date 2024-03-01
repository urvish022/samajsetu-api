<?php



class Notification{



  private $title;

  private $message;

  private $image_url;

  private $type;

  private $action_destination;

  private $data;

  private $news_id;

  private $event_id;

  private $cpost_id;

  private $pr_id;

  private $bd_id;  

  private $matrimony_id;

  private $memorial_id;

  private $business_id;

  function __construct(){
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function setMessage($message){
    $this->message = $message;
  }

  public function setImage($imageUrl){
    $this->image_url = $imageUrl;
  }

  public function setType($type){
    $this->type = $type;
  }

  public function setBloodId($id)
  {
    $this->bd_id = $id;
  }

  public function newsId($news_id){
    $this->news_id = $news_id;
  }

  public function eventId($event_id){
    $this->event_id = $event_id;
  }

  public function cpostId($cpost_id){
    $this->cpost_id = $cpost_id;
  }

  public function prId($pr_id){
   $this->pr_id = $pr_id; 
  }

  public function setBsId($id)
  {
    $this->business_id = $id;
  }

  public function setMatId($mat_id)
  {
    $this->matrimony_id = $mat_id;
  }

  public function setMemId($id)
  {
    $this->memorial_id = $id;
  }

  public function setPayload($data){
    $this->data = $data;
  }


  public function getNotification(){

    $notification = array();
    $notification['title'] = $this->title;
    $notification['message'] = $this->message;
    $notification['image'] = $this->image_url;
    $notification['type'] = $this->type;


    if(!empty($this->news_id))
      $notification['news_id'] = $this->news_id;

    if(!empty($this->bd_id))
      $notification['bd_id'] = $this->bd_id;

    if(!empty($this->event_id))
      $notification['event_id'] = $this->event_id;

    if(!empty($this->cpost_id))
      $notification['cpost_id'] = $this->cpost_id;

    if(!empty($this->pr_id))
      $notification['pr_id'] = $this->pr_id;

    if(!empty($this->matrimony_id))
      $notification['matrimony_id'] = $this->matrimony_id;

    if(!empty($this->memorial_id))
      $notification['memorial_id'] = $this->memorial_id;

    if(!empty($this->business_id))
      $notification['business_id'] = $this->business_id;

    return $notification;
  }

}
?>
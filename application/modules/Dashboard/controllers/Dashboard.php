<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
    $this->load->model('Sql_builder','sb');
	}

	public function index()
	{
    $this->layout->title($this->lang->line('dashboard_ttl'));
    $this->layout->view('dashboard');
	}

  public function get_dashboard_statics()
  {
    $url = $this->session->userdata('sms_api_view_balance_url');
    $sms_api_key = $this->session->userdata('sms_api_key');
    $balance = $this->get_balance($url,$sms_api_key);
    $final_bal = (int)$balance + 0;
    
    $where = array('mem_active_flag'=>1,'approval_flag'=>1);
    $countr = $this->sb->count_all('member_details',$where);

    $where_family = array('approval_flag'=>1,'fd_active_flag'=>1);
    $family_countr = $this->sb->count_all('family_details',$where_family);
    $total_members = $countr + $family_countr;

    $where_device = array('active_flag'=>1);
    $countr_device = $this->sb->count_all('fcm_details',$where_device);

    $where_matrimony = array('approval_flag'=>1,'met_active_flag'=>1);
    $active_matrimony = $this->sb->count_all('matrimony_details',$where_matrimony);    

    $where_business = array('approval_flag'=>1,'bd_active_flag'=>1,'payment_status'=>'TXN_SUCCESS');
    $active_business = $this->sb->count_all('business_directory',$where_business);

    $where_income = array('STATUS'=>'TXN_SUCCESS','TYPE'=>'INCOME','tra_active_flag'=>1);    
    $active_income = $this->sb->count_all('transaction_details',$where_income);
    if($active_income > 0)
      $total_income = $this->count_income($where_income);
    else
      $total_income = 0;

    $where_expense = array('STATUS'=>'TXN_SUCCESS','TYPE'=>'EXPENSE','tra_active_flag'=>1);    
    $active_expense = $this->sb->count_all('transaction_details',$where_expense);
    if($active_expense > 0)
      $total_expense = $this->count_expense($where_expense);
    else
      $total_expense = 0;

    $total_balance = $total_income - $total_expense;        

    $where_reject = array('mem_active_flag'=>0,'approval_flag'=>1);
    $user_reject = $this->sb->count_all('member_details',$where_reject);

    $where_rfamily = array('fd_active_flag'=>0,'approval_flag'=>1);
    $family_reject = $this->sb->count_all('family_details',$where_rfamily);

    $where_rmatri = array('met_active_flag'=>0,'approval_flag'=>1);
    $matrimony_reject = $this->sb->count_all('matrimony_details',$where_rmatri);

    $where_rbusiness = array('bd_active_flag'=>0,'approval_flag'=>1);
    $business_reject = $this->sb->count_all('business_directory',$where_rbusiness);
    
    $ary = array("sms_balance"=>number_format($final_bal),
                 "members"=>number_format($countr),
                 "active_device"=>number_format($countr_device),
                 "total_members"=>number_format($total_members),
                 "total_matrimony"=>number_format($active_matrimony),
                 "total_business"=>number_format($active_business),
                 "total_income"=>number_format($total_income,2),
                 "total_expense"=>number_format($total_expense,2),
                 "total_balance"=>number_format($total_balance,2),
                 "user_reject"=>number_format($user_reject),
                 "family_reject"=>number_format($family_reject),
                 "matrimony_reject"=>number_format($matrimony_reject),
                 "business_reject"=>number_format($business_reject));
    echo json_encode($ary);
  }

  function count_expense($where_expense)
  {
    $sum = 0;
    $ary = $this->sb->get_list('transaction_details',$where_expense,array('TOTALAMT'),'','','tra_id','DESC');
    for($i=0;$i<count($ary);$i++)
    {
      $sum = $sum + $ary[$i]['TOTALAMT'];
    }
    return $sum;
  }

  function count_income($where_income)
  {
    $sum = 0;
    $ary = $this->sb->get_list('transaction_details',$where_income,array('TOTALAMT'),'','','tra_id','DESC');
    for($i=0;$i<count($ary);$i++)
    {
      $sum = $sum + $ary[$i]['TOTALAMT'];
    }
    return $sum; 
  }

}

?>
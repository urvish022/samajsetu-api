<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = FALSE;

$route['terms'] = 'Terms/index';

$route['api/register_member'] = 'Apiss/register_member';
$route['api/fetch_business_lists'] = 'Apiss/fetch_business_lists';
$route['api/organization_list'] = 'Apiss/organization_list';
$route['api/view_dashboard_ui'] = 'Apiss/view_dashboard_ui';
$route['api/view_album'] = 'Apiss/view_album';
$route['api/view_gallery'] = 'Apiss/view_gallery';
$route['api/view_village_history'] = 'Apiss/view_village_history';
$route['api/view_business_cate'] = 'Apiss/view_business_cate';
$route['api/member_list_of_village'] = 'Apiss/member_list_of_village';
$route['api/view_relation_option'] = 'Apiss/view_relation_option';
$route['api/register_family_member'] = 'Apiss/register_family_member';
$route['api/do_login'] = 'Apiss/do_login';
$route['api/register_matrimony'] = 'Apiss/register_matrimony';
$route['api/register_memorial'] = 'Apiss/register_memorial';
$route['api/register_business'] = 'Apiss/register_business';
$route['api/ad_charges'] = 'Apiss/ad_charges';
$route['api/matrimony_list'] = 'Apiss/matrimony_list';
$route['api/matrimony_single'] = 'Apiss/matrimony_single';
$route['api/memorial_list'] = 'Apiss/memorial_list';
$route['api/family_details'] = 'Apiss/family_details';
$route['api/get_app_info'] = 'Apiss/get_app_info';
$route['api/carrer_cat_list'] = 'Apiss/carrer_cat_list';
$route['api/carrer_list'] = 'Apiss/carrer_list';
$route['api/carrer_details'] = 'Apiss/carrer_details';
$route['api/news_list'] = 'Apiss/news_list';
$route['api/news_detail'] = 'Apiss/news_detail';
$route['api/event_lists'] = 'Apiss/event_lists';
$route['api/event_detail'] = 'Apiss/event_detail';
$route['api/proud_list'] = 'Apiss/proud_list';
$route['api/proud_detail'] = 'Apiss/proud_detail';
$route['api/team_details'] = 'Apiss/team_details';
$route['api/view_village_and_country'] = 'Apiss/view_village_and_country';
$route['api/view_village'] = 'Apiss/view_village';
$route['api/fetch_own_profile'] = 'Apiss/fetch_own_profile';
$route['api/fetch_family_list_profile'] = 'Apiss/fetch_family_list_profile';
$route['api/get_transaction_list'] = 'Apiss/get_transaction_list';
$route['api/generate_otp'] = 'Apiss/generate_otp';
$route['api/update_password'] = 'Apiss/update_password';
$route['api/business_list'] = 'Apiss/business_list';
$route['api/business_detail'] = 'Apiss/business_detail';
$route['api/update_new_password'] = 'Apiss/update_new_password';
$route['api/update_own_profile'] = 'Apiss/update_own_profile';
$route['api/update_family_profile'] = 'Apiss/update_family_profile';
$route['api/fetch_matrimony_lists'] = 'Apiss/fetch_matrimony_lists';
$route['api/fetch_memorial_lists'] = 'Apiss/fetch_memorial_lists';
$route['api/update_matrimony_lists'] = 'Apiss/update_matrimony_lists';
$route['api/fetch_business_lists'] = 'Apiss/fetch_business_lists';
$route['api/update_business_details'] = 'Apiss/update_business_details';
$route['api/delete_memorial'] = 'Apiss/delete_memorial';
$route['api/delete_matrimony'] = 'Apiss/delete_matrimony';
$route['api/delete_family_member'] = 'Apiss/delete_family_member';
$route['api/save_fcm_token'] = 'Apiss/save_fcm_token';
$route['api/blood_list'] = 'Apiss/blood_list';
$route['api/blood_detail'] = 'Apiss/blood_detail';
$route['api/filter_matrimony'] = 'Apiss/filter_matrimony';
$route['api/upload_image'] = 'Apiss/upload_image';

//laravel route
$route['api/upload_curl_image'] = 'Apiss/upload_curl_image';

$route['google_drive/upload'] = 'Cron/upload';
$route['google_drive/callback'] = 'Cron/callback';
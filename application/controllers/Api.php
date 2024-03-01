<?php
class Api extends MY_controller
{
    public $village_tbl = "village_setting";

    public $app_ui_setting_tbl = "app_ui_setting";

    public $country_details_tbl = "country_details";

    public $member_details_tbl = "member_details";

    public $fcm_tbl = "fcm_details";

    public $news_tbl = "news_details";

    public $slider_setting_tbl = "slider_setting";

    public $gallery_tbl = "photo_gallery";

    public $album_tbl = "album_details";

    public $transaction_tbl = "transaction_details";

    public $village_hstry_tbl = "village_history";

    public $relation_tbl = "relation_details";

    public $bussiness_category_tbl = "bussiness_category";

    public $matrimony_tbl = "matrimony_details";

    public $memorial_tbl = "memorial_details";

    public $family_tbl = "family_details";

    public $business_tbl = "business_directory";

    public $ad_charges_tbl = "ad_charges";

    public $carrer_tbl = "carrer_post_details";

    public $event_tbl = "event_details";

    public $proud_tbl = "proud_details";

    public $organization_tbl = "organization_details";

    public $team_tbl = "team_details";

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Sql_builder", "sb");
    }

    //static api only send response start here

    public function ad_charges()
    {
        $count = $this->sb->count_all($this->ad_charges_tbl);

        if ($count > 0) {
            $columns = ["duration", "price"];

            $list = $this->sb->get_list_nowhere(
                $this->ad_charges_tbl,
                $columns,
                "",
                "",
                "duration",
                "ASC"
            );

            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "data" => $list,
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function view_dashboard_ui()
    {
        $columns = ["id", "icon", "guj_name", "eng_name", "activity_name"];
        $where_array = ["active_flag" => 1, "ui_category" => "grid"];
        $count = $this->sb->count_all($this->app_ui_setting_tbl, $where_array);

        if ($count > 0) {
            $list = $this->sb->get_list(
                $this->app_ui_setting_tbl,
                $where_array,
                $columns,
                "",
                "",
                "eng_name",
                "ASC"
            );
        } else {
            $list = "";
        }

        $slider_columns = ["slider_id", "slider_name", "slider_photo", "business_id"];
        $slider_count = $this->sb->count_all($this->slider_setting_tbl);

        if ($slider_count > 0) {
            $slider_list = $this->sb->get_list_nowhere(
                $this->slider_setting_tbl,
                $slider_columns,
                "",
                "",
                "slider_name",
                "ASC"
            );
        } else {
            $slider_list = "";
        }

        if (isset($_POST["member_id"])) {
            $member_id = $_POST["member_id"];

            if (isset($member_id) && !empty($member_id)) {
                $check = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "mem_active_flag" => 1,
                ];

                $check_member = $this->sb->data_exists(
                    $this->member_details_tbl,
                    $check
                );

                if ($check_member) {
                    $member_status = 1;
                    $member_message = "Your account is active";
                } else {
                    $member_status = 2;
                    $member_message =
                        "Your account is Inactive. Please Contact Samaj Setu Admin (+91 9825076415)";
                }
            } else {
                $member_status = 0;
                $member_message = "You are a fresh User";
            }
        } else {
            $member_status = 0;
            $member_message = "You are a fresh User";
        }

        if (empty($list) && empty($slider_list)) {
            $json = json_encode([
                "status" => "fail",
                "status_code" => "0",
                "grid" => $list,
                "slider" => $slider_list,
                "member_status" => "",
                "member_message" => "",
                "app_version" => "1.2",
                "app_msg" => "You are currently using version",
                "share_msg" => "Download Samaj Setu App from Google Play Store https://play.google.com/store/apps/details?id=com.techwebsoft.samajsetu",
            ]);
        } else {
            $json = json_encode([
                "status" => "success",
                "status_code" => "1",
                "grid" => $list,
                "slider" => $slider_list,
                "member_status" => $member_status,
                "member_message" => $member_message,
                "app_version" => "1.2",
                "app_msg" => "સમાજ સેતુ એપ ની નવી અપડેટ આવી છે. જે પ્લે-સ્ટોર પરથી કરીને અપડેટ કરવાની રહેશે.",
                "share_msg" => "Download Samaj Setu App from Google Play Store https://play.google.com/store/apps/details?id=com.techwebsoft.samajsetu",
            ]);
        }

        echo $json;
    }

    public function get_app_info()
    {
        $count = $this->sb->count_all("app_detail");

        if ($count > 0) {
            $row = $this->sb->get_single_nowhere("app_detail");

            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "data" => $row->app_desc,
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function view_album()
    {
        $my_album_ary = [];
        $count = $this->sb->count_all($this->album_tbl);

        if ($count > 0) {
            $list = $this->sb->get_list_nowhere(
                $this->album_tbl,
                "",
                "",
                "",
                "album_id",
                "DESC"
            );

            for ($i = 0; $i < count($list); $i++) {
                $where_array = ["album_id" => $list[$i]["album_id"]];
                $count = $this->sb->count_all($this->gallery_tbl, $where_array);

                if ($count > 0) {
                    $myrow = $this->sb->get_single($this->gallery_tbl, $where_array);

                    $row["album_id"] = $list[$i]["album_id"];
                    $row["album_name"] = $list[$i]["album_name"];
                    $row["album_date"] = sqltodateformat($list[$i]["date"]);
                    $row["photo_name"] = $myrow->photo_name;
                    $row["photo_count"] = $count;

                    $my_album_ary[] = $row;
                }
            }

            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "data" => $my_album_ary,
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function view_village()
    {
        extract($_POST);

        $columns = ["village_id", "guj_name", "eng_name"];

        $where_array = ["active_flag" => 1];

        $count = $this->sb->count_all($this->village_tbl, $where_array);

        if ($count > 0) {
            $list = $this->sb->get_list(
                $this->village_tbl,
                $where_array,
                $columns,
                "",
                "",
                "eng_name",
                "ASC"
            );

            if (isset($family_count)) {
                if ($family_count == true) {
                    for ($i = 0; $i < count($list); $i++) {
                        $member_where = [
                            "village_id" => $list[$i]["village_id"],
                            "approval_flag" => 1,
                            "mem_active_flag" => 1,
                        ];

                        $fcount[$i] = $this->sb->count_all(
                            $this->member_details_tbl,
                            $member_where
                        );

                        $counter["eng_name"] = $list[$i]["eng_name"];

                        $counter["guj_name"] = $list[$i]["guj_name"];

                        $counter["village_id"] = $list[$i]["village_id"];

                        $counter["family_counter"] = $fcount[$i];

                        $counter_ary[] = $counter;
                    }
                }
            } else {
                for ($i = 0; $i < count($list); $i++) {
                    $counter["eng_name"] = $list[$i]["eng_name"];

                    $counter["guj_name"] = $list[$i]["guj_name"];

                    $counter["village_id"] = $list[$i]["village_id"];

                    $counter["family_counter"] = "";

                    $counter_ary[] = $counter;
                }
            }

            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "data" => $counter_ary,
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function view_village_and_country()
    {
        $columns = ["village_id", "guj_name", "eng_name"];

        $columns_country = ["country_id", "country_std", "country_name"];

        $where_array = ["active_flag" => 1];

        $count = $this->sb->count_all($this->village_tbl, $where_array);

        $country_count = $this->sb->count_all(
            $this->country_details_tbl,
            $where_array
        );

        if ($count > 0 && $country_count > 0) {
            $list = $this->sb->get_list(
                $this->village_tbl,
                $where_array,
                $columns,
                "",
                "",
                "eng_name",
                "ASC"
            );

            $country_list = $this->sb->get_list(
                $this->country_details_tbl,
                $where_array,
                $columns_country,
                "",
                "",

                "country_id",
                "ASC"
            );

            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "village" => $list,
                "country" => $country_list,
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function carrer_cat_list()
    {
        $count = $this->sb->count_all("carrer_post_category");

        if ($count > 0) {
            $list = $this->sb->get_list_nowhere("carrer_post_category");

            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "data" => $list,
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function view_relation_option()
    {
        $count = $this->sb->count_all($this->relation_tbl);

        if ($count > 0) {
            $list = $this->sb->get_list_nowhere(
                $this->relation_tbl,
                "",
                "",
                "",
                "relation_id",
                "ASC"
            );

            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "data" => $list,
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function view_business_cate()
    {
        $count = $this->sb->count_all($this->bussiness_category_tbl);

        if ($count > 0) {
            $columns = ["bc_id", "bc_eng_name", "bc_guj_name"];

            $list = $this->sb->get_list_nowhere(
                $this->bussiness_category_tbl,
                $columns,
                "",
                "",
                "bc_eng_name",
                "ASC"
            );

            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "data" => $list,
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    //static api only send response end here

    public function do_login()
    {
        extract($_POST);
        if (isset($user_name) && isset($password)) {
            if (!empty($user_name) && !empty($password)) {
                $check_ary = [
                    "user_name" => $user_name,
                    "password" => my_simple_crypt($password),
                ];
                $check_member = $this->sb->data_exists(
                    $this->member_details_tbl,
                    $check_ary
                );

                if ($check_member) {
                    $second_check_ary = [
                        "user_name" => $user_name,
                        "password" => my_simple_crypt($password),
                        "approval_flag" => 1,
                        "mem_active_flag" => 1,
                    ];
                    $second_check_member = $this->sb->data_exists(
                        $this->member_details_tbl,
                        $second_check_ary
                    );
                    if ($second_check_member) {
                        $row = $this->sb->get_single(
                            $this->member_details_tbl,
                            $second_check_ary
                        );
                        $village_ary = $this->get_village($row->village_id);

                        if (isset($device_id) && !empty($device_id)) {
                            if (isset($fcm_token) && !empty($fcm_token)) {
                                $fcm_ary = [
                                    "member_id" => $row->member_id,
                                    "device_id" => $device_id,
                                    "active_flag" => 1,
                                ];
                                $fcm_check = $this->sb->data_exists(
                                    $this->fcm_tbl,
                                    $fcm_ary
                                );

                                if ($fcm_check) {
                                    $update_ary = ["fcm_token" => $fcm_token];
                                    $status = $this->sb->update(
                                        $this->fcm_tbl,
                                        $update_ary,
                                        $fcm_ary
                                    );
                                } else {
                                    $insert_ary = [
                                        "member_id" => $row->member_id,
                                        "device_id" => $device_id,
                                        "fcm_token" => $fcm_token,
                                    ];
                                    $status = $this->sb->insert(
                                        $this->fcm_tbl,
                                        $insert_ary
                                    );
                                }
                            }
                        }

                        $mydata["member_id"] = $row->member_id;
                        $mydata["village_id"] = $row->village_id;
                        $mydata["village_eng_name"] = $village_ary->eng_name;
                        $mydata["village_guj_name"] = $village_ary->guj_name;
                        $mydata["full_name_eng"] = $row->full_name_eng;
                        $mydata["full_name_guj"] = $row->full_name_guj;
                        $mydata["mobile_no"] = $row->mobile_no;
                        $mydata["photo"] = $row->photo;
                        $mydata["user_name"] = $row->user_name;

                        echo json_encode([
                            "status" => "success",
                            "status_code" => "1",
                            "data" => [$mydata],
                        ]);
                    } else {
                        echo json_encode([
                            "status" => "fail",
                            "status_code" => "2",
                            "data" => "",
                            "eng_msg" => "Your account is inactive!",
                            "guj_msg" => "તમારું એકાઉન્ટ ઈનએકટીવ છે",
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                        "eng_msg" => "Username & password are wrong!",
                        "guj_msg" => "યુઝરનામ અને પાસવર્ડ ખોટો છે.",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "3",
                    "data" => "",
                    "eng_msg" => "Something Went Wrong!",
                    "guj_msg" => "કંઈક ખોટું થઇ ગયું છે",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "3",
                "data" => "",
                "eng_msg" => "Something Went Wrong!",
                "guj_msg" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function register_member()
    {
        extract($_POST);

        if (
            isset($full_name_eng) &&
            $village_id &&
            $country_id &&
            $city_name &&
            $birth_date &&
            $mobile_no
        ) {
            //check alredy exist or not user

            $check_array = ["mobile_no" => $mobile_no];

            $check_member = $this->sb->data_exists(
                $this->member_details_tbl,
                $check_array
            );

            if ($check_member) {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "2",
                    "eng_message" => "This mobile number is alredy registered",
                    "guj_message" => "આ મોબાઈલ નંબર પહેલેથી રજીસ્ટર છે",
                ]);
            } else {
                if (
                    isset($_FILES["photo"]["name"]) &&
                    $_FILES["photo"]["size"] > 0
                ) {
                    $file = $_FILES["photo"]["name"];

                    $path = "./assets/uploads/user_photo";

                    $upload = $this->upload_img(
                        $file,
                        "5000",
                        "100%",
                        "300",
                        "300",
                        "",
                        "photo",
                        "",
                        $path
                    );

                    if ($upload["status"]) {
                        $photo = $upload["img_name"];
                    } else {
                        $photo = "no_user.jpg";
                    }
                } else {
                    $photo = "no_user.jpg";
                }

                $responseDecoded = $this->translate_text($full_name_eng);

                if (empty($responseDecoded["responseData"]["translatedText"])) {
                    $full_name_guj = "";
                } else {
                    $full_name_guj =
                        $responseDecoded["responseData"]["translatedText"];
                }

                $member_array = [
                    "full_name_eng" => ucwords($full_name_eng),
                    "full_name_guj" => $full_name_guj,

                    "village_id" => $village_id,
                    "country_id" => $country_id,
                    "city_name" => ucwords($city_name),

                    "birth_date" => datetosqlformat($birth_date),
                    "blood_grp" => ucwords($blood_grp),
                    "mobile_no" => $mobile_no,
                    "email_id" => $email_id,

                    "address" => ucwords($address),
                    "photo" => $photo,
                ];

                $insert_status = $this->sb->insert(
                    $this->member_details_tbl,
                    $member_array
                );

                if ($insert_status > 0) {
                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "eng_message" =>
                            "Your registration is done successfully. Admin will verify your profile. and Username and password will be send on your mobile. and that username and password will be one for all your family's mobile devices.",
                        "guj_message" =>
                            "તમારું રજીસ્ટ્રેશન થઇ ગયું છે. એડમીન ચકાસી ને એપ્રુવ કરશે ત્યારે યુઝરનામ અને પાસવર્ડ તમારા ફોન પર મેસેજ કરવામા આવશે.અને તે યુઝરનામ અને પાસવર્ડ એક જ રહેશે પરિવાર ના બધા મોબાઈલ માટે.ધન્યવાદ.",
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" =>
                            "Your profile is not added successfully.",

                        "guj_message" => "તમારી પ્રોફાઇલ એડ થઇ નથી.",
                    ]);
                }
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something Went Wrong",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function register_matrimony()
    {
        extract($_POST);

        if (
            isset($full_name_eng) &&
            $village_id &&
            $country_id &&
            $birth_date &&
            $mobile_no &&
            $gender
        ) {
            //check alredy exist or not user

            $check_array = ["mobile_no" => $mobile_no, "met_active_flag" => 1];

            $check_member = $this->sb->data_exists(
                $this->matrimony_tbl,
                $check_array
            );

            if ($check_member) {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "2",
                    "eng_message" => "This mobile number is alredy registered",
                    "guj_message" => "આ મોબાઈલ નંબર પહેલેથી રજીસ્ટર છે",
                ]);
            } else {
                if (
                    isset($_FILES["photo"]["name"]) &&
                    $_FILES["photo"]["size"] > 0
                ) {
                    $file = $_FILES["photo"]["name"];

                    $path = "./assets/uploads/matrimony_photo";

                    $upload = $this->upload_img(
                        $file,
                        "5000",
                        "100%",
                        "300",
                        "300",
                        "",
                        "photo",
                        "",
                        $path
                    );

                    if ($upload["status"]) {
                        $photo = $upload["img_name"];
                    } else {
                        $photo = "no_user.jpg";
                    }
                } else {
                    $photo = "no_user.jpg";
                }

                $responseDecoded = $this->translate_text($full_name_eng);

                if (empty($responseDecoded["responseData"]["translatedText"])) {
                    $full_name_guj = "";
                } else {
                    $full_name_guj =
                        $responseDecoded["responseData"]["translatedText"];
                }

                $member_array = [
                    "full_name_eng" => ucwords($full_name_eng),

                    "full_name_guj" => $full_name_guj,
                    "village_id" => $village_id,
                    "country_id" => $country_id,

                    "sakh" => ucwords($sakh),
                    "birth_date" => datetosqlformat($birth_date),
                    "gender" => ucwords($gender),

                    "member_id" => $member_id,
                    "education" => ucwords($education),
                    "height" => ucwords($height),

                    "weight" => ucwords($weight),
                    "mosad" => ucwords($mosad),

                    "occupation" => ucwords($occupation),
                    "address" => ucwords($address),
                    "photo" => $photo,

                    "maritual_status" => ucwords($maritual_status),
                    "extra_details" => ucwords($extra_details),

                    "mobile_no" => $mobile_no,
                    "land" => $land,
                    "mother_name" => ucwords($mother_name),
                    "mosad_sakh" => ucwords($mosad_sakh),

                    "father_occupation" => ucwords($father_occupation),
                    "mother_occupation" => ucwords($mother_occupation),

                    "brother" => $brother,
                    "sister" => $sister,
                    "income" => $income,
                    "father_mobile" => $father_mobile,
                ];

                $insert_status = $this->sb->insert(
                    $this->matrimony_tbl,
                    $member_array
                );

                if ($insert_status > 0) {
                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "eng_message" =>
                            "Your matrimony profile added successfully. Admin will verify this profile.",
                        "guj_message" =>
                            "તમારી લગ્નન સંબંધ ની માહિતી સેવ થઇ ગઈ છે. એડમીન ચકાસી ને એપ્રુવ કરશે.",
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" =>
                            "Your matrimony profile not added successfully.",
                        "guj_message" =>
                            "તમારી લગ્નન સંબંધ ની માહિતી સેવ થઇ નથી.",
                    ]);
                }
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something Went Wrong",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function register_memorial()
    {
        extract($_POST);

        if (
            isset($full_name_eng) &&
            $village_id &&
            $dead_date &&
            $memorial_date
        ) {
            //check alredy exist or not user

            $check_array = [
                "member_id" => $member_id,
                "full_name_eng" => ucwords($full_name_eng),
                "mem_active_flag" => 1,
            ];

            $check_member = $this->sb->data_exists(
                $this->memorial_tbl,
                $check_array
            );

            if ($check_member) {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "2",
                    "eng_message" => "This memorial profile is alredy added",
                    "guj_message" => "આ બેસણા ની માહિતી પેહલેથી એડ થયેલી છે.",
                ]);
            } else {
                if (
                    isset($_FILES["photo"]["name"]) &&
                    $_FILES["photo"]["size"] > 0
                ) {
                    $file = $_FILES["photo"]["name"];

                    $path = "./assets/uploads/memorial_photo";

                    $upload = $this->upload_img(
                        $file,
                        "5000",
                        "100%",
                        "300",
                        "300",
                        "",
                        "photo",
                        "",
                        $path
                    );

                    if ($upload["status"]) {
                        $photo = $upload["img_name"];
                    } else {
                        $photo = "no_memorial.jpg";
                    }
                } else {
                    $photo = "no_memorial.jpg";
                }

                $responseDecoded = $this->translate_text($full_name_eng);

                if (empty($responseDecoded["responseData"]["translatedText"])) {
                    $full_name_guj = "";
                } else {
                    $full_name_guj =
                        $responseDecoded["responseData"]["translatedText"];
                }

                $dead_date_name = date("l", strtotime($dead_date));

                $dead_day_name = $this->get_day_name($dead_date_name);

                $memorial_date_name = date("l", strtotime($memorial_date));

                $memorial_day_name = $this->get_day_name($memorial_date_name);

                $memorial_date1_name = date("l", strtotime($memorial_date1));

                $memorial_day_name1 = $this->get_day_name($memorial_date1_name);

                if (empty($memorial_date1)) {
                    $memorial_date1 = null;
                } else {
                    $memorial_date1 = datetosqlformat($memorial_date1);
                }

                $member_array = [
                    "full_name_eng" => ucwords($full_name_eng),

                    "full_name_guj" => $full_name_guj,
                    "village_id" => $village_id,

                    "dead_date" => datetosqlformat($dead_date),
                    "dead_day_name" => $dead_day_name,

                    "memorial_date" => datetosqlformat($memorial_date),

                    "member_id" => $member_id,
                    "memorial_day_name" => $memorial_day_name,

                    "memorial_time" => $memorial_time,
                    "memorial_place" => ucwords($memorial_place),

                    "memorial_date1" => $memorial_date1,
                    "memorial_day_name1" => $memorial_day_name1,

                    "memorial_time1" => $memorial_time1,
                    "memorial_place1" => ucwords($memorial_place1),

                    "memorial_from" => ucwords($memorial_from),
                    "photo" => $photo,
                    "memorial_fulltext" => "",
                ];

                $insert_status = $this->sb->insert(
                    $this->memorial_tbl,
                    $member_array
                );

                if ($insert_status > 0) {
                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "eng_message" =>
                            "Your memorial profile added successfully.",
                        "guj_message" =>
                            "બેસણા ની માહિતી એડ થઈ ગઈ છે.એડમીન ચકાસી ને એપ્રુવ કરશે.",
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" =>
                            "Your memorial profile not added successfully.",
                        "guj_message" => "બેસણા ની માહિતી એડ થઈ નથી.",
                    ]);
                }
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something Went Wrong",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function register_family_member()
    {
        extract($_POST);

        if (isset($ffull_name_eng) && isset($member_id)) {
            $check_array = [
                "member_id" => $member_id,
                "ffull_name_eng" => ucwords($ffull_name_eng),

                "relation_id" => $relation_id,
                "fd_active_flag" => 1,
            ];

            $check_member = $this->sb->data_exists(
                $this->family_tbl,
                $check_array
            );

            if ($check_member) {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "2",
                    "eng_message" => "This member is alredy registered",
                    "guj_message" => "આ સભ્ય પહેલેથી રજીસ્ટર છે",
                ]);
            } else {
                if (
                    isset($_FILES["fphoto"]["name"]) &&
                    $_FILES["fphoto"]["size"] > 0
                ) {
                    $file = $_FILES["fphoto"]["name"];

                    $path = "./assets/uploads/user_photo";

                    $upload = $this->upload_img(
                        $file,
                        "5000",
                        "100%",
                        "300",
                        "300",
                        "",
                        "fphoto",
                        "",
                        $path
                    );

                    if ($upload["status"]) {
                        $fphoto = $upload["img_name"];
                    } else {
                        $fphoto = "no_user.jpg";
                    }
                } else {
                    $fphoto = "no_user.jpg";
                }

                $responseDecoded = $this->translate_text($ffull_name_eng);

                if (empty($responseDecoded["responseData"]["translatedText"])) {
                    $ffull_name_guj = "";
                } else {
                    $ffull_name_guj =
                        $responseDecoded["responseData"]["translatedText"];
                }

                $member_array = [
                    "ffull_name_eng" => ucwords($ffull_name_eng),

                    "ffull_name_guj" => $ffull_name_guj,
                    "relation_id" => $relation_id,

                    "member_id" => $member_id,
                    "village_id" => $village_id,

                    "fcity_name" => ucwords($fcity_name),
                    "fblood_grp" => ucwords($fblood_grp),

                    "fbirth_date" => datetosqlformat($fbirth_date),
                    "fmosad" => ucwords($fmosad),

                    "fpiyar" => ucwords($fpiyar),
                    "fmarried_status" => ucwords($fmarried_status),

                    "feducation" => ucwords($feducation),
                    "foccupation" => ucwords($foccupation),

                    "fmobile_no" => $fmobile_no,
                    "femail_id" => $femail_id,
                    "fphoto" => $fphoto,

                    "country_id" => $country_id,
                    "fbussiness_address" => ucwords($fbussiness_address),
                ];

                $insert_status = $this->sb->insert(
                    $this->family_tbl,
                    $member_array
                );

                if ($insert_status > 0) {
                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "eng_message" =>
                            "Your family member added successfully. Admin will verify details.",
                        "guj_message" =>
                            "તમારા પરિવાર સભ્ય ની માહિતી એડ થઈ ગઈ છે. એડમીન ચકાસી ને એપ્રુવ કરશે.",
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" =>
                            "Your family member not added successfully",
                        "guj_message" =>
                            "તમારા પરિવાર સભ્ય ની માહિતી એડ થઈ નથી.",
                    ]);
                }
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something Went Wrong",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function register_business()
    {
        extract($_POST);

        if (isset($bc_id) && isset($member_id) && isset($company_name_eng)) {
            $check_array = [
                "member_id" => $member_id,
                "company_name_eng" => ucwords($company_name_eng),
                "bc_id" => $bc_id,

                "bd_active_flag" => 1,
            ];

            $check_member = $this->sb->data_exists(
                $this->business_tbl,
                $check_array
            );

            if ($check_member) {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "2",
                    "eng_message" => "This business is alredy registered",
                    "guj_message" => "આ બિઝનેસ પ્રોફાઇલ પહેલેથી રજીસ્ટર્ડ છે.",
                ]);
            } else {
                if (
                    isset($_FILES["photo"]["name"]) &&
                    $_FILES["photo"]["size"] > 0
                ) {
                    $file = $_FILES["photo"]["name"];

                    $path = "./assets/uploads/business_photo";

                    $upload = $this->upload_img(
                        $file,
                        "5000",
                        "100%",
                        "",
                        "",
                        "",
                        "photo",
                        "",
                        $path
                    );

                    if ($upload["status"]) {
                        $photo = $upload["img_name"];
                    } else {
                        $photo = "no_business.jpg";
                    }
                } else {
                    $photo = "no_business.jpg";
                }

                $responseDecoded = $this->translate_text($company_name_eng);

                if (empty($responseDecoded["responseData"]["translatedText"])) {
                    $company_name_guj = "";
                } else {
                    $company_name_guj =
                        $responseDecoded["responseData"]["translatedText"];
                }

                $order_no = $this->sb->get_custom_id(
                    "business_directory",
                    "business_id",
                    "SS"
                );

                $member_array = [
                    "bc_id" => $bc_id,
                    "owner_name" => $owner_name,

                    "company_name_eng" => ucwords($company_name_eng),
                    "company_name_guj" => $company_name_guj,

                    "village_id" => $village_id,
                    "member_id" => $member_id,
                    "area" => ucwords($area),
                    "address" => ucwords($address),

                    "country_id" => $country_id,
                    "mobile_no" => $mobile_no,
                    "wp_mobile_no" => $wp_mobile_no,
                    "email" => $email,

                    "website" => $website,
                    "photo" => $photo,
                    "timing" => ucwords($timing),
                    "details" => ucwords($details),

                    "ad_category" => "business_ad",
                    "ad_duration_year" => $ad_duration_year,
                    "order_no" => $order_no,

                    "payment_status" => "PENDING",
                ];

                $insert_status = $this->sb->insert(
                    $this->business_tbl,
                    $member_array
                );

                if ($insert_status > 0) {
                    $checksumhash = $this->generate_checksumhash(
                        $order_no,
                        $member_id,
                        $amount
                    );

                    if (!empty($checksumhash["checksum"])) {
                        echo json_encode([
                            "status" => "success",

                            "status_code" => "1",

                            "checksumhash" => $checksumhash["checksum"],

                            "order_no" => $order_no,

                            "MID" => $checksumhash["paramList"]["MID"],

                            "ORDER_ID" =>
                                $checksumhash["paramList"]["ORDER_ID"],

                            "CUST_ID" => $checksumhash["paramList"]["CUST_ID"],

                            "CHANNEL_ID" =>
                                $checksumhash["paramList"]["CHANNEL_ID"],

                            "TXN_AMOUNT" =>
                                $checksumhash["paramList"]["TXN_AMOUNT"],

                            "CALLBACK_URL" =>
                                "https://pguat.paytm.com/paytmchecksum/paytmCallback.jsp",

                            "INDUSTRY_TYPE_ID" =>
                                $checksumhash["paramList"]["INDUSTRY_TYPE_ID"],

                            "WEBSITE" => $checksumhash["paramList"]["WEBSITE"],
                        ]);
                    } else {
                        echo json_encode([
                            "status" => "fail",
                            "status_code" => "0",
                            "eng_message" => "Something Went Wrong",
                            "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" => "Something Went Wrong",
                        "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
                    ]);
                }
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something Went Wrong",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function view_gallery()
    {
        extract($_POST);

        if (isset($album_id)) {
            $where_array = ["album_id" => $album_id];

            $count = $this->sb->count_all($this->gallery_tbl, $where_array);

            if ($count > 0) {
                $myrow = $this->sb->get_single($this->album_tbl, $where_array);

                $colmns = ["photo_name"];

                $data = $this->sb->get_list(
                    $this->gallery_tbl,
                    $where_array,
                    $colmns,
                    "",
                    "",
                    "photo_name",
                    "ASC"
                );

                for ($i = 0; $i < count($data); $i++) {
                    $row["photo_name"] = $data[$i]["photo_name"];

                    $gallery_ary[] = $row;
                }

                $json = [
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $gallery_ary,
                ];
            } else {
                $json = [
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ];
            }
        } else {
            $json = ["status" => "fail", "status_code" => "0", "data" => ""];
        }

        echo json_encode($json);
    }

    public function view_village_history()
    {
        extract($_POST);

        if (isset($village_id)) {
            $where_ary = ["village_id" => $village_id, "active_flag" => 1];

            $count = $this->sb->count_all($this->village_hstry_tbl, $where_ary);

            if ($count > 0) {
                $row = $this->sb->get_single(
                    $this->village_hstry_tbl,
                    $where_ary
                );

                $mydata = [
                    "village_photo" => $row->village_photo,

                    "village_history" => $row->village_history,
                ];

                $json = json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => [$row],
                ]);
            } else {
                $json = json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            $json = json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }

        echo $json;
    }

    public function member_list_of_village()
    {
        extract($_POST);

        if (empty($village_id)) {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        } else {
            $where_array = [
                "village_id" => $village_id,
                "approval_flag" => 1,
                "mem_active_flag" => 1,
            ];

            $count = $this->sb->count_all(
                $this->member_details_tbl,
                $where_array
            );

            if ($count > 0) {
                $limit = 15;

                if (!isset($page)) {
                    $page = 1;
                }

                $offset = ($page - 1) * $limit;

                $columns = [
                    "member_id",
                    "full_name_eng",
                    "full_name_guj",
                    "mobile_no",
                    "photo",
                    "city_name",
                ];

                $list = $this->sb->get_list(
                    $this->member_details_tbl,
                    $where_array,
                    $columns,
                    $limit,
                    $offset,
                    "full_name_eng",
                    "ASC"
                );

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $list,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        }
    }

    public function matrimony_list()
    {
        extract($_POST);

        if (!isset($gender)) {
            $gender = "Male";
        }

        $where = [
            "approval_flag" => 1,
            "met_active_flag" => 1,
            "gender" => $gender,
        ];

        $columns = [
            "matrimony_id",
            "full_name_eng",
            "full_name_guj",
            "eng_name",
            "guj_name",
            "photo",
        ];

        $count = $this->sb->count_all($this->matrimony_tbl, $where);

        $limit = 15;

        $total_page = ceil($count / $limit);

        if ($count > 0) {
            if (!isset($page)) {
                $page = 1;
            }

            if ($page <= $total_page) {
                $offset = ($page - 1) * $limit;

                $join_village_tbl = [
                    "village_setting vs",
                    "vs.village_id = matrimony_details.village_id",
                    "LEFT",
                ];

                $list = $this->sb->get_join_list(
                    $this->matrimony_tbl,
                    $where,
                    $columns,
                    $limit,
                    $offset,
                    "matrimony_id",
                    "DESC",
                    $join_village_tbl
                );

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $list,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function matrimony_single()
    {
        extract($_POST);

        if (isset($matrimony_id)) {
            if (!empty($matrimony_id)) {
                $columns = [
                    "sakh",
                    "birth_date",
                    "education",
                    "height",
                    "weight",
                    "mosad",
                    "occupation",
                    "address",
                    "mobile_no",
                    "maritual_status",
                    "extra_details",
                    "country_name",
                    "land",
                    "mother_name",
                    "mosad_sakh",
                    "father_occupation",
                    "mother_occupation",
                    "brother",
                    "sister",
                    "income",
                    "father_mobile",
                ];

                $where = ["matrimony_id" => $matrimony_id];

                $join_country_tbl = [
                    "country_details cd",
                    "cd.country_id = matrimony_details.country_id",
                    "LEFT",
                ];

                $list = $this->sb->get_join_list(
                    $this->matrimony_tbl,
                    $where,
                    $columns,
                    "",
                    "",
                    "",
                    "",
                    $join_country_tbl
                );

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $list,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function memorial_list()
    {
        extract($_POST);

        if (!isset($page)) {
            $page = 1;
        }

        $where = ["approval_flag" => 1, "mem_active_flag" => 1];

        $columns = [
            "memorial_id",
            "full_name_eng",
            "full_name_guj",
            "eng_name",
            "guj_name",
            "photo",
            "memorial_fulltext",
        ];

        $count = $this->sb->count_all($this->memorial_tbl, $where);

        $limit = 15;

        $total_page = ceil($count / $limit);

        if ($count > 0) {
            if ($page <= $total_page) {
                $offset = ($page - 1) * $limit;

                $join_village_tbl = [
                    "village_setting vs",
                    "vs.village_id = memorial_details.village_id",
                    "LEFT",
                ];

                $list = $this->sb->get_join_list(
                    $this->memorial_tbl,
                    $where,
                    $columns,
                    $limit,
                    $offset,
                    "memorial_id",
                    "DESC",

                    $join_village_tbl
                );

                for ($i = 0; $i < count($list); $i++) {
                    $row["memorial_id"] = $list[$i]["memorial_id"];

                    $row["full_name_eng"] = $list[$i]["full_name_eng"];

                    $row["full_name_guj"] = $list[$i]["full_name_guj"];

                    $row["eng_name"] = $list[$i]["eng_name"];

                    $row["guj_name"] = $list[$i]["guj_name"];

                    $row["memorial_fulltext"] = $list[$i]["memorial_fulltext"];

                    $row["photo"] = $list[$i]["photo"];

                    $data[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $data,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function family_details()
    {
        extract($_POST);

        if (isset($member_id)) {
            if (!empty($member_id)) {
                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "mem_active_flag" => 1,
                ];

                $count = $this->sb->count_all(
                    $this->member_details_tbl,
                    $where
                );

                if ($count > 0) {
                    $fmly = [];

                    $columns = [
                        "city_name",
                        "sakh",
                        "birth_date",
                        "blood_grp",
                        "mosad",
                        "married_status",
                        "education",
                        "occupation",
                        "mobile_no",
                        "wp_mobile_no",
                        "email_id",
                        "address",
                        "bussiness_address",
                        "country_id",
                        "photo",
                    ];
                    $list = $this->sb->get_single(
                        $this->member_details_tbl,
                        $where,
                        $columns
                    );
                    $country_ary = $this->get_country($list->country_id);

                    $member["city_name"] = $list->city_name;
                    $member["sakh"] = $list->sakh;
                    $member["country_name"] = $country_ary->country_name;
                    $member["birth_date"] = sqltodateformat($list->birth_date);
                    $member["blood_grp"] = $list->blood_grp;
                    $member["mosad"] = $list->mosad;
                    $member["married_status"] = $list->married_status;
                    $member["education"] = $list->education;
                    $member["occupation"] = $list->occupation;
                    $member["mobile_no"] = $list->mobile_no;
                    $member["wp_mobile_no"] = $list->wp_mobile_no;
                    $member["photo"] = $list->photo;
                    $member["email_id"] = $list->email_id;
                    $member["address"] = $list->address;
                    $member["bussiness_address"] = $list->bussiness_address;

                    $where1 = [
                        "member_id" => $member_id,
                        "approval_flag" => 1,
                        "fd_active_flag" => 1,
                    ];

                    $columns1 = [
                        "ffull_name_eng",
                        "ffull_name_guj",
                        "fcity_name",
                        "fbirth_date",
                        "fblood_grp",
                        "fmosad",
                        "fpiyar",
                        "fmarried_status",
                        "feducation",
                        "foccupation",
                        "fmobile_no",
                        "femail_id",
                        "fphoto",
                        "fbussiness_address",
                        "relation_name_eng",
                        "relation_name_guj",
                        "country_name",
                    ];

                    $join_relation_tbl = [
                        "relation_details rd",
                        "rd.relation_id = family_details.relation_id",
                        "LEFT",
                    ];

                    $join_country_tbl = [
                        "country_details cd",
                        "cd.country_id = family_details.country_id",
                        "LEFT",
                    ];

                    $list2 = $this->sb->get_join_list(
                        $this->family_tbl,
                        $where1,
                        $columns1,
                        "",
                        "",
                        "fbirth_date",
                        "ASC",
                        $join_relation_tbl,
                        $join_country_tbl
                    );

                    for ($i = 0; $i < count($list2); $i++) {
                        $family_list["ffull_name_eng"] =
                            $list2[$i]["ffull_name_eng"];
                        $family_list["ffull_name_guj"] =
                            $list2[$i]["ffull_name_guj"];
                        $family_list["fcity_name"] = $list2[$i]["fcity_name"];
                        $family_list["fbirth_date"] = sqltodateformat(
                            $list2[$i]["fbirth_date"]
                        );
                        $family_list["fblood_grp"] = $list2[$i]["fblood_grp"];
                        $family_list["fmosad"] = $list2[$i]["fmosad"];
                        $family_list["relation_name_eng"] =
                            $list2[$i]["relation_name_eng"];
                        $family_list["relation_name_guj"] =
                            $list2[$i]["relation_name_guj"];
                        $family_list["country_name"] =
                            $list2[$i]["country_name"];
                        $family_list["fpiyar"] = $list2[$i]["fpiyar"];
                        $family_list["fmarried_status"] =
                            $list2[$i]["fmarried_status"];
                        $family_list["feducation"] = $list2[$i]["feducation"];
                        $family_list["foccupation"] = $list2[$i]["foccupation"];
                        $family_list["fmobile_no"] = $list2[$i]["fmobile_no"];
                        $family_list["femail_id"] = $list2[$i]["femail_id"];
                        $family_list["fphoto"] = $list2[$i]["fphoto"];
                        $family_list["fbussiness_address"] =
                            $list2[$i]["fbussiness_address"];
                        $family_list["fmobile_no"] = $list2[$i]["fmobile_no"];
                        $fmly[] = $family_list;
                    }

                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "data" => [$member],
                        "family" => $fmly,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function carrer_list()
    {
        extract($_POST);

        if (isset($cp_id)) {
            if (!empty($cp_id)) {
                $where = ["cp_id" => $cp_id];

                $count = $this->sb->count_all($this->carrer_tbl, $where);

                if ($count > 0) {
                    if (!isset($page)) {
                        $page = 1;
                    }

                    $limit = 15;

                    $total_page = ceil($count / $limit);

                    $colmns = [
                        "cpost_id",
                        "cpost_title",
                        "cpost_date",
                        "cpost_photo",
                    ];

                    if ($page <= $total_page) {
                        $offset = ($page - 1) * $limit;

                        $data = $this->sb->get_list(
                            $this->carrer_tbl,
                            $where,
                            $colmns,
                            $limit,
                            $offset,
                            "cpost_id",
                            "DESC"
                        );

                        echo json_encode([
                            "status" => "success",
                            "status_code" => "1",
                            "data" => $data,
                        ]);
                    } else {
                        echo json_encode([
                            "status" => "fail",
                            "status_code" => "0",
                            "data" => "",
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function carrer_details()
    {
        extract($_POST);

        if (isset($cpost_id)) {
            if (!empty($cpost_id)) {
                $where = ["cpost_id" => $cpost_id];

                $row = $this->sb->get_single($this->carrer_tbl, $where);

                $data["cpost_desc"] = $row->cpost_desc;

                if (!empty($row->cpost_attachment)) {
                    $data["cpost_attachment"] = implode(
                        ",",
                        json_decode($row->cpost_attachment, true)
                    );
                } else {
                    $data["cpost_attachment"] = "";
                }

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => [$data],
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function news_list()
    {
        extract($_POST);

        $count = $this->sb->count_all($this->news_tbl);

        if ($count > 0) {
            if (!isset($page)) {
                $page = 1;
            }

            $limit = 15;

            $total_page = ceil($count / $limit);

            $colmns = ["news_id", "post_title", "post_date", "post_photo"];

            if ($page <= $total_page) {
                $offset = ($page - 1) * $limit;

                $data = $this->sb->get_list_nowhere(
                    $this->news_tbl,
                    $colmns,
                    $limit,
                    $offset,
                    "news_id",
                    "DESC"
                );

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $data,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function news_detail()
    {
        extract($_POST);

        if (isset($news_id)) {
            if (!empty($news_id)) {
                $where = ["news_id" => $news_id];

                $columns = ["post_content", "post_attachment"];

                $row = $this->sb->get_single($this->news_tbl, $where, $columns);

                $data["post_content"] = $row->post_content;

                if (!empty($row->post_attachment)) {
                    $data["post_attachment"] = implode(
                        ",",
                        json_decode($row->post_attachment, true)
                    );
                } else {
                    $data["post_attachment"] = "";
                }

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => [$data],
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function business_list()
    {
        extract($_POST);

        $colmns = [
            "business_id",
            "bc_eng_name",
            "bc_guj_name",
            "owner_name",
            "company_name_eng",

            "company_name_guj",
            "area",
            "mobile_no",
            "photo",
            "country_std",
        ];

        if (isset($order_type) && !empty($order_type)) {
            $order_by = "company_name_eng";

            $order_type = $order_type;
        } else {
            $order_by = "business_id";

            $order_type = "DESC";
        }

        if (isset($bc_id)) {
            if (!empty($bc_id)) {
                $where = [
                    "approval_flag" => 1,
                    "bd_active_flag" => 1,
                    "payment_status" => "TXN_SUCCESS",

                    "business_directory.bc_id" => $bc_id,
                ];

                $count = $this->sb->count_all($this->business_tbl, $where);

                if ($count > 0) {
                    if (!isset($page)) {
                        $page = 1;
                    }

                    $limit = 15;

                    $total_page = ceil($count / $limit);

                    if ($page <= $total_page) {
                        $offset = ($page - 1) * $limit;

                        $join_business_tbl = [
                            "bussiness_category bc",
                            "bc.bc_id = business_directory.bc_id",
                            "LEFT",
                        ];

                        $join_country_tbl = [
                            "country_details cd",
                            "cd.country_id = business_directory.country_id",
                            "LEFT",
                        ];

                        $list = $this->sb->get_join_list(
                            $this->business_tbl,
                            $where,
                            $colmns,
                            $limit,
                            $offset,
                            $order_by,
                            $order_type,

                            $join_business_tbl,
                            $join_country_tbl
                        );

                        for ($i = 0; $i < count($list); $i++) {
                            $data["business_id"] = $list[$i]["business_id"];

                            $data["bc_eng_name"] = $list[$i]["bc_eng_name"];

                            $data["bc_guj_name"] = $list[$i]["bc_guj_name"];

                            $data["owner_name"] = $list[$i]["owner_name"];

                            $data["company_name_eng"] =
                                $list[$i]["company_name_eng"];

                            $data["company_name_guj"] =
                                $list[$i]["company_name_guj"];

                            $data["area"] = $list[$i]["area"];

                            if (!empty($list[$i]["mobile_no"])) {
                                $data["mobile_no"] =
                                    $list[$i]["country_std"] .
                                    $list[$i]["mobile_no"];
                            } else {
                                $data["mobile_no"] = "";
                            }

                            $data["photo"] = $list[$i]["photo"];

                            $lists[] = $data;
                        }

                        echo json_encode([
                            "status" => "success",
                            "status_code" => "1",
                            "data" => $lists,
                        ]);
                    } else {
                        echo json_encode([
                            "status" => "fail",
                            "status_code" => "0",
                            "data" => "",
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            }
        } else {
            $where = [
                "approval_flag" => 1,
                "bd_active_flag" => 1,
                "payment_status" => "TXN_SUCCESS",
            ];

            $count = $this->sb->count_all($this->business_tbl, $where);

            if ($count > 0) {
                if (!isset($page)) {
                    $page = 1;
                }

                $limit = 15;

                $total_page = ceil($count / $limit);

                if ($page <= $total_page) {
                    $offset = ($page - 1) * $limit;

                    $join_business_tbl = [
                        "bussiness_category bc",
                        "bc.bc_id = business_directory.bc_id",
                        "LEFT",
                    ];

                    $join_country_tbl = [
                        "country_details cd",
                        "cd.country_id = business_directory.country_id",
                        "LEFT",
                    ];

                    $list = $this->sb->get_join_list(
                        $this->business_tbl,
                        $where,
                        $colmns,
                        $limit,
                        $offset,
                        $order_by,
                        $order_type,

                        $join_business_tbl,
                        $join_country_tbl
                    );

                    for ($i = 0; $i < count($list); $i++) {
                        $data["business_id"] = $list[$i]["business_id"];

                        $data["bc_eng_name"] = $list[$i]["bc_eng_name"];

                        $data["bc_guj_name"] = $list[$i]["bc_guj_name"];

                        $data["owner_name"] = $list[$i]["owner_name"];

                        $data["company_name_eng"] =
                            $list[$i]["company_name_eng"];

                        $data["company_name_guj"] =
                            $list[$i]["company_name_guj"];

                        $data["area"] = $list[$i]["area"];

                        if (!empty($list[$i]["mobile_no"])) {
                            $data["mobile_no"] =
                                $list[$i]["country_std"] .
                                $list[$i]["mobile_no"];
                        } else {
                            $data["mobile_no"] = "";
                        }

                        $data["photo"] = $list[$i]["photo"];

                        $lists[] = $data;
                    }

                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "data" => $lists,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        }
    }

    public function business_detail()
    {
        extract($_POST);

        if (isset($business_id)) {
            if (!empty($business_id)) {
                $where = [
                    "business_id" => $business_id,
                    "approval_flag" => 1,
                    "bd_active_flag" => 1,

                    "payment_status" => "TXN_SUCCESS",
                ];

                $colmns = [
                    "bc_id",
                    "owner_name",
                    "company_name_eng",
                    "company_name_guj",
                    "village_id",
                    "area",

                    "address",
                    "country_id",
                    "mobile_no",
                    "wp_mobile_no",
                    "email",
                    "website",
                    "photo",
                    "timing",
                    "details",
                ];

                $row = $this->sb->get_single(
                    $this->business_tbl,
                    $where,
                    $colmns
                );

                $bc_row = $this->get_business_cate($row->bc_id);

                $village_row = $this->get_village($row->village_id);

                $country_row = $this->get_country($row->country_id);

                if (!empty($row->mobile_no)) {
                    $mobile = $country_row->country_std . $row->mobile_no;
                } else {
                    $mobile = "";
                }

                $single_data = [
                    "owner_name" => $row->owner_name,

                    "company_name_eng" => $row->company_name_eng,

                    "company_name_guj" => $row->company_name_guj,

                    "area" => $row->area,

                    "address" => $row->address,

                    "mobile_no" => $mobile,

                    "wp_mobile_no" => $row->wp_mobile_no,

                    "email" => $row->email,

                    "website" => $row->website,

                    "photo" => $row->photo,

                    "timing" => $row->timing,

                    "details" => $row->details,

                    "country" => $country_row->country_name,

                    "village_eng_name" => $village_row->eng_name,

                    "village_guj_name" => $village_row->guj_name,

                    "bussiness_category_eng" => $bc_row->bc_eng_name,

                    "bussiness_category_guj" => $bc_row->bc_guj_name,
                ];

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => [$single_data],
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function event_lists()
    {
        extract($_POST);

        $count = $this->sb->count_all($this->event_tbl);

        if ($count > 0) {
            if (!isset($page)) {
                $page = 1;
            }

            $limit = 15;

            $total_page = ceil($count / $limit);

            $colmns = [
                "event_id",
                "event_title",
                "event_photo",
                "event_content",
                "event_date",
                "event_time",
                "event_place",
                "event_attachment",
            ];

            if ($page <= $total_page) {
                $offset = ($page - 1) * $limit;

                $rows = $this->sb->get_list_nowhere(
                    $this->event_tbl,
                    $colmns,
                    $limit,
                    $offset,
                    "event_id",
                    "DESC"
                );

                for ($i = 0; $i < count($rows); $i++) {
                    $data["event_id"] = $rows[$i]["event_id"];

                    $data["event_title"] = $rows[$i]["event_title"];

                    $data["event_photo"] = $rows[$i]["event_photo"];

                    $data["event_content"] = $rows[$i]["event_content"];

                    $data["event_date"] = sqltodateformat(
                        $rows[$i]["event_date"]
                    );

                    $data["event_time"] = $rows[$i]["event_time"];

                    $data["event_place"] = $rows[$i]["event_place"];

                    if (!empty($rows[$i]["event_attachment"])) {
                        $data["event_attachment"] = implode(
                            ",",
                            json_decode($rows[$i]["event_attachment"], true)
                        );
                    } else {
                        $data["event_attachment"] = "";
                    }

                    $datas[] = $data;
                }

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $datas,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function paytm_transaction_insert()
    {
        extract($_POST);

        if (
            $PAYMENTMODE == "CC" ||
            $PAYMENTMODE == "DC" ||
            $PAYMENTMODE == "NB"
        ) {
            $total_charge = pytm_tr_charge + pytm_gst_charge;

            $final_dedution = ($TXNAMOUNT * $total_charge) / 100;

            $final = $TXNAMOUNT - $final_dedution;

            $TOTALAMT = $final;
        } else {
            $TOTALAMT = $TXNAMOUNT;
        }

        // if($STATUS == 'TXN_SUCCESS')
        // {
        //   $where1 = array('member_id'=>$member_id);
        //   $row = $this->sb->get_single($this->member_details_tbl,$where1);
        //   $DETAILS = $row->full_name_eng." Paid Rs. ".$TXNAMOUNT." for Business Ad for ".$duration;
        // }
        // else
        // {
        //   $DETAILS = $RESPMSG;
        // }

        $ary = [
            "TXNID" => $TXNID,
            "ORDERID" => $ORDERID,
            "BANKTXNID" => $BANKTXNID,
            "TXNAMOUNT" => $TXNAMOUNT,
            "STATUS" => $STATUS,

            "RESPCODE" => $RESPCODE,
            "RESPMSG" => $RESPMSG,
            "TXNDATE" => $TXNDATE,
            "TOTALAMT" => $TOTALAMT,
            "GATEWAYNAME" => $GATEWAYNAME,

            "BANKNAME" => $BANKNAME,

            "PAYMENTMODE" => $PAYMENTMODE,
            "TYPE" => "INCOME",
            "CATEGORY" => "business_ad",
            "PLAN" => "FRESH",
            "CHECKSUMHASH" => $CHECKSUMHASH,

            "ENTRYTYPE" => 1,
        ];

        $status = $this->sb->insert($this->transaction_tbl, $ary);

        if ($status > 0) {
            $update_ary = ["payment_status" => $STATUS];
            $where = ["order_no" => $ORDERID];
            $update = $this->sb->update(
                $this->business_tbl,
                $update_ary,
                $where
            );
            echo json_encode(["status" => "success", "status_code" => "1"]);
        } else {
            echo json_encode(["status" => "fail", "status_code" => "0"]);
        }
    }

    public function proud_list()
    {
        extract($_POST);

        $count = $this->sb->count_all($this->proud_tbl);

        if ($count > 0) {
            if (!isset($page)) {
                $page = 1;
            }

            $limit = 15;

            $total_page = ceil($count / $limit);

            $colmns = [
                "pr_id",
                "full_name",
                "eng_name",
                "photo_list",
                "post_attachment",
                "proud_details",
            ];

            if ($page <= $total_page) {
                $offset = ($page - 1) * $limit;

                $join_village_tbl = [
                    "village_setting vs",
                    "vs.village_id = proud_details.village_id",
                    "LEFT",
                ];

                $list = $this->sb->get_join_list(
                    $this->proud_tbl,
                    "",
                    $colmns,
                    $limit,
                    $offset,
                    "pr_id",
                    "DESC",
                    $join_village_tbl
                );

                for ($i = 0; $i < count($list); $i++) {
                    $datas["pr_id"] = $list[$i]["pr_id"];

                    $datas["full_name"] = $list[$i]["full_name"];

                    $datas["eng_name"] = $list[$i]["eng_name"];

                    $datas["photo_list"] = implode(
                        ",",
                        json_decode($list[$i]["photo_list"], true)
                    );

                    $datas["post_attachment"] = implode(
                        ",",
                        json_decode($list[$i]["post_attachment"], true)
                    );

                    $datas["proud_details"] = $list[$i]["proud_details"];

                    $photo = json_decode($list[$i]["photo_list"], true);

                    $datas["post_photo"] = $photo[0];

                    $data[] = $datas;
                }

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $data,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function organization_list()
    {
        extract($_POST);

        $count = $this->sb->count_all($this->organization_tbl);

        if ($count > 0) {
            if (!isset($page)) {
                $page = 1;
            }

            $limit = 15;

            $total_page = ceil($count / $limit);

            $offset = ($page - 1) * $limit;

            $list = $this->sb->get_list_nowhere(
                $this->organization_tbl,
                "",
                $limit,
                $offset,
                "org_id",
                "ASC"
            );

            if ($page <= $total_page) {
                for ($i = 0; $i < count($list); $i++) {
                    $row["org_id"] = $list[$i]["org_id"];

                    $row["org_name"] = $list[$i]["org_name"];

                    $row["org_photo"] = $list[$i]["org_photo"];

                    $row["org_details"] = $list[$i]["org_details"];

                    $data[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $data,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function team_details()
    {
        extract($_POST);

        if (isset($org_id)) {
            if (!empty($org_id)) {
                $where = ["org_id" => $org_id];

                $count = $this->sb->count_all($this->team_tbl, $where);

                if ($count > 0) {
                    $colmns = [
                        "team_id",
                        "member_name",
                        "designation",
                        "eng_name",
                        "mobile_no",
                        "member_photo",
                    ];

                    $join_village_tbl = [
                        "village_setting vs",
                        "vs.village_id = team_details.village_id",
                        "LEFT",
                    ];

                    $list = $this->sb->get_join_list(
                        $this->team_tbl,
                        $where,
                        $colmns,
                        "",
                        "",
                        "member_name",
                        "ASC",
                        $join_village_tbl
                    );

                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "data" => $list,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function fetch_own_profile()
    {
        extract($_POST);

        if (isset($member_id)) {
            if (!empty($member_id)) {
                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "mem_active_flag" => 1,
                ];

                $count = $this->sb->count_all(
                    $this->member_details_tbl,
                    $where
                );

                if ($count > 0) {
                    $row = $this->sb->get_single(
                        $this->member_details_tbl,
                        $where
                    );

                    $village_ary = $this->get_village($row->village_id);

                    $country_ary = $this->get_country($row->country_id);

                    $data = [
                        "member_id" => $row->member_id,

                        "full_name_eng" => $row->full_name_eng,

                        "full_name_guj" => $row->full_name_guj,

                        "village_id" => $row->village_id,

                        "village_eng_name" => $village_ary->eng_name,

                        "village_guj_name" => $village_ary->guj_name,

                        "married_status" => $row->married_status,

                        "country_id" => $row->country_id,

                        "country_name" => $country_ary->country_name,

                        "country_std" => $country_ary->country_std,

                        "city_name" => $row->city_name,

                        "sakh" => $row->sakh,

                        "birth_date" => sqltodateformat($row->birth_date),

                        "blood_grp" => $row->blood_grp,

                        "mosad" => $row->mosad,

                        "education" => $row->education,

                        "occupation" => $row->occupation,

                        "mobile_no" => $row->mobile_no,

                        "wp_mobile_no" => $row->wp_mobile_no,

                        "email_id" => $row->email_id,

                        "photo" => $row->photo,

                        "address" => $row->address,

                        "bussiness_address" => $row->bussiness_address,
                    ];

                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "data" => [$data],
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function update_own_profile()
    {
        extract($_POST);

        if (
            !empty($full_name_eng) &&
            $country_id &&
            $city_name &&
            $birth_date &&
            $mobile_no &&
            $member_id
        ) {
            $custom_qry =
                "select member_id,mobile_no from member_details where member_id!=" .
                $member_id .
                " AND mobile_no = " .
                $mobile_no .
                "";

            $rows = $this->sb->custom_query($custom_qry);

            if ($rows > 0) {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "eng_message" => "This mobile number is alredy registered!",
                    "guj_message" => "આ મોબાઈલ નંબર પહેલેથી રજીસ્ટર્ડ છે.",
                ]);
            } else {
                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "mem_active_flag" => 1,
                ];

                $old_photo_ary = $this->sb->get_single(
                    $this->member_details_tbl,
                    $where,
                    ["photo"]
                );
                $old_photo = $old_photo_ary->photo;

                if (
                    isset($_FILES["photo"]["name"]) &&
                    $_FILES["photo"]["size"] > 0
                ) {
                    $file = $_FILES["photo"]["name"];

                    $path = "./assets/uploads/user_photo";

                    $upload = $this->upload_img(
                        $file,
                        "5000",
                        "100%",
                        "300",
                        "300",
                        true,
                        "photo",
                        "",
                        $path
                    );

                    if ($upload["status"]) {
                        $photo = $upload["img_name"];

                        if ($old_photo != "no_user.jpg" && !empty($old_photo)) {
                            $this->delete_photo(ASSET_USER_PHOTO . $old_photo);
                        }
                    } else {
                        $photo = $old_photo;
                    }
                } else {
                    $photo = $old_photo;
                }

                $member_array = [
                    "full_name_eng" => ucwords($full_name_eng),

                    "country_id" => $country_id,

                    "city_name" => ucwords($city_name),

                    "birth_date" => datetosqlformat($birth_date),

                    "blood_grp" => ucwords($blood_grp),

                    "mobile_no" => $mobile_no,

                    "email_id" => $email_id,

                    "sakh" => ucwords($sakh),

                    "mosad" => ucwords($mosad),

                    "married_status" => ucwords($married_status),

                    "education" => ucwords($education),

                    "occupation" => ucwords($occupation),

                    "wp_mobile_no" => ucwords($wp_mobile_no),

                    "bussiness_address" => ucwords($bussiness_address),

                    "address" => ucwords($address),

                    "photo" => $photo,
                ];

                $status = $this->sb->update(
                    $this->member_details_tbl,
                    $member_array,
                    $where
                );

                if ($status > 0) {
                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "eng_message" => "Your profile is updated successfully",
                        "guj_message" => "તમારી પ્રોફાઈલ અપડેટ થઇ ગઈ છે.",
                        "full_name_eng" => ucwords($full_name_eng),

                        "full_name_guj" => $full_name_guj,
                        "mobile_no" => $mobile_no,
                        "photo" => $photo,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" => "Your profile is not updated.",
                        "guj_message" => "તમારી પ્રોફઇલ અપડેટ થઇ નથી.",
                    ]);
                }
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something Went Wrong",

                "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function fetch_family_list_profile()
    {
        extract($_POST);

        if (isset($member_id)) {
            if (!empty($member_id)) {
                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "fd_active_flag" => 1,
                ];

                $count = $this->sb->count_all($this->family_tbl, $where);

                if ($count > 0) {
                    $rows = $this->sb->get_list($this->family_tbl, $where);

                    for ($i = 0; $i < count($rows); $i++) {
                        $relation_ary = $this->get_relation(
                            $rows[$i]["relation_id"]
                        );

                        $village_ary = $this->get_village(
                            $rows[$i]["village_id"]
                        );

                        $country_ary = $this->get_country(
                            $rows[$i]["country_id"]
                        );

                        $data = [
                            "family_id" => $rows[$i]["family_id"],

                            "member_id" => $rows[$i]["member_id"],

                            "ffull_name_eng" => $rows[$i]["ffull_name_eng"],

                            "ffull_name_guj" => $rows[$i]["ffull_name_guj"],

                            "relation_id" => $rows[$i]["relation_id"],

                            "relation_name_eng" =>
                                $relation_ary->relation_name_eng,

                            "relation_name_guj" =>
                                $relation_ary->relation_name_guj,

                            "village_id" => $rows[$i]["village_id"],

                            "village_eng_name" => $village_ary->eng_name,

                            "village_guj_name" => $village_ary->guj_name,

                            "fcity_name" => $rows[$i]["fcity_name"],

                            "fbirth_date" => sqltodateformat(
                                $rows[$i]["fbirth_date"]
                            ),

                            "fblood_grp" => $rows[$i]["fblood_grp"],

                            "fmosad" => $rows[$i]["fmosad"],

                            "fpiyar" => $rows[$i]["fpiyar"],

                            "fmarried_status" => $rows[$i]["fmarried_status"],

                            "feducation" => $rows[$i]["feducation"],

                            "foccupation" => $rows[$i]["foccupation"],

                            "fmobile_no" => $rows[$i]["fmobile_no"],

                            "femail_id" => $rows[$i]["femail_id"],

                            "country_id" => $rows[$i]["country_id"],

                            "country_name" => $country_ary->country_name,

                            "country_std" => $country_ary->country_std,

                            "fbussiness_address" =>
                                $rows[$i]["fbussiness_address"],

                            "fphoto" => $rows[$i]["fphoto"],
                        ];

                        $lists[] = $data;
                    }

                    echo json_encode([
                        "status" => "succes",
                        "status_code" => "1",
                        "data" => $lists,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function update_family_profile()
    {
        extract($_POST);

        if (isset($family_id) && !empty($family_id)) {
            $ary = [
                "family_id" => $family_id,
                "approval_flag" => 1,
                "fd_active_flag" => 1,
            ];

            $old_photo_ary = $this->sb->get_single($this->family_tbl, $ary, [
                "fphoto",
            ]);
            $old_photo = $old_photo_ary->fphoto;

            if (
                isset($_FILES["fphoto"]["name"]) &&
                $_FILES["fphoto"]["size"] > 0
            ) {
                $file = $_FILES["fphoto"]["name"];

                $path = "./assets/uploads/user_photo";

                $upload = $this->upload_img(
                    $file,
                    "5000",
                    "100%",
                    "300",
                    "300",
                    true,
                    "fphoto",
                    "",
                    $path
                );

                if ($upload["status"]) {
                    $fphoto = $upload["img_name"];
                    if ($old_photo != "no_user.jpg" && !empty($old_photo)) {
                        $this->delete_photo(ASSET_USER_PHOTO . $old_photo);
                    }
                } else {
                    $fphoto = $old_photo;
                }
            } else {
                $fphoto = $old_photo;
            }

            $member_array = [
                "ffull_name_eng" => ucwords($ffull_name_eng),
                "relation_id" => $relation_id,

                "fcity_name" => ucwords($fcity_name),
                "fblood_grp" => ucwords($fblood_grp),

                "fbirth_date" => datetosqlformat($fbirth_date),
                "fmosad" => ucwords($fmosad),

                "fpiyar" => ucwords($fpiyar),
                "fmarried_status" => ucwords($fmarried_status),

                "feducation" => ucwords($feducation),
                "foccupation" => ucwords($foccupation),

                "fmobile_no" => $fmobile_no,
                "femail_id" => $femail_id,
                "fphoto" => $fphoto,

                "country_id" => $country_id,
                "fbussiness_address" => ucwords($fbussiness_address),
            ];

            $update_status = $this->sb->update(
                $this->family_tbl,
                $member_array,
                $ary
            );

            if ($update_status > 0) {
                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "eng_message" =>
                        "Your family profile updated successfully.",
                    "guj_message" =>
                        "તમારા ફેમિલિ મેમ્બર ની પ્રોફાઈલ અપડેટ થઇ ગઈ છે.",
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "eng_message" =>
                        "Your family profile is not updated successfully",
                    "guj_message" =>
                        "તમારા ફેમિલિ મેમ્બર ની પ્રોફાઈલ અપડેટ થઇ નથી.",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something Went Wrong",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function fetch_matrimony_lists()
    {
        extract($_POST);

        if (isset($member_id)) {
            if (!empty($member_id)) {
                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "met_active_flag" => 1,
                ];

                $count = $this->sb->count_all($this->matrimony_tbl, $where);

                if ($count > 0) {
                    $rows = $this->sb->get_list($this->matrimony_tbl, $where);

                    for ($i = 0; $i < count($rows); $i++) {
                        $village_ary = $this->get_village(
                            $rows[$i]["village_id"]
                        );

                        $country_ary = $this->get_country(
                            $rows[$i]["country_id"]
                        );

                        $data = [
                            "matrimony_id" => $rows[$i]["matrimony_id"],
                            "full_name_eng" => $rows[$i]["full_name_eng"],
                            "full_name_guj" => $rows[$i]["full_name_guj"],
                            "village_id" => $rows[$i]["village_id"],
                            "village_eng_name" => $village_ary->eng_name,
                            "village_guj_name" => $village_ary->guj_name,
                            "sakh" => $rows[$i]["sakh"],
                            "birth_date" => sqltodateformat(
                                $rows[$i]["birth_date"]
                            ),
                            "gender" => $rows[$i]["gender"],
                            "education" => $rows[$i]["education"],
                            "height" => $rows[$i]["height"],
                            "weight" => $rows[$i]["weight"],
                            "mosad" => $rows[$i]["mosad"],
                            "occupation" => $rows[$i]["occupation"],
                            "education" => $rows[$i]["education"],
                            "address" => $rows[$i]["address"],
                            "country_id" => $rows[$i]["country_id"],
                            "country_name" => $country_ary->country_name,
                            "country_std" => $country_ary->country_std,
                            "photo" => $rows[$i]["photo"],
                            "mobile_no" => $rows[$i]["mobile_no"],
                            "maritual_status" => $rows[$i]["maritual_status"],
                            "extra_details" => $rows[$i]["extra_details"],
                            "land" => $rows[$i]["land"],
                            "mother_name" => $rows[$i]["mother_name"],
                            "mosad_sakh" => $rows[$i]["mosad_sakh"],
                            "father_occupation" =>
                                $rows[$i]["father_occupation"],
                            "mother_occupation" =>
                                $rows[$i]["mother_occupation"],
                            "brother" => $rows[$i]["brother"],
                            "sister" => $rows[$i]["sister"],
                            "income" => $rows[$i]["income"],
                            "father_mobile" => $rows[$i]["father_mobile"],
                        ];

                        $lists[] = $data;
                    }

                    echo json_encode([
                        "status" => "succes",
                        "status_code" => "1",
                        "data" => $lists,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function update_matrimony_lists()
    {
        extract($_POST);

        if (isset($matrimony_id) && !empty($matrimony_id)) {
            $ary = [
                "matrimony_id" => $matrimony_id,
                "met_active_flag" => 1,
                "approval_flag" => 1,
            ];

            $pic_ary = $this->sb->get_single(
                $this->matrimony_tbl,
                $ary,
                "photo"
            );
            $old_photo = $pic_ary->photo;

            if (
                isset($_FILES["photo"]["name"]) &&
                $_FILES["photo"]["size"] > 0
            ) {
                $file = $_FILES["photo"]["name"];

                $path = "./assets/uploads/matrimony_photo";

                $upload = $this->upload_img(
                    $file,
                    "5000",
                    "100%",
                    "300",
                    "300",
                    true,
                    "photo",
                    "",
                    $path
                );

                if ($upload["status"]) {
                    $photo = $upload["img_name"];
                    $this->delete_photo(ASSET_MATRIMONY_PHOTO . $old_photo);
                } else {
                    $photo = $old_photo;
                }
            } else {
                $photo = $old_photo;
            }

            $member_array = [
                "full_name_eng" => ucwords($full_name_eng),
                "country_id" => $country_id,
                "sakh" => ucwords($sakh),
                "birth_date" => datetosqlformat($birth_date),
                "gender" => ucwords($gender),
                "education" => ucwords($education),
                "height" => ucwords($height),
                "weight" => ucwords($weight),
                "mosad" => ucwords($mosad),
                "occupation" => ucwords($occupation),
                "address" => ucwords($address),
                "photo" => $photo,

                "maritual_status" => ucwords($maritual_status),
                "extra_details" => ucwords($extra_details),

                "mobile_no" => $mobile_no,
                "land" => $land,
                "mother_name" => ucwords($mother_name),
                "mosad_sakh" => ucwords($mosad_sakh),

                "father_occupation" => ucwords($father_occupation),
                "mother_occupation" => ucwords($mother_occupation),

                "brother" => $brother,
                "sister" => $sister,
                "income" => $income,
                "father_mobile" => $father_mobile,
            ];

            $status = $this->sb->update(
                $this->matrimony_tbl,
                $member_array,
                $ary
            );

            if ($status > 0) {
                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "eng_message" =>
                        "Your matrimony profile is updated successfully.",
                    "guj_message" =>
                        "તમારી મેટ્રીમોની પ્રોફાઈલ અપડેટ થઇ ગઈ છે.",
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",

                    "eng_message" => "Your matrimony profile is not updated.",
                    "guj_message" => "તમારી મેટ્રીમોની પ્રોફાઈલ અપડેટ થઇ નથી.",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something Wenst Wrong!",

                "guj_message" => "કંઈક ખોટું થઇ ગયું છે",
            ]);
        }
    }

    public function fetch_memorial_lists()
    {
        extract($_POST);

        if (isset($member_id)) {
            if (!empty($member_id)) {
                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "mem_active_flag" => 1,
                ];

                $count = $this->sb->count_all($this->memorial_tbl, $where);

                if ($count > 0) {
                    $rows = $this->sb->get_list($this->memorial_tbl, $where);

                    for ($i = 0; $i < count($rows); $i++) {
                        $data = [
                            "memorial_id" => $rows[$i]["memorial_id"],

                            "full_name_eng" => $rows[$i]["full_name_eng"],

                            "full_name_guj" => $rows[$i]["full_name_guj"],

                            "photo" => $rows[$i]["photo"],
                        ];

                        $lists[] = $data;
                    }

                    echo json_encode([
                        "status" => "succes",
                        "status_code" => "1",
                        "data" => $lists,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function fetch_business_lists()
    {
        extract($_POST);

        if (isset($member_id)) {
            if (!empty($member_id)) {
                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "bd_active_flag" => 1,
                    "payment_status" => "TXN_SUCCESS",
                ];

                $count = $this->sb->count_all($this->business_tbl, $where);

                if ($count > 0) {
                    $rows = $this->sb->get_list($this->business_tbl, $where);

                    for ($i = 0; $i < count($rows); $i++) {
                        $bary = $this->get_business_cate($rows[$i]["bc_id"]);
                        $cary = $this->get_country($rows[$i]["country_id"]);

                        $data = [
                            "business_id" => $rows[$i]["business_id"],
                            "bc_id" => $rows[$i]["bc_id"],
                            "bc_eng_name" => $bary->bc_eng_name,
                            "bc_guj_name" => $bary->bc_guj_name,
                            "owner_name" => $rows[$i]["owner_name"],
                            "company_name_eng" => $rows[$i]["company_name_eng"],
                            "company_name_guj" => $rows[$i]["company_name_guj"],
                            "member_id" => $rows[$i]["member_id"],
                            "area" => $rows[$i]["area"],
                            "address" => $rows[$i]["address"],
                            "country_id" => $rows[$i]["country_id"],
                            "country_name" => $cary->country_name,
                            "country_std" => $cary->country_std,
                            "mobile_no" => $rows[$i]["mobile_no"],
                            "wp_mobile_no" => $rows[$i]["wp_mobile_no"],
                            "email" => $rows[$i]["email"],
                            "website" => $rows[$i]["website"],
                            "photo" => $rows[$i]["photo"],
                            "timing" => $rows[$i]["timing"],
                            "details" => $rows[$i]["details"],
                            "order_no" => $rows[$i]["order_no"],
                            "ad_duration_year" => $rows[$i]["ad_duration_year"],
                            "ad_start_date" => $rows[$i]["ad_start_date"],
                            "ad_end_date" => $rows[$i]["ad_end_date"],
                        ];

                        $lists[] = $data;
                    }

                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "data" => $lists,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function update_business_details()
    {
        extract($_POST);

        if (isset($business_id) && !empty($business_id)) {
            $where = ["business_id" => $business_id];

            $pic_ary = $this->sb->get_single(
                $this->business_tbl,
                $where,
                "photo"
            );
            $old_photo = $pic_ary->photo;

            if (
                isset($_FILES["photo"]["name"]) &&
                $_FILES["photo"]["size"] > 0
            ) {
                $file = $_FILES["photo"]["name"];

                $path = "./assets/uploads/business_photo";

                $upload = $this->upload_img(
                    $file,
                    "5000",
                    "100%",
                    "",
                    "",
                    false,
                    "photo",
                    "",
                    $path
                );

                if ($upload["status"]) {
                    $photo = $upload["img_name"];
                    $this->delete_photo(ASSET_BUSINESS_PHOTO . $old_photo);
                } else {
                    $photo = $old_photo;
                }
            } else {
                $photo = $old_photo;
            }

            $array = [
                "owner_name" => ucwords($owner_name),
                "area" => ucwords($area),
                "address" => ucwords($address),
                "country_id" => $country_id,
                "mobile_no" => $mobile_no,
                "wp_mobile_no" => $wp_mobile_no,
                "email" => $email,
                "website" => $website,
                "photo" => $photo,
                "timing" => ucwords($timing),
                "details" => ucwords($details),
            ];
            $update_status = $this->sb->update(
                $this->business_tbl,
                $array,
                $where
            );
            if ($update_status > 0) {
                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "eng_message" =>
                        "Your business profile updated successfully.",
                    "guj_message" => "તમારી બિઝનેસ પ્રોફાઈલ અપડૅટ થઇ ગઈ છે.",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" =>
                    "Your business profile could not updated successfully.",
                "guj_message" => "તમારી બિઝનેસ પ્રોફાઈલ અપડૅટ થઇ નથી.",
            ]);
        }
    }

    public function delete_memorial()
    {
        extract($_POST);
        if (isset($memorial_id) && !empty($memorial_id)) {
            $where = ["memorial_id" => $memorial_id];
            $pic_ary = $this->sb->get_single(
                $this->memorial_tbl,
                $where,
                "photo"
            );
            $old_photo = $pic_ary->photo;
            if ($old_photo != "no_memorial.jpg") {
                if (!empty($old_photo)) {
                    $this->delete_photo(ASSET_MEMORIAL_PHOTO . $old_photo);
                }
            }
            $status = $this->sb->delete($this->memorial_tbl, $where);
            if ($status > 0) {
                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "eng_message" => "Memorial profile deleted successfully.",
                    "guj_message" => "બેસણા ની માહિતી ડીલીટ થઇ ગઈ છે.",
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "eng_message" =>
                        "Memorial profile could not delete successfully.",
                    "guj_message" => "બેસણા ની માહિતી ડીલીટ થઇ નથી.",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something went wrong!",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે.",
            ]);
        }
    }

    public function delete_matrimony()
    {
        extract($_POST);
        if (isset($matrimony_id) && !empty($matrimony_id)) {
            $where = ["matrimony_id" => $matrimony_id];
            $pic_ary = $this->sb->get_single(
                $this->matrimony_tbl,
                $where,
                "photo"
            );
            $old_photo = $pic_ary->photo;
            if ($old_photo != "no_user.jpg") {
                if (!empty($old_photo)) {
                    $this->delete_photo(ASSET_MATRIMONY_PHOTO . $old_photo);
                }
            }
            $status = $this->sb->delete($this->matrimony_tbl, $where);
            if ($status > 0) {
                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "eng_message" => "Matrimony profile deleted successfully.",
                    "guj_message" => "તમારો લગ્ન બાયોડેટા ડીલીટ થઇ ગયો છે.",
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "eng_message" =>
                        "Matrimony profile could not delete successfully.",
                    "guj_message" => "તમારો લગ્ન બાયોડેટા ડીલીટ થયો નથી.",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something went wrong!",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે.",
            ]);
        }
    }

    public function delete_family_member()
    {
        extract($_POST);
        if (isset($family_id) && !empty($family_id)) {
            $where = ["family_id" => $family_id];
            $pic_ary = $this->sb->get_single(
                $this->family_tbl,
                $where,
                "fphoto"
            );
            $old_photo = $pic_ary->fphoto;
            if ($old_photo != "no_user.jpg") {
                if (!empty($old_photo)) {
                    $this->delete_photo(ASSET_USER_PHOTO . $old_photo);
                }
            }
            $status = $this->sb->delete($this->family_tbl, $where);
            if ($status > 0) {
                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "eng_message" =>
                        "Your family member's profile deleted successfully.",
                    "guj_message" =>
                        "તમારા પરિવાર ના મેમ્બર ની પ્રોફાઈલ ડીલીટ થઇ ગઈ છે.",
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "eng_message" =>
                        "Your family member's profile could not delete successfully.",
                    "guj_message" =>
                        "તમારા પરિવાર ના મેમ્બર ની પ્રોફાઈલ ડીલીટ થઇ નથી.",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something went wrong!",
                "guj_message" => "કંઈક ખોટું થઇ ગયું છે.",
            ]);
        }
    }

    public function fetch_family_details()
    {
        extract($_POST);

        if (isset($family_id)) {
            if (!empty($family_id)) {
                $where = [
                    "family_id" => $family_id,
                    "fd_active_flag" => 1,
                    "approval_flag" => 1,
                ];

                $count = $this->sb->count_all($this->family_tbl, $where);

                if ($count > 0) {
                    $colmns = [
                        "ffull_name_eng",
                        "ffull_name_guj",
                        "relation_id",
                        "fcity_name",
                        "fbirth_date",
                        "fblood_grp",
                        "fmosad",
                        "fpiyar",
                        "fmarried_status",
                        "feducation",
                        "foccupation",
                        "fmobile_no",
                        "femail_id",
                        "fphoto",
                        "country_id",
                        "fbussiness_address",
                    ];

                    $ary = $this->sb->get_single(
                        $this->family_tbl,
                        $where,
                        $colmns
                    );

                    echo json_encode([
                        "status" => "succes",
                        "status_code" => "1",
                        "data" => $ary,
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "data" => "",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function get_transaction_list()
    {
        extract($_POST);

        $where_array = ["tra_active_flag" => 1, "STATUS" => "TXN_SUCCESS"];

        $count = $this->sb->count_all($this->transaction_tbl, $where_array);

        $limit = 15;

        $total_page = ceil($count / $limit);

        if ($count > 0) {
            if (!isset($page)) {
                $page = 1;
            }

            if ($page <= $total_page) {
                $offset = ($page - 1) * $limit;

                $columns = [
                    "tra_id",
                    "ORDERID",
                    "TXNDATE",
                    "DETAILS",
                    "TXNAMOUNT",
                    "TOTALAMT",
                    "TYPE",
                ];

                $list = $this->sb->get_list(
                    $this->transaction_tbl,
                    $where_array,
                    $columns,
                    $limit,
                    $offset,
                    "tra_id",
                    "DESC"
                );

                for ($i = 0; $i < count($list); $i++) {
                    $row["tra_id"] = $list[$i]["tra_id"];
                    $row["ORDERID"] = $list[$i]["ORDERID"];
                    $row["TXNDATE"] = date(
                        "d-m-Y h:i:s",
                        strtotime($list[$i]["TXNDATE"])
                    );
                    $row["DETAILS"] = $list[$i]["DETAILS"];
                    $row["TXNAMOUNT"] = $list[$i]["TXNAMOUNT"];
                    $row["TOTALAMT"] = $list[$i]["TOTALAMT"];
                    $row["TYPE"] = $list[$i]["TYPE"];
                    $datas[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "status_code" => "1",
                    "data" => $datas,
                ]);
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function generate_otp()
    {
        extract($_POST);

        if (isset($user_name)) {
            if (!empty($user_name)) {
                $where = ["user_name" => $user_name];

                $count = $this->sb->count_all(
                    $this->member_details_tbl,
                    $where
                );

                if ($count > 0) {
                    $where1 = [
                        "user_name" => $user_name,
                        "approval_flag" => 1,
                        "mem_active_flag" => 1,
                    ];

                    $count1 = $this->sb->count_all(
                        $this->member_details_tbl,
                        $where1
                    );

                    if ($count1 > 0) {
                        $msg_flag = false;

                        $mail_flag = false;

                        $colmns = [
                            "country_id",
                            "email_id",
                            "mobile_no",
                            "member_id",
                        ];

                        $member_data = $this->sb->get_single(
                            $this->member_details_tbl,
                            $where1,
                            $colmns
                        );

                        $otp = rand(111111, 999999);

                        if ($member_data->country_id == "3") {
                            if (!empty($member_data->mobile_no)) {
                                $otp_msg = $this->get_otp_template($otp);

                                if (!empty($otp_msg)) {
                                    $msg_status = $this->send_msg(
                                        $otp_msg,
                                        $member_data->mobile_no
                                    );

                                    if ($msg_status["status"]) {
                                        $msg_flag = true;
                                    } else {
                                        $msg_flag = false;
                                    }
                                } else {
                                    $msg_flag = false;
                                }
                            }
                        }

                        if (!empty($member_data->email_id)) {
                            $mail_status = $this->send_email(
                                $otp,
                                $member_data->email_id
                            );

                            if ($mail_status) {
                                $mail_flag = true;
                            } else {
                                $mail_flag = false;
                            }
                        } else {
                            $mail_flag = false;
                        }

                        if ($msg_flag == true || $mail_flag == true) {
                            echo json_encode([
                                "status" => "success",
                                "status_code" => "1",
                                "otp" => $otp,

                                "member_id" => $member_data->member_id,
                            ]);
                        } else {
                            echo json_encode([
                                "status" => "fail",
                                "status_code" => "0",
                                "eng_message" => "Something went wrong!",
                            ]);
                        }
                    } else {
                        echo json_encode([
                            "status" => "fail",
                            "status_code" => "0",
                            "eng_message" => "Your account is not active!",
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" => "Your username is wrong!",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "eng_message" => "Something went wrong!",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something went wrong!",
            ]);
        }
    }

    public function update_password()
    {
        extract($_POST);

        if (isset($member_id) && isset($password)) {
            if (!empty($member_id) && !empty($password)) {
                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "mem_active_flag" => 1,
                ];

                $data = ["password" => my_simple_crypt($password)];

                $update_status = $this->sb->update(
                    $this->member_details_tbl,
                    $data,
                    $where
                );

                if ($update_status > 0) {
                    echo json_encode([
                        "status" => "success",
                        "status_code" => "1",
                        "eng_message" => "Your password updated successfully",
                    ]);
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" => "Something went wrong!",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "data" => "",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "data" => "",
            ]);
        }
    }

    public function update_new_password()
    {
        extract($_POST);

        if (isset($member_id) && isset($password) && isset($new_password)) {
            if (
                !empty($member_id) &&
                !empty($password) &&
                !empty($new_password)
            ) {
                $old_pass = my_simple_crypt($password);

                $where = [
                    "member_id" => $member_id,
                    "approval_flag" => 1,
                    "mem_active_flag" => 1,
                    "password" => $old_pass,
                ];

                $count = $this->sb->count_all(
                    $this->member_details_tbl,
                    $where
                );

                if ($count > 0) {
                    $data = ["password" => my_simple_crypt($new_password)];

                    $update_status = $this->sb->update(
                        $this->member_details_tbl,
                        $data,
                        $where
                    );

                    if ($update_status > 0) {
                        echo json_encode([
                            "status" => "success",
                            "status_code" => "1",
                            "eng_message" =>
                                "Your password updated successfully",
                        ]);
                    } else {
                        echo json_encode([
                            "status" => "fail",
                            "status_code" => "0",
                            "eng_message" => "Something went wrong!",
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "status_code" => "0",
                        "eng_message" => "Your current password is wrong!",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "fail",
                    "status_code" => "0",
                    "eng_message" => "Something went wrong",
                ]);
            }
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "eng_message" => "Something went wrong",
            ]);
        }
    }

    public function app_developer_info()
    {
        $company_ary = [
            "photo" => "companylogo.png",
            "email" => "info@techwebsoft.com",
            "website" => "www.techwebsoft.com",
        ];

        $urvish_ary = [
            "photo" => "urvish.jpeg",
            "name" => "Patel Urvish Ghanshyambhai",
            "village" => "Bantai",
            "mobile" => "9574202214",
        ];

        $rahul_ary = [
            "photo" => "rahul.jpeg",
            "name" => "Patel Rahul Bharatbhai",
            "village" => "Viramgam",
            "mobile" => "9427146015",
        ];

        if (count($company_ary) > 0) {
            echo json_encode([
                "status" => "success",
                "status_code" => "1",
                "company" => [$company_ary],

                "urvish" => [$urvish_ary],
                "rahul" => [$rahul_ary],
            ]);
        } else {
            echo json_encode([
                "status" => "fail",
                "status_code" => "0",
                "company" => "",
                "urvish" => "",
                "rahul" => "",
            ]);
        }
    }

    public function generate_checksumhash($order_no, $member_id, $amount)
    {
        require_once APPPATH . "libraries/encdec_paytm.php";

        $checkSum = "";

        $paramList = [];

        $paramList["MID"] = CPAYTM_MID;

        $paramList["ORDER_ID"] = $order_no;

        $paramList["CUST_ID"] = $member_id;

        $paramList["CHANNEL_ID"] = CCHANNEL_ID;

        $paramList["TXN_AMOUNT"] = $amount;

        $paramList["WEBSITE"] = CWEBSITE;

        $paramList["CALLBACK_URL"] =
            "https://pguat.paytm.com/paytmchecksum/paytmCallback.jsp";

        $paramList["INDUSTRY_TYPE_ID"] = CINDUSTRY_TYPE_ID;

        $checksum = getChecksumFromArray($paramList, CPAYTM_MKEY);

        return ["checksum" => $checksum, "paramList" => $paramList];
    }

    public function success_payment()
    {
        extract($_POST);

        print_r($_POST);
    }

    public function get_otp_template($otp)
    {
        $string = "";

        $where = ["sms_title" => "forget_msg", "active_flag" => 1];

        $count = $this->sb->count_all("sms_templates", $where);

        if ($count > 0) {
            $row = $this->sb->get_single("sms_templates", $where);

            $template = $row->sms_context;

            $string = str_replace("[OTP]", $otp, $template);

            return $string;
        } else {
            return $string;
        }
    }

    public function send_msg($message, $mobile)
    {
        $url = "temp.91bulksms.com/submitsms.jsp?";

        $api_key = "49615e795cXX";

        $status = $this->send_sms($url, $api_key, $message, $mobile);

        return $status;
    }

    public function send_email($otp, $email)
    {
        $status = $this->sendMail($email, "", $otp, "", "reset");

        return $status;
    }

    public function get_village($village_id)
    {
        $colmns = ["guj_name", "eng_name"];

        $where = ["village_id" => $village_id];

        $row = $this->sb->get_single($this->village_tbl, $where, $colmns);

        return $row;
    }

    public function get_country($country_id)
    {
        $colmns = ["country_std", "country_name", "country_std"];

        $where = ["country_id" => $country_id];

        $row = $this->sb->get_single(
            $this->country_details_tbl,
            $where,
            $colmns
        );

        return $row;
    }

    public function get_relation($relation_id)
    {
        $colmns = ["relation_name_eng", "relation_name_guj"];

        $where = ["relation_id" => $relation_id];

        $row = $this->sb->get_single($this->relation_tbl, $where, $colmns);

        return $row;
    }

    public function get_business_cate($bc_id)
    {
        $colmns = ["bc_eng_name", "bc_guj_name"];

        $where = ["bc_id" => $bc_id];

        $row = $this->sb->get_single(
            $this->bussiness_category_tbl,
            $where,
            $colmns
        );

        return $row;
    }

    public function get_day_name($name)
    {
        switch ($name) {
            case "Sunday":
                $day = "રવિવાર";

                break;

            case "Monday":
                $day = "સોમવાર";

                break;

            case "Tuesday":
                $day = "મંગળવાર";

                break;

            case "Wednesday":
                $day = "બુધવાર";

                break;

            case "Thursday":
                $day = "ગુરુવાર";

                break;

            case "Friday":
                $day = "શુક્રવાર";

                break;

            case "Saturday":
                $day = "શનિવાર";

                break;

            default:
                $day = "";

                break;
        }

        return $day;
    }
}

?>

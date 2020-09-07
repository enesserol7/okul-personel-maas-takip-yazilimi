<?php
function convertToSEO($text){
    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"","/", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
    return strtolower(str_replace($turkce, $convert, $text));
}
function getFileName($id){
	$ci =& get_instance();
	$ci->load->model("product_image_model");
	$fileName = $ci->product_image_model->get(
        array(
            "id" => $id
        )
    );
    return $fileName->img_url;
}
function get_readable_date($date){
    setlocale(LC_ALL, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($date));
}
function get_active_user(){
    $t = &get_instance();
    $user = $t->session->userdata("user");
    $institution_user = $t->session->userdata("institution_user");
    if ($user) {
        return $user;
    }else if($institution_user){
        return $institution_user;
    }else{
        return false;
    }
}
function isAdmin(){
    $t = &get_instance();
    $user = $t->session->userdata("user");
    $institution_user = $t->session->userdata("institution_user");
    return true;
    if ($user->user_role == "admin") {
        return true;
    }else if($institution_user->user_role == "admin"){
        return true;
    }else{
        return false;
    }
}
function get_user_roles(){
    $t = &get_instance();
    $user_roles = $t->session->userdata("user_roles");
    $institution_user_roles = $t->session->userdata("institution_user_roles");
    if ($user_roles) {
        return $t->session->userdata("user_roles");
    }else if($institution_user_roles){
        return $t->session->userdata("institution_user_roles");
    }
}
function setUserRoles(){
    $t = &get_instance();
    $t->load->model("user_role_model");
    $user_roles = $t->user_role_model->get_all(
        array(
            "isActive"  => 1
        )
    );
    $roles = [];
    foreach ($user_roles as $role){
        $roles[$role->id] = $role->permissions;
    }
    $t->session->set_userdata("user_roles", $roles);
}
function setInstitutionUserRoles(){
    $t = &get_instance();
    $t->load->model("institution_user_role_model");
    $institution_user_roles = $t->institution_user_role_model->get_all(
        array(
            "isActive"  => 1
        )
    );
    $roles = [];
    foreach ($institution_user_roles as $role){
        $roles[$role->id] = $role->permissions;
    }
    $t->session->set_userdata("institution_user_roles", $roles);
}
function getControllerList(){
    $t = &get_instance();
    $controllers = array();
    $t->load->helper("file");
    $files = get_dir_file_info(APPPATH."controllers",FALSE);
    foreach (array_keys($files) as $file) {
        if ($file !== "index.html") {
            $controllers[] = strtolower(str_replace(".php",'',$file));
        }
    }
    return $controllers;
}
function get_personnel_image($personnel_id){
    $t = &get_instance();
    $t->load->model("personnel_model");
    $cover_image = $t->personnel_model->get(
        array(
            "id"    => $personnel_id
        )
    );
    if(empty($cover_image)){
        $cover_image = $t->personnel_model->get(
            array(
                "id"    => $personnel_id
            )
        );
    }
    return !empty($cover_image) ? $cover_image->image : "";
}
function get_personnel_branch($personnel_id = 0){
    $t = &get_instance();
    $t->load->model("personnel_model");
    $personnel = $t->personnel_model->get(
        array(
            "id" => $personnel_id
        )
    );
    if ($personnel) {
        return $personnel->branch;
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_personnel_netSalary($personnel_id = 0){
    $t = &get_instance();
    $t->load->model("personnel_model");
    $personnel = $t->personnel_model->get(
        array(
            "id" => $personnel_id
        )
    );
    if ($personnel) {
        return $personnel->net_salary;
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_personnel_officialSalary($personnel_id = 0){
    $t = &get_instance();
    $t->load->model("personnel_model");
    $personnel = $t->personnel_model->get(
        array(
            "id" => $personnel_id
        )
    );
    if ($personnel) {
        return $personnel->official_salary;
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_personnel_insuranceStatus($personnel_id = 0){
    $t = &get_instance();
    $t->load->model("personnel_model");
    $personnel = $t->personnel_model->get(
        array(
            "id" => $personnel_id
        )
    );
    if ($personnel) {
        return ($personnel->insurance_status == 1) ? "Sigortalı" : "Sigortasız";
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_personnel_gender($personnel_id = 0){
    $t = &get_instance();
    $t->load->model("personnel_model");
    $personnel = $t->personnel_model->get(
        array(
            "id" => $personnel_id
        )
    );
    if ($personnel) {
        return $personnel->gender;
    }else{
        //return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_personnel_tc($personnel_id = 0){
    $t = &get_instance();
    $t->load->model("personnel_model");
    $personnel = $t->personnel_model->get(
        array(
            "id" => $personnel_id
        )
    );
    if ($personnel) {
        return $personnel->tc;
    }else{
        //return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_personnel_workStatus($personnel_id = 0){
    $t = &get_instance();
    $t->load->model("personnel_model");
    $personnel = $t->personnel_model->get(
        array(
            "id" => $personnel_id
        )
    );
    if ($personnel) {
        return ($personnel->isActive == 1) ? "Çalışıyor" : "Çalışmıyor";
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_institution_name($institution_id = 0){
    $t = &get_instance();
    $t->load->model("institution_model");
    $institution = $t->institution_model->get(
        array(
            "id" => $institution_id
        )
    );
    return $institution->title;
}
function get_file_ext($file){
    $ext = explode(".", $file);
    return end($ext);
}
function send_email($toEmail = "",$subject = "",$message = ""){
    $t = &get_instance();
    $t->load->model("emailsettings_model");
    $emailsettings = $t->emailsettings_model->get(
        array(
            "isActive" => 1
            )
        );
    $config = array(
        "protocol" => $emailsettings->protocol,
        "smtp_host" => $emailsettings->host,
        "smtp_port" => $emailsettings->port,
        "smtp_user" => $emailsettings->user,
        "smtp_pass" => $emailsettings->password,
        "starttls" => true,
        "charset" => "utf-8",
        "mailtype" => "html",
        "wordwrap" => true,
        "newline" => "\r\n"
    );
    $t->load->library("email",$config);
    $t->email->from($emailsettings->from,$emailsettings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);
    return $t->email->send();
}
function send_email_2($toEmail = "",$subject = "",$message = ""){
    $t = &get_instance();
    $config = array(
        "protocol" => "smtp",
        "smtp_host" => "ssl://mail.netreklamcim.net",
        "smtp_port" => 465,
        "smtp_user" => "info@netreklamcim.net",
        "smtp_pass" => "NBH2019**",
        "starttls" => true,
        "charset" => "utf-8",
        "mailtype" => "html",
        "wordwrap" => true,
        "newline" => "\r\n"
    );
    $t->load->library("email",$config);
    $t->email->from("info@netreklamcim.net","Personel Takip (CRM)");
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);
    return $t->email->send();
}
function get_settings(){
    $t = &get_instance();
    $t->load->model("settings_model");
    if ($t->session->userdata("settings")) {
        $settings = $t->session->userdata("settings");
    }else{
        $settings = $t->settings_model->get();
        if (!$settings) {
            $settings = new stdClass();
            $settings->company_name = "CMS";
            $settings->logo = "default";
        }
        $t->session->set_userdata("settings",$settings);
    }
    return $settings;
}
function get_category_title($category_id = 0){
    $t = &get_instance();
    $t->load->model("portfolio_category_model");
    $category = $t->portfolio_category_model->get(
        array(
            "id" => $category_id
        )
    );
    if ($category) {
        return $category->title;
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
//$_FILES["img_url"]["tmp_name"]
//100,200
//uploads/$t->viewFolder/deneme.png
function upload_picture($file,$uploadPath,$width,$height,$name){
    $t = &get_instance();
    $t->load->library("simpleimagelib");
    if (!is_dir("{$uploadPath}/{$width}x{$height}")) {
        mkdir("{$uploadPath}/{$width}x{$height}");
    }
    $upload_error = false;
    try {
        $simpleImage = $t->simpleimagelib->get_simple_image_instance();
        $simpleImage
            ->fromFile($file)
            ->resize($width,$height)
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null, 75);
    } catch(Exception $err) {
        $error =  $err->getMessage();
        $upload_error = true;
    }
    if ($upload_error) {
        echo $error;
    }else{
        return true;
    }
}
function get_picture($path = "",$picture = "",$resolution = "50x50"){
    if ($picture != "") {
        if (file_exists(FCPATH . "uploads/$path/$resolution/$picture")) {
            $picture = base_url("uploads/$path/$resolution/$picture");
        }else{
            $picture = ""; //base_url("assets/assets/images/default_image.png");
        }
    }else{
        $picture = ""; //base_url("assets/assets/images/default_image.png");
    }
    return $picture;
}
function get_page_list($page){
    $page_list = array(
        "dashboard_v" => "Anasayfa",
        "users_v" => "Kullanıcılar Sayfası",
        "user_roles_v" => "Kullanıcı Rolleri Sayfası",
        "personnel_v" => "Personel Sayfası",
        "branch_v" => "Branş Sayfası",
        "personnel_permissions_v" => "Personel İzinleri Sayfası",
        "personnel_payments_v" => "Personel Ödemeleri Sayfası",
        "advance_payment_v" => "Personel Avansları Sayfası",
        "personnel_exit_v" => "Personel Çıkış Sayfası",
        "institutions_v" => "Kurumlar Sayfası",
        "institution_users_v" => "Kurum Kullanıcı Sayfası",
        "institution_user_roles_v" => "Kurum Kullanıcı Rolleri Sayfası",
    );
    return (empty($page)) ? $page_list : $page_list[$page];
}
function get_controller_listName($page){
    $page_list = array(
        "dashboard" => "Anasayfa",
        "institution_user_roles" => "Kurum Kullanıcı Rolleri",
        "institutions" => "Kurumlar",
        "institution_users" => "Kurum Kullanıcıları",
        "personnel" => "Personel Girişi",
        "personnel_exit" => "Personel Çıkışı",
        "personnel_permissions" => "Personel İzinleri",
        "personnel_payments" => "Personel Ödemeleri",
        "advance_payment" => "Personel Avansları",
        "user_roles" => "Kullanıcı Rolleri",
        "users" => "Kullanıcılar",
        "branch" => "Branş Listesi",
        "userop" => "Kullanıcı Ayarları",
        "institution_personnel" => "Kurum Personelleri"
    );
    return (empty($page)) ? $page_list : $page_list[$page];
}
function get_user_permissions(){
    $t = &get_instance();
    $institution_user_permissions = $t->session->userdata("institution_user_permissions");
    if($institution_user_permissions){
        return $t->session->userdata("institution_user_permissions");
    }
}
function setInstitutionUserPermissions(){
    $t = &get_instance();
    $t->load->model("institution_user_model");
    $institution_user_permissions = $t->institution_user_model->get_all(
        array(
            "isActive"  => 1
        )
    );
    $roles = [];
    foreach ($institution_user_permissions as $role){
        $roles[$role->id] = $role->permissions;
    }
    $t->session->set_userdata("institution_user_permissions", $roles);
}
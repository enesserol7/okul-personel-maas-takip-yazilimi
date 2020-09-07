<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Institution_users extends MY_Controller {
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "institution_users_v";
        $this->load->model("institution_user_model");
        $this->load->model("institution_model");
        $this->load->model("institution_user_role_model");
        $this->load->model("personnel_model");
        $this->load->model("advance_payment_model");
        $this->load->model("personnel_exit_model");
        $this->load->model("personnel_payment_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index(){
        $viewData = new stdClass();
        $user = get_active_user();
        if (!isAllowedViewModule()) {
            redirect(base_url("institution_users"));
        }
        /*if (isAdmin()) {
            $where = array();
        }else{
            $where = array(
                "id" => $user->id
            );
        }*/
        if ($this->session->userdata("user")) {
            //$where = array();
            $items = $this->institution_user_model->get_all(
                array()
            );
            $viewData->personnels = $this->personnel_model->get_all(
                array(
                    "isActive"=>2
                )
            );
            $viewData->personnel_exit = $this->personnel_exit_model->get_all(
                array(
                    "isActive"=>2
                )
            );
            $viewData->advance_payment = $this->advance_payment_model->get_all(
                array(
                    "isActive"=>2
                )
            );
            $institutions = $this->institution_model->get_all(
                array()
            );
            $payment_date = date("Y-m");
            $payment_date = $payment_date . "-01";
            $personnel_payment = array();
            $personnel_payment2 = array();
            $personnel_payments = array();
            $payment_institutions = array();
            foreach ($institutions as $institution) {
                $personnel_payment = $this->personnel_payment_model->get_all(
                    array(
                        "institution_id" => $institution->id,
                        "year_month" => $payment_date,
                        "isActive"=>2,
                    )
                );
                $personnel_payment2 = $this->personnel_payment_model->get_all(
                    array(
                        "institution_id" => $institution->id,
                        "year_month" => $payment_date,
                        "isActive"=>3,
                    )
                );
                if (empty($personnel_payment)) {

                }else{
                    $payment_institutions1 = $this->institution_model->get_all(
                        array(
                            "id" => $institution->id
                        )
                    );
                    if ($payment_institutions == "") {
                        $payment_institutions = $payment_institutions1;
                    }else{

                        $payment_institutions = array_merge($payment_institutions,$payment_institutions1);
                    }
                }
                if (empty($personnel_payment2)) {

                }else{
                    $payment_institutions1 = $this->institution_model->get_all(
                        array(
                            "id" => $institution->id
                        )
                    );
                    if ($payment_institutions == "") {
                        $payment_institutions = $payment_institutions1;
                    }else{

                        $payment_institutions = array_merge($payment_institutions,$payment_institutions1);
                    }
                }
            }
            $viewData->payment_institutions = $payment_institutions;
        }else{
            //$where = array(
            //    "institution_id" => $user->institution_id
            //);
            $institutions = $this->institution_model->get_all(
                array()
            );
            $paymentControl = array();
            $payment_control = array();
            foreach ($institutions as $institution) {
                if (isAllowedViewInstitution($institution->id)) {
                    $paymentControl = $this->personnel_payment_model->get_all(
                        array(
                            "institution_id" => $institution->id,
                            "isActive"=>4
                        )
                    );
                    if ($payment_control == "") {
                        $payment_control = $paymentControl;
                    }else{
                        $payment_control = array_merge($payment_control,$paymentControl);
                    }
                }
            }
            $viewData->payment_control = $payment_control;
            $item1 = array();
            $items = array();
            foreach ($institutions as $institution) {
                if (isAllowedViewInstitution($institution->id)) {
                    $item1 = $this->institution_user_model->get_all(
                        array(
                            "institution_id" => $institution->id
                        )
                    );
                }
                if ($items == "") {
                    $items = $item1;
                }else{
                    $items = array_merge($items,$item1);
                }
            }
        }
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function new_form(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("institution_users"));
        }
        $viewData = new stdClass();
        $viewData->user_roles = $this->institution_user_role_model->get_all(
            array(
                "isActive" => 1
            )
        );
        $viewData->institutions = $this->institution_model->get_all(
            array(
                "isActive" => 1
            ),"title ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "add";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function save(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("institution_users"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim|is_unique[institution_users.user_name]");
        $this->form_validation->set_rules("full_name", "Ad Soyad", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta", "required|trim|valid_email|is_unique[institution_users.email]");
        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[8]|max_length[16]");
        $this->form_validation->set_rules("re_password", "Şifre Tekrar", "required|trim|min_length[8]|max_length[16]|matches[password]");
        $this->form_validation->set_rules("user_role_id", "Kullanıcı Rolü", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır!",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz!",
                "is_unique" => "<b>{field}</b> alanı daha önceden kullanılmış!",
                "matches" => "Şifreler birbirlerini tutmuyor!"
            )
        );
        
        $validate = $this->form_validation->run();
        if($validate){
            $insert = $this->institution_user_model->add(
                array(
                    "user_name" => $this->input->post("user_name"),
                    "full_name" => $this->input->post("full_name"),
                    "email" => $this->input->post("email"),
                    "password" => md5($this->input->post("password")),
                    "user_role_id" => $this->input->post("user_role_id"),
                    "isActive"  => 1,
                    "createdAt" => date("Y-m-d H:i:s")
                )
            );
            
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Kayıt ekleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("institution_users"));
            die();
        } else {
            $viewData = new stdClass();
            $viewData->institutions = $this->institution_model->get_all(
                array(
                    "isActive" => 1
                ),"title ASC"
            );
            $viewData->user_roles = $this->institution_user_role_model->get_all(
                array(
                    "isActive" => 1
                )
            );  
            $viewData->viewFolder = $this->viewFolder;
            $viewData->payment_control = "";
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_users"));
        }
        $viewData = new stdClass();
        $item = $this->institution_user_model->get(
            array(
                "id"=>$id
            )
        );
        $viewData->user_roles = $this->institution_user_role_model->get_all(
            array(
                "isActive" => 1
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_users"));
        }
        $this->load->library("form_validation");
        $oldUser = $this->institution_user_model->get(
            array('id' => $id)
        );
        if ($oldUser->user_name != $this->input->post("user_name")) {
            $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim|is_unique[institution_users.user_name]");
        }
        if ($oldUser->email != $this->input->post("email")) {
            $this->form_validation->set_rules("email", "E-Posta", "required|trim|valid_email|is_unique[institution_users.email]");
        }
        $this->form_validation->set_rules("full_name", "Ad Soyad", "required|trim");
        $this->form_validation->set_rules("user_role_id", "Kullanıcı Rolü", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır!",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz!",
                "is_unique" => "<b>{field}</b> alanı daha önceden kullanılmış!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $update = $this->institution_user_model->update(array("id"=>$id),
                array(
                    "user_name"         => $this->input->post("user_name"),
                    "full_name"   => $this->input->post("full_name"),
                    "email"           => $this->input->post("email"),
                    "user_role_id" => $this->input->post("user_role_id"),
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("institution_users"));
        } else {
            $viewData = new stdClass();
            $item = $this->institution_user_model->get(
                array(
                    "id"=>$id
                )
            );
            $viewData->user_roles = $this->institution_user_role_model->get_all(
                array(
                    "isActive" => 1
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->payment_control = "";
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        if (!isAllowedDeleteModule()) {
            redirect(base_url("institution_users"));
        }
        $delete = $this->institution_user_model->delete(
            array(
                "id" => $id
            )
        );
        if ($delete) {
            $alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "Kayıt silme işlemi başarılı bir şekilde silindi.",
                "type" => "success"
            );
        }else{
            $alert = array(
                "title" => "İşlem Başarısız Gerçekleşti.",
                "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("institution_users"));
    }
    public function isActiveSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_users"));
        }
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->institution_user_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }
    public function update_password_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_users"));
        }
        $viewData = new stdClass();
        $item = $this->institution_user_model->get(
            array(
                "id"=>$id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "password";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update_password($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_users"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[8]|max_length[16]");
        $this->form_validation->set_rules("re_password", "Şifre Tekrar", "required|trim|min_length[8]|max_length[16]|matches[password]");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır!",
                "matches" => "Şifreler birbirlerini tutmuyor!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $update = $this->institution_user_model->update(array("id"=>$id),
                array(
                    "password"         => md5($this->input->post("password"))
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Şifreniz başarılı bir şekilde güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Şifre güncelleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("institution_users"));
        } else {
            $viewData = new stdClass();
            $item = $this->institution_user_model->get(
                array(
                    "id"=>$id
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->payment_control = "";
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function permissions_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_users"));
        }
        $viewData = new stdClass();
        $item = $this->institution_user_model->get(
            array(
                "id"=>$id
            )
        );
        $viewData->institutions = $this->institution_model->get_all(
            array(
                "isActive" => 1
            ),"title ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "permissions";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update_permissions($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_users"));
        }
        $permissions = json_encode($this->input->post("permissions"));
        $update = $this->institution_user_model->update(array("id"=>$id),
            array(
                "permissions" => $permissions
            )
        );
        if($update){
            $alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "Kurum tanımı başarılı bir şekilde güncellendi.",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız Oldu!",
                "text" => "Kurum tanımı güncelleme sırasında bir problem oluştu!",
                "type" => "error"
            );
        }

        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("institution_users/permissions_form/$id"));
    }
}
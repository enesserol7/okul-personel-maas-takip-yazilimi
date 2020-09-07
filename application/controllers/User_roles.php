<?php
class User_roles extends MY_Controller{
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "user_roles_v";
        $this->load->model("user_role_model");
        $this->load->model("personnel_model");
        $this->load->model("advance_payment_model");
        $this->load->model("institution_model");
        $this->load->model("personnel_exit_model");
        $this->load->model("personnel_payment_model");
        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }
    public function index(){
        $viewData = new stdClass();
        $items = $this->user_role_model->get_all(
            array()
        );
        if ($this->session->userdata("user")) {
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
        }
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_form(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("user_roles"));
        }
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("user_roles"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $insert = $this->user_role_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("user_roles"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->payment_control = "";
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("user_roles"));
        }
        $viewData = new stdClass();
        $item = $this->user_role_model->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("user_roles"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $update = $this->user_role_model->update(array("id" => $id), array(
                "title" => $this->input->post("title")
            ));
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("user_roles"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->payment_control = "";
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->user_role_model->get(
                array(
                    "id"    => $id,
                )
            );
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        if (!isAllowedDeleteModule()) {
            redirect(base_url("user_roles"));
        }
        $delete = $this->user_role_model->delete(
            array(
                "id"    => $id
            )
        );
        if($delete){
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("user_roles"));
    }
    public function isActiveSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("user_roles"));
        }
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->user_role_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }
    public function permissions_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("user_roles"));
        }
        $viewData = new stdClass();
        $item = $this->user_role_model->get(
            array(
                "id"=>$id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "permissions";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update_permissions($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("user_roles"));
        }
        $permissions = json_encode($this->input->post("permissions"));
        $update = $this->user_role_model->update(array("id"=>$id),
            array(
                "permissions" => $permissions
            )
        );
        if($update){
            $alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "Yetki tanımı başarılı bir şekilde güncellendi.",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız Oldu!",
                "text" => "Yetki tanımı güncelleme sırasında bir problem oluştu!",
                "type" => "error"
            );
        }
        setUserRoles();
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("user_roles/permissions_form/$id"));
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Institutions extends MY_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "institutions_v";
        $this->load->model("institution_model");
        $this->load->model("personnel_model");
        $this->load->model("advance_payment_model");
        $this->load->model("personnel_exit_model");
        $this->load->model("personnel_payment_model");
        $this->load->helper("text");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index(){
      $viewData = new stdClass();
      $items = $this->institution_model->get_all(
         array(),"title ASC"
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
    $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
}
public function new_form(){
    if (!isAllowedWriteModule()) {
        redirect(base_url("institutions"));
    }
    $viewData = new stdClass();
    $viewData->viewFolder = $this->viewFolder;
    $viewData->payment_control = "";
    $viewData->subViewFolder = "add";
    $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
}
public function save(){
    if (!isAllowedWriteModule()) {
        redirect(base_url("institutions"));
    }
    $this->load->library("form_validation");
    $this->form_validation->set_rules("title", "Kurum Adı", "required|trim");
    $this->form_validation->set_message(
        array(
            "required"  => "<b>{field}</b> alanı doldurulmalıdır"
        )
    );
    $validate = $this->form_validation->run();
    if($validate){
        $insert = $this->institution_model->add(
            array(
                "title" => $this->input->post("title"),
                "phone_1"   => $this->input->post("phone_1"),
                "phone_2"   => $this->input->post("phone_2"),
                "email"   => $this->input->post("email"),
                "administrator_name"   => $this->input->post("administrator_name"),
                "address"   => $this->input->post("address"),
                "description"   => $this->input->post("description"),
                "url"           => convertToSEO($this->input->post("title")),
                "rank"          => 0,
                "isActive"      => 1,
                "createdAt"     => date("Y-m-d H:i:s")
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
        redirect(base_url("institutions"));
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
        redirect(base_url("institutions"));
    }
    $viewData = new stdClass();
    $item = $this->institution_model->get(
      array(
         "id"=>$id
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
        redirect(base_url("institutions"));
    }
    $this->load->library("form_validation");
    $this->form_validation->set_rules("title", "Kurum Adı", "required|trim");
    $this->form_validation->set_message(
        array(
            "required"  => "<b>{field}</b> alanı doldurulmalıdır"
        )
    );
    $validate = $this->form_validation->run();
    if($validate){
        $update = $this->institution_model->update(
           array(
              "id" => $id
          ),
           array(
            "title" => $this->input->post("title"),
            "phone_1"   => $this->input->post("phone_1"),
            "phone_2"   => $this->input->post("phone_2"),
            "email"   => $this->input->post("email"),
            "administrator_name"   => $this->input->post("administrator_name"),
            "address"   => $this->input->post("address"),
            "description"   => $this->input->post("description"),
            "url"           => convertToSEO($this->input->post("title")),
            "rank"          => 0,
            "isActive"      => 1
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
                "title" => "İşlem Başarısız Oldu.",
                "text" => "Kayıt güncelleme sırasında bir problem oluştu!",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("institutions"));
    } else {
       $item = $this->institution_model->get(
         array(
            "id"=>$id
        )
     );
       $viewData = new stdClass();
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
        redirect(base_url("institutions"));
    }
    $delete = $this->institution_model->delete(
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
        "title" => "İşlem Başarılıyla Gerçekleşti.",
        "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
        "type" => "error"
    );
}
$this->session->set_flashdata("alert",$alert);
redirect(base_url("institutions"));
}
public function isActiveSetter($id){
    if (!isAllowedUpdateModule()) {
        die();
    }
    if ($id) {
        $isActive = ($this->input->post("data") === "true") ? 1 : 0;
        $this->institution_model->update(
            array(
                "id" => $id
            ),
            array(
                "isActive" => $isActive
            )
        );
    }
}
public function rankSetter(){
    if (!isAllowedUpdateModule()) {
        die();
    }
    $data = $this->input->post("data");
    parse_str($data,$order);
    $items = $order["ord"];
    foreach ($items as $rank => $id) {
      $this->institution_model->update(
         array(
            "id" => $id,
            "rank !=" => $rank
        ),
         array(
            "rank" => $rank
        )
     );
  }
}
}
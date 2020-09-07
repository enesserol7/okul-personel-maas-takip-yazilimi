<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public $viewFolder = "";
    //public $user;
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "dashboard_v";
        $this->load->model("user_model");
        $this->load->model("institution_user_model");
        $this->load->model("institution_model");
        $this->load->model("personnel_model");
        $this->load->model("personnel_exit_model");
        $this->load->model("advance_payment_model");
        $this->load->model("personnel_payment_model");
        //$this->user = get_active_user();
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index(){
    	$viewData = new stdClass();
        $user = get_active_user();
        if ($this->session->userdata("user")) {
            //$where = array();
            //$modelName = "user_model";
            $institutions = $this->institution_model->get_all(
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
            $users = $this->user_model->get_all(
                array()
            );
        }else if($this->session->userdata("institution_user")){
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
            $user1 = array();
            $users = array();
            foreach ($institutions as $institution) {
                if (isAllowedViewInstitution($institution->id)) {
                    $user1 = $this->institution_user_model->get_all(
                        array(
                            "institution_id" => $institution->id
                        )
                    );
                }
                if ($users == "") {
                    $users = $user1;
                }else{
                    $users = array_merge($users,$user1);
                }
            }
            //$where = array(
            //    "institution_id" => $user->institution_id
            //);
            //$modelName = "institution_user_model";
        }
        $viewData->users = $users;
        //$viewData->personnel_payments = $personnel_payments;
        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function personnel_view_form($id){
        $viewData = new stdClass();
        $item = $this->personnel_model->get(
            array(
                "id"=>$id
            )
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
        $viewData->payment_control = "";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function personnel_confirmation($id){
        if ($this->input->post("confirmation") == "1") {
            $update = $this->personnel_model->update(array("id"=>$id),
                $data = array(
                    "isActive" => $this->input->post("confirmation"),
                    "isActivePersonnel" => 1,
                    "reason_for_rejection" => $this->input->post("reason_for_rejection")
                )
            );
        }else{
            $update = $this->personnel_model->update(array("id"=>$id),
                $data = array(
                    "isActive" => $this->input->post("confirmation"),
                    "reason_for_rejection" => $this->input->post("reason_for_rejection")
                )
            );
        }    
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
        redirect(base_url());
    }
    public function personnel_exit_view_form($id){
        $viewData = new stdClass();
        $item = $this->personnel_exit_model->get(
            array(
                "id"=>$id
            )
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
        $viewData->payment_control = "";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "personnel_exit_update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function personnel_exit_confirmation($id){
        if ($this->input->post("confirmation") == "1") {
            $personnel = $this->personnel_exit_model->get(
                array(
                    "id" => $id 
                )
            );
            $update = $this->personnel_exit_model->update(array("id"=>$id),
                $data = array(
                    "isActive" => $this->input->post("confirmation"),
                    "reason_for_rejection" => $this->input->post("reason_for_rejection")
                )
            );
            $update2 = $this->personnel_model->update(array("id"=>$personnel->personnel_id),
                $data = array(
                    "isActivePersonnel" => 0,
                )
            );
        }else{
            $update = $this->personnel_exit_model->update(array("id"=>$id),
                $data = array(
                    "isActive" => $this->input->post("confirmation"),
                    "reason_for_rejection" => $this->input->post("reason_for_rejection")
                )
            );
        }   
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
        redirect(base_url());
    }
    public function personnel_payment_view_form($id){
        $viewData = new stdClass();
        $item = $this->personnel_payment_model->get(
            array(
                "id"=>$id
            )
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
        $viewData->payment_control = "";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "personnel_payment_update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function personnel_payment_confirmation($id){
        $item = $this->personnel_payment_model->get(
            array(
                "isActive"=>2,
                "id" => $id
            )
        );
        if (empty($item)) {
            $item = $this->personnel_payment_model->get(
                array(
                    "isActive"=>3,
                    "id" => $id
                )
            );
            $amount_to_be_paid = $item->receivable_amount;
            $payment_made = intval($this->input->post($id));
            $remaining_payment1 = $amount_to_be_paid - $item->payment_made;
            $remaining_payment = $remaining_payment1 - $payment_made;
        }else{
            $amount_to_be_paid = $item->receivable_amount;
            $payment_made = intval($this->input->post($id));
            $remaining_payment = $amount_to_be_paid - $payment_made;
        }
        if ($remaining_payment == 0) {
            $isActive = 1;
        }else{
            $isActive = 3;
        }
        if ($item->payment_made == 0) {
            $payment_made2 = $payment_made;
        }else{
            $payment_made2 = $payment_made + $item->payment_made;
        }
        $update = $this->personnel_payment_model->update(array("id"=>$id),
            $data = array(
                "isActive" => $isActive,
                "remaining_payment" => $remaining_payment,
                "payment_made" => $payment_made2
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
        redirect(base_url("dashboard/all_payment_view_form/$item->institution_id"));
    }
    public function advance_payment_view_form($id){
        $viewData = new stdClass();
        $item = $this->advance_payment_model->get(
            array(
                "id"=>$id
            )
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
        $viewData->payment_control = "";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "advance_payment_update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function advance_payment_confirmation($id){
        $update = $this->advance_payment_model->update(array("id"=>$id),
            $data = array(
                "isActive" => $this->input->post("confirmation"),
                "reason_for_rejection" => $this->input->post("reason_for_rejection")
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
        redirect(base_url());
    }
    public function all_payment_view_form($id){
        $viewData = new stdClass();
        $payment_date = date("Y-m");
        $payment_date = $payment_date . "-01";
        $items = $this->personnel_payment_model->get_all(
            array(
                "isActive"=>2,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        $items2 = $this->personnel_payment_model->get_all(
            array(
                "isActive"=>3,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        $item = $this->personnel_payment_model->get(
            array(
                "isActive"=>2,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        $item2 = $this->personnel_payment_model->get(
            array(
                "isActive"=>3,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        if (empty($items) && empty($items2)) {
            redirect(base_url());
        }
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "all_payment_update";
        $viewData->items = $items;
        $viewData->items2 = $items2;
        $viewData->item = $item;
        $viewData->item2 = $item2;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function all_payment_confirmation($id){
        $viewData = new stdClass();
        $payment_date = date("Y-m");
        $payment_date = $payment_date . "-01";
        $items = $this->personnel_payment_model->get_all(
            array(
                "isActive"=>2,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        foreach ($items as $item) {
            $update = $this->personnel_payment_model->update(array("id"=>$item->id),
                $data = array(
                    "isActive" => 1,
                    "payment_made" => $item->receivable_amount
                )
            );
        }
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
        $item = $this->personnel_payment_model->get_all(
            array(
                "isActive"=>3,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        $this->session->set_flashdata("alert",$alert);
        if (empty($item)) {
            redirect(base_url());
        }else{
            redirect(base_url("dashboard/all_payment_view_form/$id"));
        }
    }
    public function all_remaining_payment_confirmation($id){
        $viewData = new stdClass();
        $payment_date = date("Y-m");
        $payment_date = $payment_date . "-01";
        $items = $this->personnel_payment_model->get_all(
            array(
                "isActive"=>3,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        foreach ($items as $item) {
            $update = $this->personnel_payment_model->update(array("id"=>$item->id),
                $data = array(
                    "isActive" => 1
                )
            );
        }
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
        $item = $this->personnel_payment_model->get_all(
            array(
                "isActive"=>2,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        $item2 = $this->personnel_payment_model->get_all(
            array(
                "isActive"=>3,
                "institution_id" => $id,
                "year_month" => $payment_date
            )
        );
        $this->session->set_flashdata("alert",$alert);
        if (empty($item) && empty($item2)) {
            redirect(base_url());
        }else{
            redirect(base_url("dashboard/all_payment_view_form/$id"));
        }
    }
    public function personnel_claim_list(){
        $viewData = new stdClass();
        $user = get_active_user();
            //$where = array();
            //$modelName = "user_model";
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
        $viewData->payment_control = "";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "personnel_claim_list";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function personnel_payment_claim_list(){
        $viewData = new stdClass();
        $user = get_active_user();
            //$where = array();
            //$modelName = "user_model";
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
        $viewData->payment_control = "";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "personnel_payment_claim_list";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function personnel_exit_claim_list(){
        $viewData = new stdClass();
        $user = get_active_user();
            //$where = array();
            //$modelName = "user_model";
        $viewData->personnel_exit = $this->personnel_exit_model->get_all(
            array(
                "isActive"=>2
            )
        );
        $viewData->personnels = $this->personnel_model->get_all(
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
        $viewData->payment_control = "";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "personnel_exit_claim_list";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function personnel_advance_claim_list(){
        $viewData = new stdClass();
        $user = get_active_user();
            //$where = array();
            //$modelName = "user_model";
        $viewData->advance_payment = $this->advance_payment_model->get_all(
            array(
                "isActive"=>2
            )
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
        $viewData->payment_control = "";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "personnel_advance_claim_list";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function error_page(){
        $viewData = new stdClass();
        $user = get_active_user();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "error";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
}
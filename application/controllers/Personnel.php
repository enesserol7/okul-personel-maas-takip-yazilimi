<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Personnel extends MY_Controller {
	public $viewFolder = "";
	public function __construct(){
		parent::__construct();
		$this->viewFolder = "personnel_v";
		$this->load->model("personnel_model");
		$this->load->model("institution_model");
		$this->load->model("advance_payment_model");
		$this->load->model("personnel_exit_model");
		$this->load->model("personnel_payment_model");
		$this->load->model("branch_model");
		if (!get_active_user()) {
			redirect(base_url("login"));
		}
	}
	public function index(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel"));
		}
		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 1
				),"personnel_name ASC"
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
				array(),"title ASC"
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
			$item1 = array();
			$items = array();
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$item1 = $this->personnel_model->get_all(
						array(
							"institution_id" => $institution->id,
							"isActive" => 1
						),"personnel_name ASC"
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
		$viewData->institutions = $institutions;
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
		$user = get_active_user();
		if (!isAllowedWriteModule()) {
			redirect(base_url("personnel"));
		}
		$viewData = new stdClass();
		if ($this->session->userdata("user")) {
			$institutions = array();
			$institutions = $this->institution_model->get_all(
				array(),"title ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions1 = $this->institution_model->get_all(
				array()
			);
			$institution1 = array();
			$institutions = array();
			foreach ($institutions1 as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$institution1 = $this->institution_model->get_all(
						array(
							"id" => $institution->id,
							"isActive" => 1
						),"title ASC"
					);
				}
				if ($institutions == "") {
					$institutions = $institution1;
				}else{
					$institutions = array_merge($institutions,$institution1);
				}
			}
		}
		$branch = $this->branch_model->get_all(
			array(),"title ASC"
		);
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$viewData->branch = $branch;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
		if (!isAllowedWriteModule()) {
			redirect(base_url("personnel"));
		}
		$this->load->library("form_validation");
		$this->form_validation->set_rules("personnel_name", "Personel Adı", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		$personnel_date_of_birth = explode("-", $this->input->post("date_of_birth"));
		$personnel_name = strtoupper($this->input->post("personnel_name"));
		$personnel_surname = strtoupper($this->input->post("personnel_surname"));
		$personnel_tc = $this->input->post("tc");
		//if ($this->session->userdata("user")) {
		$institution = $this->institution_model->get(
			array(
				"id" => $this->input->post("institution_id")
			)
		);
		$institution_name = $institution->title;
		$institution_id = $this->input->post("institution_id");
		$branch = $this->branch_model->get(
			array(
				"id" => $this->input->post("sub_branch")
			)
		);
		$branchName = $branch->title;
		//}else{
			//$institution_user = $this->session->userdata("institution_user");
			//$institution_name = $institution_user->institution_name;
			//$institution_id = $institution_user->institution_id;
		//}
		$validate = $this->form_validation->run();
		if($validate){
			$data = array(
				"personnel_name" => $personnel_name . " " . $personnel_surname,
				"institution_id" => $institution_id,
				"institution_name" => $institution_name,
				"tc" => $personnel_tc,
				"registration_number" => $this->input->post("registration_number"),
				"gender" => $this->input->post("gender"),
				"personnel_phone" => $this->input->post("personnel_phone"),
				"iban" => $this->input->post("iban"),
				"date_of_birth" => $this->input->post("date_of_birth"),
				"branch" => $this->input->post("branch"),
				"sub_branch_id" => $this->input->post("sub_branch"),
				"sub_branch" => $branchName,
				"entry_date" => $this->input->post("entry_date"),
				"insurance_status" => $this->input->post("insurance_status"),
				"net_salary" => $this->input->post("net_salary"),
				"rank" => 0,
				"isActive" => 2,
				"isActivePersonnel" => 0
			);
			$config["allowed_types"] = "*";
			$config["upload_path"]   = "uploads/$this->viewFolder/files/";
			$this->load->library("upload", $config);
			if($_FILES["img_url"]["name"] !== ""){
				$image = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
				$image_271x200 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",271,200, $image);
				if($image_271x200){
					$data["image"] = $image;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Görsel yüklenirken bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/new_form"));
				}
			}
			if($_FILES["copy_of_identity_card"]["name"] !== ""){
				$copy_of_identity_card = convertToSEO(pathinfo($_FILES["copy_of_identity_card"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["copy_of_identity_card"]["name"], PATHINFO_EXTENSION);
				$upload_copy_of_identity_card = $this->upload->do_upload("copy_of_identity_card");
				$uploaded_copy_of_identity_card = $this->upload->data("file_name");
				if($upload_copy_of_identity_card){
					$data["copy_of_identity_card"] = $uploaded_copy_of_identity_card;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/new_form"));
				}
			}
			if($_FILES["criminal_record"]["name"] !== ""){
				$criminal_record = convertToSEO(pathinfo($_FILES["criminal_record"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["criminal_record"]["name"], PATHINFO_EXTENSION);
				$upload_criminal_record = $this->upload->do_upload("criminal_record");
				$uploaded_criminal_record = $this->upload->data("file_name");
				if($upload_criminal_record){
					$data["criminal_record"] = $uploaded_criminal_record;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/new_form"));
				}
			}
			if($_FILES["place_of_residence"]["name"] !== ""){
				$place_of_residence = convertToSEO(pathinfo($_FILES["place_of_residence"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["place_of_residence"]["name"], PATHINFO_EXTENSION);
				$upload_place_of_residence = $this->upload->do_upload("place_of_residence");
				$uploaded_place_of_residence = $this->upload->data("file_name");
				if($upload_place_of_residence){
					$data["place_of_residence"] = $uploaded_place_of_residence;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/new_form"));
				}
			}
			if($_FILES["health_report"]["name"] !== ""){
				$health_report = convertToSEO(pathinfo($_FILES["health_report"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["health_report"]["name"], PATHINFO_EXTENSION);
				$upload_health_report = $this->upload->do_upload("health_report");
				$uploaded_health_report = $this->upload->data("file_name");
				if($upload_health_report){
					$data["health_report"] = $uploaded_health_report;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/new_form"));
				}
			}
			if($_FILES["contract"]["name"] !== ""){
				$contract = convertToSEO(pathinfo($_FILES["contract"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["contract"]["name"], PATHINFO_EXTENSION);
				$upload_contract = $this->upload->do_upload("contract");
				$uploaded_contract = $this->upload->data("file_name");
				if($upload_contract){
					$data["contract"] = $uploaded_contract;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/new_form"));
				}
			}
			if($_FILES["diploma"]["name"] !== ""){
				$diploma = convertToSEO(pathinfo($_FILES["diploma"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["diploma"]["name"], PATHINFO_EXTENSION);
				$upload_diploma = $this->upload->do_upload("diploma");
				$uploaded_diploma = $this->upload->data("file_name");
				if($upload_diploma){
					$data["diploma"] = $uploaded_diploma;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/new_form"));
				}
			}
			$insert = $this->personnel_model->add($data);
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

			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("personnel"));
		} else {
			$viewData = new stdClass();
			if ($this->session->userdata("user")) {
				$where = array();
			}else{
				$where = array(
					"id" => $user->institution_id
				);
			}
			$viewData->institutions = $this->institution_model->get_all(
				$where,"title ASC"
			);
			$viewData->branch = $this->branch_model->get_all(
				array(),"title ASC"
			);
			$viewData->viewFolder = $this->viewFolder;
			$viewData->payment_control = "";
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}
	public function update_form($id){
		$user = get_active_user();
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel"));
		}
		$viewData = new stdClass();
		$item = $this->personnel_model->get(
			array(
				"id"=>$id
			)
		);
		//if ($this->session->userdata("user")) {
		$where = array();
		//}else{
			//$where = array(
			//	"id" => $user->institution_id
			//);
		//}
		$viewData->institutions = $this->institution_model->get_all(
			$where,"title ASC"
		);
		$branch = $this->branch_model->get_all(
			array(),"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->payment_control = "";
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$viewData->branch = $branch;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function update($id){
		//if (!isAllowedUpdateModule()) {
		//	redirect(base_url("personnel"));
		//}
		$this->load->library("form_validation");
		$this->form_validation->set_rules("personnel_name", "Personel Adı", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		$personnel_date_of_birth = explode("-", $this->input->post("date_of_birth"));
		$personnel_name = strtoupper($this->input->post("personnel_name"));
		$personnel_surname = strtoupper($this->input->post("personnel_surname"));
		$personnel_tc = $this->input->post("tc");
		//if ($this->session->userdata("user")) {
		$institution = $this->institution_model->get(
			array(
				"id" => $this->input->post("institution_id")
			)
		);
		$institution_name = $institution->title;
		$institution_id = $this->input->post("institution_id");
		$branch = $this->branch_model->get(
			array(
				"id" => $this->input->post("sub_branch")
			)
		);
		$branchName = $branch->title;
		//}else{
			//$institution_user = $this->session->userdata("institution_user");
			//$institution_name = $institution_user->institution_name;
			//$institution_id = $institution_user->institution_id;
		//}
		$config["allowed_types"] = "*";
		$config["upload_path"]   = "uploads/$this->viewFolder/files/";
		$this->load->library("upload", $config);
		$validate = $this->form_validation->run();
		if($validate){
			$data = array(
				"personnel_name" => $personnel_name . " " . $personnel_surname,
				"institution_id" => $institution_id,
				"institution_name" => $institution_name,
				"tc" => $personnel_tc,
				"registration_number" => $this->input->post("registration_number"),
				"personnel_phone" => $this->input->post("personnel_phone"),
				"iban" => $this->input->post("iban"),
				"gender" => $this->input->post("gender"),
				"date_of_birth" => $this->input->post("date_of_birth"),
				"branch" => $this->input->post("branch"),
				"sub_branch_id" => $this->input->post("sub_branch"),
				"sub_branch" => $branchName,
				"entry_date" => $this->input->post("entry_date"),
				"insurance_status" => $this->input->post("insurance_status"),
				"net_salary" => $this->input->post("net_salary"),
			);
			if($_FILES["img_url"]["name"] !== ""){
				$image = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
				$image_271x200 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",271,200, $image);
				if($image_271x200){
					$data["image"] = $image;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Görsel yüklenirken bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/update_form/$id"));
				}
			}
			if($_FILES["copy_of_identity_card"]["name"] !== ""){
				$copy_of_identity_card = convertToSEO(pathinfo($_FILES["copy_of_identity_card"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["copy_of_identity_card"]["name"], PATHINFO_EXTENSION);
				$upload_copy_of_identity_card = $this->upload->do_upload("copy_of_identity_card");
				$uploaded_copy_of_identity_card = $this->upload->data("file_name");
				if($upload_copy_of_identity_card){
					$data["copy_of_identity_card"] = $uploaded_copy_of_identity_card;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/update_form/$id"));
				}
			}
			if($_FILES["criminal_record"]["name"] !== ""){
				$criminal_record = convertToSEO(pathinfo($_FILES["criminal_record"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["criminal_record"]["name"], PATHINFO_EXTENSION);
				$upload_criminal_record = $this->upload->do_upload("criminal_record");
				$uploaded_criminal_record = $this->upload->data("file_name");
				if($upload_criminal_record){
					$data["criminal_record"] = $uploaded_criminal_record;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/update_form/$id"));
				}
			}
			if($_FILES["place_of_residence"]["name"] !== ""){
				$place_of_residence = convertToSEO(pathinfo($_FILES["place_of_residence"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["place_of_residence"]["name"], PATHINFO_EXTENSION);
				$upload_place_of_residence = $this->upload->do_upload("place_of_residence");
				$uploaded_place_of_residence = $this->upload->data("file_name");
				if($upload_place_of_residence){
					$data["place_of_residence"] = $uploaded_place_of_residence;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/update_form/$id"));
				}
			}
			if($_FILES["health_report"]["name"] !== ""){
				$health_report = convertToSEO(pathinfo($_FILES["health_report"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["health_report"]["name"], PATHINFO_EXTENSION);
				$upload_health_report = $this->upload->do_upload("health_report");
				$uploaded_health_report = $this->upload->data("file_name");
				if($upload_health_report){
					$data["health_report"] = $uploaded_health_report;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/update_form/$id"));
				}
			}
			if($_FILES["contract"]["name"] !== ""){
				$contract = convertToSEO(pathinfo($_FILES["contract"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["contract"]["name"], PATHINFO_EXTENSION);
				$upload_contract = $this->upload->do_upload("contract");
				$uploaded_contract = $this->upload->data("file_name");
				if($upload_contract){
					$data["contract"] = $uploaded_contract;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/update_form/$id"));
				}
			}
			if($_FILES["diploma"]["name"] !== ""){
				$diploma = convertToSEO(pathinfo($_FILES["diploma"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["diploma"]["name"], PATHINFO_EXTENSION);
				$upload_diploma = $this->upload->do_upload("diploma");
				$uploaded_diploma = $this->upload->data("file_name");
				if($upload_diploma){
					$data["diploma"] = $uploaded_diploma;
				}else{
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Yükleme sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel/update_form/$id"));
				}
			}
			$update = $this->personnel_model->update(array("id"=>$id),$data);
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
			redirect(base_url("personnel"));
		}else{
			$viewData = new stdClass();
			$item = $this->personnel_model->get(
				array(
					"id"=>$id
				)
			);
			if ($this->session->userdata("user")) {
				$where = array();
			}else{
				$where = array(
					"id" => $user->institution_id
				);
			}
			$viewData->institutions = $this->institution_model->get_all(
				$where,"title ASC"
			);
			$viewData->branch = $this->branch_model->get_all(
				array(),"title ASC"
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
			redirect(base_url("personnel"));
		}
		$delete = $this->personnel_model->delete(
			array(
				"id" => $id
			)
		);
		if ($delete) {
			$alert = array(
				"title" => "İşlem Başarılıyla Gerçekleşti.",
				"text" => "Kayıt silme işlemi başarılı bir şekilde gerçekleşti.",
				"type" => "success"
			);
		}else{
			$alert = array(
				"title" => "İşlem Başarısız Oldu!",
				"text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
				"type" => "error"
			);
		}
		$this->session->set_flashdata("alert",$alert);
		redirect(base_url("personnel"));
	}
	public function isActiveSetter($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel"));
		}
		if ($id) {
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->personnel_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}
	public function isActivePersonnelSetter($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel"));
		}
		if ($id) {
			$isActivePersonnel = ($this->input->post("data") === "true") ? 1 : 0;
			$this->personnel_model->update(
				array(
					"id" => $id
				),
				array(
					"isActivePersonnel" => $isActivePersonnel
				)
			);
		}
	}
	public function rankSetter(){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel"));
		}
		$data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach ($items as $rank => $id) {
			$this->personnel_model->update(
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
	public function document_form($id){
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel"));
		}
		$viewData = new stdClass();
		$item = $this->personnel_model->get(
			array(
				"id"=>$id
			)
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->payment_control = "";
		$viewData->subViewFolder = "document";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function waiting_list_of_approval(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel"));
		}
		//if ($this->session->userdata("user")) {
		//	$where = array(
		//		"isActive" => 2
		//	);
		//}else if($this->session->userdata("institution_user")){
		//	$where = array(
		//		"institution_id" => $user->institution_id,
		//		"isActive" => 2
		//	);
		//}
		//$items = $this->personnel_model->get_all(
		//	$where,"rank ASC"
		//);

		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 2
				),"personnel_name ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions = $this->institution_model->get_all(
				array()
			);
			$item1 = array();
			$items = array();
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$item1 = $this->personnel_model->get_all(
						array(
							"institution_id" => $institution->id,
							"isActive" => 2
						),"personnel_name ASC"
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
		$viewData->payment_control = "";
		$viewData->subViewFolder = "waiting_list_of_approval";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function denied_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel"));
		}
		//if ($this->session->userdata("user")) {
		//	$where = array(
		//		"isActive" => 0
		//	);
		//}else if($this->session->userdata("institution_user")){
		//	$where = array(
		//		"institution_id" => $user->institution_id,
		//		"isActive" => 0
		//	);
		//}
		//$items = $this->personnel_model->get_all(
		//	$where,"rank ASC"
		//);

		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 0
				),"personnel_name ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions = $this->institution_model->get_all(
				array()
			);
			$item1 = array();
			$items = array();
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$item1 = $this->personnel_model->get_all(
						array(
							"institution_id" => $institution->id,
							"isActive" => 0
						),"personnel_name ASC"
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
		$viewData->payment_control = "";
		$viewData->subViewFolder = "denied_list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function institution_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel"));
		}
		if ($this->session->userdata("user")) {
			$where = array(
				"isActive" => 1
			);
		}else if($this->session->userdata("institution_user")){
			$where = array(
				"isActive" => 1
			);
		}
		$institutions = $this->institution_model->get_all(
			$where,"rank ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->payment_control = "";
		$viewData->subViewFolder = "institution_list";
		$viewData->institutions = $institutions;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function institution_personnel_list($id){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel"));
		}
		$items = $this->personnel_model->get_all(
			array(
				"institution_id" => $id,
				"isActive" => 1
			),"rank ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->payment_control = "";
		$viewData->subViewFolder = "institution_personnel_list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function black_list_form($id){
		$user = get_active_user();
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel"));
		}
		$viewData = new stdClass();
		$item = $this->personnel_model->get(
			array(
				"id"=>$id
			)
		);
		if ($this->session->userdata("user")) {
			$where = array();
		}else{
			$where = array(
				"id" => $user->institution_id
			);
		}
		$viewData->institutions = $this->institution_model->get_all(
			$where,"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->payment_control = "";
		$viewData->subViewFolder = "black_list";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function black_list($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel"));
		}
		$this->load->library("form_validation");
		$this->form_validation->set_rules("black_list_description", "Kara Listeye Alınma Nedeni", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		$validate = $this->form_validation->run();
		if($validate){
			$data = array(
				"black_list_description" => $this->input->post("black_list_description"),
				"black_list" => 1
			);
			$update = $this->personnel_model->update(array("id"=>$id),$data);
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
			redirect(base_url("personnel"));
		} else {
			$viewData = new stdClass();
			$item = $this->personnel_model->get(
				array(
					"id"=>$id
				)
			);
			$viewData->viewFolder = $this->viewFolder;
			$viewData->payment_control = "";
			$viewData->subViewFolder = "black_list";
			$viewData->form_error = true;
			$viewData->item = $item;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}
	public function bulk_deletion(){
		if (!isAllowedDeleteModule()) {
			redirect(base_url("personnel"));
		}
		$personnelID = $this->input->post("personnelID");
		//$personnelIDdata =implode(",",$personnelID); 
		foreach ($personnelID as $personnelIDdata) {
			$delete = $this->personnel_model->delete(
				array(
					"id" => $personnelIDdata
				)
			);
			if ($delete) {
				$alert = array(
					"title" => "İşlem Başarılıyla Gerçekleşti.",
					"text" => "Kayıt silme işlemi başarılı bir şekilde gerçekleşti.",
					"type" => "success"
				);
			}else{
				$alert = array(
					"title" => "İşlem Başarısız Oldu!",
					"text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert",$alert);
		}
	}


	/*public function oldSave(){
		if (!isAllowedWriteModule()) {
			redirect(base_url("personnel"));
		}
		$this->load->library("form_validation");
		$this->form_validation->set_rules("personnel_name", "Personel Adı", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		$personnel_date_of_birth = explode("-", $this->input->post("date_of_birth"));
		$personnel_name = strtoupper($this->input->post("personnel_name"));
		$personnel_surname = strtoupper($this->input->post("personnel_surname"));
		$personnel_tc = $this->input->post("tc");
		$client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
		try {
			$result = $client->TCKimlikNoDogrula([
				'TCKimlikNo' => $personnel_tc,
				'Ad' => $personnel_name,
				'Soyad' => $personnel_surname,
				'DogumYili' => $personnel_date_of_birth[0]
			]);
			if ($result->TCKimlikNoDogrulaResult) {
				if ($this->session->userdata("user")) {
					$institution = $this->institution_model->get(
						array(
							"id" => $this->input->post("institution_id")
						)
					);
					$institution_name = $institution->title;
					$institution_id = $this->input->post("institution_id");
				}else{
					$institution_user = $this->session->userdata("institution_user");
					$institution_name = $institution_user->institution_name;
					$institution_id = $institution_user->institution_id;
				}
				$validate = $this->form_validation->run();
				if($validate){
					$data = array(
						"personnel_name" => $personnel_name . " " . $personnel_surname,
						"institution_id" => $institution_id,
						"institution_name" => $institution_name,
						"tc" => $personnel_tc,
						"gender" => $this->input->post("gender"),
						"personnel_phone" => $this->input->post("personnel_phone"),
						"iban" => $this->input->post("iban"),
						"date_of_birth" => $this->input->post("date_of_birth"),
						"branch" => $this->input->post("branch"),
						"entry_date" => date("Y-m-d"),
						"insurance_status" => $this->input->post("insurance_status"),
						"net_salary" => $this->input->post("net_salary"),
						"rank" => 0,
						"isActive" => 2
					);
					$config["allowed_types"] = "*";
					$config["upload_path"]   = "uploads/$this->viewFolder/files/";
					$this->load->library("upload", $config);
					if($_FILES["img_url"]["name"] !== ""){
						$image = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
						$image_271x200 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",271,200, $image);
						if($image_271x200){
							$data["image"] = $image;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Görsel yüklenirken bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["copy_of_identity_card"]["name"] !== ""){
						$copy_of_identity_card = convertToSEO(pathinfo($_FILES["copy_of_identity_card"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["copy_of_identity_card"]["name"], PATHINFO_EXTENSION);
						$upload_copy_of_identity_card = $this->upload->do_upload("copy_of_identity_card");
						$uploaded_copy_of_identity_card = $this->upload->data("file_name");
						if($upload_copy_of_identity_card){
							$data["copy_of_identity_card"] = $uploaded_copy_of_identity_card;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["criminal_record"]["name"] !== ""){
						$criminal_record = convertToSEO(pathinfo($_FILES["criminal_record"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["criminal_record"]["name"], PATHINFO_EXTENSION);
						$upload_criminal_record = $this->upload->do_upload("criminal_record");
						$uploaded_criminal_record = $this->upload->data("file_name");
						if($upload_criminal_record){
							$data["criminal_record"] = $uploaded_criminal_record;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["place_of_residence"]["name"] !== ""){
						$place_of_residence = convertToSEO(pathinfo($_FILES["place_of_residence"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["place_of_residence"]["name"], PATHINFO_EXTENSION);
						$upload_place_of_residence = $this->upload->do_upload("place_of_residence");
						$uploaded_place_of_residence = $this->upload->data("file_name");
						if($upload_place_of_residence){
							$data["place_of_residence"] = $uploaded_place_of_residence;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["health_report"]["name"] !== ""){
						$health_report = convertToSEO(pathinfo($_FILES["health_report"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["health_report"]["name"], PATHINFO_EXTENSION);
						$upload_health_report = $this->upload->do_upload("health_report");
						$uploaded_health_report = $this->upload->data("file_name");
						if($upload_health_report){
							$data["health_report"] = $uploaded_health_report;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["contract"]["name"] !== ""){
						$contract = convertToSEO(pathinfo($_FILES["contract"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["contract"]["name"], PATHINFO_EXTENSION);
						$upload_contract = $this->upload->do_upload("contract");
						$uploaded_contract = $this->upload->data("file_name");
						if($upload_contract){
							$data["contract"] = $uploaded_contract;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["diploma"]["name"] !== ""){
						$diploma = convertToSEO(pathinfo($_FILES["diploma"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["diploma"]["name"], PATHINFO_EXTENSION);
						$upload_diploma = $this->upload->do_upload("diploma");
						$uploaded_diploma = $this->upload->data("file_name");
						if($upload_diploma){
							$data["diploma"] = $uploaded_diploma;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					$insert = $this->personnel_model->add($data);
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

					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("personnel"));
				} else {
					$viewData = new stdClass();
					if ($this->session->userdata("user")) {
						$where = array();
					}else{
						$where = array(
							"id" => $user->institution_id
						);
					}
					$viewData->institutions = $this->institution_model->get_all(
						$where
					);
					$viewData->viewFolder = $this->viewFolder;
					$viewData->subViewFolder = "add";
					$viewData->form_error = true;
					$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
				}
			} else {
				$alert = array(
					"title" => "TC Kimlik Numarası Hatalı!",
					"text" => "Lütfen TC Kimlik Numarası, İsim, Soyisim ve Doğum Tarihi alanlarını Kontrol Ediniz!",
					"type" => "error"
				);
				$this->session->set_flashdata("alert", $alert);
				$viewData = new stdClass();
				if ($this->session->userdata("user")) {
					$where = array();
				}else{
					$where = array(
						"id" => $user->institution_id
					);
				}
				$viewData->institutions = $this->institution_model->get_all(
					$where
				);
				$viewData->viewFolder = $this->viewFolder;
				$viewData->subViewFolder = "add";
				$viewData->form_error = true;
				$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
			}
		} catch (Exception $e) {
			echo $e->faultstring;
		}
	}*/

	/*public function oldUpdate($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel"));
		}
		$this->load->library("form_validation");
		$this->form_validation->set_rules("personnel_name", "Personel Adı", "required|trim");
		$this->form_validation->set_rules("personnel_phone", "Telefon Numarası", "required|trim");
		$this->form_validation->set_rules("iban", "İban", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		$personnel_date_of_birth = explode("-", $this->input->post("date_of_birth"));
		$personnel_name = strtoupper($this->input->post("personnel_name"));
		$personnel_surname = strtoupper($this->input->post("personnel_surname"));
		$personnel_tc = $this->input->post("tc");
		$client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
		try {
			$result = $client->TCKimlikNoDogrula([
				'TCKimlikNo' => $personnel_tc,
				'Ad' => $personnel_name,
				'Soyad' => $personnel_surname,
				'DogumYili' => $personnel_date_of_birth[0]
			]);
			if ($result->TCKimlikNoDogrulaResult) {
				if ($this->session->userdata("user")) {
					$institution = $this->institution_model->get(
						array(
							"id" => $this->input->post("institution_id")
						)
					);
					$institution_name = $institution->title;
					$institution_id = $this->input->post("institution_id");
				}else{
					$institution_user = $this->session->userdata("institution_user");
					$institution_name = $institution_user->institution_name;
					$institution_id = $institution_user->institution_id;
				}
				$config["allowed_types"] = "*";
				$config["upload_path"]   = "uploads/$this->viewFolder/files/";
				$this->load->library("upload", $config);
				$validate = $this->form_validation->run();
				if($validate){
					$data = array(
						"personnel_name" => $personnel_name . " " . $personnel_surname,
						"institution_id" => $institution_id,
						"institution_name" => $institution_name,
						"tc" => $personnel_tc,
						"personnel_phone" => $this->input->post("personnel_phone"),
						"iban" => $this->input->post("iban"),
						"gender" => $this->input->post("gender"),
						"date_of_birth" => $this->input->post("date_of_birth"),
						"branch" => $this->input->post("branch"),
						"insurance_status" => $this->input->post("insurance_status"),
						"net_salary" => $this->input->post("net_salary"),
					);
					if($_FILES["img_url"]["name"] !== ""){
						$image = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
						$image_271x200 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",271,200, $image);
						if($image_271x200){
							$data["image"] = $image;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Görsel yüklenirken bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["copy_of_identity_card"]["name"] !== ""){
						$copy_of_identity_card = convertToSEO(pathinfo($_FILES["copy_of_identity_card"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["copy_of_identity_card"]["name"], PATHINFO_EXTENSION);
						$upload_copy_of_identity_card = $this->upload->do_upload("copy_of_identity_card");
						$uploaded_copy_of_identity_card = $this->upload->data("file_name");
						if($upload_copy_of_identity_card){
							$data["copy_of_identity_card"] = $uploaded_copy_of_identity_card;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["criminal_record"]["name"] !== ""){
						$criminal_record = convertToSEO(pathinfo($_FILES["criminal_record"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["criminal_record"]["name"], PATHINFO_EXTENSION);
						$upload_criminal_record = $this->upload->do_upload("criminal_record");
						$uploaded_criminal_record = $this->upload->data("file_name");
						if($upload_criminal_record){
							$data["criminal_record"] = $uploaded_criminal_record;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["place_of_residence"]["name"] !== ""){
						$place_of_residence = convertToSEO(pathinfo($_FILES["place_of_residence"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["place_of_residence"]["name"], PATHINFO_EXTENSION);
						$upload_place_of_residence = $this->upload->do_upload("place_of_residence");
						$uploaded_place_of_residence = $this->upload->data("file_name");
						if($upload_place_of_residence){
							$data["place_of_residence"] = $uploaded_place_of_residence;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["health_report"]["name"] !== ""){
						$health_report = convertToSEO(pathinfo($_FILES["health_report"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["health_report"]["name"], PATHINFO_EXTENSION);
						$upload_health_report = $this->upload->do_upload("health_report");
						$uploaded_health_report = $this->upload->data("file_name");
						if($upload_health_report){
							$data["health_report"] = $uploaded_health_report;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["contract"]["name"] !== ""){
						$contract = convertToSEO(pathinfo($_FILES["contract"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["contract"]["name"], PATHINFO_EXTENSION);
						$upload_contract = $this->upload->do_upload("contract");
						$uploaded_contract = $this->upload->data("file_name");
						if($upload_contract){
							$data["contract"] = $uploaded_contract;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					if($_FILES["diploma"]["name"] !== ""){
						$diploma = convertToSEO(pathinfo($_FILES["diploma"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["diploma"]["name"], PATHINFO_EXTENSION);
						$upload_diploma = $this->upload->do_upload("diploma");
						$uploaded_diploma = $this->upload->data("file_name");
						if($upload_diploma){
							$data["diploma"] = $uploaded_diploma;
						}else{
							$alert = array(
								"title" => "İşlem Başarısız Oldu!",
								"text" => "Yükleme sırasında bir problem oluştu!",
								"type" => "error"
							);
							$this->session->set_flashdata("alert",$alert);
							redirect(base_url("personnel/update_form/$id"));
						}
					}
					$update = $this->personnel_model->update(array("id"=>$id),$data);
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
					redirect(base_url("personnel"));
				} else {
					$viewData = new stdClass();
					$item = $this->personnel_model->get(
						array(
							"id"=>$id
						)
					);
					if ($this->session->userdata("user")) {
						$where = array();
					}else{
						$where = array(
							"id" => $user->institution_id
						);
					}
					$viewData->institutions = $this->institution_model->get_all(
						$where
					);
					$viewData->viewFolder = $this->viewFolder;
					$viewData->subViewFolder = "update";
					$viewData->form_error = true;
					$viewData->item = $item;
					$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
				}
			} else {
				$alert = array(
					"title" => "TC Kimlik Numarası Hatalı!",
					"text" => "Lütfen TC Kimlik Numarası, İsim, Soyisim ve Doğum Tarihi alanlarını Kontrol Ediniz!",
					"type" => "error"
				);
				$this->session->set_flashdata("alert", $alert);
				$viewData = new stdClass();
				if ($this->session->userdata("user")) {
					$where = array();
				}else{
					$where = array(
						"id" => $user->institution_id
					);
				}
				$viewData->institutions = $this->institution_model->get_all(
					$where
				);
				$viewData->viewFolder = $this->viewFolder;
				$viewData->subViewFolder = "update";
				$viewData->form_error = true;
				redirect(base_url("personnel/update_form/$id"), $viewData);
			}
		} catch (Exception $e) {
			echo $e->faultstring;
		}
	}*/

}
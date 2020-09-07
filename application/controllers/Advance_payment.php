<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advance_payment extends MY_Controller {
	public $viewFolder = "";
	public function __construct(){
		parent::__construct();
		$this->viewFolder = "advance_payment_v";
		$this->load->model("personnel_model");
		$this->load->model("advance_payment_model");
		$this->load->model("institution_model");
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
			redirect(base_url("advance_payment"));
		}
		if (!$this->input->post("date")) {
			$date = date("Y-m");
			$date = $date . "-01";
		}else{
			$date = $this->input->post("date");
			$date = $date . "-01";
		}
		//if ($this->session->userdata("user")) {
		//	$where = array(
		//		"year_month" => $date
		//	);
		//}else if($this->session->userdata("institution_user")){
		//	$where = array(
		//		"institution_id" => $user->institution_id,
		//		"year_month" => $date
		//	);
		//}
		//$items = $this->advance_payment_model->get_all(
		//	$where,"id ASC"
		//);

		if ($this->session->userdata("user")) {
			$items = $this->advance_payment_model->get_all(
				array(
					"year_month" => $date
				),"id ASC"
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
			$items = array();
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$items += $this->advance_payment_model->get_all(
						array(
							"institution_id" => $institution->id,
							"year_month" => $date
						),"id ASC"
					);
				}
			}
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedWriteModule()) {
			redirect(base_url("advance_payment"));
		}
		//if ($this->session->userdata("user")) {
		//	$where = array();
		//	$where2 = array();
		//}else if($this->session->userdata("institution_user")){
		//	$where = array(
		//		"institution_id" => $user->institution_id
		//	);
		//	$where2 = array(
		//		"id" => $user->institution_id
		//	);
		//}
		//$viewData->personnels = $this->personnel_model->get_all(
		//	$where,"personnel_name ASC"
		//);
		//$viewData->institutions = $this->institution_model->get_all(
		//	$where2,"title ASC"
		//);

		if ($this->session->userdata("user")) {
			$institutions = array();
			$personnels = array();
			$personnels = $this->personnel_model->get_all(
				array(),"personnel_name ASC"
			);
			$institutions = $this->institution_model->get_all(
				array(),"title ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions1 = $this->institution_model->get_all(
				array()
			);
			$institutions = array();
			$personnels = array();
			foreach ($institutions1 as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$institutions += $this->institution_model->get_all(
						array(
                            //"id" => $institution->id,
							"isActive" => 1
						),"title ASC"
					);
				}
			}
			foreach ($institutions1 as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$personnels += $this->personnel_model->get_all(
						array(
							"institution_id" => $institution->id,
							"isActive" => 1
						),"personnel_name ASC"
					);
				}
			}
		}
		$viewData->personnels = $personnels;
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
		if (!isAllowedWriteModule()) {
			redirect(base_url("advance_payment"));
		}
		$this->load->library("form_validation");
		$this->form_validation->set_rules("personnel_id", "Personel", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		$personnel = $this->personnel_model->get(
			array(
				"id" => $this->input->post("personnel_id")
			)
		);
		$advance_payment = $this->advance_payment_model->get(
			array(
				"personnel_id" => $this->input->post("personnel_id")
			)
		);
		$payment_date = date("Y-m");
		$payment_date = $payment_date . "-01";
		$payment_made = $this->input->post("payment_made");
		if ($advance_payment != "") {
			$personnel_payment_date = $this->advance_payment_model->get(
				array(
					"personnel_id" => $this->input->post("personnel_id"),
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
				$id = $personnel_payment_date->id;
				$remaining_payment = $personnel_payment_date->remaining_payment - $payment_made;
				$payment_made_total = $personnel_payment_date->payment_made + $payment_made;
				//if ($this->session->userdata("user")) {
				//	$institution = $this->institution_model->get(
				//		array(
				//			"id" => $this->input->post("institution_id")
				//		)
				//	);
				//	$institution_name = $institution->title;
				//	$institution_id = $this->input->post("institution_id");
				//}else{
				//	$institution_user = $this->session->userdata("institution_user");
				$institution_name = $personnel->institution_name;
				$institution_id = $personnel->institution_id;
				//}
				$config["allowed_types"] = "*";
				$config["upload_path"]   = "uploads/$this->viewFolder/files/";
				$this->load->library("upload", $config);
				$validate = $this->form_validation->run();
				if($validate){
					$data = array(
						"personnel_id" => $this->input->post("personnel_id"),
						"personnel_name" => $personnel->personnel_name,
						"institution_id" => $institution_id,
						"institution_name" => $institution_name,
						"payment_made" => $payment_made_total,
						"remaining_payment" => $remaining_payment,
						"date" => date("Y-m-d"),
						"year_month" => $payment_date,
						"description" => $this->input->post("description"),
					);
					$update = $this->advance_payment_model->update(array("id"=>$id),$data);
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
					redirect(base_url("advance_payment"));
				} else {
					$viewData = new stdClass();
					$item = $this->advance_payment_model->get(
						array(
							"id"=>$id
						)
					);
					$user = get_active_user();
					//if ($this->session->userdata("user")) {
					//	$where = array();
					//}else if($this->session->userdata("institution_user")){
					//	$where = array(
					//		"institution_id" => $user->institution_id
					//	);
					//}
					//$viewData->personnels = $this->personnel_model->get_all(
					//	$where,"rank ASC"
					//);
					if ($this->session->userdata("user")) {
						$institutions = array();
						$personnels = array();
						$personnels = $this->personnel_model->get_all(
							array(),"personnel_name ASC"
						);
						$institutions = $this->institution_model->get_all(
							array(),"title ASC"
						);
					}else if($this->session->userdata("institution_user")){
						$institutions1 = $this->institution_model->get_all(
							array()
						);
						$institutions = array();
						$personnels = array();
						foreach ($institutions1 as $institution) {
							if (isAllowedViewInstitution($institution->id)) {
								$institutions += $this->institution_model->get_all(
									array(
                            //"id" => $institution->id,
										"isActive" => 1
									),"title ASC"
								);
							}
						}
						foreach ($institutions1 as $institution) {
							if (isAllowedViewInstitution($institution->id)) {
								$personnels += $this->personnel_model->get_all(
									array(
										"institution_id" => $institution->id,
										"isActive" => 1
									),"personnel_name ASC"
								);
							}
						}
					}
					$viewData->personnels = $personnels;
					$viewData->institutions = $institutions;
					$viewData->payment_control = "";
					$viewData->viewFolder = $this->viewFolder;
					$viewData->subViewFolder = "update";
					$viewData->form_error = true;
					$viewData->item = $item;
					$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
				}
			}else{
				$remaining_payment = $personnel->net_salary - $payment_made;
				//if ($this->session->userdata("user")) {
				//	$institution = $this->institution_model->get(
				//		array(
				//			"id" => $this->input->post("institution_id")
				//		)
				//	);
				//	$institution_name = $institution->title;
				//	$institution_id = $this->input->post("institution_id");
				//}else{
				//	$institution_user = $this->session->userdata("institution_user");
				//	$institution_name = $institution_user->institution_name;
				//	$institution_id = $institution_user->institution_id;
				//}
				$institution_name = $personnel->institution_name;
				$institution_id = $personnel->institution_id;
				$validate = $this->form_validation->run();
				if($validate){
					$data = array(
						"personnel_id" => $this->input->post("personnel_id"),
						"personnel_name" => $personnel->personnel_name,
						"institution_id" => $institution_id,
						"institution_name" => $institution_name,
						"payment_made" => $payment_made,
						"remaining_payment" => $remaining_payment,
						"date" => date("Y-m-d"),
						"year_month" => $payment_date,
						"description" => $this->input->post("description"),
						"isActive" => 2,
					);
					$insert = $this->advance_payment_model->add($data);
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
					redirect(base_url("advance_payment"));
				} else {
					$viewData = new stdClass();
					$user = get_active_user();
					//if ($this->session->userdata("user")) {
					//	$where = array();
					//}else if($this->session->userdata("institution_user")){
					//	$where = array(
					//		"institution_id" => $user->institution_id
					//	);
					//}
					//$viewData->personnels = $this->personnel_model->get_all(
					//	$where,"rank ASC"
					//);
					if ($this->session->userdata("user")) {
						$institutions = array();
						$personnels = array();
						$personnels = $this->personnel_model->get_all(
							array(),"personnel_name ASC"
						);
						$institutions = $this->institution_model->get_all(
							array(),"title ASC"
						);
					}else if($this->session->userdata("institution_user")){
						$institutions1 = $this->institution_model->get_all(
							array()
						);
						$institutions = array();
						$personnels = array();
						foreach ($institutions1 as $institution) {
							if (isAllowedViewInstitution($institution->id)) {
								$institutions += $this->institution_model->get_all(
									array(
                            //"id" => $institution->id,
										"isActive" => 1
									),"title ASC"
								);
							}
						}
						foreach ($institutions1 as $institution) {
							if (isAllowedViewInstitution($institution->id)) {
								$personnels += $this->personnel_model->get_all(
									array(
										"institution_id" => $institution->id,
										"isActive" => 1
									),"personnel_name ASC"
								);
							}
						}
					}
					$viewData->personnels = $personnels;
					$viewData->institutions = $institutions;
					$viewData->payment_control = "";
					$viewData->viewFolder = $this->viewFolder;
					$viewData->subViewFolder = "add";
					$viewData->form_error = true;
					$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
				}
			}
		}else{
			$remaining_payment = $personnel->net_salary - $payment_made;
			//if ($this->session->userdata("user")) {
			//	$institution = $this->institution_model->get(
			//		array(
			//			"id" => $this->input->post("institution_id")
			//		)
			//	);
			//	$institution_name = $institution->title;
			//	$institution_id = $this->input->post("institution_id");
			//}else{
			//	$institution_user = $this->session->userdata("institution_user");
			//	$institution_name = $institution_user->institution_name;
			//	$institution_id = $institution_user->institution_id;
			//}
			$institution_name = $personnel->institution_name;
			$institution_id = $personnel->institution_id;
			$validate = $this->form_validation->run();
			if($validate){
				$data = array(
					"personnel_id" => $this->input->post("personnel_id"),
					"personnel_name" => $personnel->personnel_name,
					"institution_id" => $institution_id,
					"institution_name" => $institution_name,
					"payment_made" => $payment_made,
					"remaining_payment" => $remaining_payment,
					"date" => date("Y-m-d"),
					"year_month" => $payment_date,
					"description" => $this->input->post("description"),
					"isActive" => 2,
				);
				$insert = $this->advance_payment_model->add($data);
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
				redirect(base_url("advance_payment"));
			} else {
				$viewData = new stdClass();
				$user = get_active_user();
				//if ($this->session->userdata("user")) {
				//	$where = array();
				//}else if($this->session->userdata("institution_user")){
				//	$where = array(
				//		"institution_id" => $user->institution_id
				//	);
				//}
				//$viewData->personnels = $this->personnel_model->get_all(
				//	$where,"rank ASC"
				//);

				if ($this->session->userdata("user")) {
					$institutions = array();
					$personnels = array();
					$personnels = $this->personnel_model->get_all(
						array(),"personnel_name ASC"
					);
					$institutions = $this->institution_model->get_all(
						array(),"title ASC"
					);
				}else if($this->session->userdata("institution_user")){
					$institutions1 = $this->institution_model->get_all(
						array()
					);
					$institutions = array();
					$personnels = array();
					foreach ($institutions1 as $institution) {
						if (isAllowedViewInstitution($institution->id)) {
							$institutions += $this->institution_model->get_all(
								array(
                            //"id" => $institution->id,
									"isActive" => 1
								),"title ASC"
							);
						}
					}
					foreach ($institutions1 as $institution) {
						if (isAllowedViewInstitution($institution->id)) {
							$personnels += $this->personnel_model->get_all(
								array(
									"institution_id" => $institution->id,
									"isActive" => 1
								),"personnel_name ASC"
							);
						}
					}
				}
				$viewData->personnels = $personnels;
				$viewData->institutions = $institutions;
				$viewData->payment_control = "";
				$viewData->viewFolder = $this->viewFolder;
				$viewData->subViewFolder = "add";
				$viewData->form_error = true;
				$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
			}
		}
	}
	public function update_form($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("advance_payment"));
		}
		$user = get_active_user();
		$viewData = new stdClass();
		$item = $this->advance_payment_model->get(
			array(
				"id"=>$id
			)
		);
		//if ($this->session->userdata("user")) {
		//	$where = array();
		//	$where2 = array();
		//}else if($this->session->userdata("institution_user")){
		//	$where = array(
		//		"institution_id" => $user->institution_id
		//	);
		//	$where2 = array(
		//		"id" => $user->institution_id
		//	);
		//}
		//$viewData->personnels = $this->personnel_model->get_all(
		//	$where,"personnel_name ASC"
		//);
		//$viewData->institutions = $this->institution_model->get_all(
		//	$where2,"title ASC"
		//);

		if ($this->session->userdata("user")) {
			$institutions = array();
			$personnels = array();
			$personnels = $this->personnel_model->get_all(
				array(),"personnel_name ASC"
			);
			$institutions = $this->institution_model->get_all(
				array(),"title ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions1 = $this->institution_model->get_all(
				array()
			);
			$institutions = array();
			$personnels = array();
			foreach ($institutions1 as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$institutions += $this->institution_model->get_all(
						array(
                            //"id" => $institution->id,
							"isActive" => 1
						),"title ASC"
					);
				}
			}
			foreach ($institutions1 as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$personnels += $this->personnel_model->get_all(
						array(
							"institution_id" => $institution->id,
							"isActive" => 1
						),"personnel_name ASC"
					);
				}
			}
		}
		$viewData->personnels = $personnels;
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function update($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("advance_payment"));
		}
		$this->load->library("form_validation");
		$this->form_validation->set_rules("personnel_id", "Personel Adı", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		$personnel = $this->personnel_model->get(
			array(
				"id" => $this->input->post("personnel_id")
			)
		);
		$payment_made = $this->input->post("payment_made");
		$remaining_payment = $personnel->net_salary - $payment_made;
		//if ($this->session->userdata("user")) {
		//	$institution = $this->institution_model->get(
		//		array(
		//			"id" => $this->input->post("institution_id")
		//		)
		//	);
		//	$institution_name = $institution->title;
		//	$institution_id = $this->input->post("institution_id");
		//}else{
		//	$institution_user = $this->session->userdata("institution_user");
		//	$institution_name = $institution_user->institution_name;
		//	$institution_id = $institution_user->institution_id;
		//}
		$institution_name = $personnel->institution_name;
		$institution_id = $personnel->institution_id;
		$config["allowed_types"] = "*";
		$config["upload_path"]   = "uploads/$this->viewFolder/files/";
		$this->load->library("upload", $config);
		$validate = $this->form_validation->run();
		if($validate){
			$data = array(
				"personnel_id" => $this->input->post("personnel_id"),
				"personnel_name" => $personnel->personnel_name,
				"institution_id" => $institution_id,
				"institution_name" => $institution_name,
				"payment_made" => $payment_made,
				"remaining_payment" => $remaining_payment,
				"date" => date("Y-m-d"),
				"description" => $this->input->post("description"),
			);
			$update = $this->advance_payment_model->update(array("id"=>$id),$data);
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
			redirect(base_url("advance_payment"));
		} else {
			$viewData = new stdClass();
			$item = $this->advance_payment_model->get(
				array(
					"id"=>$id
				)
			);
			$user = get_active_user();
			//if ($this->session->userdata("user")) {
			//	$where = array();
			//}else if($this->session->userdata("institution_user")){
			//	$where = array(
			//		"institution_id" => $user->institution_id
			//	);
			//}
			//$viewData->personnels = $this->personnel_model->get_all(
			//	$where,"rank ASC"
			//);
			if ($this->session->userdata("user")) {
				$institutions = array();
				$personnels = array();
				$personnels = $this->personnel_model->get_all(
					array(),"personnel_name ASC"
				);
				$institutions = $this->institution_model->get_all(
					array(),"title ASC"
				);
			}else if($this->session->userdata("institution_user")){
				$institutions1 = $this->institution_model->get_all(
					array()
				);
				$institutions = array();
				$personnels = array();
				foreach ($institutions1 as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						$institutions += $this->institution_model->get_all(
							array(
                            //"id" => $institution->id,
								"isActive" => 1
							),"title ASC"
						);
					}
				}
				foreach ($institutions1 as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						$personnels += $this->personnel_model->get_all(
							array(
								"institution_id" => $institution->id,
								"isActive" => 1
							),"personnel_name ASC"
						);
					}
				}
			}
			$viewData->personnels = $personnels;
			$viewData->institutions = $institutions;
			$viewData->payment_control = "";
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $item;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}
	public function delete($id){
		if (!isAllowedDeleteModule()) {
			redirect(base_url("advance_payment"));
		}
		$delete = $this->advance_payment_model->delete(
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
		redirect(base_url("advance_payment"));
	}
	public function isActiveSetter($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("advance_payment"));
		}
		if ($id) {
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->advance_payment_model->update(
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
			redirect(base_url("advance_payment"));
		}
		$data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach ($items as $rank => $id) {
			$this->advance_payment_model->update(
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
			redirect(base_url("advance_payment"));
		}
		$viewData = new stdClass();
		$item = $this->advance_payment_model->get(
			array(
				"id"=>$id
			)
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "document";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function permission_document_confirmation($id,$confirm){
		$update = $this->advance_payment_model->update(array("id"=>$id),
			$data = array(
				"document_status" => $confirm
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
		redirect(base_url("advance_payment"));
	}
}
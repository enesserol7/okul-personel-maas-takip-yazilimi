<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Institution_personnel extends MY_Controller {
	public $viewFolder = "";
	public function __construct(){
		parent::__construct();
		$this->viewFolder = "personnel_v";
		$this->load->model("personnel_model");
		$this->load->model("institution_model");
		$this->load->model("advance_payment_model");
		$this->load->model("personnel_exit_model");
		$this->load->model("personnel_payment_model");
		if (!get_active_user()) {
			redirect(base_url("login"));
		}
	}
	public function institution_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}
		if ($this->session->userdata("user")) {
			$where = array(
				"isActive" => 1
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
			$where = array(
				"isActive" => 1
			);
		}
		$institutions = $this->institution_model->get_all(
			$where,"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "institution_list";
		$viewData->institutions = $institutions;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function institution_personnel_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}
		$institution_id = $this->input->post("institution_id");
		if ($institution_id == "all_personnel") {
			//$items = $this->personnel_model->get_all(
			//	array(
			//		"isActive" => 1
			//	),"rank ASC"
			//);
			if ($this->session->userdata("user")) {
				$items = $this->personnel_model->get_all(
					array(
						"isActive" => 1
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
		}else{
			//$items = $this->personnel_model->get_all(
			//	array(
			//		"institution_id" => $institution_id,
			//		"isActive" => 1
			//	),"rank ASC"
			//);
			if ($this->session->userdata("user")) {
				$items = $this->personnel_model->get_all(
					array(
						"institution_id" => $institution_id,
						"isActive" => 1
					),"personnel_name ASC"
				);
			}else if($this->session->userdata("institution_user")){
				$items = array();
				if (isAllowedViewInstitution($institution_id)) {
					$items = $this->personnel_model->get_all(
						array(
							"institution_id" => $institution_id,
							"isActive" => 1
						),"personnel_name ASC"
					);
				}
			}
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->payment_control = "";
		$viewData->subViewFolder = "institution_personnel_list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Personnel_payments extends MY_Controller {
	public $viewFolder = "";
	public function __construct(){
		parent::__construct();
		$this->viewFolder = "personnel_payments_v";
		$this->load->model("personnel_model");
		$this->load->model("personnel_payment_model");
		$this->load->model("institution_model");
		$this->load->model("advance_payment_model");
		$this->load->model("personnel_exit_model");
		if (!get_active_user()) {
			redirect(base_url("login"));
		}
	}
	public function index(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel_payments"));
		}
		//if (!$this->input->post("date")) {
		//	$date = date("Y-m");
		//	$date = $date . "-01";
		//}else{
		//	$date = $this->input->post("date");
		//	$date = $date . "-01";
		//}
		//if ($this->session->userdata("user")) {
		//	$where = array(
		//		"year_month" => $date
		//	);
		//}else if($this->session->userdata("institution_user")){
		//$where = array(
		//	"institution_id" => $user->institution_id,
		//	"year_month" => $date
		//);
	//}
	//$items = $this->personnel_payment_model->get_all(
	//	$where,"id ASC"
	//);

		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 1
				),"id ASC"
			);
			$institutions = $this->institution_model->get_all(
				array(),"title ASC"
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
				array(),"title ASC"
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
			$personnels = $this->personnel_model->get_all(
				array(),"personnel_name ASC"
			);
			$item1 = array();
			$items = array();
			$payment_date = date("Y-m");
			$payment_date = $payment_date . "-01";
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					foreach ($personnels as $personnel) {
						$payment_personnel = $this->personnel_payment_model->get(
							array(
								"personnel_id" => $personnel->id,
								"year_month" => $payment_date
							)
						);
						if (empty($payment_personnel)) {
							$item1 = $this->personnel_model->get_all(
								array(
									"institution_id" => $institution->id,
									"id" => $personnel->id,
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
			}
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$viewData->item = "";
		$viewData->institutions = $institutions;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function payment_institution_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel_payments"));
		}
		//if (!$this->input->post("date")) {
		//	$date = date("Y-m");
		//	$date = $date . "-01";
		//}else{
		//	$date = $this->input->post("date");
		//	$date = $date . "-01";
		//}
		//if ($this->session->userdata("user")) {
		//	$where = array(
		//		"year_month" => $date
		//	);
		//}else if($this->session->userdata("institution_user")){
		//$where = array(
		//	"institution_id" => $user->institution_id,
		//	"year_month" => $date
		//);
	//}
	//$items = $this->personnel_payment_model->get_all(
	//	$where,"id ASC"
	//);

		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 1
				),"id ASC"
			);
			$institutions = $this->institution_model->get_all(
				array(),"title ASC"
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
			$viewData->payment_control = $this->personnel_payment_model->get_all(
				array(
					"isActive"=>4
				)
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
				array(),"title ASC"
			);
			$personnels = $this->personnel_model->get_all(
				array(),"personnel_name ASC"
			);
			$item1 = array();
			$items = array();
			$payment_date = date("Y-m");
			$payment_date = $payment_date . "-01";
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					foreach ($personnels as $personnel) {
						$payment_personnel = $this->personnel_payment_model->get(
							array(
								"personnel_id" => $personnel->id,
								"year_month" => $payment_date
							)
						);
						if (empty($payment_personnel)) {
							$item1 = $this->personnel_model->get_all(
								array(
									"institution_id" => $institution->id,
									"id" => $personnel->id,
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
			}
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "institution_list";
		$viewData->items = $items;
		$viewData->item = "";
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function payment_control(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("personnel_payments"));
		}
		//if (!$this->input->post("date")) {
		//	$date = date("Y-m");
		//	$date = $date . "-01";
		//}else{
		//	$date = $this->input->post("date");
		//	$date = $date . "-01";
		//}
		//if ($this->session->userdata("user")) {
		//	$where = array(
		//		"year_month" => $date
		//	);
		//}else if($this->session->userdata("institution_user")){
		//$where = array(
		//	"institution_id" => $user->institution_id,
		//	"year_month" => $date
		//);
	//}
	//$items = $this->personnel_payment_model->get_all(
	//	$where,"id ASC"
	//);

		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 1
				),"id ASC"
			);
			$institutions = $this->institution_model->get_all(
				array(),"title ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions = $this->institution_model->get_all(
				array(),"title ASC"
			);
			$item1 = array();
			$items = array();
			$payment_date = date("Y-m");
			$payment_date = $payment_date . "-01";
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$item1 = $this->personnel_payment_model->get_all(
						array(
							"institution_id" => $institution->id,
							"isActive" => 4
						),"personnel_name ASC"
					);
					if ($items == "") {
						$items = $item1;
					}else{
						$items = array_merge($items,$item1);
					}
				}
			}
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "payment_control";
		$viewData->items = $items;
		$viewData->item = "";
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function institution_personnel_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}
		$institution_id = $this->input->post("institution_id");
		if (empty($institution_id)) {
			$institution_id = $this->uri->segment(3);
		}
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
				$item = "";
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				foreach ($institutions as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						foreach ($personnels as $personnel) {
							$payment_personnel = $this->personnel_payment_model->get(
								array(
									"personnel_id" => $personnel->id,
									"year_month" => $payment_date
								)
							);
							if (empty($payment_personnel)) {
								$item1 = $this->personnel_model->get_all(
									array(
										"institution_id" => $institution->id,
										"id" => $personnel->id,
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
				}
				$item = "";
			}
		}else{
			//$items = $this->personnel_model->get_all(
			//	array(
			//		"institution_id" => $institution_id,
			//		"isActive" => 1
			//	),"rank ASC"
			//);
			if ($this->session->userdata("user")) {
				//$items = $this->personnel_model->get_all(
				//	array(
				//		"institution_id" => $institution_id,
				//		"isActive" => 1
				//	),"personnel_name ASC"
				//);
				//$item = $this->institution_model->get(
				//	array(
				//		"id" => $institution_id,
				//	)
				//);
				$institutions = $this->institution_model->get_all(
					array()
				);
				$personnels = $this->personnel_model->get_all(
					array(),"personnel_name ASC"
				);
				$item1 = array();
				$items = array();
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				foreach ($personnels as $personnel) {
					$payment_personnel = $this->personnel_payment_model->get(
						array(
							"personnel_id" => $personnel->id,
							"year_month" => $payment_date
						)
					);
					if (empty($payment_personnel)) {
						$item1 = $this->personnel_model->get_all(
							array(
								"institution_id" => $institution_id,
								"id" => $personnel->id,
								"isActive" => 1
							),"personnel_name ASC"
						);
						$item = $this->institution_model->get(
							array(
								"id" => $institution_id,
							)
						);
					}
					if ($items == "") {
						$items = $item1;
					}else{
						$items = array_merge($items,$item1);
					}
				}
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array()
				);
				$personnels = $this->personnel_model->get_all(
					array(),"personnel_name ASC"
				);
				$item1 = array();
				$items = array();
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				foreach ($institutions as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						foreach ($personnels as $personnel) {
							$payment_personnel = $this->personnel_payment_model->get(
								array(
									"personnel_id" => $personnel->id,
									"year_month" => $payment_date
								)
							);
							if (empty($payment_personnel)) {
								$item1 = $this->personnel_model->get_all(
									array(
										"institution_id" => $institution_id,
										"id" => $personnel->id,
										"isActive" => 1
									),"personnel_name ASC"
								);
								$item = $this->institution_model->get(
									array(
										"id" => $institution_id,
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
				}
				
			}
		}
		$institutions = $this->institution_model->get_all(
			array(),"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$viewData->item = $item;
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function salary_accrual(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}		
		$institutions = $this->institution_model->get_all(
			array(),"title ASC"
		);
		$payment_date = date("Y-m");
		$payment_date = $payment_date . "-01";
		if ($this->session->userdata("user")) {
			$item1 = array();
			$items = array();
			foreach ($institutions as $institution) {
				$item1 = $this->personnel_payment_model->get_all(
					array(
						"institution_id" => $institution->id
					),"personnel_name ASC"
				);
				if ($items == "") {
					$items = $item1;
				}else{
					$items = array_merge($items,$item1);
				}
			}
		}else{
			$item1 = array();
			$items = array();
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$item1 = $this->personnel_payment_model->get_all(
						array(
							"institution_id" => $institution->id
						),"personnel_name ASC"
					);
					if ($items == "") {
						$items = $item1;
					}else{
						$items = array_merge($items,$item1);
					}
				}
			}
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "salary_accrual";
		$viewData->institutions = $institutions;
		$viewData->items = $items;
		$viewData->payment_date = $payment_date;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function salary_accrual_institution_date_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}		
		$institutions = $this->institution_model->get_all(
			array(),"title ASC"
		);
		$payment_date = $this->input->post("date");
		$payment_date = $payment_date . "-01";
		if ($this->session->userdata("user")) {
			$item1 = array();
			$items = array();
			foreach ($institutions as $institution) {
				$item1 = $this->personnel_payment_model->get_all(
					array(
						"institution_id" => $institution->id
					),"personnel_name ASC"
				);
				if ($items == "") {
					$items = $item1;
				}else{
					$items = array_merge($items,$item1);
				}
			}
		}else{
			$item1 = array();
			$items = array();
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$item1 = $this->personnel_payment_model->get_all(
						array(
							"institution_id" => $institution->id
						),"personnel_name ASC"
					);
					if ($items == "") {
						$items = $item1;
					}else{
						$items = array_merge($items,$item1);
					}
				}
			}
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "salary_accrual";
		$viewData->institutions = $institutions;
		$viewData->items = $items;
		$viewData->payment_date = $payment_date;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function salary_accrual_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}
		$institution_id = $this->input->post("institution_id");
		if (empty($institution_id)) {
			$institution_id = $this->uri->segment(3);
		}
		if ($institution_id == "all_personnel") {
			//$items = $this->personnel_model->get_all(
			//	array(
			//		"isActive" => 1
			//	),"rank ASC"
			//);
			if ($this->session->userdata("user")) {
				$items = $this->personnel_payment_model->get_all(
					array(
					),"personnel_name ASC"
				);
				$item = "";
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				foreach ($institutions as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						$item1 = $this->personnel_payment_model->get_all(
							array(
								"institution_id" => $institution->id
							),"personnel_name ASC"
						);
						if ($items == "") {
							$items = $item1;
						}else{
							$items = array_merge($items,$item1);
						}
					}
				}
				$item = "";
			}
		}else{
			//$items = $this->personnel_model->get_all(
			//	array(
			//		"institution_id" => $institution_id,
			//		"isActive" => 1
			//	),"rank ASC"
			//);
			if ($this->session->userdata("user")) {
				//$items = $this->personnel_model->get_all(
				//	array(
				//		"institution_id" => $institution_id,
				//		"isActive" => 1
				//	),"personnel_name ASC"
				//);
				//$item = $this->institution_model->get(
				//	array(
				//		"id" => $institution_id,
				//	)
				//);
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				$item1 = $this->personnel_payment_model->get_all(
					array(
						"institution_id" => $institution_id
					),"personnel_name ASC"
				);
				$item = $this->institution_model->get(
					array(
						"id" => $institution_id,
					)
				);
				if ($items == "") {
					$items = $item1;
				}else{
					$items = array_merge($items,$item1);
				}
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				if (isAllowedViewInstitution($institution_id)) {
					$item1 = $this->personnel_payment_model->get_all(
						array(
							"institution_id" => $institution_id
						),"personnel_name ASC"
					);
					$item = $this->institution_model->get(
						array(
							"id" => $institution_id,
						)
					);
					if ($items == "") {
						$items = $item1;
					}else{
						$items = array_merge($items,$item1);
					}
				}	
			}
		}
		$institutions = $this->institution_model->get_all(
			array(),"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "salary_accrual_list";
		$viewData->items = $items;
		$viewData->item = $item;
		$viewData->institution_id = $institution_id;
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function salary_accrual_date_list(){
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
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				$payment_date = $this->input->post("date");
				$payment_date = $payment_date . "-01";
				foreach ($institutions as $institution) {
					$item1 = $this->personnel_payment_model->get_all(
						array(
							"institution_id" => $institution->id,
							"year_month" => $payment_date
						),"personnel_name ASC"
					);
					if ($items == "") {
						$items = $item1;
					}else{
						$items = array_merge($items,$item1);
					}
				}
				$item = "";
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				$payment_date = $this->input->post("date");
				$payment_date = $payment_date . "-01";
				foreach ($institutions as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						$item1 = $this->personnel_payment_model->get_all(
							array(
								"institution_id" => $institution->id,
								"year_month" => $payment_date
							),"personnel_name ASC"
						);
						if ($items == "") {
							$items = $item1;
						}else{
							$items = array_merge($items,$item1);
						}
					}
				}
				$item = "";
			}
		}else{
			//$items = $this->personnel_model->get_all(
			//	array(
			//		"institution_id" => $institution_id,
			//		"isActive" => 1
			//	),"rank ASC"
			//);
			if ($this->session->userdata("user")) {
				//$items = $this->personnel_model->get_all(
				//	array(
				//		"institution_id" => $institution_id,
				//		"isActive" => 1
				//	),"personnel_name ASC"
				//);
				//$item = $this->institution_model->get(
				//	array(
				//		"id" => $institution_id,
				//	)
				//);
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				$payment_date = $this->input->post("date");
				$payment_date = $payment_date . "-01";
				$item1 = $this->personnel_payment_model->get_all(
					array(
						"institution_id" => $institution_id,
						"year_month" => $payment_date
					),"personnel_name ASC"
				);
				$item = $this->institution_model->get(
					array(
						"id" => $institution_id,
					)
				);
				if ($items == "") {
					$items = $item1;
				}else{
					$items = array_merge($items,$item1);
				}
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				$payment_date = $this->input->post("date");
				$payment_date = $payment_date . "-01";
				foreach ($institutions as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						$item1 = $this->personnel_payment_model->get_all(
							array(
								"institution_id" => $institution_id,
								"year_month" => $payment_date
							),"personnel_name ASC"
						);
						$item = $this->institution_model->get(
							array(
								"id" => $institution_id,
							)
						);
						if ($items == "") {
							$items = $item1;
						}else{
							$items = array_merge($items,$item1);
						}
					}
				}
				
			}
		}
		$institutions = $this->institution_model->get_all(
			array(),"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "salary_accural_date_list";
		$viewData->items = $items;
		$viewData->item = $item;
		$viewData->institution_id = $institution_id;
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function salary_accrual_personnel(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}		
		$personnel_id = $this->input->post("personnel_id");
		$institutions = $this->institution_model->get_all(
			array(),"title ASC"
		);
		$payment_date = date("Y-m");
		$payment_date = $payment_date . "-01";
		if ($this->session->userdata("user")) {
			$items = array();
			$items = $this->personnel_payment_model->get_all(
				array(
					"personnel_id" => $personnel_id
				)
			);
		}else{
			$items = array();
			$items = $this->personnel_payment_model->get_all(
				array(
					"personnel_id" => $personnel_id
				)
			);
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "salary_accrual_personnel";
		$viewData->institutions = $institutions;
		$viewData->items = $items;
		$viewData->payment_date = $payment_date;
		$viewData->personnel_id = $personnel_id;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function salary_accrual_personnel_date(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}		
		$personnel_id = $this->input->post("personnel_id");
		$payment_date = $this->input->post("date");
		$payment_date = $payment_date . "-01";
		$institutions = $this->institution_model->get_all(
			array(),"title ASC"
		);
		if ($this->session->userdata("user")) {
			$items = array();
			$items = $this->personnel_payment_model->get_all(
				array(
					"personnel_id" => $personnel_id,
					"year_month" => $payment_date
				)
			);
		}else{
			$items = array();
			$items = $this->personnel_payment_model->get_all(
				array(
					"personnel_id" => $personnel_id,
					"year_month" => $payment_date
				)
			);
		}
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "salary_accrual_personnel";
		$viewData->institutions = $institutions;
		$viewData->items = $items;
		$viewData->payment_date = $payment_date;
		$viewData->personnel_id = $personnel_id;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function control_institution_personnel_list(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedViewModule()) {
			redirect(base_url("institution_personnel"));
		}
		$institution_id = $this->input->post("institution_id");
		if (empty($institution_id)) {
			$institution_id = $this->uri->segment(3);
		}
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
				$item = "";
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array()
				);
				$item1 = array();
				$items = array();
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				foreach ($institutions as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						foreach ($personnels as $personnel) {
							$payment_personnel = $this->personnel_payment_model->get(
								array(
									"personnel_id" => $personnel->id,
									"year_month" => $payment_date
								)
							);
							if (empty($payment_personnel)) {
								$item1 = $this->personnel_model->get_all(
									array(
										"institution_id" => $institution->id,
										"id" => $personnel->id,
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
				}
				$item = "";
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
				$item = $this->institution_model->get(
					array(
						"id" => $institution_id,
					)
				);
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array()
				);
				$personnels = $this->personnel_model->get_all(
					array(),"personnel_name ASC"
				);
				$item1 = array();
				$items = array();
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				foreach ($institutions as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						$item1 = $this->personnel_payment_model->get_all(
							array(
								"institution_id" => $institution_id,
								"isActive" => 4
							),"personnel_name ASC"
						);
						$item = $this->institution_model->get(
							array(
								"id" => $institution_id,
							)
						);
						if ($items == "") {
							$items = $item1;
						}else{
							$items = array_merge($items,$item1);
						}
					}
				}
			}
		}
		$institutions = $this->institution_model->get_all(
			array(),"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "payment_control";
		$viewData->items = $items;
		$viewData->item = $item;
		$viewData->institutions = $institutions;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
		$viewData = new stdClass();
		$user = get_active_user();
		if (!isAllowedWriteModule()) {
			redirect(base_url("personnel_payments"));
		}
		if ($this->session->userdata("user")) {
			$where = array();
			$where2 = array();
		}else if($this->session->userdata("institution_user")){
			$where = array(
				"institution_id" => $user->institution_id
			);
			$where2 = array(
				"id" => $user->institution_id
			);
		}
		$viewData->personnels = $this->personnel_model->get_all(
			$where,"personnel_name ASC"
		);
		$viewData->institutions = $this->institution_model->get_all(
			$where2,"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
		if (!isAllowedWriteModule()) {
			redirect(base_url("personnel_payments"));
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
		$personnel_payment = $this->personnel_payment_model->get(
			array(
				"personnel_id" => $this->input->post("personnel_id")
			)
		);
		$payment_date = date("Y-m");
		$payment_date = $payment_date . "-01";
		$payment_made = $this->input->post("payment_made");
		if ($personnel_payment != "") {
			$personnel_payment_date = $this->personnel_payment_model->get(
				array(
					"personnel_id" => $this->input->post("personnel_id"),
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
				$id = $personnel_payment_date->id;
				$remaining_payment = $personnel_payment_date->remaining_payment - $payment_made;
				$payment_made_total = $personnel_payment_date->payment_made + $payment_made;
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
					$update = $this->personnel_payment_model->update(array("id"=>$id),$data);
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
					redirect(base_url("personnel_payments"));
				} else {
					$viewData = new stdClass();
					$item = $this->personnel_payment_model->get(
						array(
							"id"=>$id
						)
					);
					$user = get_active_user();
					if ($this->session->userdata("user")) {
						$where = array();
					}else if($this->session->userdata("institution_user")){
						$where = array(
							"institution_id" => $user->institution_id
						);
					}
					$viewData->personnels = $this->personnel_model->get_all(
						$where,"rank ASC"
					);
					$viewData->viewFolder = $this->viewFolder;
					$viewData->subViewFolder = "update";
					$viewData->form_error = true;
					$viewData->item = $item;
					$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
				}
			}else{
				$remaining_payment = $personnel->net_salary - $payment_made;
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
					$insert = $this->personnel_payment_model->add($data);
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
					redirect(base_url("personnel_payments"));
				} else {
					$viewData = new stdClass();
					$user = get_active_user();
					if ($this->session->userdata("user")) {
						$where = array();
					}else if($this->session->userdata("institution_user")){
						$where = array(
							"institution_id" => $user->institution_id
						);
					}
					$viewData->personnels = $this->personnel_model->get_all(
						$where,"rank ASC"
					);
					$viewData->viewFolder = $this->viewFolder;
					$viewData->subViewFolder = "add";
					$viewData->form_error = true;
					$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
				}
			}
		}else{
			$remaining_payment = $personnel->net_salary - $payment_made;
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
				$insert = $this->personnel_payment_model->add($data);
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
				redirect(base_url("personnel_payments"));
			} else {
				$viewData = new stdClass();
				$user = get_active_user();
				if ($this->session->userdata("user")) {
					$where = array();
				}else if($this->session->userdata("institution_user")){
					$where = array(
						"institution_id" => $user->institution_id
					);
				}
				$viewData->personnels = $this->personnel_model->get_all(
					$where,"rank ASC"
				);
				$viewData->viewFolder = $this->viewFolder;
				$viewData->subViewFolder = "add";
				$viewData->form_error = true;
				$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
			}
		}
	}
	public function update_form($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments"));
		}
		$user = get_active_user();
		$viewData = new stdClass();
		$item = $this->personnel_payment_model->get(
			array(
				"id"=>$id
			)
		);
		if ($this->session->userdata("user")) {
			$where = array();
			$where2 = array();
		}else if($this->session->userdata("institution_user")){
			$where = array(
				"institution_id" => $user->institution_id
			);
			$where2 = array(
				"id" => $user->institution_id
			);
		}
		$viewData->personnels = $this->personnel_model->get_all(
			$where,"personnel_name ASC"
		);
		$viewData->institutions = $this->institution_model->get_all(
			$where2,"title ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function update($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments"));
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
				"personnel_id" => $this->input->post("personnel_id"),
				"personnel_name" => $personnel->personnel_name,
				"institution_id" => $institution_id,
				"institution_name" => $institution_name,
				"payment_made" => $payment_made,
				"remaining_payment" => $remaining_payment,
				"date" => date("Y-m-d"),
				"description" => $this->input->post("description"),
			);
			$update = $this->personnel_payment_model->update(array("id"=>$id),$data);
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
			redirect(base_url("personnel_payments"));
		} else {
			$viewData = new stdClass();
			$item = $this->personnel_payment_model->get(
				array(
					"id"=>$id
				)
			);
			$user = get_active_user();
			if ($this->session->userdata("user")) {
				$where = array();
			}else if($this->session->userdata("institution_user")){
				$where = array(
					"institution_id" => $user->institution_id
				);
			}
			$viewData->personnels = $this->personnel_model->get_all(
				$where,"rank ASC"
			);
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $item;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}
	public function delete($id){
		if (!isAllowedDeleteModule()) {
			redirect(base_url("personnel_payments"));
		}
		$delete = $this->personnel_payment_model->delete(
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
		redirect(base_url("personnel_payments"));
	}
	public function isActiveSetter($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments"));
		}
		if ($id) {
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->personnel_payment_model->update(
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
			redirect(base_url("personnel_payments"));
		}
		$data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach ($items as $rank => $id) {
			$this->personnel_payment_model->update(
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
			redirect(base_url("personnel_payments"));
		}
		$viewData = new stdClass();
		$item = $this->personnel_payment_model->get(
			array(
				"id"=>$id
			)
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "document";
		$viewData->item = $item;
		$viewData->payment_control = "";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function permission_document_confirmation($id,$confirm){
		$update = $this->personnel_payment_model->update(array("id"=>$id),
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
		redirect(base_url("personnel_payments"));
	}
	public function payment_confirmation($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments"));
		}
		$viewData = new stdClass();
		$this->load->library("form_validation");
		//$this->form_validation->set_rules($id, "Çalıştığı Gün", "required|trim");
		//$this->form_validation->set_message(
		//	array(
		//		"required"  => "<b>{field}</b> alanı doldurulmalıdır"
		//	)
		//);
		//$validate = $this->form_validation->run();
		if (!$this->input->post("working_status")) {
			$payment_date = date("Y-m");
			$payment_date = $payment_date . "-01";
			$personnel_payment_date = $this->personnel_payment_model->get(
				array(
					"personnel_id" => $id,
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
				//$alert = array(
				//	"title" => "İşlem Başarısız Oldu!",
				//	"text" => "Bu Personele bu ay ödeme yaptınız!",
				//	"type" => "error"
				//);
				//$this->session->set_flashdata("alert",$alert);
				redirect(base_url("personnel_payments/institution_personnel_list/$personnel_payment_date->institution_id"));
			}else{
				$personnel = $this->personnel_model->get(
					array(
						"id" => $id
					)
				);
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
				$advance_payments = $this->advance_payment_model->get(
					array(
						"personnel_id" => $personnel->id,
						"isActive" => 1,
						"year_month" => $payment_date
					)
				);
				if (empty($advance_payments)) {
					$bank_payment = $this->input->post($id);
					$manuel_payment = $this->input->post("manuel_payment_".$id);
					$bes_payment = $this->input->post("bes_payment_".$id);
					$executive_payment = $this->input->post("executive_payment_".$id);
					$payment_made = floatval(floatval($bank_payment)+floatval($manuel_payment)+floatval($bes_payment)+floatval($executive_payment));
					//$working_day = $this->input->post($id);
					//$net_salary = floatval($personnel->net_salary); 
					//$daily_salary = $net_salary/30;
					//$payment_made = $daily_salary*$working_day;
					$institution_name = $personnel->institution_name;
					$institution_id = $personnel->institution_id;
					$advance_payment = 0;
				}else{
					$bank_payment = $this->input->post($id);
					$manuel_payment = $this->input->post("manuel_payment_".$id);
					$bes_payment = $this->input->post("bes_payment_".$id);
					$executive_payment = $this->input->post("executive_payment_".$id);
					$payment_made1 = floatval(floatval($bank_payment)+floatval($manuel_payment)+floatval($bes_payment)+floatval($executive_payment));
					//$working_day = $this->input->post($id);
					//$net_salary = floatval($personnel->net_salary); 
					//$daily_salary = $net_salary/30;
					//$payment_made1 = $daily_salary*$working_day;
					$payment_made = floatval($payment_made1-$advance_payments->payment_made);
					$institution_name = $personnel->institution_name;
					$institution_id = $personnel->institution_id;
					$advance_payment = $advance_payments->payment_made;
				}
				if ($payment_made > $personnel->net_salary) {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!.",
						"text" => "Personelin Hakediş Ödemesinden Fazla Ödeme Yapamazsınız! Girmiş Olduğunuz Maaşı Kontrol Ediniz!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel_payments"));
				}else if(!$this->input->post($id)){
					$alert = array(
						"title" => "İşlem Başarısız Oldu!.",
						"text" => "Personelin Alacağı Maaşı Girmediniz!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel_payments"));
				}else{
					$payment_date = date("Y-m");
					$payment_date = $payment_date . "-01";
					$data = array(
						"personnel_id" => $id,
						"personnel_name" => $personnel->personnel_name,
						"institution_id" => $institution_id,
						"institution_name" => $institution_name,
						"net_salary" => $personnel->net_salary,
						"receivable_amount" => floatval($payment_made),
						"bank_payment" => $bank_payment,
						"manuel_payment" => $manuel_payment,
						"bes_payment" => $bes_payment,
						"executive_payment" => $executive_payment,
						"advance_payment" => $advance_payments->payment_made,
						"payment_made" => 0,
						"remaining_payment" => 0,
						"date" => date("Y-m-d"),
						"year_month" => $payment_date,
						//"working_day" => $this->input->post($id),
						"isActive" => 4,
					);
					$save = $this->personnel_payment_model->add($data);
					$personnel_payment_date = $this->personnel_payment_model->get(
						array(
							"personnel_id" => $id,
							"year_month" => $payment_date
						)
					);
					if($save){
						$alert = array(
							"title" => "İşlem Başarılıyla Gerçekleşti.",
							"text" => "Ödeme kontrolüne gönderildi.",
							"type" => "success"
						);
					} else {
						$alert = array(
							"title" => "İşlem Başarısız Oldu!",
							"text" => "Ödeme sırasında bir problem oluştu!",
							"type" => "error"
						);
					}
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel_payments/institution_personnel_list/$personnel_payment_date->institution_id"));
				}
				
		//}
			}
		}else{
			$payment_date = date("Y-m");
			$payment_date = $payment_date . "-01";
			$personnel_payment_date = $this->personnel_payment_model->get(
				array(
					"personnel_id" => $id,
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
				//$alert = array(
				//	"title" => "İşlem Başarısız Oldu!",
				//	"text" => "Bu Personele bu ay ödeme yaptınız!",
				//	"type" => "error"
				//);
				//$this->session->set_flashdata("alert",$alert);
				redirect(base_url("personnel_payments/institution_personnel_list/$personnel_payment_date->institution_id"));
			}else{
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				$personnel = $this->personnel_model->get(
					array(
						"id" => $id
					)
				);
				$advance_payments = $this->advance_payment_model->get(
					array(
						"personnel_id" => $personnel->id,
						"isActive" => 1,
						"year_month" => $payment_date
					)
				);
				if (empty($advance_payments)) {
					$working_day = 0;
					$net_salary = floatval($personnel->net_salary); 
					$daily_salary = 0;
					$payment_made = 0;
					$institution_name = $personnel->institution_name;
					$institution_id = $personnel->institution_id;
					$advance_payment = 0;
				}else{
					$working_day = 0;
					$net_salary = floatval($personnel->net_salary); 
					$daily_salary = 0;
					$payment_made = 0-$advance_payments->payment_made;
					$institution_name = $personnel->institution_name;
					$institution_id = $personnel->institution_id;
					$advance_payment = $advance_payments->payment_made;					
				}
				$data = array(
					"personnel_id" => $id,
					"personnel_name" => $personnel->personnel_name,
					"institution_id" => $institution_id,
					"institution_name" => $institution_name,
					"net_salary" => $personnel->net_salary,
					"receivable_amount" => $payment_made,
					"advance_payment" => $advance_payments->payment_made,
					"payment_made" => 0,
					"remaining_payment" => 0,
					"description" => "Çalışmadı",
					"date" => date("Y-m-d"),
					"year_month" => $payment_date,
					"working_day" => 0,
					"isActive" => 4,
				);
				$save = $this->personnel_payment_model->add($data);
				$personnel_payment_date = $this->personnel_payment_model->get(
					array(
						"personnel_id" => $id,
						"year_month" => $payment_date
					)
				);
				if($save){
					$alert = array(
						"title" => "İşlem Başarılıyla Gerçekleşti.",
						"text" => "Ödeme başarılı bir şekilde gerçekleşti.",
						"type" => "success"
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Ödeme sırasında bir problem oluştu!",
						"type" => "error"
					);
				}
				$this->session->set_flashdata("alert",$alert);
				redirect(base_url("personnel_payments/institution_personnel_list/$personnel_payment_date->institution_id"));
			}
			//$user = get_active_user();
			//if ($this->session->userdata("user")) {
			//	$items = $this->personnel_model->get_all(
			//		array(
			//			"isActive" => 1
			//		),"id ASC"
			//	);
			//}else if($this->session->userdata("institution_user")){
			//	$institutions = $this->institution_model->get_all(
			//		array()
			//	);
			//	$item1 = array();
			//	$items = array();
			//	foreach ($institutions as $institution) {
			//		if (isAllowedViewInstitution($institution->id)) {
			//			$item1 = $this->personnel_model->get_all(
			//				array(
			//					"institution_id" => $institution->id,
			//					"isActive" => 1
			//				),"personnel_name ASC"
			//			);
			//		}
			//		if ($items == "") {
			//			$items = $item1;
			//		}else{
			//			$items = array_merge($items,$item1);
			//		}
			//	}
			//}
			//$alert = array(
			//	"title" => "İşlem Başarısız Oldu!",
			//	"text" => "Çalıştığı Gün Alanı Zorunludur!",
			//	"type" => "error"
			//);
			//$this->session->set_flashdata("alert",$alert);
			//$viewData->viewFolder = $this->viewFolder;
			//$viewData->subViewFolder = "list";
			//$viewData->items = $items;
			//$viewData->form_error = true;
			//$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function control_payment_confirmation($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments/payment_control"));
		}
		$viewData = new stdClass();
		$this->load->library("form_validation");
		$this->form_validation->set_rules($id, "Yapılacak Ödeme", "required|trim");
		$this->form_validation->set_message(
			array(
				"required"  => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		$validate = $this->form_validation->run();
		if ($validate) {
			$payment_date = date("Y-m");
			$payment_date = $payment_date . "-01";
			$personnel_payment_date = $this->personnel_payment_model->get(
				array(
					"personnel_id" => $id,
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
				//$alert = array(
				//	"title" => "İşlem Başarısız Oldu!",
				//	"text" => "Bu Personele bu ay ödeme yaptınız!",
				//	"type" => "error"
				//);
				//$this->session->set_flashdata("alert",$alert);
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				$personnel = $this->personnel_model->get(
					array(
						"id" => $this->input->post("personnel_id")
					)
				);
				$advance_payments = $this->advance_payment_model->get(
					array(
						"personnel_id" => $personnel->id,
						"isActive" => 1,
						"year_month" => $payment_date
					)
				);
				if (empty($advance_payments)) {
					//$payment_made = $this->input->post($id);
					$bank_payment = $this->input->post($id);
					$manuel_payment = $this->input->post("manuel_payment_".$id);
					$bes_payment = $this->input->post("bes_payment_".$id);
					$executive_payment = $this->input->post("executive_payment_".$id);
					$payment_made = floatval(floatval($bank_payment)+floatval($manuel_payment)+floatval($bes_payment)+floatval($executive_payment));
					//$working_day = $this->input->post($id);
					//$net_salary = floatval($personnel->net_salary); 
					//$daily_salary = $net_salary/30;
					//$payment_made = $daily_salary*$working_day;
					$advance_payment = 0;
				}else{
					//$payment_made = $this->input->post($id);
					$bank_payment = $this->input->post($id);
					$manuel_payment = $this->input->post("manuel_payment_".$id);
					$bes_payment = $this->input->post("bes_payment_".$id);
					$executive_payment = $this->input->post("executive_payment_".$id);
					$payment_made1 = floatval(floatval($bank_payment)+floatval($manuel_payment)+floatval($bes_payment)+floatval($executive_payment));
					//$working_day = $this->input->post($id);
					//$net_salary = floatval($personnel->net_salary); 
					//$daily_salary = $net_salary/30;
					//$payment_made1 = $daily_salary*$working_day;
					$payment_made = floatval($payment_made1-$advance_payments->payment_made);
					$advance_payment = $advance_payments->payment_made;
				}
				if ($payment_made > $personnel->net_salary) {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!.",
						"text" => "Personelin Hakediş Ödemesinden Fazla Ödeme Yapamazsınız! Girmiş Olduğunuz Maaşı Kontrol Ediniz!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel_payments/payment_control"));
				}else{
					$data = array(
						"receivable_amount" => floatval($payment_made),
						"bank_payment" => $bank_payment,
						"manuel_payment" => $manuel_payment,
						"bes_payment" => $bes_payment,
						"executive_payment" => $executive_payment,
						"payment_made" => 0,
						"remaining_payment" => 0,
						"advance_payment" => $advance_payments->payment_made,
						"date" => date("Y-m-d"),
						"year_month" => $payment_date,
						//"working_day" => $this->input->post($id),
						"isActive" => 2,
					);
					$update = $this->personnel_payment_model->update(array("id"=>$id),$data);
					if($update){
						$alert = array(
							"title" => "İşlem Başarılıyla Gerçekleşti.",
							"text" => "Ödeme başarılı bir şekilde gerçekleşti.",
							"type" => "success"
						);
					} else {
						$alert = array(
							"title" => "İşlem Başarısız Oldu!",
							"text" => "Ödeme sırasında bir problem oluştu!",
							"type" => "error"
						);
					}
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel_payments/payment_control"));
				}
			}else{
				//$personnel = $this->personnel_model->get(
				//	array(
				//		"id" => $id
				//	)
				//);
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
				//$working_day = $this->input->post($id);
				//$net_salary = floatval($personnel->net_salary); 
				//$daily_salary = $net_salary/30;
				//$payment_made = $daily_salary*$working_day;
				//$institution_name = $personnel->institution_name;
				//$institution_id = $personnel->institution_id;
		//}
				//$payment_date = date("Y-m");
				//$payment_date = $payment_date . "-01";
				//$data = array(
				//	"personnel_id" => $id,
				//	"personnel_name" => $personnel->personnel_name,
				//	"institution_id" => $institution_id,
				//	"institution_name" => $institution_name,
				//	"net_salary" => $personnel->net_salary,
				//	"receivable_amount" => $payment_made,
				//	"payment_made" => 0,
				//	"remaining_payment" => 0,
				//	"date" => date("Y-m-d"),
				//	"year_month" => $payment_date,
				//	"working_day" => $this->input->post($id),
				//	"isActive" => 2,
				//);
				//$save = $this->personnel_payment_model->add($data);
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				$personnel = $this->personnel_model->get(
					array(
						"id" => $this->input->post("personnel_id")
					)
				);
				$advance_payments = $this->advance_payment_model->get(
					array(
						"personnel_id" => $personnel->id,
						"isActive" => 1,
						"year_month" => $payment_date
					)
				);
				if (empty($advance_payments)) {
					//$payment_made = $this->input->post($id);
					$bank_payment = $this->input->post($id);
					$manuel_payment = $this->input->post("manuel_payment_".$id);
					$bes_payment = $this->input->post("bes_payment_".$id);
					$executive_payment = $this->input->post("executive_payment_".$id);
					$payment_made = floatval(floatval($bank_payment)+floatval($manuel_payment)+floatval($bes_payment)+floatval($executive_payment));
					//$working_day = $this->input->post($id);
					//$net_salary = floatval($personnel->net_salary); 
					//$daily_salary = $net_salary/30;
					//$payment_made = $daily_salary*$working_day;
					$advance_payment = 0;
				}else{
					//$payment_made = $this->input->post($id);
					$bank_payment = $this->input->post($id);
					$manuel_payment = $this->input->post("manuel_payment_".$id);
					$bes_payment = $this->input->post("bes_payment_".$id);
					$executive_payment = $this->input->post("executive_payment_".$id);
					$payment_made1 = floatval(floatval($bank_payment)+floatval($manuel_payment)+floatval($bes_payment)+floatval($executive_payment));
					//$working_day = $this->input->post($id);
					//$net_salary = floatval($personnel->net_salary); 
					//$daily_salary = $net_salary/30;
					//$payment_made1 = $daily_salary*$working_day;
					$payment_made = floatval($payment_made1-$advance_payments->payment_made);
					$advance_payment = $advance_payments->payment_made;
				}	
				if ($payment_made > $personnel->net_salary) {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!.",
						"text" => "Personelin Hakediş Ödemesinden Fazla Ödeme Yapamazsınız! Girmiş Olduğunuz Maaşı Kontrol Ediniz!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel_payments/payment_control"));
				}else{
					$data = array(
						"receivable_amount" => floatval($payment_made),
						"bank_payment" => $bank_payment,
						"manuel_payment" => $manuel_payment,
						"bes_payment" => $bes_payment,
						"executive_payment" => $executive_payment,
						"payment_made" => 0,
						"remaining_payment" => 0,
						"advance_payment" => $advance_payments->payment_made,
						"date" => date("Y-m-d"),
						"year_month" => $payment_date,
						//"working_day" => $this->input->post($id),
						"isActive" => 2,
					);
					$update = $this->personnel_payment_model->update(array("id"=>$id),$data);
					if($update){
						$alert = array(
							"title" => "İşlem Başarılıyla Gerçekleşti.",
							"text" => "Ödeme başarılı bir şekilde gerçekleşti.",
							"type" => "success"
						);
					} else {
						$alert = array(
							"title" => "İşlem Başarısız Oldu!",
							"text" => "Ödeme sırasında bir problem oluştu!",
							"type" => "error"
						);
					}
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("personnel_payments/payment_control"));
				}
			}
		}else{
			$user = get_active_user();
			if ($this->session->userdata("user")) {
				$items = $this->personnel_model->get_all(
					array(
						"isActive" => 1
					),"id ASC"
				);
				$institutions = $this->institution_model->get_all(
					array(),"title ASC"
				);
			}else if($this->session->userdata("institution_user")){
				$institutions = $this->institution_model->get_all(
					array(),"title ASC"
				);
				$item1 = array();
				$items = array();
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				foreach ($institutions as $institution) {
					if (isAllowedViewInstitution($institution->id)) {
						$item1 = $this->personnel_payment_model->get_all(
							array(
								"institution_id" => $institution->id,
								"isActive" => 4
							),"personnel_name ASC"
						);
						if ($items == "") {
							$items = $item1;
						}else{
							$items = array_merge($items,$item1);
						}
					}
				}
			}
			$alert = array(
				"title" => "İşlem Başarısız Oldu!",
				"text" => "Yapılacak Ödeme Alanı Zorunludur!",
				"type" => "error"
			);
			$this->session->set_flashdata("alert",$alert);
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "payment_control";
			$viewData->items = $items;
			$viewData->item = "";
			$viewData->form_error = true;
			$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function all_payment_confirmation(){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments"));
		}
		$user = get_active_user();
		$viewData = new stdClass();
		$payment_date = date("Y-m");
		$payment_date = $payment_date . "-01";
		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 1
				),"id ASC"
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
		foreach ($items as $item) {
			$personnel_payment_date = $this->personnel_payment_model->get(
				array(
					"personnel_id" => $item->id,
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
			//$alert = array(
			//	"title" => "İşlem Başarısız Oldu!",
			//	"text" => "Bu Personele bu ay ödeme yaptınız!",
			//	"type" => "error"
			//);
			//$this->session->set_flashdata("alert",$alert);
			//redirect(base_url("personnel_payments"));
			}else{
				$personnel = $this->personnel_model->get(
					array(
						"id" => $item->id
					)
				);
				$advance_payments = $this->advance_payment_model->get(
					array(
						"personnel_id" => $personnel->id,
						"isActive" => 1,
						"year_month" => $payment_date
					)
				);
				if (empty($advance_payments)) {
					$advance_payment = 0;
					$receivable_amount = $personnel->net_salary;
				}else{
					$receivable_amount = $personnel->net_salary-$advance_payments->payment_made;
					$advance_payment = $advance_payments->payment_made;					
				}
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
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				$data = array(
					"personnel_id" => $personnel->id,
					"personnel_name" => $personnel->personnel_name,
					"institution_id" => $institution_id,
					"institution_name" => $institution_name,
					"net_salary" => $personnel->net_salary,
					"receivable_amount" => $receivable_amount,
					"payment_made" => 0,
					"remaining_payment" => 0,
					"date" => date("Y-m-d"),
					"year_month" => $payment_date,
					"working_day" => 30,
					"isActive" => 4,
				);
				$save = $this->personnel_payment_model->add($data);
				if($save){
					$alert = array(
						"title" => "İşlem Başarılıyla Gerçekleşti.",
						"text" => "Ödeme kontrolüne gönderildi.",
						"type" => "success"
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Ödeme sırasında bir problem oluştu!",
						"type" => "error"
					);
				}
			}
		}
		$this->session->set_flashdata("alert",$alert);
		redirect(base_url("personnel_payments"));
	}
	public function control_all_payment_confirmation(){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments/payment_control"));
		}
		$user = get_active_user();
		$viewData = new stdClass();
		$payment_date = date("Y-m");
		$payment_date = $payment_date . "-01";
		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 1
				),"id ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions = $this->institution_model->get_all(
				array()
			);
			$item1 = array();
			$items = array();
			foreach ($institutions as $institution) {
				if (isAllowedViewInstitution($institution->id)) {
					$item1 = $this->personnel_payment_model->get_all(
						array(
							"institution_id" => $institution->id,
							"isActive" => 4,
							"year_month" => $payment_date
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
		foreach ($items as $item) {
			$personnel_payment_date = $this->personnel_payment_model->get(
				array(
					"personnel_id" => $item->personnel_id,
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
				$personnel = $this->personnel_model->get(
					array(
						"id" => $item->personnel_id
					)
				);
				$data = array(
					"isActive" => 2,
				);
				$update = $this->personnel_payment_model->update(array("id"=>$personnel_payment_date->id),$data);
				if($update){
					$alert = array(
						"title" => "İşlem Başarılıyla Gerçekleşti.",
						"text" => "Ödeme başarılı bir şekilde gerçekleşti.",
						"type" => "success"
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Ödeme sırasında bir problem oluştu!",
						"type" => "error"
					);
				}
			}else{
				$personnel = $this->personnel_model->get(
					array(
						"id" => $item->personnel_id
					)
				);
				$data = array(
					"isActive" => 2,
				);
				$update = $this->personnel_payment_model->update(array("id"=>$personnel_payment_date->id),$data);
				if($update){
					$alert = array(
						"title" => "İşlem Başarılıyla Gerçekleşti.",
						"text" => "Ödeme başarılı bir şekilde gerçekleşti.",
						"type" => "success"
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Ödeme sırasında bir problem oluştu!",
						"type" => "error"
					);
				}
			}
		}
		$this->session->set_flashdata("alert",$alert);
		redirect(base_url("personnel_payments/payment_control"));
	}
	public function institution_all_payment_confirmation($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments/institution_personnel_list/$id"));
		}
		$user = get_active_user();
		$viewData = new stdClass();
		$payment_date = date("Y-m");
		$payment_date = $payment_date . "-01";
		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 1,
					"institution_id" => $id
				),"id ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions = $this->institution_model->get_all(
				array()
			);
			$item1 = array();
			$items = array();
			//foreach ($institutions as $institution) {
			//	if (isAllowedViewInstitution($institution->id)) {
			//		$item1 = $this->personnel_model->get_all(
			//			array(
			//				"institution_id" => $institution->id,
			//				"isActive" => 1
			//			),"personnel_name ASC"
			//		);
			//	}
			//	if ($items == "") {
			//		$items = $item1;
			//	}else{
			//		$items = array_merge($items,$item1);
			//	}
			//}
			$items = $this->personnel_model->get_all(
				array(
					"institution_id" => $id,
					"isActive" => 1
				),"personnel_name ASC"
			);
		}
		foreach ($items as $item) {
			$personnel_payment_date = $this->personnel_payment_model->get(
				array(
					"personnel_id" => $item->id,
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
			//$alert = array(
			//	"title" => "İşlem Başarısız Oldu!",
			//	"text" => "Bu Personele bu ay ödeme yaptınız!",
			//	"type" => "error"
			//);
			//$this->session->set_flashdata("alert",$alert);
			//redirect(base_url("personnel_payments"));
			}else{
				$personnel = $this->personnel_model->get(
					array(
						"id" => $item->id
					)
				);
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
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				$data = array(
					"personnel_id" => $personnel->id,
					"personnel_name" => $personnel->personnel_name,
					"institution_id" => $institution_id,
					"institution_name" => $institution_name,
					"net_salary" => $personnel->net_salary,
					"receivable_amount" => $personnel->net_salary,
					"payment_made" => 0,
					"remaining_payment" => 0,
					"date" => date("Y-m-d"),
					"year_month" => $payment_date,
					"working_day" => 30,
					"isActive" => 4,
				);
				$save = $this->personnel_payment_model->add($data);
				if($save){
					$alert = array(
						"title" => "İşlem Başarılıyla Gerçekleşti.",
						"text" => "Ödeme başarılı bir şekilde gerçekleşti.",
						"type" => "success"
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Ödeme sırasında bir problem oluştu!",
						"type" => "error"
					);
				}
			}
		}
		$this->session->set_flashdata("alert",$alert);
		redirect(base_url("personnel_payments/institution_personnel_list/$id"));
	}
	public function control_institution_all_payment_confirmation($id){
		if (!isAllowedUpdateModule()) {
			redirect(base_url("personnel_payments/control_institution_personnel_list/$id"));
		}
		$user = get_active_user();
		$viewData = new stdClass();
		$payment_date = date("Y-m");
		$payment_date = $payment_date . "-01";
		if ($this->session->userdata("user")) {
			$items = $this->personnel_model->get_all(
				array(
					"isActive" => 1,
					"institution_id" => $id
				),"id ASC"
			);
		}else if($this->session->userdata("institution_user")){
			$institutions = $this->institution_model->get_all(
				array()
			);
			$item1 = array();
			$items = array();
			//foreach ($institutions as $institution) {
			//	if (isAllowedViewInstitution($institution->id)) {
			//		$item1 = $this->personnel_model->get_all(
			//			array(
			//				"institution_id" => $institution->id,
			//				"isActive" => 1
			//			),"personnel_name ASC"
			//		);
			//	}
			//	if ($items == "") {
			//		$items = $item1;
			//	}else{
			//		$items = array_merge($items,$item1);
			//	}
			//}
			$items = $this->personnel_model->get_all(
				array(
					"institution_id" => $id,
					"isActive" => 1
				),"personnel_name ASC"
			);
		}
		foreach ($items as $item) {
			$personnel_payment_date = $this->personnel_payment_model->get(
				array(
					"personnel_id" => $item->id,
					"year_month" => $payment_date
				)
			);
			if ($personnel_payment_date != "") {
			//$alert = array(
			//	"title" => "İşlem Başarısız Oldu!",
			//	"text" => "Bu Personele bu ay ödeme yaptınız!",
			//	"type" => "error"
			//);
			//$this->session->set_flashdata("alert",$alert);
			//redirect(base_url("personnel_payments"));
			}else{
				$personnel = $this->personnel_model->get(
					array(
						"id" => $item->id
					)
				);
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
				$payment_date = date("Y-m");
				$payment_date = $payment_date . "-01";
				$data = array(
					"personnel_id" => $personnel->id,
					"personnel_name" => $personnel->personnel_name,
					"institution_id" => $institution_id,
					"institution_name" => $institution_name,
					"net_salary" => $personnel->net_salary,
					"receivable_amount" => $personnel->net_salary,
					"payment_made" => 0,
					"remaining_payment" => 0,
					"date" => date("Y-m-d"),
					"year_month" => $payment_date,
					"working_day" => 30,
					"isActive" => 2,
				);
				$save = $this->personnel_payment_model->add($data);
				if($save){
					$alert = array(
						"title" => "İşlem Başarılıyla Gerçekleşti.",
						"text" => "Ödeme başarılı bir şekilde gerçekleşti.",
						"type" => "success"
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız Oldu!",
						"text" => "Ödeme sırasında bir problem oluştu!",
						"type" => "error"
					);
				}
			}
		}
		$this->session->set_flashdata("alert",$alert);
		redirect(base_url("personnel_payments/control_institution_personnel_list/$id"));
	}
	public function payment_bulk_deletion(){
		if (!isAllowedDeleteModule()) {
			redirect(base_url("personnel_payments"));
		}
		$personnelID = $this->input->post("personnelID");
		//$personnelIDdata =implode(",",$personnelID); 
		foreach ($personnelID as $personnelIDdata) {
			$delete = $this->personnel_payment_model->delete(
				array(
					"personnel_id" => $personnelIDdata
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
}
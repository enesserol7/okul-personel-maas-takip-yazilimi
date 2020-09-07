<?php
class Userop extends CI_Controller {
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "users_v";
        $this->load->model("user_model");
        $this->load->model("institution_user_model");
    }
    public function login(){
        if(get_active_user()){
            redirect(base_url());
        }
        $viewData = new stdClass();
        $this->load->library("form_validation");
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function do_login(){
        if(get_active_user()){
            redirect(base_url());
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("user_email", "Kullanıcı Adı", "required|trim");
        $this->form_validation->set_rules("user_password", "Şifre", "required|trim|min_length[8]|max_length[16]");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır!",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz!",
                "min_length" => "{field} en az 8 karakterden oluşmalıdır!",
                "max_length" => "{field} en fazla 16 karakterden oluşmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if ($validate == FALSE) {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }else{
            $user = $this->user_model->get(
                array(
                    "email" => $this->input->post("user_email"),
                    "password" => md5($this->input->post("user_password")),
                    "isActive" => 1
                )
            );
            if ($user) {
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "$user->full_name Hoşgeldiniz...",
                    "type" => "success"
                );
                $this->session->set_userdata("user",$user);
                setUserRoles();
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url());
            }else{
                $user = $this->institution_user_model->get(
                    array(
                        "email" => $this->input->post("user_email"),
                        "password" => md5($this->input->post("user_password")),
                        "isActive" => 1
                    )
                );
                if ($user) {
                    $alert = array(
                        "title" => "İşlem Başarılıyla Gerçekleşti.",
                        "text" => "$user->full_name Hoşgeldiniz...",
                        "type" => "success"
                    );
                    $this->session->set_userdata("institution_user",$user);
                    setInstitutionUserRoles();
                    setInstitutionUserPermissions();
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url());
                }else{
                  $alert = array(
                    "title" => "İşlem Başarısız!.",
                    "text" => "Lütfen giriş bilgilerinizi kontrol ediniz!",
                    "type" => "error"
                );
                  $this->session->set_flashdata("alert",$alert);
                  redirect(base_url("login"));
              }
          }
      }
  }
  public function logout(){
   $this->session->unset_userdata("user");
   $this->session->unset_userdata("institution_user");
   $this->session->unset_userdata("user_roles");
   $this->session->unset_userdata("institution_user_roles");
   redirect(base_url("login"));
}
public function forget_password(){
    if(get_active_user()){
        redirect(base_url());
    }
    $viewData = new stdClass();
    $this->load->library("form_validation");
    $viewData->viewFolder = $this->viewFolder;
    $viewData->subViewFolder = "forget_password";
    $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
}
public function reset_password(){
    $this->load->library("form_validation");
    $this->form_validation->set_rules("email", "E-Posta", "required|trim|valid_email");
    $this->form_validation->set_message(
        array(
            "required"  => "<b>{field}</b> alanı doldurulmalıdır!",
            "valid_email" => "Lütfen geçerli bir <b>e-posta</b> adresi giriniz!"
        )
    );
    if ($this->form_validation->run() === FALSE) {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";
        $viewData->form_error = true;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }else{
        $user = $this->user_model->get(
            array(
                "isActive" => 1,
                "email" => $this->input->post("email")
            )
        );
        $institution_user = $this->institution_user_model->get(
            array(
                "isActive" => 1,
                "email" => $this->input->post("email")
            )
        );
        if ($user || $institution_user) {
            if ($user) {
                $this->load->helper("string");
                $temp_password = random_string();
                $send = send_email_2($user->email,"Şifremi unuttum","Personel Takip Sistemine'e geçiçi olarak <b>{$temp_password}</b> şifresiyle giriş yapabilirsiniz!");
                if ($send) {
                    echo "E-Posta başarılı bir şekilde gönderildi...";
                    $this->user_model->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password" => md5($temp_password)
                        )
                    );
                    $alert = array(
                        "title" => "İşlem Başarılıyla Gerçekleşti...",
                        "text" => "Şifreniz başarılı bir şekilde resetlendi. Lütfen E-Postanızı kontrol ediniz...",
                        "type" => "success"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("login"));
                }else{
                        //echo $this->email->print_debugger();
                    $alert = array(
                        "title" => "İşlem Başarısız!.",
                        "text" => "E-Posta gönderilirken bir hata oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("sifremi-unuttum"));
                    die();
                }
            }else if ($institution_user) {
                $this->load->helper("string");
                $temp_password = random_string();
                $send = send_email_2($institution_user->email,"Şifremi unuttum","Personel Takip Sistemine'e geçiçi olarak <b>{$temp_password}</b> şifresiyle giriş yapabilirsiniz!");
                if ($send) {
                    echo "E-Posta başarılı bir şekilde gönderildi...";
                    $this->institution_user_model->update(
                        array(
                            "id" => $institution_user->id
                        ),
                        array(
                            "password" => md5($temp_password)
                        )
                    );
                    $alert = array(
                        "title" => "İşlem Başarılıyla Gerçekleşti...",
                        "text" => "Şifreniz başarılı bir şekilde resetlendi. Lütfen E-Postanızı kontrol ediniz...",
                        "type" => "success"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("login"));
                }else{
                        //echo $this->email->print_debugger();
                    $alert = array(
                        "title" => "İşlem Başarısız!.",
                        "text" => "E-Posta gönderilirken bir hata oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("sifremi-unuttum"));
                    die();
                }
            }
        }else{
            $alert = array(
                "title" => "İşlem Başarısız!.",
                "text" => "Böyle bir kullanıcı bulunamadı!",
                "type" => "error"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("sifremi-unuttum"));
        }
    }
}
}
?>
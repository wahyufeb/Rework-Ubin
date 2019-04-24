<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Registration');
    }
    

    public function index(){
        // Captha pending dulu
        // if($this->input->post('submit')){
        //     $inputCaptcha   = $this->input->post('captcha');
        //     $sessCaptcha    = $this->session->userdata('captchaCode');

        //     if($inputCaptcha === $sessCaptcha){
        //         echo "Captcha Success";
        //     }else{
        //         echo "Captcha code does no match";
        //     }
        // }
        // $vals = array(  'img_url' => base_url().'captcha/',
        //                 'img_path' => 'captcha/',
        //                 'img_height' => 40,
        //                 'word_length' => 8,
        //                 'img_width' => '120',
        //                 'font_size' => 15
        //             );
        // $captcha = create_captcha($vals);


        // $this->session->unset_userdata('captchaCode');
        // $this->session->set_userdata('captchaCode', $captcha['word']);
        // $data['captchaImg'] = $captcha['image'];
        // $this->load->view('account/registration', $data);
        $this->load->view('account/registration');
    }

    // Capatha pending dulu
    // public function refresh(){
    //     $vals = array(  
    //         'img_url' => base_url().'captcha/',
    //         'img_path' => 'captcha/',
    //         'img_height' => 40,
    //         'word_length' => 8,
    //         'img_width' => '120',
    //         'font_size' => 15
    //     );
    // $captcha = create_captcha($vals);


    // $this->session->unset_userdata('captchaCode');
    // $this->session->set_userdata('captchaCode', $captcha['word']);
    // echo $captcha['image'];
    // }

    function sign_up(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', [
            'is_unique' => 'This email has been registered'
        ]);
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[conf_password]', [
            'min_length' => 'Password too short',
            'matches' => 'Password dont match'
        ]);
        $this->form_validation->set_rules('conf_password', 'Confirmation Password', 'required|trim|matches[password]');
        // $this->form_validation->set_rules('captcha', 'Captcha', 'required'); 
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->session->set_flashdata('flash', 'sukses');
            $email      = $this->input->post('email');
            $first_name = $this->input->post('first_name');
            $last_name  = $this->input->post('last_name');
            $password   = $this->input->post('password');
            


            $name = $first_name.' '.$last_name;
            $level = "member";
            $photo = "user.svg";
            $join_since = date('Y-m-d');
            
            $data = array(  'email' => htmlspecialchars($email),
                            'name' => htmlspecialchars($name),
                            'photo' => $photo,
                            'password' => password_hash($password, PASSWORD_DEFAULT),
                            'join_since' => $join_since,
                            'level' => $level,
                            'active' => 0
                        );
            $id = $this->M_Registration->add_account($data);
            //print_r($id);
            //enkripsi id
            $enkripsi_id = md5($id);


            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user'] = "cubinwebsite@gmail.com";
            $config['smtp_pass'] = "wahyu23022002";
            $config['crlf']="\r\n"; 
            $config['newline']="\r\n"; 
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("Verifikasi Akun");
            $this->email->message('Terimakasih telah melakukan Registrasi, untuk verifikasi akun silahkan klik <a href="http://localhost/rework/Registration/verification/'. $enkripsi_id .'">disini</a>
                ');
            
            if($this->email->send()){
                echo "Berhasil melakukan registrasi, silahkan cek email kamu";
            }else{
                echo "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email, silahkan masukan email yang valid";
            }
        }        
    }

    function verification($key){
        $this->M_Registration->verificationKey($key);
        $this->session->set_flashdata('flash', 'verifikasi');
        redirect('Login/index');
    }

}

/* End of file Registration.php */

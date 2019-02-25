<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    
    public function __construct()
    {
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
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conf_password', 'Confirmation Password', 'required|matches[password]');
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
            
            $data = array(  'email' => htmlspecialchars($email),
                            'name' => htmlspecialchars($name),
                            'photo' => $photo,
                            'password' => md5($password),
                            'level' => $level
                        );
            $this->M_Registration->add_account($data);
            redirect('Login/index');
        }
        
        
        
        
        
        
    }

}

/* End of file Registration.php */

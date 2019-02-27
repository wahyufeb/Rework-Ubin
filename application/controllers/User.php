<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != "member"){
            redirect('Login');
        }
        $this->load->library('Template');
        $this->load->model('M_User');
    }
    
    public function index(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data['user'] = $this->M_User->getUser($where, 'users');
        $this->template->user('user/home', $data);
    }

    // Profile
    function profile(){
        $id = $this->session->userdata('id_user');

        // id user, to add the model
        $where = array('id_user' => $id);

        // get user based id user
        $data['user'] = $this->M_User->getUser($where, 'users');
        $this->template->user('user/profile', $data);
    }

    // Shopping cart
    function shopping_cart(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data['user'] = $this->M_User->getUser($where, 'users');
        $this->template->user('user/shopping_cart', $data);
    }

    // Payment
    function payment(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data['user'] = $this->M_User->getUser($where, 'users');
        $this->template->user('user/payment', $data);

    }

    // Donation 
    function donation(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data['user'] = $this->M_User->getUser($where, 'users');
        $this->template->user('user/donation', $data);
    }

    // Payment
    function setting(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data['user'] = $this->M_User->getUser($where, 'users');
        $this->template->user('user/setting', $data);

    }

    // Logout   
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());   
    }



    // REQUEST
      function proses_upload(){
        $id = $this->session->userdata('id_user');
        $config['upload_path']   = FCPATH.'/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
            $this->load->model('M_User');
        	$token  =   $this->input->post('token_foto');
            $name   =   $this->upload->data('file_name');
            $data  = array('photo' => $name,
                            'token' => $token
            );
            $this->M_User->upload($id, $data, 'users');        
            // id user, to add the model
            $where = array('id_user' => $id);
    
            // get user based id user
            $data['user'] = $this->M_User->getUser($where, 'users');
        }
    }

    	//Untuk menghapus foto
	function remove_photo(){
        $id = $this->session->userdata('id_user');
		//Ambil token foto
        $tokenDefault  =    $this->input->post('token');
        $token         =    array('token'=>$tokenDefault);
		$photo         =    $this->M_User->get_where('users', $token);


		if($photo->num_rows()>0){
			$result      =   $photo->row();
            $photoname   =   $result->photo;
            
			if(file_exists($file=FCPATH.'/uploads/'.$photoname)){
				unlink($file);
            }
            $data = array(  'token' => '',
                            'photo' => '');
            $this->M_User->updateFile('users', $id, $data);
		}
		echo "{}";
    }

    // ajax geUser
    // function getuser(){
    //     $id = $this->session->userdata('id_user');
    //     $where = array ('id_user' => $id);
    //     $result = $this->M_User->getUserajax('users', $where)->result();
    //     echo json_encode($result);
    // } 
    
    function profile_update(){
        $id = $this->session->userdata('id_user');

        $email      = $this->input->post('email');
        $name       = $this->input->post('name');
        $province   = $this->input->post('province');
        $city       = $this->input->post('city');
        $street     = $this->input->post('street');
        $telephone  = $this->input->post('telephone');

        $where = array ('id_user' => $id);
        $data = array ('email' => $email,
                        'name' => $name,
                        'province' => $province,
                        'city' => $city,
                        'street' => $street,
                        'telephone' => $telephone
                    );
        $this->M_User->update_profile($data, $where, 'users');
        $this->session->set_flashdata('mess', 'success');
        redirect('User/profile');
    }

    function delete_photo(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data = array('photo' => '',
                        'token' => ''
                    );
        $user = $this->M_User->getUserId($where, 'users');
        if($user->num_rows() > 0){
            $result = $user->row();
            $photo = $result->photo;

            if(file_exists($file=FCPATH.'/uploads/'.$photo)){
				unlink($file);
            }
            $this->M_User->deletePhoto($where, $data, 'users');   
            redirect('User/profile');     
        }
    }
    

    
    

}

/* End of file User.php */

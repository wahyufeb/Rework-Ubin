<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != "member"){
            redirect('Login');
        }
        $this->load->library('Template');
        $this->load->library('email');
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

    // Comments
    // function comment(){
    //     $id = $this->session->userdata('id_user');

    //     // id user, to add the model
    //     $where = array('id_user' => $id);

    //     // get user based id user
    //     $data['user'] = $this->M_User->getUser($where, 'users');
    //     $this->template->user('user/comment', $data);
    // }

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

        $data['orders'] = '';
        // get user
        $user = $this->M_User->getUserId($where, 'users');
        if($user->num_rows() > 0){
            $result = $user->row();
            // $id_invoice = $result->id_invoice;
            // $id_cost   = $result->id_cost;
            $key = $result->id_user;
        }
        // $data['order']   = $this->M_User->getUserId($where, 'orders')->result_array();
        // $data['invoice'] = $this->M_User->getUserId($where, 'invoices')->result_array();
        // $data['cost']    = $this->M_User->getUserId($where, 'costs')->result_array();

        $whereId = array('orders.id_user' => $key);

        // get user login
        $data['user'] = $this->M_User->getUser($where, 'users');

        // get orders history
        $data['orders'] = $this->M_User->paymentHistory($whereId);
        $this->session->set_flashdata('base', 'base payment');
        $this->template->user('user/payment', $data);

    }

    function getPayment(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);

        // get user
        $user = $this->M_User->getUserId($where, 'users');
        if($user->num_rows() > 0){
            $result = $user->row();
            $email = $result->email;
            $key = $result->id_user;
            $name = $result->name;

        }


        $whereId = array('orders.id_user' => $key);

        // get orders history
        $orders = $this->M_User->paymentHistory($whereId);
        foreach($orders as $row){
            $x = $row['total'];
        }

        // Konfigurasi email
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
        $this->email->from($config['smtp_user'], 'CUBIN Website');
        $this->email->to($email);
        $this->email->subject("Pembayaran");
        $this->email->message('<h1>Hallo, '. $name .'</h1>
        <center>
            <img src="https://image.freepik.com/free-vector/variety-payment-methods_23-2147692637.jpg" width="400" style="margin-bottom:40px;">
        </center>
        </table>
        <p style="font-size:15px;">Terimakasih '. $name .', telah memesan produk dari website kami <a href="cubin.com">cubin.com</a> Total yang harus dibayar <b> Rp.'. number_format($x, 0,',','.').'</b> Untuk metode pembayaran kami menggunakan metode Transfer Bank, berikut daftar Nomor Rekening Kami:</p>
        <ul>
            <li>BCA     : 13912738721167</li>
            <li>BRI     : 13912738236167</li>
            <li>Mandiri : 13721632716423</li>
            <li>BNI     : 82367216327167</li>
        </ul>
        <p>Untuk Expired Pembayaran dimulai dari 2 hari setelah order atau cek di <a href="http://localhost/rework/User/payment">Expired Pembayaran</a></p>
        ');

        if ($this->email->send()) {
            $this->session->set_flashdata('payment', 'Cek email Anda untuk info pembayaran');
            redirect('User/payment');
            
        } else {
            show_error($this->email->print_debugger());
        }
    }

    // Transaction 
    function transaction(){
        $id = $this->session->userdata('id_user');
        $email = $this->session->userdata('email');
        $where = array('id_user' => $id);
        // $whereE = array('email' => $email);
        $data['user'] = $this->M_User->getUser($where, 'users');

        // $data['transaction'] = $this->M_User->transaction($whereE);
        $this->template->user('user/transaction', $data);
    }

    function getTransaction(){
        $where  = array('id_user' => $this->input->post('id_user'));
        $key    = $this->input->post('key');
        $transaction = $this->M_User->transaction($where, $key);
        echo json_encode($transaction);
    }

    function getCode(){
        $where = array('transaction_code' => $this->input->post('code'));
        $result = $this->M_User->getCode($where);
        echo json_encode($result);
    }

    // // Payment
    // function setting(){
    //     $id = $this->session->userdata('id_user');
    //     $where = array('id_user' => $id);
    //     $data['user'] = $this->M_User->getUser($where, 'users');
    //     $this->template->user('user/setting', $data);

    // }

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

        $name       = $this->input->post('name');
        $province   = $this->input->post('province');
        $city       = $this->input->post('city');
        $street     = $this->input->post('street');
        $telephone  = $this->input->post('telephone');

        $where = array ('id_user' => $id);
        $data = array ('name' => $name,
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

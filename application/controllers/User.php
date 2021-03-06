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
    function coba(){
        $where = array('id_user' => $this->session->userdata('id_user'));
        $getUser = $this->M_User->getUser($where, 'invoices');
        $start  = date($getUser[0]->date);
        $exp    = date($getUser[0]->due_date);

        if($start >= $exp){
            echo "expired";
        }else{
            echo "masih jangka waktu";
        }
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
            $x = $row['total_payment'];
        }

        // get tranaction_code
        $transaction = $this->M_User->codeTransaction($where);
        foreach ($transaction as $row){
            $code = $row['transaction_code'];
        }
        // Konfigurasi email
        $this->load->library('email');
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "shopcubeen@gmail.com";
        $config['smtp_pass'] = "wahyufebrianto23022002";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $ci->email->initialize($config);

        
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
        <p> Kode Transaksi '.$name.'</p>
        <h5>'.$code.'</h5><br>
        <p style="font-size:15px;">Terimakasih '. $name .', telah memesan produk dari website kami <a href="cubin.com">cubin.com</a> Total yang harus dibayar <b> Rp.'. number_format($x, 0,',','.').'</b> Untuk metode pembayaran kami menggunakan metode Transfer Bank, berikut daftar Nomor Rekening Kami:</p>
        <ul>
            <li>BCA     : 13912738721167</li>
            <li>BRI     : 13912738236167</li>
            <li>Mandiri : 13721632716423</li>
            <li>BNI     : 82367216327167</li>
        </ul>
        <p>Tranfer ke No Rekening di atas, dengan format atas nama "CUBIN WEBSITE" dan masukan kode transaksi di sampingnya</p><br>
        <p>Contoh : </p>
        <p>Atas Nama : CUBIN WEBSITE GGX06MB3W9 </p>
        <p>Rek. No.  : 13912738721167</p><br>
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
        // $key    = $this->input->post('key');
        $transaction = $this->M_User->transaction($where);
        echo json_encode($transaction);
    }

    function getCode(){
        $where = array('transaction_code' => $this->input->post('code'));
        $result = $this->M_User->getCode($where);
        echo json_encode($result);
    }

    function uploadTransaction_image(){
        $id = $this->session->userdata('id_user');

        $config['upload_path']          = './assets/transaction/image';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $img = $data['upload_data']['file_name'];
            
            //  transaction table
            $where  = array('id_user' => $id);
            $data   = array('transaction_image' => $img);

            // invoice table
            $updateInv = array('status' => 'confirmation process');

            $this->M_User->uploadTransactionImage($where, $data);
            $this->M_User->confirmTransaction($where, $updateInv);
            redirect('User/transaction');
        }
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
        $data = array ('name' => htmlspecialchars($name),
                        'province' => htmlspecialchars($province),
                        'city' => htmlspecialchars($city),
                        'street' => htmlspecialchars($street),
                        'telephone' => htmlspecialchars($telephone)
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

    function deleteImg(){
        $id             =    array('id_user'=>$this->session->userdata('id_user'));
        $photo         =    $this->M_User->get_where('users', $id);


        if($photo->num_rows()>0){
            $result      =   $photo->row();
            $photoname   =   $result->photo;
            
            if($photoname == "user.svg"){
                echo "USER SVG";
            }else{
                if(file_exists($file=FCPATH.'/uploads/'.$photoname)){
                    unlink($file);
                }
            }
        }
        echo "{}";
    }

    

    
    

}

/* End of file User.php */

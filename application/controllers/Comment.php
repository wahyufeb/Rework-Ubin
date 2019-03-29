<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != "member"){
            redirect('Login');
        }
        $this->load->library('Template');
        $this->load->model('M_User');
        $this->load->model('M_Comment');
    }
    
    public function index(){
        $id = $this->session->userdata('id_user');

        // id user, to add the model
        $where = array('id_user' => $id);

        // get user based id user
        $data['user'] = $this->M_User->getUser($where, 'users');
        $this->template->user('user/comment', $data);
    }
    
    function addComment(){
        
        // id user
        $id = $this->session->userdata('id_user');;
        $name  = $user->name;

        // time zone Indonesia
        $timeZone = new DateTimeZone('Asia/Jakarta');
        $date     = new DateTime();
        $date->setTimeZone($timeZone);

        $idProduct = $this->input->post('idproduct');

        $data = array(
            'id_user' => $id,
            'id_product' => $idProduct,
            'comment' => htmlspecialchars($this->input->post('comment')),
            'date_created' => $date->format('d-M-Y')
        );
        

        $this->M_Comment->addComment($data, 'testimonials');
        redirect('Ubin/product/'.$idProduct.'/#comment');
    }   

    function deleteComment($id, $idProduct){
        $this->M_Comment->delete($id);
        redirect('Ubin/product/'.$idProduct.'/#comment');
    }

    //  Get Comment Id
    function getCommentId(){
        $where = array('id_comment' => $this->input->post('id_comment'));
        $getComment  = $this->M_Comment->getComment($where);
        echo json_encode($getComment);
    }

    // Update Comment
    function updateComment(){
        // time zone Indonesia
        $timeZone = new DateTimeZone('Asia/Jakarta');
        $date     = new DateTime();
        $date->setTimeZone($timeZone);

        $where = array('id_comment' => $this->input->post('idcomment'));
        $data = array('comment' => $this->input->post('comment'),
                        'date_created' => $date->format('d-M-Y')
        );

        $idProduct = $this->input->post('idproduct');

        $this->M_Comment->updateComment($where, $data);
        redirect('Ubin/product/'.$idProduct.'/#comment');
    }

}

/* End of file Comment.php */

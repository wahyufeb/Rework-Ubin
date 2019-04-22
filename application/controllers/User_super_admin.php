<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_super_admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        if($this->session->userdata('level') != "super_admin"){
            redirect('Login');
        }
        $this->load->library('Template');
        
        // load model
        $this->load->model('M_Admin');
        $this->load->model('M_Super');
    }
    
    public function index(){
        // Total Sales
        $data['salesTotal'] = $this->M_Admin->totalSales();

        // Total products sold
        $data['soldout'] = $this->M_Admin->sold();

        // Total Orders
        $data['totalorders'] = $this->M_Admin->totalOrd();

        // Total Users
        $data['totalusers']  = $this->M_Admin->totalUsers();
        $this->template->super('super_admin/home', $data);
    }
    
// PRODUCTS
    function products(){
        // Total products sold
        $data['soldout'] = $this->M_Admin->sold();
        
        // Total Product
        $data['totalproducts'] = $this->M_Super->totalPro();
        
        $data['allproducts'] = $this->M_Admin->allProducts();
        $this->template->super('super_admin/products', $data);
    }
    function productsxls(){
        $data['filename'] = $this->input->post('filename');
        // Set Time
        date_default_timezone_set('Asia/Jakarta');
        $data['datereport'] = date('d-m-Y');
        // Total products sold
        $data['soldout'] = $this->M_Admin->sold();

        // Total Product
        $data['totalproducts'] = $this->M_Super->totalPro();

        // Products
        $data['products'] = $this->M_Admin->allProducts();
        $data['tittle'] = "REPORT DATA PRODUCTS";
        $this->load->view('super_admin/products_xls', $data);
        
    }
    public function printProduct(){
        // Set Time
        date_default_timezone_set('Asia/Jakarta');
        $dateReport = date('d-m-Y');
        // Total products sold
        $data['soldout'] = $this->M_Admin->sold();

        // Total Product
        $data['totalproducts'] = $this->M_Super->totalPro();
        $filename       = $this->input->post('filename');
        $setSize        = $this->input->post('setsize');
        $setOrientation = $this->input->post('setorientation');

        def("DOMPDF_ENABLE_REMOTE", false);
        $dompdf = new Dompdf();
        $data['tittle']   = "REPORT DATA PRODUCTS";
        $data['products'] = $this->M_Admin->allProducts();
        $html = $this->load->view('super_admin/products_print', $data, true);
    
        $dompdf->load_html($html);
    
        $dompdf->set_paper($setSize, $setOrientation);
    
        $dompdf->render();
    
        $pdf = $dompdf->output();
        $dompdf->stream($filename.'_'.$dateReport.'.pdf', array("Attachment" => false));
    }

//  USERS
    function users(){        
        // Total Users
        $data['totalusers']  = $this->M_Admin->totalUsers();
        // Total Admin
        $data['totaladmin'] = $this->M_Super->totaladmin();

        // Admins
        $data['alladmin'] = $this->M_Super->alladmin();
        // Users
        $data['users'] = $this->M_Admin->allAccounts();
        $this->template->super('super_admin/users', $data);
    }
    function usersxls(){        
        $data['filename'] = $this->input->post('filename');
        // Set Time
        date_default_timezone_set('Asia/Jakarta');
        $data['datereport'] = date('d-m-Y');
        
        // Total Users
        $data['totalusers']  = $this->M_Admin->totalUsers();

        // Users
        $data['users'] = $this->M_Admin->allAccounts();
        $data['tittle'] = "REPORT DATA USERS";
        $this->load->view('super_admin/users_xls', $data);
        
    }
    public function printUsers(){
        // Set Time
        date_default_timezone_set('Asia/Jakarta');
        $dateReport = date('d-m-Y');
        // Total Users
        $data['totalusers']  = $this->M_Admin->totalUsers();

        $filename       = $this->input->post('filename');
        $setSize        = $this->input->post('setsize');
        $setOrientation = $this->input->post('setorientation');

        def("DOMPDF_ENABLE_REMOTE", false);
        $dompdf = new Dompdf();
        $data['tittle']   = "REPORT DATA USERS";
        // Users
        $data['users'] = $this->M_Admin->allAccounts();
        $html = $this->load->view('super_admin/users_print', $data, true);
    
        $dompdf->load_html($html);
    
        $dompdf->set_paper($setSize, $setOrientation);
    
        $dompdf->render();
    
        $pdf = $dompdf->output();
        $dompdf->stream($filename.'_'.$dateReport.'.pdf', array("Attachment" => false));
    }

// ORDERS
    function orders(){
        // Total Orders
        $data['totalorders'] = $this->M_Admin->totalOrd();
        // Total products sold
        $data['soldout'] = $this->M_Admin->sold();
        $data['orders'] = $this->M_Super->allOrders()->result();
        $this->template->super('super_admin/orders', $data);
    }
    function ordersxls(){ 
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        if($start !="" AND  $end !=""){
            $start = $this->input->post('start');
            $end = $this->input->post('end');
            
            $data['filename'] = $this->input->post('filename');
            // Set Time
            date_default_timezone_set('Asia/Jakarta');
            $data['datereport'] = date('d-m-Y');
            
            $data['orders'] = $this->M_Super->searchDate($start, $end);           
            $data['tittle'] = "REPORT DATA ORDERS";
            
            // Total Orders
            $data['totalorders'] = $this->M_Admin->totalOrd();
            // Total products sold
            $data['soldout'] = $this->M_Admin->sold();
            $this->load->view('super_admin/orders_xls', $data);
            
        }else{ 
            $data['filename'] = $this->input->post('filename');
            // Set Time
            date_default_timezone_set('Asia/Jakarta');
            $data['datereport'] = date('d-m-Y');

            $data['orders'] = $this->M_Super->allOrders();
            $data['tittle'] = "REPORT DATA ORDERS";
            
            // Total Orders
            $data['totalorders'] = $this->M_Admin->totalOrd();
            // Total products sold
            $data['soldout'] = $this->M_Admin->sold();
            $this->load->view('super_admin/orders_xls', $data);
        }
        
    }
    function ajaxOrders(){
        $orders = $this->M_Super->allOrders()->result_array();;
        echo json_encode($orders);
    }
    function searchOrders(){
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $orders = $this->M_Super->searchOrders($start, $end);
        echo json_encode($orders);
    }

// TRANSACTION
    function transaction(){
        $data['transaction'] = $this->M_Admin->orders();
        // Total Transaction
        $data['totaltrans'] = $this->M_Super->totalTrans();

        // Total Payment
        $data['totalPay'] = $this->M_Super->totalPayment();
        $this->template->super('super_admin/transaction', $data);
    }

    function ajaxTransaction(){
        $transaction = $this->M_Admin->orders();
        echo json_encode($transaction);
    }

    function searchTransaction(){
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $orders = $this->M_Super->searchTransaction($start, $end);
        echo json_encode($orders);
    }

    function transactionxls(){ 
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        if($start !="" AND  $end !=""){
            $start = $this->input->post('start');
            $end = $this->input->post('end');
            
            $data['filename'] = $this->input->post('filename');
            // Set Time
            date_default_timezone_set('Asia/Jakarta');
            $data['datereport'] = date('d-m-Y');

            $data['transaction'] = $this->M_Super->searchTransaction($start, $end);           
            $data['tittle'] = "REPORT DATA TRANSACTION";
            
            // Total Transaction
            $data['totaltrans'] = $this->M_Super->totalTrans();

            // Total Payment
            $data['totalPay'] = $this->M_Super->totalPayment();
            $this->load->view('super_admin/transaction_xls', $data);
            
        }else{ 
            $data['filename'] = $this->input->post('filename');
            // Set Time
            date_default_timezone_set('Asia/Jakarta');
            $data['datereport'] = date('d-m-Y');

            $data['transaction'] = $this->M_Super->searchTransaction($start, $end);  
            $data['tittle'] = "REPORT DATA TRANSACTION";
            
            // Total Transaction
            $data['totaltrans'] = $this->M_Super->totalTrans();

            // Total Payment
            $data['totalPay'] = $this->M_Super->totalPayment();
            $this->load->view('super_admin/transaction_xls', $data);
        }
        
    }




}

/* End of file User_super_admin.php */

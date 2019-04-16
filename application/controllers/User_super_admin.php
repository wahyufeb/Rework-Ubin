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

    function products(){
        // Total products sold
        $data['soldout'] = $this->M_Admin->sold();

        // Total Product
        $data['totalproducts'] = $this->M_Super->totalPro();

        $data['allproducts'] = $this->M_Admin->allProducts();
        $this->template->super('super_admin/products', $data);
    }



    function link(){
        echo public_path()."assets";
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
        $data['tittle'] = "DATA PRODUCTS";
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
}

/* End of file User_super_admin.php */

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    private $api_key = 'c30c2925457570eec821f7355ca5e075';

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != "member"){
            redirect('Login');
        }
        $this->load->library('Template');
        $this->load->library('email');
        $this->load->model('M_User');
        $this->load->model('M_Order');
    }

    public function index(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;    
        } else {
            return json_decode($response);
        }
    }

    public function get_city($province_id){
        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
                return json_decode($response);
            }
    }

    public function get_city_by_province($province_id){
        $city = $this->get_city($province_id);

        foreach ($city->rajaongkir->results as $kota) {
            $output .='<option value="'.$kota->city_id.'">'.$kota->city_name.'</option>';
        }

        echo $output;
    }

    function getCityId($idCity, $idProvince){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$idCity&province=$idProvince",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "key: $this->api_key"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    function getcost(){
        $prov = $this->get_city($province_id);
        $originCity = 37;
        $destCity = $this->input->post('dest', TRUE);
        $courier = $this->input->post('courier', TRUE);
        $sum = 0;
        foreach($this->cart->contents() as $items){
            $weight = $sum += $items['options']['weight']; 
        }

        $weight = $sum;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=$originCity&destination=$destCity&weight=$weight&courier=$courier",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->api_key"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $data =  json_decode($response, TRUE);
            echo '<option value="" selected disabled>- Service - </option>';
            for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 

                for ($l=0; $l < count($data['rajaongkir']['results'][$i]['costs']); $l++) { 

                    echo '<option value="'.$data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['value'].','

                    .$data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')">';

                    echo $data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')</option>';
                }

            }
        }
    }

    function order(){
        $data['province'] = $this->index();

        // id_user
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);

        // get user
        $data['user'] = $this->M_User->getUser($where, 'users');

        // count id_user ada berapa
        $user = $this->M_Order->countId($where, 'orders');
        $count = $user[0]['count'];

        if($count < 1){
            $this->template->user('user/order', $data);
        }else{
            $this->session->set_flashdata('ordermax', 'Sorry ');
            redirect('User/payment');
        }

    }

    function cost(){
        $totalPayment = explode(',', $this->input->post('service', TRUE));
        $total        = $this->cart->total() + $totalPayment[0];

        echo $totalPayment[0].','.$total;
    }

    function getOrder(){
        // User
        $id = $this->session->userdata('id_user');


        //Tabel Invoices
        date_default_timezone_set('Asia/Jakarta');
        $invoice = array(
            'id_user' => $id,
            'date' => date('Y-m-d H:i:s'),
            'due_date' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+2,date('Y'))),
            'status' => 'unpaid'
        );


        // Tabel Costs
        $destProvince   = $this->input->post('destination_province');
        $destCity       = $this->input->post('destination_city');
        $courier        = $this->input->post('couirer');
        $service        = $this->input->post('service');
        $postalcode     = htmlspecialchars($this->input->post('postalcode'));
        $street         = htmlspecialchars($this->input->post('street'));
        $cost           = $this->input->post('cost');
        $total          = $this->input->post('total');

        $prov = $this->get_city($destProvince);
        $dataProvince = $prov->rajaongkir->results[0]->province;

        $city = $this->getCityId($destCity, $destProvince);
        $dataCity = $city->rajaongkir->results->city_name;
        
        $costs = array('id_user' => $id,
                        'province' => $dataProvince,
                        'city' => $dataCity,
                        'courier' => $courier,
                        'service' => $service,
                        'postal_code' => $postalcode,
                        'street_adress' => $street,
                        'total_cost' => $cost
                    );

        
        $this->M_Order->orderNow($id, $invoice, $costs, $total);
        $this->session->set_flashdata('order', 'sukses');
        redirect('Cart/index');
    }

    function cancelOrder($id_order){
        $id = $this->session->userdata('id_user');

        $where = array('id_order' => $id_order);
        $whereId = array('id_user' => $id);
        // add qty in stock products
        $getOrder = $this->M_Order->getOrder($where);
        
        // Delete Invoice
        $id_invoice = $getOrder[0]['id_invoice'];
        $id_cost    = $getOrder[0]['id_cost'];

        $whereInv = array('id_invoice' => $id_invoice);
        $whereCost= array('id_cost' => $id_cost);
        
        $invoice = $this->M_Order->countInv($whereInv);
        $cost = $this->M_Order->countCost($whereCost);

        if($invoice[0]['inv'] == 0 && $cost[0]['cost'] == 0){
            // Cancel Order
            $this->M_Order->cancelOrder($where, 'orders');
            redirect('User/payment');
            $this->M_Order->cancelOrder($where, 'transaction');
        }else{
            //  Delete Invoice
            $this->M_Order->deleteInv($whereInv);
            // Delete Cost
            $this->M_Order->deleteCost($whereCost);
            $this->M_Order->cancelTransaction($whereId, 'transaction');
            redirect('User/payment');
        }
    }

    function expired(){
        $whereId = array('id_user' => $this->input->post('id'));
        $where = array('id_user' => $this->session->userdata('id_user'));
        $getOrders = $this->M_Order->getOrder($where);
        $this->M_Order->expired($whereId, 'costs');
        $this->M_Order->expired($whereId, 'invoices');
        $this->M_Order->expired($whereId, 'orders');
        $this->M_Order->expired($whereId, 'transaction');
        redirect('User/payment');
    }


}

/* End of file Order.php */

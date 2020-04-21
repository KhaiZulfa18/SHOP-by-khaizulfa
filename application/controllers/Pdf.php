<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
        $this->load->model('administator');
		$this->load->helper('user_helper');
        $this->load->helper('text'); 
	    $this->load->library('pdfgenerator');

	}

	public function index()
	{
	    redirect('pdf/report');
	}    

	public function report($id_invoice){
		$where['id_invoice'] = $id_invoice;
        $invoice = $this->administator->get_data_where($where,'tbl_checkout');
        if (empty($invoice->num_rows())){
            // redirect('');
            redirect('shop/home');
        }else{

            $data['headertitle'] = 'Invoice';
            $data['profiltoko'] = $this->administator->get_profiltoko()->row();
            
            $where2 = array(
                'tbl_cart.status' => 2,
                'id_checkout' => $invoice->row()->id_checkout
            );
            $where3['id_user'] = $invoice->row()->id_user;
            $where4['id_bank'] = $invoice->row()->bank;

            $data['list_produk'] = $this->administator->get_data_join_cart($where2)->result();
            $data['user'] = $this->administator->get_data_where($where3,'tbl_user')->row(); 
            $data['invoice'] =$this->administator->get_data_where($where,'tbl_checkout')->row();
            $data['bank'] =$this->administator->get_data_where($where4,'tbl_bank')->row();

            $this->load->view('dashboard/checkout/invoice',$data);

            $html = $this->output->get_output();
            $filename = 'Invoice';
            $this->pdfgenerator->generate($html,$filename);
        }
	}
}?>	
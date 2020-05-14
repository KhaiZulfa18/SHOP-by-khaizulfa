<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('administator');
		$this->load->model('useradmin');
		// $this->load->library('email');
		$this->load->helper('user_helper');
		$this->load->helper('cookie'); 
		$this->load->helper('string'); 
	}

	public function index(){
		$where['status']=1;
		$data['profiltoko'] = $this->administator->get_profiltoko()->row();
		$data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
		$data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();
		$data['headertitle'] = 'Lupa Password';
		$data['menu'] = '';

		$id_user = $this->session->userdata('id_user');
		$jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
		$data['item_cart'] = $jml_item;

		$this->load->view('web/account/v_lupapassword',$data);
	}

	public function sent_token(){
		$email = $this->input->post('email');

		$where['email'] = $email;

		$cek = $this->administator->get_data_where($where,'tbl_user');
		$jumlahdata = $cek->num_rows();

		if (!empty($jumlahdata)) {
			$token = random_string('alnum', 8);
			$url = random_string('alnum', 16);
			$id_user = $cek->row()->id_user;

			$subject = "Reset Your Password";
			$message = '
			<h3>'.$token.'</h3>
			<p>Harap masukkan token diatas & password baru anda <a href="'.base_url().'resetpassword/token_validate/'.$url.'"><b>disini</b></a></p>
			';

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'ihacky123@gmail.com',
				'smtp_pass' => 'khaizulfa18702',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);

            //Load library email dan konfigurasinya
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->initialize($config);

			$this->email->from('ihacky123@gmail.com', 'Khai Zulfa');
			$this->email->to($email);
			$this->email->subject($subject);
			$this->email->message($message);
			$kirim = $this->email->send(); 

			if($kirim){ 
				$input['id_user'] = $id_user;
				$input['status'] = 1;
				$input['email'] = $email;
				$input['token'] = $token;
				$input['url'] = $url;
        	// $input['create_at'] = time();

				$this->administator->input_data($input,'tbl_tokens');

				$response['status'] = 'berhasil';
				$response['pesan'] =  '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cek Email Anda ya!</div>';
			}
			else{
				$txtgagal = $this->email->print_debugger();
				$response['status'] = 'gagal';
				$response['pesan'] = '<div class="alert alert-danger" role="alert">Gagal Terkirim! '.$txtgagal.'</div>';
				$status = '0'; 
			} 

		}else{
			$response['status'] = 'gagal';
			$response['pesan'] =  '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email Tidak Terdaftar!</div>';
		}

		echo json_encode($response);
	}

	public function token_validate($email = NULL){
		$where['status']=1;
		$data['profiltoko'] = $this->administator->get_profiltoko()->row();
		$data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
		$data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();
		$data['headertitle'] = 'New Password';
		$data['menu'] = '';
		$data['url'] = $this->uri->segment(3);

		$id_user = $this->session->userdata('id_user');
		$jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
		$data['item_cart'] = $jml_item;

		$this->load->view('web/account/v_validasi',$data);
	}

	public function validate(){
		$newpassword = $this->input->post('newpassword');
		$confirmpassword = $this->input->post('confirmpassword');
		$token = $this->input->post('token');
		$encode_url = $this->input->post('url');
		$url = base64_decode($encode_url);

		if ($newpassword===$confirmpassword) {

			$cek_token = $this->administator->cek_token($token,$url);

			if (!empty($cek_token->num_rows())) {
				$cek_user = $cek_token->row();
				$status = $cek_user->status;
				if ($status==1) {
					$id_user = $cek_user->id_user;

					$where['id_user']=$id_user;

					$update['password'] = $newpassword;

					$this->administator->update_data($where,$update,'tbl_user');
					$this->administator->update_token($token);

					$response['status'] = 'berhasil';
					$response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Berhasil Diubah!</div>';
				}else{
					$response['status'] = 'berhasil';
					$response['pesan'] = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Token Sudah Pernah Digunakan!</div>';
				}
			}else{
				$response['status'] = 'gagal';
				$response['pesan'] = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Token Salah!</div>';
			}
		}else{
			$response['status'] = 'gagal';
			$response['pesan'] = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Konfirmasi Password Anda Salah!</div>';
		}

		echo json_encode($response);
	}
}


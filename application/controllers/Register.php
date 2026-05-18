<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();

		//Mengambil data session bernama is_login.
		$is_login = $this->session->userdata('is_login');

		// Mencegah user yang sudah login membuka halaman register dan di arahkan kehalaman utama		
		if ($is_login) {
			redirect(base_url());
			return;
		}
	}

	public function index()
	{
		// Mengecek apakah ada data form yang dikirim.
		if (!$_POST) {
			// Mengambil nilai default dari model register.
			$input = (object) $this->register->getDefaultValues();
		} else {
			// engambil semua data POST
			$input = (object) $this->input->post(null, true);
		}

		// Menjalankan validasi form.
		if (!$this->register->validate()) {
			$data['title'] 	= 'Register';				// Judul Halaman
			$data['input'] 	= $input;					// Data Form
			$data['page']	= 'pages/auth/register';	// File View
			$this->view($data);							// Menampilkan halaman register.
			return;										// Menghentikan eksekusi setelah view tampil
		}

		// Menjalankan proses penyimpanan user ke database
		if ($this->register->run($input)) {
			// Menyimpan pesan sementara
			$this->session->set_flashdata('success', 'Berhasil melakukan registrasi!');
			// Mengarahkan user ke homepage.
			redirect(base_url());
		} else {
			// Menampilkan pesan error.
			$this->session->set_flashdata('error', 'Oops! terjadi suatu kesalahan!');
			// Kembali ke halaman register
			redirect(base_url('/register'));
		}
	}

}

/* End of file Controllername.php */


?>

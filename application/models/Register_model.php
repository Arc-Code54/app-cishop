<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model 
{

	// Akses database tabel user
	protected $table = "user";


	// Memberikan nilai default pada form
	public function getDefaultValues()
	{
		return [
			'name'		=> '',
			'email'		=> '',
			'password'	=> '',
			'role'		=> '',
			'is_active'	=> ''
		];
	}

	// Membuat aturan validasi form
	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'name',
				'label' => 'Nama',
				'rules' => 'trim|required',
			],
			[
				'field' 	=> 'email',
				'label' 	=> 'E-mail',
				'rules' 	=> 'trim|required|valid_email|is_unique[user.email]',
				'errors'	=> [
					'is_unique'	=> 'This %s already exists'
				]
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[8]',
			],
			[
				'field' => 'password_confirmation',
				'label' => 'Konfirmasi Password',
				'rules' => 'required|matches[password]',
			]
		];

		return $validationRules;
	}

	// Memproses registrasi user
	public function run($input) 
	{
		// Membuat array data user
		$data = [
			'name'		=> $input->name,
			'email' 	=> strtolower($input->email),
			'password' 	=> password_hash($input->password, PASSWORD_DEFAULT), // hashEncrypt($input->password),
			'role'		=> 'member',
		];

		// Insert data ke database
		$user	= $this->create($data);

		// User langsung login setelah register berhasil.
		$sess_data = [
			'id'		=> $user,
			'name'		=> $data['name'],
			'email'		=> $data['email'],
			'role' 		=> $data['role'],
			'is_login'	=> true
		];

		// Menyimpan data login ke session.
		$this->session->set_userdata($sess_data);
	}

}

/* End of file ModelName.php */


?>

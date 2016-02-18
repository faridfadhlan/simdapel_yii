<?php

class RegistrasiForm extends CFormModel
{
    public $nama;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
    public $jenis_identitas;
    public $no_identitas;
    public $umur;
    public $jk;
    public $pendidikan_terakhir;
    public $alamat;
    public $telp;
    public $pekerjaan;
    public $instansi_pekerjaan;
    public $verifyCode;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            array('nama,username,email,password,password_confirmation,jenis_identitas,no_identitas,umur,jk,pendidikan_terakhir,alamat,telp,pekerjaan,instansi_pekerjaan', 'required'),
            array('password', 'length', 'min'=>6, 'max'=>15),
            array('password', 'compare', 'compareAttribute'=>'password_confirmation'),
            array('username', 'length', 'max'=>25),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'nama'=>'Nama Lengkap',
            'username'=>'Username',
            'email'=>'Email',
            'password'=>'Password',
            'password_confirmation'=>'Konfirmasi Password',
            'jenis_identitas'=>'Jenis Identitas',
            'no_identitas'=>'No Identitas',
            'umur'=>'Umur',
            'jk'=>'Jenis Kelamin',
            'pendidikan_terakhir'=>'Pendidikan Terakhir',
            'alamat'=>'Alamat',
            'telp'=>'Telepon',
            'pekerjaan'=>'Pekerjaan',
            'instansi_pekerjaan'=>'Nama Instansi',
            'verifyCode'=>'Kode Captcha'
        );
    }

}

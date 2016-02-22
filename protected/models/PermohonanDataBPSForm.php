<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class PermohonanDataBPSForm extends CFormModel
{
	public $data_inventori_id;
	public $no_surat;
        public $bidang_id;
        public $seksi_id;
	public $user_id;
        public $data_diminta;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('data_inventori_id,no_surat,user_id', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'data_inventori_id'=>'Nama data',
                        'no_surat'=>'No Surat',
                        'bidang_id'=>'Nama Bidang',
                        'seksi_id'=>'Nama Seksi',
                        'user_id'=>'Nama Peminjam',
                        'data_diminta'=>'Keterangan'
		);
	}

}

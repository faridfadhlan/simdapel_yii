<?php

class PermohonanDataRawForm extends CFormModel
{
	public $data_inventori_id;
        public $proses_data;
        public $data_diminta;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('data_inventori_id,proses_data', 'required'),
                        array('data_diminta', 'safe')
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
                    'data_inventori_id'=>'Nama Data',
                    'proses_data'=>'Proses Data',
                    'data_diminta'=>'Keterangan'
		);
	}

}

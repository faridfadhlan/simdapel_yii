<?php

class PermohonanDataLainnyaForm extends CFormModel
{
	
        public $data_diminta;
        public $jenis_data;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('data_diminta,jenis_data', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
                    'data_diminta'=>'Keterangan'
		);
	}
}

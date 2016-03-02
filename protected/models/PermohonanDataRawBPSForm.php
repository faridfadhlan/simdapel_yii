<?php

class PermohonanDataRawBPSForm extends CFormModel
{
	public $data_inventori_id;
        public $data_diminta;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('data_inventori_id', 'required'),
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
                    'data_diminta'=>'Keterangan'
		);
	}

}

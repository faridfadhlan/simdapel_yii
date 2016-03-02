<?php

class KonsultasiForm extends CFormModel
{
	/**
	 * @return array validation rules for model attributes.
	 */
	
        public $judul;
        public $isi;
    
        public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judul,isi', 'required'),
			array('judul,isi', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'judul' => 'Judul',
			'isi' => 'Isi',
		);
	}
}

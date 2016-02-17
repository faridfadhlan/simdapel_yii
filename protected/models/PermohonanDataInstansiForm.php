<?php

class PermohonanDataInstansiForm extends CFormModel
{
	public $data_inventori_id;
        public $no_surat;
        public $nama_instansi;
        public $kategori_instansi;
        public $alamat;
        public $telp;
        public $nama_kepala;
        public $pnbp;
        public $proses_data;
        public $size;
        public $data_diminta;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('data_inventori_id,no_surat,nama_instansi,kategori_instansi,alamat,telp,nama_kepala,pnbp', 'required'),
                        array('proses_data,size,data_diminta', 'safe'),
                        array('proses_data, size', 'cekpnbp')
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
                    'data_inventori_id'=>'Nama Data',
                    'no_surat'=>'Nomor Surat',
                    'alamat'=>'Alamat',
                    'telp'=>'Nomor Telepon',
                    'pekerjaan'=>'Pekerjaan',
                    'nama_instansi'=>'Nama Instansi',
                    'kategori_instansi'=>'Kategori Instansi',
                    'naam_kepala'=>'Nama Kepala',
                    'pnbp'=>'PNBP',
                    'proses_data'=>'Dengan Proses Data',
                    'size'=>'Ukuran File',
                    'data_diminta'=>'Keterangan'
		);
	}
        
        public function cekpnbp($attribute,$params)
	{
            if($this->pnbp == '1'):
                if($this->$attribute == NULL) $this->addError($attribute, $this->getAttributeLabel($attribute).' tidak boleh kosong jika pembayaran dengan PNBP');
            endif;
	}

}

<?php

class PermohonanDataIndividuForm extends CFormModel
{
	public $data_inventori_id;
        public $jenis_identitas;
        public $no_identitas;
        public $nama;
        public $umur;
        public $jk;
        public $pendidikan_terakhir;
        public $alamat;
        public $telp;
        public $pekerjaan;
        public $nama_instansi;
        public $email;
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
			array('data_inventori_id,jenis_identitas,no_identitas,nama,umur,jk,pendidikan_terakhir,alamat,telp,pekerjaan,pnbp', 'required'),
                        array('nama_instansi,email,proses_data,size', 'safe'),
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
                    'jenis_identitas'=>'Jenis Identitas',
                    'no_identitas'=>'Nomor Identitas',
                    'nama'=>'Nama Lengkap',
                    'umur'=>'Umur',
                    'jk'=>'Jenis Kelamin',
                    'pendidikan_terakhir'=>'Pendidikan Terakhir',
                    'alamat'=>'Alamat',
                    'telp'=>'Nomor Telepon',
                    'pekerjaan'=>'Pekerjaan',
                    'nama_instansi'=>'Nama Instansi',
                    'pnbp'=>'PNBP',
                    'proses_data'=>'Dengan Proses Data',
                    'size'=>'Ukuran File'
		);
	}
        
        public function cekpnbp($attribute,$params)
	{
            if($this->pnbp == '1'):
                if($this->$attribute == NULL) $this->addError($attribute, $this->getAttributeLabel($attribute).' tidak boleh kosong jika pembayaran dengan PNBP');
            endif;
	}

}

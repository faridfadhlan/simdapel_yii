<?php

/**
 * This is the model class for table "permohonan_data_nonbps".
 *
 * The followings are the available columns in table 'permohonan_data_nonbps':
 * @property integer $id
 * @property string $no_surat
 * @property string $jenis_identitas
 * @property string $no_identitas
 * @property string $nama
 * @property integer $umur
 * @property string $jk
 * @property string $pendidikan_terakhir
 * @property string $alamat
 * @property string $telp
 * @property string $pekerjaan
 * @property string $nama_instansi
 * @property string $kategori_instansi
 * @property string $nama_kepala
 * @property string $email
 * @property string $data_diminta
 * @property integer $pnbp
 * @property integer $proses_data
 * @property integer $size
 * @property integer $status_id
 * @property integer $operator_id
 * @property string $create_time
 * @property integer $pegawai_id
 * @property integer $data_inventori_id
 * @property integer $flag_user
 *
 * The followings are the available model relations:
 * @property User $operator
 * @property Status $status
 * @property DataInventori $dataInventori
 */
class PermohonanData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $bidang_id;
        public $seksi_id;
    
        public function tableName()
	{
		return 'permohonan_data_nonbps';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('umur, pnbp, proses_data, size, status_id, operator_id, pegawai_id, data_inventori_id, flag_user', 'numerical', 'integerOnly'=>true),
			array('no_surat, jenis_identitas, no_identitas, nama, alamat, telp, pekerjaan, nama_instansi', 'length', 'max'=>100),
			array('jk', 'length', 'max'=>9),
			array('pendidikan_terakhir, email', 'length', 'max'=>50),
			array('kategori_instansi, nama_kepala', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, no_surat, jenis_identitas, no_identitas, nama, umur, jk, pendidikan_terakhir, alamat, telp, pekerjaan, nama_instansi, kategori_instansi, nama_kepala, email, data_diminta, pnbp, proses_data, size, status_id, operator_id, create_time, pegawai_id, data_inventori_id, flag_user', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'operator' => array(self::BELONGS_TO, 'User', 'operator_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
                        'peminjam_bps'=>array(self::BELONGS_TO, 'User', 'pegawai_id'),
			'data_inventori' => array(self::BELONGS_TO, 'DataInventori', 'data_inventori_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'bidang_id' => 'Nama Bidang',
                        'seksi_id' => 'Nama Seksi',
			'no_surat' => 'No Surat',
			'jenis_identitas' => 'Jenis Identitas',
			'no_identitas' => 'No Identitas',
			'nama' => 'Nama',
			'umur' => 'Umur',
			'jk' => 'Jk',
			'pendidikan_terakhir' => 'Pendidikan Terakhir',
			'alamat' => 'Alamat',
			'telp' => 'Telp',
			'pekerjaan' => 'Pekerjaan',
			'nama_instansi' => 'Nama Instansi',
			'kategori_instansi' => 'Kategori Instansi',
			'nama_kepala' => 'Nama Kepala',
			'email' => 'Email',
			'data_diminta' => 'Data Diminta',
			'pnbp' => 'Pnbp',
			'proses_data' => 'Proses Data',
			'size' => 'Size',
			'status_id' => 'Status',
			'operator_id' => 'Operator',
			'create_time' => 'Create Time',
			'pegawai_id' => 'Pegawai',
			'data_inventori_id' => 'Data Inventori',
			'flag_user' => 'Flag User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('no_surat',$this->no_surat,true);
		$criteria->compare('jenis_identitas',$this->jenis_identitas,true);
		$criteria->compare('no_identitas',$this->no_identitas,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('umur',$this->umur);
		$criteria->compare('jk',$this->jk,true);
		$criteria->compare('pendidikan_terakhir',$this->pendidikan_terakhir,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('pekerjaan',$this->pekerjaan,true);
		$criteria->compare('nama_instansi',$this->nama_instansi,true);
		$criteria->compare('kategori_instansi',$this->kategori_instansi,true);
		$criteria->compare('nama_kepala',$this->nama_kepala,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('data_diminta',$this->data_diminta,true);
		$criteria->compare('pnbp',$this->pnbp);
		$criteria->compare('proses_data',$this->proses_data);
		$criteria->compare('size',$this->size);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('operator_id',$this->operator_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('pegawai_id',$this->pegawai_id);
		$criteria->compare('data_inventori_id',$this->data_inventori_id);
		$criteria->compare('flag_user',$this->flag_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermohonanData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

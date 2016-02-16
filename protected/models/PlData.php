<?php

/**
 * This is the model class for table "pl_data".
 *
 * The followings are the available columns in table 'pl_data':
 * @property integer $id
 * @property string $kode
 * @property string $nama
 * @property integer $jumlah_media
 * @property integer $duplikat
 * @property string $manual
 * @property string $tgl_terima
 * @property string $sn
 * @property integer $media_id
 * @property integer $license_id
 * @property integer $jenis_id
 * @property integer $company_id
 * @property string $tgl_expired
 * @property string $ket
 * @property string $create_time
 * @property integer $operator_id
 * @property integer $kontak_id
 *
 * The followings are the available model relations:
 * @property PlJenis $jenis
 * @property PlCompany $company
 * @property PlLicense $license
 * @property User $operator
 * @property PlMedia $media
 * @property User $kontak
 * @property PlInstalasi[] $plInstalasis
 * @property PlTransaksi[] $plTransaksis
 */
class PlData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
        public $manual_file;
    
	public function tableName()
	{
		return 'pl_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode, nama, duplikat,jumlah_media, media_id,license_id,jenis_id,tgl_terima', 'required'),
			array('jumlah_media, duplikat, media_id, license_id, jenis_id, company_id, operator_id, kontak_id', 'numerical', 'integerOnly'=>true),
			array('kode', 'length', 'max'=>10),
			array('nama', 'length', 'max'=>255),
                        array('manual_file', 'file', 'types'=>'pdf', 'allowEmpty'=>true),
			array('manual, sn, tgl_expired, ket', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kode, nama, jumlah_media, duplikat, manual, tgl_terima, sn, media_id, license_id, jenis_id, company_id, tgl_expired, ket, create_time, operator_id, kontak_id', 'safe', 'on'=>'search'),
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
			'jenis' => array(self::BELONGS_TO, 'PlJenis', 'jenis_id'),
			'company' => array(self::BELONGS_TO, 'PlCompany', 'company_id'),
			'license' => array(self::BELONGS_TO, 'PlLicense', 'license_id'),
			'operator' => array(self::BELONGS_TO, 'User', 'operator_id'),
			'media' => array(self::BELONGS_TO, 'PlMedia', 'media_id'),
			'kontak' => array(self::BELONGS_TO, 'User', 'kontak_id'),
			'plInstalasis' => array(self::HAS_MANY, 'PlInstalasi', 'pl_data_id'),
			'plTransaksis' => array(self::HAS_MANY, 'PlTransaksi', 'pl_data_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kode' => 'Kode',
			'nama' => 'Nama',
			'jumlah_media' => 'Jumlah Media',
			'duplikat' => 'Duplikat',
			'manual' => 'Manual',
			'tgl_terima' => 'Tgl Terima',
			'sn' => 'Sn',
			'media_id' => 'Media',
			'license_id' => 'License',
			'jenis_id' => 'Jenis',
			'company_id' => 'Company',
			'tgl_expired' => 'Tgl Expired',
			'ket' => 'Ket',
			'create_time' => 'Create Time',
			'operator_id' => 'Operator',
			'kontak_id' => 'Kontak',
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
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('jumlah_media',$this->jumlah_media);
		$criteria->compare('duplikat',$this->duplikat);
		$criteria->compare('manual',$this->manual,true);
		$criteria->compare('tgl_terima',$this->tgl_terima,true);
		$criteria->compare('sn',$this->sn,true);
		$criteria->compare('media_id',$this->media_id);
		$criteria->compare('license_id',$this->license_id);
		$criteria->compare('jenis_id',$this->jenis_id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('tgl_expired',$this->tgl_expired,true);
		$criteria->compare('ket',$this->ket,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('operator_id',$this->operator_id);
		$criteria->compare('kontak_id',$this->kontak_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function set_kode() {
                $this->kode = $this->get_new_kode();
        }
        
        public function get_new_kode() {
                $criteria = new CDbCriteria();
                $criteria->select = 'substring(max(kode),-3) as kode';
                $criteria->condition = 'jenis_id='.$this->jenis_id;
                $tertinggi = $this::model()->find($criteria);
                $angkanol = array(0 => '000', 1=>'00', 2=>'0');
                $next_kode = (intval($tertinggi->kode)+1);
                return $this->jenis_id.$angkanol[strlen($next_kode)].$next_kode;
        }
}

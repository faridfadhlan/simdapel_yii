<?php

/**
 * This is the model class for table "pl_instalasi".
 *
 * The followings are the available columns in table 'pl_instalasi':
 * @property integer $id
 * @property integer $pl_data_id
 * @property integer $pegawai_id
 * @property string $tgl_instalasi
 * @property integer $banyak_perangkat
 * @property string $keterangan
 * @property integer $petugas_instalasi_id
 * @property integer $operator_id
 * @property string $create_time
 *
 * The followings are the available model relations:
 * @property Operator $operator
 * @property Pegawai $pegawai
 * @property Pegawai $petugasInstalasi
 * @property PlData $plData
 */
class PlInstalasi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $bidang_id;
        public $seksi_id;
         
        public function tableName()
	{
		return 'simdapel_pl_instalasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pegawai_id,tgl_instalasi,banyak_perangkat,petugas_instalasi_id', 'required'),
			array('pl_data_id, pegawai_id, banyak_perangkat, petugas_instalasi_id, operator_id', 'numerical', 'integerOnly'=>true),
			array('keterangan, create_time, bidang_id, seksi_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pl_data_id, pegawai_id, tgl_instalasi, banyak_perangkat, keterangan, petugas_instalasi_id, operator_id, create_time', 'safe', 'on'=>'search'),
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
			'pegawai' => array(self::BELONGS_TO, 'User', 'pegawai_id'),
			'petugas_instalasi' => array(self::BELONGS_TO, 'User', 'petugas_instalasi_id'),
			'pl_data' => array(self::BELONGS_TO, 'PlData', 'pl_data_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pl_data_id' => 'Pl Data',
                        'bidang_id'=>'Nama Bidang',
                        'seksi_id'=>'Nama Seksi',
			'pegawai_id' => 'Pegawai',
			'tgl_instalasi' => 'Tgl Instalasi',
			'banyak_perangkat' => 'Banyak Perangkat',
			'keterangan' => 'Keterangan',
			'petugas_instalasi_id' => 'Petugas Instalasi',
			'operator_id' => 'Operator',
			'create_time' => 'Create Time',
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
		$criteria->compare('pl_data_id',$this->pl_data_id);
		$criteria->compare('pegawai_id',$this->pegawai_id);
		$criteria->compare('tgl_instalasi',$this->tgl_instalasi,true);
		$criteria->compare('banyak_perangkat',$this->banyak_perangkat);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('petugas_instalasi_id',$this->petugas_instalasi_id);
		$criteria->compare('operator_id',$this->operator_id);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlInstalasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

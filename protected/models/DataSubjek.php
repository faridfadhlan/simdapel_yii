<?php

/**
 * This is the model class for table "data_subjek".
 *
 * The followings are the available columns in table 'data_subjek':
 * @property integer $id
 * @property string $kode
 * @property string $nama_subjek
 *
 * The followings are the available model relations:
 * @property DataInventori[] $dataInventoris
 * @property DataKuesioner[] $dataKuesioners
 */
class DataSubjek extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'simdapel_data_subjek';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode, nama_subjek', 'required'),
			array('kode', 'length', 'max'=>2),
			array('nama_subjek', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kode, nama_subjek', 'safe', 'on'=>'search'),
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
			'dataInventoris' => array(self::HAS_MANY, 'DataInventori', 'subjek_id'),
			'dataKuesioners' => array(self::HAS_MANY, 'DataKuesioner', 'subjek_id'),
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
			'nama_subjek' => 'Nama Subjek',
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
		$criteria->compare('nama_subjek',$this->nama_subjek,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DataSubjek the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

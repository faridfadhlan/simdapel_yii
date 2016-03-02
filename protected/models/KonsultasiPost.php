<?php

/**
 * This is the model class for table "simdapel_konsultasi_post".
 *
 * The followings are the available columns in table 'simdapel_konsultasi_post':
 * @property integer $id
 * @property string $isi
 * @property integer $user_id
 * @property integer $read_status
 * @property string $create_time
 * @property integer $thread_id
 *
 * The followings are the available model relations:
 * @property KonsultasiThread $thread
 * @property User $user
 */
class KonsultasiPost extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	
        public $status;
    
        public function tableName()
	{
		return 'simdapel_konsultasi_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('isi, status', 'required', 'on'=>'operator_tambah'),
                        array('isi', 'required', 'on'=>'user_tambah'),
			array('user_id, thread_id', 'numerical', 'integerOnly'=>true),
                        array('isi,status,create_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, isi, user_id, read_status, create_time, thread_id', 'safe', 'on'=>'search'),
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
			'thread' => array(self::BELONGS_TO, 'KonsultasiThread', 'thread_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'isi' => 'Isi',
			'user_id' => 'User',
			'create_time' => 'Create Time',
			'thread_id' => 'Thread',
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
		$criteria->compare('isi',$this->isi,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('thread_id',$this->thread_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KonsultasiPost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

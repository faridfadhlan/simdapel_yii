<?php

/**
 * This is the model class for table "pl_transaksi".
 *
 * The followings are the available columns in table 'pl_transaksi':
 * @property integer $id
 * @property string $tgl_pinjam
 * @property string $tgl_targetkembali
 * @property string $tgl_kembali
 * @property integer $user_id
 * @property integer $operator_id
 * @property string $keterangan
 * @property integer $pl_data_id
 * @property string $create_time
 *
 * The followings are the available model relations:
 * @property PlData $plData
 * @property User $operator
 * @property User $user
 */
class PlTransaksi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	
        public $bidang_id;
        public $seksi_id;
        public $duplikasi;
        
        public function tableName()
	{
		return 'pl_transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_pinjam,pl_data_id,user_id,operator_id', 'required'),
			array('user_id, operator_id, pl_data_id', 'numerical', 'integerOnly'=>true),
			array('tgl_targetkembali, tgl_kembali, keterangan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tgl_pinjam, tgl_targetkembali, tgl_kembali, user_id, operator_id, keterangan, pl_data_id, create_time', 'safe', 'on'=>'search'),
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
			'pl_data' => array(self::BELONGS_TO, 'PlData', 'pl_data_id'),
			'operator' => array(self::BELONGS_TO, 'User', 'operator_id'),
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
                        'bidang_id'=>'Nama Bidang',
                        'seksi_id'=>'Nama Seksi',
                        'duplikasi'=>'Duplikasi',
			'tgl_pinjam' => 'Tgl Pinjam',
			'tgl_targetkembali' => 'Tgl Targetkembali',
			'tgl_kembali' => 'Tgl Kembali',
			'user_id' => 'Nama Peminjam',
			'operator_id' => 'Operator',
			'keterangan' => 'Keterangan',
			'pl_data_id' => 'Pl Data',
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
		$criteria->compare('tgl_pinjam',$this->tgl_pinjam,true);
		$criteria->compare('tgl_targetkembali',$this->tgl_targetkembali,true);
		$criteria->compare('tgl_kembali',$this->tgl_kembali,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('operator_id',$this->operator_id);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('pl_data_id',$this->pl_data_id);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlTransaksi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

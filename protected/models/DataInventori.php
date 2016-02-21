<?php

/**
 * This is the model class for table "data_inventori".
 *
 * The followings are the available columns in table 'data_inventori':
 * @property integer $id
 * @property string $no_cd
 * @property string $label_cd
 * @property string $nama_data
 * @property string $tahun
 * @property string $rincian
 * @property string $format
 * @property integer $jumlah_rec
 * @property integer $file_size
 * @property string $file_size_unit
 * @property string $keterangan
 * @property string $nama_layout
 * @property integer $subjek_id
 * @property string $create_time
 * @property integer $operator_id
 *
 * The followings are the available model relations:
 * @property DataSubjek $subjek
 * @property User $operator
 * @property PermohonanDataBps[] $permohonanDataBps
 * @property PermohonanDataNonbps[] $permohonanDataNonbps
 */
class DataInventori extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $layout_file;
        public $kode;
    
	public function tableName()
	{
		return 'simdapel_data_inventori';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subjek_id,no_cd, label_cd, nama_data, tahun, format, file_size', 'required'),
			array('jumlah_rec, file_size, subjek_id, operator_id', 'numerical', 'integerOnly'=>true),
			array('no_cd, label_cd, nama_data, rincian, format, keterangan, nama_layout', 'length', 'max'=>255),
			array('tahun', 'length', 'max'=>4),
			array('file_size_unit', 'length', 'max'=>2),
                    
                        array('layout_file', 'file', 'types'=>'pdf', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, no_cd, label_cd, nama_data, tahun, rincian, format, jumlah_rec, file_size, file_size_unit, keterangan, nama_layout, subjek_id, create_time, operator_id', 'safe', 'on'=>'search'),
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
			'subjek' => array(self::BELONGS_TO, 'DataSubjek', 'subjek_id'),
			'operator' => array(self::BELONGS_TO, 'User', 'operator_id'),
			'permohonanDataBps' => array(self::HAS_MANY, 'PermohonanDataBps', 'data_inventori_id'),
			'permohonanDataNonbps' => array(self::HAS_MANY, 'PermohonanDataNonbps', 'data_inventori_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'no_cd' => 'No CD',
			'label_cd' => 'Label CD',
			'nama_data' => 'Nama Data',
			'tahun' => 'Tahun',
			'rincian' => 'Rincian',
			'format' => 'Format',
			'jumlah_rec' => 'Jumlah Record',
			'file_size' => 'Ukuran File',
			'file_size_unit' => 'File Size Unit',
			'keterangan' => 'Keterangan',
			'nama_layout' => 'Nama Layout',
			'subjek_id' => 'Subjek',
			'create_time' => 'Create Time',
			'operator_id' => 'Operator',
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
		$criteria->compare('no_cd',$this->no_cd,true);
		$criteria->compare('label_cd',$this->label_cd,true);
		$criteria->compare('nama_data',$this->nama_data,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('rincian',$this->rincian,true);
		$criteria->compare('format',$this->format,true);
		$criteria->compare('jumlah_rec',$this->jumlah_rec);
		$criteria->compare('file_size',$this->file_size);
		$criteria->compare('file_size_unit',$this->file_size_unit,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('nama_layout',$this->nama_layout,true);
		$criteria->compare('subjek_id',$this->subjek_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('operator_id',$this->operator_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DataInventori the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function set_new_kode() {
            $this->no_cd = $this->get_new_kode();
        }
        
        public function get_new_kode() {
            //print_r($this->subjek_id);exit;
                $criteria = new CDbCriteria();
                $criteria->select = 'substring(max(no_cd),-3) as kode';
                $criteria->condition = 'subjek_id='.$this->subjek_id;
                $tertinggi = $this::model()->find($criteria);
                $angkanol = array(0 => '000', 1=>'00', 2=>'0', 3=>'');
                $angkanol_jenis = array(0=>'00', 1=>'0', 2=>'');
                $next_kode = (intval($tertinggi->kode)+1);
                return $angkanol_jenis[strlen($this->subjek_id)].$this->subjek_id.$angkanol[strlen($next_kode)].$next_kode;
        }
        
        
}

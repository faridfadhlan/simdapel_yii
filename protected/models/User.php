<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $nip
 * @property string $nama
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $jenis_identitas
 * @property string $no_identitas
 * @property integer $umur
 * @property string $jk
 * @property string $pendidikan_terakhir
 * @property string $alamat
 * @property string $telp
 * @property string $pekerjaan
 * @property string $instansi_pekerjaan
 * @property integer $seksi_id
 * @property integer $role_id
 *
 * The followings are the available model relations:
 * @property DataInventori[] $dataInventoris
 * @property PermohonanDataBps[] $permohonanDataBps
 * @property PermohonanDataBps[] $permohonanDataBps1
 * @property PermohonanDataNonbps[] $permohonanDataNonbps
 * @property PlData[] $plDatas
 * @property PlData[] $plDatas1
 * @property PlTransaksi[] $plTransaksis
 * @property PlTransaksi[] $plTransaksis1
 * @property Seksi $seksi
 * @property Role $role
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $password_confirmation;
        public $bidang_id;
    
        public function tableName()
	{
		return 'simdapel_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nip,nama,seksi_id,role_id,username, email, password, password_confirmation', 'required', 'on'=>'create'),
                        array('nip,nama,bidang_id,seksi_id,role_id,username, email', 'required', 'on'=>'update'),
			array('umur, seksi_id, role_id', 'numerical', 'integerOnly'=>true),
			array('nip', 'length', 'max'=>18),
			array('nama, pendidikan_terakhir', 'length', 'max'=>50),
			array('username', 'length', 'max'=>25),
                        array('password,password_confirmation,bidang_id', 'safe'),
                        array('username,email','unique'),
			array('email', 'length', 'max'=>150),
			array('password', 'length', 'min'=>6, 'max'=>15, 'on'=>'create'),
                        array('password', 'compare', 'compareAttribute'=>'password_confirmation', 'on'=>'create'),
			array('remember_token, jenis_identitas, no_identitas, jk, telp, pekerjaan', 'length', 'max'=>100),
			array('alamat', 'length', 'max'=>255),
			array('instansi_pekerjaan', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nip, nama, username, email, password, remember_token, jenis_identitas, no_identitas, umur, jk, pendidikan_terakhir, alamat, telp, pekerjaan, instansi_pekerjaan, seksi_id, role_id', 'safe', 'on'=>'search'),
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
			'dataInventoris' => array(self::HAS_MANY, 'DataInventori', 'operator_id'),
			'permohonanDataBps' => array(self::HAS_MANY, 'PermohonanDataBps', 'operator_id'),
			'permohonanDataBps1' => array(self::HAS_MANY, 'PermohonanDataBps', 'pegawai_id'),
			'permohonanDataNonbps' => array(self::HAS_MANY, 'PermohonanDataNonbps', 'operator_id'),
			'plDatas' => array(self::HAS_MANY, 'PlData', 'operator_id'),
			'plDatas1' => array(self::HAS_MANY, 'PlData', 'kontak_id'),
			'plTransaksis' => array(self::HAS_MANY, 'PlTransaksi', 'operator_id'),
			'plTransaksis1' => array(self::HAS_MANY, 'PlTransaksi', 'user_id'),
			'seksi' => array(self::BELONGS_TO, 'Seksi', 'seksi_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nip' => 'NIP',
			'nama' => 'Nama Lengkap',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
                        'password_confirmation' => 'Konfirmasi Password',
			'remember_token' => 'Remember Token',
			'jenis_identitas' => 'Jenis Identitas',
			'no_identitas' => 'No Identitas',
			'umur' => 'Umur',
			'jk' => 'Jk',
			'pendidikan_terakhir' => 'Pendidikan Terakhir',
			'alamat' => 'Alamat',
			'telp' => 'Telp',
			'pekerjaan' => 'Pekerjaan',
			'instansi_pekerjaan' => 'Instansi Pekerjaan',
			'seksi_id' => 'Seksi',
                        'bidang_id' => 'Nama Bidang',
			'role_id' => 'Role',
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
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('remember_token',$this->remember_token,true);
		$criteria->compare('jenis_identitas',$this->jenis_identitas,true);
		$criteria->compare('no_identitas',$this->no_identitas,true);
		$criteria->compare('umur',$this->umur);
		$criteria->compare('jk',$this->jk,true);
		$criteria->compare('pendidikan_terakhir',$this->pendidikan_terakhir,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('pekerjaan',$this->pekerjaan,true);
		$criteria->compare('instansi_pekerjaan',$this->instansi_pekerjaan,true);
		$criteria->compare('seksi_id',$this->seksi_id);
		$criteria->compare('role_id',$this->role_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
	}
        
        public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}
        public function beforeSave() {
                if($this->isNewRecord) {
                    $this->password = $this->hashPassword($this->password);
                }
                return parent::beforeSave();
        }
}

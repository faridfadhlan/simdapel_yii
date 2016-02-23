<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class GantiPasswordForm extends CFormModel
{
	public $password_old;
        public $password_new;
        public $password_new_confirmation;
        public $user;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
                    array('password_old, password_new,password_new_confirmation', 'required'),
                    array('password_new', 'compare', 'compareAttribute'=>'password_new_confirmation'),
                    array('password_old', 'cekpasswordlama')
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password_old'=>'Password Sekarang',
                        'password_new'=>'Password Baru',
                        'password_new_confirmation'=>'Konfirmasi Password Baru',
		);
	}
        
        public function cekpasswordlama($attribute, $params) {
            if(!$this->hasErrors()){
                $this->user = User::model()->findByPk(Yii::app()->user->id);
                if(!$this->user->validatePassword($this->password_old)){
                    $this->addError('password_old', 'Password lama tidak sesuai.');
                }
            }
        }
}

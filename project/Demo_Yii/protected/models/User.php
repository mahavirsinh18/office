<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $gender
 * @property string $education
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

	public $old_password , $new_password , $conf_password;

	public $new_password_set , $conf_password_set;

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('old_password, new_password, conf_password', 'required', 'on' => 'changePwd'),
			
			array('email','email'),
			array('email', 'unique','message'=>'Email ID already exists!','on'=>'createrecord'),
			array('email', 'uniqueEmail','on'=>'updaterecord'),
			
			//array('email', 'findEmail', 'on' => 'emailUnique'),

			array('old_password', 'findPasswords', 'on' => 'changePwd'),
			array('conf_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),


			array('new_password_set, conf_password_set', 'required', 'on' => 'changePwdSet'),
			array('conf_password_set', 'compare', 'compareAttribute'=>'new_password_set', 'on'=>'changePwdSet'),


			array('name, email, password, gender, education', 'required'),
			array('name, email, password, gender, education', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, password, gender, education', 'safe', 'on'=>'search'),
		);
	}

	public function findPasswords($attribute, $params)
	{
		$model = User::model()->findByPk(Yii::app()->user->id);
		if ($model->password != md5($this->old_password))
			$this->addError($attribute, 'Old Password is incorrect.');
	}



	public function uniqueEmail($attribute, $params){
        //if($user = User::model()->exists('email=:email',array('email'=>$this->email)))
			$model_email = User::model()->findByAttributes(array('email'=>$this->email));
			/*$model_id = User::model()->findByAttributes(array('id'=>$this->id));
			print_r($model_id->id);*/
			if($model_email)
			{	
				if(($model_email->email != "") && ($model_email->id != $this->id))
				{
	     		 	$this->addError($attribute, 'Email already exists!');
				}
			}	
    }
	/*public function findEmail($attribute, $params)
	{	
			//$model = User::model()->findByPk(Yii::app()->user->id);
			$model = User::model()->findAll(array());

			if ($model->email == $this->email)
			{
				$this->addError($attribute, 'Email ID Alreay Exist.');
			}
			
	}	*/



	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'gender' => 'Gender',
			'education' => 'Education',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('education',$this->education,true);

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
}

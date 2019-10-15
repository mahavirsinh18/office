<?php

/**
 * This is the model class for table "st_student".
 *
 * The followings are the available columns in table 'st_student':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $gender
 * @property string $mobile
 * @property string $profile
 */
class Student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'st_student';
	}

	public $department_name;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password, gender, mobile, country_id, state_id, city_id', 'required'),
			array('name, email, password, mobile', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>6),
			//array('profile', 'length', 'max'=>100),
			array('email', 'unique', 'message'=>'Email already exists'),
			//array('profile', 'file', 'types'=>'jpg, gif, png', 'safe' => false),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('department_name', 'safe'),
			array('id, name, email, password, gender, mobile, country_id, state_id, city_id, department_name', 'safe', 'on'=>'search'),
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
			'getcountry' => array(self::BELONGS_TO, 'Country', 'country_id'),
			'getstate' => array(self::BELONGS_TO, 'State', 'state_id'),
			'getcity' => array(self::BELONGS_TO, 'City', 'city_id'),
			'department'=>array(self::BELONGS_TO, 'Department', '', 'on'=>'department.user_id=t.id', 'joinType'=>'LEFT join', 'alias'=>'department'),

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
			'mobile' => 'Mobile',
			'department_name' => 'Department',
			'country_id' => 'Country',
			'state_id' => 'State',
			'city_id' => 'City',
			'profile' => 'Profile',
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

		$criteria->with = array('getcountry','getstate','getcity','department');

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('mobile',$this->mobile,true);
		/*$criteria->compare('country_id',$this->country_id,true);
		$criteria->compare('state_id',$this->state_id,true);
		$criteria->compare('city_id',$this->city_id,true);*/
		$criteria->compare('profile',$this->profile,true);

		$criteria->compare('getcountry.country_name',$this->country_id,true);
		$criteria->compare('getstate.state_name',$this->state_id,true);
		$criteria->compare('getcity.city_name',$this->city_id,true);
		$criteria->compare('department.department_name',$this->department_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "image_upload".
 *
 * The followings are the available columns in table 'image_upload':
 * @property integer $id
 * @property string $image_1
 * @property string $image_caption
 * @property string $image_hashtags
 * @property string $story_details
 * @property string $feed_post_example
 * @property string $story_post_example
 */
class ImageUpload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'image_upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image_caption, image_hashtags, story_details', 'required'),
			array('image_1, image_caption, image_hashtags, story_details, feed_post_example, story_post_example', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, image_caption, image_hashtags, story_details', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image_1' => 'Image',
			'image_caption' => 'Image Caption',
			'image_hashtags' => 'Image Hashtags',
			'story_details' => 'Story Details',
			'feed_post_example' => 'Feed Post Example',
			'story_post_example' => 'Story Post Example',
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
		$criteria->compare('image_1',$this->image_1,true);
		$criteria->compare('image_caption',$this->image_caption,true);
		$criteria->compare('image_hashtags',$this->image_hashtags,true);
		$criteria->compare('story_details',$this->story_details,true);
		$criteria->compare('feed_post_example',$this->feed_post_example,true);
		$criteria->compare('story_post_example',$this->story_post_example,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ImageUpload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

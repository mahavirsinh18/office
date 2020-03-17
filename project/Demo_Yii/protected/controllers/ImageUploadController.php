<?php
class ImageUploadController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ImageUpload;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ImageUpload']))
		{
			/*print_r($_FILES);
			die();*/
			$model->attributes=$_POST['ImageUpload'];
			$image_1=CUploadedFile::getInstance($model,'image_1');
			$rnd = rand(0,9999).$image_1->name;
			$model->image_1=$rnd;

			$feed_post_example=CUploadedFile::getInstance($model,'feed_post_example');
			$rnd = rand(0,9999).$feed_post_example->name;
			$model->feed_post_example=$rnd;

			$story_post_example=CUploadedFile::getInstance($model,'story_post_example');
			$rnd = rand(0,9999).$story_post_example->name;
			$model->story_post_example=$rnd;

			if($model->save())
				$image_1->saveAs(Yii::app()->basePath .'/../profile/' . $model->image_1);
				$feed_post_example->saveAs(Yii::app()->basePath .'/../profile/' . $model->feed_post_example);
				$story_post_example->saveAs(Yii::app()->basePath .'/../profile/' . $model->story_post_example);
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$oldimg1=$model->image_1;
		$oldimg2=$model->feed_post_example;
		$oldimg3=$model->story_post_example;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ImageUpload']))
		{
			$model->attributes=$_POST['ImageUpload'];

			$image_1=CUploadedFile::getInstance($model,'image_1');
			if($image_1 != '')
			{
				$rnd = rand(0,9999).$image_1->name;
				$model->image_1=$rnd;
			}
			else
			{
				$model->image_1=$oldimg1;
			}

			$feed_post_example=CUploadedFile::getInstance($model,'feed_post_example');
			if($feed_post_example != '')
			{
				$rnd = rand(0,9999).$feed_post_example->name;
				$model->feed_post_example=$rnd;
			}
			else
			{
				$model->feed_post_example=$oldimg2;
			}

			$story_post_example=CUploadedFile::getInstance($model,'story_post_example');
			if($story_post_example != '')
			{
				$rnd = rand(0,9999).$story_post_example->name;
				$model->story_post_example=$rnd;
			}
			else
			{
				$model->story_post_example=$oldimg3;
			}
			
			if($model->save())
			{
				if($image_1 != '')
				{
					$image_1->saveAs(Yii::app()->basePath .'/../profile/' . $model->image_1);

					if(file_exists(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$oldimg1))
					{
						unlink(Yii::app()->basePath.'/../profile/'.$oldimg1);
					}
				}

				if($feed_post_example != '')
				{
					$feed_post_example->saveAs(Yii::app()->basePath .'/../profile/' . $model->feed_post_example);

					if(file_exists(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$oldimg2))
					{
						unlink(Yii::app()->basePath.'/../profile/'.$oldimg2);
					}
				}

				if($story_post_example != '')
				{
					$story_post_example->saveAs(Yii::app()->basePath .'/../profile/' . $model->story_post_example);

					if(file_exists(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$oldimg3))
					{
						unlink(Yii::app()->basePath.'/../profile/'.$oldimg3);
					}
				}

				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ImageUpload');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ImageUpload('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ImageUpload']))
			$model->attributes=$_GET['ImageUpload'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ImageUpload the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ImageUpload::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ImageUpload $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='image-upload-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

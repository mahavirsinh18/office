<?php

class UserController extends Controller
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changepass'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('@'),
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
		$model=new User;
		$model->scenario ='createrecord';

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->password=md5($_POST['User']['password']);
			if($model->save())

				Yii::app()->user->setFlash('success', 'User Regitration Successfully!');
				
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
	/*	echo "<pre>";
		print_r($model->email);
		echo "<br>";
		print_r($_POST);
		die();*/

		$model->scenario ='updaterecord';
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{


			/*$email_new = $_POST['User']['email'];

			$all_email = array(); 
			$user_model = User::model()->findAll();
			foreach ($user_model as $key => $value) {
				
				$all_email[] = $value['email']; 
			}

			if($email_new == $model->email)
			{
				echo "Update Code 1";
				die();
			}
			else if(in_array($email_new, $all_email))
			{
				echo "Email ID Alredy Exist";
			}
			else
			{
				$model->attributes=$_POST['User'];
				
				if($model->save())
					Yii::app()->user->setFlash('success', 'User Updation Successfully!');
					$this->redirect(array('view','id'=>$model->id));
			}*/
		
			
			
			
			$model->attributes=$_POST['User'];
			/*$model->password=md5($_POST['User']['password']);*/
			if($model->save())
				Yii::app()->user->setFlash('success', 'User Updation Successfully!');
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	public function actionChangepass($id)
	{
		$model=$this->loadModel($id);
		$model->scenario ='changePwd';
		$this->performAjaxValidation($model);

		//print_r($oldimg);
		//die();
		/*$model2 = new Department;*/
		
		/*print_r($model2);
		die();*/
		// Uncomment the following line if AJAX validation is needed
		/* $this->performAjaxValidation(array($model,$model2));*/

		if(isset($_POST['User']))
		{
			$new_password = $_POST['User']['new_password'];
			$conf_password  = $_POST['User']['conf_password'];

   			if(md5($_POST['User']['old_password']) === $model->password)
   			{
   				if($new_password == $conf_password)
   				{
   					$set_password = MD5($new_password);
   					
    				 $model->password = $set_password;
    				  if($model->save(false))
    				  {
    				  	Yii::app()->user->setFlash('success', 'Successfully changed password!');
    				  	//echo "Successfully changed password";
    				  	//$this->redirect(array('changepass','msg'=>'Successfully changed password'));
    				  }
    				  else
    				  {
    				  	echo "Password not changed";
    				  	 //$this->redirect(array('changepass','msg'=>'Password not changed'));
    				  }
				}
				else
				{
					echo "New Password And Confirm Password Is not Match";
				}
   			}
   			else
   			{
   				//echo "Old Password Is Not match";
   			}
			// print_r($_FILES);
			
			/*if($model->validate() && $model2->validate())
			{*/
			
			/*}*/	
			//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('changepass',array(
			'model'=>$model,
		));
	}



	// public function actionChangepassword()
	// {	
	// 	$model=$this->loadModel();
	// 	$model->scenario = 'changePwdSet';
	// 	$this->performAjaxValidation($model);

	// 	if(isset($_POST['User']))
	// 	{
			
	// 	}

	// 	$this->render('changepassword',array(
	// 		'model'=>$model,
	// 	));
	// }

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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

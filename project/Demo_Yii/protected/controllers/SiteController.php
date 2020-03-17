<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		  /*if(!Yii::app()->user->isGuest){
			//not logged user
            $this->redirect(array('home'));
		}*/
		//$list=Yii::app()->db->createCommand('SELECT * FROM image_upload ORDER BY RAND()')->queryAll();
		$model=ImageUpload::model()->find(array('select'=>'*, rand() as rand','order'=>'rand'));
		/*echo "<pre>";
		print_r($model);
		die();*/
		$this->layout='front_page';
		$this->render('index',array('model'=>$model));
	}


	public function actionHome()
	{
		$this->render('home');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";
				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		//die("Login");
		if(Yii::app()->user->id)
		{
			$this->redirect(array('site/home'));
		}

		$this->layout='login';
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('site/home'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}



	public function actionForgot()
	{
		//die("Login");
		$this->layout='login';
		$model=new User;
		//if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input date_add()
		if(isset($_POST['User']))
		{
			$email_id  = $_POST['User']['email'];
			$model->email = $email_id;
			//print_r($email_id);
			/* ajay.amcodr@gmail.com */
			$record=User::model()->findByAttributes(array('email' => $email_id));
			if($record)
			{
			// Email Send Code		
			/*	echo "<pre>";
				print_r($record);
				die();*/
			$model = $record;
			$token = md5(time().'-'.$model->id);
            $model->forgot_password_token = $token;
           	$model->forgot_token_expire = time()+3600;
            $model->save(false);
               
                $url = Yii::app()->createAbsoluteUrl('site/changepassword?id=' . $record->forgot_password_token);
                $subject= Yii::app()->name . " : Reset Password";

                $mail = new YiiMailer();
                    $mail->setFrom(Yii::app()->params['adminEmail'], Yii::app()->name . ' : Reset Password');
                    $mail->setTo($record->email);
                    $mail->setSubject($subject);
                    $mail->setBody($url);
                    if ($mail->send()) 
                    {
                    	Yii::app()->user->setFlash('success', 'Please check mail for resetting password! Link will be expire in 1 hour!');
                    }
                    else
                    {
                    	echo "Failed to send mail";
                    }
			}
			else
			{
				$model->addError('email',"invalid email addreess");
			}
			
			// $model->attributes=$_POST['User'];
			// // validate user input and redirect to the previous page if valid
			// if($model->validate() && $model->login())
			// 	$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('forgot',array('model'=>$model));
	}



	public function actionChangepassword()
	{
		//die("Login");

		$this->layout='login';
		$model = new User;
		$model->scenario = 'changePwdSet';
		//if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		$token_id = $_REQUEST['id'];
		$model_token = User::model()->findByAttributes(array('forgot_password_token' => $token_id));
		// collect user input data
		if(isset($_POST['User']))
		{
			if($model_token)
			{
				if ($model_token->forgot_password_token == $token_id && $model_token->forgot_token_expire > time())
				{
					$model_token->password = md5($_POST['User']['new_password_set']);
					$model_token->forgot_password_token = "";
					
					if ($model_token->save(false))
					{
	                    Yii::app()->user->setFlash('success', "Your password has been changed successfully. you may login with your new passwprd");
	                       $this->redirect(array('login'));
	                }
	            }    
			}	
		}
		// display the login form
		$this->render('changepassword',array('model'=>$model));
	}



	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('login'));
		
	}
}
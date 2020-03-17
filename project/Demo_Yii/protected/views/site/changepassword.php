<div id="login-container">
<!-- Login Header -->
          <?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

/*$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);*/
?>

<!-- <h1>Login</h1> -->

<!-- <p>Please fill out the following form with your login credentials:</p>
 -->
            
<h1 class="h2 text-light text-center push-top-bottom animation-pullDown">
                <i class="fa fa-cube text-light-op"></i><strong>AmCodr</strong>
            </h1>
            <div class="block animation-fadeInQuick">
                 <div class="block-title">
                    <h2>Change Password</h2>
                </div>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'htmlOptions' => array('enctype' => 'multipart/form-data','class' => 'form form-horizontal form-bordered'),
                          /* 'class'=>'form-horizontal',*/
                            'enableAjaxValidation'=>true,
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                            ),
                             'errorMessageCssClass'=>'help-block animation-slideUp form-error',
                        )); ?>

                        <!--    <p class="note">Fields with <span class="required">*</span> are required.</p> -->

                            <div class="form-group">
                                    <?php echo $form->labelEx($model,'new_password_set',array('class'=>'col-xs-12')); ?>
                               <div class="col-xs-12">
                                    <?php echo $form->passwordField($model,'new_password_set',array('class'=>'form-control','placeholder'=>'New Password')); ?>
                                    <?php echo $form->error($model,'new_password_set'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                    <?php echo $form->labelEx($model,'conf_password_set',array('class'=>'col-xs-12')); ?>
                               <div class="col-xs-12">
                                    <?php echo $form->passwordField($model,'conf_password_set',array('class'=>'form-control','placeholder'=>'Confrim Password')); ?>
                                    <?php echo $form->error($model,'conf_password_set'); ?>
                                </div>
                            </div>



                            <div class="form-group form-actions">
                                 <div class="col-xs-7"  style="margin-top: 15px;">
                                    <!-- <label class="csscheckbox csscheckbox-primary">
                                        <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> Remember Me?
                                    </label> -->
                                    <?php // echo CHtml::link('Register',array('register'),array('class'=>'btn btn-effect-ripple btn-sm btn-primary')); ?>
                                   <?php //echo CHtml::link('Login',array('login'),array('class'=>'btn btn-effect-ripple btn-sm btn-success')); ?>
                                </div>

                                <div class="col-xs-4 text-right" style="margin-top: 15px;">
                                   <!--  <button type="submit" class="btn btn-effect-ripple btn-sm btn-success">Log In</button> -->
                                     <button type="submit" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-check"></i> Change Password</button>
                                </div>
                            </div>  

                            <div class="row rememberMe">
                               <!--  <?php //echo $form->checkBox($model,'rememberMe'); ?>
                                <?php //echo $form->label($model,'rememberMe'); ?>
                                <?php //echo $form->error($model,'rememberMe'); ?>--> 
                            </div>


                            <footer class="text-muted text-center animation-pullUp">
                                <small><span id="year-copy"></span> &copy; <a href="https://amcodr.com/" target="_blank">AmCodr 2.9</a></small>
                            </footer>
                            

                        <?php $this->endWidget(); ?>
    </div>
</div>
<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>


 						<div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Change Password</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                           <!--  <li>User Interface</li> -->
                                            <li>Password</li>
                                            <li><a href="">Page</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
						<div class="block">
							<div class="block-title">
				                    <h2>Change Password Form</h2>

				                    <?php if(Yii::app()->user->hasFlash('success')):?>    
					                    <div class="info" style="border-radius: 5px; line-height: 1px;">
					                        <?php echo Yii::app()->user->getFlash('success'); ?>
					                    </div>

					                <?php endif; ?>
				            </div>
							<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'user-form',
								'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'form form-horizontal form-bordered'),
								// Please note: When you enable ajax validation, make sure the corresponding
								// controller action is handling ajax validation correctly.
								// There is a call to performAjaxValidation() commented in generated controller code.
								// See class documentation of CActiveForm for details on this.
								'enableAjaxValidation'=>true,
								'clientOptions'=>array(
										  'validateOnSubmit'=>true,
										),
								'errorMessageCssClass'=>'help-block animation-slideUp form-error'
							)); ?>

							<!-- 	<p class="note">Fields with <span class="required">*</span> are required.</p> -->

								<?php //echo $form->errorSummary($model); ?>

								<div class="form-group">
										<?php echo $form->labelEx($model,'old_password',array('class'=>'col-md-3 control-label')); ?>
									<div class="col-md-9">
										<?php echo $form->passwordField($model,'old_password',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
										<?php echo $form->error($model,'old_password'); ?>
									</div>
								</div>

								<div class="form-group">
										<?php echo $form->labelEx($model,'new_password',array('class'=>'col-md-3 control-label')); ?>
									<div class="col-md-9">
										<?php echo $form->passwordField($model,'new_password',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
										<?php echo $form->error($model,'new_password'); ?>
									</div>
								</div>

								<div class="form-group">
										<?php echo $form->labelEx($model,'conf_password',array('class'=>'col-md-3 control-label')); ?>
									<div class="col-md-9">
										<?php echo $form->passwordField($model,'conf_password',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
										<?php echo $form->error($model,'conf_password'); ?>
									</div>
								</div>

								<div class="form-group">
									<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',['id' => 'submit','class'=>'btn btn-effect-ripple btn-primary btn_user']); ?>
								</div>
							<!-- 	<div class="row buttons">
									<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
								</div> -->
				 </div>
			</div>
		</div>
<?php $this->endWidget(); ?>
<!-- form -->


		<script type="text/javascript">
             $('.info').addClass('alert alert-success');
               // $('.info').show();
                    window.setTimeout(function () {
                    $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
                $(this).hide();
                  $(this).css('opacity','100');
                    });
                    }, 5000);
        </script>
<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>


 					<div class="content-header">
                           <?php
                           	if(!$model->isNewRecord)
							{
                           ?>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>User Profile</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                           <!--  <li>User Interface</li> -->
                                            <li>Profile</li>
                                            <li><a href="">Update User</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            	}
                            	else
                            	{
                            	?>
                            		  <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>User Details</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                           <!--  <li>User Interface</li> -->
                                            <li>User</li>
                                            <li><a href="">Details</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            		<?php
                            	}
                            ?>
                        </div>


				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
						<div class="block">
							<div class="block-title">
				                    <h2>Update User</h2>
				            </div>
							<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'user-form',
								'htmlOptions' => array('enctype' => 'multipart/form-data','class' => 'form form-horizontal form-bordered'),
								// Please note: When you enable ajax validation, make sure the corresponding
								// controller action is handling ajax validation correctly.
								// There is a call to performAjaxValidation() commented in generated controller code.
								// See class documentation of CActiveForm for details on this.
								'enableAjaxValidation'=>true,
										'clientOptions' => array(
												  'validateOnSubmit' => true,
												),
										'errorMessageCssClass' => 'help-block animation-slideUp form-error'
							)); ?>

							<!-- 	<p class="note">Fields with <span class="required">*</span> are required.</p> -->

								<?php //echo $form->errorSummary($model); ?>

								<div class="form-group">
										<?php echo $form->labelEx($model,'name',array('class'=>'col-md-3 control-label')); ?>
									<div class="col-md-9">
										<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
										<?php echo $form->error($model,'name'); ?>
									</div>
								</div>

								<div class="form-group">
										<?php echo $form->labelEx($model,'email',array('class'=>'col-md-3 control-label')); ?>
									<div class="col-md-9">
										<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
										<?php echo $form->error($model,'email'); ?>
									</div>
								</div>

								<?php
                           			if($model->isNewRecord)
									{
                          			 ?>

								<div class="form-group">
										<?php echo $form->labelEx($model,'password',array('class'=>'col-md-3 control-label')); ?>
									<div class="col-md-9">
										<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
										<?php echo $form->error($model,'password'); ?>
									</div>	
								</div>
								
								<?php
								}
								?>

							<!-- 	<div class="row">
									<?php //echo $form->labelEx($model,'gender'); ?>
									<?php// echo $form->textField($model,'gender',array('size'=>60,'maxlength'=>255)); ?>
									<?php //echo $form->error($model,'gender'); ?>
								</div> -->

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
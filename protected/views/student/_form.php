

<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'clientOptions'=>array(
    	'validateOnSubmit'=>true,
	),
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<!-- <?php //echo CHtml::errorSummary(array($model, $model2)); ?> -->

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php

		echo $form->labelEx($model,'gender');
		$accountStatus = array('Male'=>'Male', 'Female'=>'Female');
		echo $form->radioButtonList($model,'gender',$accountStatus,
		array(
			'separator'=>' ',
			'labelOptions'=>array('style'=>'display:inline'),
		));
		echo $form->error($model,'gender');

		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'department_name'); ?>
		<?php echo $form->textField($model2,'department_name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model2,'department_name'); ?>
	</div>

	<div class="row">
		<?php                                   
			echo $form->dropDownList($model,'country_id', 
			CHtml::listData(Country::model()->findAll(), 'id', 'country_name'),
			array(
				'prompt'=>'Country',
				'ajax' => array(
					'type'=>'POST', 
					'url'=>Yii::app()->createUrl('Student/loadstates'),
					'update'=>'#Student_state_id',
					'data'=>array('country_id'=>'js:this.value'),
				)
			)); 
		?>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<?php

	if(!$model->isNewRecord){
	    $State = Chtml::listData(State::model()->findAllByAttributes(array('country_id'=>$model->country_id)), 'id','state_name');
	}else{
	    $State = array();
	}

	?>

	<div class="row">
		<?php 
			echo $form->dropDownList($model,'state_id',$State,array(
			'prompt'=>'State',
			'ajax'=>array(
				'type'=>'POST',
				'url'=>Yii::app()->createUrl('Student/loadcities'),
				'update'=>'#Student_city_id',
				'data'=>array('state_id'=>'js:this.value'),
			))); 
		?>
		<?php echo $form->error($model,'state_id'); ?>
	</div>

	<?php

	if(!$model->isNewRecord){
	    $City = Chtml::listData(City::model()->findAllByAttributes(array('state_id'=>$model->state_id)), 'id','city_name');
	}else{
	    $City = array();
	}

	?>

	<div class="row">
		<?php echo $form->dropDownList($model,'city_id',$City,array('empty'=>'City')); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile'); ?>
		<?php echo $form->fileField($model,'profile'); ?>
		<?php echo $form->error($model,'profile'); ?>
	</div>
	
	<?php 
	if($model->isNewRecord)
	{
		?> <img id="previewImage" style="width: 60px; height: 60px;"/> <?php
	} 
	else
	{
		echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $model->profile , "this is alt tag of image", array('height'=>'40px', 'width'=>'50px', 'id'=>'previewImage'));
	}

	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('id'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

$('#submit').click(function(e)
{
	formValidation(e);		
});

function formValidation(e)
{
	$('.customeerror').remove();
	var profile = $('#Student_profile').val();
	var Student_profile_em_ = 0;

    var regex = new RegExp("(.*?)\.(png|jpg|jpeg|gif)$");
    if($.trim(profile).length > 0)
    {
        if(!(regex.test(profile.toLowerCase())))
        {
        	$('#Student_profile').after('<div class="errorMessage Invalid customeerror" id="" ">Only jpg, jpeg, png, gif files allowed.</div>');
            Student_profile_em_ = 1;
        }
        else
        {
            $('#Student_profile_em_').removeClass('errorMessage');
            $('#Student_profile_em_').html("");
            Student_profile_em_ = 0;
        }
    }
    else
    {
    	<?php
    	if($model->profile == "")
    	{ ?>    	
        	Student_profile_em_ = 1;
        	$('#Student_profile').after('<div class="errorMessage Invalid customeerror" id="" ">Profile cannot be blank.</div>');
      	<?php  }
    	?>
    }


	if(Student_profile_em_ == 0)
	{
		return true;
	}
	else
	{
		e.preventDefault();
		return false;
	}
}

</script>

<script type="text/javascript">
	function PreviewImage(){
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("Student_profile").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("previewImage").src = oFREvent.target.result;
        };
    };

	$("#Student_profile").change(function()
	{
	 	PreviewImage();
	});
</script>
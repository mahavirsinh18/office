<?php
/* @var $this ImageUploadController */
/* @var $model ImageUpload */
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
                                            <li>User</li>
                                            <li><a href="">Update</a></li>
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
                                        <h1>Create Images</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                           <!--  <li>User Interface</li> -->
                                            <li>Images</li>
                                            <li><a href="">Create Images</a></li>
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
    <h2>Add Image</h2>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'image-upload-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data','class' => 'form form-horizontal form-bordered'),
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

	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<!-- <?php //echo $form->errorSummary($model); ?> -->

	<div class="form-group">
		<?php echo $form->labelEx($model,'image_1',array('class'=>'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?php echo $form->fileField($model,'image_1',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'image_1'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image_caption',array('class'=>'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'image_caption',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'image_caption'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image_hashtags',array('class'=>'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'image_hashtags',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'image_hashtags'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'story_details',array('class'=>'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'story_details',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'story_details'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'feed_post_example',array('class'=>'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?php echo $form->fileField($model,'feed_post_example',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'feed_post_example'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'story_post_example',array('class'=>'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?php echo $form->fileField($model,'story_post_example',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'story_post_example'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',['id' => 'submit','class'=>'btn btn-effect-ripple btn-primary']); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div>
</div><!-- form -->

<script type="text/javascript">
	$('#submit').click(function(e)
{
	formValidation(e);		
});

function formValidation(e)
{
	$('.customeerror').remove();
	var image_1 = $('#ImageUpload_image_1').val();
	var error = 0;

    var regex = new RegExp("(.*?)\.(png|jpg|jpeg|gif)$");
    if($.trim(image_1).length > 0)
    {
        if(!(regex.test(image_1.toLowerCase())))
        {
        	$('#ImageUpload_image_1').after('<div class="errorMessage Invalid customeerror" id="" ">Only jpg, jpeg, png, gif files allowed.</div>');
        	$('.errorMessage').addClass('help-block animation-slideUp');
            error = 1;
        }        
    }
    else
    {
    	<?php
    	if($model->image_1 == "")
    	{ ?>    	
        	error = 1;
        	$('#ImageUpload_image_1').after('<div class="errorMessage Invalid customeerror" id="" ">Image cannot be blank.</div>');
        	$('.errorMessage').addClass('help-block animation-slideUp');
      	<?php  }
    	?>
    }

	var feed_post_example = $('#ImageUpload_feed_post_example').val();
    var regex = new RegExp("(.*?)\.(png|jpg|jpeg|gif)$");
    if($.trim(feed_post_example).length > 0)
    {
        if(!(regex.test(feed_post_example.toLowerCase())))
        {
        	$('#ImageUpload_feed_post_example').after('<div class="errorMessage Invalid customeerror" id="" ">Only jpg, jpeg, png, gif files allowed.</div>');
        	$('.errorMessage').addClass('help-block animation-slideUp');
            error = 1;
        }
    }
    else
    {
    	<?php
    	if($model->feed_post_example == "")
    	{ ?>    	
        	error = 1;
        	$('#ImageUpload_feed_post_example').after('<div class="errorMessage Invalid customeerror" id="" ">Image cannot be blank.</div>');
        	$('.errorMessage').addClass('help-block animation-slideUp');
      	<?php  }
    	?>
    }

    var story_post_example = $('#ImageUpload_story_post_example').val();
    var regex = new RegExp("(.*?)\.(png|jpg|jpeg|gif)$");
    if($.trim(story_post_example).length > 0)
    {
        if(!(regex.test(story_post_example.toLowerCase())))
        {
        	$('#ImageUpload_story_post_example').after('<div class="errorMessage Invalid customeerror" id="" ">Only jpg, jpeg, png, gif files allowed.</div>');
        	$('.errorMessage').addClass('help-block animation-slideUp');
            error = 1;
        }
    }
    else
    {
    	<?php
    	if($model->story_post_example == "")
    	{ ?>    	
        	error = 1;
        	$('#ImageUpload_story_post_example').after('<div class="errorMessage Invalid customeerror" id="" ">Image cannot be blank.</div>');
        	$('.errorMessage').addClass('help-block animation-slideUp');
      	<?php  }
    	?>
    }


	if(error == 0)
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
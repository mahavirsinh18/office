<?php
/* @var $this ImageUploadController */
/* @var $data ImageUpload */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_1')); ?>:</b>
	<?php echo CHtml::encode($data->image_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_caption')); ?>:</b>
	<?php echo CHtml::encode($data->image_caption); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_hashtags')); ?>:</b>
	<?php echo CHtml::encode($data->image_hashtags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_details')); ?>:</b>
	<?php echo CHtml::encode($data->story_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feed_post_example')); ?>:</b>
	<?php echo CHtml::encode($data->feed_post_example); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('story_post_example')); ?>:</b>
	<?php echo CHtml::encode($data->story_post_example); ?>
	<br />


</div>
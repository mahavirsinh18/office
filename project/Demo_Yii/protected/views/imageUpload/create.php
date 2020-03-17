<?php
/* @var $this ImageUploadController */
/* @var $model ImageUpload */

$this->breadcrumbs=array(
	'Image Uploads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ImageUpload', 'url'=>array('index')),
	array('label'=>'Manage ImageUpload', 'url'=>array('admin')),
);
?>

<!-- <h1>Create ImageUpload</h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
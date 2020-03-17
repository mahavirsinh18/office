<?php
/* @var $this ImageUploadController */
/* @var $model ImageUpload */

$this->breadcrumbs=array(
	'Image Uploads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImageUpload', 'url'=>array('index')),
	array('label'=>'Create ImageUpload', 'url'=>array('create')),
	array('label'=>'View ImageUpload', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ImageUpload', 'url'=>array('admin')),
);
?>

<!-- <h1>Update ImageUpload <?php echo $model->id; ?></h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
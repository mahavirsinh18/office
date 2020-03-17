<?php
/* @var $this ImageUploadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Image Uploads',
);

$this->menu=array(
	array('label'=>'Create ImageUpload', 'url'=>array('create')),
	array('label'=>'Manage ImageUpload', 'url'=>array('admin')),
);
?>

<h1>Image Uploads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

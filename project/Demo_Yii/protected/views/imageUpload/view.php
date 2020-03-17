<?php
/* @var $this ImageUploadController */
/* @var $model ImageUpload */

$this->breadcrumbs=array(
	'Image Uploads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ImageUpload', 'url'=>array('index')),
	array('label'=>'Create ImageUpload', 'url'=>array('create')),
	array('label'=>'Update ImageUpload', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ImageUpload', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ImageUpload', 'url'=>array('admin')),
);
?>

<h1>View ImageUpload #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'image_1',
		array(
			'name'=>'image_1',
			'type'=>'raw',
			'value'=>function($data){
                return CHtml::image(Yii::app()->request->baseUrl . "/profile/" . $data->image_1 , "This is alt tag of image", array('height'=>'50px', 'width'=>'50px'));
            },
		),
		'image_caption',
		'image_hashtags',
		'story_details',
		//'feed_post_example',
		array(
			'name'=>'feed_post_example',
			'type'=>'raw',
			'value'=>function($data){
                return CHtml::image(Yii::app()->request->baseUrl . "/profile/" . $data->feed_post_example , "This is alt tag of image", array('height'=>'50px', 'width'=>'50px'));
            },
		),
		//'story_post_example',
		array(
			'name'=>'story_post_example',
			'type'=>'raw',
			'value'=>function($data){
                return CHtml::image(Yii::app()->request->baseUrl . "/profile/" . $data->story_post_example , "This is alt tag of image", array('height'=>'50px', 'width'=>'50px'));
            },
		),
	),
)); ?>

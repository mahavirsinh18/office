<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Students</h1>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<br><br>

<!-- <?php //echo CHtml::link('Download PDF',array('site/register'),array('class'=>'btn_registro')); ?> -->
<!-- <?php //echo CHtml::button('Download PDF', array('StudentController/actionGeneratePDF')); ?> -->
<?php echo CHtml::link('Download PDF',array('student/GeneratePDF'), array('class'=>'btn btn-info btn-sm')); ?>

<?php echo CHtml::link('Download Excel',array('student/GenerateExcel'), array('class'=>'btn btn-info btn-sm')); ?>

<!-- <?php //echo CHtml::button('Download Excel', array('onclick' => 'js:document.location.href="StudentController.php?r=controller/action&id='.$model->id.'"')); ?> -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'email',
		//'password',
		'gender',
		'mobile',
		array(
			'name'=>'department_name',
			'value'=>function($data){
			 	if(isset($data->department->department_name))
			 	{
			 		echo $data->department->department_name;
			 	}
			}
        ),
		array(
			'name'=>'country_id',
			'value'=>function($data){
			 	if(isset($data->getcountry->country_name))
			 	{
			 		echo $data->getcountry->country_name;
			 	}
			}
        ),
        array(
			'name'=>'state_id',
			'value'=>function($data){
			 	if(isset($data->getstate->state_name))
			 	{
			 		echo $data->getstate->state_name;
			 	}
			}
        ),
        array(
			'name'=>'city_id',
			'value'=>function($data){
			 	if(isset($data->getcity->city_name))
			 	{
			 		echo $data->getcity->city_name;
			 	}
			}
        ),
		array(
			'name'=>'profile',
			'type'=>'raw',
			'filter'=> false,
			'sortable'=>false,
			'value'=>function($data){
                return CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->profile , "This is alt tag of image", array('height'=>'40px', 'width'=>'50px'));
            },
		),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

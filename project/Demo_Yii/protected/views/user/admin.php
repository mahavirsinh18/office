<?php
/* @var $this UserController */
/* @var $model User */

/*$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- search-form -->
<div class="block full">
	  <div class="block-title">
	      <h2>Employee List</h2>
	      <div style="float: right; margin-top: 4px">
	      <a href="<?php echo Yii::app()->createUrl('user/create');?>" class="add-new fa fa-plus btn btn-success" >Add New</a>
	         </div>
 	  </div>
 	  <div class="table-responsive">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'user-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			 'itemsCssClass' => 'table table-striped table-bordered table-vcenter',
        	 'pagerCssClass'=>'pager pagination-sm',
                    'pager'=>array(
                        'header'=>' ',
                        'selectedPageCssClass'=>'active',
                        'htmlOptions'=>array('class'=>'pagination table-bordered','align'=>'center'),
                    ),
			'columns'=>array(
				/*'id',*/
				'name',
				'email',
				'password',
				array(
					/*'class'=>'CButtonColumn',*/
				'header'=>'Action',
                'class' => 'zii.widgets.grid.CButtonColumn',
                    'template' => '{view}{update}{delete}',
                    'htmlOptions' => array('style' => 'white-space: nowrap'),
                    'buttons' => array(
                        'view' => array(
                            'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-primary', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
                            'label' => '<i class="fa fa-eye"></i>',
                           // 'url' => 'Yii::app()->createUrl("student/studentview", array("id"=>$data->id))',
                            'imageUrl' => false,
                        ),
                        'update' => array(
                            'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-success', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Update')),
                            'label' => '<i class="fa fa-pencil"></i>',
                           // 'url' => 'Yii::app()->createUrl("student/updatecomisionconsultant", array("id"=>$data->id))',
                            'imageUrl' => false,
                        ),
                        'delete' => array(
                            'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-danger', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete')),
                            'label' => '<i class="fa fa-times"></i>',
                           // 'url' => 'Yii::app()->createUrl("student/updatecomisionconsultant", array("id"=>$data->id))',
                            'imageUrl' => false,
                        ),
                    )
				),
			),
		)); ?>
	</div>
</div>

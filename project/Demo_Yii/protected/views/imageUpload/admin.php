<?php
/* @var $this ImageUploadController */
/* @var $model ImageUpload */

$this->breadcrumbs=array(
	'Image Uploads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ImageUpload', 'url'=>array('index')),
	array('label'=>'Create ImageUpload', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#image-upload-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1>Manage Image Uploads</h1> -->

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

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
                                        <h1>Manage Images</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                           <!--  <li>User Interface</li> -->
                                            <li>Images</li>
                                            <li><a href="">Manage Images</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            		<?php
                            	}
                            ?>
                        </div>
<div class="block full">
<div class="block-title">
    <h2>Manage Images</h2>
    <div style="float: right; margin-top: 4px">
    	<a href="<?php echo Yii::app()->createUrl('imageupload/create');?>" class="add-new fa fa-plus btn btn-success" >Add New</a>
    </div>
</div>
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'image-upload-grid',
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
		//'id',
		//'image_1',
		array(
	        'name'=>'image',
	        'type' => 'raw',
	        'filter'=>false,
	        'sortable'=>false, 
	        'value' =>function($data){
	            return CHtml::image(Yii::app()->request->baseUrl . "/profile/" . $data->image_1 , "this is alt tag of image", array('height'=>'40px', 'width'=>'50px'));
	        },
        ),
		'image_caption',
		'image_hashtags',
		'story_details',
		//'feed_post_example',
		array(
	        'name'=>'feed_post_example',
	        'type' => 'raw',
	        'filter'=>false,
	        'sortable'=>false, 
	        'value' =>function($data){
	            return CHtml::image(Yii::app()->request->baseUrl . "/profile/" . $data->feed_post_example , "this is alt tag of image", array('height'=>'40px', 'width'=>'50px'));
	        },
        ),
		//'story_post_example',
		array(
	        'name'=>'story_post_example',
	        'type' => 'raw',
	        'filter'=>false,
	        'sortable'=>false, 
	        'value' =>function($data){
	            return CHtml::image(Yii::app()->request->baseUrl . "/profile/" . $data->story_post_example , "this is alt tag of image", array('height'=>'40px', 'width'=>'50px'));
	        },
        ),
        array(
           'header'=>'Action',
            'class' => 'zii.widgets.grid.CButtonColumn',
            'template' => '{view} &nbsp; {update} &nbsp; {delete}',
            'htmlOptions' => array('style' => 'white-space: nowrap'),
            'buttons' => array(
                'view' => array(
                    'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-primary', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
                    'label' => '<i class="fa fa-eye"></i>',
                    'imageUrl' => false,
                ),
                'update' => array(
                    'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-success', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Update')),
                    'label' => '<i class="fa fa-pencil"></i>',
                    'imageUrl' => false,
                ),
                'delete' => array(
                    'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-danger', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete')),
                    'label' => '<i class="fa fa-times"></i>',
                    'imageUrl' => false,
                ),
            )
        ),

		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
</div>
</div>

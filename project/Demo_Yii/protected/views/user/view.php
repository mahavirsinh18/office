<?php
/* @var $this UserController */
/* @var $model User */

/*$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);*/

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>


<div class="content-header">
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
               <li>Profile</li>
               <li><a href="">User Details</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-sm-12">
      <!-- Form Validation Block -->
      <div class="block" style="height: 400px">
         <!-- Form Validation Title -->
         <div class="block-title">
            <h2>USER DEATAILs</h2>
         </div>

                <?php if(Yii::app()->user->hasFlash('success')):?>    
                    <div class="info">
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                <?php endif; ?>
         


<!-- <h1>View User #<?php //echo $model->id; ?></h1> -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-striped'),
	'attributes'=>array(
		/*'id',*/
		'name',
		'email',
		/*'password',*/
	),
)); ?>

   </div>
   </div>
</div>
         

        <script type="text/javascript">
             $('.info').addClass('alert alert-success');
               // $('.info').show();
                    window.setTimeout(function () {
               $(".alert-success").fadeTo(500, 10).slideUp(700, function () {
                $(this).hide();
                  $(this).css('opacity','100');
                    });
                    }, 5000);
        </script>

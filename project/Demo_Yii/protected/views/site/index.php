<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Image</title>
</head>
<body>

<img src="<?php echo Yii::app()->request->baseUrl . "/profile/lion.jpg" ?>" class="sticky" height="90px;" width="90px;">
<div class="container">
<div class="clock"></div>
<div class="col-md-6 col-md-offset-3">

<form class="form-horizontal justify-content-center">
    <div class="form-group">   
        <img src="<?php echo Yii::app()->request->baseUrl . "/profile/" . $model->image_1 ?>" class="img-class" style="width:300px; height: 200px;">
        <a download="" href="<?php echo Yii::app()->request->baseUrl . "/profile/" . $model->image_1 ?>">
            <button type="button" class="btn btn-info">
                <span title="Download" id="icon" class="glyphicon glyphicon-download-alt"></span>
            </button>
        </a>
    </div>
    <div class="form-group">
        Image Caption:
        <textarea disabled="" class="inp form-control"  id="p1">
            <?php 
                if(isset($model->image_caption) && $model->image_caption != ""){
                    echo $model->image_caption;
                }
            ?>
        </textarea>
        <a href="javascript:void(0)" id="link" class="btn btn-info" onclick="copyToClipboard('#p1')">copy</a>
    </div>

    <div class="form-group">
        Image Hashtags:
        <textarea disabled="" class="inp form-control" id="p2">
            <?php 
                if(isset($model->image_hashtags) && $model->image_hashtags != ""){
                    echo $model->image_hashtags;
                }
            ?>
        </textarea>
        <a href="javascript:void(0)" id="link" class="btn btn-info" onclick="copyToClipboard('#p2')">copy</a>
    </div>
    <div class="form-group">
        Story Details:
        <textarea disabled="" class="inp form-control" id="p3">
            <?php 
                if(isset($model->story_details) && $model->story_details != ""){
                    echo $model->story_details;
                }
            ?>
        </textarea>
        <a href="javascript:;" id="link" class="btn btn-info" onclick="copyToClipboard('#p3')">copy</a>
    </div>
    <div class="form-group">
        Feed Post Example:<br>
        <img src="<?php echo Yii::app()->request->baseUrl . "/profile/" . $model->feed_post_example ?>" class="img-class" class="img-class" style="width:300px; height: 200px;">
        <a download="" href="<?php echo Yii::app()->request->baseUrl . "/profile/" . $model->image_1 ?>">
            <button type="button" class="btn btn-info">
                <span title="Download" class="glyphicon glyphicon-download-alt"></span>
            </button>
        </a>
    </div>
    <div class="form-group">
        Story Post Example:<br>
        <img src="<?php echo Yii::app()->request->baseUrl . "/profile/" . $model->story_post_example ?>" class="img-class" class="img-class" style="width:300px; height: 200px;">
        <a download="" href="<?php echo Yii::app()->request->baseUrl . "/profile/" . $model->image_1 ?>">
            <button type="button" class="btn btn-info">
                <span title="Download" class="glyphicon glyphicon-download-alt"></span>
            </button>
        </a>
    </div>
</form>

<script type="text/javascript">
    fdate = "3600";
</script>

<script type="text/javascript">
var clock;
diff = 5;
call = 0;

function restartclock()
{
    clock.setTime(86400);
    clock.start();
}

$(document).ready(function()
{
    clock = $('.clock').FlipClock(fdate,
    {
        clockFace: 'HourlyCounter',
        countdown: false,
        reset: function()
        {
            console.log('This method is triggered when the clock is reset');
        },

        stop: function()
        {
            console.log('This method is triggered when the clock is stop');
            if(call==0)
                restartclock();
        },
    });
    
});
</script>

</div>
</div>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/toaster.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flipclock.css">
<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/toaster.js"></script>
<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/flipclock.js"></script>

<style type="text/css">
    .flip-clock-wrapper {
        position: fixed !important;
        top: 12px !important;
        right: 0 !important;
        width: auto;
    }
</style>

<script type="text/javascript">
    function copyToClipboard(element){
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();

        $.toast({
            //heading: "Success",
            text: "Text copied successfully.",
            icon: 'success',
            position: 'top-center',
        });
    }
</script>

</body>
</html>

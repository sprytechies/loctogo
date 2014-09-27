<?php
 namespace frontend\views\activity;
/* @var $this yii\web\View */
 
 use yii\helpers\Html;
 use yii\widgets\ActiveForm;
 use yii\widgets\ListView;
 
 ?>
    <?php
         echo "<h3>".$model->description."</h3>"."posted at ".$model->cdate;
       ?>
    <?php $form = ActiveForm::begin(['id' => 'comment-form']); ?>
    <?= $form->field($text, 'description')->label('')->textarea(['rows'=>6,'placeholder'=>'Write your comment']);?>
    <?= Html::submitButton('Post Comment', ['class' => 'btn btn-primary green', 
        'name' => 'comment-button','onClick'=>'comment(); return false;']) ?>
    <?php ActiveForm::end(); ?>
  
     <?php \yii\widgets\Pjax::begin(['id'=>'request']); ?>
    <?php echo ListView::widget([
         'dataProvider' => $dataprovider,
         'itemOptions' => ['class' => 'list-item'],
         'itemView' => '_form',
         'layout' => '{items}{pager}',
         'id'=>'list',
        'viewParams'=>['text'=>$text],
         
    ]);
    ?>
    <?php \yii\widgets\Pjax::end(); ?>

<script>
            function comment(){
                $.ajax({
                        type:'POST',
                        url:'index.php?r=activity/comment',
                        data:$('#comment-form').serialize(),
                        success: function(data)
                        {
                            $.pjax.reload({container:'#request'});
                            $('textarea').filter('[id*=comments-description]').val('');
                        }

                       });
                   return false;
                   
                }
                
</script>


      
   
   
 
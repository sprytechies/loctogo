<?php
namespace frontend\views\activity;

 use yii\helpers\Html;
 use yii\widgets\ActiveForm;
 
 
 ?>
<?php
$i=$model['idcomments']; 
$j=$model['parent'];
?>
<!-- pjax begin for ajax updating -->
 <?php \yii\widgets\Pjax::begin(['id'=>'req'.$i]); ?>
 <?php if(!isset($j))
     {
        echo "<u>".$model['iduser0']['username']."</u> replied"."<br><b>". $model['description']."</b><br/>". Html::a('Reply to '.$model['iduser0']['username'], 'javascript:void(0);', 
        ['id' => 'comment', 'onclick' => "reply1($i)"]);?>
        <div class="reply-comments" style="margin-left: 80px;">
        <?php \frontend\controllers\replyComments($i); ?>
        </div>
        <?php
    }
        ?>
 <?php \yii\widgets\Pjax::end(); ?>

<!-- div for applying reply comments -->
<div id="set<?php if(isset($i)){echo $i;} ?>" style="display: none">
    <?php $form = ActiveForm::begin(['id' =>$i]); ?>
    <?= $form->field($text, 'description')->label('')->textarea(['rows'=>6,'placeholder'=>'Reply this comment']);?>
    <?=$form->field($text,'parent')->label('')->hiddenInput(['value'=>$i]); ?>
    <?= Html::a('cancel','javascript:void(0);',['id'=>'comment-cancel','onclick'=>"cancel($i)"]); ?>
    <?= Html::submitButton('Post Comment', ['class' => 'btn btn-primary green', 
        'name' => 'comment-button','onClick'=>"reply($i); return false;"]) ?>
    <?php ActiveForm::end(); ?>
</div>

<script>
    function reply1(id)
    {
            $("#set"+id).show();
    }
    function cancel(id)
    {
            $("#set"+id).hide();
    }

            function reply(id){
                $.ajax({
                        type:'POST',
                        url:'index.php?r=activity/comment',
                        data : $('#'+id).serialize(),
                        success: function(data)
                        {
                            $("#set"+id).hide();
                            $.pjax.reload({container:'#req'+id});
                          $('textarea').filter('[id*=comments-description]').val('');
                        }

                       });
                   return false;
                }
</script>




  
 
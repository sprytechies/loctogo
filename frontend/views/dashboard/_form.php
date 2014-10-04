<?php
$lim = $limit + 2;
?>

<div class="destination">
    <div class="destination-list"> 
        <h4 class="proxima-semib"><?php echo $model[0]['idcities0']['name']; ?></h4>

        <div class="list-panel"> <?php foreach ($model as $val) { ?>
                <div id="discussion" class="post-summary">
                    <div class="voting up"><img src="<?= Yii::$app->request->baseUrl; ?>/images/up-arrow.png" class="up-arrow"> 2 <span>Votes</span> </div>
                    <div class="post-description" id="more">
                        <h2><a href="<?= Yii::$app->getUrlManager()->createUrl(['/activity/index', 'id' => $val['idtodo']]) ?> "><?= $val['description']; ?></a></h2>
                        <ul>
                            <li><a href="javascript:void(0)"><span class="icon-star post-icon"></span>Favourite</a></li>
                            <li><a href="javascript:void(0)"><span class="icon-plus post-icon"></span>Add to list</a></li>
                            <li><a href="javascript:void(0)"><span class="icon-forward post-icon"></span>Reply</a></li>
                        </ul>
                    </div>
                    <div class="voting down"><img src="<?= Yii::$app->request->baseUrl; ?>/images/down-arrow.png" class="down-arrow"> 0 <span>Votes</span> </div>
                </div>
            <?php } ?>
        </div> 

    </div>

    <div class="showmore" id="k"> <a href="javascript:void(0)" onclick="showmore(<?php echo Yii::$app->user->id.",".$lim; ?>);
                                     ">Show more <span class="icon-plus2"></span></a> </div>
    
</div>
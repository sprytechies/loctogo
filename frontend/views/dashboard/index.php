<?php
$lim = $limit + 2;
?>


<div class="col-lg-8 col-md-8 col-sm-8">
    <div class="top-dest">
        <h4>Top Destinations</h4>

    </div>
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

        <div class="showmore" id="j"> <a href="javascript:void(0)" onclick="showmore(<?php echo Yii::$app->user->id.",".$lim; ?>);
                                         ">Show more <span class="icon-plus2"></span></a> </div>
    </div>
</div>

<script>
    function showmore(id,limit) {
        $.ajax({
            type: 'POST',
            url: 'index.php?r=dashboard/index&id='+id+'&limit=' +limit,
            success: function(data)
            {
                $(".destination").html(data);
                $("#j").hide();
            }

        });
        return false;

    }
</script>


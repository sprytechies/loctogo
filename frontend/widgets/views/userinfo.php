<div class="userinfo">
    <h2> <a class="ProfileCard-avatarLink u-inlineBlock" aria-hidden="true" tabindex="-1" title="" href="javascript:void(0)"> <img class="ProfileCard-avatarImage" alt="" src="<?= Yii::$app->request->baseUrl; ?>/images/user-photo.png "></a> </h2>
    <div class="ProfileCard-content">
        <div class="ProfileCard-userFields">
            <h3> <a class="ProfileCard-u-name" aria-hidden="true" tabindex="-1" title="" href="javascript:void(0)"><?php
                    if (!Yii::$app->user->isGuest) {
                        echo Yii::$app->user->identity->username;
                    }
                    else{
                            echo "Admin";
                    }
                    ?></a><small>Male, Jaipur</small></h3>
        </div>
    </div>
</div>
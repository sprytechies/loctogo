<div class="navbar-collapse collapse">
    <ul class="nav navbar-nav user">

        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="images/user-photo.png" class="user-photo">
                <?php
                if (!Yii::$app->user->isGuest) {
                    echo Yii::$app->user->identity->username;
                } else {
                    echo "Admin";
                }
                ?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="javascript:void(0)">Accout Settings</a></li>
                <li><a href="javascript:void(0)">Edit My Profile</a></li>
                <li><a href="<?= Yii::$app->getUrlManager()->createUrl('/site/logout')
                ?>" data-method="post">Log Out</a></li>
            </ul>
        </li>
    </ul>
</div>
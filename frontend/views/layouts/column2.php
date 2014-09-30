<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\widgets\ActiveForm;
use frontend\widgets\Usermenu;
use frontend\widgets\Userinfo;
use frontend\widgets\Linkpanel;
use frontend\widgets\Searchpanel;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?= Html::csrfMetaTags() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="#">Loctogo</a> </div>
                <?php
                echo Usermenu::widget();
                ?>
            </div>
        </div>
        <div class="alert proxima-light">
            <div class="container wrapper">
                <div>Please complete your <a href="javascript:void(0)">Profile</a></div>
            </div>
        </div>
        <div class="community-top">
            <div class="container wrapper">
                <?= Searchpanel::widget(); ?>
                <ul class="subnav-right">
                    <li><a href="javascript:void(0)" class="btn btn-green">Start a Discussion</a></li>
                </ul>
            </div>
        </div>
        <div class="container wrapper cf">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <?php
                    echo Userinfo::widget();
                    echo Linkpanel::widget();
                    ?>

                </div>
                <?= $content ?>
            </div>
        </div>

        <!--wrapper end--> 
        <!--footer start-->
        <div class="footer">
            <div class="container wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="mini-footer">
                            <ul class="nav nav-pills">
                                <li><a href="javascript:void(0)">About</a></li>
                                <li><a href="javascript:void(0)">Help</a></li>
                                <li><a href="javascript:void(0)">Blog</a></li>
                                <li><a href="javascript:void(0)">Terms </a></li>
                                <li><a href="javascript:void(0)">Policy</a></li>
                            </ul>
                            <div class="copyright"> <span>&copy; 2014</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
<script src="<?= Yii::$app->request->baseUrl; ?>/assets/a1bb7ee3/js/bootstrap.min.js" type="text/javascript"></script>


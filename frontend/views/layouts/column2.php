<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="col-sm-4 section">
    <div class="pull-left">
        <img src="./images/profile.jpg" alt="..." class="img-circle" style="width:110px;height:110px;">
    </div>
    <div class="col-sm-8">
        <h3>Arvind Sharma</h3>
        <p>Jaipur, Rajasthan</p>
    </div>
</div>
<div class="col-sm-8">
    <div class="clearfix">
        <form class="form-inline" role="form">
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search...">
              <div class="input-group-addon">@</div>
            </div>
          </div>
        </form>
    </div>
    <div class="section">
        <?= $content ?>
    </div>
</div>
<?php $this->endContent(); ?>
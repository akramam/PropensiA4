<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\themes\adminLTE\assets\AdminlteAsset;
/* @var $this \yii\web\View */
/* @var $content string */
AdminlteAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-blue sidebar-mini">

<?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= Yii::$app->request->baseUrl; ?>" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>S</b>H</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>SITRANS</b>HGH</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <div class="navbar-custom-menu">
			  <ul class="nav navbar-nav">
			  <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user_accounts.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">
				  <?php
                          if(isset(Yii::$app->user->identity->username))
							  $info[] = (\Yii::$app->user->identity->username);
                              $info1[] = (\Yii::$app->user->identity->nama);
							  $info2[] = (\Yii::$app->user->identity->role);
                          echo implode($info);
				?>
				  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user_accounts.png" class="img-circle" alt="User Image">
                    <p>
					<?php
                         
                          echo implode($info1);
				?>
					<small>
					<?php
                         
                          echo implode($info2);
				?>
					</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
				</ul>
              </div>
            </nav>

        </header>

        <?= $content ?>

        <footer class="main-footer">
            
            Copyright &copy; <?php echo date('Y'); ?> by Propensi A4. All Rights Reserved.
        </footer>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

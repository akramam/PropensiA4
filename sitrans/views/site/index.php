<?php

/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>
<div class="site-index">

    <div class="jumbotron">
        
		<h1>Welcome, 
		
		<?php
                          if(isset(Yii::$app->user->identity->username))
                              $info[] = (\Yii::$app->user->identity->nama);

                          echo implode($info);
        ?>!</h1>
        
    </div>
</div>

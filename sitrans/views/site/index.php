<?php

/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>
<div class="site-index">

    <div class="jumbotron">
        
		<h1>Welocome 
		
		<?php
                          if(isset(Yii::$app->user->identity->username))
                              $info[] = ucfirst(\Yii::$app->user->identity->username);

                          echo implode($info);
        ?>!</h1>
        
    </div>
</div>

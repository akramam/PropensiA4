<?php

$pdf = Yii::$app->pdf;
$pdf->content = $htmlContent;
return $pdf->render();

 ?>


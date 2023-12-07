<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Zaya $model */

$this->title = 'Create Zaya';
$this->params['breadcrumbs'][] = ['label' => 'Zayas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zaya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

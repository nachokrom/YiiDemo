<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Zaya $model */

$this->title = 'Update Zaya: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zayas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zaya-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

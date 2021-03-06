<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventarisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventaris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventaris-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inventaris', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_inventaris',
            'nama',
            'nilai_barang',
             'tgl_perolehan',
            [
            'attribute' => 'foto',
            'value' => function ($model)
            {
                return Html::img('uploads/inventaris/'.$model->foto,['width'=>'100px'.'']);
            },
            'format' => 'html'
               ],


            
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

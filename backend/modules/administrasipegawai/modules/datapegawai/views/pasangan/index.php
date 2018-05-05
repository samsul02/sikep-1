<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TmstKeluargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pasangan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row form-group">
    <?php echo Html::a('Kembali', Url::to(['default/view', 'id' => $idPegawai]), ['class' => 'btn btn-warning pull-right']); ?>
</div>

<div class="tmst-keluarga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Tambah Pasangan', ['create?idPegawai=' . $idPegawai], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'IdAnggotaKeluarga',
            'IDPegawai',
            'JenisHubunganKeluarga',
            'JenisKelamin',
            'NamaAnggotaKeluarga',
            //'TempatLahirAnggotaKeluarga',
            //'TanggalLahirAnggotaKeluarga',
            //'PekerjaanAnggotaKeluarga',
            //'AlamatKantorAnggotaKeluarga',
            //'NoIndukPegawaiKeluarga',
            //'Agama',
            //'StatusPerkawinan',
            //'TanggalNikah',
            //'StatusKesehatan',
            //'PendidikanTerakhir',
            //'IsHidup',
            //'BerhakTunjangan',
            //'DokumenHubunganKeluarga',
            //'NomorKARIS_KARSU',
            //'FotoAnggotaKeluarga',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>

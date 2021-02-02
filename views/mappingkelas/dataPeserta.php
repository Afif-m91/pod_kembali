<?php
use yii\grid\gridView;
use yii\db\Query;
use yii\db\Command;
use yii\data\SqlDataProvider;
//$this->tittle='Data Peserta';
?>
<div class="modalContent">
<?=

Gridview::widget(['dataProvider'=>$dataProvider,
'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'NamaPeserta',
            //'JenisKelamin',
             'NamaPerusahaan',
        ],
		])
?>
</div>
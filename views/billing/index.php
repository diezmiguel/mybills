<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $bill app\models\Bills */
$this->title='list';
$this->params['breadcrumbs'][] = $this->title;
$this->js
?>
<style style="text/css">
    @media only screen and (max-width: 800px) {

        /* Force table to not be like tables anymore */
        #no-more-tables table,
        #no-more-tables thead,
        #no-more-tables tbody,
        #no-more-tables th,
        #no-more-tables td,
        #no-more-tables tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        #no-more-tables thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }


        #no-more-tables tr { border: 1px solid #ccc; }

        #no-more-tables td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            white-space: normal;
            text-align:left;
        }

        #no-more-tables td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            text-align:left;
            font-weight: bold;
        }

        /*
        Label the data
        */
        #no-more-tables td:before { content: attr(data-title); }
    }
    .clickable-row{cursor: pointer;}
</style>
<div class="bills-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bills', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="container">
        <div class="row">

            <div id="no-more-tables">
                <table class="col-md-12 table-bordered table-hover table-condensed cf" id="bills_list">
                    <thead class="cf">
                        <tr>

                            <th><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'Id','dir'=> $dir_view])?>" >ID <i class="<?=($col == 'Id')?$class:''?>"></i></a></th>
                            <th><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'description','dir'=>$dir_view])?>">Description <i class="<?=($col == 'description')?$class:''?>"></i></a></th>
                            <th class="numeric"><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'Organization','dir'=>$dir_view])?>">Organization<i class="<?=($col == 'Organization')?$class:''?>"></i></a></th>
                            <th class="numeric"><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'duedate','dir'=>$dir_view])?>">DueDate <i class="<?=($col == 'duedate')?$class:''?>"></i></a></th>
                            <th class="numeric"><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'balance','dir'=>$dir_view])?>">balance <i class="<?=($col == 'balance')?$class:''?>"></i></a></th>
                            <th class="numeric"><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'minimum','dir'=>$dir_view])?>">Minimum <i class="<?=($col == 'minimum')?$class:''?>"></i></></th>
                            <th class="numeric"><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'interest','dir'=>$dir_view])?>">Interest <i class="<?=($col == 'interest')?$class:''?>"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($bills as $bill) {
                        ?>
                    <tr class="clickable-row" data-href="<?=\yii\helpers\Url::to(['billing/update','id'=>$bill->getAttribute('Id')])?>">
                        <td data-title="Id"><?=$bill->getAttribute('Id')?></td>
                        <td data-title="Company"><?=$bill->getAttribute('Description')?></td>
                        <td data-title="Organization"><?=$bill->getAttribute('Organization')?></td>
                        <td data-title="duedate"><?=$bill->getAttribute('dueDate')?></td>
                        <td data-title="balance" ><?=$bill->getAttribute('balance')?></td>
                        <td data-title="Open" class="numeric"><?=$bill->getAttribute('minimum')?></td>
                        <td data-title="High" class="numeric"><?=$bill->getAttribute('interest')?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>

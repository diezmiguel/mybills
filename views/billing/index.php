<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $bill app\models\Bills */
$this->title='list';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="bills-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add New Bill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= Html::beginForm()?>
    <div>
        <div class="col-xs-3">
        <input type="text" id="k" name="k" class="form-control" placeholder="Search Bills">
            </div>
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>
    <?= Html::endForm()?>
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
                            <th class="numeric"><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'paid','dir'=>$dir_view])?>">Paid? <i class="<?=($col == 'interest')?$class:''?>"></i></a></th>
                            <th class="numeric"><a href="<?=\yii\helpers\Url::toRoute(['','col'=>'category','dir'=>$dir_view])?>">Category? <i class="<?=($col == 'category')?$class:''?>"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($bills as $bill) {
                        ?>
                    <tr class="clickable-row" data-href="<?=\yii\helpers\Url::to(['billing/view','id'=>$bill->getAttribute('Id')])?>">
                        <td data-title="Id"><?=$bill->getAttribute('Id')?></td>
                        <td data-title="Company"><?=$bill->getAttribute('Description')?></td>
                        <td data-title="Organization"><?=$bill->getAttribute('Organization')?></td>
                        <td data-title="duedate"><?=$bill->getAttribute('dueDate')?></td>
                        <td data-title="balance" >$<?=number_format(($bill->getAttribute('balance')),2)?></td>
                        <td data-title="Open" class="numeric">$<?=number_format($bill->getAttribute('minimum'),2)?></td>
                        <td data-title="High" class="numeric"><?=$bill->getAttribute('interest')?></td>
                        <td data-title="High" class="numeric"><?=($bill->getAttribute('paid') == 0)?'No':'Yes'?></td>
                        <td data-title="High" class="numeric"><?=$bill->relatedRecords['category']->category; ?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>

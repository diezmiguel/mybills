<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $bill app\models\Bills */

$this->params['breadcrumbs'][] = $this->title;
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
</style>
<div class="bills-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bills', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">
                    No more tables.
                </h1>
                <h3 class="text-center">
                    Resize the browser screen to see how the table changes
                </h3>
            </div>
            <div id="no-more-tables">
                <table class="col-md-12 table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                    <tr>

                        <th class="numeric">ID</th>
                        <th class="numeric">Description</th>
                        <th class="numeric">Organization</th>
                        <th class="numeric">DueDate</th>
                        <th class="numeric">balance</th>
                        <th class="numeric">Minimum</th>
                        <th class="numeric">Interest</th>
                    </tr>
                                       </thead>
                    <tbody>
                    <?php foreach ($bills as $bill) { ?>
                    <tr>
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
        <div class="row">
            <p class="bg-success" style="padding:10px;margin-top:20px"><small><a href="http://elvery.net/demo/responsive-tables/#no-more-tables" target="_blank">Link</a> to original article</small></p>
        </div>
    </div>


</div>

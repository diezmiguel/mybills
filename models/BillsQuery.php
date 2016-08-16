<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Bills]].
 *
 * @see Bills
 */
class BillsQuery extends \yii\db\ActiveQuery
{

    /**
     * @inheritdoc
     * @return Bills[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Bills|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}

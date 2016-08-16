<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_bills".
 *
 * @property integer $Id
 * @property string $Description
 * @property string $Organization
 * @property string $dueDate
 * @property double $balance
 * @property double $minimum
 * @property integer $interest
 * @property integer $paid
 * @property integer $sms
 * @property integer $category
 */
class Bills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_bills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dueDate'], 'safe'],
            [['balance', 'minimum'], 'number'],
            [['interest', 'paid', 'sms', 'category'], 'integer'],
            [['Description', 'Organization'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Description' => 'Description',
            'Organization' => 'Organization',
            'dueDate' => 'Due Date',
            'balance' => 'Balance',
            'minimum' => 'Minimum',
            'interest' => 'Interest',
            'paid' => 'Paid',
            'sms' => 'Sms',
            'category' => 'Category',
        ];
    }

    /**
     * @inheritdoc
     * @return BillsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BillsQuery(get_called_class());
    }

}

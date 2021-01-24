<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "points".
 *
 * @property int $id
 * @property string $market_cap
 * @property string $market_price
 * @property string $stock
 * @property string $dividend_yield
 * @property string $roce
 * @property string $roe
 * @property string $dept_equity
 * @property string $eps
 * @property string $reserves
 * @property string $debt
 * @property int $company_id
 *
 * @property Companies $company
 */
class Points extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'points';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['market_cap', 'market_price', 'stock', 'dividend_yield', 'roce', 'roe', 'dept_equity', 'eps', 'reserves', 'debt', 'company_id'], 'required'],
            [['company_id'], 'integer'],
            [['market_cap', 'market_price'], 'string', 'max' => 100],
            [['stock', 'dividend_yield', 'roce', 'roe', 'dept_equity', 'eps', 'reserves', 'debt'], 'string', 'max' => 80],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'market_cap' => 'Market Cap',
            'market_price' => 'Market Price',
            'stock' => 'Stock',
            'dividend_yield' => 'Dividend Yield',
            'roce' => 'Roce',
            'roe' => 'Roe',
            'dept_equity' => 'Dept Equity',
            'eps' => 'Eps',
            'reserves' => 'Reserves',
            'debt' => 'Debt',
            'company_id' => 'Company ID',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Companies".
 *
 * @property int $id
 * @property string $company_name
 * @property string $status
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'status'], 'required'],
            [['company_name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'status' => 'Status',
        ];
    }
}

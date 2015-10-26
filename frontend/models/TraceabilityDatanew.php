<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%traceability_data}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $productid
 * @property integer $traceabilityid
 * @property integer $query_time
 * @property integer $clicks
 * @property string $remark
 * @property integer $create_time
 * @property integer $status
 */
class TraceabilityDatanew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
     //   return '{{%traceability_data}}'.'_'.Yii::$app->user->id;
        return 'tbhome_traceability_data_'.Yii::$app->user->id;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
     //       [['uid', 'productid', 'traceabilityid', 'query_time', 'clicks', 'remark', 'create_time'], 'required'],
            [['uid', 'productid', 'traceabilityid', 'query_time', 'clicks', 'create_time', 'status'], 'integer'],
            [['remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('tbhome', 'ID'),
            'uid' => Yii::t('tbhome', 'Uid'),
            'productid' => Yii::t('tbhome', 'Productid'),
            'traceabilityid' => Yii::t('tbhome', 'Traceabilityid'),
            'query_time' => Yii::t('tbhome', 'Query Time'),
            'clicks' => Yii::t('tbhome', 'Clicks'),
            'remark' => '生产备注',//Yii::t('tbhome', 'Remark'),
            'create_time' => Yii::t('tbhome', 'Create Time'),
            'status' => Yii::t('tbhome', 'Status'),
        ];
    }
}

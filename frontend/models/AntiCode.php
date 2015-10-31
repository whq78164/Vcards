<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%anti_code}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $code
 * @property integer $replyid
 * @property integer $productid
 * @property integer $query_time
 * @property integer $create_time
 * @property integer $status
 * @property integer $clicks
 * @property string $prize
 */
class AntiCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anti_code}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
  //          [['uid', 'code', 'replyid', 'productid', 'query_time', 'clicks', 'prize'
    //        ], 'required'],
            [['uid', 'replyid', 'create_time', 'productid', 'query_time', 'clicks'], 'integer'],
            [['code', 'prize'], 'string', 'max' => 255],
            [['code'], 'unique']
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
            'code' => Yii::t('tbhome', 'Code'),
            'replyid' => Yii::t('tbhome', '查询回复语'),
			'traceabilityid' => Yii::t('tbhome', '追溯序号'),
            'productid' => Yii::t('tbhome', '防伪产品'),
            'query_time' => Yii::t('tbhome', 'Query Time'),
            'clicks' => Yii::t('tbhome', 'Clicks'),
            'prize' => Yii::t('tbhome', 'Prize'),
            'create_time' => Yii::t('tbhome', 'create time'),
            'status' => Yii::t('tbhome', 'status'),
        ];
    }
}

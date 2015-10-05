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
 * @property integer $clicks
 * @property integer $prize

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
           // [['uid', 'code', 'replyid', 'productid', 'query_time', 'clicks', 'prize', 'hot'], 'required'],
            [['uid', 'code'], 'required'],
            [['uid', 'replyid', 'productid', 'query_time', 'clicks', 'prize'], 'integer'],
            [['code'], 'string', 'max' => 255],
            [['uid'], 'unique'],
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
            'replyid' => Yii::t('tbhome', 'Replyid'),
            'productid' => Yii::t('tbhome', 'Productid'),
            'query_time' => Yii::t('tbhome', 'Query Time'),
            'clicks' => Yii::t('tbhome', 'Clicks'),
            'prize' => Yii::t('tbhome', 'Prize'),
        ];
    }
}

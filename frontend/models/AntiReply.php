<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%anti_reply}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $tag
 * @property string $success
 * @property string $fail
 * @property integer $valid_clicks
 */
class AntiReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anti_reply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid','success', 'fail'], 'required'],
            [['uid', 'valid_clicks'], 'integer'],
            [['tag'], 'string', 'max' => 10],
            [['success', 'fail'], 'string', 'max' => 255],
            [['uid'], 'unique']
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
            'tag' => Yii::t('tbhome', 'Tag'),
            'success' => Yii::t('tbhome', 'Success'),
            'fail' => Yii::t('tbhome', 'Fail'),
            'valid_clicks' => Yii::t('tbhome', 'Valid Clicks'),
        ];
    }
}
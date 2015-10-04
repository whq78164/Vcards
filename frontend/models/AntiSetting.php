<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%anti_setting}}".
 *
 * @property integer $uid
 * @property string $title
 * @property string $image
 * @property integer $api_select
 * @property integer $api_parameter
 */
class AntiSetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anti_setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['api_parameter'], 'required'],
            [['api_select', 'api_parameter'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => Yii::t('tbhome', 'Uid'),
            'title' => Yii::t('tbhome', 'Title'),
            'image' => Yii::t('tbhome', 'Image'),
            'api_select' => Yii::t('tbhome', 'Api Select'),
            'api_parameter' => Yii::t('tbhome', 'Api Parameter'),
        ];
    }
}

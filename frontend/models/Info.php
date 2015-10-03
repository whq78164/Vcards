<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%card_info}}".
 *
 * @property integer $uid
 * @property string $card_title
 * @property string $unit
 * @property string $face_box
 * @property string $department
 * @property string $position
 * @property string $address
 * @property string $business
 * @property string $signature
 * @property string $wechat_account
 * @property string $wechat_qrcode
 * @property string $fax
 * @property string $location
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%card_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
         //   [['card_title', 'unit', 'face_box', 'department', 'position', 'address', 'business', 'signature', 'wechat_account', 'wechat_qrcode', 'fax', 'location'], 'required'],
            [['business', 'signature'], 'string'],
            [['card_title', 'department', 'position'], 'string', 'max' => 50],
            [['unit'], 'string', 'max' => 80],
            [['face_box', 'address', 'wechat_qrcode'], 'string', 'max' => 255],
            [['wechat_account', 'fax'], 'string', 'max' => 20],
            [['location'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => Yii::t('tbhome', 'Uid'),
            'card_title' => Yii::t('tbhome', 'Card Title'),
            'unit' => Yii::t('tbhome', 'Unit'),
            'face_box' => Yii::t('tbhome', 'Face Box'),
            'department' => Yii::t('tbhome', 'Department'),
            'position' => Yii::t('tbhome', 'Position'),
            'address' => Yii::t('tbhome', 'Address'),
            'business' => Yii::t('tbhome', 'Business'),
            'signature' => Yii::t('tbhome', 'Signature'),
            'wechat_account' => Yii::t('tbhome', 'Wechat Account'),
            'wechat_qrcode' => Yii::t('tbhome', 'Wechat Qrcode'),
            'fax' => Yii::t('tbhome', 'Fax'),
            'location' => Yii::t('tbhome', 'Location'),
        ];
    }

    /**
     * @inheritdoc
     * @return InfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InfoQuery(get_called_class());
    }

}
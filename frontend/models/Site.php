<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%sys}}".
 *
 * @property integer $id
 * @property string $admin_user
 * @property string $user_password
 * @property string $sitetitle
 * @property string $company
 * @property string $tel
 * @property integer $qq
 * @property string $email
 * @property string $address
 * @property string $logo
 * @property string $keywords
 * @property string $siteurl
 * @property string $copyright
 * @property string $icp
 * @property integer $status
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_user', 'user_password', 'sitetitle', 'company', 'tel', 'qq', 'email', 'address', 'logo', 'keywords', 'siteurl', 'copyright', 'icp'], 'required'],
            [['qq', 'status'], 'integer'],
            [['keywords'], 'string'],
            [['admin_user'], 'string', 'max' => 10],
            [['user_password', 'sitetitle', 'address', 'logo', 'siteurl'], 'string', 'max' => 255],
            [['company', 'email'], 'string', 'max' => 50],
            [['tel', 'copyright', 'icp'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('tbhome', 'ID'),
            'admin_user' => Yii::t('tbhome', 'Admin User'),
            'user_password' => Yii::t('tbhome', 'User Password'),
            'sitetitle' => Yii::t('tbhome', 'Sitetitle'),
            'company' => Yii::t('tbhome', 'Company'),
            'tel' => Yii::t('tbhome', 'Tel'),
            'qq' => Yii::t('tbhome', 'Qq'),
            'email' => Yii::t('tbhome', 'Email'),
            'address' => Yii::t('tbhome', 'Address'),
            'logo' => Yii::t('tbhome', 'Logo'),
            'keywords' => Yii::t('tbhome', 'Keywords'),
            'siteurl' => Yii::t('tbhome', 'Siteurl'),
            'copyright' => Yii::t('tbhome', 'Copyright'),
            'icp' => Yii::t('tbhome', 'Icp'),
            'status' => Yii::t('tbhome', 'Status'),
        ];
    }
}

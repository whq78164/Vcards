<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $mobile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('tbhome', '{attribute} "{value}" has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('tbhome', '{attribute} "{value}" has already been taken.')],
			
			['mobile', 'filter', 'filter' => 'trim'],
            ['mobile', 'required'],       
            ['mobile', 'string', 'max' => 255],
            ['mobile', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('tbhome', '{attribute} "{value}" has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => Yii::t('tbhome', 'Username'),
            'email' => Yii::t('tbhome', 'Email'),
            'mobile' => Yii::t('tbhome', 'Mobile'),
            'password' => Yii::t('tbhome', 'Password'),
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->mobile = $this->mobile;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}

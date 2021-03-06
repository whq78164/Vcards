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
 *  @property integer $traceabilityid
 * @property integer $query_time
 * @property integer $create_time
 * @property integer $status
 * @property integer $clicks
 * @property string $prize
 */
class AntiCodenew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbhome_anti_code_'.Yii::$app->user->id;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
    //        [['uid', 'code', 'replyid', 'productid', 'query_time', 'clicks', 'prize'], 'required'],
            [['uid', 'replyid', 'traceabilityid', 'productid', 'create_time', 'query_time', 'clicks'], 'integer'],
            [['code', 'remark', 'prize', 'url'], 'string', 'max' => 255],
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
            'code' => Yii::t('tbhome', '防伪码'),
            'replyid' => Yii::t('tbhome', 'Replyid'),
            'productid' => Yii::t('tbhome', 'Productid'),
            'traceabilityid' => Yii::t('tbhome', '追溯'),
            'query_time' => Yii::t('tbhome', 'Query Time'),
            'clicks' => Yii::t('tbhome', 'Clicks'),
            'prize' => Yii::t('tbhome', '奖品'),
            'remark' => Yii::t('tbhome', '备注'),
            'create_time' => Yii::t('tbhome', 'create time'),
            'status' => Yii::t('tbhome', 'status'),
        ];
    }







    /*
* Usage:
* $result = Log::model()->setDate("20140603")->findAll();



    private $_date;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return "tbl_log_". $this->getDate();
    }

    public function setDate($date){
        $this->_date = $date;
        $this->refreshMetaData();
        return $this;
    }

    public function getDate(){
        if($this->_date === NULL){
            $this->setDate("20140601");
        }
        return $this->_date;
    }

*/













}

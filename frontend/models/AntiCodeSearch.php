<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AntiCode;

/**
 * AntiCodeSearch represents the model behind the search form about `frontend\models\AntiCode`.
 */
class AntiCodeSearch extends AntiCode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'replyid', 'create_time', 'productid', 'query_time', 'clicks'], 'integer'],
            [['code'], 'safe'],
            [['prize'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
 //       $connection=Yii::$app->db;
 //       $uid=Yii::$app->user->id;
 //       $table='tbhome_anti_code_'.$uid;
 //       $sql='SELECT * FROM '.$table;
 //       $command = $connection->createCommand($sql);
 //       $query=$command->queryAll();;

        $query = AntiCodenew::find()->where(['uid' =>Yii::$app->user->id ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'uid' => $this->uid,
            'replyid' => $this->replyid,
            'productid' => $this->productid,
            'query_time' => $this->query_time,
            'clicks' => $this->clicks,
            'prize' => $this->prize,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}

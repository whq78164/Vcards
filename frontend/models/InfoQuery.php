<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Info]].
 *
 * @see Info
 */
class InfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Info[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Info|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
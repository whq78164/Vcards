<?php

use yii\db\Schema;
use yii\db\Migration;

/*防伪系统数据表*/
class m130524_201443_init extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';//ENGINE=InnoDB DEFAULT CHARSET=utf8;
        }



        $this->createTable('{{%anti_setting}}', [
            'uid' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(20) NOT NULL',
            'image' => Schema::TYPE_STRING . ' NOT NULL',
            'api_select' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'api_parameter' => Schema::TYPE_SMALLINT . ' NOT NULL',
        ], $tableOptions);
        $this->createIndex('uid', '{{%anti_setting}}', ['uid'],true);



          $this->createTable('{{%anti_reply}}', [
            'id' =>  Schema::TYPE_PK,
            'uid' => Schema::TYPE_INTEGER . ' NOT NULL',
              'tag' => Schema::TYPE_STRING . '(10) NOT NULL',
            'success' => Schema::TYPE_STRING . ' NOT NULL',
            'fail' => Schema::TYPE_STRING . ' NOT NULL',
            'valid_clicks' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
        ], $tableOptions);
        $this->createIndex('uid', '{{%anti_reply}}', ['uid'],true);


      /*******************************************************************/

        $this->createTable('{{%anti_prize}}', [
            'id' =>  Schema::TYPE_PK,
            'uid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'share' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'grade' => Schema::TYPE_SMALLINT . ' NOT NULL',
        ], $tableOptions);
        $this->createIndex('uid', '{{%anti_prize}}', ['uid'],true);


        $this->createTable('{{%anti_product}}', [
            'id' => Schema::TYPE_PK,
            'uid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'share' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'image' => Schema::TYPE_STRING . ' NOT NULL',
            'factory' => Schema::TYPE_STRING . '(30) NOT NULL',
            'name' => Schema::TYPE_STRING . '(10) NOT NULL',
            'describe' => Schema::TYPE_STRING . ' NOT NULL',
            'specification' => Schema::TYPE_STRING . ' NOT NULL',
            'unit' => Schema::TYPE_STRING . '(10) NOT NULL',
            'brand' => Schema::TYPE_STRING . '(20) NOT NULL',
            'price' => Schema::TYPE_STRING . '(10) NOT NULL',
            'hot' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        $this->createIndex('uid', '{{%anti_product}}', ['uid'],true);
        $this->createIndex('hot', '{{%anti_product}}', ['hot'],true);


        $this->createTable('{{%anti_code}}', [
            'id' => Schema::TYPE_PK,
            'uid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'code' => Schema::TYPE_STRING . ' NOT NULL',
            'replyid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'productid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'query_time' => Schema::TYPE_INTEGER . ' NOT NULL',
            'clicks' => Schema::TYPE_INTEGER . ' NOT NULL',
            'prize' => Schema::TYPE_INTEGER . ' NOT NULL',
            'hot' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        $this->createIndex('uid', '{{%anti_code}}', ['uid'],true);
        $this->createIndex('code', '{{%anti_code}}', ['code'],true);

/***************/
        $this->insert('{{%anti_setting}}', [
            'uid' => 1,
            'title' => '防伪系统',

        ]);

        $this->insert('{{%anti_reply}}', [
            'id' => 1,
            'uid' => 1,
            'success' => '恭喜，您所查询的产品是正品',
            'fail' => '您所查询的防伪码不存在，请谨防假冒',
        ]);

    }

//    public function down()
    public function safeDown()
    {

 //   $this->dropTable('{{%setting}}');
    }
}

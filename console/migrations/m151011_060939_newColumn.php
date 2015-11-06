<?php

use yii\db\Schema;
use yii\db\Migration;

class m151011_060939_newColumn extends Migration
{
    public function up()
    {
  //      $this->addColumn('{{%card_info}}', 'work_tel', Schema::TYPE_STRING.'(20) NOT NULL');
  //   $this->alterColumn('{{%anti_code}}', 'prize', Schema::TYPE_STRING.' NOT NULL');

        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%cloud}}', [
            'id' => Schema::TYPE_PK,
            'sitetitle' => Schema::TYPE_STRING . ' NOT NULL',
            'siteurl' => Schema::TYPE_STRING . ' NOT NULL',
            'company' => Schema::TYPE_STRING . '(50) NOT NULL',
            'tel' => Schema::TYPE_STRING . '(20) NOT NULL',
            'qq' => Schema::TYPE_INTEGER . ' NOT NULL',
            'email' => Schema::TYPE_STRING . '(50) NOT NULL',
            'address' => Schema::TYPE_STRING . ' NOT NULL',
            'copyright' => Schema::TYPE_STRING . '(20) NOT NULL',
            'icp' => Schema::TYPE_STRING . '(20) NOT NULL',
            'ip' => Schema::TYPE_STRING . '(30) NOT NULL',
            'welcome'=>Schema::TYPE_STRING . ' NOT NULL',
            'pageid1'=> Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 1',
            'pageid2'=> Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 2',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
        ], $tableOptions);
    }

    public function down()
    {
        echo "m151011_060939_newColumn cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m160126_110039_tbl_advert extends Migration
{
    public function up()
    {
        $this->execute('

        '); // ���� ����������� ��������� � ��

    }

    public function down()
    {
        echo "m160126_110039_tbl_advert cannot be reverted.\n";

        $this->dropTable(''); // ��� ������ ���������


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

<?php

use yii\db\Migration;

class m170723_074122_create_homePage_messages extends Migration
{
    public function up()
    {
        $this->createTable('home_page_messages', ['id' => $this->primaryKey(), 'Sender' => $this->string()->notNull(), 'SenderEmail' => $this->string()->notNull(), 'Message' => $this->text()->notNull()]);

    }

    public function safeDown()
    {

        echo "m170723_074122_create_homePage_messages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170723_074122_create_homePage_messages cannot be reverted.\n";

        return false;
    }
    */
}

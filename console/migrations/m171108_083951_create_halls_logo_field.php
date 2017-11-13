<?php

use yii\db\Migration;

/**
 * Class m171108_083951_create_halls_logo_field
 */
class m171108_083951_create_halls_logo_field extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('halls', 'image', $this->());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171108_083951_create_halls_logo_field cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171108_083951_create_halls_logo_field cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `separate_call_log`.
 */
class m181101_214721_create_separate_call_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('separate_call_log', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'params' => $this->text(),
            'result' => $this->integer(),
            'called_at' => $this->dateTime(),
        ]);

        $this->addForeignKey('user_separate_call_log_fk', 'separate_call_log', 'user_id', 'user', 'id', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('separate_call_log');
    }
}

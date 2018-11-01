<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181101_192835_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->execute('ALTER SCHEMA DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci');
        $this->execute('ALTER SCHEMA CHARACTER SET utf8 COLLATE utf8_general_ci');

        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB');

        $this->insert('user', [
            'username' => 'user',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('password'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('user');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 */
class m200122_034240_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'table' => $this->string(50)->notNull(),
            'description' => $this->text(),
        ]);

         $this->insert('{{%status}}', [
            'name' => 'Without execution',
            'table' => 'queue',
            'description' => 'Job not yet executed'
        ]);

        $this->insert('{{%status}}', [
            'name' => 'Executing',
            'table' => 'queue',
            'description' => 'Job is currently in execution'
        ]);

        $this->insert('{{%status}}', [
            'name' => 'Executed',
            'table' => 'queue',
            'description' => 'Job exectued'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%status}}');
        $this->dropTable('{{%status}}');
    }
}

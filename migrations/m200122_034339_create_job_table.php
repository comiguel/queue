<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job}}`.
 */
class m200122_034339_create_job_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%job}}', [
            'id' => $this->primaryKey(),
            'submitter_id' => $this->integer()->notNull(),
            'processor_id' => $this->integer(),
            'command' => $this->text(),
            'priority' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('job_status', '{{%job}}', 'status_id', '{{%status}}', 'id', 'NO ACTION', 'NO ACTION');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('job_status','{{%job}}');
        $this->dropTable('{{%job}}');
    }
}

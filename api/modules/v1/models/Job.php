<?php

namespace app\api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property int $submitter_id
 * @property int|null $processor_id
 * @property string|null $command
 * @property int $priority
 * @property int $status_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Status $status
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['submitter_id', 'priority'], 'required'],
            [['submitter_id', 'processor_id', 'priority', 'status_id'], 'integer'],
            [['command'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'submitter_id' => 'Submitter ID',
            'processor_id' => 'Processor ID',
            'command' => 'Command',
            'priority' => 'Priority',
            'status_id' => 'Status ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}

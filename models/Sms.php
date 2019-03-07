<?php

namespace jakharbek\sms\models;

use Yii;

/**
 * This is the model class for table "sms".
 *
 * @property int $id
 * @property string $message
 * @property int $recipient
 * @property int $sender
 * @property int $status
 * @property string $log
 */
class Sms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'log','recipient', 'sender', 'status','message_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'recipient' => 'Recipient',
            'sender' => 'Sender',
            'status' => 'Status',
            'log' => 'Log',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SmsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SmsQuery(get_called_class());
    }
}

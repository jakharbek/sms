<?php

namespace jakharbek\sms\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use jakharbek\sms\models\Sms;

/**
 * SmsSearch represents the model behind the search form of `\common\modules\sms\models\Sms`.
 */
class SmsSearch extends Sms
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'recipient', 'sender', 'status'], 'integer'],
            [['message', 'log','message_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Sms::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'recipient' => $this->recipient,
            'sender' => $this->sender,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['ilike', 'message', $this->message])
            ->andFilterWhere(['ilike', 'message_id', $this->message_id])
            ->andFilterWhere(['ilike', 'log', $this->log]);

        return $dataProvider;
    }
}

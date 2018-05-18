<?php

namespace app\models;

/**
 * This is the model class for table "bill".
 *
 * @property int $id
 * @property int $client_id
 * @property string $bill_date
 * @property string $bill_pay
 * @property int $price
 * @property int $status
 * @property string $name
 * @property string $bill_link
 *
 * @property Client $client
 */
class Bill extends \yii\db\ActiveRecord
{
    const STATUS_IS_PAID = 1;
    const STATUS_IS_NOT_PAID = 2;
    const STATUS_IS_WAIT = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id', 'price', 'status'], 'integer'],
            [['bill_date', 'bill_pay'], 'safe'],
            [['name', 'bill_link'], 'string', 'max' => 255],
            [['status'], 'default', 'value' => self::STATUS_IS_NOT_PAID],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'bill_date' => 'Bill Date',
            'bill_pay' => 'Bill Pay',
            'price' => 'Price',
            'status' => 'Status',
            'name' => 'Name',
            'bill_link' => 'Bill Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }


    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_IS_PAID => 'Оплачен',
            self::STATUS_IS_NOT_PAID => 'Не оплачен',
            self::STATUS_IS_WAIT => 'Ожидает',
        ];
    }
}

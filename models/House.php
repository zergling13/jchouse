<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "House".
 *
 * @property integer $id
 * @property string $name
 * @property string $intro
 * @property string $phone
 * @property double $lat
 * @property double $lng
 * @property string $houseType
 * @property string $forceType
 * @property string $avgPrice
 * @property string $address
 * @property string $recReason
 * @property string $trafficLines
 * @property string $designIdea
 * @property integer $isAllowed
 * @property string $time
 * @property string $url
 */
class House extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'House';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'intro', 'phone', 'lat', 'lng', 'houseType', 'forceType', 'avgPrice', 'address', 'recReason', 'trafficLines', 'designIdea'], 'required'],
            [['lat', 'lng'], 'number'],
            [['isAllowed'], 'integer'],
            [['time'], 'safe'],
            [['name', 'houseType', 'forceType', 'avgPrice', 'url'], 'string', 'max' => 50],
            [['intro', 'trafficLines'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 20],
            [['address', 'designIdea'], 'string', 'max' => 100],
            [['recReason'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => "编号",
            'name' => "楼盘名称",
            'intro' => "楼盘简介",
            'phone' => "联系电话",
            'lat' => "纬度",
            'lng' => "经度",
            'houseType' => "物业类型",
            'forceType' => "主力户型",
            'avgPrice' => "平均价格",
            'address' => "地址",
            'recReason' => "推荐理由",
            'trafficLines' => "交通路线",
            'designIdea' => "设计理念",
            'isAllowed' => Yii::t('app', 'Is Allowed'),
            'time' => Yii::t('app', 'Time'),
            'url' => "楼盘图片",
        ];
    }
}

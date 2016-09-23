<?php

namespace jonmer09\dashboard\models;

use Yii;

/**
 * This is the model class for table "{{%dashboard_graphic}}".
 *
 * @property integer $id
 * @property integer $panel_id
 * @property string $name
 * @property string $source
 * @property integer $source_type
 * @property string $visualization
 * @property string $options
 * @property string $created_at
 *
 * @property Panel $panel
 */
class Graphic extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%dashboard_graphic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['panel_id', 'source_type'], 'integer'],
            [['source', 'options'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'visualization'], 'string', 'max' => 60],
            [['panel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Panel::className(), 'targetAttribute' => ['panel_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'panel_id' => Yii::t('app', 'Panel'),
            'name' => Yii::t('app', 'Name'),
            'source' => Yii::t('app', 'Source'),
            'source_type' => Yii::t('app', 'Source Type'),
            'visualization' => Yii::t('app', 'Visualization'),
            'options' => Yii::t('app', 'Options'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPanel() {
        return $this->hasOne(Panel::className(), ['id' => 'panel_id']);
    }

    public function beforeSave($insert) {
        $this->options = serialize(json_decode($this->options, true));
        return parent::beforeSave($insert);
    }

}

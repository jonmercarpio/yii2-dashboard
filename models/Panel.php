<?php

namespace jonmer09\dashboard\models;

use Yii;

/**
 * This is the model class for table "{{%dashboard_panel}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $permissions
 * @property string $created_at
 *
 * @property Graphic[] $graphics
 */
class Panel extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%dashboard_panel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['created_at', 'permissions'], 'safe'],
            [['name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'permissions' => Yii::t('app', 'Permissions'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraphics() {
        return $this->hasMany(Graphic::className(), ['panel_id' => 'id']);
    }

    public function beforeSave($insert) {
        $this->permissions = serialize($this->permissions);
        return parent::beforeSave($insert);
    }

    public function afterFind() {
        $this->permissions = unserialize($this->permissions);
        return parent::afterFind();
    }

}

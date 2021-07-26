<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_language".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AppText[] $appTexts
 */
class AppLanguage extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AppTexts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppTexts()
    {
        return $this->hasMany(AppText::className(), ['app_language_id' => 'id']);
    }
}

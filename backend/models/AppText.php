<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_text".
 *
 * @property int $id
 * @property string $name
 * @property int|null $app_language_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AppLanguage $appLanguage
 */
class AppText extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['app_language_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
            [['app_language_id'], 'exist', 'skipOnError' => true, 'targetClass' => AppLanguage::className(), 'targetAttribute' => ['app_language_id' => 'id']],
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
            'app_language_id' => 'App Language ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AppLanguage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppLanguage()
    {
        return $this->hasOne(AppLanguage::className(), ['id' => 'app_language_id']);
    }
}

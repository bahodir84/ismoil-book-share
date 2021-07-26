<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_images".
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property int $created_at
 * @property int $updated_at
 */
class AppImages extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'path', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['path'], 'string', 'max' => 1024],
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
            'path' => 'Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

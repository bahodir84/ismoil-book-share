<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lent_book".
 *
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $status
 *
 * @property Book $book
 * @property User $user
 */
class LentBook extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lent_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'book_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'book_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'book_id' => 'Book ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

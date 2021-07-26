<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $author
 * @property int $created_at
 * @property int $updated_at
 * @property string $title
 * @property string|null $description
 * @property int|null $category_id
 * @property int|null $book_language_id
 * @property string|null $barcode
 * @property string|null $date_publish
 * @property int|null $pages
 * @property int|null $type_id
 * @property int|null $status_id
 * @property string|null $location
 *
 * @property BookLanguage $bookLanguage
 * @property Category $category
 * @property Status $status
 * @property Type $type
 * @property Bookmark[] $bookmarks
 * @property BorrowedBook[] $borrowedBooks
 * @property LentBook[] $lentBooks
 */
class Book extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author', 'created_at', 'updated_at', 'title'], 'required'],
            [['created_at', 'updated_at', 'category_id', 'book_language_id', 'pages', 'type_id', 'status_id'], 'integer'],
            [['description'], 'string'],
            [['date_publish'], 'safe'],
            [['author', 'title'], 'string', 'max' => 64],
            [['barcode'], 'string', 'max' => 32],
            [['location'], 'string', 'max' => 512],
            [['author'], 'unique'],
            [['book_language_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookLanguage::className(), 'targetAttribute' => ['book_language_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Author',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'title' => 'Title',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'book_language_id' => 'Book Language ID',
            'barcode' => 'Barcode',
            'date_publish' => 'Date Publish',
            'pages' => 'Pages',
            'type_id' => 'Type ID',
            'status_id' => 'Status ID',
            'location' => 'Location',
        ];
    }

    /**
     * Gets query for [[BookLanguage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookLanguage()
    {
        return $this->hasOne(BookLanguage::className(), ['id' => 'book_language_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Bookmarks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookmarks()
    {
        return $this->hasMany(Bookmark::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[BorrowedBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrowedBooks()
    {
        return $this->hasMany(BorrowedBook::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[LentBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLentBooks()
    {
        return $this->hasMany(LentBook::className(), ['book_id' => 'id']);
    }
}

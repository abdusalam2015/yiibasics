<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_reviews".
 *
 * @property int $id
 * @property string $book_title
 * @property string $author
 * @property string $amazon_url
 * @property string $review
 */
class BookReviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_title', 'author','amazon_url', 'review'], 'required'],
            [['review'], 'string'],
            [['book_title', 'author', 'amazon_url'], 'string', 'max' => 255],
            //  ['book_title', 'validateTitle'],
            [['image'], 'required', 'on' => 'update-image'],
            [['image'], 'file', 'extensions' => 'png, jpg, gif']
         ];
    }
    public function scenarios(){
      $scenarios = parent::scenarios();
      $scenarios['update-image'] = ['image'];
      return $scenarios;
    }
    public function validateTitle($attribute){
      $book_title = $this->$attribute;
      $connection = Yii::$app->db;
      $query = "select * from book_reviews where book_title='$book_title'";
      $book_reviews = $connection->createCommand($query)->queryAll();
      if($book_reviews){
        $this->addError($attribute, "There is already a book with the title, ".$book_title.".");
      }else {
        //no result from the database
        $this->addError($attribute, "There  are no books with the title of  ".$book_title.".");

      }


    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_title' => 'Book Title',
            'author' => 'Author',
            'amazon_url' => 'Amazon Url',
            'review' => 'Your Review',
            'image' => 'Book Cover'
        ];
    }
}

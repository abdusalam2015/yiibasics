<?php
namespace app\controllers;
use yii;
use yii\web\Controller;
class BookReviewsController extends Controller {

  public function actionIndex (){

    $data['booksList'] = $this->actionGetBooksList();
    return  $this->render('index' , $data);
  }
  public function actionView ($id){
    $data['id'] = $id;
    $booksList = $this->actionGetBooksList();
    foreach ($booksList as $book) {
      if($id == $book['id']){
        $data['book_title'] = $book['book_title'];
        $data['author'] = $book['author'];
        $data['amazon_url'] = $book['amazon_url'];
      }
    }
    return  $this->render('view' , $data);
  }
  public function actionGetBooksList(){
    $booksList = [
      ['id' => 1, 'book_title' => 'The Power Of Now', 'author' => 'Eckhart Tolle', 'amazon_url' => 'http://www.amazon.com'],
      ['id' => 2, 'book_title' => 'Slaying The Dragon', 'author' => 'Michael Johnson', 'amazon_url' => 'http://www.amazon.com'],
      ['id' => 3, 'book_title' => 'Business at the speed of though', 'author' => 'Bill Gates', 'amazon_url' => 'http://www.amazon.com'],
    ];
    return $booksList;
  }

}

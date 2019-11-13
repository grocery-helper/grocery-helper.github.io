<?php
  class Date {
    public $day;
    public $month;
    public $year;

    public function __construct() {
      $this->day = 0
      $this->month = 0
      $this->year = 0
    }

  }

  class User {
    public $userName;
    public $Password;

    public function __construct() {
      $userName = "";
      $Password = "";
    }

    public function __destruct() {
        echo 'User Deleted!'
    }

    public function getName(): string{
        return $this->userName;
    }

    public function checkPassword($pass, $newPass){
        if (pass == $this->Password){
            $this->Password = $newPass;
        }
        else {
            echo 'Password already used!';
        }
    }
    public function Login($pass, $uname): bool{
        if (pass == $this->Password && uname == $this->userName){
            echo 'Login Successful';
            return true/ //proceed to next screen
        }
        else {
            echo 'Username or password is incorrect';
            return false;
        }
    }
    public function Logout(){
        //logout stuff
    }
  }

  class FoodItem {
      public $foodName = "";
      public $purchaseDate = new Date;
      public $expirationDate = new Date
      public $shelfLifeInDays = 0;
      public $inGroceryList = FALSE;
      public $inInventoryList = FALSE;
      public $inFavoritesList = FALSE;

      public function getName(): string {
          return $this->foodName
      }
      public function getPurchaseDate(): Date {
          return $this->purchaseDate
      }
      public function getShelfLife(): int {
          return $this->shelfLife
      }
      public function isInGroceryList(): bool  {
          //if in grocerylist -> return true
          //else return false
      }
      public function isInInventoryList(): bool  {
          //if in inventory list -> return true
          //else return false
      }
      public function isInFavoritesList(): bool  {
          //if in favorites list return true
          //else return false
      }

      //EDIT THIS!!!
      public function setExpirationDate() { //takes the shelf life and adds it to the purchase date
          $this->expirationDate = $this->purchaseDate + $this->shelfLife
      }

      public function addToGroceryList() {
          //add to grocery list DB
          $this->inGroceryList = true
      }
      public function addToInventoryList(){
          //add to inventory list DB
          $this->inInventoryList = true
      }
      public function addToFavoritesList() {
          //add to favorites list DB
          $this->inFavoritesList = true
      }

  }

?>

<?php
    class LoginController extends Login{
        //properties
        private $uid;
        private $pwd;
        private $member;

        //constructor
        public function __construct($uid, $pwd, $member){
            $this->uid = $uid;
            $this->pwd = $pwd;
            $this->member= $member;
        }

        //method to login the user
        public function loginUser(){
            if($this->emptyInput() == false){
                echo "Empty Input";
                header("location: ../index.php?error=emptyinput");
                exit();
            }
            $this->getUser($this->uid, $this->pwd, $this->member);
        }   

        //method to check if an input field is empty
        private function emptyInput(){
            if(empty($this->uid) || empty($this->pwd)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
    }
?>

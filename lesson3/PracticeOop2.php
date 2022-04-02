<?php
    
    // -	Viết một abtract class tên 'Country' làm lớp cha,  có:
    // -	Thuộc tính (protected) $slogan
    // -	Hàm sayHello()
    abstract class Country {
        protected $slogan;
        abstract public function sayHello();
        public function setSlogan($slogan){
            $this->slogan=$slogan;
        }
    }
    //-	Viết một interface tên 'Boss' có giao diện cho hàm checkValidSlogan()
    interface Boss {
        public function checkValidSlogan();
    }
    //-	Viết 2 class 'EnglandCountry' và 'VietnamCountry' được kế thừa từ class 'Country', và implement interface Boss
    //-	EnglandCountry yêu cầu chuỗi $slogan có chứa 'England' hoặc 'english'
    //-	VietnamCountry yêu cầu chuỗi $slogan có chứa đoạn 'vietnam' và 'hust'

    class EnglandCountry extends Country implements Boss{
        public function sayHello() {
            echo ("Hello");           
        }
        public function checkValidSlogan(){
            if((strpos($this->slogan, "England") !== false||strpos($this->slogan, "english") !== false)){
                return true;
            }else{
                return false;
            }
        }
        use Active;
    }
    class VietnamCountry extends Country implements boss{
        public function sayHello() {
            echo ("Xin chao");           
        }
        public function checkValidSlogan(){
            if((strpos($this->slogan, "vietnam") == true)&&(strpos($this->slogan, "hust") == true)){
                return true;
            }else{
                return false;
            }
        }
        use Active;
    }
    $englandCountry = new EnglandCountry();
    $vietnamCountry = new VietnamCountry();

    $englandCountry->setSlogan('England is a country that is part of the United Kingdom. It shares land borders with Wales to the west and Scotland to the north. The Irish Sea lies west of England and the Celtic Sea to the southwest.');

    $vietnamCountry->setSlogan('Vietnam is the easternmost country on the Indochina Peninsula. With an estimated 94.6 million inhabitants as of 2016, it is the 15th most populous country in the world.');

    $englandCountry->sayHello(); // Hello
    echo "<br>";
    $vietnamCountry->sayHello(); // Xin chao
    echo "<br>";

    var_dump($englandCountry->checkValidSlogan()); // true
    echo "<br>";
    var_dump($vietnamCountry->checkValidSlogan()); // false
    echo "<br>";
    // Tạo Trait có tên 'Active'
    // Sử dụng để in ra tên class sau khi chạy các lệnh sau (gợi ý: dùng get_class())
    trait Active {

        public function defindYourSelf()
        {
        return get_class($this);
        }
    
    }
    echo 'I am ' . $englandCountry->defindYourSelf(); 
    echo "<br>";
    echo 'I am ' . $vietnamCountry->defindYourSelf(); 

?>
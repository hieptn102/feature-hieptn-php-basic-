<?php
    //Bai1
    Class ExerciseString
    {
        public $Check1;
        public $Check2;
        function readFile($filetextr){
            $data = file_get_contents("$filetextr");
            return $data;
        }
        function checkValidString($s){
            if(strpos($s, "book") !== false){
                if(strpos($s, "restaurant") !== false){
                    echo "Chuỗi không hợp lệ";
                    return false;
                }else{
                    $count="0";  
                    for($x="0"; $x < strlen($s); $x++)  
                    {   
                        if(substr($s,$x,1) == ".")  
                        {  
                        $count = $count+1;  
                        }  
                    }
                    echo "Chuỗi hợp lệ. Chuỗi bao gồm " .$count. " câu" ;
                    return true;
                    }
            }elseif(strpos($s, "restaurant") !== false){
                $count="0";  
                for($x="0"; $x < strlen($s); $x++)  
                {   
                    if(substr($s,$x,1) == ".")  
                    {  
                    $count = $count+1;  
                    }  
                }
                echo "Chuỗi hợp lệ. Chuỗi bao gồm " .$count. " câu" ;
                return true;
            }else{
                echo "Chuỗi không hợp lệ";
                return false;
            }
        }
        function writeFile($textw){
            $myfile = fopen("result_file.txt", "a") or die("Unable to open file!");
            $txt = "$textw ||";
            fwrite($myfile, $txt);
            fclose($myfile);
        }
    }
    //Bai2
    $object1 = new ExerciseString();
    $str = $object1->readFile("file1.txt");
    echo"Chuỗi 1 => ";
    $cVS=$object1->checkValidString("$str");
    $object1->Check1=$cVS;
    echo "<br>";
    $str = $object1->readFile("file2.txt");
    echo"Chuỗi 2 => ";
    $cVS=$object1->checkValidString("$str");
    echo "<br>";

    if($object1->Check1==true){
        echo("Check 1 là chuỗi hợp lệ ");
        $object1->writeFile("Check 1 là chuỗi hợp lệ ");
    }else{
        echo("Check 1 la chuỗi không hợp lệ");
        $object1->writeFile("Check 1 la chuỗi không hợp lệ ");
    }
    echo "<br>";
    if($object1->Check2==true){
        $s="file2.txt";
        $count="0";  
        for($x="0"; $x < strlen($s); $x++)  
        {   
            if(substr($s,$x,1) == ".")  
            {  
            $count = $count+1;  
            }  
        }
        echo("Check 2 là chuỗi hợp lệ. Chuỗi có".$count. " câu");
        $object1->writeFile("Check 2 là chuỗi hợp lệ. Chuỗi có".$count. " câu");
    }else{
        $s="file2.txt";
        $count="0";  
        for($x="0"; $x < strlen($s); $x++)  
        {   
            if(substr($s,$x,1) == ".")  
            {  
            $count = $count+1;  
            }  
        }
        echo("Check 2 là chuỗi không hợp lệ. Chuỗi có ".$count." câu");
        $object1->writeFile("Check 2 là chuỗi không hợp lệ. Chuỗi có".$count." câu");
    }
?>
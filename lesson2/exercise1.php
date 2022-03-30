<?php   
    function checkValidString($s){
        if(strpos($s, "book") !== false){
            if(strpos($s, "restaurant") !== false){
                echo "Chuỗi không hợp lệ";
            }else{
                $count="0";  
                for($x="0"; $x < strlen($s); $x++)  
                {   
                    if(substr($s,$x,1) == ".")  
                    {  
                    $count = $count+1;  
                    }  
                }
                echo "Chuỗi  hợp lệ. Chuỗi bao gồm " .$count. " câu" ;
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
            echo "Chuỗi  hợp lệ. Chuỗi bao gồm " .$count. " câu" ;
        }else{
            echo "Chuỗi không hợp lệ";
        }
    }
    
    $fp = fopen("file1.txt", "r");
    $contents = fread($fp, filesize("file1.txt"));
    echo "<pre>$contents</pre>";
    checkValidString($contents);
    fclose($fp);

    $fp = fopen("file2.txt", "r");
    $contents = fread($fp, filesize("file2.txt"));
    echo "<pre>$contents</pre>";
    checkValidString($contents);
    fclose($fp);
?>
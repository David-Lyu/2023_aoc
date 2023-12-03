<?php
$inputText = 'Test';
$file_name = getcwd() . '/day3/textstring.txt';
$file = fopen($file_name,'a+');
$total = 0;
if($file) {
    $inputText = fread($file, filesize($file_name));

    $arr_str = str_mover($inputText);
    $count = count($arr_str);

    echo(execute($arr_str, $total));
    // echo($total);

    fclose($file);
}

// Helper functions
function str_mover(String $str) {
    
    // return explode('/\r\n|\n/', $str);
    return $array = preg_split("/\r\n|\n|\r/", $str);
}

function execute($arr, &$total) {

    $symbolArr = [];

    for($i = 0; $i < count($arr); $i++) {
        $match = preg_match_all('/[\!\@\#\$\%\^\&\*]/',$arr[$i], $symbolArr, PREG_OFFSET_CAPTURE);
        // echo(count($symbolArr));
        if(!$match) {
            continue;
        }
        if($i === 2 ) {
            var_dump($symbolArr[0][1][1]);
        }

        for($j = 0; $j < count($symbolArr[0]); $j++) {
            if($i === 0) {
                // $total = $symbolArr[0][$j][]
            } else if($i === count($arr) - 1) {
    
            } else {
    
            }
        }
        
    }
    
    var_dump($symbolArr);
    
    return null;
}
?>
<?php
$inputText = 'Test';
$file_name = getcwd() . '/day3/textstring.txt';
$file = fopen($file_name,'a+');
$total = 0;
if($file) {
    $inputText = fread($file, filesize($file_name));

    $arr_str = preg_split("/\r\n|\n|\r/", $inputText);
    $count = count($arr_str);

    execute($arr_str, $total);
    var_dump($total);

    fclose($file);
}

// Helper functions
function execute($arr, &$total) {

    $symbolArr = [];

    for($i = 0; $i < count($arr); $i++) {
        $match = preg_match_all('/[^0-9]/',$arr[$i], $symbolArr, PREG_OFFSET_CAPTURE);
        $position = 0;
        if(!$match) {
            continue;
        }
        if($i === 2 ) {
            var_dump($symbolArr[0]);
        }
        
        
        for($j = 0; $j < count($symbolArr[0]); $j++) {
            $position = $symbolArr[0][$j][1];
            if($i === 0) {
                //not needed haha

                //bottom
            } else if($i === count($arr) - 1) {
                //top

    
            } else {
                //top
                $total += checkY($arr[$i - 1], $position);
                //bottom
                $total += checkY($arr[$i + 1], $position);
                //left
                $total += checkLeft($arr[$i],$position);
                //right
                $total += checkRight($arr[$i],$position);
    
            }
            echo($position . ':' . $total . "\n");
        }
        
    }
    
    return null;
}

function checkLeft(String $str, $pos) {
    if(preg_match('/[^0-9]/',$str[$pos -1])) {
        return 0;
    }
    $numberStr = '';
    $index = 0;
    while($str[$index] !== '.' && $index > 0) {
        $numberStr = $str[$index] . $numberStr;
        $index--;
    }

    return (int)$numberStr;
}

function checkRight(String $str, $pos) {
    if(preg_match('/[^0-9]/',$str[$pos + 1])) {
        return 0;
    }
    $numberStr = '';
    $index = 0;
    while($str[$index] !== '.' && strlen($str) -1 > $index) {
        $numberStr = $str[$index] . $numberStr;
        $index++;
    }

    return (int)$numberStr;
}

function checkY(String $str, $pos) {
    $shouldLookTop = true;
    $shouldLookDiagonalRight = true;
    //checks to see if it is a digit //could change it to 0-9 instead haha
    if(preg_match('/[0-9]/',$str[$pos - 1])) {
        //same check for the top
        if(preg_match('/[0-9]/',$str[$pos])) {
            $shouldLookTop = false;
            //same check for diag right
            if(preg_match('/[0-9]/',$str[$pos + 1])) {
                $shouldLookDiagonalRight = false;
            }
        }
    } else {
        //if it has these characters
        if(preg_match('/[^0-9]/',$str[$pos])) {
            //no match
            if(preg_match('/[^0-9]/',$str[$pos + 1])) {
                return 0;
            }
        }
    }

    $numberLeft = 0;
    $number = 0;

    $numberLeft = checkLeft($str, $pos -1);
    if($shouldLookTop) {
        $numberLeft += checkRight($str, $pos);
    }
    if($shouldLookDiagonalRight) {
        $number += checkRight($str, $pos + 1);
    }
    return $numberLeft + $number;
}

?>
<?php
$inputText = 'Test';
$file_name = getcwd() . '/day3/textstring.txt';
$file = fopen($file_name,'a+');
$total = 0;
if($file) {
    $inputText = fread($file, filesize($file_name));

    $arr_str = preg_split("/\r\n|\n|\r/", $inputText);
    $count = count($arr_str);

    echo(execute($arr_str, $total));
    // echo($total);

    fclose($file);
}

// Helper functions
function execute($arr, &$total) {

    $symbolArr = [];

    for($i = 0; $i < count($arr); $i++) {
        $match = preg_match_all('/[\!\@\#\$\%\^\&\*]/',$arr[$i], $symbolArr, PREG_OFFSET_CAPTURE);
        // echo(count($symbolArr));
        if(!$match) {
            continue;
        }
        if($i === 2 ) {
            var_dump($symbolArr[0][0][1]);
            // echo($symbolArr[0][1][1]);
            // echo($symbolArr[0][1][0]);
        }

        for($j = 0; $j < count($symbolArr[0]); $j++) {
            if($i === 0) {
                //not needed haha

                //bottom
            } else if($i === count($arr) - 1) {
                //top

    
            } else {
                //top

                //bottom

                //left

                //right
    
            }
        }
        
    }
    
    var_dump($symbolArr);
    
    return null;
}

function checkLeft(String $str, $pos) {
    if($str[$pos -1] === '.') {
        return;
    }
    $numberStr = '';
    $index = 0;
    while($str[$index] !== '.') {
        $numberStr = $str[$index] . $numberStr;
        $index--;
    }

    return (int)$numberStr;
}

function checkRight(String $str, $pos) {
    if($str[$pos + 1] === '.') {
        return;
    }
    $numberStr = '';
    $index = 0;
    while($str[$index] !== '.') {
        $numberStr = $str[$index] . $numberStr;
        $index++;
    }

    return (int)$numberStr;
}

function checkTop(String $str, $pos) {
    if($str[$pos - 1] !== '.') {
        if($str[$pos] !== '.') {
            $shouldLookTop = false;
            if($str[$pos + 1] !== '.') {
                $shouldLookDiagonalRight = false;
            }
        }
    }

    $numberStr = '';

    $numberStr = checkLeft($str, $pos -1) + checkRight($str,$pos);
    $shouldLookTop = true;
    $shouldLookDiagonalRight = true;
}

function checkBottom(String $str, $pos) {

}

?>
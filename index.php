<?php
function binarySearch($file, $searchingKey){
    $handle = fopen($file, "r");

    while(!feof($handle)){
        $data = fgets($handle);
        $split = explode('\x0A', $data);

        foreach($split as $key => $value){
            $arr[] = explode('\t', $value);
        }

        $start = 0;
        $end = count($arr) - 1;

        while ($start <= $end) {
            $half = floor(($start + $end) / 2);
            $check = strnatcmp($arr[$half][0], $searchingKey);
            if ($check == 0){
                return $arr[$half][1];
            } elseif ($check < 0){
                $start = $half + 1;
            } elseif ($check > 0){
                $end = $half - 1;
            }
        }
    }
    return 'undef';
}
?>
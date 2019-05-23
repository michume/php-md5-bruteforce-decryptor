<?php

$hash = '23fd2dbc8ef630e4d4eb657d32a809d1';

$alphabet = range('a', 'z');
$alphabetCount = count($alphabet);
$maxLettersSearch = 10;

for($lettersCount=1; $lettersCount<$maxLettersSearch; $lettersCount++) {
    $combinations = pow($alphabetCount, $lettersCount);
    echo("\rTest dla liczby znaków $lettersCount liczba kombinacji $combinations\n");
    for ($j=0; $j<$combinations; $j++) {
        if ($lettersCount == 1) {
            $hashToCalculate = $alphabet[$j];
        } else {
            $hashToCalculate = '';
            $temp = $j;
            while ($temp > 0) {
                $div = floor($temp/$alphabetCount);
                $rest = $temp % $alphabetCount;
                $hashToCalculate .= $alphabet[$rest];
                $temp = $div;
            }
            $hashCount = strlen($hashToCalculate);
            if ($hashCount !== $lettersCount && $lettersCount - $hashCount > 0) {
                $hashToCalculate = $hashToCalculate. str_repeat($alphabet[0], $lettersCount - $hashCount);
            }
        }
            
        if (md5($hashToCalculate) === $hash) {
            echo "\rHash: $hashToCalculate\n";
            exit();
        }
    }
}

echo "\rNot found!\n";

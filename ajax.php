<?php

function isPrime($n) {
    if ($n <= 1) {
        return false;
    }
    if ($n <= 3) {
        return true;
    }
    if ($n % 2 == 0 || $n % 3 == 0) {
        return false;
    }
    for ($i = 5; $i * $i <= $n; $i += 6) {
        if ($n % $i == 0 || $n % ($i + 2) == 0) {
            return false;
        }
    }
    return true;
}
$primeNumbers = array();

if (isset($_POST['numPrimes']) && isset($_POST['lastDigit'])) {
    $numPrimes = intval($_POST['numPrimes']);
    $lastDigit = intval($_POST['lastDigit']);

    $number = 2; // A prímek generálását 2-től kezdjük
    $primeCount = 0;

    if ($lastDigit % 2 == 1 || $lastDigit == 2) {
        while ($primeCount < $numPrimes) {
            if (isPrime($number) && $number % 10 == $lastDigit) {
                $primeNumbers[] = $number;
                $primeCount++;

                if ($lastDigit == 5 || $lastDigit == 2) {
                    // Ha a kiválasztott számjegy 5 vagy 2
                    break;
                }
            }
            $number++;
        }
    }
   

    if (empty($primeNumbers)) {
        echo json_encode(array('eredmenyek' => array())); // Üres tömb visszaadása
    } else {
        echo json_encode(array('eredmenyek' => $primeNumbers));
    }
    }

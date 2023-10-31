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

if (isset($_POST['numPrimes']) && isset($_POST['lastDigit'])) {
    $numPrimes = intval($_POST['numPrimes']);
    $lastDigit = intval($_POST['lastDigit']);

    $primeNumbers = [];
    $number = 2; // A prímek generálását 2-től kezdjük
    $primeCount = 0;

    if ($lastDigit % 2 == 1 || $lastDigit == 2) {
        while ($primeCount < $numPrimes) {
            if (isPrime($number) && $number % 10 == $lastDigit) {
                $primeNumbers[] = $number;
                $primeCount++;

                if ($lastDigit == 5 || $lastDigit == 2) {
                    // Ha a kiválasztott számjegy 5 vagy páros, akkor csak páros prímszámokat keresünk
                    break;
                }
            }
            $number++;
        }
    }

    if (empty($primeNumbers)) {
        echo "Nincs eredmény a kiválasztott feltételek alapján.";
    } else {
        echo "A keresett prímszámok:\n";
        foreach ($primeNumbers as $prime) {
            echo $prime . "\n";
        }
    }
}

?>

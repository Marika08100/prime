<?php
if (isset($_POST['numPrimes']) && isset($_POST['lastDigit'])) {
    $numPrimes = intval($_POST['numPrimes']);
    $lastDigit = intval($_POST['lastDigit']);

    $primes = array();
    $i = 2;

    while (count($primes) < $numPrimes) {
        if ($i % 10 == $lastDigit && isPrime($i)) {
            $primes[] = $i;
        }
        $i++;
    }

    $result = implode(', ', $primes); // Eredmények stringgé alakítása, vesszővel elválasztva
    echo $result;
}

function isPrime($num) {
    if ($num <= 1) return false;
    if ($num <= 3) return true;

    if ($num % 2 == 0 || $num % 3 == 0) return false;

    for ($i = 5; $i * $i <= $num; $i += 6) {
        if ($num % $i == 0 || $num % ($i + 2) == 0) return false;
    }

    return true;
}
?>

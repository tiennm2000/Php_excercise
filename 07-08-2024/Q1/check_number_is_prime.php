<?php
function isPrime(int $x): bool
{
    if ($x < 2) {
        return false;
    }

    for ($i = 2; $i < sqrt($x); $i++) {
        if (!$x % $i) {
            return false;
        }
    }

    return true;
}

//test with number 29

echo isPrime(29);
<?php
declare(strict_types=1);

// Bao gồm class C
include_once 'C.php';

// Class B kế thừa class C
class B extends C {
    public function b1() {
        echo "This is function b1 from class B \n";
    }
}

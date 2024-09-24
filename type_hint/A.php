<?php
declare(strict_types=1);

// Bao gồm class C
include_once 'C.php';

// Class A kế thừa class C
class A extends C {
    public function a1() {
        echo "This is function a1 from class A\n";
    }
}

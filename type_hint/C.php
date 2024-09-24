<?php

// C.php
declare(strict_types=1);

// Bao gồm interface I
include_once 'I.php';

// Class C hiện thực interface I
class C implements I {
    public function f() {
        echo "This is function f from class C\n";
    }
}
<?php

declare(strict_types=1);

// các lớp và interface cần thiết
include_once 'I.php';
include_once 'A.php';
include_once 'B.php';
include_once 'C.php'; 

class Demo {

    public function typeAReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A();
    }

    public function typeAReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeAReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeAReturnI(): I { 
        echo __FUNCTION__ . "<br>";
        return new C(); // Cần phải có lớp hiện thực I
    }

    public function typeAReturnNull(): ?A {
        echo __FUNCTION__ . "<br>";
        return null;
    }

    public function typeBReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A();
    }

    public function typeBReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeBReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeBReturnI(): I { 
        echo __FUNCTION__ . "<br>";
        return new C(); // Cần phải có lớp hiện thực I
    }

    public function typeBReturnNull(): ?B {
        echo __FUNCTION__ . "<br>";
        return null;
    }

    public function typeCReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A();
    }

    public function typeCReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeCReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeCReturnI(): I { 
        echo __FUNCTION__ . "<br>";
        return new C(); // Cần phải có lớp hiện thực I
    }

    public function typeCReturnNull(): ?C {
        echo __FUNCTION__ . "<br>";
        return null;
    }

    public function typeIReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A();
    }

    public function typeIReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeIReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeIReturnI(): I { 
        echo __FUNCTION__ . "<br>";
        return new C(); // Cần phải có lớp hiện thực I
    }

    public function typeIReturnNull(): ?I {
        echo __FUNCTION__ . "<br>";
        return null;
    }

    public function typeNullReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A();
    }

    public function typeNullReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B();
    }

    public function typeNullReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C();
    }

    public function typeNullReturnI(): I { 
        echo __FUNCTION__ . "<br>";
        return new C(); // Cần phải có lớp hiện thực I
    }

    public function typeNullReturnNull(): null {
        echo __FUNCTION__ . "<br>";
        return null; 
    }
}

// Tạo đối tượng từ lớp Demo
$demo = new Demo();

// gọi phương thức

$demo->typeAReturnA();
$demo->typeAReturnB();
$demo->typeAReturnC();
$demo->typeAReturnI();
$demo->typeAReturnNull();

$demo->typeBReturnA();
$demo->typeBReturnB();
$demo->typeBReturnC();
$demo->typeBReturnI();
$demo->typeBReturnNull();

$demo->typeCReturnA();
$demo->typeCReturnB();
$demo->typeCReturnC();
$demo->typeCReturnI();
$demo->typeCReturnNull();

$demo->typeIReturnA();
$demo->typeIReturnB();
$demo->typeIReturnC();
$demo->typeIReturnI();
$demo->typeIReturnNull();

$demo->typeNullReturnA();
$demo->typeNullReturnB();
$demo->typeNullReturnC();
$demo->typeNullReturnI();
$demo->typeNullReturnNull();

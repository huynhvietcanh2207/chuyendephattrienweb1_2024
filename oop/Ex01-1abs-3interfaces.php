<?php

// Example 01 in OOP_Diagram.drawio
// include ('MyClass.php');
include('MyAbstract.php');
include('MyInterface.php');

// Single Abstract, Many Interfaces
class Ex01 extends AbsA implements IA, IB, IC {
    
    // Triển khai phương thức trừu tượng NotDeclare từ AbsA và IA
    function NotDeclare(): void {
        echo 'Triển khai phương thức NotDeclare từ AbsA và IA';
    }
    
    // Triển khai phương thức func_from_Ab1_no_body từ AbsA
    function func_from_Ab1_no_body(): void {
        echo 'Abstract 01 no body from Ex01';
    }
 
    // Triển khai phương thức từ IB
    function func_from_Int1(): void {
        echo "Triển khai phương thức func_from_Int1 từ IB";
    }

    // Triển khai phương thức từ IC
    function func_from_Int2(): void {
        echo "Triển khai phương thức func_from_Int2 từ IC";
    }
}


// $ex = new Ex01();
// $ex01->func_from_Int1();
   
// Tạo đối tượng và gọi các phương thức
$ex = new Ex01();
$ex->Declare();  // Gọi phương thức đã được định nghĩa trong AbsA
echo "<br>";
$ex->NotDeclare();  // Gọi phương thức đã triển khai từ AbsA và IA
echo "<br>";
$ex->func_from_Int1();  // Gọi phương thức từ IB
echo "<br>";
$ex->func_from_Int2();  // Gọi phương thức từ IC

// public function func_from_Abs1(){
    //     echo 'b';
    // }
    
    // public function func_from_Abs2(){
    //     echo 'Abstract 02';
    // }
    
    // public function func_from_Abs3(){
    //     echo 'Abstract 03';
    // }

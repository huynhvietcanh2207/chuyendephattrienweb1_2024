<?php

include('MyClass.php');
include('MyAbstract.php');
include('MyInterface.php');

// Sử dụng trait cho Abstract2 nếu cần nhiều chức năng
trait Abstract2Trait {
    function func_from_Abs2() {
        echo 'Triển khai phương thức từ Abstract2';
    }
}

// Kế thừa một lớp trừu tượng và sử dụng trait
class Ex02 extends AbsA implements IA, IB, IC{
    // Dùng trait Abstract2
    use Abstract2Trait;
    
    // Triển khai phương thức trừu tượng từ Abstract1
    function func_from_Ab1_no_body(){
        echo 'Triển khai phương thức từ Abstract1';
    }
 
    // Triển khai phương thức từ Interface1
    function func_from_Int1(){
        echo 'Triển khai phương thức từ Interface1';
    }

    // Triển khai phương thức từ Interface2
    function func_from_Int2(){
        echo 'Triển khai phương thức từ Interface2';
    }

    // Triển khai phương thức từ Interface3
    function func_from_Int3(){
        echo 'Triển khai phương thức từ Interface3';
    }
}

// Tạo đối tượng và gọi các phương thức
$ex = new Ex02();
$ex->func_from_Ab1_no_body(); // Gọi phương thức từ Abstract1
echo "<br>";
$ex->func_from_Int1(); // Gọi phương thức từ Interface1
echo "<br>";
$ex->func_from_Int2(); // Gọi phương thức từ Interface2
echo "<br>";
$ex->func_from_Int3(); // Gọi phương thức từ Interface3
echo "<br>";
$ex->func_from_Abs2(); // Gọi phương thức từ trait Abstract2

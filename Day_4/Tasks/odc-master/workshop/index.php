<?php

// Types

// 1 / User defined function -> void / Returning value function
// 2 / Variable function
// 3 / Internal (in-built) function
// 4 / Anonymous function

























 // Definition

function functionName() { //def
    // code to be executed;
}


function bar($arg1, $arg2,…,){   //formal
    // echo “test function”;
}

bar($arg1, $arg2,…,);   //actual  (arguments) // call
















// User defined function ----------->  Void

function SayHello() { 

    echo "Hello";
}

SayHello();




//parameters
function familyName($fname, $year) { 

    echo "$fname Hassan. Born in $year <br>";
}
  
familyName("Ahmed", "1975");


















// User defined function ----------->  Returning value

// function addNumbers(float $a, float $b) : int {

//     return (int)($a + $b); //return
//   }

// echo addNumbers(1.2, 5.2);




















function addFunction($num1, $num2) { // operations

    $sum = $num1 + $num2;
    echo "Sum of the two numbers is : $sum";
 }
 
 addFunction(10, 20);

















// 4 nested functions
function foo() 
{
  function bar() 
  {
    echo "I don't exist until foo() is called.\n";
  }
}




















// 5 recursion with functions
function recursion($a)
{
    if ($a < 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}


















// variable function

empty(), is_bool(), is_array(), gettype();
















// built in functions

fopen(), print_r(), gettype(), count(), print_r();

// User Defined Functions : Apart from the built-in functions
// PHP allows us to create our own customised functions















function functionName() { //def
    // code to be executed;
}


// Anonymous functions also known as closures have no specified name.
echo preg_replace_callback('-([a-z])', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world');
// outputs helloWorld











//==============================================================================================================================

// Arrow function  

$z = 1;
$fn = fn($x) => fn($y) => $x * $y + $z;
// Outputs 51
var_export($fn(5)(10));
















// call by value
function increment1($i)  
{  
    $i++;  
}  
$i = 10;  
increment1($i);  
echo $i;  // 10














// call by refernce
function increment2(&$i)  
{  
    $i++;  
}  
$i = 10;  
increment2($i);  
echo $i;  // 11

<?php
//Task 1
// $Array = [
//     "name" => "Noureldin",
//     "lname" => "Farag",
//     "age" => 21,
//     "city" => "Alexandria"
// ];
// 
// $size = count($Array);
// $keys = array_keys($Array);
// for($i = 0;$i<$size;$i++){
//     echo $Array[$keys[$i]]."<br>";
// }
//===================================================================================
//Task 2
// $persons = [
//     [
//         "name"=>"mohamed",
//         "age"=>20
//     ],
//     [
//         "name"=>"eslam",
//         "age"=>30
//     ],
//     [
//         "name"=> "radwa",
//         "age"=>10
//     ]
// ];
// 
// foreach($persons as $values){
//     foreach($values as $x => $y){
//         echo $x.": ".$y."<br>";   
//     }
//     echo "<hr>";
// }
//=================================================================================
//Task 3
// $accounts = [
//     [1,2,3],
//     [4,5,6],
//     [7,8,9]
// ];

// $max = 0;
// $indmax = 0;
// foreach($accounts as $values){
// $sum = 0;
//     foreach($values as $y => $x){
//         $sum += $x;
//         if($sum > $max){
//             $max = $sum;
//             $indmax = $y;
//         }
//     }
// }
// echo "Maximum value equals ".$max." at index ".$indmax;
//================================================================================
//Task 4
// $n = 15;
// for($i=1;$i<=$n;$i++){
//     if($i % 5 == 0 && $i % 3 == 0){
//         echo "fizzbuzz<br>";
//     }elseif($i % 5 == 0){
//         echo "buzz<br>";
//     }elseif($i % 3 == 0){
//         echo "fizz<br>";
//     }else{
//         echo $i."<br>";
//     }
// }
//=========================================================================================================
//Task 5
// echo $_POST["num1"] + $_POST["num2"];
//==============================================================================================================
//Task 6
// $num = $_POST["num1"];
// $name = $_POST["num2"];

// for($i=0;$i<=100;$i++){
//     if($i == $num){
//         echo $name."<br>";
//     }else{
//         echo $i."<br>";
//     }
// }
//=========================================================================================================================
//Task 7
// function func($ip){

//     for($i=0;$i<strlen($ip);$i++){
//         if($ip[$i] == "."){
//             $ip[$i] = "[.]";
//         }
//     }
//     return $ip;
// }

// echo func("255.100.50.1");
//=====================================================================================================================================
//Task 8
// function func($ip){
//     $s1="";
//     $s2="";
//     for($i=0;$i<strlen($ip);$i++){

//         if($ip[$i] == "."){
//             $s1 = $s1.substr($ip,0,$i);
//             $s2 = $s2.$s1."[.]".substr($ip,$i+1);
//         }
//     }
//     return $s2;
// }

// echo func("255.100.50.1");
//==================================================================================================================================
//Task 9

//print

// function reverse($str){
//     $size = count($str);
//     for($i=$size-1;$i>=0;$i--){
//         echo $str[$i]." ";
//     }
// }

// $arr = ["m","o","h","a","m","e","d"];
// reverse($arr);

//---------------------------------------------------------------------------------------------------------
//Array

// function reverse($str){
//     $rev = [];
//     $size = count($str);
//     for($i=$size-1;$i>=0 && $k<$size;$i--,$k++){
//         $rev[] = $str[$i];
//     }
//     return $rev; 
// }

// $arr = ["m","o","h","a","m","e","d"];
// print_r(reverse($arr));
//===================================================================================================================================

// function numberOfSteps($num)
// {
//     $count = 0;
//     while ($num > 0) {
//         if ($num % 2 == 0) {
//             $num = $num / 2;
//             $count++;
//         } else {
//             $num -= 1; 
//             $count++;
//         }
//     }
//     return $count;
// }

// echo numberOfSteps(14);






// var bagOfTokensScore = function(tokens, power) {
//     tokens.sort((a, b) => a - b);
    
//     let s = 0, max = 0, left = 0, right = tokens.length - 1;
    
//     while(left <= right) {
//         if(power >= tokens[left]) {
//             power -= tokens[left];
//             s++;
//             left++; 
//         } else if(s >= 1) {
//             power += tokens[right];
//             s--;
//             right--;
//         } else {
//             break;
//         }
        
//         max = Math.max(max, s);
//     }
    
//     return max;
// };


































// Types

// 1 / User defined function -> void / Returning value function
// 2 / Variable function
// 3 / Internal (in-built) function
// 4 / Anonymous function



















 // Definition

function functionName() { //def
    // code to be executed;
}

function bar($arg1, $arg2,…,){
    // echo “test function”;
}


















// User defined function ----------->  Void

//parameters
function familyName($fname, $year) {  //formal

    echo "$fname Refsnes. Born in $year <br>";
}
  
familyName("Hege", "1975"); //actual  (arguments) // call


















// User defined function ----------->  Returning value

function addNumbers(float $a, float $b) : int {
    return (int)($a + $b); //return
  }

echo addNumbers(1.2, 5.2);




















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

empty(), is_bool(), is_array(), gettype()
















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

$y = 1;

$fn1 = fn($x) => $x + $y;
// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn1(3));
//==============================================================================================================================
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

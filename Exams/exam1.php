<!-- question 1 :

1- The output is : 
   "somerar is 16". 

2- The output is :
   Null or undefined

3- The output is :
   'false' because false is string 

############################################################## -->
<!-- Question 2 -->
<!-- 1- Write a PHP program to print fibonacci series.  -->

<?php

function fibonacci_series($num){
    if ($num == 0){
        return 0 ;
    }
    elseif ($num == 1){
        return 1;
    }
    else {
        return fibonacci_series($num-1) + fibonacci_series($num-2);
    }
}
$num = 10;
for($i= 0; $i < $num ; $i++) { 
        echo fibonacci_series($i),' ';
    }
?> 
<!-- ###################################################################### -->
<!-- 2- . How do you check if a year is leap or not?  -->
<?php
function is_year_leap($year){
    if ($year % 4 == 0 && $year % 100 != 0 ){
        return "$year is a leap year";
    }
    elseif ($year % 4 == 0 && $year % 100 == 0 & $year % 400 == 0){
        return "$year is a leap year";
    }
    else {
        return "$year is not a leap year";
    }
}
echo is_year_leap(2007);
?>
<!-- ############################################################# -->
<!-- 3- Write a PHP script to generate unique random numbers within a 
range  -->

<?php
$number =  random_int(1, 1000);
echo $number;
?>
<!-- ###################################################################### -->
<!-- 4- Write a PHP program to print out the multiplication table upto 5*5  -->
<?php 
for ($i=0; $i <= 5 ; $i++) { 
    $mul = $i * 5;
    echo "$i * 5 = $mul <br>" ;
}

?>
<!-- ################################################################## -->
<!-- 5- Write a PHP program to remove duplicates from a sorted list  -->

<?php 
function remove(...$my_arr) {
    $new_nums = array_values(array_unique($my_arr));
    return $new_nums ;
}
print_r(remove(1,2,3,4,5,6,67,8,1,1,2,3,3,4));
?>

<!-- ################################################################### -->
<!-- 6 -->

<?php 
class Animal {
    private string $name ;

    public function animal(string $name){
        $this->name = $name ;
    }
    public function toString():void {
        echo $this->name;
    }
}
class Mammal Extends Animal {
}
class cat Extends Mammal {
    public function greets():void{
        echo 'Meow';
    }
}
class dog Extends Mammal {
    public function greets():void{
        echo 'Woof';
    }
}

$cat = new cat() ;
$cat->greets();
?>
<!-- ############################################################ -->
<!-- Question 3 : True Or False  -->

1- False
2- False
3- True
4- True
5- False

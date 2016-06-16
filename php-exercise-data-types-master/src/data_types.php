<?php

//convert_to_int();
//convert_to_float();
//convert_to_string();
//convert_to_bool();
//convert_to_array();
//convert_to_null();

$input = "wtf";

function convert_to_int($input){
    echo (int)$input;
}


function convert_to_float($input){
    if (is_numeric($input)) {
    echo (float)$input;
    } else {
    echo "0.0";
    }
}


function convert_to_string($input){
if (is_array($input)){
    $inputs = implode(", ", $input);
    echo $inputs;
} else if (is_numeric($input)){
    echo sprintf($input);
} else {
    echo " ";
}
}


function convert_to_bool($input){
 if (boolval($input) ==1) {
     echo "TRUE";
 } else {
     echo "FALSE";
 }}


function convert_to_array($input){
    if (!is_array($input)){   
    $inputs =settype($input, "array");
    echo $inputs;
} else if (is_array($input)) {
    echo $input;
} else {
    echo "[]";
}
}
    

function convert_to_null($input){
if (is_null($input)){
    echo NULL;
}else{
    echo $input;
}
}
//convert_to_int($input);
//convert_to_float($input);
//convert_to_string($input);
//convert_to_bool($input);  
convert_to_array($input);
//convert_to_null($input);

?>
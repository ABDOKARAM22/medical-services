<?php
#the function check if the input is impty..
function is_empty($input){

    if(empty($input)){
       return true;
    }
}
#the function check if the email is valid..
function valid_email($input){
    if(filter_var($input,FILTER_VALIDATE_EMAIL)){
        filter_var($input,FILTER_SANITIZE_EMAIL);
        return true;
    }
}

#the function check if the input more than the limet..
function length_max($input,$number_max){
    if(strlen($input)>$number_max){
        return true;
    }
}
#the function check if the input leth than the limet..

function length_minmum($input,$number_minmum){
    if(strlen($input)<$number_minmum){
         return true;
}
}
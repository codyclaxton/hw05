<?php
/*
Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/form-handle/form-handle.html
*/
require_once('okaymon-constants.php');

/**
 * Prints all error messages 
 * invalid_message_array - array filled with invalid messages or empty
 */
function allErrorMessages($form_info){
    $new_array = buildErrorMessages($form_info);

    foreach($new_array as $message){
        if(strlen($message)>=1){
        echo $message . "<br>";
        }
    }
}
/** Returns any errors within form
 * $form_data - Should be in an array[] 
 * --Returns a new array filled with any message that returned a length > 0(it has an error)
 * or an empty array
 */
function buildErrorMessages($form_data){
    global $okaymon_form_fields_maxLength;
    global $okaymon_energyStrength_types;
    global $okaymon_energy_types;
    global $all_fields;

    $message_array = array();
    $trainer_message = trainer_validation($form_data['trainer'],5,$okaymon_form_fields_maxLength['trainer']);
    if(strlen($trainer_message) > 0){
        $message_array['trainer'] = $trainer_message;
    }
    $species_message = species_validation($form_data['species'],$okaymon_form_fields_maxLength['species']); 
    if(strlen($species_message) > 0){
        $message_array['species'] = $species_message;
    }  
    $flavor_text_message = flavorText_validation($form_data['flavor'], isset($form_data['flavor']),$okaymon_form_fields_maxLength['flavor']);
    if(strlen($flavor_text_message) > 0){
        $message_array['flavor'] = $flavor_text_message;
    }  
    
    $weight_message = weight_validation($form_data['weight'],$okaymon_form_fields_maxLength['weight']);
    if(strlen($weight_message) > 0){
        $message_array['weight'] = $weight_message;
    }  
    $weight_units_message = weightUnits_pulldown_validation($form_data['conversion']);
    if(strlen($weight_units_message) > 0){
        $message_array['conversion'] = $weight_units_message;
    }  

    $energy_type_accurate = energyType_pulldown_validation($form_data['energy']);
    if(strlen($energy_type_accurate) > 0){
        $message_array['energy'] = $energy_type_accurate;
    }
    
    

    //For each energy type
    //Is it inside our constants array
    //If so does $form_data[$energy] = $energy_strength
   /* foreach($okaymon_energy_types as $energy){
        $valid = true;
        if(in_array($energy,$form_data)){
            foreach($okaymon_energyStrength_types as $type){
                if($form_data[$energy] = $type){
                    $valid = false;
                }
            }
        
        }
        if(!$valid){
            $message_array[$energy] = "<b>".$energy." </b> - " .$form_data[$energy]." -  is not a valid energy type";
        }
    }*/


    return $message_array;
}

/**
 * Requires trainer name to not be empty & atleast >= 5 characters and <= 50 character
 * $trainer_name - Okaymon trainer to be verified 
 * $min_length - the minimum length of trainers name
 * $max_length - maxmimum length of trainers name 
 * -Return error message if problems or empty string if $trainer_name is valid
 */
function trainer_validation($trainer_name,$min_length,$max_length){
    $trainer_error_message ="";

    if(strlen($trainer_name) < (int) $min_length){
        $trainer_error_message = "<b>Trainer</b> name must be atleast ".$min_length." characters long";
    } elseif(strlen($trainer_name) > (int)$max_length ){
        $trainer_error_message = "<b>Trainer</b> name may not be longer than ".$max_length." characters long";
    }
     return $trainer_error_message;

}

/**
 * Requires: 
 *  species type to not be null and at least 1 letter character
 * Length must be less than 25
 * $returns ONE error message based on length or letter character
 */
function species_validation($species_type,$max_length){ 
$stringMesaage;

if(preg_match("/[A-Za-z+]/",$species_type) < 1){
    $stringMesaage = "<b>Species</b> needs to have atleast 1 letter character";
}elseif(strlen($species_type)>(int) $max_length){
    $stringMesaage = "<b>Species</b> can not be ". (int) $max_length . " or more characters";
}else{
    $stringMesaage = "";
}
return $stringMesaage;

}
/**
 * Checks if flavor text is less 200 characters long if present
 * -$text - string - The description of flavor
 * -$field_present - boolean - If field is present 
 */
function flavorText_validation($text,$text_entered = null,$max_length){
    $message ="";
    /*if($text_entered = false){
        if(strlen($text)>0){
            $message = "<b>Flavor text</b> was submitted but with errors";
        }
    }*/

    if($text_entered = true){
        if(strlen($text) > $max_length){
            $message = "<b>Flavor text</b> must be less than 200 characters";
        }elseif(strlen($text) < 0){
            $message = "<b>Flavor text</b> must be more then 1 character";
        }
    }

    return $message;
}
/**
 * Weight must be < 10,000 and a non negative number
 */
function weight_validation($weight,$max_weight){
    $message = "";
    if( (int) $weight < 0){
        $message = "<b>Weight</b> must be greater then 0";
    }elseif( (int) $weight >= 10000){
        $message = "<b>Weight</b> must be less than 10,000";
    }   
    return $message;
}
/**
 * Dropdown values must be values specified in the list
 * $energy_type - string - The energy selected from our dropdown list.
 * Only energys inside are valid
 * @returns error message if anything other than a valid energy type is passed in
 */
function energyType_pulldown_validation($energy_type){
    $message = "";

    switch ($energy_type){
        case "clover":
        break;
        case "candle":
        break;
        case "spark":
        break;
        case "puddle":
        break;
        case "thinkin":
        break;
        default:
        $message = "<b>Energy Type</b> must be selected from drop down";
    }

    
return $message;
}
/**
 * verifies if only lbs or kgs was passed in
 * $weight_unit - string - type of weight selected from weight dropdown
 * @returns - error message if weight unit is not valid
 */
function weightUnits_pulldown_validation($weight_units){
    $message = "";

    switch($weight_units){
        case "lbs":
        break;
        case "kgs":
        break;
        default:
        $message = "<b>Weight</b> units must be lbs or kgs";
    }
    return $message;
}
/**
 * Radio table options must be valid options in the table
 * -
 */
function energyType_radioTable_validation($energy){
    $message;
    switch($energy){
        case "weak":
        $message = "";
        break;
        case "neutral":
        $message = "";
        break;
        case "resistant";
        $message = ""; 
        break;
        case "":
        $message = "";
        break;
        default:
        $message = "<b>Energy Strength</b> must be weak neutral or resistant";
    }
return $message;
}
/**
 * Checkbox must be checked
 */
function intellectual_property_validation(){
    
}

    
?>
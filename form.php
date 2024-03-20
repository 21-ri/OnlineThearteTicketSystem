<?php
// Define a class called formBuilder
class formBuilder
{
    // Define variables for the form ID and validators
    var $form_id; 
    var $validators=" ";
    
    // Function to build form elements
    function build($type,$name,$id,$class,$placeholder,$opt)
    {
        // Check the type of form element
        if ($type=="text") 
        {
            // Create an input field of type text
            $input="<input type='text' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
        }
        // Check if the type is date
        if ($type=="date") 
        {
            // Create an input field of type date
            $input="<input type='date' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
        }
        // Check if the type is number
        if ($type=="number") 
        {
            // Create an input field of type number
            $input="<input type='number' name='$name' id='$id' class='$class' $opt>";
            echo $input;
        }
        // Check if the type is email
        if ($type=="email") 
        {
            // Create an input field of type email
            $input="<input type='email' name='$name' id='$id' class='$class' $opt>";
            echo $input;
        }
        // Check if the type is password
        if ($type=="password") 
        {
            // Create an input field of type password
            $input="<input type='password' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
        }
        // Check if the type is radio
        if ($type=="radio") 
        {
            // Create a radio button
            $input="<input type='radio' name='$name' id='$id' class='$class' $opt>";
            echo $input;
        }
        // Check if the type is checkbox
        if ($type=="checkbox") 
        {
            // Create a checkbox
            $input="<input type='checkbox' name='$name' id='$id' class='$class' $opt>";
            echo $input;
        }
        // Check if the type is textarea
        if ($type=="textarea") 
        {
            // Create a textarea
            $input="<textarea name='$name' id='$id' class='$class' placeholder='$placeholder' $opt></textarea>";
            echo $input;
        }
        // Check if the type is submit
        if ($type=="submit") 
        {
            // Create a submit button
            $input="<button type='submit' class='$class'>$opt</button>";
            echo $input;
        }
        // Check if the type is file
        if ($type=="file") 
        {
            // Create a file input field
            $input="<input type='file' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
        }
    }
    
    // Function to define validation rules for form elements
    function validate($name,$rules) 
    {
        // Add the field name to the list of validators
        $this->validators=$this->validators."
            $name: {
            verbose: false,
                validators: {";
        
        // Check if the 'required' rule is present
        if (in_array("required",$rules)) 
        {
            $label=$rules["label"];
            // Add the 'notEmpty' validator with an error message
            $this->validators=$this->validators."notEmpty: {
                        message: 'The $label is required and can\'t be empty'
                    }," ;
        }
        
        // Check if both 'min' and 'max' rules are present
        if (array_key_exists("min",$rules) && array_key_exists("max",$rules)) 
        {
            $label=$rules["label"];
            $min=$rules["min"];
            $max=$rules["max"];
            // Add the 'stringLength' validator with appropriate parameters and error message
            $this->validators=$this->validators."stringLength: {
                    min: $min,
                    max: $max,
                    message: 'The $label must be more than $min and less than $max characters long'
                }," ;
           
        }
        // Check if only the 'max' rule is present
        else if(array_key_exists("max",$rules)) 
        {
            $label=$rules["label"];
            $max=$rules["max"];
            // Add the 'stringLength' validator with the 'max' parameter and error message
            $this->validators=$this->validators."stringLength: {
                    max: $max,
                    message: 'The $label must be less than $max characters long'
                }," ;
        }
        // Check if only the 'min' rule is present
        else if(array_key_exists("min",$rules)) 
        {
            $label=$rules["label"];
            $min=$rules["min"];
            // Add the 'stringLength' validator with the 'min' parameter and error message
            $this->validators=$this->validators."stringLength: {
                    min: $min,
                    message: 'The $label must be more than $min characters long'
                }," ;
        }
        
        // Check if the 'regexp' rule is present
        if (array_key_exists("regexp",$rules)) 
        {
            $label=$rules["label"];
            $exp=$rules["regexp"];
            switch($exp) // selecting regular expression types
            {
                // Check for specific regular expression types and set the expression and error message accordingly
                case "name": 
                    $expression='/^[a-zA-Z ]+$/';
                    $err_msg="The $label can only consist of alphabets";
                    break;
                case "age":
                    $expression='/^(0?[0-9]?[0-9]|1[01][0-1]|11[0-1])$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "address":
                    $expression='/^[a-zA-Z0-9,\n ]+$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "place":
                    $expression='/^[a-zA-Z ,]+$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "pin":
                    $expression='/^[1-9][0-9]{5}$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "mobile":
                    $expression='/^([0|\+[9][1]{1,5})?([7-9][0-9]{9})$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "phone":
                    $expression='/^[0-9]\d{2,4}-\d{6,8}$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "number":
                    $expression='/^[0-9 ]+$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "text":
                    $expression='/^[a-zA-Z,. ]+$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "year":
                    $expression='/^[1-2]{1}[0-9]{3}$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "url":
                    $expression='/@^(http\:\/\/|https\:\/\/)?([a-z0-9][a-z0-9\-]*\.)+[a-z0-9][a-z0-9\-]*$@i/';
                    $err_msg="Enter a valid $label";
                    break;
            }
            // Add the 'regexp' validator with the expression and error message
            $this->validators=$this->validators."regexp: {
                        regexp: $expression,
                        message: '$err_msg'
                    },";
        }
        
        // Check if the 'email' rule is present
        if (in_array("email",$rules)) 
        {
            // Add the 'emailAddress' validator with an error message
            $this->validators=$this->validators."emailAddress: {
                        message: 'The input is not a valid email address'
                    },";
            
        }
        
        // Check if the 'identical' rule is present
        if (array_key_exists("identical",$rules)) 
        { 
            $identical=$rules["identical"];
            $identical_field= explode(" ",$identical);
            $idl=$identical_field[0];
            $label=$rules["label"];
            $msg="";
            for($i=1;$i<sizeof($identical_field);$i++) 
            {
                $msg=$msg.' '.$identical_field[$i];
            }
            // Add the 'identical' validator with the field and error message
            $this->validators=$this->validators."identical: {
                        field: '$idl',
                        message: 'The $msg and $label are not the same'
                    },";
        }
        
        // Check if the 'different' rule is present
        if (array_key_exists("different",$rules)) 
        { 
            $different=$rules["different"];
            $label=$rules["label"];
            $different_field= explode(" ",$different); 
            $msg="";
            $dff=$different_field[0];
            for($i=1;$i<sizeof($different_field);$i++)
            { 
                $msg=$msg.' '.$different_field[$i];
            }
            // Add the 'different' validator with the field and error message
            $this->validators=$this->validators."different: {
                        field: '$dff',
                        message: 'The $label and $msg must be different'
                    },";
        }
        
        // Check if the 'remote' rule is present
        if (array_key_exists("remote",$rules)) 
        {
            $remote=$rules["remote"];
            $label=$rules["label"];
            // Add the 'remote' validator with appropriate parameters and error message
            $this->validators=$this->validators."remote: {
                        message: 'Enter the $label',
                        url: '$remote',
                        type: 'POST',
                        delay: 2000
                    },";
        }
        
        // Remove the trailing comma from the validators string
        $this->validators=rtrim($this->validators,",");
        // Add the closing curly brace to the validators string
        $this->validators=$this->validators." } },";
        
    }
    
    // Function to apply the validations to the form
    function applyvalidations($form_id)
    {
        // Assign the form ID to the class variable
        $this->form_id=$form_id;
        
        // Print the JavaScript code for applying the validations
        echo "<script type='text/javascript'>
                $(document).ready(function() {
                    $('#$form_id').bootstrapValidator({".$this->validators."});
                });
              </script>";
    }
}
?>

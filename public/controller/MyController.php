<?php

require_once("/Applications/XAMPP/xamppfiles/htdocs/BucadJavier/Dental/private/includes/initializations.php");
require_once(PRIVATE_PATH . "helper-classes/Validator.php");

//use Validator;

class MyController
{
    protected $validator;

    protected $allowedAssocIndexes;
    protected $requiredVarsLengthArray;
    protected $isValidationOk;
    protected $errorsArray;
    protected $sanitizedVars;
    protected $json;

    public function __construct()
    {
        $this->validator = new Validator();
    }

    protected function tryValidate()
    {
        $this->validator->set_allowed_post_vars($this->allowedAssocIndexes);
        $this->validator->set_required_post_vars_length_array($this->requiredVarsLengthArray);

        $this->isValidationOk = $this->validator->validate();

        $this->errorsArray = $this->validator->get_json_errors_array();

        //
        if ($this->isValidationOk) {
            $this->setSanitizedVars();
        }
    }

    private function setSanitizedVars()
    {
        // Prepare the necessary data to pass to the controller.
        // Sanitized vars for passing to the controller.
        $sanitized_vars = array();
        foreach ($this->allowedAssocIndexes as $index) {

            if (is_request_post()) {
//                \MyDebugMessenger::add_debug_message("POST VAR: {$_POST[$index]}");
                $this->sanitizedVars[$index] = $_POST[$index];
            } else {
//                \MyDebugMessenger::add_debug_message("GET VAR: {$_POST[$index]}");
                $this->sanitizedVars[$index] = $_GET[$index];
            }


        }
    }
}
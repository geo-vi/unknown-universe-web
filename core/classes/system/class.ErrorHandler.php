<?php

class ErrorHandler
{
    protected $errors_ = [];
    public $error_msg = ErrorMessages::UNKNOWN_ERROR;
    public $error_title = "Unknown Error!";
    public $error = "";
    public $isError = false;

    /**
     * add Function add's new Error to Error-System
     *
     * @param        $ID
     * @param string $Title
     * @param string $Message
     *
     */
    public function add($ID, $Title, $Message)
    {
        $error = [
            "ID"      => $ID,
            "MESSAGE" => $Message,
            "TITLE"   => $Title,
        ];
        array_push($this->errors_, $error);
    }

    /**
     * handle Function
     */
    public function handle()
    {
        if (isset($_GET["error_id"]) && !empty($_GET["error_id"])) {
            $this->isError = true;
            $ID            = $_GET["error_id"];
        } else {
            $ID = "";
        }

        $this->error = $ID;
        foreach ($this->errors_ as $error) {
            if ($error['ID'] == $ID) {
                $this->error_msg   = $error['MESSAGE'];
                $this->error_title = $error['TITLE'];
            }
        }
    }

    /**
     * throwError Function
     * moves to Error template
     *
     * @param $ID
     */
    public function throwError($ID)
    {
        if (!$this->isError && $ID != $this->error) {
            header('location: ' . PROJECT_HTTP_ROOT . 'error?error_id=' . $ID);
        }
    }
}

abstract class ErrorID
{
    const FAILED_LOGIN        = "fail_login";
    const ACCESS_DENIED       = "access_denied";
    const EMAIL_COMPLETE      = "email_confirmed";
    const EMAIL_MISSING       = "email_missing";
    const VERIFICATION_FAILED = "verification_failed_invalid_code";
}

abstract class ErrorMessages
{
    const FAILED_LOGIN_MESSAGE           = "Your Login failed! Check your login data or try the forgot password function!";
    const EMAIL_VERIFICATION_MISSING     = "Your E-Mail isn't confirmed yet! We send you a E-Mail, check your Spam folder!";
    const EMAIL_VERIFICATION_FAILED_CODE = "Your Code is not valid!";
    const EMAIL_COMPLETE                 = "Your E-Mail is now confirmed! Thank you! Go ahead and login.";
    const ACCESS_DENIED                  = "You don't have access to this area!";
    const UNKNOWN_ERROR                  = "Unknown Error happend!";
}
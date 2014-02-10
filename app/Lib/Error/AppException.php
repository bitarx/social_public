<?php
class AppException extends CakeException {
 
    public $errmes = '';
    public function __construct($message = null, $code = 0) {
        if (empty($message)) {
            $message = 'Application Error';
        }
        $this->errmes = $message;

        parent::__construct($message, $code);
    }
}

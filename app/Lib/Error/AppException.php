<?php
class AppException extends CakeException {
 
    public function __construct($message = null, $code = 0) {
        if (empty($message)) {
            $message = 'Application Error';
        }
        parent::__construct($message, $code);
    }
}

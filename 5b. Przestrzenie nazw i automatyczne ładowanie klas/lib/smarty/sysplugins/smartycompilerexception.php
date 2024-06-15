<?php

class SmartyCompilerException extends Exception
{
    public $line = 0;
    public $source = null;
    public $desc = null;
    public $type = null;

    public function __construct($message = null, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
?>

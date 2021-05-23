<?php 

/********************************** OutPut Function **********************************/
{
    function printCreatedMessage($string)
    {
        echo "\e[0;32;40mcreate $string\e[0m\n";
    }
    
    function printErrorMessage($string)
    {
        $whitespace = str_pad($whitespace, strlen($string), ' ');
    
        echo "\n";
        echo "\e[1;37;41m$whitespace\e[0m\n";
        echo "\e[1;37;41m$string\e[0m\n";
        echo "\e[1;37;41m$whitespace\e[0m\n";
        echo "\n";
    }
    
    function cmdError($command)
    {
        return printErrorMessage("Command \"" . $command . "\" is not defined.");
    }
    
    function optionError($option)
    {
        return printErrorMessage('The "' . $option . '" option does not exist.  ');
    }
    
    function argError($argument)
    {
        return printErrorMessage('Not enough arguments (missing: "' . $argument . '").');
    }
}
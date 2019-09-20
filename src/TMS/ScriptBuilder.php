<?php

class TMS_ScriptBuilder
{

    private $lines = array();

    public function addCommand($command)
    {
        array_push($this->lines,$command);
    }

    public function addComment($comment)
    {
        $str = str_replace("\n", "\n#", $comment);
        $this->addCommand('# ' . $str);
    }

    public function buildFile($file)
    {
        $fp = fopen($file, 'a');//opens file in append mode
        foreach($this->lines as $line){
            fwrite($fp, $line . "\n");
        }
        fclose($fp);
    }
    
    public function buildString(){
        $string = '';
        foreach($this->lines as $line){
            $string .= $line . "\n";
        }
        return $string;
    }
}


<?php
/**
 * Diff, a diff class writen by php
 *
 * @version     1.0
 * @copyright   (c) 2013-2014 Monkee
 *              <https://github.com/monkee/diff>
 * @author      monkee<zomboo1@126.com>
 * @date        2013-10-09
 */



class Diff
{
    /**
     * strings to be compared
     */
    protected $string1 = '';
    protected $string2 = '';

    /**
     * basic options
     */
    private $opt = array(
        'trimRow' => false,        //if ignore space at both sides of line
        'ignoreEmptyRow' => false, //if ignore empty line
        'seperator' => "\n",       //line or char
    );

    private $rows = array();

    public function __construct($string1, $string2, $opt = array()){
        $this->string1 = $string1;
        $this->string2 = $string2;

        $this->opt = array_merge($this->opt, $opt);
    }

    public function compare(){

    }

    public function formatRows(){
        $this->$rows = array(
            $this->convertStringToRow($this->string1),
            $this->convertStringToRow($this->string2),
        );
    }

    private function convertStringToRow($string){
        $rows = array();
        foreach(explode($this->opt['seperator'], $string) as $row){
            if($this->opt['trimRow']){
                $row = trim($row);
            }

            if($this->opt['ignoreEmptyRow']){
                if(empty($row)){
                    continue;
                }
            }

            $rows[] = $row;
        }

        return $rows;
    }
}



/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>

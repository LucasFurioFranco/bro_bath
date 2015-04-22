<?php
class DataLayer{

    private $page_type;

    private $info;

    private $dl_name;

    public function __construct($page_type, $name="dataLayer"){
        $valid_types = array("home","product","category","search","cart","payment","thanks");

        if(! in_array($page_type, $valid_types) ){
            $this->page_type = "other";
        }else{
            $this->page_type = $page_type;
        }

        $this->dl_name = $name;
    }

    public function addInfo($info, $value){
            $this->info[] = array($info, htmlentities($value, ENT_QUOTES));
    }

    public function getDataLayer(){
        $dl = "var " . $this->dl_name . " = [{\n";
        $dl .= "'pageType' : '".$this->page_type."',\n";

        if(sizeof($this->info) > 0){
                for($i=0;$i<sizeof($this->info);$i++){
                        $value = $this->info[$i][1];
                        if($value === true){
                                $value = "true";
                        }
                        if($value === false){
                                $value = "false";
                        }
                        $dl .= "'".$this->info[$i][0]."' : '".$value ."'";
                        if($i < sizeof($this->info)-1){
                                $dl .= ",\n";
                        }
                }
        }

        $dl .= "}];";

        return $dl;
    }

}

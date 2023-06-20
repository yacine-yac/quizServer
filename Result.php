<?php 
class Result{
    public array $truth;
    public array $answers;
    private int $success=0;
    private int $wrong=0;
    function __construct(array $answers){
           $this->setTruth();
           $this->answers=$answers;
    }
    private function setTruth(){
        $truth_content=json_decode(file_get_contents('data.json'),true); 
        $truth= array_map(function($x){
              return $x['truth'];
        },$truth_content);
        $this->truth=$truth;
    }
    function checkAnwsers(Array $answers=[]):Array{
        $answers=$this->answers; 
        $output=[];
       foreach($answers as $k=>$v){  
            $output[$k]['final']=$this->truth[$k]; 
           if($v['checked']==$this->truth[$k]){  
                $output[$k]['status']=true;
                $this->success++;
           }else{  
                $output[$k]['status']=false;
                $this->wrong++;
           }
       } 
          return $output;   
    }
    function information(){
        return [
            "wrong"=>$this->wrong,
            "success"=>$this->success,
            "proportion"=>floor(($this->success/count($this->answers))*100),
            "grade"=> $this->success < $this->wrong ? false : true
        ];
    }
    function getResponse(){ 
       $output=[
            "global"=> $this->checkAnwsers(),
            "information"=>$this->information()
        ];
        return json_encode($output);
    }
}


?>
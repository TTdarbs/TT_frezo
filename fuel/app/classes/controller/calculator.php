<?php

class Controller_Calculator extends Controller_Template{
    public function action_index(){
            $data["subnav"] = array('calculator'=> 'active' );
            $this->template->title = "Kalkulators";
            $this->template->content = View::forge('calculator/index', $data);
            
    }
    
    
    
}

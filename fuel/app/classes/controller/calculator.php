<?php

class Controller_Calculator extends Controller_Public{
    public function action_index(){
            $data['products'] = Model_Product::find('all');
            $this->template->title = "Kalkulators";
            $this->template->content = View::forge('calculator/index', $data);
            
    }
    
    
    
}

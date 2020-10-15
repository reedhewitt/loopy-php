<?php

class Loopy {
  protected $i;
  protected $count;
  protected $first_index;
  protected $last_index;
  protected $first;
  protected $last;
  protected $middle;
  
  public function __construct($countable, $starting_index = 0){
    $this->i = (int) $starting_index;
    $this->count = count($countable);
    $this->first_index = (int) $starting_index;
    $this->last_index = $this->count - 1;
    $this->update_position();
  }
  
  public function __get($name){
    return $this->$name;
  }
  
  public function only($n){
    return $this->count === (int) $n;
  }
  
  public function more_than($n){
    return $this->count > (int) $n;
  }
  
  public function next(){
    $this->i++;
    $this->update_position();
  }
  
  protected function update_position(){
    $this->first = $this->i === $this->first_index;
    $this->last = $this->i === $this->last_index;
    $this->middle = $this->i > $this->first_index && $this->i < $this->last_index;
  }
}

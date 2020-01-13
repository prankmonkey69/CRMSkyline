<?php

class View extends Controller{

    public function viewCustomer_list() {
		return $this->getCustomer_list();
    }
    
    public function submitCustomer($fname,$mname,$lname,$birthdate,$address,$country,$contact_number,$email){
        return $this->insertCustomer($fname,$mname,$lname,$birthdate,$address,$country,$contact_number,$email);
    }
    
    public function viewCustomer_list_view($id) {
		    return $this->getCustomer_list_view($id);
	}

  public function submitCheck($id,$room_no,$room){
      return $this->insertCheck($id,$room_no,$room);
  }

  public function viewCheck(){
      return $this->getCheck();
  }

  public function checkount($total,$id,$gain){
      return $this->insertCheckout($total,$id,$gain);
  }

  public function points($total,$id){
    return $this->upPoints($total,$id);
  }
  public function viewCustomer() {
		return $this->getCustomer();
    }

}
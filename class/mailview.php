<?php 

class mailview extends mailctrl{

    public function getsendEmail($email,$name){
        return $this->sendEmail($email,$name);
    }

    public function getsendNewsletter($email,$title,$description,$filename){
        return $this->sendNewsletter($email,$title,$description,$filename);
    }

}
<?php

class Controller extends Db{

    protected function getCustomer_list() {
        $stmt = $this->connect()->prepare("SELECT * FROM  CRM_guestdb");
		$stmt->execute();
		return $stmt;
    }

    protected function getCustomer() {
        $stmt = $this->connect()->prepare("SELECT * FROM checks FULL JOIN
                                            CRM_guestdb ON CRM_guestdb.id = checks.customer_id");
		$stmt->execute();
		return $stmt;
    }

    protected function insertCustomer($fname,$mname,$lname,$birthdate,$address,$country,$contact_number,$email){
        $stmt = $this->connect()->prepare("INSERT INTO CRM_guestdb (fname
        ,mname
        ,lname
        ,birthdate
        ,address
        ,country
        ,contact_number
        ,email)
        VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bindparam(1,$fname);
        $stmt->bindparam(2,$mname);
        $stmt->bindparam(3,$lname);
        $stmt->bindparam(4,$birthdate);
        $stmt->bindparam(5,$address);
        $stmt->bindparam(6,$country);
        $stmt->bindparam(7,$contact_number);
        $stmt->bindparam(8,$email);
        $stmt->execute();
        return $stmt;
    }

    protected function getCustomer_list_view($id) {
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_guestdb 
										FULL JOIN checks
										ON checks.customer_id =
										CRM_guestdb.id
										FULL JOIN CRM_loyalties
                                        ON CRM_guestdb.id =
                                        CRM_loyalties.customer_id
                                        WHERE CRM_guestdb.id=$id");
		$stmt->execute();
		return $stmt;
    }
    
    protected function insertCheck($id,$room_no,$room){
        $stmt = $this->connect()->prepare("INSERT INTO checks (check_in,customer_id,room_no,room)
                                            VALUES(GETDATE(),?,?,?)");
        $stmt->bindparam(1,$id);
        $stmt->bindparam(2,$room_no);
        $stmt->bindparam(3,$room);
        $stmt->execute();
        return $stmt;
    }

    protected function getCheck(){
        $stmt = $this->connect()->prepare("SELECT * FROM CRM_guestdb 
                                            INNER JOIN checks
                                            ON checks.customer_id =
                                            CRM_guestdb.id");
        $stmt->execute();
        return $stmt;
    }
    
    protected function insertCheckout($total,$id,$gain){
        $stmt= $this->connect()->prepare("UPDATE checks SET checkout = GETDATE(), total = ? , point = ? WHERE id=?");
        $stmt->bindparam(1,$total);
        $stmt->bindparam(2,$gain);
        $stmt->bindparam(3,$id);
        $stmt->execute();
        return $stmt;
    }

    protected function upPoints($total,$id){
        $stmt = $this->connect()->prepare("UPDATE [dbo].[CRM_loyalties]
                                            SET points = ?
                                            WHERE customer_id =?");
        $stmt->bindparam(1,$total);
        $stmt->bindparam(2,$id);
        $stmt->execute();
        return $stmt;
    }
    
}
<?php 

class Controller extends Db {
	//login 
	protected function getAuthentication($username,$password){
		$query = "SELECT * FROM users WHERE username=? AND password=?";
		$pst = $this->connect()->prepare($query);
		$pst->bindParam(1,$username);
		$pst->bindParam(2,$password);
		$pst->execute();
		if($pst->rowCount() != 0){
			if($row = $pst->fetch()) {
				//information session.
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] = $row['lastname'];
				$_SESSION['user_type'] = $row['user_type'];
			}
			return true;
		}else{
			return false;
		}
	}

	protected function getExample() {
		$stmt = $this->connect()->prepare("SELECT * FROM test");
		$stmt->execute();
		$data = null;
		return $stmt;
	}

	protected function getComplaints() {
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_guestdb 
										INNER JOIN CRM_complaints 
										ON CRM_complaints.customer_id = CRM_guestdb.id
										FULL JOIN sec_action
										ON CRM_complaints.id = sec_action.complaint_id
										ORDER BY CRM_complaints.id DESC");
		
		//$stmt = $this->connect()->prepare("SELECT * FROM complaints_2");
		$stmt->execute();
		return $stmt;
	}

	protected function getComplaints_view($id) {
		$stmt = $this->connect()->prepare("SELECT * 
										FROM  CRM_guestdb
										INNER JOIN  CRM_complaints
										ON CRM_complaints.customer_id = 
										CRM_guestdb.id
										FULL JOIN sec_action
										ON CRM_complaints.id = sec_action.complaint_id
										where CRM_complaints.id=?");
		$stmt->bindParam(1,$id);
		$stmt->execute();
		return $stmt;
	}
	//function for action complaints
	protected function insertAction($action,$id){
		$stmt = $this->connect()->prepare("UPDATE CRM_complaints
											SET updated_at = GETDATE(),action = ?
											WHERE id=?");
		$stmt->bindparam(1,$action);
		$stmt->bindparam(2,$id);
		$stmt->execute();
		return $stmt;
	}

	protected function createComplaint($id,$message){
		$stmt = $this->connect()->prepare("INSERT INTO CRM_complaints ( customer_id,message,created_at) VALUES (?,?,GETDATE())");
		$stmt->bindparam(1,$id);
		$stmt->bindparam(2,$message);
		$stmt->execute();
		return $stmt;
	}

	//function for call complaints getCallComplaints
	protected function getCreateCallComplaint($name,$contact_no,$email,$message,$firstname,$lastname){
		$stmt = $this->connect()->prepare("INSERT INTO CRM_call_complaint (name,contact_no,email,message,created_at,staffname)
										 VALUES (?,?,?,?,GETDATE(),?)");
		$staffname = $firstname .' '. $lastname;
		$stmt->bindparam(1,$name);
		$stmt->bindparam(2,$contact_no);
		$stmt->bindparam(3,$email);
		$stmt->bindparam(4,$message);
		$stmt->bindparam(5,$staffname);
		$stmt->execute();
	}

	protected function getCallComplaints(){
		$stmt = $this->connect()->prepare("SELECT *
											FROM CRM_call_complaint");
		$stmt->execute();
		return $stmt;
	}
	// for viewing od call complaint
	protected function getCallview($id){
		$stmt = $this->connect()->prepare("SELECT *
											FROM CRM_call_complaint WHERE id=?");
		$stmt->bindparam(1,$id);
		$stmt->execute();
		return $stmt;
	}
	protected function InsertCallAction($action,$id){
		$stmt = $this->connect()->prepare("UPDATE  CRM_Call_Complaint SET action=?,action_date=GETDATE()  WHERE ID=".$id);
		$stmt->bindparam(1,$action);
		$stmt->execute();
		return true;
	}

	protected function getsearchCallCom($search_name){
		$stmt = $this->connect()->prepare(" SELECT * FROM CRM_Call_Complaint where  name LIKE '%$search_name%'");
		$stmt->execute();
		return true;
	}
	protected function getArchive($id){
		$stmt = $this->connect()->prepare("UPDATE  CRM_Call_Complaint SET  archive_date=GETDATE()  WHERE ID=".$id);
		$stmt->execute();
		return true;
	}


	protected function getLoyalty_search($name){
		$stmt = $this->connect()->prepare("SELECT *
											FROM CRM_loyalties
											INNER JOIN CRM_guestdb
											ON CRM_loyalties.customer_id = 
											CRM_guestdb.id 
											FULL JOIN checks
											ON checks.customer_id =
											CRM_guestdb.id
											WHERE CONCAT(CRM_guestdb.fname,CRM_guestdb.lname) LIKE  '%$name' ");
		$stmt->execute();
		return $stmt;
	}

	protected function getCustomer_list() {
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_guestdb ORDER BY id DESC");
		$stmt->execute();
		return $stmt;
	}

	protected function getCustomer_search($id) {
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_guestdb where  CONCAT(fname,lname) LIKE '%$id%' ORDER BY id DESC");
		$stmt->execute();
		return $stmt;
	}

	protected function getCustomer_list_view($id) {
		/*$stmt = $this->connect()->prepare("SELECT * FROM customer_list 
										FULL JOIN checks
										ON checks.customer_id =
										customer_list.id
										WHERE checks.customer_id=$id");*/
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_guestdb 
										FULL JOIN checks
										ON checks.customer_id =
										CRM_guestdb.id
										FULL JOIN CRM_loyalties
										ON CRM_guestdb.id =CRM_loyalties.customer_id
										WHERE CRM_guestdb.id=$id");								
		$stmt->execute();
		return $stmt;
	}
	// inedit ko yung customer_list_view
	protected function getCountVisit($id){
		$stmt = $this->connect()->prepare("SELECT COUNT(*) AS VisitCount FROM CRM_guestdb 
										INNER JOIN checks
										ON checks.customer_id =
										CRM_guestdb.id
										WHERE CRM_guestdb.id=$id");
		$stmt->execute();
		return $stmt;
	}
	//promote guest to loyalty
	protected function upPromote($id){
		$stmt = $this->connect()->prepare("INSERT INTO CRM_loyalties (customer_id,created_at,points) 
											VALUES (?,GETDATE(),0)");
		$stmt->bindparam(1,$id);
		$stmt->execute();
		return $stmt;
	}

	protected function getCustomer_loyalty() {
		$stmt = $this->connect()->prepare("SELECT *
										FROM CRM_loyalties
										INNER JOIN CRM_guestdb
										ON CRM_loyalties.customer_id = CRM_guestdb.id
										ORDER BY  CRM_loyalties.id DESC ");
		$stmt->execute();
		return $stmt;
	}

	protected function getCustomer_loyalty_view($id) {
		$stmt = $this->connect()->prepare("SELECT *
										FROM CRM_loyalties
										INNER JOIN CRM_guestdb
										ON CRM_loyalties.customer_id = 
										CRM_guestdb.id 
										FULL JOIN checks
										ON checks.customer_id =
										CRM_guestdb.id where CRM_loyalties.id=?");
		$stmt->bindParam(1,$id);
		$stmt->execute();
		return $stmt;
	}

	protected function getNewsLetter() {
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_newsletter  ORDER BY id DESC");
		$stmt->execute();
		return $stmt;
	}

	protected function getCountGuest() {
		$stmt = $this->connect()->prepare("SELECT COUNT(*) AS id FROM CRM_guestdb");
		$stmt->execute();
		return $stmt;
	}
	//getCountLoyalty
	protected function getCountLoyalty() {
		$stmt = $this->connect()->prepare("SELECT COUNT(*) AS id FROM CRM_loyalties");
		$stmt->execute();
		return $stmt;
	}
	//getCountComplaint
	protected function getCountComplaint() {
		$stmt = $this->connect()->prepare("SELECT COUNT(*) AS id FROM CRM_complaints");
		$stmt->execute();
		return $stmt;
	}
	//getCountTravelAgent
	protected function getCountTravelAgent() {
		$stmt = $this->connect()->prepare("SELECT COUNT(*) AS id FROM CRM_travelagent");
		$stmt->execute();
		return $stmt;
	}
	
	protected function newsLetter($title,$description,$file,$date){
		$sql = "INSERT INTO CRM_newsletter(title,description,filename,created_at,updated_at) VALUES (?,?,?,GETDATE(),?)";
		$stmt = $this->connect()->prepare($sql);
		
		$fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 500000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = "../Storage/CRM/".$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					$stmt->bindParam(1,$title);
					$stmt->bindParam(2,$description);
					$stmt->bindParam(3,$fileNameNew);
					$stmt->bindParam(4,$date);
					$stmt->execute();
                    return true;
                }else{
					$_SESSION['errorMessage'] = "Filesize is too big, Upload failed.";
					return false;
                }
            }else{
				$_SESSION['errorMessage'] = "Error uploading file!";
				return false;
            }
        }else{
			$_SESSION['errorMessage'] = "You cannot upload files of this type.";
			return false;
        }

	}

	protected function getNewsLetterView($id){
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_newsletter where id = ?");
		$stmt->bindparam(1,$id);
		$stmt->execute();
		return $stmt;
	}
	
	protected function getPostNews(){
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_newsletter where updated_at > GETDATE() ");
		$stmt->execute();
		return $stmt;
	}

	protected function getInsSubs($email){
		$stmt = $this->connect()->prepare("INSERT INTO CRM_subscribers (email) VALUES (?) ");
		$stmt->bindparam(1,$email);
		$stmt->execute();
		return $stmt;
	}

	protected function getSubs(){
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_subscribers ");
		$stmt->execute();
		return $stmt;
	}
	// akin to 
	protected function getTravelAgent(){
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_travelagent");
		$stmt->execute();
		return $stmt;
	}
	
	protected function getTravelAgent_view($id){
		$stmt = $this->connect()->prepare("SELECT * FROM CRM_travelagent 
		WHERE id = ?");
		$stmt->bindparam(1,$id);
		$stmt->execute();
		return $stmt;	
	}

	protected function TravelAgent($firstname,$middlename,$lastname,$birthdate,$address,$contact_no,$gender,$email){
		$sql = "INSERT INTO CRM_travelagent(firstname,middlename,lastname,birthdate,address,contact_no,gender,email)
		VALUES (?,?,?,?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(1,$firstname);
		$stmt->bindparam(2,$middlename);
		$stmt->bindparam(3,$lastname);
		$stmt->bindparam(4,$birthdate);
		$stmt->bindparam(5,$address);
		$stmt->bindparam(6,$contact_no);
		$stmt->bindparam(7,$gender);
		$stmt->bindparam(8,$email);
		$stmt->execute();
		return true;
	}
	// for enclosure
	protected function getEnclosementlist(){
		$sql = "SELECT * FROM CRM_travelagent as TA 
				INNER JOIN CRM_enclosement as EN ON TA.id = EN.travelagent_id";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	protected function getEnclosement($id){
		$sql = "SELECT * FROM CRM_travelagent as TA 
				INNER JOIN CRM_enclosement as EN ON TA.id = EN.travelagent_id
				INNER JOIN dum_promo ON EN.promo_id = dum_promo.id
				WHERE EN.id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(1,$id);
		$stmt->execute();
		return $stmt;
	}

	protected function getEnclosetype($id){
		$sql = "SELECT * FROM CRM_enclose 
				INNER JOIN CRM_enclosement ON CRM_enclose.type_no = CRM_enclosement.type_no
				INNER JOIN dum_promo ON CRM_enclosement.promo_id = dum_promo.id
				WHERE CRM_enclosement.id=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(1,$id);
		$stmt->execute();
		return $stmt;
	}
	// for enclosures
	protected function Enclosure($travelagent_id,$no_of_guest,$reserved_date,$no_of_days,$promo_id,$type_no,$no_of_room
								){
		$sql = "INSERT INTO CRM_enclosement(
							travelagent_id,
							no_of_guests,
							created_at,
							reserved_date,
							no_of_days,
							type_no,
							no_of_room,
							promo_id
							)
							VALUES (?,?,GETDATE(),?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(1,$travelagent_id);
		$stmt->bindparam(2,$no_of_guest);
		$stmt->bindparam(3,$reserved_date);
		$stmt->bindparam(4,$no_of_days);
		$stmt->bindparam(5,$type_no);
		$stmt->bindparam(6,$no_of_room);
		$stmt->bindparam(7,$promo_id);
		$stmt->execute();
		return $stmt;
	}

	protected function getCountEnclose(){
		$stmt = $this->connect()->prepare("SELECT COUNT(*) AS COU FROM CRM_enclosement");
		$stmt->execute();
		return $stmt;
	}

	protected function type($type_no,$name){
		$stmt = $this->connect()->prepare("INSERT INTO CRM_enclose (type_no,type)
											VALUES (?,?)");
		$stmt->bindparam(2,$type_no);
		$stmt->bindparam(1,$name);
		$stmt->execute();
		return true;
	}
	//Coporate
	protected function getCorporate(){
		$sql = "SELECT * FROM CRM_corporate ORDER BY id DESC";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
	//add Corporat
	protected function corporate($corporate_name,$address,$contact_no,$email){
		$stmt = $this->connect()->prepare("INSERT INTO CRM_corporate (corporate_name,address,contact_no,email)
											VALUES (?,?,?,?)");
		$stmt->bindparam(1,$corporate_name);
		$stmt->bindparam(2,$address);
		$stmt->bindparam(3,$contact_no);
		$stmt->bindparam(4,$email);
		$stmt->execute();
		return true;
	}
	//view corporate info
	protected function selCorporate($id){
		$sql = "SELECT * FROM CRM_corporate where id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(1,$id);
		$stmt->execute();
		return $stmt;
	}
	
	//dummy promo
	protected function getPromo(){
		$sql = "SELECT * FROM dum_promo ";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

}
<?php 

class View extends Controller {

	//login
	public function viewLogin($username,$password){
		return $this->getAuthentication($username,$password);
	}

	public function viewExample() {
		return $this->getExample();
	}

	public function viewComplaints() {
		return $this->getComplaints();
	}

	public function viewComplaints_view($id) {
		return $this->getComplaints_view($id);
	}
	//inserting action of complaints
	public function Action($action,$id){
		return $this->insertAction($action,$id);
	}

	public function sendComplaint($id,$message){
		return $this->createComplaint($id,$message);
	}
	//call complaints
	public function Call_Complaint($name,$contact_no,$email,$message,$firstname,$lastname){
		return $this->getCreateCallComplaint($name,$contact_no,$email,$message,$firstname,$lastname);
	}

	public function viewCallComplaint(){
		return $this->getCallComplaints();
	}
	//call view
	public function viewCallview($id){
		return $this->getCallview($id);
	}
	public function viewCallAction($action,$id){
		return $this->InsertCallAction($action,$id);
	}
	public function searchCallCom($search_name){
		return $this->getsearchCallCom($search_name);
	}
	public function viewArchive($id){
		return $this->getArchive($id);
	}

	public function loyaltySearch($name){
		return $this->getLoyalty_search($name);
	}
	public function searchid($id){
		return $this->getCustomer_search($id);
	}
	
	public function viewCustomer_list() {
		return $this->getCustomer_list();
	}

	public function viewCustomer_list_view($id) {
		return $this->getCustomer_list_view($id);
	}
	//promote loyalty
	public function promote($id){
		return $this->upPromote($id);
	}

	public function viewCustomer_loyalty() {
		return $this->getCustomer_loyalty();
	}

	public function viewCustomer_loyalty_view($id) {
		return $this->getCustomer_loyalty_view($id);
	}

	public function viewNewsLetter() {
		return $this->getNewsLetter();
	}

	public function insSubs($email){
		return $this->getInsSubs($email);
	}

	public function viewNewsLetterView($id){
		return $this->getNewsLetterView($id);
	}

	public function viewSubs(){
		return $this->getSubs();
	}
	
	public function viewCountGuest() {
		return $this->getCountGuest();
	}
	//Count loyalty
	public function viewCountLoyalty(){
		return $this->getCountLoyalty();
	}
	//Count complaint
	public function viewCountComplaint(){
		return $this->getCountComplaint();
	}
	//Count travelagent
	public function viewCountTravelAgent(){
		return $this->getCountTravelAgent();
	}
	// Count visit
	public function viewCountVisit($id){
		return $this->getCountVisit($id);
	}

	public function insertNewsLetter($title,$description,$file,$date){
		return $this->newsLetter($title,$description,$file,$date);
	}

	public function viewArchiveLetter($id){
		return $this->getArchiveLetter($id);
	}

	public function viewPostNews(){
		return $this->getPostNews();
	}
	// akin to
	public function viewTravelAgent(){
		return $this->getTravelAgent();
	}
	
	public function viewTravelAgent_view($id){
		return $this->getTravelAgent_view($id);
	}

	public function insertTravelAgent($firstname,$middlename,$lastname,$birthdate,
										$address,$contact_no,$gender,$email){
		return $this->TravelAgent($firstname,$middlename,$lastname,$birthdate,
										$address,$contact_no,$gender,$email);
	}
	//for enclosure
	public function viewEnclosementlist(){
		return $this->getEnclosementlist();
	}
	
	public function viewtEnclosement($id){
		return $this->getEnclosement($id);
	}
	public function viewEnclosetype($id){
		return $this->getEnclosetype($id);
	}

	public function insertEnclosure($travelagent_id,$no_of_guest,$no_of_days,$reserved_date,
									$promo_id,$type_no,$no_of_room){
		return $this->Enclosure($travelagent_id,$no_of_guest,$no_of_days,$reserved_date,
									$promo_id,$type_no,$no_of_room);
	}

	public function viewCountEnclose(){
		return $this->getCountEnclose();
	}

	public function insertType($type_no,$name){
		return $this->type($type_no,$name);
	}
	// corporate
	public function listCoporate(){
		return $this->getCorporate();
	}

	public function addCorporate($corporate_name,$address,$contact_no,$email){
		return $this->corporate($corporate_name,$address,$contact_no,$email);
	}

	public function viewCorporate($id){
		return $this->selCorporate($id);
	}
	
	//dummy promo
	public function viewPromo(){
		return $this->getPromo();
	}
	
}


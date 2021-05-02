<?php

class mymodel extends CI_Model
{
//-----------------------------------------------------------------------------------------------------------------------------------------------------
	//login,logout Module
	
	public function check_login($username,$password) //query for checking user and password
	{
		$query = $this->db->query("SELECT * FROM users WHERE username='$username' and password='$password'");
		$data=$query->result_array();
		return $data;
	}
	
//-----------------------------------------------------------------------------------------------------------------------------------------------------
	//User management Module
	
	public function M_viewusers()  //fetch all users
	{
		$query = $this->db->query("SELECT * from users");
		$data=$query->result_array();
		return $data;
	}
	public function M_adduser($fname,$lname,$mail,$username,$pass,$acctype,$profile_pic) //inserting a new user
	{
		$query = $this->db->query("INSERT INTO users (first_name,last_name,email,acctype,username,password,profile_pic) VALUES ('$fname','$lname','$mail','$acctype','$username','$pass','$profile_pic')");
	}
	public function M_getuserinfo($id)  //for displaying current user info in the edit forms 
	{
		$query = $this->db->query("SELECT * from users WHERE user_id = $id");
		$data = $query->result_array();
		return $data[0];
	}
	public function M_updateuserinfo($id,$fname,$lname,$mail,$username,$pass,$acctype,$truelocation)  //update user info by id
	{
		
		if ($truelocation === "http://localhost/project/bootstrap/profile_pic/")
		{
			$query = $this->db->query("UPDATE users SET first_name='$fname', last_name='$lname',email='$mail',acctype='$acctype',username='$username',password='$pass' WHERE user_id=$id");
		}
		else
		{
			$query = $this->db->query("UPDATE users SET first_name='$fname', last_name='$lname',email='$mail',acctype='$acctype',username='$username',password='$pass',profile_pic='$truelocation' WHERE user_id=$id");
		}
		
		if ($this->session->userdata('user_id') == $id)
		{
			if ($truelocation === "http://localhost/project/bootstrap/profile_pic/")
			{
				$data_sessions = array('user_id'=> $id,'first_name'=> $fname,'acctype'=> $acctype);  //set id and fullname to data_sessions array
			}
			else
			{
				$data_sessions = array('user_id'=> $id,'first_name'=> $fname,'acctype'=> $acctype,'profile_pic'=> $truelocation);
			}
			$this->session->set_userdata($data_sessions);  //store session data to Code Igniter sessions
		}	
	}
	public function M_deleteuser($id) //delete a user by id
	{
		$query = $this->db->query("DELETE FROM users WHERE user_id = $id");
	}
	
//-----------------------------------------------------------------------------------------------------------------------------------------------------
	// Franchise Management Module
	
	public function M_completeinfo($id)  //extract info for franchises info button to display complete info of franchise
	{
		$query = $this->db->query("SELECT * from franchises
									INNER JOIN applicants
									on franchises.franchise_id = applicants.applicant_id
									INNER JOIN units
									on franchises.franchise_id = units.unit_id
									INNER JOIN drivers
									on franchises.franchise_id = drivers.driver_id
									INNER JOIN associations
									on applicants.association_name = associations.association_name 
									WHERE franchise_id = $id");
		$data=$query->result_array();
		return $data[0];
	}
	public function M_viewfranchises() // fetch all info from applicants, franchises, units tables
	{
		$query = $this->db->query("SELECT * from franchises
									INNER JOIN applicants
									on franchises.franchise_id = applicants.applicant_id
									INNER JOIN units
									on franchises.franchise_id = units.unit_id
									INNER JOIN drivers
									on franchises.franchise_id = drivers.driver_id
									INNER JOIN associations
									on applicants.association_name = associations.association_name ORDER BY franchise_id ASC"); //join tables as one so that every column in the database is accessible in the views
		$data=$query->result_array();
		return $data; // return fetched data from database to the controller
	}
	public function M_viewfranchisesforedit() 
	{
		$query = $this->db->query("SELECT * from franchises
									INNER JOIN applicants
									on franchises.franchise_id = applicants.applicant_id
									INNER JOIN units
									on franchises.franchise_id = units.unit_id
									INNER JOIN drivers
									on franchises.franchise_id = drivers.driver_id
									INNER JOIN associations
									on applicants.association_name = associations.association_name WHERE franchise_approval = 'Pending'"); //join tables as one so that every column in the database is accessible in the views
		$data=$query->result_array();
		return $data; // return fetched data from database to the controller
	}
	public function M_createfranchise($name,$mname,$lname,$cstatus,$bday,$age,$address,$ci,$gender,$assoc,$ln,$casen,
														$un,$plt,$rn,$en,$cn,$mn,$uc,$classification,
														$dname,$dmname,$dlname,$daddress,$dcn,
														
														$operatorpic,$driverpic,
														
														$r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9)
	{
		$complete = "Complete";
		if (empty($r1)){$r1='False';$complete="Incomplete";}if (empty($r2)){$r2='False';$complete="Incomplete";}if (empty($r3)){$r3='False';$complete="Incomplete";}if (empty($r4)){$r4='False';$complete="Incomplete";}if (empty($r5)){$r5='False';$complete="Incomplete";}if (empty($r6)){$r6='False';$complete="Incomplete";}if (empty($r7)){$r7='False';$complete="Incomplete";}if (empty($r8)){$r8='False';$complete="Incomplete";}if (empty($r9)){$r9='False';$complete="Incomplete";}
		
		$operator_licence = $ln;
		$driver_licence = $ln;

		if ($cstatus == "Operator") {$operator_licence = "NULL";} else {$driver_licence = "NULL";}
		$query4 = $this->db->query("INSERT INTO franchises (case_no,franchise_status,franchise_approval,mtop_issuance,requirements) VALUES ('$casen','Inactive','Pending','Not Issued','$complete')");

		$query2 = $this->db->query("SELECT franchise_id from franchises order by franchise_id desc limit 1");
		$result = $query2->result_array();
		
		foreach($result as $row)
		{
			$query3 = $this->db->query("INSERT INTO units (unit_id,unit_model,plate_num,registration_num,chassis_no,motor_no,year_model,unit_color,classification) VALUES ('$row[franchise_id]','$un','$plt','$rn','$cn','$mn','$en','$uc','$classification')");
			$query = $this->db->query("INSERT INTO applicants (applicant_id,first_name,middle_name,last_name,birthday,age,address,gender,application_type,contact_num,association_name,licence_num,operator_picture) 
			VALUES ($row[franchise_id],'$name','$mname','$lname','$bday','$age','$address','$gender','$cstatus','$ci','$assoc','$operator_licence','$operatorpic')");
			$query5 = $this->db->query("INSERT INTO new_fran_require VALUES ($row[franchise_id],'$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r8','$r9')");
			$query6 = $this->db->query("INSERT INTO drivers (driver_id,d_first_name,d_middle_name,d_last_name,d_address,d_contact_num,d_licence_num,driver_picture) VALUES ('$row[franchise_id]','$dname','$dmname','$dlname','$daddress','$dcn','$driver_licence','$driverpic')");
		}
	}
	public function viewallapplicants()  //extract all applicants record
	{
		$query = $this->db->query("SELECT * FROM applicants");
		$data=$query->result_array();
		return $data;
	}
	public function selectassoc() //extract all associations for combobox in new franchises forms
	{
		$query = $this->db->query("SELECT * FROM associations WHERE no_units > 0 and assoc_approval = 'Approved' ORDER BY association_name");
		$data=$query->result_array();
		return $data;
	}
	public function selectapprovedassoc() //extract approved associations for combobox in new franchises forms
	{
		$query = $this->db->query("SELECT * FROM associations WHERE assoc_approval = 'Approved' ORDER BY association_name");
		$data=$query->result_array();
		return $data;
	}
	public function selectrequirements($id) 
	{
		$query = $this->db->query("SELECT * FROM new_fran_require where requirement_id = $id");
		$data=$query->result_array();
		return $data[0];
	}
	public function updatefranchises() //Updating the franchises to "Expired" if the (expire date = date today) and set time elapsed
	{
		$today = getdate();  //php fuction to get current local date
		
		$year_today = $today['year'];  
		$day_today = $today['mday']; 
		$month_today = $today['mon']; //get month number (ex. june = 6)
		
		$query = $this->db->query("SELECT * from franchises"); 
		$franchise = $query->result_array();
		
		foreach ($franchise as $row)
		{
			$id = $row['franchise_id'];
			$expire = $row['expire_date'];
			
			if (!empty($row['expire_date']))  //if the expire_date is not empty, program will compute time elapsed based on current date 
			{
				$year_expire = substr($expire, -4);  //break down year, month, day number
				$day_expire = substr($expire, 3,-5);
				$month_expire = substr($expire, 0, -8);
			
				$year_elapsed = 0;
				$month_elapsed = 0;
				$day_elapsed = 0;

				if ($year_today >= $year_expire) 
				{
					$year_elapsed = $year_today - $year_expire;
					$month_elapsed = $month_today - $month_expire;
					$day_elapsed = $day_today - $day_expire;
					
					if ($month_elapsed < 0)
					{
						$year_elapsed--;
						if ($year_elapsed < 0){$year_elapsed=0;} //prevent year to become negative
						
						$month_elapsed = 12 + $month_elapsed;
					}
					if ($day_elapsed < 0)
					{
						$month_elapsed--;
						if ($month_elapsed < 0){$month_elapsed=0;}
						
						$day_elapsed = 30 + $day_elapsed;
					}
				}
				
				$elapse[0] = $year_elapsed;
				$elapse[1] = $month_elapsed;
				$elapse[2] = $day_elapsed;
				
				if (strlen($elapse[1]) == 1) //if month number is single digit, put 0 beside it
				{
					$array[0] = $elapse[1];
					$array[1] = "0";
					$elapse[1] = implode("",$array);
					$elapse[1] = strrev($elapse[1]);
				} 
				
				if (strlen($elapse[2]) == 1)
				{
					$array[0] = $elapse[2];
					$array[1] = "0";
					$elapse[2] = implode("",$array);
					$elapse[2] = strrev($elapse[2]);
				} 
				
				$timeelapsed = implode("/",$elapse); //join time elpsed year, month, day number as one string separated by "/"
				
				if ($year_elapsed > 0 or $month_elapsed > 0 or $day_elapsed > 0) //if time elapsed set franchise as expired
				{
					$query = $this->db->query("UPDATE franchises SET franchise_status='Expired' WHERE franchise_id = '$id'");
					$query1 = $this->db->query("UPDATE franchises SET time_elapsed_since_expire = '$timeelapsed' WHERE franchise_id = '$id'");
				}
			}
		}
	}
	
	public function fillrequirements($id,$r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9)
	{
		$complete = "Complete";
		if (empty($r1)){$r1='False';$complete="Incomplete";}if (empty($r2)){$r2='False';$complete="Incomplete";}if (empty($r3)){$r3='False';$complete="Incomplete";}if (empty($r4)){$r4='False';$complete="Incomplete";}if (empty($r5)){$r5='False';$complete="Incomplete";}if (empty($r6)){$r6='False';$complete="Incomplete";}if (empty($r7)){$r7='False';$complete="Incomplete";}if (empty($r8)){$r8='False';$complete="Incomplete";}if (empty($r9)){$r9='False';$complete="Incomplete";}
		$query = $this->db->query("UPDATE new_fran_require SET community_tax='$r1', certificate_registration='$r2', OR_certificate_registration='$r3',
									insurance_coverage='$r4', police_clearance='$r5', proof_membership='$r6', road_clearance='$r7',
									certificate_comelec='$r8', brgy_clearance='$r9' where requirement_id=$id");
		$query1 = $this->db->query("UPDATE franchises SET requirements='$complete' where franchise_id = $id");
	}
	public function approve($id) 
	{
		$query = $this->db->query("UPDATE franchises SET franchise_approval='Approved',mtop_issuance='Not Issued' WHERE franchise_id=$id");
		// add query to add approval of DB 
	}
	public function setmtopissuance($id,$assoc_name)  //set MTOP issuance column to issued
	{
		$today = getdate();
		$date[0] = $today['mon'];
		$date[1] = $today['mday'];
		$date[2] = $today['year'];
		
		if (strlen($date[0]) == 1)
		{
			$array[0] = $date[0];
			$array[1] = "0";
			$date[0] = implode("",$array);
			$date[0] = strrev($date[0]);
		}
		if (strlen($date[1]) == 1)
		{
			$array[0] = $date[1];
			$array[1] = "0";
			$date[1] = implode("",$array);
			$date[1] = strrev($date[1]);
		}
		
		$date_applied = implode("/",$date);
		$date[2] = $today['year']+3;
		$expire_date = implode("/",$date);
		
		$query = $this->db->query("UPDATE franchises SET date_applied='$date_applied',expire_date='$expire_date',mtop_issuance='Issued',franchise_status='Active' WHERE franchise_id=$id");
		
		$query1 = $this->db->query("SELECT * FROM associations WHERE association_name='$assoc_name'"); 
		$data = $query1->result_array();
			foreach ($data as $row)
			{
				$add = $row['no_units'] + 1;
			}
			$query2 = $this->db->query("UPDATE associations SET no_units='$add' WHERE association_name='$assoc_name'");
		}
	public function disapprove($id)
	{
		$query = $this->db->query("UPDATE franchises SET franchise_approval='Disapproved',mtop_issuance='Not Issued' WHERE franchise_id=$id");
	}
	public function viewexpire()  //extract all renewable franchises
	{
		$query = $this->db->query("SELECT * from franchises
									INNER JOIN applicants
									on franchises.franchise_id = applicants.applicant_id
									INNER JOIN units
									on franchises.franchise_id = units.unit_id
									INNER JOIN drivers
									on franchises.franchise_id = drivers.driver_id
									INNER JOIN associations
									on applicants.association_name = associations.association_name 
									WHERE franchise_status = 'Expired' and franchise_approval = 'Approved'
									ORDER BY franchise_id ASC"); 
		$data=$query->result_array();
		return $data;
	}
	
	public function renewal($id)  //renew franchise (renew its date_applied and expire dates)
	{
		$today = getdate();
		$date[0] = $today['mon'];
		$date[1] = $today['mday'];
		$date[2] = $today['year'];
		
		if (strlen($date[0]) == 1)
		{
			$array[0] = $date[0];
			$array[1] = "0";
			$date[0] = implode("",$array);
			$date[0] = strrev($date[0]);
		}
		if (strlen($date[1]) == 1)
		{
			$array[0] = $date[1];
			$array[1] = "0";
			$date[1] = implode("",$array);
			$date[1] = strrev($date[1]);
		} 

		
		$date_applied = implode("/",$date); //begin date
		
		$date[2] = $today['year']+3;
		
		$expire_date = implode("/",$date); //expire date is 3 years after begin date
		
		$query = $this->db->query("UPDATE franchises SET date_applied='$date_applied', expire_date='$expire_date', franchise_status='Active', time_elapsed_since_expire='00/00/00' WHERE franchise_id=$id");
	}
	
	public function selecttransfer()  //extract all transferable franchises
	{
		$query = $this->db->query("SELECT * from franchises
									INNER JOIN applicants
									on franchises.franchise_id = applicants.applicant_id
									INNER JOIN units
									on franchises.franchise_id = units.unit_id
									INNER JOIN drivers
									on franchises.franchise_id = drivers.driver_id
									INNER JOIN associations
									on applicants.association_name = associations.association_name  WHERE franchise_approval = 'Approved' and franchise_status = 'Active'
									ORDER BY franchise_id ASC");
		$data=$query->result_array();
		return $data;
	}
	public function selectdrop()  //extract all transferable franchises
	{
		$query = $this->db->query("SELECT * from franchises
									INNER JOIN applicants
									on franchises.franchise_id = applicants.applicant_id
									INNER JOIN units
									on franchises.franchise_id = units.unit_id
									INNER JOIN drivers
									on franchises.franchise_id = drivers.driver_id
									INNER JOIN associations
									on applicants.association_name = associations.association_name  WHERE franchise_approval = 'Approved' and mtop_issuance = 'Issued'
									ORDER BY franchise_id ASC");
		$data=$query->result_array();
		return $data;
	}
	
	public function assoc() 
	{
		$query = $this->db->query("SELECT * from associations
								 ORDER BY association_name ASC"); 
		$data=$query->result_array();
		return $data;
	}
	public function M_assocup($id)
	{
		$query = $this->db->query("UPDATE associations SET assoc_approval='Approved' WHERE association_id='$id'"); 
	}
	public function M_assocdown($id)
	{
		$query = $this->db->query("UPDATE associations SET assoc_approval='Disapproved' WHERE association_id='$id'"); 
	}
	public function assocforapprove() 
	{
		$query = $this->db->query("SELECT * from associations WHERE assoc_approval = 'Pending'
								 ORDER BY association_name ASC"); 
		$data=$query->result_array();
		return $data;
	}
	public function spiassoc($id) 
	{
		$query = $this->db->query("SELECT * from associations
								WHERE association_id = $id"); 
		$data=$query->result_array();
		return $data[0];
	}
	public function M_assoccomplete($id) 
	{
		$query = $this->db->query("SELECT * from associations
								 WHERE association_id = $id"); 
		$data=$query->result_array();
		foreach($data as $row)
		{
			$name = $row['association_name'];
		}
		$query = $this->db->query("SELECT * from applicants
								 WHERE association_name = '$name'"); 
		$data=$query->result_array();
		return $data;
	}
	public function M_searchviolation()
	{
		$query = $this->db->query("SELECT * from violations
								 ORDER BY violation_id ASC"); 
		$data=$query->result_array();
		return $data;
	}
	public function M_getviolationinfo($id)
	{
		$query = $this->db->query("SELECT * from violations
								 where violation_id = $id"); 
		$data=$query->result_array();
		return $data[0];
	}
	public function M_getallviolation()
	{
		$query = $this->db->query("SELECT * from violations"); 
		$data=$query->result_array();
		return $data;
	}
	public function M_deleteviolation($id)
	{
		$query = $this->db->query("DELETE FROM violations WHERE violation_id = $id");
	}
	public function M_insertviolation($vname,$vdetail)
	{
		$query = $this->db->query("INSERT INTO violations (violation_name,violation_detail) VALUES ('$vname','$vdetail')");
	}
	public function M_insertviolationrecord($app_id,$v_name,$vn,$vc,$vr)
	{
		$today = getdate();
		$date[0] = $today['mon'];
		$date[1] = $today['mday'];
		$date[2] = $today['year'];
		
		if (strlen($date[0]) == 1)
		{
			$array[0] = $date[0];
			$array[1] = "0";
			$date[0] = implode("",$array);
			$date[0] = strrev($date[0]);
		}
		if (strlen($date[1]) == 1)
		{
			$array[0] = $date[1];
			$array[1] = "0";
			$date[1] = implode("",$array);
			$date[1] = strrev($date[1]);
		} 
		$today = implode("/",$date); //begin date
		$query = $this->db->query("INSERT INTO violation_record (applicant_id,driver_id,violation_name,complainant_fullname,com_contact_num,complainant_detailed_report,date) VALUES ('$app_id','$app_id','$v_name','$vn','$vc','$vr','$today')");
	}
	public function M_updateviolation($id,$vname,$vdetail)
	{
		$query = $this->db->query("SELECT * from violations WHERE violation_id=$id"); 
		$data=$query->result_array();
		foreach ($data as $row)
		{
			$query1 = $this->db->query("UPDATE violation_record SET violation_name='$vname' WHERE violation_name='$row[violation_name]'");
			break;
		}

		$query = $this->db->query("UPDATE violations SET violation_name='$vname',violation_detail='$vdetail' WHERE violation_id='$id'");
		
	}
	public function deletefran($id) 
	{
		$query = $this->db->query("DELETE FROM franchises WHERE franchise_id = $id");
		$query1 = $this->db->query("DELETE FROM applicants WHERE applicant_id = $id");
		$query2 = $this->db->query("DELETE FROM drivers WHERE driver_id = $id");
		$query3 = $this->db->query("DELETE FROM units WHERE unit_id = $id");
		$query4 = $this->db->query("DELETE FROM new_fran_require WHERE requirement_id = $id");
		$query5 = $this->db->query("DELETE FROM violation_record WHERE applicant_id = $id");
	}
	public function removeassoc($id) 
	{
		$query = $this->db->query("DELETE FROM associations WHERE association_id = $id");
	}
	public function viewassoc($id) 
	{
		$query = $this->db->query("SELECT * FROM associations WHERE association_id = $id");
		$data=$query->result_array();
		return $data[0];
	}
	public function saveassoc($id,$aname,$adetail,$route,$district)
	{
		$query2 = $this->db->query("SELECT * from associations WHERE association_id=$id"); 
		$data=$query2->result_array();
		foreach ($data as $old)
		{
			$query1 = $this->db->query("UPDATE applicants SET association_name='$aname' WHERE association_name = '$old[association_name]'");
			break;
		}
		$query = $this->db->query("UPDATE associations SET association_name='$aname',barangay='$adetail',route='$route',district='$district' WHERE association_id=$id");
	}
	public function newassoc($aname,$adetail,$route,$district,$no_units)
	{
		$query = $this->db->query("INSERT INTO associations (association_name,barangay,route,district,assoc_approval,no_units) values('$aname','$adetail','$route','$district','Pending','$no_units')");
	}
	public function transferowner($id,$name,$mname,$lname,$cstatus,$bday,$age,$address,$ci,$gender,$assoc,$ln,$un,$plt,$rn,
								  $oldname,$oldmname,$oldlname,$oldbday,$oldage,$oldaddress,$oldci,$oldgender,$oldassoc,$oldln,$oldun,$oldplt,$oldrn)
	{
		$query1 = $this->db->query("UPDATE applicants SET first_name='$name',middle_name='$mname',last_name='$lname',birthday='$bday',age='$age',
									application_type='$cstatus',address='$address',contact_num='$ci',gender='$gender',association_name='$assoc',
									licence_num='$ln' WHERE applicant_id=$id");
							
		$query2 = $this->db->query("UPDATE units SET unit_model='$un',plate_num='$plt',registration_num='$rn' WHERE unit_id=$id");
		
		$query3 = $this->db->query("INSERT INTO previous_owners values ($id,'$oldname','$oldmname','$oldlname','$oldbday','$oldage','$oldgender','$oldci','$oldln','$oldassoc','$oldun','$oldplt','$oldrn')");
	//update details of old owner to new owner details and store old owner details to previous_owners table 									
	}
	public function M_updateunitrecord($id,$classification,$mn,$un,$plt,$rn,$cn,$en,$uc)
	{
		$query = $this->db->query("UPDATE units SET classification='$classification',motor_no='$mn',unit_model='$un',plate_num='$plt',registration_num='$rn',chassis_no='$cn',year_model='$en',unit_color='$uc' WHERE unit_id=$id");
	}	
	public function M_count() 
	{
		$query = $this->db->query("SELECT COUNT(*) FROM franchises");
		$data=$query->result_array();
		return $data[0];
	}
	public function M_violationrecord($id) 
	{
		$query = $this->db->query("SELECT * FROM violation_record WHERE applicant_id='$id'");
		$data=$query->result_array();
		return $data;
	}
	public function M_violations() 
	{
		$query = $this->db->query("SELECT * FROM violations");
		$data=$query->result_array();
		return $data;
	}
	
}

?>
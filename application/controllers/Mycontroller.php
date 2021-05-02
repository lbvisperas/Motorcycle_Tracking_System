<?php

class mycontroller extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
	    $this->load->model('mymodel');
		$this->load->library('excel');
		$this->load->dbutil();
		$this->load->helper('download');
	}
	
//------------------------------------EXPORT ZIPPED SQL-------------------------------------------------------------------------------------------------------------------------------
	function db_backup($fileName='tricycle_franchise_database.zip')
	{
		// Backup Settings
		$prefs = array(
        'format'        => 'zip',                       // gzip, zip, txt
        'filename'      => 'tricycle_franchise_database.sql',              // File name - NEEDED ONLY WITH ZIP FILES
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n"                         // Newline character used in backup file
		);

		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup($prefs);

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file(FCPATH.'/downloads/'.$fileName, $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($fileName, $backup);
		
	}
	//-----------------------------------System Backup---------------------------------------------------------------------------------------------
	function sysbackup()
	{
		$this->load->helper('download');
		$this->load->library('zip'); 
		$time = time(); 
		$this->zip->read_dir('C:xampp/htdocs/project/');
		$this->zip->download('system_backup.'.$time.'.zip');
	}
	
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Log in / Log out Module  --------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function index($str='') //this is for calling login form and passing wrong username/password 
	{
		$data['errormsg']=$str;
		$this->load->view("login",$data);
	}
	public function login() //login process
	{
		$mydb = new mymodel();
		$data = $mydb->check_login($this->input->post('username'),$this->input->post('password')); //check if username / password is detected
		if($data) //if query success, or if $data contains value then set session data
		{
			$data_sessions = array('user_id'=> $data[0]['user_id'],'first_name'=> $data[0]['first_name'],'acctype'=> $data[0]['acctype'],'profile_pic'=> $data[0]['profile_pic'],);  //set id and fullname to data_sessions array
            $this->session->set_userdata($data_sessions);  //store session data to Code Igniter sessions
			$this->C_viewfranchises(); //login success... load and enter the system
        }
		else
		{
			$this->index(true); //login failed... go back to login form and trigger error message
        }
	}
	public function home() // load the home page || use system functions
	{  
		$value = $this->session->has_userdata('user_id');  // store true or false (the 'has_userdata() method' only returns true if session name has value) || 'true' if user is logged on 
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic')); // store session values to $data[first_name]
			$this->load->view('templates/header', $data); // pass    $data[first_name]    to (header) view..    then load the header...
			$this->load->view("index"); // load home page
			$this->load->view('templates/footer'); // load footer.. 
		}
		else{$this->index();} // go back to login form if sessions are empty...
	}
	public function logout() // unset sessions contents then redirect to index/login form || destroy login session
	{
        $this->session->unset_userdata('first_name'); 
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('acctype');
		$this->index(); // after log out, go back to login form 
	}
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// User Management Module  --------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	// >>>>>>> Manage accounts/Viewing accounts >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	public function C_viewusers() // get users data then pass them to (V_viewusers) function...  || called/triggered by header link (manage users) and other functions 
	{  
        $mydb = new mymodel(); // initialize model object in order to run queries...
		$data['users'] = $mydb->M_viewusers();  // SELECT * FROM USERS then store to '$data'

		$this->V_viewusers($data);    // pass '$data[user]' to V_viewusers() below.. || trigger V_viewusers() method
	}
	public function V_viewusers($data)  // check if sessions have value... if true, load (header, footer, V_viewusers) views... if false, load login form... 
	{
		$value = $this->session->has_userdata('user_id'); // store true or false (the 'has_userdata() method' only returns true if session name has value) || 'true' if user is logged on
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  // store session values to $data[first_name]
			$this->load->view('templates/header', $data); // pass    $data[first_name]    to (header) view..    then load the header...
			$this->load->view('V_viewusers', $data); // pass    $data[users]    to    (V_viewusers)    view..    then load the main page... || for showing all accounts
			$this->load->view('templates/footer'); // load footer...
		}
		else{$this->index();} // go back to login form if sessions are empty...
	}
	
	// >>>>>>> Create accounts >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function V_adduser()  // load the (V_adduser) view || called/triggered by header link (new user) 
	{  
		$value = $this->session->has_userdata('user_id'); // store true or false (the 'has_userdata() method' only returns true if session name has value) || 'true' if user is logged on
		if ($value==true) // check if (has_userdata method passed true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  // store session values to $data[first_name]
			$this->load->view('templates/header', $data); // pass    $data[first_name]    to (header) view..    then load the header...
			$this->load->view("V_adduser"); // load the main page  || for showing input forms for new account details
			$this->load->view('templates/footer'); // load the footer
		}
		else{$this->index();} // go back to login form if sessions are empty...
	}
	public function C_adduser() // pass new user's data to model || called/triggered by save button in (V_adduser) view
	{
        include './include/profilepicupload.php';
		
		$mydb = new mymodel(); 
		$data=$mydb->M_adduser($this->input->post('fname'),$this->input->post('lname'),$this->input->post('mail'),
								$this->input->post('username'),$this->input->post('pass'),$this->input->post('acctype'),$truelocation_O); 
		$this->C_viewusers(); //trigger C_viewusers || show all users
		$name = $this->input->post('fname');
		$alert['alert'] = "Successfully created new account for '$name'!";
		$this->load->view('modal', $alert);
	}
	
	// >>>>>>> Edit accounts >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function C_getuserinfo($id)  // receive ID from view upon trigger || fetch old user data by id in users database || triggered by *edit button* in (V_viewusers) view
	{
        $mydb = new mymodel(); // initialize model object to run queries
		$data['userinfo']=$mydb->M_getuserinfo($id); // SELECT FROM users WHERE user_id = $id || fetch old user data by id
		$this->V_getuserinfo($data); // pass '$data[userinfo]' to V_getuserinfo() method below.. || trigger V_getuserinfo()  method
	}
	public function V_getuserinfo($data)  // load (V_getuserinfo) view for viewing current user info || pass $data[userinfo] to view
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_getuserinfo", $data); // load main page || pass $data[userinfo] || showing current user info to be edited
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_updateuserinfo() // pass data from (V_getuserinfo) view to model || pass new user info from forms to model || triggered by *save button* in (V_getuserinfo) view 
	{
        $mydb = new mymodel(); 
		
		include './include/profilepicupload.php';
		
		$data=$mydb->M_updateuserinfo($this->input->post('id'),$this->input->post('fname'),$this->input->post('lname'),$this->input->post('mail'),
								$this->input->post('username'),$this->input->post('pass'),$this->input->post('acctype'),$truelocation_O); // pass data to model || UPDATE users SET *** VALUES ***
		$name = $this->input->post('fname');
		if ($this->session->userdata('acctype') == "Administrator") // if administrator, redirect to manage users after updating profile
		{
			$this->C_viewusers(); // redirect manage accounts page 
			if ($this->session->userdata('first_name') == $name)
			{$alert['alert'] = "Your account was successfully edited!";}
			else {$alert['alert'] = "$name's account was successfully edited!";}
			$this->load->view('modal', $alert);
		}
		else //if regular user, redirect to home page since regular users are not allowed to manage accounts aside from their own account
		{
			$this->home(); // redirect home page
			if ($this->session->userdata('first_name') == $name)
			{$alert['alert'] = "Your account was successfully edited!";}
			else {$alert['alert'] = "$name's account was successfully edited!";}
			$this->load->view('modal', $alert); 
		}
	}

	// >>>>>>> Delete accounts >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function C_deleteuser($id) // receive id upon trigger || triggered by *delete button* in (V_viewusers) view
	{
        $mydb = new mymodel();
		$data=$mydb->M_deleteuser($id); // pass id of user to be deleted
		$this->C_viewusers(); // show all users (manage accounts)
		$alert['alert'] = "Account Successfully Deleted!";
		$this->load->view('modal', $alert);
	}
	
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Franchise Management Module  --------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	// >>>>>>> Viewing Franchises >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	public function C_viewfranchises() // triggered by header link (View Franchises)
	{  
		$this->checkexpire();
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_viewfranchises(); 

		$this->V_viewfranchises($data);
	}
	public function V_viewfranchises($data) // loads V_viewfranchises || passes data[franchise] to view
	{  
	
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			
			$this->load->view('templates/header', $data);
			$this->load->view('V_viewfranchises', $data); // showing all franchises of any status
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	
	// >>>>>>> Franchise Editor >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	public function C_editfranchiseinfo()  //display edit franchise forms
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_viewfranchisesforedit();  //display available associations
		$this->V_editfranchiseinfo($data);
	}
	public function V_editfranchiseinfo($data) 
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_editfranchiseinfo", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_editfranchiserecord($id)  
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_completeinfo($id);  
		$data['assoc']=$mydb->selectassoc();  
		$this->V_editfranchiserecord($data);
	}
	public function V_editfranchiserecord($data) 
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_editfranchiserecord", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	// >>>>>>> Adding Franchises >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	public function C_collectfranchiseinfo()  //display new franchise forms
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selectapprovedassoc();  //display available associations
		$this->V_collectfranchiseinfo($data);
	}
	
	public function V_collectfranchiseinfo($data)  // new franchise links 
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_collectfranchiseinfo", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_newfranchiserequire()   //checking requirements for new franchise
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_newfranchiserequire");
			$this->load->view('templates/footer');
		}
		else {$this->index();}
	}
	public function C_createfranchise()  // Saving all records of franchise/applicant/requirements to database
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_createfranchise($this->input->post('name'),$this->input->post('mname'),$this->input->post('lname'),
												   $this->input->post('cstatus'),$this->input->post('bday'),$this->input->post('age'),$this->input->post('address'),
												   $this->input->post('ci'),$this->input->post('gender'),$this->input->post('assoc'),$this->input->post('ln'),
												   $this->input->post('casen'),
												  
												   $this->input->post('un'),$this->input->post('plt'),$this->input->post('rn'),$this->input->post('en'),
												   $this->input->post('cn'),$this->input->post('mn'),$this->input->post('uc'),$this->input->post('classification'),
												   
												   $this->input->post('dname'),$this->input->post('dmname'),$this->input->post('dlname'), $this->input->post('daddress'), 
												   $this->input->post('dcn'), 
												   
												   $this->input->post('operatorpic'),$this->input->post('driverpic'),
												   
												   $this->input->post('r1'),$this->input->post('r2'),$this->input->post('r3'),
												   $this->input->post('r4'),$this->input->post('r5'),$this->input->post('r6'),
												   $this->input->post('r7'),$this->input->post('r8'),$this->input->post('r9'));
		$this->C_viewfranchises();
		$name = $this->input->post('name');
		$alert['alert'] = "Successfully created new franchise for '$name'!";
		$this->load->view('modal', $alert);
	}
	
	// >>>>>>> Renew Franchises >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	public function viewrenew()  //display all renewable franchises
	{  
		$this->checkexpire();
        $mydb = new mymodel();
		$data['franchise']=$mydb->viewexpire();
		$this->searchrenew($data);
	}
	public function renew($id)  //display info of franchise to be renewed
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_completeinfo($id);
		$this->renewpage($data);
	}
	public function renewfranchise($id)  //renew dates 
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->renewal($id);
		$this->viewrenew();
		$name = $this->input->post('name');
		$alert['alert'] = "$name's franchise was successfully renewed!";
		$this->load->view('modal', $alert);
	}
	public function searchrenew($data)   //display all renewable franchises
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('searchrenew', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function renewpage($data)  //checking requirements for renewing franchise
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('renewpage', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	// >>>>>>> Other Essential Functions >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	public function checkexpire() // Updating franchises to "Expired" if the (expire date >= date today) and set time elapsed
	{  
		$mydb = new mymodel(); 
		$data['franchise']=$mydb->updatefranchises();
	}
	public function C_completeinfo($id) // link for *franchise info* button in (V_viewfranchises) view..
	{  
        $mydb = new mymodel(); 
		$data['franchise']=$mydb->M_completeinfo($id); // fetch data from database by id
		$data['violation']=$mydb->M_violationrecord($id);
		$data['violationdata']=$mydb->M_violations();
		$this->V_completeinfo($data); 
	}
	public function V_completeinfo($data)  //complete franchise info button
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_completeinfo', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_completeinfoforapprove($id) // link for *franchise info* button in (V_viewfranchises) view..
	{  
        $mydb = new mymodel(); 
		$data['franchise']=$mydb->M_completeinfo($id); // fetch data from database by id
		$this->V_completeinfoforapprove($data); 
	}
	public function V_completeinfoforapprove($data)  //complete franchise info button
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_completeinfoforapprove', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	// >>>>>>> Approval/Issue MTOP/update pending Functions >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function searchpending()
	{  
		$this->checkexpire();
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_viewfranchises(); 
		$this->updatepending($data);
	}
	public function searchapprove()
	{  
		$this->checkexpire();
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_viewfranchises(); 
		$this->approving($data);
	}
	public function searchissue()
	{  
		$this->checkexpire();
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_viewfranchises();
		$this->searchmtop($data);
	}
	public function approvefranchises($id)
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->approve($id);
		$this->searchapprove();
		$alert['alert'] = "Franchise Approved!";
		$this->load->view('modal', $alert);
	}
	public function disapprovefranchises($id)
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->disapprove($id);
		$this->searchapprove();
		$alert['alert'] = "Franchise disapproved...";
		$this->load->view('modal', $alert);
	}
	public function C_piechart()
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selectassoc();
		$this->V_piechart($data);
	}
	public function V_piechart($data) //load pie chart
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_piechart', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function issuemtop($id)   // give data to issue MTOP page to view document
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_completeinfo($id); //model 
		$this->mtop($data);
	}
	public function setasissued()  //set as issued button
	{  
        $mydb = new mymodel();
		$mydb->setmtopissuance($this->input->post('id'),$this->input->post('assoc_name'));
		$this->searchissue();
		$name = $this->input->post('franchiser_name');
		$alert['alert'] = "$name's Franchise Is Now Active!";
		$this->load->view('modal', $alert);
	}
	public function checkrequire($id) 
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selectrequirements($id); 
		$this->updaterequirements($data);
	}
	public function updaterequire($id)
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->fillrequirements($id,$this->input->post('r1'),$this->input->post('r2'),$this->input->post('r3'),
									$this->input->post('r4'),$this->input->post('r5'),$this->input->post('r6'),
								    $this->input->post('r7'),$this->input->post('r8'),$this->input->post('r9'));
		$this->searchpending();
		$alert['alert'] = "Requirements Updated!";
		$this->load->view('modal', $alert);
	}
	public function allapproved()  //monitoring page
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->monitorpage($data);
	}
	public function export()   // exporting table data as excel
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->exportapproved($data);
	}
	
	// >>>>>>> Dropping Functions >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function drop()  //drop link
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selectdrop();
		$this->dropfran($data);
	}
	public function dropfran($data) //delete franchises
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('dropfran', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_droprequire($id)  
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_completeinfo($id);
		$this->V_droprequire($data);
	}
	public function V_droprequire($data) 
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('droppage', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	
	public function delete($id)  //drop franchise
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->deletefran($id);
		$this->drop();
		$alert['alert'] = "Franchise Successfully Dropped...";
		$this->load->view('modal', $alert);
	}
	
	// >>>>>>> Associations >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function deleteassoc($id)  //delete association
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->removeassoc($id);
		$this->searchassoc();
		$alert['alert'] = "Association Deleted...";
		$this->load->view('modal', $alert);
	}
	public function searchassoc()  //display all associations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->assoc();
		$this->associations($data);
	}
	public function C_approveassoc()  //display all associations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->assocforapprove();
		$this->V_approveassoc($data);
	}
	public function V_approveassoc($data)   //display all transferable franchises
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_approveassoc', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_assocup($id)  //display all associations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_assocup($id);
		$this->C_approveassoc();
		$alert['alert'] = "Association Approved!";
		$this->load->view('modal', $alert);
	}
	public function C_assocdown($id)  
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_assocdown($id);
		$this->C_approveassoc();
		$alert['alert'] = "Association Disapproved...";
		$this->load->view('modal', $alert);
	}
	public function C_allassoc() 
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->assoc();
		$this->V_allassoc($data);
	}
	public function V_allassoc($data)   //display all transferable franchises
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_allassoc', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_assoccomplete($id) 
	{  
        $mydb = new mymodel();
		$data['complete']=$mydb->spiassoc($id);
		$data['franchisers']=$mydb->M_assoccomplete($id);
		$this->V_assoccomplete($data);
	}
	public function V_assoccomplete($data)   //display all transferable franchises
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_assoccomplete', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function assocedit($id)  //display association to be edited
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->viewassoc($id);
		$this->editassoc($data);
	}
	public function updateassoc()  //display association to be edited
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->saveassoc($this->input->post('id'),$this->input->post('aname'),$this->input->post('adetail'),$this->input->post('route'),$this->input->post('district'));
		$this->searchassoc();
		$name = $this->input->post('aname');
		$alert['alert'] = "Association ($name) Successfully Edited!";
		$this->load->view('modal', $alert);
	}
	public function insertassoc()  
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->newassoc($this->input->post('aname'),$this->input->post('adetail'),$this->input->post('route'),$this->input->post('district'),$this->input->post('no_units'));
		$this->C_allassoc();
		$name = $this->input->post('aname');
		$alert['alert'] = "Association ($name) Successfully Created!";
		$this->load->view('modal', $alert);
	}
	public function createnewassoc() 
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('createnewassoc');
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function editassoc($data) //delete franchises
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('editassoc', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function associations($data)   //display all transferable franchises
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('associations', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	//--------------PRINTING--------------------------------------------------------------------------
	
	public function C_printmtop()  //display all violations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->V_printmtop($data);
	}
	public function V_printmtop($data) //adding violations
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_printmtop', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_printapplication()  //display all violations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->V_printapplication($data);
	}
	public function V_printapplication($data) //adding violations
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_printapplication', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_printlegalization()  //display all violations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->V_printlegalization($data);
	}
	public function V_printlegalization($data) //adding violations
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_printlegalization', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_printcertification()  //display all violations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->V_printcertification($data);
	}
	public function V_printcertification($data) //adding violations
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_printcertification', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}

	public function C_printOrderforDropping()  //display all order for dropping 
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->V_printOrderforDropping($data);
	}
	public function V_printOrderforDropping($data) //adding order for dropping
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V__printOrderforDropping', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}



	//>>>>>Violations>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function C_violationrecord()  //display all violations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->V_violationrecord($data);
	}
	public function C_insertviolationrecord()  //display all violations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_insertviolationrecord($this->input->post('app_id'),$this->input->post('v_name'),$this->input->post('vn'),$this->input->post('vc'),$this->input->post('vr'));
		$this->C_violationrecord();
		$name = $this->input->post('name');
		$alert['alert'] = "Violation Record Successfully Created For '$name'!";
		$this->load->view('modal', $alert);
	}
	public function V_violationrecord($data) //adding violations
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_violationrecord', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_searchviolation()  //display all violations
	{  
        $mydb = new mymodel();
		$data['violation']=$mydb->M_searchviolation();
		$this->V_searchviolation($data);
	}
	public function C_insertviolation()  //display all violations
	{  
        $mydb = new mymodel();
		$data['violation']=$mydb->M_insertviolation($this->input->post('vname'),$this->input->post('vdetail'));
		$this->C_searchviolation();
		$alert['alert'] = "Violation Successfully Created!";
		$this->load->view('modal', $alert);
	}
	public function V_addviolation()  //adding violations
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_addviolation', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_deleteviolation($id)  //display all violations
	{  
        $mydb = new mymodel();
		$data['violation']=$mydb->M_deleteviolation($id);
		$this->C_searchviolation();
		$alert['alert'] = "Violation Successfully Deleted!";
		$this->load->view('modal', $alert);
	}
	public function C_getviolationinfo($id)  //display all violations
	{  
        $mydb = new mymodel();
		$data['violation']=$mydb->M_getviolationinfo($id);
		$this->V_getviolationinfo($data);
	}
	public function V_getviolationinfo($data)  //violation page
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_getviolationinfo', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_updateviolation()  
	{  
        $mydb = new mymodel();
		$data['violation']=$mydb->M_updateviolation($this->input->post('id'),$this->input->post('vname'),$this->input->post('vdetail'));
		$this->C_searchviolation();
		$alert['alert'] = "Violation Successfully Edited!";
		$this->load->view('modal', $alert);
	}
	public function V_searchviolation($data)  //violation page
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_searchviolation', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	
	public function C_addviolationrecord($id)  //display all violations
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_completeinfo($id);
		$data['violation']=$mydb->M_getallviolation();
		$this->V_addviolationrecord($data);
	}
	public function V_addviolationrecord($data)  //violation page
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_addviolationrecord', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	// >>>>>>> Transferring >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function viewtransfer()  //display all transferable franchises
	{  
		$this->checkexpire();
        $mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->searchtransfer($data);
	}
	public function transfer($id)  //display old owner details and forms for new owner
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_completeinfo($id);
		$data['assoc'] =$mydb->selectassoc(); //display all available associations in combobox
		$this->transferpage($data);
	}
	public function searchtransfer($data)   //display all transferable franchises
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('searchtransfer', $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function transferfranchise($id)  //update old owner data to new owner data
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->transferowner($id,$this->input->post('name'),$this->input->post('mname'),$this->input->post('lname'),
												$this->input->post('cstatus'),$this->input->post('bday'),$this->input->post('age'),$this->input->post('address'),
												$this->input->post('ci'),$this->input->post('gender'),$this->input->post('assoc'),
												$this->input->post('ln'),$this->input->post('un'),$this->input->post('plt'),
												$this->input->post('rn'),$this->input->post('oldname'),$this->input->post('oldmname'),$this->input->post('oldlname'),
												$this->input->post('oldbday'),$this->input->post('oldage'),$this->input->post('oldaddress'),
												$this->input->post('oldci'),$this->input->post('oldgender'),$this->input->post('oldassoc'),
												$this->input->post('oldln'),$this->input->post('oldun'),$this->input->post('oldplt'),
												$this->input->post('oldrn'));
		$this->C_viewfranchises();
	}
	public function transferpage($data)   
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("transferpage", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function transferrequire() //checking requirements for transferring franchise
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  

			$this->load->view('templates/header', $data);
			$this->load->view("transferrequire", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	
//-----------------------------------------------------------------------------------------------------------------------------------------------------	
	public function mtop($data)   //display MTOP document with data
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("mtop",$data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function approving($data)   
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("approving",$data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function searchmtop($data)   
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("searchmtop",$data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function updatepending($data)   
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("updatepending",$data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function updaterequirements($data)   
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("updaterequirements",$data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	//------------------------------------------------------------------------substitute
	public function C_changeunit()
	{
		$mydb = new mymodel();
		$data['franchise']=$mydb->selecttransfer();
		$this->V_changeunit($data);
	}
	public function V_changeunit($data)   //substitution of unit page
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
			{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_changeunit", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_editunitrecord($id)
	{
		$mydb = new mymodel();
		$data['franchise']=$mydb->M_completeinfo($id);
		$this->V_editunitrecord($data);
	}
	public function V_editunitrecord($data)   //substitution of unit page
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
			{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_editunitrecord", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function C_updateunitrecord()
	{
		$mydb = new mymodel();
		$data['franchise']=$mydb->M_updateunitrecord($this->input->post('id'),$this->input->post('classification'),$this->input->post('mn'),$this->input->post('un'),
																				$this->input->post('plt'),$this->input->post('rn'),$this->input->post('cn'),$this->input->post('en'),
																				$this->input->post('uc'));
		$this->C_changeunit();
		
		$alert['alert'] = "Unit Substitution Successful!";
		$this->load->view('modal', $alert);
	}
	
	//=====================================================================================================
	public function C_count()
	{
		$mydb = new mymodel();
		$data['franchise']=$mydb->M_count();
		$this->V_count($data);
	}
	public function V_count($data)   //substitution of unit page
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
			{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_count", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	//--------------------------------------------------------------------------------------------------------------------
	public function monitorpage($data)    //view all approved franchise
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("monitorpage", $data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function exportapproved($data)    //function for exporting all approved franchises as excel file
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$this->load->view("exportapproved", $data);
		}
		else{$this->index();}
	}

	public function aboutpage() // load the about page 
	{  
		$value = $this->session->has_userdata('user_id');  // store true or false (the 'has_userdata() method' only returns true if session name has value) || 'true' if user is logged on 
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic')); // store session values to $data[first_name]
			$this->load->view('templates/header', $data); // pass    $data[first_name]    to (header) view..    then load the header...
			$this->load->view("about"); // load home page
			$this->load->view('templates/footer'); // load footer.. 
		}
		else{$this->index();} // go back to login form if sessions are empty...
	}
	public function C_restore($info) 
	{ 
		if ($info == 1)
		{$ss['num'] = true;	}
		else if ($info == 2){$ss['num'] = false;}
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view('V_restore', $ss);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
	public function restore_db()
	{
		if ($this->dbutil->database_exists('tricycle_franchise_db'))
		{
			$this->import("good");
		}
		else
		{
			
			$this->import("bad");
		}
	}
	public function import($status)
	{
		if ($status === "good")
		{
			if ($_FILES["sqlpath"]["error"] > 0)
			{
				echo "Error: " . $_FILES["sqlpath"]["error"] . "<br />";
			}
			else
			{
				$path = $_FILES["sqlpath"]["tmp_name"];
				include('./include/db_backup_library.php');
				$dbbackup = new db_backup;
				$dbbackup->connect("localhost","root","","testdb");
				$dbbackup->backup();
				if($dbbackup->db_import("$path"))
				{
					echo "Database Successfully Imported";
					$success = 1;
					{header("location:http://localhost/project/index.php/mycontroller/C_restore/$success");}
				}
			}
		}
		else if ($status === "bad")
		{
			
		}
	}
	//-----------------------------------Download Printables Module----------------------------------------------------------------------------------------------
	public function downloadall()
	{
		$name = './documents/temp/mtop1.xls';
		$name1 = './documents/temp/certification.xls';
		$name2 = './documents/temp/legalization.xls';
		$name3 = './documents/temp/application.xls';
		
		force_download($name, NULL);
		$this->load->helper('download');
		force_download($name1, NULL);
		$this->load->helper('download');
		force_download($name2, NULL);
		$this->load->helper('download');
		force_download($name3, NULL);
	}
	public function mtopcopy()
	{
		$name = './documents/temp/mtop1.xls';
		force_download($name, NULL);
		//$this->excel->pdf('./documents/temp/mtop1.xls');
	}
	public function certcopy()
	{
		$name = './documents/temp/certification.xls';
		force_download($name, NULL);
	}
	public function legalcopy()
	{
		$name = './documents/temp/legalization.xls';
		force_download($name, NULL);
	}
	function orderfordropcopy()
	{
		$name = './documents/temp/orderfordrop.xls';
		force_download($name, NULL);
	}
	public function appcopy()
	{
		$name = './documents/temp/application.xls';
		force_download($name, NULL);
	}
	function petitioncopy()
	{
		$this->load->library("excel");

		$this->excel->load("./documents/temp/petition.xls");
		$this->excel->setActiveSheetIndex(0);
		//reason form data
		$reason = $this->input->post('reason');
		$this->excel->getActiveSheet()->SetCellValue('B25', "$reason");
		//save
		$this->excel->save('./documents/temp/petition.xls');
		
		$name = './documents/temp/petition.xls';
		force_download($name, NULL);
	}


	function PDF()
	{
		$this->load->library("excel");
		$this->excel->pdf("./documents/temp/mtop1.xls","mtop1");
	}
	public function printOverview($id)   // give data to issue MTOP page to view document
	{  
        $mydb = new mymodel();
		$data['franchise']=$mydb->M_completeinfo($id); //model 
		$this->C_printOverview($data);
	}

	public function C_printOverview($data)   //display MTOP document with data
	{  
		$value = $this->session->has_userdata('user_id');
		if ($value==true)
		{
			$data['first_name'] = array ($this->session->userdata('first_name'),$this->session->userdata('user_id'),$this->session->userdata('acctype'),$this->session->userdata('profile_pic'));  
			$this->load->view('templates/header', $data);
			$this->load->view("V_printOverview",$data);
			$this->load->view('templates/footer');
		}
		else{$this->index();}
	}
} 
?>?>
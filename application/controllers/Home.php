<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->library('session');
			 $this->load->model('Common_model','common');
		}
	public function index()
	{
		$this->load->view('home');
	}

	function getcompanies()
	{
		$company = $this->input->post('company');

		$url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=".$company."&apikey=".API_KEY;
		$resonse = get_url_response($url);
		//call api
		if($resonse->bestMatches)
		{
				$companies = $resonse->bestMatches;

				$responsearray = [];
				if($companies)
				{
				foreach ($companies as $key => $value) 
				{
				$value1 = (array) $value;
				$reCreateArray = array_values($value1);
				$responsearray[] = array("value"=>$reCreateArray[0],"label"=>$reCreateArray[1]);
				}
				}
				echo json_encode($responsearray);
				}
				else
				{
				return false;
				}
     }



function companydetails($ticker='')
{
	if(!empty($ticker))
	{
		$url = "https://www.alphavantage.co/query?function=OVERVIEW&symbol=".$ticker."&apikey=".API_KEY;
		$companydetails = get_url_response($url);
		$value1 = (array) $companydetails;
	 	$data['company'] = array_values($value1);
	    $dailyurl = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=".$ticker."&apikey=demo".API_KEY;
		$price_details = get_url_response($dailyurl);
		$value1 = (array) $price_details;
		$outside = array_values($value1);
		$innerside = $outside[0];
		$value2 = (array) $innerside;
		$data['price_details'] = array_values($value2);

		if($data['company'][2] && $data['price_details'][1])
		{
		$this->load->view('companydetails',$data);
	    }
	    else
	    {
	   $this->session->set_flashdata('msg', '<div class="alert alert-danger">Server Limit exceed (Only 5 request for one minute  and 500 request for one day for single API Key)...try after some times.</div>');
	    redirect('home');	
	    }
	}
}


function login()
{
	 $postdata = $this->input->post();
     if(!empty($postdata['email']) &&  !empty($postdata['email']))
     {
             $email = trim($postdata['email']);
             $password = trim($postdata['password']);
             $password = encrypt_decrypt('encrypt',$password);
             $isUserExist = $this->common->selectrow('user',array('email' => $email,'password' => $password));

             if($isUserExist)
             {
                  $this->session->set_userdata('name','virat');

                   $user_data = [
                        'staff_user_id' => $isUserExist->id,
                        'email' => $isUserExist->email,
                        'name' => $isUserExist->name,
                    ];

                 $this->session->set_userdata($user_data);
                 redirect('home/portfolio');
             }
             else
             {
             	$this->session->set_flashdata('msg', '<div class="alert alert-danger text-left">Invalid Email and password</div>');
             	redirect('home/login');
             }
     }

	$this->load->view('login');
}



    function saveUsers(){
    	$postdata = $this->input->post();
		try{
			if(!empty($postdata['name']) &&  !empty($postdata['email']) && !empty($postdata['password']))
			{
			   $postdata['email'] = $this->security->xss_clean($postdata['email']);
			   $postdata['password'] = $this->security->xss_clean($postdata['password']);
			   $postdata['name'] = $this->security->xss_clean($postdata['name']);
			   $postdata['phone'] = $this->security->xss_clean($postdata['phone']);

				$is_email_exist =0;
				$email = trim($postdata['email']);
				if(!empty($email)){
					$isUserExist = $this->common->selectrow('user',array('email' => $email));
					if(!empty($isUserExist)){
						throw new Exception('Email is already exsit!');
					}else{
						$is_email_exist =0;
					}
				}

				$password = encrypt_decrypt('encrypt',$postdata['password']);

				$insertData['name'] 		= $postdata['name'];
				$insertData['email'] 			= $postdata['email'];
				$insertData['password'] 		= $password;
				$insertData['phone'] = $postdata['phone'];
				$insertData['created_at'] 		= date('Y-m-d H:i:s');
				 $staff_id = $this->common->insert('user',$insertData);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Registration has been completed Successfully.You can login.</div>');
				redirect('home/login');
			}
		}catch(Exception $e){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-left">'.$e->getMessage().'</div>');
			redirect('home/login');
		}
    }


    function register()
    {
        $this->load->view('register');
    }


      function checkemilexist()
  {
  	if($_POST['email'] && !empty($_POST['email']))
	    {
	    	 $email = $_POST['email'];
	    	 $staff 	= $this->common->selectrow('user',['email'=>$email]);
             if($staff)
             echo json_encode(FALSE);
             else
             echo json_encode(TRUE);	
	    }
  }


  function portfolio()
  {
  	 if($this->session->userdata('staff_user_id'))
  	 {
  	 	$data['ticker'] = $this->common->select('ticker',['user_id'=>$this->session->userdata('staff_user_id')]);
         $this->load->view('portfolio',$data);
  	 }
  	 else
  	 {
  	 	redirect('home/login');
  	 }
  }


  function logout()
  {
	$this->session->unset_userdata('staff_user_id');
	$this->session->unset_userdata('email');
	$this->session->unset_userdata('name');
  	 $this->session->sess_destroy();
  	   $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
       $this->output->set_header("Pragma: no-cache");
  	  redirect('home/login', 'refresh');
  }

  function subscribe()
  {
  	 $postdata = $this->input->post();

  	 if($this->input->post())
  	 {
  	 	$companyexist = $this->common->selectrow('ticker',array('company' =>$postdata['company']));

        if($companyexist)
        {
           echo "exist";
        }
        else
        {
  	    $this->common->insert('ticker',$postdata);
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Subscribe has been added Successfully</div>');
		echo "success";
	   }
  	 }
  }

  function viewdetails()
  {
  	$trackid = $this->input->post('trackid');
  	if(!empty($trackid))
  	{
  		$data['ticker'] = $this->common->selectrow('ticker',['id'=>$trackid]);
  		echo $this->load->view('viewdetails',$data,true);
  	}
  }


}

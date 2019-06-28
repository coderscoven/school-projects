<?php
class Registration
{

    private $db_connection = null;

    public $errors = array();

    public $messages = array();


    public function __construct()
    {
        if (isset($_POST["registerUser"])) {
            $this->registerNewUser();
        }
    }
    private function registerNewUser()
    {
	
		if (empty($_POST['input_login_username_session'])) {
            $this->errors[] = "<p class='text-center text-danger'>Empty username!</p>";
        } 
		elseif (empty($_POST['input_login_email_session'])) {
            $this->errors[] = "<p class='text-center text-danger'>Empty email address!</p>";
        }
		elseif (strlen($_POST['input_login_username_session']) > 15 || strlen($_POST['input_login_username_session']) < 4) {
            $this->errors[] = "<p class='text-center text-danger'>Invalid length entered for username!</p>";
        }  	
		elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "<p class='text-center text-danger'>Empty Password!</p>";
        } 
		elseif ($_POST['user_password_new'] != $_POST['user_password_repeat']) {
            $this->errors[] = "<p class='text-center text-danger'>Password and password repeat are not the same!</p>";
        }
		elseif (strlen($_POST['user_password_new']) < 8) {
            $this->errors[] = "<p class='text-center text-danger'>Password has a minimum length of 8 characters!</p>";
        }
		elseif (!preg_match('/^[a-z\d]{4,10}$/i', $_POST['input_login_username_session'])) {
            $this->errors[] = "<p class='text-center text-danger'>Username does not fit the name scheme: only a-Z and numbers are allowed, 4 to 10 characters!</p>";
        } 
		
		elseif (strlen($_POST['input_login_email_session']) > 64) {
            $this->errors[] = "Email cannot be longer than 64 characters";
        }
		elseif (!filter_var($_POST['input_login_email_session'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
        } 
		
		else{
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $input_login_username_session = $this->db_connection->real_escape_string(strip_tags($_POST['input_login_username_session'], ENT_QUOTES));
				
                $input_login_email_session = $_POST['input_login_email_session'];				

                $user_password = $_POST['user_password_new'];

                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                // check if username or email already exists
                $sql = "SELECT * FROM admin_login_details
				WHERE admin_user_name = '" . $input_login_username_session . "' OR admin_email = '" . $input_login_email_session . "'";
                $query_check_user_name = $this->db_connection->query($sql);

                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "<p class='text-center text-danger'>Sorry, that username or email address entered already exists.</p>";
                } else {
                   
                  
					 // write new user's data into database
	$query_new_user_insert1 = $this->db_connection->query("INSERT INTO admin_login_details 
	(
		admin_email,
		admin_user_name,
		admin_password
	) VALUES 
	(
	'".$input_login_email_session."',
	'".$input_login_username_session."',
	'".$user_password_hash."')");
					
		// if user has been added successfully
		if ($query_new_user_insert1) {
		$this->messages[] = "<p class='text-center text-success'>Your account was successfully created!</p>";

		} else {
		$this->errors[] = "<p class='text-center text-danger'>Sorry, your registration failed. Please go back and try again.</p>";
		}
                }// username / phone number does not exist
            }// no database connection error 
			else {
                $this->errors[] = "<p class='text-center text-danger'>Sorry, no database connection.</p>";
            }
        } // validation success 
			
    } // registerNewUser function 
} // register class

<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['input_login_session'])) {
            $this->errors[] = "<p class='text-center text-danger'>Username/Email field was empty.</p>";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "<p class='text-center text-danger'>Password field was empty.</p>";
        } elseif (!empty($_POST['input_login_session']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $input_login_session = $this->db_connection->real_escape_string($_POST['input_login_session']);

                $sql = "SELECT admin_id, admin_user_name, admin_email, admin_password
                        FROM admin_login_details
                        WHERE admin_user_name = '" . $input_login_session . "' OR admin_email = '" . $input_login_session . "'";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    $result_row = $result_of_login_check->fetch_object();

                    if (password_verify($_POST['user_password'], $result_row->admin_password)) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['input_login_name'] = $result_row->admin_user_name;
                        $_SESSION['input_login_email'] = $result_row->admin_email;
                        $_SESSION['input_login_status'] = 1;

                    } else {
                        $this->errors[] = "<p class='text-center text-danger'>Wrong username or password.</p>";
                    }
                } else {
                    $this->errors[] = "<p class='text-center text-danger'>Wrong username or password.</p>";
                }
            } else {
                $this->errors[] = "<p class='text-center text-danger'>Database connection problem.</p>";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['input_login_status']) AND $_SESSION['input_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}

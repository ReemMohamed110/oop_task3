<?php
session_start();
class Session
{

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return "not found";
        }
    }
    public static function flash($key)
    {
        if (isset($_SESSION[$key])) {
            echo $_SESSION[$key];
            unset($_SESSION[$key]);
        } else {
            return "not found";
        }
    }
    public static function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        } else {
            return "not found";
        }
    }
    public static function removeAll()
    {
        session_destroy();
    }
    public static function getAll()
    {
        print_r($_SESSION);
    }
    public static function has($key)
    {
        if (isset($_SESSION[$key])) {
            return 'true';
        } else {
            return 'false';
        }
    }

}
// Session::set("name", "reem");
// Session::set("age", "23");
// $newSession = Session::get("age");
// $newSession=Session::flash("age");
// Session::getAll();
// Session::has("name");
// var_dump($newSession);
?>
<?php
// if($_SERVER['REQUEST_METHOD']=="POST"){

//     $key=$_POST['key'];
    
//     $value=$_POST['value'];
//     Session::set($key, $value);
//     Session::getAll();

// }

?>


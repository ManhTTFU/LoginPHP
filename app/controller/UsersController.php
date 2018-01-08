<?php

namespace App\Controller;
session_start();
use App\Core\App;
class UsersController
{
    public function index()
    {
        $users = App::get('database')->selectAll('user');
        return view('users', compact('users'));
        
    }
    public function store()
    {
        App::get('database')->insert('user',
        [
            'name' => $_POST['name']
        
        ]);
        return redirect('users');
 
        
    }


public function register()
{
    $fullname = $_POST['fullname'];
    $gmail = $_POST['gmail'];
    $name = $_POST['name'];
    $password = $_POST['password'];

  

    // check for empty field
    if (empty($fullname) || empty($gmail) || empty($name) || empty($password) ) {
     
        return view('register');
       
    } else {
     
        if (!preg_match("/^[a-z A-Z]*$/", $fullname) || !preg_match("/^[a-zA-Z1-9]*$/", $name)) {
           
            return view('register');
          
        } else {
        
            if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        
                return view('register');
             
            } else {
                // get result set from database
                $resultSet = App::get('database')->checkUsers('login', $name);
                $countRow = count($resultSet);
            
                if ($countRow>0) {
           
                    return view('register');
                         
                } else {

                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    App::get('database')->insert('login', [
                        'user_name' => $_POST['fullname'],
                        'user_gmail' => $_POST['gmail'],
                        'user_uid' => $_POST['name'],
                        'user_password' => $hashed_password,
                    ]);
                    // register successed then log in
                    $resultSet = App::get('database')->checkLogin('login', $name);
                    $_SESSION['user_id'] = $resultSet['user_id'];
                    $_SESSION['user_name'] = $resultSet['user_name'];
                    $_SESSION['user_gmail'] = $resultSet['user_gmail'];
                    $_SESSION['user_uid'] = $resultSet['user_uid'];
                    return view('index');
                }
            }
        }
        
    }
}

public function login(){
    
            $username = $_POST['txtusername'];
            $password = $_POST['txtpassword'];
    
            if(empty($username) || empty($password)){
                return view('login');
                exit();
    
            }else{
               
                $resultSet = App::get('database')->checkLogin('login', $username);
                $coutRow = count($resultSet);
                // var_dump($coutRow);
                if($coutRow < 1){
                    return view('login');
                    exit();
                }else{
                    $hashpassword = password_verify($password, $resultSet['user_password']);
                    // die(var_dump($hashpassword));
                    if($hashpassword == FALSE){
                        return view('login');
                        exit();
                    }elseif($hashpassword == TRUE){
                        $resultSet2 = App::get('database')->sendMess('message', $resultSet['user_id']);
                        //die (var_dump($resultSet2));
                        $resultSet1 = json_decode(json_encode($resultSet2), true);
                 
                        $_SESSION['message'] = $resultSet1;
                        $_SESSION['user_name'] = $resultSet['user_name'];
                        $_SESSION['user_uid'] = $resultSet['user_uid'];
              
                        return view('index');
                    
                    }
                }
            }
    }

    public function logout () {
        session_unset();
        session_destroy();
        return view('index');
        exit(); 
    }

    public function message(){
        $send_uid = $_POST['txtusername'];
        $send_content = $_POST['txtcontent'];

        if(empty($send_uid) || empty($send_content)){
            return view('message');
            exit();
        }else{
            $to_uid = App::get('database')->returnID('login', $send_uid);

            if (!$to_uid) {
                return view('message');
                exit();
            
                
                }else{
                    App::get('database')->insert('message', [
                        'to_uid' => intval($to_uid['user_id']),
                        'content' => $_POST['txtcontent'],

                    ]);
               
                    return view('message', compact('message'));
                }

        }
    }
    

}

   

?>

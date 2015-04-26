<?php
class User extends CI_model{

    function __construct(){
        parent::__construct();
    }

    function createUser($fbid, $username, $email, $password, $cred){
        $data = array('facebook_id' => $fbid,
            'username' => $username,
            'email' => $email,
            'password' => $this->encrypt->encode($password),
            'credibility' => $cred,
            'date_created' => mdate("%Y-%m-%d", time()));
        return $this->db->insert('users', $data);
    }

    function getUser($userid){
        $query = $this->db->get_where('users', array('id' => $userid));
        $row = $query->result()[0];
        $query->free_result();
        return $row;
    }

    function getAllUsers(){
        $query = $this->db->query("SELECT * FROM users");
        return $query;
    }

    // function updateUser($userid, $username, $password, $expired, $enabled){
    //     $data = array('user_name' => $username,
    //        'user_password' => $this->encrypt->encode($password),
    //        'user_dateexpired' => $expired,
    //        'user_enabled' => $enabled,
    //        'user_role' => $role);

    //     return $this->db->update('users', $data, array('user_id' => $userid));
    // }

    function validateUser($username, $userpass){
        $query = $this->db->query("SELECT * FROM users WHERE user_name = ?", $username);
        if($this->encrypt->decode($query->result()[0]->user_pass) == $userpass){
            return $query->result()[0];
        }
        else{
            return FALSE;
        }
    }

}
?>
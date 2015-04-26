<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getReportsByUser($username)
    {
    	$this->db->select('*');
    	$this->db->from('users');
    	$this->db->join('reports','users.id = reports.user_id');
    	$query = $this->db->get();

    	return $query;
    }

}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function searchPlate($pn)
    {
    	$sql = "SELECT * FROM reports where plate_number = ?";
    	$query = $this->db->query($sql, array($pn));
    	$table = array();
    	foreach ($query->result() as $row) {
    		$table[] = $row;
    	}
        return $table;

	}

	function getReportsByUser()
	{
		$username = $this->input->get('username');

	}

    public function createReport($plateno, $vehicletype, $date, $type, $location, $lat, $lon, $description, $image, $score){
        $data = array('plate_number' => $plateno,
            'vehicle_type' => $vehicletype,
            'date_incident' => $date,
            'date_submitted' => mdate("%Y-%m-%d", time()),
            'incident_type' => $type,
            'location' => $location,
            'lat' => $lat,
            'lon' => $lon,
            'description' => $description,
            'image' => $image,
            'score' => $score);
        return $this->db->insert('reports', $data);
    }

    function getReport($reportid){
        $query = $this->db->get_where('reports', array('id' => $userid));
        $row = $query->result()[0];
        $query->free_result();
        return $row;
    }

    function getAllReports(){
        $this->db->order_by("id","desc");
        $query=$this->db->get("reports");
        return $query;
    }

    function getCountPerLocation(){
        $query = $this->db->query("SELECT location, incident_type, COUNT(incident_type) AS count, lat, lon FROM reports GROUP BY location, incident_type");
        $table = array();
        foreach ($query->result() as $row) {
            $table[] = $row;
        }
        $query->free_result();
        return $table;
    }

}


?>

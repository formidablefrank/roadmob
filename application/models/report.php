<?php

class Report extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function createReport($plateno, $vehicletype, $date, $type, $location, $description, $image, $score){
        $data = array('plate_number' => $plateno,
            'vehicle_type' => $vehicletype,
            'date' => mdate("%Y-%m-%d", time()),
            'incident_type' => $type,
            'location' => $location,
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
        $query = $this->db->query("SELECT * FROM reports");
        return $query;
    }



}

?>
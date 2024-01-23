<?php
class Counter_model extends CI_Model {

	public function TodaysOnlineSales(){
		$this->db->select('*');
        $this->db->from('reservationrecord');
        $this->db->where('reserve_date', $reserveDate);

        $query  = $this->db->get()->row_array();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return null; 
        }
	}


}
?>
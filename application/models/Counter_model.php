<?php
class Counter_model extends CI_Model {

	public function TodaysOnlineSales($today){
		$this->db->select('*');
        $this->db->from('reservationrecord');
        $this->db->where('reserve_date', $today);
        $query  = $this->db->get()->result_array();
        return count($query); 
	}
    public function TodaysDiscountSales($today){
        $this->db->select('*');
        $this->db->from('discountreservationrecord');
        $this->db->where('reserve_date', $today);
        $query  = $this->db->get()->result_array();
        return count($query); 
    }

    public function GSales(){
        $this->db->select('*');
        $this->db->from('reservationrecord');
        $query  = $this->db->get()->result_array();
        return $query; 
    }
    public function DSales(){
        $this->db->select('*');
        $this->db->from('discountreservationrecord');
        $query  = $this->db->get()->result_array();
        return $query; 
    }    

}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class LogModel extends CI_Model {
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function delete_log()
    {
    	$range = 1;
    
		return $this->db->query("DELETE FROM log WHERE log_id IN (
									  SELECT * FROM (
									    SELECT log_id FROM log WHERE DATEDIFF(CURDATE(), log_time) >= 7
									  ) AS t2
									)
								");

    }
}
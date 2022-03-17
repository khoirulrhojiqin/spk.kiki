<?php
class MY_Session extends CI_Session {

public function __construct() {
    parent::__construct();
}

function sess_destroy() {
    $id='1';
    $data = array(
      'status2' => '0'
     );
    $this->CI->db->update("m_user",$data);
    $this->db->where('id', $id);
    parent::sess_destroy();
}
}
?>
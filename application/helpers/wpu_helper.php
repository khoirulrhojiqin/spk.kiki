<?php

function is_logged_in()
{	
	$ci = get_instance();
	if (!$ci->session->userdata('role')) {
		redirect('login');
	} else{
		
		// $menu = $ci->uri->segment(1);

		// $queryMenu = $ci->db->get_where('user_menu',['menu' => $menu])->row_array();
		// $menu_id = $queryMenu['id'];
		$role_id = $ci->session->userdata('role_id');
		$ci->db->select('*');
		$ci->db->from('billco_m_user_acl');
		$ci->db->join('billco_m_user_sub_menu','billco_m_user_sub_menu.menu_id = billco_m_user_acl.sub_menu_id');
		$ci->db->where('billco_m_user_acl.user_id',$role_id);
		$subMenu = $ci->db->get()->result_array();
        foreach ($subMenu as $key) {
        	$menu_id = $key['sub_menu_id'];
        }
		// $ci->db->where('sub_menu_id <', 1);
		// $userAccess = $ci->db->get_where('billco_m_user_acl', ['user_id' => $role_id, 'sub_menu_id' => $menu_id ]);
        

		if ($menu_id < 1) {
		 	redirect('auth/blocked');
		 } 
	}
}

function check_access($role_id, $menu_id)
{
	$ci = get_instance();

	$ci->db->where('role_id', $role_id);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('billco_m_user_access_menu');

	if ($result->num_rows() > 0) {
		return " checked='checked'";
	}
}
function check_access_user($userId,$smId)
{
	$ci = get_instance();

	$ci->db->where('user_id', $userId);
	$ci->db->where('sub_menu_id', $smId);
	$result = $ci->db->get('billco_m_user_acl');

	if ($result->num_rows() > 0) {
		return " checked='checked'";
	}
}
function check_access_download($userId,$smId)
{
	$ci = get_instance();

	$ci->db->where('user_id', $userId);
	$ci->db->where('sub_menu_id', $smId);
	$result = $ci->db->get('billco_m_user_acl');

	foreach ($result->result() as $val) {
		if ($val->report > 0 ) {
			return " checked='checked'";
		}
	}
}

	// $ci->db->where('id', $userId);
	// $data = $ci->db->get('tb_user');
	// foreach ($data->result() as $row) {
	// 	if ($row->role_id == 1) {
	// 		return " disabled='disabled'";
	// 	}
	// }


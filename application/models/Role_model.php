<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Role_model extends CI_Model
{
    public function getRole()
    {
        $query = $this->db->get('user_role');

        return $this->db->query($query)->result_array();
    }
}

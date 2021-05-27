<?php
class Statemodel extends CI_Model
{   

     function create($formArray)
    {    
         $this->db->insert('states',$formArray);

    }

    function all() 
    {
        return $states = $this->db->get('states')->result_array();

    }
    
    
    function getStates($statesId) 
    {
        $this->db->select('countries.*,states.*');
        $this->db->from('states');
        $this->db->join('countries', 'states.id = countries.id', 'inner join'); 
        $query = $this->db->get();
        return $query->result();
        /*$this->db->where('id',$statesId);
        return $states = $this->db->get('states')->row_array();*/
    }

    function updateStates($statesId,$formArray)
    {
        $this->db->where('id',$statesId);
        $this->db->update('states',$formArray);
    }

    function deleteStates($statesId)
    {
        $this->db->where('id',$statesId);
        $this->db->delete('states');
    }

}
?>    
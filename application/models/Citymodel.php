<?php
class Citymodel extends CI_Model
{   

     function create($formArray)
    {    
         $this->db->insert('cities',$formArray);

    }

    function all() 
    {
        return $cities = $this->db->get('cities')->result_array();

    }

    function getCities($citiesId) 
    {
        $this->db->where('id',$citiesId);
        return $cities = $this->db->get('cities')->row_array();
    }

    function updateCities($citiesId,$formArray)
    {
        $this->db->where('id',$citiesId);
        $this->db->update('cities',$formArray);
    }

    function deleteCities($citiesId)
    {
        $this->db->where('id',$citiesId);
        $this->db->delete('cities');
    }

}
?>    
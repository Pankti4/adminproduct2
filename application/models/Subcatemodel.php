<?php
class Subcatemodel extends CI_Model
{   

     function create($formArray)
    {    
         $this->db->insert('subcategories',$formArray);

    }

    function all() 
    {
        return $subcategories = $this->db->get('subcategories')->result_array();

    }

    function getSubcategories($subcategoriesId) 
    {
        $this->db->where('id',$subcategoriesId);
        return $subcategories = $this->db->get('subcategories')->row_array();
    }

    function updateSubcategories($subcategoriesId,$formArray)
    {
        $this->db->where('id',$subcategoriesId);
        $this->db->update('subcategories',$formArray);
    }

    function deleteSubcategories($subcategoriesId)
    {
        $this->db->where('id',$subcategoriesId);
        $this->db->delete('subcategories');
    }

}
?>    
<?php
class Productmodel extends CI_Model
{   

    // function get_category()
    // {
    //     $query = $this->db->get('categories');
    //     return $query;  
    // }
 
    // function get_sub_category($category_id)
    // {
    //     $query = $this->db->get_where('subcategories', array('category_id' => $category_id));
    //     return $query;
    // }



    // function get_products()
    // {
    //     $this->db->select('id,name,category_name,subcategory_name');
    //     $this->db->from('products');
    //     $this->db->join('categories','category_id = id','left');
    //     $this->db->join('subcategories','subcategory_id = id','left'); 
    //     $query = $this->db->get();
    //     return $query;
    // }



     function create($formArray)
    {    
         $this->db->insert('products',$formArray);

    }

    function all() 
    {
        return $products = $this->db->get('products')->result_array();

    }

    function getProducts($productsId) 
    {
        $this->db->where('id',$productsId);
        return $products = $this->db->get('products')->row_array();
    }

    function updateProducts($productsId,$formArray)
    {
        $this->db->where('id',$productsId);
        $this->db->update('products',$formArray);
    }

    function deleteProducts($productsId)
    {
        $this->db->where('id',$productsId);
        $this->db->delete('products');
    }

}
?>    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {

  function index()
  {   
      $this->load->model('Productmodel');
      $products = $this->Productmodel->all();
      $data = array();
      $data['products'] = $products;

      // $data['products'] = $this->Productmodel->get_products();

      $this->load->view('user/prolist',$data);
  }


  // function get_sub_category(){
  //       $category_id = $this->input->post('id',TRUE);
  //       $data = $this->Productmodel->get_sub_category($category_id)->result();
  //       echo json_encode($data);
  //   }

  //   function save_product(){
  //       $name   = $this->input->post('name',TRUE);
  //       $category_id    = $this->input->post('categories',TRUE);
  //       $subcategory_id = $this->input->post('subcategories',TRUE);
  //       $this->Productmodel->save_product($name,$category_id,$subcategory_id);
  //       redirect('Product');
  //   }




   function create()
   {
      $this->load->model('Productmodel');
      $this->form_validation->set_rules('name','Name','required|is_unique[products.name]');
      $this->form_validation->set_rules('status','Status','required');

      if($this->form_validation->run() == false)
      {
         $this->load->view('user/procreate'); 
      } else 
      {
        $formArray = array();
        $formArray['name'] = $this->input->post('name');
        $formArray['status'] = $this->input->post('status');
        $formArray['created'] = date('Y-m-d H:i:s', time());
        $this->Productmodel->create($formArray);
        $this->session->set_flashdata('success','Product Successfully Added!');
        redirect(base_url().'user/Product');
      }  
    }

    function edit($productsId)
  {
    $this->load->model('Productmodel');
    $products = $this->Productmodel->getProducts($productsId);
    $data = array();
    $data['products'] = $products;
    $formArray = array();
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('status','Status','required');
    if ($this->form_validation->run() == false) 
    {
      $this->load->view('user/proedit',$data);
    } else
     {
      $formArray = array();
      $formArray['name'] = $this->input->post('name');
      $formArray['status'] = $this->input->post('status',true);
      $formArray['updated'] = date('Y-m-d H:i:s', time());
      $this->Productmodel->updateProducts($productsId,$formArray);
      $this->session->set_flashdata('success','Products Updated successfully!');
      redirect(base_url().'user/Product');
     }    
  }

  function delete($productsId)
  {
    $this->load->model('Productmodel');
    $products = $this->Productmodel->getProducts($productsId);
    if(empty($products))
    {
      $this->session->set_flashdata('failure','Products not found in database!');
      redirect(base_url().'user/Product');  
    }
    $this->Productmodel->deleteProducts($productsId);
    $this->session->set_flashdata('success','Products deleted successfully');
      redirect(base_url().'user/Product');
  }
}
?>
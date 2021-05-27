<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcate extends CI_Controller {

  function index()
  {   
      $this->load->model('Subcatemodel');
      $subcategories = $this->Subcatemodel->all();
      $data = array();
      $data['subcategories'] = $subcategories;
      $this->load->view('user/sulist',$data);
  }

   function create()
   {
      $this->load->model('Subcatemodel');
      $this->form_validation->set_rules('name','Name','required|is_unique[subcategories.name]');
      $this->form_validation->set_rules('status','Status','required');

      if($this->form_validation->run() == false)
      {
         $this->load->view('user/sucreate'); 
      } else 
      {
        $formArray = array();
        $formArray['name'] = $this->input->post('name');
        $formArray['status'] = $this->input->post('status');
        $formArray['created'] = date('Y-m-d H:i:s', time());
        $this->Subcatemodel->create($formArray);
        $this->session->set_flashdata('success','Subcategories Successfully Added!');
        redirect(base_url().'user/Subcate');
      }  
    }

    function edit($subcategoriesId)
  {
    $this->load->model('Subcatemodel');
    $subcategories = $this->Subcatemodel->getSubcategories($subcategoriesId);
    $data = array();
    $data['subcategories'] = $subcategories;
    $formArray = array();
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('status','Status','required');
    if ($this->form_validation->run() == false) 
    {
      $this->load->view('user/suedit',$data);
    } else
     {
      $formArray = array();
      $formArray['name'] = $this->input->post('name');
      $formArray['status'] = $this->input->post('status',true);
      $formArray['updated'] = date('Y-m-d H:i:s', time());
      $this->Subcatemodel->updateSubcategories($subcategoriesId,$formArray);
      $this->session->set_flashdata('success','Subcategories Updated successfully!');
      redirect(base_url().'user/Subcate');
     }    
  }

  function delete($subcategoriesId)
  {
    $this->load->model('Subcatemodel');
    $subcategories = $this->Subcatemodel->getSubcategories($subcategoriesId);
    if(empty($subcategories))
    {
      $this->session->set_flashdata('failure','Subcategories not found in database!');
      redirect(base_url().'user/Subcate');  
    }
    $this->Subcatemodel->deleteSubcategories($subcategoriesId);
    $this->session->set_flashdata('success','Subcategories deleted successfully');
      redirect(base_url().'user/Subcate');
  }
}
?>
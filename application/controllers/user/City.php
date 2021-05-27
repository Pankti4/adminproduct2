<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class City extends CI_Controller {

  function index()
  {   
      $this->load->model('Citymodel');
      $cities = $this->Citymodel->all();
      $data = array();
      $data['cities'] = $cities;
      $this->load->view('user/cilist',$data);
  }

   function create()
   {
      $this->load->model('Citymodel');
      $this->form_validation->set_rules('name','Name','required|is_unique[cities.name]');
      $this->form_validation->set_rules('status','Status','required');

      if($this->form_validation->run() == false)
      {
         $this->load->view('user/cicreate'); 
      } else 
      {
        $formArray = array();
        $formArray['name'] = $this->input->post('name');
        $formArray['status'] = $this->input->post('status');
        $formArray['created'] = date('Y-m-d H:i:s', time());
        $this->Citymodel->create($formArray);
        $this->session->set_flashdata('success','City Successfully Added!');
        redirect(base_url().'user/City');
      }  
    }

    function edit($citiesId)
  {
    $this->load->model('Citymodel');
    $cities = $this->Citymodel->getCities($citiesId);
    $data = array();
    $data['cities'] = $cities;
    $formArray = array();
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('status','Status','required');
    if ($this->form_validation->run() == false) 
    {
      $this->load->view('user/ciedit',$data);
    } else
     {
      $formArray = array();
      $formArray['name'] = $this->input->post('name');
      $formArray['status'] = $this->input->post('status',true);
      $formArray['updated'] = date('Y-m-d H:i:s', time());
      $this->Citymodel->updateCities($citiesId,$formArray);
      $this->session->set_flashdata('success','City Updated successfully!');
      redirect(base_url().'user/City');
     }    
  }

  function delete($citiesId)
  {
    $this->load->model('Citymodel');
    $cities = $this->Citymodel->getCities($citiesId);
    if(empty($cities))
    {
      $this->session->set_flashdata('failure','Cities not found in database!');
      redirect(base_url().'user/City');  
    }
    $this->Citymodel->deleteCities($citiesId);
    $this->session->set_flashdata('success','City deleted successfully');
      redirect(base_url().'user/City');
  }
}
?>
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;



class AppointmentController extends BaseController
{private $appointment = '';
    protected $helpers = ['form', 'url'];
    public function __construct(){
        $this->appointment = new AppointmentModel();
    }

    public function index()
    {
        $data['items']=$this->appointment->findAll();
        return view('appointment/index', $data);
    }
    // public function store(){
    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'price' => $this->request->getVar('price'),
    //         'doctor' => $this->request->getVar('dr'),
    //         'mobile' => $this->request->getVar('phn'),
    //     ];
    //     $rules = [
    //         'name' => 'required|max_length[30]|min_length[3]',
    //         'price' => 'required|numeric',
    //         'dr'    => 'required|max_length[30]|min_length[3]',
    //         // 'phn' => 'required|numeric',
    //             ];
    //     if(! $this->validate($rules)){
    //         return view("services/create");
    //     } else {
    //         $this->appointment->insert($data);
    //         $session = session();
    //         //$session->setFlashdata('message','Inserted and Uploaded Successfully');
    //         $this->response->redirect('/services');
    //     }
    // }
}

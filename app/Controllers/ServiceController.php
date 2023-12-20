<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiceModel;


class ServiceController extends BaseController
{
    private $service = '';
    protected $helpers = ['form', 'url'];
    public function __construct(){
        $this->service = new ServiceModel();
    }
    public function index()
    {
        $data['items']=$this->service->findAll();
        return view('services/index', $data);
    }

    public function create(){
        return view("services/create");
    }

    public function store(){
        $data = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'doctor' => $this->request->getVar('dr'),
            'mobile' => $this->request->getVar('phn'),
        ];
        $rules = [
            'name' => 'required|max_length[30]|min_length[3]',
            'price' => 'required|numeric',
            'dr'    => 'required|max_length[30]|min_length[3]',
            // 'phn' => 'required|numeric',
                ];
        if(! $this->validate($rules)){
            return view("services/create");
        } else {
            $this->service->insert($data);
            $session = session();
            //$session->setFlashdata('message','Inserted and Uploaded Successfully');
            $this->response->redirect('/services');
        }
    }

    public function edit($id){
        $data = $this->service->find($id);
        return view("services/edit", $data);
    }

    public function update($id){
        $data = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'doctor' => $this->request->getVar('dr'),
            'mobile' => $this->request->getVar('phn'),
        ];
        $this->service->update($id, $data);
        $session = session();
        //$session->setFlashdata('message','Updated Successfully');
        $this->response->redirect('/services');
    }

    public function delete($id){
        $this->service->delete($id);
        $session = session();
        //$session->setFlashdata('message','Deleted Successfully');
        $this->response->redirect('/services');
    }



}

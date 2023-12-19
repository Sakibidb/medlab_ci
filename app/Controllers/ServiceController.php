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

}

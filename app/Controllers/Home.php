<?php

namespace App\Controllers;

use App\Models\AppointmentModel;



class Home extends BaseController
{
    protected $appointment = '';
    public function __construct(){
        $this->appointment= new AppointmentModel;
    }
    public function index(): string
    {
        $data['totalappointment']=$this->appointment->countAllResults();
        return view('dashboard', $data);
    }
}

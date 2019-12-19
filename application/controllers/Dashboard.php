<?php


class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';


        $data['delivery'] = $this->Delivery_model->countAllDeliv();

        #configurasi





        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}

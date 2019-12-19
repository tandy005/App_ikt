<?php

class Delivery extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar DN';
        // $data['delivery'] = $this->Delivery_model->getAllDelivery();
        $this->load->library('pagination');



        // ambil keyword


        if ($this->input->post('submit')) {
            $data['key'] = $this->input->post('key');
            $this->session->set_userdata('key', $data['key']);
        } else {
            $data['key'] = $this->session->userdata('key');
        }

        #configurasi
        $this->db->like('tujuan', $data['key']);
        $this->db->or_like('no_dn', $data['key']);
        $this->db->or_like('status', $data['key']);
        $this->db->or_like('tgl_kirim', $data['key']);
        $this->db->from('tb_delivery');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $config['num_links'] = 5;
        //Stayling



        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['delivery'] = $this->Delivery_model->getDelivery($config['per_page'], $data['start'], $data['key']);



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('delivery/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data';
        $data['tujuan'] = [
            'ATAMBUA', 'BSK AMBON', 'BSK MALANG', 'BSK PROBOLINGGO', 'BSK BANYUWANGI', 'BSK TERNATE', 'BSK RUTENG',
            'BSK JEMBER', 'BUANAMAS SURABAYA', 'BUANAMAS MADIUN', 'BUANAMAS KEDIRI', 'BUANAMAS DENPASAR', 'BUANAMAS SINGARAJA',
            'SSIS SBY', 'SSIS MADURA', 'SSIS SIDOARJO', 'SMP MAKASAR', 'SMP KENDARI', 'SAPS BONE',
            'SAPS PALOPO', 'SAPS PARE-PARE', 'MIP MANADO', 'KURNIABARU PALU', 'SIP MATARAM', 'SBC BANJARMASIN', 'SBC PALNGKARYA',
            'STP SAMARINDA', 'STP TARAKAN', 'SENTRALIO BALIKPAPAN',  'TIMIKA', 'BUANAMAS WAINGAPU',
            'LARANTUKA', 'LABUAN BOJO', 'BIAK', 'DOBO', 'FAK FAK', 'KAIMANA', 'MAUMERE',
            'MANOKWARI', 'SOE', 'SORONG', 'TUAL', 'NABIRE'
        ];
        $data['status'] = [
            'MENUNGGU MUATAN', 'PGI', 'TERKIRIM BELUM PGI', 'STOCK KOSONG', 'STAGING'
        ];


        $this->form_validation->set_rules('no_dn', 'NO DN', 'required|numeric|max_length[10]|min_length[10]|is_unique[tb_delivery.no_dn]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('delivery/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Delivery_model->tambahDelivery();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('delivery');
        }
    }
    public function hapus($id)
    {
        $this->Delivery_model->hapusDN($id);
        $this->session->set_flashdata('flash', 'DiHapus');
        redirect('delivery');
    }
    public function ubah($id)
    {
        $data['judul'] = 'Ubah Data';
        $data['delivery'] = $this->Delivery_model->getDnById($id);
        $data['tujuan'] = [
            'ATAMBUA', 'BSK AMBON', 'BSK MALANG', 'BSK PROBOLINGGO', 'BSK BANYUWANGI', 'BSK TERNATE', 'BSK RUTENG',
            'BSK JEMBER', 'BUANAMAS SURABAYA', 'BUANAMAS MADIUN', 'BUANAMAS KEDIRI', 'BUANAMAS DENPASAR', 'BUANAMAS SINGARAJA',
            'SSIS SBY', 'SSIS MADURA', 'SSIS SIDOARJO', 'SMP MAKASAR', 'SMP KENDARI', 'SAPS BONE',
            'SAPS PALOPO', 'SAPS PARE-PARE', 'MIP MANADO', 'KURNIABARU PALU', 'SIP MATARAM', 'SBC BANJARMASIN', 'SBC PALNGKARYA',
            'STP SAMARINDA', 'STP TARAKAN', 'SENTRALIO BALIKPAPAN',  'TIMIKA', 'BUANAMAS WAINGAPU',
            'LARANTUKA', 'LABUAN BOJO', 'BIAK', 'DOBO', 'FAK FAK', 'KAIMANA', 'MAUMERE',
            'MANOKWARI', 'SOE', 'SORONG', 'TUAL', 'NABIRE'
        ];
        $data['status'] = [
            'MENUNGGU MUATAN', 'PGI', 'TERKIRIM BELUM PGI', 'STOCK KOSONG', 'STAGING'
        ];


        $this->form_validation->set_rules('no_dn', 'NO DN', 'required|numeric|max_length[10]|min_length[10]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('delivery/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Delivery_model->ubahDelivery();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('delivery');
        }
    }
    public function print_dn()
    {
        $data['delivery'] = $this->Delivery_model->getAllDelivery();


        $this->load->view('delivery/print_dn', $data);
    }
    public function print_pdf()
    {
        $this->load->library('dompdf_gen');
        $data['delivery'] = $this->Delivery_model->getAllDelivery();
        $this->load->view('delivery/print_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Delivery Ikt", array('Attachment' => 0));
    }

    public function excel()
    {

        $data['delivery'] = $this->Delivery_model->getAllDelivery();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("Admin Gudang");
        $object->getProperties()->setLastModifiedBy("Admin Gudang");
        $object->getProperties()->setTitle("DN Ikt");


        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NO DN');
        $object->getActiveSheet()->setCellValue('C1', 'TANGGAL DITERIMA');
        $object->getActiveSheet()->setCellValue('D1', 'STATUS');
        $object->getActiveSheet()->setCellValue('E1', 'TGL KIRIM');

        $baris = 2;
        $no = 1;

        foreach ($data['delivery'] as $dn) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $dn['no_dn']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $dn['tgl_diterima']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $dn['status']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $dn['tgl_kirim']);
            $baris++;
        }

        $filename = "DN_IKT" . '.xlsx';
        $object->getActiveSheet()->setTitle("Data DN IKT");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
        header('Content-Disposition : attachment;filename= "' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
}

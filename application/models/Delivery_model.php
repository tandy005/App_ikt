<?php

class Delivery_model extends CI_Model
{
    public function getAllDelivery()
    {
        return $this->db->get('tb_delivery')->result_array();
    }
    public function tambahDelivery()
    {
        $data = [
            'no_dn' => $this->input->post('no_dn', true),
            'tujuan' => $this->input->post('tujuan', true),
            'tgl_diterima' => $this->input->post('tgl_diterima', true),
            'tgl_kirim' => $this->input->post('tgl_kirim', true),
            'status' => $this->input->post('status', true),
        ];

        $this->db->insert('tb_delivery', $data);
    }
    public function hapusDN($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_delivery');
    }
    public function getDnById($id)
    {
        return $this->db->get_where('tb_delivery', ['id' => $id])->row_array();
    }
    public function ubahDelivery($id)
    {
        $data = [
            'no_dn' => $this->input->post('no_dn', true),
            'tujuan' => $this->input->post('tujuan', true),
            'tgl_diterima' => $this->input->post('tgl_diterima', true),
            'tgl_kirim' => $this->input->post('tgl_kirim', true),
            'status' => $this->input->post('status', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_delivery', $data);
    }
    public function getDelivery($limit, $start, $key = null)
    {
        if ($key) {
            $this->db->like('tujuan', $key);
            $this->db->or_like('no_dn', $key);
            $this->db->or_like('status', $key);
            $this->db->or_like('tgl_kirim', $key);
        }
        return $this->db->get('tb_delivery', $limit, $start)->result_array();
    }
    public function countAllDeliv()
    {
        return $this->db->get('tb_delivery')->num_rows();
    }
}

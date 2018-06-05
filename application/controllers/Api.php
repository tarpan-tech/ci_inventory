<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_masuk_model');
        $this->load->model('barang_keluar_model');
    }

    /**
     * Sum total jumlah masuk by kode barang
     *
     * @param int $kode
     * @return void
     */
    public function getJumlahMasuk($kode)
    {
        $kode = $this->barang_masuk_model->getJumlahMasuk($kode);
        $response = [
            "total_masuk" => intval($kode->total_masuk)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    /**
     * Sum total jumlah keluar by kode barang
     *
     * @param int $kode
     * @return void
     */
    public function getJumlahKeluar($kode)
    {
        $kode = $this->barang_keluar_model->getJumlahKeluar($kode);
        $response = [
            "total_keluar" => intval($kode->total_keluar)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

}

/* End of file Api.php */

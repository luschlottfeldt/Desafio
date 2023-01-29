<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model("UploadModel", "upload");
	}

	public function index()
	{
		$tmpName = $_FILES['upload']['tmp_name'];

		$rows = [];
		$handle = fopen($tmpName, "r");
		if ($handle) {
			while (!feof($handle)) {
				$rows[] = fgets($handle, 100000);
			}
			fclose($handle);
		}

		$count = 0;
		$csvUpload    = [];
		$temp = [];
		foreach ($rows as $csv) {
			$count++;
			//skip header
			if ($count == 1) {
				continue;
			}
			$row = explode(';', $csv);

			//treating the data
			@$temp['FromPostcode'] = $row[0];
			@$temp['ToPostcode'] = $row[1];
			@$temp['FromWeight'] = $row[2];
			@$temp['ToWeight'] = $row[3];
			@$temp['Cost'] = $row[4];
			array_push($csvUpload, $temp);
		}

		if ($this->upload->insertBatch($csvUpload)) {
			$data['success'] = true;
		} else {
			$data['success'] = false;
		}

		$this->load->view('upload', $data);
	}
}

<? if (!defined('BASEPATH')) exit('No direct script access allowed');

Class UploadModel extends CI_Model {

	public function insertBatch($data) {
		if ($this->db->insert_batch('Price', $data)) {
			return true;
		}

		return false;
	}
}

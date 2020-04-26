<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_bendung extends CI_Model {
	public function __construct(){
		$this->load->database();
	}
	function get(){
		return $this->db->get('data_rekap')->result();
	}
	function get_kontrol_pintu(){
		return $this->db->get('kontroling')->result();
	}
	function get_rekap_desc(){
		$this->db->select('*');
		$this->db->from('data_rekap');
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}
	function get_kontrol_pintu_desc(){
		$this->db->select('*');
		$this->db->from('kontroling');
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}
	function get_kontrol_satu(){
		$this->db->select('*');
		$this->db->from('kontroling');
		$this->db->limit(1);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->row();
	}
	function get_satu_data_kontrol($id){
		$this->db->where('id', $id);
		return $this->db->get('kontroling')->row();
	}
	function delete($idnya){
		$this->db->where('id', $idnya);
		$this->db->delete('data_rekap');
		return ($this->db->affected_rows()) ? true : false ;
	}
	function get_cari_tanggal($tanggal, $bulan, $tahun){
		$this->db->select('*');
		$this->db->from('data_rekap');
		$this->db->like('DAY(waktu)', $tanggal);
		$this->db->like('MONTH(waktu)', $bulan);
		$this->db->like('YEAR(waktu)', $tahun);
		return $this->db->get()->result();
	}
	function get_cari_tanggal_kontrol($tanggal, $bulan, $tahun){
		$this->db->select('*');
		$this->db->from('kontroling');
		$this->db->like('DAY(waktu)', $tanggal);
		$this->db->like('MONTH(waktu)', $bulan);
		$this->db->like('YEAR(waktu)', $tahun);
		return $this->db->get()->result();
	}
	function get_rekap(){
		$this->db->select('*');
		$this->db->from('data_rekap');
		$this->db->limit(5);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}
	function option_tanggal(){
		$this->db->select('DAY(waktu) AS tanggal');
		$this->db->from('data_rekap');
		$this->db->order_by('DAY(waktu)');
		$this->db->group_by('DAY(waktu)');
		return $this->db->get()->result();
	}
	function option_bulan(){
		$this->db->select('MONTH(waktu) AS bulan');
		$this->db->from('data_rekap');
		$this->db->order_by('MONTH(waktu)');
		$this->db->group_by('MONTH(waktu)');
		return $this->db->get()->result();
	}
	function option_tahun(){
		$this->db->select('YEAR(waktu) AS tahun');
		$this->db->from('data_rekap');
		$this->db->order_by('YEAR(waktu)');
		$this->db->group_by('YEAR(waktu)');
		return $this->db->get()->result();
	}
	function option_tanggal_kontrol(){
		$this->db->select('DAY(waktu) AS tanggal');
		$this->db->from('kontroling');
		$this->db->order_by('DAY(waktu)');
		$this->db->group_by('DAY(waktu)');
		return $this->db->get()->result();
	}
	function option_bulan_kontrol(){
		$this->db->select('MONTH(waktu) AS bulan');
		$this->db->from('kontroling');
		$this->db->order_by('MONTH(waktu)');
		$this->db->group_by('MONTH(waktu)');
		return $this->db->get()->result();
	}
	function option_tahun_kontrol(){
		$this->db->select('YEAR(waktu) AS tahun');
		$this->db->from('kontroling');
		$this->db->order_by('YEAR(waktu)');
		$this->db->group_by('YEAR(waktu)');
		return $this->db->get()->result();
	}
	function multiple_delete($id){
		$this->db->where_in('id', $id);
		$this->db->delete('data_rekap');
	}
	function multiple_delete_kontrol($id){
		$this->db->where_in('id', $id);
		$this->db->delete('kontroling');
	}

}
/* End of file M_user.php */
/* Location: ./application/models/M_user.php */
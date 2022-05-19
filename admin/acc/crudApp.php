<?php
class crud {
	function __construct()
	{
		$this->konn = new mysqli('localhost', 'root', '', 'db_percetakan');
	}
	public function tampildata( $table ){
		$data=$this->konn->query("select * from $table");
		return $data;
	}
	public function tampildetail( $table, $cond){
		$data=$this->konn->query("select * from $table where $cond");
		return $data;
	}
	public function tampilselect($select, $table, $cond){
		$data=$this->konn->query("select $select from $table where $cond");
		return $data;
	}
	public function editdata( $table, $cond, $value ){
		$data=$this->konn->query("select * from $table where $cond = '$value'");
		return $data;
	}
	public function insert( $table, $value){
		$sql=$this->konn->query("insert into $table values($value)");
	}
	public function edit( $table, $value, $cond, $set){
		$sql=$this->konn->query("update $table  set $value where $cond  = '$set'");
	}
	public function delete( $table, $cond, $value){
		$sql=$this->konn->query("delete from $table where $cond = '$value'");
	}
}
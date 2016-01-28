<?php
 
class db_mysql{
	private $db_host;
	private $db_user;
	private $db_pwd;
	private $db_database;//要连接数据库名
	private $db_charset;//编码 GBK,UTF8,gb2312
	private $db_conntype;// 连接方式 pconnect（长连接）否则即时连接
	private $is_show_error=true;//是否显示错误
	
	function __construct($host,$user,$pwd,$database,$charset='utf8',$conntype=''){
		$this->db_host=$host;
		$this->db_user=$user;
		$this->db_pwd=$pwd;
		$this->db_database=$database;
		$this->db_charset=$charset;
		$this->db_conntype=$conntype;
	}
	
	public function connect(){
		$conn;
		if($db_conntype=="pconnect"){
			$conn = mysql_pconnect($this->db_host, $this->db_user, $this->db_pwd);
		}else{
			$conn = mysql_connect($this->db_host, $this->db_user, $this->db_pwd);
		}
		if(!$conn){
			$this->show_error("Could not connect:".mysql_error());
		}
		// choose database
		$select=mysql_select_db($this->db_database, $conn);
		if(!$select){
			$this->show_error("database is not available");
		}
		//set charset
		mysql_query("SET character_set_connection=$this->db_charset, character_set_results=$this->db_charset, character_set_client=binary");
		return $conn;
	}
	
	//执行增、删、改、查sql
	private function query($sql,$conn){
		if (!$sql) {
            $this->show_error("SQL is empty");
        }
		$result = mysql_query($sql, $conn);
		if (!$result) {
			$this->show_error("Error of SQL");
		}
		return $result;
	}
	
	//执行增、删、改
	public function execute($sql){
		$conn=$this->connect();
		$query=$this->query($sql,$conn);
		$this->close($conn);
		return $query;
	}
	
	public function fetch_array($sql){
		$arr= array();
	    $conn=$this->connect();
		$query=$this->query($sql,$conn);
		if(!$query)
			return null;
		while($rows=mysql_fetch_array($query)){
			$arr[]=$rows;
		}
		$this->close($conn);
		return $arr;
	}
	
	//分页
	public function fetch_array_pager($sql,$index,$pagesize){
		$arr= array();
		$conn=$this->connect();
		$query_count=$this->query($sql,$conn);
		$num = mysql_num_rows($query_count);
		
		$startindex=($index-1)* $pagesize;//开始位置
		$sql_query=$sql." limit ".$startindex.",".$pagesize;
		$query = $this->query($sql);
		while($rows =mysql_fetch_array($query))
		{
			$arr[] = $rows;
		}
		$this->close($conn);
	    return array(
			"count"=>$num,
			"list"=>$arr,
			"range"=>$startindex."-".($startindex+$pagesize)
		);
	}
	
	/*取得上一步 INSERT 操作产生的 ID*/
    public function insert_id() {
        return mysql_insert_id();
    }
	
	// 根据select查询结果计算结果集条数
    public function num_rows($sql) {
		$conn=$this->connect();
		$query=$this->query($sql,$conn);
		$result= mysql_num_rows($query);
		$this->close($conn);
        return $result;
    }
	
	 
	
	//显示错误
	private function show_error($message=""){
		if(!$this->is_show_error){
			return;
		}
		if(!$message){
			die($message);
		}else{
			die("<font color='red'>".mysql_error()."</font>");
		}
	}
	
	private function close($conn)
	{
		mysql_close($conn);
	}
}


?>
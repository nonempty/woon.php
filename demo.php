<?php
  $db_servername="10.0.80.212";
  $db_username="root";
  $db_password="jxtest";
  $db_name="zic";
 
  // 1、与数据库建立连接
  $conn=mysql_connect($db_servername,$db_username,$db_password);
  if (!$conn)
  {
	die('Could not connect: ' . mysql_error());
  }
  
  
  //2、选取数据库
  mysql_select_db($db_name,$conn); //选取数据库。
  
  
  //3、向MySQL发送查询或命令
  $sql="select * from tb_members";
  $result =mysql_query($sql,$conn);//向MySQL发送查询或命令
  
  // mysql_fetch_row  我们只能$row[0],$row[1],这样以数组下标来读取数据
  // mysql_fetch_array 而mysql_fetch_array()返回的数组既包含第一种，也包含键值 对的形式，我们可以这样读取数据，$row['username'], $row['passwd']
  /*while($row = mysql_fetch_array($result))
  {
	 
  }*/
  
  //mysql_close($conn);//关闭连接
  
  
?>
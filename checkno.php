<?php
// ���ѧ���Ƿ���ȷ
require_once("config.php");
require_once("mysql.php");

if (isset($_REQUEST["no"])) {
	$number = $_REQUEST['no'];
	global $db;
	$dboperator = new MysqlOperator($db["name"],$db["user"],$db["password"],$db["database"],'pconn', 'UTF8');
	$sql = "select count(*) from no_name where no='$number'";
	$dboperator->query($sql);
	$result = $dboperator->fetch_array();
	$count = $result[0];
	if ($count == 0)
	{
		echo -1;
	}
	else
	{
		// �鿴֮ǰ�Ƿ��Ѿ�ע���
		$sql = "select count(*) from info where no='$number'";
		$dboperator->query($sql);
		$result = $dboperator->fetch_array();
		$count = $result[0];
		if ($count > 0)
		{
			echo 0;	// �Ѿ�ע��
		}
		else
		{
			echo 1;	// δע��
		}
	}
}
else
{
	echo -1;
}
?>
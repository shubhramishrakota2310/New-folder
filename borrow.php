<?php 
	include('config.php');
	session_start();
	$errors = array();

if (isset($_POST['borrow'])) 
{
		$prd = mysqli_real_escape_string($conn, $_POST['prodid']);
		$uname = mysqli_real_escape_string($conn, $_POST['uname']);
		$umob = mysqli_real_escape_string($conn, $_POST['umob']);
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$rem = mysqli_real_escape_string($conn, $_POST['remark']);

		if (count($errors) == 0) 
		{
			$q1 = "SELECT * FROM equipment WHERE id='$prd' LIMIT 1";
			$r1 = mysqli_query($conn, $q1);
			$a1 = mysqli_fetch_assoc($r1);
			$gid = $a1["cwid"];
			$oidd = $a1["oidd"];
			$gnumb = $a1["cwnumb"];
			$gname = $a1["cwname"];
			date_default_timezone_set("Asia/Kolkata");
			$dated = date("Y-m-d H:i:s");

			if(empty($rem)=='1')
			{
				$q = "INSERT INTO equiphist (pid, gid, gname, gnumb, tid, tname, tnumb, dated) VALUES ('$prd', '$gid', '$gname', '$gnumb', '$uid', '$uname', '$umob', '$dated' )";
				mysqli_query($conn, $q);
			}
			else
			{
				$q = "INSERT INTO equiphist (pid, gid, gname, gnumb, tid, tname, tnumb, dated, remark) VALUES ('$prd', '$gid', '$gname', '$gnumb', '$uid', '$uname', '$umob', '$dated', '$rem')";
				mysqli_query($conn, $q);
			}

			$q2 = "UPDATE equipment SET cwname='$uname', cwid='$uid', cwnumb='$umob' WHERE id='$prd'";
			mysqli_query($conn, $q2);

			$not = "Your Equipment ".$a1["name"]." has been borrowed.";
			$not1 = "You have lent ".$a1["name"].".";
			$q3 = "INSERT INTO notif (noti, rid, dated, sname) VALUES ('$not', '$oidd', '$dated', '$tname')";
			mysqli_query($conn, $q3);
			$q4 = "INSERT INTO notif (noti, rid, dated, sname) VALUES ('$not1', '$gid', '$dated', '$tname')";
			mysqli_query($conn, $q4);
			header('location: done.php');
		}
}

function esc(String $value)
	{	
		global $conn;

		$val = trim($value);
		$val = mysqli_real_escape_string($conn, $value);

		return $val;
	}
?>

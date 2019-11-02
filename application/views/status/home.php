

<h1><?php echo "Check Application Status"; ?></h1></br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Application Number: <input type="text" name="num" value="" autofocus>
<input type="submit" value="Check" class="btn btn-success">
</form>



<?php
//date_default_timezone_set("Asia/Calcutta");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["num"]))
	{
		echo '<span style="color: red;" />Application Number is required.</span>'; 
  	}

  	else
  	{

		$application_no = $_POST["num"];
		$query = $this->db->get_where('requests', array('application_no' => $application_no));
	
		if(empty($query->result()))
		{
			echo '<span style="color: red;" />No such Record!</span>';
		}
	
		else
		{
			foreach ($query->result() as $row)
			{       
        		echo "Applicant Name: ".ucfirst($row->applicant)."</br>";
        		$appno = "SEM".date("HisdmY")."CHE";   
        		echo $appno;     
			}
		}
	}
	
}

$application_no="";
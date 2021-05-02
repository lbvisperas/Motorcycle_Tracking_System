<?php
	header("content-type: application/xls");
	header("content-disposition: attachment, filename=Approved_Franchises.xls");
	echo "<table class='table table-stripped table-condensed table-hover' style='margin-bottom: 6px'>";
	echo "<thead>";
	echo "<tr>";
	echo "<td>";
	echo "<b>City Plate No</b>";
	echo "</td>";
	echo "<td>";
	echo "<b>Name</b>";
	echo "</td>";
	echo "<td>";
	echo "<b>Begin Date</b>";
	echo "</td>";
	echo "<td>";
	echo "<b>Expire Date</b>";
	echo "</td>";
	echo "<td>";
	echo "<b>Association</b>";
	echo "</td>";
	echo "<td>";
	echo "<b>Application Type</b>";
	echo "</td>";
	echo "<td>";
	echo "<b>Unit Model</b>";
	echo "</td>";
	echo "<td>";
	echo "<b>Licence Number</b>";
	echo "</td>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
		
		foreach ($franchise as $row)
		{
			echo "<tr>";
			
			$year = substr($row['date_applied'], -4);
			$day = substr($row['date_applied'], 3, -5);
			$month = substr($row['date_applied'], 0, -8);
			
			if ($month == "01"){$month="January";}
			else if ($month == "02"){$month="February";}
			else if ($month == "03"){$month="March";}
			else if ($month == "04"){$month="April";}
			else if ($month == "05"){$month="May";}
			else if ($month == "06"){$month="June";}
			else if ($month == "07"){$month="July";}
			else if ($month == "08"){$month="August";}
			else if ($month == "09"){$month="September";}
			else if ($month == "10"){$month="October";}
			else if ($month == "11"){$month="November";}
			else if ($month == "12"){$month="December";}
			
			$year1 = substr($row['expire_date'], -4);
			$day1 = substr($row['expire_date'], 3, -5);
			$month1 = substr($row['expire_date'], 0, -8);
			
			if ($month1 == "01"){$month1="January";}
			else if ($month1 == "02"){$month1="February";}
			else if ($month1 == "03"){$month1="March";}
			else if ($month1 == "04"){$month1="April";}
			else if ($month1 == "05"){$month1="May";}
			else if ($month1 == "06"){$month1="June";}
			else if ($month1 == "07"){$month1="July";}
			else if ($month1 == "08"){$month1="August";}
			else if ($month1 == "09"){$month1="September";}
			else if ($month1 == "10"){$month1="October";}
			else if ($month1 == "11"){$month1="November";}
			else if ($month1 == "12"){$month1="December";}
		
		
			$var = $row['franchise_id'];
										$var = str_pad($var,4,'0',STR_PAD_LEFT);
										echo "<td style='padding-top:12px'>$var</td>";
			echo "<td style='padding-top:12px'>$row[first_name] $row[last_name]</td>";
			echo "<td style='padding-top:12px'>$month $day, $year</td>";
			echo "<td style='padding-top:12px'>$month1 $day1, $year1</td>";
			echo "<td style='padding-top:12px'>$row[association_name]</td>";
			echo "<td style='padding-top:12px'>$row[application_type]</td>";
			echo "<td style='padding-top:12px'>$row[unit_model]</td>";
			echo "<td style='padding-top:12px'>$row[licence_num]</td>";
		}
	echo "</tbody>";
	echo "</table>";
?>
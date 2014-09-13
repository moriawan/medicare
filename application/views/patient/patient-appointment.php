<div id="wrapper">

<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->
   
 
<div style="width:100%;">

<table width="100%" style=" border-spacing:2px; border-collapse:separate">
<thead>

<?php

echo '<th style="width:150px">#'.$transaction['diagnosis_id'];
echo "</th><th colspan='5'> Problem : ".$transaction['problem']."</th>";

?>

</thead>

<tbody>

<tr style="width:100%">
<td style="font-weight:bold">Symptoms</td>
<td colspan='5'>
<?php 
echo $transaction['symptoms'];
?>
</td>
</tr>


<tr>
<td style="font-weight:bold">Diaganosis</td>
<td colspan='5'>
<?php 
echo $transaction['diagnosis'];
?>
</td>
</tr>

<tr>

<td style="font-weight:bold">Blood pressure</td>
<td>
<?php 
echo $transaction['blood_presure'];
?>
</td>


<td style="font-weight:bold">Heart beat</td>
<td>
<?php 
echo $transaction['heart_beat'];
?>
</td>


<td style="font-weight:bold">Temperature</td>
<td>
<?php 
echo $transaction['temperature'];
?>
</td>

</tr>

<tr>
<td  colspan="6"></td>
</tr>




<?php 

$medication = explode(";" , $transaction['medication']);
$medicationSpecial = explode(";" , $transaction['medication_special']);
$medicationTime = explode(";" , $transaction['medication_time']);


$i=0;$j=0;


foreach ($medication as $med ){
	 
	 if(strlen($med)<1){continue;}
			
	 echo "	<tr>
			  <td style='font-weight:bold'>Medication ".($j+1)."</td>
			  <td colspan='4'>
	 
	 ".$med;
	 
	 if(strlen($medicationSpecial[$i])>1)
		   echo "&nbsp; - &nbsp;".$medicationSpecial[$i++];
	 
	 echo "  </td>";
	 
	 
	 echo "<td>".$medicationTime[$j++]."
		  </td></tr>
		  ";
	 }
?>


<tr>
<td style="font-weight:bold; text-align:center" colspan="6"></td>
</tr>



<tr>

<td style="font-weight:bold">Recommendation</td>
<td colspan="5">
<?php 

if(strlen($transaction['recommendation'])>1)
	echo $transaction['recommendation'];
else echo "none";
?>
</td>
</tr>


</tbody>

</table>

<br />

<center>
<input type="button" class="submit" value="Request follow up" onclick="requestFollowUp(<?php echo $tid; ?>)" style="width:250px" />&nbsp; &nbsp; &nbsp; 
<input type="button" class="submit" value="Print appointment" style="width:250px" />
</center>

</div>
      
      
</div>

</div>
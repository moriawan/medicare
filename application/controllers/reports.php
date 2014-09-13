<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



require_once("./tcpdf/tcpdf.php");

require_once('./tcpdf/config/lang/eng.php');





class Reports extends CI_Controller {

	

	

	

	 public function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->model('appointment_model');

		$this->load->model('patient_model');

	}

	

	 

	 

	public function generate($trans)

	{

	    

		

		$uid = $this->session->userdata('userId'); 

		

		$datav = $this->appointment_model->get_appointment($trans) ;

		

		

		if($datav['patient_id']==$uid||$datav['doctor_id']==$uid ){

			

			$data = $this->appointment_model->get_appointment_diagnosis($trans) ;

			$dataprof = $this->patient_model->get_profile($datav['patient_id']); 

			

			$medication = explode( ";" , $data['medication']) ;

			$medication_time = explode( ";" , $data['medication_time']) ;

			$medication_special = explode( ";" , $data['medication_special'] ) ;

			

			$datamedication = '<table bgcolor="#E3E3E3" cellspacing="10">

			<tr>

				<th width="40" ><p class="first" > S.No. </p></th>

				<th width="200"><p class="first" > Medication  </p></th>

				<th width="110"><p class="first" > Schedule </p></th>

				<th width="230"><p class="first" > Special Instruction </p></th>

			</tr>	

			

			

			 ' ;

			

			$size = sizeof($medication) ;

			for ($i=0 ; $i <  $size ; $i++ ){

			if($medication[$i]!="")

				{

				$datamedication .= '<tr height="15">

				

				<th> <p class="first"  > '.($i+1).' </p> </th>

				<td style="height:10px"> <p class="first" >'.$medication[$i].' </p> </td>

				<td> <p class="first" >'.$medication_time[$i].' </p> </td>

				<td> <p class="first" >'.$medication_special[$i].' </p> </td> 

				

				</tr>

				'  ;

				}

			}

			

			$datamedication .= "</table>" ;

			

			

						

					$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

					

					// set document information

					$pdf->SetCreator(PDF_CREATOR);

					$pdf->SetAuthor('Medicare');

					$pdf->SetTitle('Report');

					$pdf->SetSubject('Diagnosis Report');

					$pdf->SetKeywords('PDF, report, diagnosis');

					

					// set default header data

					

					$pdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));

					

					// set header and footer fonts

					// set default monospaced font

		

					//set margins

					$pdf->SetMargins(PDF_MARGIN_LEFT, 50 , PDF_MARGIN_RIGHT);

					$pdf->SetHeaderMargin(100);

					$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

					

					//set auto page breaks

					$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

					

					//set image scale factor

					$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

					

					//set some language-dependent string

					// ---------------------------------------------------------

					

					// set default font subsetting mode

					$pdf->setFontSubsetting(true);

					

					// Set font

					// dejavusans is a UTF-8 Unicode font, if you only need to

					// print standard ASCII chars, you can use core fonts like

					// helvetica or times to reduce file size.

					$pdf->SetFont('dejavusans', '', 14, '', true);

					// Add a page

					// This method has several options, check the source code documentation for more information.

					$pdf->AddPage();

					

					// set text shadow effect

					$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

					

					// Set some content to print

					$html = '

<!-- EXAMPLE OF CSS STYLE -->

<style>

	h1 {

		color: #666666 ;

		font-family: times;

		font-size: 14pt;

		

	}

	.first {

		color: #666666 ;

        line-height:0.8 ;

        font-family: helvetica;

        font-size: 10pt;

    }

	.second {

		color: #333333 ;

        line-height:0.8 ;

        font-family: helvetica;

        font-size: 10pt;

		margin-left: 30px ;

    }

	

	



</style>





<table bgcolor="#E3E3E3"   cellspacing="10" width="100%" >

 <tr>

  <td width="140" >  

  	<img src="/images/profile/DP-1.jpg"  >

  </td>

  <td width="210" bgcolor="#E3E3E3">

  	<p class="first" >  Name : '.$dataprof['fname'].' '.$dataprof['lname'].' </p>

	<p class="first" >  Age : '.$dataprof['age'].' </p> 

	<p class="first" >  Blood Type : '.$dataprof['blood_type'].' </p>

	<p class="first" >  Martial Status :  '.$dataprof['martial_status'].' </p>

	<p class="first" >  M.Number :  '.$dataprof['mobile'].' </p>

  </td>

  <td width="240" bgcolor="#E3E3E3">

  	<p class="first" >  Special Condition :  '.$dataprof['special_condition'].' </p>

	<p class="first" >  Chronic Illness :  '.$dataprof['chronic_illness'].' </p> 

	<p class="first" >  Other Condition :  '.$dataprof['other_condition'].' </p>

	<p class="first" >  Other Condition :  '.$dataprof['other_condition1'].' </p>

	<p class="first" >  Email :  '.$dataprof['email'].'  </p>

  </td>

 </tr>

</table> 



<h1> Symptoms </h1>



<p class="second">'.$data['symptoms'].'</p>



<h1> Problem </h1>



<p class="second">'.$data['problem'].' </p>



<h1> Diagnosis </h1>



<p class="second">'.$data['diagnosis'].'</p>





<h1> Medication  </h1>

 '.$datamedication.'<br>



<h1> Clinic tests </h1>

<table width="100%" >

<tr>

	<td width="40%"> <span class="second" > Blood Pressure </span> '.$data['blood_presure'].' </td>

	<td> <span class="second" > Heart Beat </span> '.$data['heart_beat'].' </td>

	<td> <span class="second" > Temperature </span> '.$data['temperature'].' </td>

</tr>

<tr>

	<td colspan="3" > <span class="second" > Other </span> '.$data['other'].' </td> 

</tr>

<tr>

	<td colspan="3"> <span class="second" > Recommended Tests </span> '.$data['other'].' </td>

	 

</tr>

</table>





<h1> Special Recommendations </h1>

<p class="first" >'.$data['recommendation'].' </p>







'  ;



					

					// Print text using writeHTMLCell()

					$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

					

					// ---------------------------------------------------------

					

					// Close and output PDF document

					// This method has several options, check the source code documentation for more information.

				 $pdf->Output('example_001.pdf', 'I');

			

			



			

		}

		

		

	}







}
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}
?>

<?php
    require_once("../../../connection.php");
  	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $query="select  distinct TEMPLATE_ID,TEMPLATE_NAME,TEMPLATE_DESCRIPTION,document_template.FK_OFFICE_NAME,public from document_template join template_list on document_template.TEMPLATE_ID = template_list.FK_TEMPLATE_ID join office on template_list.FK_OFFICE_NAME = office.OFFICE_NAME where TEMPLATE_ID LIKE '%".$_POST['search_string']."%' OR TEMPLATE_DESCRIPTION LIKE '%".$_POST['search_string']."%' ORDER BY template_name ASC";
   
   	$result=mysqli_query($con,$query)or die(mysqli_error($con));
		$resultArray=array();
		 while ($var = mysqli_fetch_assoc($result))
		 	{

//if ($query){
//
//$rowcolor="blue";
//
//echo "<tr class='usercolortest'>
//	<th class='sizeTEMPLATE'>TEMPLATE</th>
//        <th class='sizeDESCR'>DESCRIPTION</th>
//	</tr>";
//
//foreach($query as $var) 
//    {
    
    if($_SESSION['GROUP']=='POWER ADMIN')
    {
        array_push($resultArray, array("template_id"=>$var["TEMPLATE_ID"],"template_name"=>$var["TEMPLATE_NAME"],"description_name"=>$var["TEMPLATE_DESCRIPTION"]
		 							,"public"=>$var["public"]));
//        if ($rowcolor == "blue") 
//        {
//            echo '<tr id="'.$var["TEMPLATE_NAME"].'" class="usercolor" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_NAME"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\',\''.$var["public"].'\')">';
//            $rowcolor="notblue";
//        }
//        else
//        {
//            echo '<tr id="'.$var["TEMPLATE_NAME"].'" class="usercolor1" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_NAME"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\',\''.$var["public"].'\')">';
//            $rowcolor="blue";
//        }
//        echo "<td style='width:150px;'>";
//        echo $var['TEMPLATE_NAME'];
//        ECHO "</td><td>";
//        echo $var['TEMPLATE_DESCRIPTION'];
//        echo "</td>";
//        echo"</tr>";
    }
    else
    
        if ($var["FK_OFFICE_NAME"]==$_SESSION['OFFICE'])
        {
        	array_push($resultArray, array("template_id"=>$var["TEMPLATE_ID"],"template_name"=>$var["TEMPLATE_NAME"],"description_name"=>$var["TEMPLATE_DESCRIPTION"]));
//             if ($rowcolor == "blue") 
//        {
//            echo '<tr id="'.$var["TEMPLATE_NAME"].'" class="usercolor" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_NAME"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\')">';
//            $rowcolor="notblue";
//        }
//            else
//            {
//                echo '<tr id="'.$var["TEMPLATE_NAME"].'" class="usercolor1" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_NAME"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\')">';
//                $rowcolor="blue";
//            }
//            echo "<td style='width:150px;'>";
//            echo $var['TEMPLATE_NAME'];
//            ECHO "</td><td>";
//            echo $var['TEMPLATE_DESCRIPTION'];
//            echo "</td>";
//            echo"</tr>";
//        }
        
    		}

    

//        }
//        else{
//          echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
//        }
        
     }
     echo json_encode($resultArray);

  ?>

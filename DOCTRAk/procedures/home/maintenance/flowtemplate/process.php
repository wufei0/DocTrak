<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
      $_SESSION['in'] ="start";
     header('Location:../../../../index.php');
}

    if ($_POST['template_mode']=="save")
    {
        require_once("primarykey.php");
        $templateKey=GenKey();
    }
   echo $templateKey;

    require_once("../../../connection.php");
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();

    }
    
    mysqli_autocommit($con,FALSE);
    $flag=true;

	   	if(isset($_POST['publicCheckbox']))
       	{
       		 $publicTemplate=1;
       	}
       	else
       	{
       		 $publicTemplate=0;
       	}

   if ($_POST['template_mode']=="save") {
       if ($_POST['primarykey'] == "") {
       	
    
       	
       	
       $query="INSERT INTO document_template(TEMPLATE_ID,TEMPLATE_NAME,TEMPLATE_DESCRIPTION,fk_office_name,public) VALUES ('".$templateKey."','".$_POST['template_name']."','".$_POST['template_description']."','".$_SESSION['OFFICE']."',".$publicTemplate.")";

           $RESULT=mysqli_query($con,$query);
        if (!$RESULT) {
               $flag=false;
               echo mysqli_error($con);
               echo "<br>";
        }


        $counterX=1;
        $pieces = explode("|",$_POST['OfficeArray']);
        $arrayRev=array_reverse($pieces);
         //  mysqli_commit($con);
       foreach($arrayRev as $OfficeList) {
           $query="INSERT INTO template_list(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$templateKey."','$OfficeList',$counterX)";
           echo $query;
           $RESULT=mysqli_query($con,$query);
           if (!$RESULT) {
               $flag=false;
               echo mysqli_error($con);
               echo "<br>";
           }
           //echo $query;
          // echo "<br>";
          // print_r($pieces);
          // ECHO $OfficeList;
           //ECHO $_POST['template_name'];
           //ECHO $counterX;
           //$query=insert_update_delete("INSERT INTO TEMPLATE_LIST(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$_POST['template_name']."','$OfficeList',$counterX)");
            $counterX++;
       }
           $_SESSION['operation']="save";
   }

        //UPDATE OPERATION
        else 
        {

            $query="DELETE FROM template_list WHERE FK_TEMPLATE_ID = '".$_POST['primarykey']."'";
            $RESULT=mysqli_query($con,$query);
            if (!$RESULT) 
            {
                $flag=false;
                echo mysqli_error($con);
                echo "<br>";
            }

            $counterX=1;
            $pieces = explode("|",$_POST['OfficeArray']);
            $arrayRev=array_reverse($pieces);
            $query="UPDATE document_template SET TEMPLATE_name='".$_POST['template_name']."',TEMPLATE_DESCRIPTION='".$_POST['template_description']."', public=".$publicTemplate." WHERE TEMPLATE_ID = '".$_POST['primarykey']."' ";
            $RESULT=mysqli_query($con,$query);
            if (!$RESULT) 
            {
                $flag=false;
                echo mysqli_error($con);
                echo "<br>";
            }

           foreach($arrayRev as $OfficeList) 
            {
                $query="INSERT INTO template_list(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$_POST['primarykey']."','$OfficeList',$counterX)";
                $counterX++;
                $RESULT=mysqli_query($con,$query);

               if (!$RESULT) 
                {
                    $flag=false;
                    echo mysqli_error($con);
                    echo "<br>";
                }
           }

           $_SESSION['operation']="update";


       }
   }

   elseif ($_POST['template_mode']=="delete") 
    {
        $query="DELETE FROM document_template WHERE TEMPLATE_ID ='".$_POST['primarykey']."' ";
        $RESULT=mysqli_query($con,$query);
        if (!$RESULT) 
        {
           $flag=false;
           echo mysqli_error($con);
           echo "<br>";
        }
        $_SESSION['operation']="delete";
        
   }



    if ($flag) {
        mysqli_commit($con);

    }
    else {
        mysqli_rollback($con);
        $_SESSION['operation']="error";
    }
    mysqli_close($con);
    
    header('Location:../flowtemplate.php');


    
    

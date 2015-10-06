<?php
date_default_timezone_set($_SESSION['Timezone']);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}



//$_SESSION['timeout']=time();
 //require_once($PROJECT_ROOT.'quickNav.php');
?>



<div class="header">
<div class="menubg">
        
            	<div class="menugroup">
                    
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo $PROJECT_ROOT."home.php"; ?>">Home</a></li>
                                <li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        Document <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu down-bgcolor" role="menu">
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/newdoc.php'; ?>">Document</a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/receiveddoc.php'; ?>"><span>Receive Document</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/releasedoc.php'; ?>"><span>Release Document</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/forreleasedoc.php'; ?>"><span>For Release</span></a></li>
                                        <li class="divider linebgcolor"></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documenttracker.php'; ?>"><span>Document Tracker</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documentprocessing.php'; ?>"><span>Processing</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documenttrail.php'; ?>"><span>Document Trail</span></a></li>
                                        <li class="divider linebgcolor"></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/rollback.php'; ?>"><span>Rollback</span></a></li>
                                    </ul>
                                </li>
                                <?php
                                
                                echo '
                                <li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">BAC<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu down-bgcolor" role="menu">';
                                    echo '<li><a href='.$PROJECT_ROOT.'procedures/home/bac/new.php><span>New</span></a></li>';
                                    if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
                                    {
                                    echo '
                                        <li><a href='.$PROJECT_ROOT.'procedures/home/bac/receive.php><span>Receive Doc</span></a></li>
                                        <li><a href='.$PROJECT_ROOT.'procedures/home/bac/release.php><span>Release Doc</span></a></li>
					<li><a href='.$PROJECT_ROOT.'procedures/home/bac/checkin.php><span>Check In</span></a></li>
                                        <li class="divider linebgcolor"></li>';
                                    }
                                    //<li><a href='.$PROJECT_ROOT.'procedures/home/bac/backlog.php><span>Backlog</span></a></li>
                                    echo '
                                        <li><a href='.$PROJECT_ROOT.'procedures/home/bac/monitor.php><span>Monitoring</span></a></li>
                                        <li><a href='.$PROJECT_ROOT.'procedures/home/bac/archive.php><span>Archive</span></a></li>
                                    ';
                                    echo '</ul></li>';
                                
                                
                                ?>
				
				
				<li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        Communication <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu down-bgcolor" role="menu">
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/communication/letter.php"; ?>"><span>Letter</span></a></li>
					<li><a href="<?php echo $PROJECT_ROOT."procedures/home/communication/monitoring.php"; ?>"><span>Letter Monitoring</span></a></li>
                                        
                                    </ul>
                                    
                                </li>
				
                                <li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        Report <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu down-bgcolor" role="menu">
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/dochistory.php"; ?>"><span>Document History</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocess.php"; ?>"><span>Document on Process</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocesspersignatory.php"; ?>"><span>Document on Process per Signatory</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/docpersignatory.php"; ?>"><span>Documents per Signatory</span></a></li>
                                    </ul>
                                    
                                </li>
                                <?php
                                
                                 if($_SESSION['GROUP']=='POWER ADMIN')
                                        {
                                        echo '<li role="presentation" class="dropdown">';
                                        echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        Maintenance <span class="caret"></span></a>
                                        <ul class="dropdown-menu down-bgcolor" role="menu">';
                                                
                                                echo '<li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/flowtemplate.php"><span>Flow Template</span></a></li>
                                                     <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/documenttype.php"><span>Document Type</span></a></li>
                                                      <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/office.php"><span>Office</span></a></li>
                                                     
                                                <li class="divider linebgcolor"></li>
                                                <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Security</span></a>
                                                    <ul class="dropdown-menu down-bgcolor">
                                                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/users.php"><span>Users</span></a></li>
                                                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/group.php"><span>Group</span></a></li>
                                                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/audittrail.php"><span>Audit Trail</span></a></li>
                                                    </ul>
                                                </li>';
                                                echo ' </ul></li>';
                                            }
                                        ?>
                                
                                <li>
                                    <a href="<?php echo $PROJECT_ROOT."about.php"; ?>"><span>About</span></a>
                                </li>
                 
                              </ul>
                    
		
        
        <div class="admin">
        	
        			<?php
        
	         require_once("procedures/connection.php");
	         global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
                 
	         $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	         $query="SELECT mail_id, COUNT(mail_id) as mailcount FROM mail WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
               
	         $result=mysqli_query($con,$query)or die(mysqli_error($con));
                 //$sql=;
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	         {
                        echo '<div id="mailNotify">';
//                        echo '<span  id="mailNoti" class="badge"><a href="'.$PROJECT_ROOT.'procedures/home/userinfo/inbox.php"><img  src="'.$PROJECT_ROOT.'images/home/icon/exclamation.gif" width="30" height="20" align="left" /></a>'.$row['mailcount'].'</span>';
                    if ($row['mailcount']<>0)
                    {
                        echo '<span  id="mailNoti" class="badge"><a href="'.$PROJECT_ROOT.'procedures/home/userinfo/inbox.php"><img  src="'.$PROJECT_ROOT.'images/home/icon/testmail.gif" width="30" height="20" align="left" /></a>'.$row['mailcount'].'</span>&nbsp';
                    }
                    //CHECK IF THERE ARE DEADLINE BAC DOCUMENTS
                        
                     checkDocumentDeadline();
                    
                  
                    if (($_SESSION['BAC']==1) or ($_SESSION['GROUP']=='POWER ADMIN'))
                    {
                        $sqlString='SELECT COUNT(*) as numOfRow FROM bacdocument_monitoring';
                        $result=mysqli_query($con,$sqlString)or die(mysqli_error($con));
                        $row = mysqli_fetch_array($result);
                        
                         if ($row['numOfRow']<>0)
                        {
                            echo '<ul class="nav navbar-nav">
                                <li role="presentation" class="dropdown">';
                            echo '<span  id="deadlineNoti" class="badge">';
                            echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">';
                            echo '<img  src="'.$PROJECT_ROOT.'images/home/icon/exclamation.gif" width="30" height="20" align="left" />'.$row['numOfRow'];
                            echo '</a>';
                            //echo '</span>';
                            echo '<ul class="dropdown-menu down-bgcolor dropdown-menu-right" style="font-size:12px;">';

                            /////////////////
                            ///START BAC NOTIFICATION
                            /////////////////
                            $sqlQuery='SELECT bacdocument_id,fk_officename_bacdocumentlist,bacdocumentdetail,activity,prcost FROM bacdocument_monitoring JOIN bacdocumentlist_tracker ON bacdocument_monitoring.fk_bacdocumentlist_tracker_id = bacdocumentlist_tracker.bacdocumentlist_tracker_id JOIN bacdocumentlist ON bacdocumentlist_tracker.fk_bacdocumentlist_id = bacdocumentlist.bacdocument_id';
				
                         $recSet=mysqli_query($con,$sqlQuery);
                            //$resultSet=  mysqli_fetch_array($recSet);
                            $rowCounter=1;

                            while ($resultSet = mysqli_fetch_array($recSet,MYSQLI_ASSOC))
                            {
                                echo '<li><a href="javascript:RenderBacMonitor(\''.$resultSet['bacdocument_id'].'\')">';

                                echo $resultSet['fk_officename_bacdocumentlist'].' - '.$resultSet['bacdocumentdetail'].' - '.$resultSet['activity'].' ('.number_format($resultSet['prcost'], 2, '.', ',').')';
                                echo '</a>';
                                if($rowCounter!=mysqli_num_rows($recSet))
                                {
                                    echo '<li class="divider linebgcolor"></li>';
                                }
                                $rowCounter++;
                                 echo '</li>';
                            }


                            //////
                            echo '</ul></li></ul>';

                        }
                        
                        
                        
                    }
                    else
                    {
                        echo '<span  id="deadlineNoti" class="badge"></span>'; 
                    }
                    
                    
                    echo '</div>';
	         }
                 
                 
           echo "<div id='testAdmin'><p>Hi, <a href=".$PROJECT_ROOT."procedures/home/userinfo/userinfo.php>".$_SESSION['security_name']."</a> of ".$_SESSION['OFFICE']."</p></div>";
           echo "<div class='tfclear'></div>";
           echo "<div class='logout'>";
           echo "<a href=".$PROJECT_ROOT."procedures/home/logout.php>Logout</a>";
           echo '</div>';
           mysqli_free_result($result);
           
           ?>
           
        </div>
            
        </div>
        </div>

	<div class="header1">
    <div id="headerlinebg">
    	
                <div class="headerline">
                <div class="row">
                        <div class="col-xs-4 col-md-4">
                        <div class="headerbanner">

                		<a href="<?php echo $PROJECT_ROOT."index.php"; ?>"><img <?php
                                $printme="src=".$PROJECT_ROOT."images/home/doctraklogo2.png";
                                echo $printme;
                                ?>
                                        width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
        				<?php

                                            echo $_SESSION['HeaderTitle']. "<span style='font-size:12px;'>&nbsp; " .$_SESSION['Version'];
                                            echo "</span>";
        				?>

        				</h2><p>Provincial Government of La Union</p></a>

                        </div>
                        </div>
                     <div class="col-xs-8 col-md-8">
                         <div id="logo">
                             <img <?php
                                $printme="src=".$PROJECT_ROOT."images/home/logo/misdlogo.png";
                                echo $printme;
                                ?> width="40" height="35" alt="MISD" title="MISD" align="left" />
                             <img <?php
                                $printme="src=".$PROJECT_ROOT."images/home/logo/pglu-logo.png";
                                echo $printme;
                                ?> width="40" height="35" alt="PGLU" title="PGLU" align="left" />
                         </div>
                    </div>
                </div>
        
                </div>
    
    </div>
    </div>

</div>

<?php
//echo '<script src="'.$PROJECT_ROOT.'js/jquery-1.10.2.min.js"></script>
//<script src="'.$PROJECT_ROOT.'js/jquery.growl.js"></script>';
?>

<?php
//CHECK FOR BAC DOCUMENTS THAT ARE PASSED THE DEADLINE SET BY BAC
 //$printme="src=".$PROJECT_ROOT."images/home/logo/misdlogo.png";
 

function checkDocumentDeadline()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $sqlString="select  bacdocumentlist_tracker_id, fk_bacdocumentlist_id,sortorder,receive_date,expire_days,checkin_date from bacdocumentlist_tracker 
                WHERE checkin_date IS NOT NULL AND receive_date IS NULL ORDER BY fk_bacdocumentlist_id, sortorder ASC";
    mysqli_autocommit($con, false);
    $flag=true;
    
    $result=  mysqli_query($con, $sqlString);
    $dateNow=date('Y-m-d');
    while ($rows=  mysqli_fetch_array($result))
    {
//        $expirationDay = date_create('now');
////        date_add($expirationDay, date_interval_create_from_date_string($rows2['max_day'].' days'));
////        $dateAdded=date_format($expirationDay, 'Y-m-d');
////        
//        $date = date_create('2000-01-01');
//date_add($date, date_interval_create_from_date_string('10 days'));
//echo date_format($date, 'Y-m-d');

        $deadlineDay=$rows['expire_days']+1;
        $expirationDay = date_create($rows['checkin_date']);
        date_add($expirationDay, date_interval_create_from_date_string($deadlineDay.' days'));
        $expirationDay=date_format($expirationDay, 'Y-m-d');
        
//        echo $rows['bacdocumentlist_tracker_id'].' -  '.$expirationDay .'   -   '.$dateNow ;
//        echo '<br>';
//     echo date_create($expirationDay.' 00:00:00');
//     die;
        if (checkDuplicate($rows['bacdocumentlist_tracker_id'])==false AND checkStatusUpdatedToday($rows["bacdocumentlist_tracker_id"])==false AND $rows["expire_days"]<>0)
        {
            if (strtotime($expirationDay)<=strtotime($dateNow))
            {
                //checkStatusUpdatedToday($rows["bacdocumentlist_tracker_id"]);

                $sqlString='INSERT INTO bacdocument_monitoring set fk_bacdocumentlist_tracker_id = "'.$rows["bacdocumentlist_tracker_id"].'" ';
                $myQuery=  mysqli_query($con, $sqlString);
                if (!$myQuery)
                {
                    printf("Errormessage: %s\n", mysqli_error($con));
                    echo '<br>';
                    $flag=false;
                }
            }
        }
//        
//        $days_added='+'.$rows['expire_days'].' days';
//        echo date('Y-m-d', strtotime($days_added));
    }
//    die();
//    
       if($flag)
    {
        //mysqli_rollback($con);
        mysqli_commit($con);
        return true;

    }
    else
    {
        mysqli_rollback($con);
        return false;
    }
}

//
//CHECK IF DOCUMENT TRACKER ALREADY EXIST IN MONITORING TABLE
//
function checkDuplicate($documentlist_tracker_id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sqlQuery='SELECT COUNT(bacdocument_monitoring_id) as rowCount FROM bacdocument_monitoring WHERE fk_bacdocumentlist_tracker_id = "'.$documentlist_tracker_id.'" ';
    $result=mysqli_query($con,$sqlQuery);
    $row=  mysqli_fetch_array($result);
    if ($row['rowCount']==0)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function checkStatusUpdatedToday($tracker_id)
{
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $dateNow=date('Y-m-d');
  
   $sql='SELECT count(*) as rowCount  FROM bacdocumentlist_trackerdetail WHERE date(transdate) = "'.$dateNow.'" AND fk_bacdocumentlist_tracker_id = '.$tracker_id.' ';
   $result=  mysqli_query($con, $sql); 
   $row=  mysqli_fetch_array($result);
 
    if ($row['rowCount']==0)
    {
        return false;
    }
    else
    {
        return true;
    }
   
  
   
}
//


?>
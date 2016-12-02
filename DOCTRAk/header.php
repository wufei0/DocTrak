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


echo '<link rel="stylesheet" type="text/css" href="'.$PROJECT_ROOT.'css/jquery.feedBackBox.css" />';
echo '<script src="'.$PROJECT_ROOT.'js/jquery.feedBackBox.js"></script>';

 
?>

    <!-- Feedback-->
<div id="feedbackDiv"></div>
<!-- End Feedback -->


<!-- new header ---------------------------------------------->
<header>

	<div class="navbar navbar-default navbar-fixed-top" id="nav-bg" role="navigation">
		<div class="mailNoti" >
			<div class="container">	
					<div class="row">
							
						<div class="col-md-12">
							<div class="navbar-buttons navbar-header pull-right" role="navigation">
								<ul class="nav ace-nav" id="ace-nav">

									<li class="purple" id="purple">
									
										<?php
        
											 require_once("procedures/connection.php");
											 global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
												 
											 $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
											 $query="SELECT mail_id, COUNT(mail_id) as mailcount FROM mail WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
											   
											 $result=mysqli_query($con,$query)or die(mysqli_error($con));
												 //$sql=;
											 while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
											 
											if (($_SESSION['BAC']==1) or ($_SESSION['GROUP']=='POWER ADMIN'))
											{
												$sqlString='SELECT COUNT(*) as numOfRow FROM bacdocument_monitoring';
												$result=mysqli_query($con,$sqlString)or die(mysqli_error($con));
												$row = mysqli_fetch_array($result);
												
												if ($row['numOfRow']<>0)
												{													
													echo '<a data-toggle="dropdown" class="dropdown-toggle" href="#">
																<i class="ace-icon fa fa-bell icon-animated-bell"></i>
																<span class="badge badge-important" id="badge">'.$row['numOfRow'].'</span>
															</a>';
															
													echo '
														<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
															<li class="dropdown-header">
																<i class="ace-icon fa fa-exclamation-triangle"></i>
																'.$row['numOfRow'].' Notifications
															</li>
														';
														
														/////////////////
														///START BAC NOTIFICATION
														/////////////////
														$sqlQuery='SELECT bacdocument_id,fk_officename_bacdocumentlist,bacdocumentdetail,activity,prcost FROM bacdocument_monitoring JOIN bacdocumentlist_tracker ON bacdocument_monitoring.fk_bacdocumentlist_tracker_id = bacdocumentlist_tracker.bacdocumentlist_tracker_id JOIN bacdocumentlist ON bacdocumentlist_tracker.fk_bacdocumentlist_id = bacdocumentlist.bacdocument_id';
											
														$recSet=mysqli_query($con,$sqlQuery);
														//$resultSet=  mysqli_fetch_array($recSet);
														$rowCounter=1;
														
														while ($resultSet = mysqli_fetch_array($recSet,MYSQLI_ASSOC))
														{
															
															 
															 echo '
																<li class="dropdown-content">
																	<ul class="dropdown-menu dropdown-navbar navbar-pink">
																	';
																	
																	echo '
																		<li>
																			<a href="javascript:RenderBacMonitor(\''.$resultSet['bacdocument_id'].'\')">
																		';
																	echo $resultSet['fk_officename_bacdocumentlist'].' - '.$resultSet['bacdocumentdetail'].' - '.$resultSet['activity'].' ('.number_format($resultSet['prcost'], 2, '.', ',').')';
																	
																	echo '
																			</a>
																		</li>
																		';
																echo '
																	</ul>
																</li>';
														}	

														echo '	
															<li class="dropdown-footer">
																<a href="#">
																	See all notifications
																	<i class="ace-icon fa fa-arrow-right"></i>
																</a>
															</li>
														</ul>';
													
												}
											}
											else
												{
													echo '<span  id="deadlineNoti" class="badge"></span>'; 
												}

										?>
									</li>

									<li class="green" id="green">
									
										<?php
        
											 require_once("procedures/connection.php");
											 global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
												 
											 $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
											 $query="SELECT mail_id, COUNT(mail_id) as mailcount FROM mail WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
											   
											 $result=mysqli_query($con,$query)or die(mysqli_error($con));
												 //$sql=;
											 while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
												 
											 {
												
												if ($row['mailcount']<>0)
												{
													//echo '<a href="'.$PROJECT_ROOT.'procedures/home/userinfo/inbox.php"><img  src="'.$PROJECT_ROOT.'images/home/icon/testmail.gif" width="30" height="20" />'.$row['mailcount'].'</a>&nbsp';
													echo '<a data-toggle="dropdown" class="dropdown-toggle" href="'.$PROJECT_ROOT.'procedures/home/userinfo/inbox.php">
																<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
																<span class="badge badge-success" id="badge">'.$row['mailcount'].'</span>
															</a>';
															
													echo '
														<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
															<li class="dropdown-header">
																<i class="ace-icon fa fa-envelope-o"></i>
																'.$row['mailcount'].' Messages
															</li>

															<li class="dropdown-content">
																<ul class="dropdown-menu dropdown-navbar">
																	<li>
																		<a href="#" class="clearfix">
																			<img src="assets/avatars/avatar.png" class="msg-photo" alt="Alexs Avatar" />
																			<span class="msg-body">
																				<span class="msg-title">
																					<span class="blue">Alex:</span>
																					Ciao sociis natoque penatibus et auctor ...
																				</span>

																				<span class="msg-time">
																					<i class="ace-icon fa fa-clock-o"></i>
																					<span>a moment ago</span>
																				</span>
																			</span>
																		</a>
																	</li>

																</ul>
															</li>

															<li class="dropdown-footer">
																<a href="inbox.html">
																	See all messages
																	<i class="ace-icon fa fa-arrow-right"></i>
																</a>
															</li>
														</ul>';
												}
												//CHECK IF THERE ARE DEADLINE BAC DOCUMENTS

											 }
					
										?>
									</li>
									
									<li>
										<?php
        
											 require_once("procedures/connection.php");
											 global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
												 
											 $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
											 $query="SELECT mail_id, COUNT(mail_id) as mailcount FROM mail WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
											   
											 $result=mysqli_query($con,$query)or die(mysqli_error($con));
												 //$sql=;
											 while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
											 
											echo "<div id='Admin' class='menuMail'><p> <a href=".$PROJECT_ROOT."procedures/home/userinfo/userinfo.php>Hi,".$_SESSION['security_name']." of ".$_SESSION['OFFICE']."</a> | <a href=".$PROJECT_ROOT."procedures/home/logout.php style='color:#fff;'>Logout</a></p></div>";
											
											mysqli_free_result($result);
										?>
									</li>
	
								</ul>
								
								
							</div>
						</div>
						
					</div>
			</div>
		</div>
		
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-header image">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="<?php echo $PROJECT_ROOT."index.php"; ?>"> <img <?php
							$printme="src=".$PROJECT_ROOT."images/home/doctraklogo2.png";
							echo $printme;
							?>
									width="80" height="70" alt="PGLU" title="DocTrak" align="left" />
							<h3 class="wrap">
								<?php

									echo $_SESSION['HeaderTitle']. "<span style='font-size:12px;'>&nbsp; " .$_SESSION['Version'];
									echo "</span>";
								?>
							</h3><p class="wrap">Provincial Government of La Union</p>
						</a>
					</div>
					
					<div id="navHeader" class="navbar-collapse collapse pull-right">
						<ul class="nav navbar-nav" id="navbar">
										
										<li><a href="<?php echo $PROJECT_ROOT."home.php"; ?>">Home</a></li>
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Document <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/newdoc.php'; ?>">Document</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/receiveddoc.php'; ?>">Receive Document</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/releasedoc.php'; ?>">Release Document</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/forreleasedoc.php'; ?>">For Release</a></li>
												<li class="divider"></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documenttracker.php'; ?>">Document Tracker</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documentprocessing.php'; ?>">Processing</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documenttrail.php'; ?>">Document Trail</a></li>
												<li class="divider"></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/rollback.php'; ?>">Rollback</a></li>
											</ul>
										</li>
										
										<?php
                                
											echo '
											<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
												BAC<b class="caret"></b></span>
												</a>
												<ul class="dropdown-menu">';
												echo '<li><a href='.$PROJECT_ROOT.'procedures/home/bac/new.php>New</a></li>';
												if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
												{
												echo '
													<li><a href='.$PROJECT_ROOT.'procedures/home/bac/receive.php>Receive Doc</a></li>
													<li><a href='.$PROJECT_ROOT.'procedures/home/bac/release.php>Release Doc</a></li>
																							<li><a href='.$PROJECT_ROOT.'procedures/home/bac/checkin.php>Check In</a></li>
													<li class="divider"></li>';
												}
												//<li><a href='.$PROJECT_ROOT.'procedures/home/bac/backlog.php><span>Backlog</span></a></li>
												echo '
													<li><a href='.$PROJECT_ROOT.'procedures/home/bac/monitor.php>Monitoring</a></li>
													<li><a href='.$PROJECT_ROOT.'procedures/home/bac/archive.php>Archive</a></li>
												';
												echo '</ul></li>';
                                
                                
										?>
										
										
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Communication <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/communication/letter.php"; ?>">Letter</a></li>
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/communication/monitoring.php"; ?>">Letter Monitoring</a></li>
											</ul>
										</li>
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <b class="caret"></b></a>
											<ul class="dropdown-menu navbar-right" role="menu">
												<li class="dropdown-submenu" id="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Document Tracking</span></a>
													<ul class="dropdown-menu down-bgcolor">
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doccons.php"; ?>"><span>Document Consolidation</span></a></li>
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocess.php"; ?>"><span>Office Document Flow</span></a></li>
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/docsummary.php"; ?>"><span>Consolidated Accomplishment</span></a></li>
													</ul>
												</li>
												<li class="dropdown-submenu" id="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>BAC</span></a>
													<ul class="dropdown-menu down-bgcolor">
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/history.php"; ?>"><span>History</span></a></li>
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/consolidoc.php"; ?>"><span>Consolidated Document</span></a></li>
													</ul>
												</li>
											</ul>
											<!--<ul class="dropdown-menu">
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/dochistory.php"; ?>">Document History</a></li>
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocess.php"; ?>">Document on Process</a></li>
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocesspersignatory.php"; ?>">Document on Process per Signatory</a></li>
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/docpersignatory.php"; ?>">Documents per Signatory</a></li>
											</ul>-->
										</li>
										
										<?php
                                
                         if($_SESSION['GROUP']=='POWER ADMIN')
                                {
                                echo '<li class="dropdown">';
                                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Maintenance <b class="caret"></b></a>
                                <ul class="dropdown-menu navbar-right" id="ulheader">';
                                        
                                        echo '<li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/flowtemplate.php">Flow Template</a></li>
                                             <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/documenttype.php">Document Type</a></li>
                                              <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/office.php">Office</a></li>
                                             
                                        <li class="divider"></li>
                                        <li class="dropdown dropdown-submenu" id="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Security</a>
                                            <ul class="dropdown-menu down-bgcolor">
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/users.php">Users</a></li>
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/group.php">Group</a></li>
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/audittrail.php">Audit Trail</a></li>
                                            </ul>
                                        </li>';
                                        echo ' </ul></li>';
                                    }
                    ?>
										
										
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
											<ul class="dropdown-menu navbar-right" id="ulheader">
												<li class="dropdown dropdown-submenu" id="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Manual</a>
                                                    <ul class="dropdown-menu down-bgcolor">
                                                    	<li><a target='_blank' href="https://onedrive.live.com/redir?resid=30BD84299085B6FB!21917&authkey=!AE_FMAlza931EV0&ithint=file%2cpdf" ><span>Document Manual</span></a></li>
                                                    	<li><a target='_blank' href="https://onedrive.live.com/redir?resid=30BD84299085B6FB!21824&authkey=!APqDiAq2vDQLtd8&ithint=file%2cpdf" ><span>Financial Document Templates</span></a></li>
                                                    	<li><a target='_blank' href="https://onedrive.live.com/redir?resid=30BD84299085B6FB!23158&authkey=!ABWzr-1RCwyLAtY&ithint=file%2cpdf" ><span>Consolidated Process Flow Templates</span></a></li>	
                                                    </ul>
												</li>
												<li><a href="<?php echo $PROJECT_ROOT."about.php"; ?>">About</a></li>
											</ul>
										</li>
									</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		
		
	
</header>	
<!-- end new header ------------------------------------------->


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
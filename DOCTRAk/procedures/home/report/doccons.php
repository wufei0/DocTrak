


<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
	  $_SESSION['in'] ="start";
	 header('Location:../../../index.php');
	}




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        <?php
        
        echo $_SESSION['Title']. "" .$_SESSION['Version'];
        ?>
    </title>

    <link href="../../../css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../../../css/home.css" />
    <link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon" />
    
    
</head>

<body>
<?php
    $PROJECT_ROOT= '../../../';
    include_once($PROJECT_ROOT.'qvJscript.php');
    include_once('../../../header.php');
?>


<div class="content">

<div id="leftmenu">
		<div id='cssmenu'>
		<ul>
		   <li class="bottomline topraduis"><a href='#'><span>DOC</span></a>
		      <ul>
			 <li><a href='javascript:newDocument()'><span>New</span></a></li>
			 <li><a href='javascript:receiveDocument()'><span>Receive</span></a></li>
		 <li><a href='javascript:releaseDocument()'><span>Release</span></a></li>
		 <li><a href='javascript:forpickupDocument()'><span>For Release</span></a></li>
		      </ul>
		   </li>
		   <?php
		   if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
		   {
		      /* echo '<li class="bottomraduis"><a href="#"><span>BAC</span></a>
		      <ul>
			 <li><a href="javascript:bacDocument()"><span>New</span></a></li>
			 <li><a href="#"><span>Check In</span></a></li>
		 <li><a href="#"><span>Backlog</span></a></li>
		      </ul>
		   </li>'; */
		   }
		   ?>

		</ul>
	    </div>
</div>

    <div class="content1">

        <div class="content2">

            <div id="post">

                <div id="post01">
                    <h2></h2>


                    	<div id="headform">

										
							<div class="checkHistory">
																
										
										
										
												<div class="panel panel-info">
												  <div class="panel-heading">FILTER</div>
												  <div class="panel-body">
												  
														<div id="headtable">
															
															
															<form class="form-inline">
															  <div class="form-group">
																<label for="exampleInputName2">Date From:</label>
																<input type="date" class="form-control" id="datefrom" name="datefrom" placeholder="Date From" value="<?php echo date('Y-m-d'); ?>" />
															  </div>
															  <div class="form-group">
																<label for="exampleInputEmail2">Date To:</label>
																<input type="date" class="form-control" id="dateto" placeholder="Date To" value="<?php echo date('Y-m-d'); ?>" />
															  </div>
																
																<div class="form-group">
																
																	<div style="padding-top:10px; float:left; padding-right:15px;">
																		<label class="checkbox-inline">
																		<input type="checkbox" id="received" value="option1" class="checkbox"> Received
																		</label>
																		<label class="checkbox-inline">
																		  <input type="checkbox" id="released" value="option1"> Released
																		</label>
																		<label class="checkbox-inline">
																		  <input type="checkbox" id="approved" value="option1"> Approved
																		</label>
																		<label class="checkbox-inline">
																		  <input type="checkbox" id="mydoc" value="option1"> My Doc
																		</label>
														
																	</div>
																	
																	
																</div>
															<button id="filter" name="filter" class="btn btn-primary">Filter </button>
															
															
															</form>
															
														</div>
														<div class="tfclear"></div>
															
													
													
													
												  </div>
												</div>
										
										
								
							</div>

                        </div>
                        <div id="codetable">
                            <div class="scroll">
                        	<table id="historydata">
                                	<tr>
                                						<th>No</th>
                                            <th>BARCODE</th>
                                            <th>TITLE</th>
                                            <th>OFFICE</th>
                                            <th>OWNER</th>
                                            <th>DATE</th>
                                            <th>TYPE</th>
                                        </tr>


                                </table>
                            </div>
                        </div>


                </div>
                <div class="tfclear"></div>

                
            </div>

        </div>

    </div>

</div>

<div class="footer">

    <div class="footerbg">

        <div id="footer2">
            <p>
                <?php
             
                echo $_SESSION['Copyright']. "&nbsp;<img src=../../../images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
                echo "&nbsp|";
                ?>

                <a href="#">Scroll Top</a></p>
        </div>

    </div>

</div>

<!-- Modal -->
  
<!-- End Modal -->
    <script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript">




		    $("#filter").click(function (e) {
			    e.preventDefault();

			    var datefrom=document.getElementById('datefrom').value;
			    var dateto=document.getElementById('dateto').value;
					
					
					var received=document.getElementById("received").checked;
					var released=document.getElementById("released").checked;
					var approved=document.getElementById("approved").checked;
					var mydoc=document.getElementById("mydoc").checked;
				
				

			    jQuery.ajax({
				    type: "POST",
				    url:"history/search.php",
				    dataType:"text", // Data type, HTML, json etc.
				  	data:{vdatefrom:datefrom,vdateto:dateto,vreceived:received,vreleased:released,vapproved:approved,vmydoc:mydoc},
				  	beforeSend: function() 
				  	{
            	$("#filter").html('wait..');
            	$("#historydata").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
				    success:function(response)
				    {
					    $("#historydata").html(response);
 							$("#filter").html('Filter');
				    },
				    error:function (xhr, ajaxOptions, thrownError){
					    alert(thrownError);
				    }
			    });
		    });

/////////////////////////////////////////////////////////
//CHECK FOR VALID DATE ENTERED
////////////////////////////////////////////////////////

	function checkDate(date)
	{
		//var text = '2/30/2011';
		var comp = date.split('/');
		var m = parseInt(comp[0], 10);
		var d = parseInt(comp[1], 10);
		var y = parseInt(comp[2], 10);
		var date = new Date(y,m-1,d);
		if (date.getFullYear() == y && date.getMonth() + 1 == m && date.getDate() == d)
		 	{
		  	return true;
			} 
		else 
			{
		  	return false;
			}
	}


	  
function addRowHandlers()
    {
       
            var table = document.getElementById('historydata');
             //alert (table);

        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler =
                function(row)
                {
                    return function() {
                                            var cell = row.getElementsByTagName("td")[1];
                                            var id = cell.innerHTML;

																			
                                           retrieveDocument(id);
                                           $('#myModal').modal('show');
                                     };
                };

            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    
    //FUNCTION THAT RETRIEVES THE DOCUMENT FROM addRowHandlers() AND OPENS MODAL FORM
    function retrieveDocument(BarcodeId)
    {
            var myData = 'documentTracker='+BarcodeId; //build a post data structure
            jQuery.ajax({
                type: "POST",
                url:"../../../procedures/home/document/common/retrievedata.php",
                dataType:"text", // Data type, HTML, json etc.
                data:myData,
                beforeSend: function() {
                    $("#responds").html("<div id='loadingModal'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                ajaxError: function() {
                    $("#responds").html("<div id='loadingModal'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                success:function(response){
                    $("#responds").html(response);
                

                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
             $(window).load(function(){
            //$('#myModal').modal('show');
        });

        }

$('#released').change(function() {
   if($(this).is(":checked")) {
      document.getElementById("received").checked=true;
   }
   //'unchecked' event code
});
$('#received').change(function() {
   if($(this).is(":checked")) {
      
   }
   else
   	{
   		document.getElementById("released").checked=false;
   		document.getElementById("approved").checked=false;
   		}
   //'unchecked' event code
});

$('#approved').change(function() {
   if($(this).is(":checked")) {
      document.getElementById("received").checked=true;
   }
   //'unchecked' event code
});




    </script>
     <?php
       include('../../../modal.php');
       ?>
</body>
</html>
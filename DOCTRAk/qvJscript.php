
 <script language="JavaScript" type="text/javascript">
          //QUICKVIEW FUNCTION GROUP
    function submitAction(module)
    {
       
        document.getElementById('footerNote').innerHTML='';
        //var mod=module;
        switch (module)
        {
            case 'newDocu':
                if (inputCheck(module))
                {
                    crud(module);
                    document.getElementById("DocId").value='';
                    document.getElementById("DocTitle").value='';
                    document.getElementById("DocDesc").value='';
                    
                    document.getElementById("DocId").focus();
                }
                else
                {
                    document.getElementById('footerNote').innerHTML="Incomplete Details..";
                }
//                
                break;
            
            case 'receiveDocu':
              
                 if (inputCheck(module))
                {
                    crud(module);
                }
                else
                {
                    document.getElementById('footerNote').innerHTML="Incomplete Details..";
                }
                break;
                
            case 'releaseDocu':
              
                 if (inputCheck(module))
                {
                    crud(module);
                }
                else
                {
                    document.getElementById('footerNote').innerHTML="Incomplete Details..";
                }
                break;
                
            case 'ForreleaseDocu':
              
                 if (inputCheck(module))
                {
                    crud(module);
                }
                else
                {
                    document.getElementById('footerNote').innerHTML="Incomplete Details..";
                }
                break;    
                
            default:
                alert("great!");
                break;
        }
        
        
        
    }
    
    
    //CHECK FOR VALID INPUTS (BLANK)
    function inputCheck(action)
    {
        switch (action)
        {
            case 'newDocu':
                if ((document.getElementById('DocId').value != '')&&(document.getElementById('DocuTemplate').value != ''))
                {
                    return true;
                }
                    return false;
                break;
                
            case 'receiveDocu':
                if (document.getElementById('DocId').value != '')
                {
                    return true;
                }
                    return false;
                break;
                
            case 'releaseDocu':
                if ((document.getElementById('DocId').value != '' )&&(document.getElementById('UserId').value != ''))
                {
                    return true;
                }
                    return false;
                break;
                
                 case 'ForreleaseDocu':
                if (document.getElementById('DocId').value != '')
                {
                    return true;
                }
                    return false;
                break;
                
            
            default:
                return false;
                break;
        }
        
    }

    function crud(module)
    {
        
        switch(module)
        {
            case 'newDocu':
                var doc_id=document.getElementById('DocId').value;
                var owner_id='';
                var doc_title=document.getElementById('DocTitle').value;
                var doc_desc=document.getElementById('DocDesc').value;
                var doc_type=document.getElementById('DocType').value;
                var doc_template=document.getElementById('DocuTemplate').value;
                var doc_comment='';
                break;
            case 'receiveDocu':
                var doc_id=document.getElementById('DocId').value;
                var owner_id=document.getElementById('UserId').value;
                var doc_title='';
                var doc_desc='';
                var doc_type='';
                var doc_template='';
                var doc_comment='';
                break;
            case 'releaseDocu':
                var doc_id=document.getElementById('DocId').value;
                var owner_id=document.getElementById('UserId').value;
                var doc_title='';
                var doc_desc='';
                var doc_type='';
                var doc_template='';
                var doc_comment=document.getElementById('DocComment').value;
                break;
            case 'ForreleaseDocu':
                var doc_id=document.getElementById('DocId').value;
                var owner_id='';
                var doc_title='';
                var doc_desc='';
                var doc_type='';
                var doc_template='';
                var doc_comment=document.getElementById('DocComment').value;
                break;
                
                
        }
        
        var module_name = module;
       
        jQuery.ajax({
            type: "POST",
            <?php echo 'url:"'.$PROJECT_ROOT.'crud.php",'; ?>
            dataType:'html',
            data:{module:module_name,docId:doc_id,docTitle:doc_title,docDesc:doc_desc,docType:doc_type,docTemplate:doc_template,ownerId:owner_id,docuComment:doc_comment},
             beforeSend: function()
            {
                $("#footerNote").html("Saving....");
            },
            success:function(response)
            {
                $("#footerNote").html(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
            
                $("#footerNote").html(response);
            }
        });
    }
    
    
    
    function retriveDocInfo(module_name)
    {
        var doc_id = document.getElementById('DocId').value;
        var docDetail="<div class='row'> <div class='col-md-6 col-bottom'> <strong>Title:</strong> </div></div> <div class='row'> <div class='col-md-6 col-bottom'><strong>Type:</strong></div><div class='col-md-6 col-bottom'><strong>Template:</strong> </div> </div><div class='row'><div class='col-md-6 col-bottom'><strong>Office:</strong></div> </div>";
        if (document.getElementById('DocId').value=='')
        {
            document.getElementById('docDetail').innerHTML=docDetail;
            return;
        }
       
       
       jQuery.ajax({
            type: "POST",
            //url:"crud.php",
            <?php echo 'url:"'.$PROJECT_ROOT.'crud.php",'; ?>
            dataType:'html',
            data:{module:module_name,docId:doc_id},
             beforeSend: function()
            {
           //     $("#footerNote").html("Searching...");
                $("#docDetail").html(docDetail);
            },
            success:function(response)
            {
                $("#docDetail").html(response);
                
            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#footerNote").html(response);
            }
        }); 
    }
    
</script>


<script>
    //AUTO REFRESH PAGE MODULE EVERY 60 SEC OF NO ACTIVITY
     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 5000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 6000000);
	 //60000
     }

     setTimeout(refresh, 6000000);
     
     
     //////////////////////////////////////////////////
     ///////Feedback /////////////////////////////////
     //////////////////////////////////////////////////
     
     function feedback()
     {
		     if (!document.getElementById("feedbackMsg").value)	
		     {
		     	$("#fpi_ajax_msg").html("Cannot send blank feedback.");
		     	$('#fpi_ajax_msg').css('display', '');
		        $("#fpi_ajax_msg").fadeOut(4000,function() {document.getElementById("fpi_ajax_msg").value=""; });
		     	return 0;
		     }
		     	
		    
		     var module_name = 'feedback';
		     var message_text = document.getElementById("feedbackMsg").value;
		     jQuery.ajax({
		            type: "POST",
		            //url:"crud.php",
		            <?php echo 'url:"'.$PROJECT_ROOT.'crud.php",'; ?>
		            dataType:'html',
		            data:{module:module_name,message:message_text},
		             beforeSend: function()
		            {
		           //     $("#footerNote").html("Searching...");
		                $("#fpi_ajax_msg").html("Sending..");
		            },
		            success:function(response)
		            {
		                $("#fpi_ajax_msg").html(response);
		                document.getElementById("feedbackMsg").value="";
		                
		            },
		            error:function (xhr, ajaxOptions, thrownError){
		                $("#fpi_ajax_msg").html(response);
		            }
		        }); 
		        $('#fpi_ajax_msg').css('display', '');
		        $("#fpi_ajax_msg").fadeOut(4000,function() {document.getElementById("fpi_ajax_msg").value=""; });
		        
		        
		        
		        
     }
     
     
     
</script>
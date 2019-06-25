 
<html>
<head>
    
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>


<script>
$(document).ready(function() {
    $('#extable').DataTable({
    });
} );
</script>
</head>
</html>


<!-- New Driver Registration  -->
@if (@isset($set))
<?php
$sel1 =DB::table('driverRegistration')->select('*')->where('verified','Pending')->get();

echo '

<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >
  
     <h3>Driver Registrations</h3>
      </div>
        
  </div>

  <br>
<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
          
          <th>DriverId</th>
   <th>ReferredBy</th>
          <th>First Name</th>        
          <th>LastName</th>
                    <th>Mobile</th>
                    <th>VehicleType(click to view vehicle details)</th> 
                    <th>Seats</th>
                 <!-- <th>VehicleNumber</th> 
                    <th>RCNumber</th>
                    <th>LicenceNumber</th> 
                    <th>PollutionCheck</th>
                    <th>PollutionExp.</th> 
                    <th>Insurance</th>
                    <th>InsuranceExpirey</th> 
                    <th>WorkingStatus</th> -->
                     <th>Documents</th>
                     <th>Assignagent</th>
                     <th>Action</th>


                   
                    
        </tr>
      </thead>';



foreach($sel1 as $sel123)
{

$id = $sel123->id;
$referredBy = $sel123->referredBy;
$driverid = $sel123->d_id;
$firstname = $sel123->firstName;
$lastname =$sel123->lastName;
$mobile = $sel123->mobileNumber;
$vehicletype=$sel123->vehicleType;
$seats = $sel123->seats;
$VehicleNumber=$sel123->vehicleNumber;

$rcStatus = $sel123->rcStatus;
$licenseStatus = $sel123->licenseStatus;
$insuranceStatus = $sel123->insuranceStatus;
$pollutionStatus = $sel123->pollutionStatus;
$aadharStatus = $sel123->aadharStatus;
$panStatus = $sel123->panStatus;

$LicenceNumber = $sel123->licenseNumber;
$pollutionCheck = $sel123->pollutionCheck;
$pollutionExpiry=$sel123->p_expiryDate;
$insurance=$sel123->insurance;
$insuranceExpirey=$sel123->i_expiryDate;
$workingstatus = $sel123->workingStatus;
$documentType=$sel123->documentType;

echo '
<tr>';

                   if($rcStatus=="Accept" && $licenseStatus =="Accept" && $insuranceStatus =="Accept" && $pollutionStatus=="Accept" && $aadharStatus =="Accept"
&& $panStatus =="Accept")
{
  echo '
<td style="color: #000080">'.$driverid.'</td>';
}

elseif($rcStatus=="Reject" || $licenseStatus =="Reject" || $insuranceStatus =="Reject" || $pollutionStatus=="Reject" || $aadharStatus =="Reject"|| $panStatus =="Reject")
{
  echo '
<td style="color:#FF0000">'.$driverid.'</td>';
}
elseif($rcStatus=="pending" || $licenseStatus =="pending" || $insuranceStatus =="pending" || $pollutionStatus=="pending" || $aadharStatus =="pending"|| $panStatus =="pending")
{
  echo '
<td style="color: #00FF00">'.$driverid.'</td>';
}
else 
{
  echo '
<td>'.$driverid.'</td>';
}

echo '
<td>'.$referredBy.'</td>
<td>'.$firstname.'</td>
<td>'.$lastname.'</td>
<td>'.$mobile.'</td>
<td> <a href="#" class="ids1" id='.$mobile.'>'.$vehicletype.'</a></td>
<td>'.$seats.'</td>

<td><a href="#" class="driverdoc" did='.$mobile.'>'.$documentType.'</a></td>';


echo '<td >';
if($rcStatus=="Accept" && $licenseStatus =="Accept" && $insuranceStatus =="Accept" && $pollutionStatus=="Accept" && $aadharStatus =="Accept"
&& $panStatus =="Accept")

{
echo' <input type="button" class="assignagent" did='.$mobile.' aid='.$driverid .' value="Assignagent">';
}
else
{
echo'<span style="color:red;"> Documents not yet verified</span>';
}
echo' </td>


<td><input type="button" class="accept" aid="'.$driverid.'" value="Accept">&nbsp;<input type="button" class="rej" rid="'.$driverid.'"value="Reject"></td>
 






</tr>';




}

 echo 
      '</table>
      </div>';
?>

@endif
<!-- New Driver Registration Ends-->

@if (@isset($ban))
<?php 
$sel =DB::table('cadbank')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();

echo '
<br>
<br>
<div class="driver-content" id="mainfun" >
<div class="cont">

<div class="heading" >

<h3>Cadbank</h3>
</div>

</div>

<div class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
<thead>
<tr>

<th>SNO</th>

<th>Cadcoins</th> 
</tr>
</thead>
';


foreach($sel as $ban)
{

$sno = $ban->id;
$cadcoins = $ban->cadcoins;
echo '
<tr>
<td>'.$sno.'</td>
<td>'.$cadcoins.'</td>
</tr>';

}
echo '
</table>
</div>';

?>
@endif

<!-- cadbank details by lakshmi -->
@if (@isset($dis))
<?php 
$sel =DB::table('cadcoins')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();

echo '
<br>
<br>
<div class="driver-content" id="mainfun" >
<div class="cont">

<div class="heading" >

<h3>Coins Distribution</h3>
</div>

</div>

<div class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
<thead>
<tr>

<th>SNO</th>

<th>RID</th> 

<th>Cadcoins</th>
<th>TotalCoins</th> 
<th>GetinID </th>
<th>GinCoins </th>
<th>GetoutID </th>
<th>GoutCoins </th>
<th>DID </th>
<th>DrCoins </th>
<th>SID </th>
<th>SCoins </th>
<th>PID </th>
<th>PCoins </th>
</tr>
</thead>
';


foreach($sel as $dis)
{

$sno = $dis->id;
$rid = $dis->rid;

$cadcoins = $dis->cadcoins;
$Totalcoins=$dis->Totalcoins;
$getinid = $dis->getinid;
$gincoins = $dis->gincoins;
$getoutid = $dis->getoutid;
$goutcoins = $dis->goutcoins;
$did = $dis->did;
$drcoins = $dis->drcoins;
$sid = $dis->sid;
$scoins = $dis->scoins;
$pid = $dis->pid;
$pcoins = $dis->pcoins;

echo '
<tr>



<td>'.$sno.'</td>
<td>'.$rid.'</td>
<td>'.$cadcoins.'</td> 
<td>'.$Totalcoins.'</td>
<td>'.$getinid.'</td>
<td>'.$gincoins.'</td>
<td>'.$getoutid.'</td>
<td>'.$goutcoins.'</td>
<td>'.$did.'</td>
<td>'.$drcoins.'</td>
<td>'.$sid.'</td>
<td>'.$scoins.'</td>
<td>'.$pid.'</td>
<td>'.$pcoins.'</td>



</tr>';

}
echo '
</table>
</div>';

?>
@endif
<!-- end of cadbank details by lakshmi -->


<!--  customer suggestions begans -->
@if (@isset($sug))
<?php
$sel =DB::table('requestLocation')->select('*')->get();
echo '
<br>
<br>
<div class="driver-content" id="mainfun" >
<div class="cont">
<h3>Customer Suggestions</h3>
</div>
<div>

</div>
<br><p></p>

<div class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
<thead>
<tr>

<th>SourceLatitude</th>

<th>SourceLongitude</th> 
<th>SourceName</th>
<th>destinationLatitude</th>
<th>destinationLongitude</th> 
<th>destinationName</th>
<th>CreatedDate</th> 


</tr>
</thead>

';



foreach($sel as $sug)
{


$sourcelat = $sug->sourceLat;
$sourcelon = $sug->sourceLon;

$sourcename =$sug->sourceName;
$destinationlat = $sug->destinationLat;
$destinationlon = $sug->destinationLon;
$destinationname = $sug->destinationName;
$createdate = $sug->createdDate;


echo '
<tr>
<td>'.$sourcelat.'</td>
<td>'.$sourcelon.'</td>
<td>'.$sourcename.'</td>

<td> '.$destinationlat.'</td>
<td>'.$destinationlon.'</td>
<td>'.$destinationname.'</td>
<td>'.$createdate.'</td>





</tr>';

}
echo '
</table>
</div>';

?>
@endif
<!-- end of customer suggestions -->


@if(@isset($myset))

<?php

/// get selected Drivers
$sel =DB::table('driverRegistration')->select('*')->where('verified','Accepted')->get();

echo '
<br>
  <br> 
<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

    <h3> Accepted Drivers</h3>
      </div>
        
  </div>
 
  <br>
<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
          
          <th>DriverId</th>
          <th>First Name</th>        
          <th>LastName</th>
                    <th>Mobile</th>
                    <th>Vehicle</th> 
                    <th>Seats</th>
                 <!-- <th>VehicleNumber</th> 
                    <th>RCNumber</th>
                    <th>LicenceNumber</th> 
                    <th>PollutionCheck</th>
                    <th>PollutionExp.</th> 
                    <th>Insurance</th>
                    <th>InsuranceExpirey</th> -->
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Action</th>
                     
                  
                    
        </tr>
      </thead>
      ';

      
  date_default_timezone_set('Asia/Kolkata');
$daytoday = date('Y-m-d ');
foreach($sel as $sel123)
{

$driverid =$sel123->d_id;
$firstname = $sel123->firstName;
$lastname =$sel123->lastName;
$mobile = $sel123->mobileNumber;
$vehicletype=$sel123->vehicleType;
$seats = $sel123->seats;
$VehicleNumber=$sel123->vehicleNumber;


$LicenceNumber = $sel123->licenseNumber;
$pollutionCheck = $sel123->pollutionCheck;
$pollutionExpiry=$sel123->p_expiryDate;
$insurance=$sel123->insurance;
$insuranceExpirey=$sel123->i_expiryDate;
$workingStatus = $sel123->workingStatus;
$documentType=$sel123->documentType;



$date1=date_create("$insuranceExpirey");
$date2=date_create("$pollutionExpiry");
$date3=date_create("$daytoday");
$diff1=date_diff($date3,$date2); 
$diff2=date_diff($date1,$date2);

$left_t = $diff1->format("%R%a");
$left_I = $diff2->format("%R%a");



echo '
<tr>';

if($left_t <=3 || $left_t <= 3 )
{

$time = $left_t;
echo '
<td><a href="#" class="ids2" id='.$driverid.'>'.$driverid.'<a><sup><sup><span class="badge" style="background-color:red;"><b style="color:white;">1</b></badge></sup></sup></td>';
}
else
{
   $time = $left_t;
  echo '
<td>'.$driverid.'</td>';
 
}
echo '

<td>'.$firstname.'</td>
<td>'.$lastname.'</td>
<td>'.$mobile.'</td>
<td> '.$vehicletype.'</td>
<td>'.$seats.'</td>
<td><a href="#" class="driverdoc" did='.$mobile.'>'.$documentType.'</a></td>

<td>'.$workingStatus.'</td>

<td><input type="button" class="DriverActive" aid="'.$mobile.'"  value="Active">&nbsp;<input type="button" class="DriverInActive" rid="'.$mobile.'"" value="Inactive"></td>






</tr>';

}
echo '
      </table>
      </div>';


?>
@endif

<!-- Rejected Drivers starts -->
@if(@isset($dcl))
<?php

  $sel =DB::table('driverRegistration')->select('*')->where('verified','Rejected')->get();
echo '
<br>
  <br>
<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading"  >
    <h3> Rejected Drivers</h3>
      </div>
        
  </div>

<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
          
          <th>DriverId</th>
          <th>First Name</th>        
          <th>LastName</th>
                    <th>Mobile</th>
                    <th>VehicleType</th> 
                    <th>Seats</th>
                
                    <th>RejectReason</th>
                    <th>Document</th>
                <!-- <th>VehicleNumber</th> 
                    <th>RCNumber</th>
                    <th>LicenceNumber</th> 
                    <th>PollutionCheck</th>
                    <th>PollutionExp.</th> 
                    <th>Insurance</th>
                    <th>InsuranceExpirey</th> -->

                    
        </tr>
      </thead>
      ';

      


  foreach($sel as $dclsel)
{

$driverid = $dclsel->d_id;
$firstname = $dclsel->firstName;
$lastname =$dclsel->lastName;
$mobile = $dclsel->mobileNumber;
$vehicletype=$dclsel->vehicleType;
$seats = $dclsel->seats;
$VehicleNumber=$dclsel->vehicleNumber;

$LicenceNumber =$dclsel->licenseNumber;
$reason = $dclsel->reason;
$pollutionCheck = $dclsel->pollutionCheck;
$pollutionExpiry=$dclsel->p_expiryDate;
$insurance=$dclsel->insurance;
$insuranceExpirey=$dclsel->i_expiryDate;
$documentType=$dclsel->documentType;


echo '
<tr>
<td>'.$driverid.'</td>
<td>'.$firstname.'</td>
<td>'.$lastname.'</td>
<td>'.$mobile.'</td>
<td> <a href="#" class="ids1" id='.$mobile.'>'.$vehicletype.'</a></td>
<td>'.$seats.'</td>
<td>'.$reason.'</td>

<td><a href="#" class="driverdoc" did='.$mobile.'>'.$documentType.'</a></td>

</tr>';

}
echo '
      </table>
      </div>';
?>
@endif
<!-- Rejected Drivers Ends -->

<!-- get driver Reviews -->
@if(@isset($sss))
<?php
$sel=DB::table('driverFeedback')->join('rideDetails','driverFeedback.r_id','=','rideDetails.r_id')->select('driverFeedback.*','rideDetails.*')->get();


echo '
<br>

<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading">
 <h3>Driver Reviews</h3>
      </div>
        
  </div>
  
<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
          
          <th>Id</th>

          <th>RideId</th>  
          <th>Source</th> 
          <th>Destination</th>       
          <th>GetOutId</th>
                    <th>DriverId</th>
                    <th>Rating</th> 
                    <th>Comments</th>
                    
        </tr>
      </thead>
      ';


foreach($sel as $rev)
{

$id = $rev->id;
$r_id = $rev->r_id;
$go_id =$rev->go_id;
$source = $rev->source;
$destination =$rev->destination;
$d_id = $rev->d_id;
$right=$rev->rating;
$comments = $rev->comments;
echo '
<tr>

<td>'.$id.'</td>

<td>'.$r_id.'</td>
<td>'.$source.'</td>
<td>'.$destination.'</td>
<td>'.$go_id.'</td>
<td> '.$d_id.'</a></td>
<td>'.$right.'</td>
<td>'.$comments.'</td>
</tr>';

}
echo '
      </table>
      </div>';

?>


@endif
<!--driver Reviews Ends-->

<!--get Driver Rides-->
@if (@isset($rid))
<?php



$sel =DB::table('rideDetails')->groupBy('d_id')->select('r_id','d_id')->get();

//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.*','ridedetails.*')->get();
echo '
<br>
  <br>
<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >
<h3>Driver Rides</h3>
      </div>
        
  </div>
 
<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
          
          <th>DriverId</th>
          <th>NoOfRides</th>        
         
                 

                    
        </tr>
      </thead>
      ';

      
foreach($sel as $rid)
{

$driverid = $rid->d_id;
$NoOfRides = $rid->r_id;


echo '
<tr>
<td>'.$driverid.'</td>
<td>'.$NoOfRides.'</td>

</tr>';

}
echo '
      </table>
      </div>';




?>
@endif
<!--Driver Rides Ends-->

<!--Agent Registrations starts-->
@if (@isset($setagen))
<?php


// $sel =$db->query("select * from agentsRegistration where verified ='Pending'");
$sel =DB::table('agentsRegistration')->where('verified','=','Pending')->select('*')->get();

//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.*','ridedetails.*')->get();
echo '

<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >
 
    <h3>Agent Registrations</h3>
      </div>
        
  </div>
<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
      
              <th>AgentId</th> 
              <th>ReferredBy</th> 
               <th>First Name</th>        
          
                    <th>Mobile</th>
                    <th>Qualification</th> 
                    <th>SmartPhone</th>
                  <th>Bike</th> 
                    <th>RequistedRole</th>
                   
                 
                   
                    <th>SupeId</th>
                    <th>Status</th>
                    <th>Action</th>

                   <!--
 <th>LastName</th>
                      <th>Documents</th>
                    <th>Document</th>
                     <th>CreatedBy</th> 
                    <th>CreatedDate</th>
                    <th>ModifiedDate</th> 
                    <th>ModifiedBy</th> -->
                   
              
                    
        </tr>
      </thead>
      ';


    
      

foreach($sel as $rid)
{

$agentid = $rid->id;
$referredBy = $rid->referredBy;
$firstname = $rid->firstName;
// $lastname =$rid->lastName;
$mobile = $rid->mobileNumber;
$qualification=$rid->qualification;
$SmartPhone = $rid->smartPhone;
$bike = $rid->bike;
$requestedRole = $rid->requestedRole;

$assignedRole = $rid->assignedRole;
$documentType=$rid->documentType;
$document=$rid->documentLocation;
$SupervisorId = $rid->s_id;
$workingstatus = $rid->workingStatus;

$createdBy = $rid->createdBy;
$createdDate = $rid->createdDate;
$modifiedDate=$rid->modifiedDate;
$modifiedBy=$rid->modifiedBy; 





echo '
<tr>
<td>'.$agentid.'</td>
<td>'.$referredBy.'</td>
<td>'.$firstname.'</td>

<td ><a href="#" class="ids41" id='.$mobile.'>'.$mobile.'</a></td>
<td> '.$qualification.'</a></td>
<td>'.$SmartPhone.'</td>
<td>'.$bike.'</td>
<td>'.$requestedRole.'</td>



<td>'.$SupervisorId.'</td>
<td>'.$workingstatus.'</td>
<!--
<td>'.$documentType.'</td>
<td><a   href="'.$document.'" download='.$firstname.'>Doc</a></td>
<td>'.$createdBy.'</td>
<td>'.$createdDate.'</td>
<td>'.$modifiedDate.'</td>
<td>'.$modifiedBy.'</td> -->

<td><input type="button" class="Agntaccept" aid="'.$agentid.'" nid="'.$firstname.'" value="Accept">&nbsp;<input type="button" class="Agntrej" rid="'.$mobile.'"value="Reject"></td>





</tr>';

}
echo '
      </table>
      </div>';




?>
@endif
<!--Agent Registrations ends-->


<!--Agent Declined Starts-->
@if (@isset($dgn))
<?php
// $sel =DB::table('agentsRegistration')->where('verified','=','Pending')->select('*')->get();
$sel = DB::table('agentsRegistration')->select('*')->where('verified','=','Rejected')->get();
echo '

<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading"   >
<h3>Rejected Agents</h3>
      </div>
        
  </div>
  
<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
          
         

          <th>First Name</th>        
          <th>LastName</th>
                    <th>Mobile</th>
                    <th>Qualification</th> 
                    <th>SmartPhone</th>
                  <th>Bike</th> 
                       <th>RejectedReason</th> 

                   <!--
<th>RequistedRole</th>
                    <th>AssigneRole</th>
                 
                   
                    <th>SupervisorId</th>
                    <th>Status</th>
                      <th>DocumentType</th>
                    <th>DocumentNumber</th>
                     <th>CreatedBy</th> 
                    <th>CreatedDate</th>
                    <th>ModifiedDate</th> 
                    <th>ModifiedBy</th> -->
                   
              
                    
        </tr>
      </thead>
      ';

foreach($sel as $dc)
{

$agentid = $dc->id;
$firstname = $dc->firstName;
$lastname =$dc->lastName;
$mobile = $dc->mobileNumber;
$qualification=$dc->qualification;
$SmartPhone = $dc->smartPhone;
$bike = $dc->bike;
$requestedRole = $dc->requestedRole;

$assignedRole = $dc->assignedRole;
$documentType=$dc->documentType;

$SupervisorId = $dc->s_id;
$workingstatus = $dc->workingStatus;

$createdBy = $dc->createdBy;
$createdDate = $dc->createdDate;
$modifiedDate=$dc->modifiedDate;
$modifiedBy=$dc->modifiedBy; 
$reason = $dc->reason;




echo '
<tr>

<td>'.$firstname.'</td>
<td>'.$lastname.'</td>
<td>'.$mobile.'</td>
<td> '.$qualification.'</a></td>
<td>'.$SmartPhone.'</td>
<td>'.$bike.'</td>

<td>'.$reason.'</td>






</tr>';

}
echo '
      </table>
      </div>';

?>
@endif
<!--Agent Declined ends-->


<!-- Agent Accepted starts here -->
@if (@isset($agn))
<?php
// $sel =$db->query("select * from agentsRegistration where verified ='Pending'");
$sel =DB::table('agentsRegistration')->where('verified','=','Accepted')->where('s_id','!=','0')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.*','ridedetails.*')->get();
echo '

<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading"   >

    <h3> Accepted Agents</h3>
      </div>
        
  </div>

<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
          
           <th>AgentId</th>

          <th>First Name</th>        
          <th>LastName</th>
                    <th>Mobile</th>
                    <th>Qualification</th> 
                    <th>SmartPhone</th>
                  <th>Bike</th> 
                   
                   
                    <th>Status</th>
                    <th>Action</th>

                   <!--
 <th>AssigneRole</th>
                 
                   
                    <th>SupervisorId</th>
                      <th>DocumentType</th>
                    <th>DocumentNumber</th>
                     <th>CreatedBy</th> 
                    <th>CreatedDate</th>
                    <th>ModifiedDate</th> 
                    <th>ModifiedBy</th> -->
                   
              
                    
        </tr>
      </thead>
      ';

      
  date_default_timezone_set('Asia/Kolkata');
$daytoday = date('Y-m-d ');
foreach($sel as $agid)
{

$agentid = $agid->id;
$firstname = $agid->firstName;
$lastname =$agid->lastName;
$mobile = $agid->mobileNumber;
$qualification=$agid->qualification;
$SmartPhone = $agid->smartPhone;
$bike = $agid->bike;
$requestedRole =$agid->requestedRole;

$assignedRole = $agid->assignedRole;
$documentType=$agid->documentType;

$SupervisorId = $agid->s_id;
$workingstatus = $agid->workingStatus;

$createdBy = $agid->createdBy;
$createdDate = $agid->createdDate;
$modifiedDate=$agid->modifiedDate;
$modifiedBy=$agid->modifiedBy; 



echo '
<tr>
<td ><a href="#" class="ids4" id='.$agentid.'>'.$agentid.'</a></td>
<td>'.$firstname.'</td>
<td>'.$lastname.'</td>
<td>'.$mobile.'</td>
<td> '.$qualification.'</a></td>
<td>'.$SmartPhone.'</td>
<td>'.$bike.'</td>


<td>'.$workingstatus.'</td>
<!--
<td>'.$documentType.'</td>

<td>'.$createdBy.'</td>
<td>'.$createdDate.'</td>
<td>'.$modifiedDate.'</td>
<td>'.$modifiedBy.'</td> -->


<td><input type="button" class="AgentActive" aid="'.$agentid.'"  value="Active">&nbsp;<input type="button" class="AgentInActive" rid="'.$agentid.'"" value="Inactive"></td>
</tr>';
}
echo '
      </table>
      </div>';
?>
@endif
<!--Agent Accept ends -->

<!--Agent Getins starts -->
@if (@isset($gen))
<?php
$sel =DB::table('rideDetails')->select('*')->get();
echo '
<div class="driver-content" id="mainfun" >
      <div class="cont">  
<div class="heading"  " >
   <h3>Agent GetIns</h3>
      </div>
  </div>
<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
         <th>RideId</th>
            <th>AgentGetInId</th> 
         
               <th>cadCoins</th>
          <th>DriverId</th>
                    <th>Source</th>
                    <th>Destination</th> 
                    <th>PassangerCount</th>
             
                    <th>TotalFare</th>
                    <th>VehicleType</th>
                  </tr>
      </thead>
      ';    
foreach($sel as $dd)
{

$giid = $dd->gi_id;
$rid = $dd->r_id;
$did =$dd->d_id;

$source = $dd->source;
$destination=$dd->destination;
$PassangerCount = $dd->passengerCount;

$totalFare = $dd->totalFare;


$seldet=DB::table('driverRegistration')->join('rideDetails','driverRegistration.d_id','=','rideDetails.d_id')->select('driverRegistration.*','rideDetails.*')->where('rideDetails.r_id','=',$rid)->get();


// $seldet =DB::table('rideDetails')->join('driverRegistration',' rideDetails.d_id','=','driverRegistration.d_id')->select('*')->where('rideDetails.r_id','=','$rid')->get();

// ("select rideDetails.totalFare as fare,driverRegistration.d_id as did,driverRegistration.vehicleType as vehicle from rideDetails inner join driverRegistration on rideDetails.d_id =driverRegistration.d_id where rideDetails.r_id = '$rid' and rideDetails.r_id ");
foreach($seldet as $del)
{

  $vehicle=$del->vehicleType;
}




echo '
<tr>
<td>'.$rid.'</td>
<td>'.$giid.'</td>
<td></td>
<td>'.$did.'</td>
<td>'.$source.'</td>
<td>'.$destination.'</td>
<td>'.$PassangerCount .'</td>
<td>'.$totalFare.'</td>
<td>'. $vehicle.'</td>

</tr>
';



}
echo '
      </table>
      </div>';
?>
@endif
<!--Agent Getins Ends -->

<!-- Agent  getins starts -->
@if(@isset($tot))
<?php
$sel =DB::table('rideDetails')->select ('*')->groupBy('gi_id')->get();
echo '

<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading"  " >

   <h3>Agent TotalGetIns</h3>
      </div>
        
  </div>


<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
            <th>AgentGetInId</th> 
            <th>TotalCount</th>
          <th>RideId</th>
               
          <th>DriverId</th>
                    <th>Source</th>
                    <th>Destination</th> 
                    <th>PassangerCount</th>
                
                    <th>TotalFare</th>
                   
                    
        </tr>
      </thead>
      ';

      
  date_default_timezone_set('Asia/Kolkata');
$daytoday = date('Y-m-d ');

foreach($sel as $tot)
{
$giid =  $tot->gi_id;
$rid = $tot->r_id;

$did =$tot->d_id;
$goid = $tot->go_id;

$source = $tot->source;
$destination=$tot->destination;
$PassangerCount = $tot->passengerCount;

$totalFare = $tot->totalFare;

$count= DB::table('rideDetails')->where('gi_id','=',$giid)->select('*')->count();


echo '
<td>'.$giid.'</td>
<td>'.$count.'</td>
<td>'.$rid.'</td>

<td>'.$did.'</td>
<td> '.$source.'</td>
<td>'.$destination.'</td>
<td>'.$PassangerCount.'</td>
<td>'.$totalFare.'</td>
</tr>';

}
echo '
      </table>
      </div>';
?>
      @endif
<!-- Agent total getins ends -->

<!-- Agent total getouts starts -->
@if(@isset($ot))
<?php
$sel =DB::table('transactionDetails')->select('*')->get();
echo '

<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

    <h3> Agent GetOuts</h3>
      </div>
        
  </div>

<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
            <th>AgentGetOutId</th> 
             <th>DriverId</th>
          <th>RideId</th>
                  
             <th>PassangerCount</th>
                     <th>TransactionId</th>
                 
                    <th>Digital</th>
                        <th>Cash</th>
                    <th>TotalFare</th>
                      <th>PaidDate</th>
                       
                   
                    
        </tr>
      </thead>
      ';

      
  date_default_timezone_set('Asia/Kolkata');
$daytoday = date('Y-m-d ');
foreach($sel as $geto)
{
$goid =$geto->go_id;
$rid = $geto->r_id;

$did =$geto->d_id;


$PassangerCount = $geto->passengerCount;
$transactionId = $geto->t_id;
$totalFare = $geto->totalFare;
$digital = $geto->digital;
$cash=$geto->cash;
$paiddate=$geto->paidDate;

echo '
<td>'.$goid.'</td>
<td>'.$did.'</td>
<td>'.$rid.'</td>

<td> '.$PassangerCount.'</td>
<td>'.$transactionId.'</td>
<td>'.$digital.'</td>
<td>'.$cash.'</td>
<td>'.$totalFare.'</td>
<td>'.$paiddate.'</td>
</tr>';

}
echo '
      </table>
      </div>';
      ?>
      @endif
<!-- Agent getouts ends -->

<!--payments of all details .js by Lakshmi -->
@if (@isset($pay))
<?php 
$sel =DB::table('paymentDetails')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();

echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

  <h3>Payments Details</h3>
      </div>
        
  </div>

  <div  class="ids">
  <table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
        <thead>
          <tr>
            
             <th>SNO</th>
  
            <th>ReceiverID</th>        
       
                      <th>PayeeID</th>
                      <th>amountPaid</th> 
                      <th>Status</th>
                 
                 
                      
                   
                  
                     
                
                      
          </tr>
        </thead>
        ';

      
foreach($sel as $spr1)
{
  
$sno = $spr1->sno;
$receiverid = $spr1->receiverId;

$payeeId = $spr1->payeeId;
$amountPaid=$spr1->amountPaid;
$paidDate = $spr1->paidDate;

echo '
<tr>



<td>'.$sno.'</td>
<td>'.$receiverid.'</td>
<td>'.$payeeId.'</td> 
<td>'.$amountPaid.'</td>

<td>'.$paidDate.'</td>




</tr>';

}
echo '
      </table>
      </div>';

?>
@endif
<!--end payments of all details .js by Lakshmi -->


<!-- Agent total getouts starts -->
      @if(@isset($tog))
<?php
$sel =DB::table('transactionDetails')->select('*')->get();
echo '
<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading">

    <h3> Agent TotalGetOuts</h3>
      </div>
        
  </div>

<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
            <th>AgentGetOutId</th> 
            <th>TotalCount</th>
             <th>DriverId</th>
          <th>RideId</th>
                  
             <th>PassangerCount</th>
                     <th>TransactionId</th>
                 <!-- <th></th> 
                    <th>RCNumber</th>
                    <th>LicenceNumber</th> 
                    <th>PollutionCheck</th>
                    <th>PollutionExp.</th> 
                    <th>Insurance</th>
                    <th>InsuranceExpirey</th> -->
                    <th>Digital</th>
                        <th>Cash</th>
                    <th>TotalFare</th>
                      <th>PaidDate</th>
                       
                   
                    
        </tr>
      </thead>
      ';

      
  date_default_timezone_set('Asia/Kolkata');
$daytoday = date('Y-m-d ');
foreach($sel as $gett)
{
$goid =$gett->go_id;
$rid = $gett->r_id;

$did =$gett->d_id;


$PassangerCount = $gett->passengerCount;
$transactionId = $gett->t_id;
$totalFare = $gett->totalFare;
$digital = $gett->digital;
$cash=$gett->cash;
$paiddate=$gett->paidDate;

$count= DB::table('rideDetails')->where('go_id','=',$goid)->select('*')->count();






echo '
<td>'.$goid.'</td>
<td>'.$count.'</td>
<td>'.$did.'</td>
<td>'.$rid.'</td>

<td> '.$PassangerCount.'</td>
<td>'.$transactionId.'</td>
<td>'.$digital.'</td>
<td>'.$cash.'</td>
<td>'.$totalFare.'</td>
<td>'.$paiddate.'</td>
</tr>';
}
echo '
      </table>
      </div>';
      ?>
      @endif
<!-- Agent total getouts ends -->

@if(@isset($got))
<?php
$sel =DB::table('transactionDetails')->groupBy('go_id')->get();
echo '<div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

    <h3> Agent TotalGetOuts</h3>
      </div>     
  </div>
<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
            <th>AgentGetOutId</th> 
            <th>TotalCount</th>
             <th>DriverId</th>
          <th>RideId</th>
                  
             <th>PassangerCount</th>
                     <th>TransactionId</th>
                 <!-- <th></th> 
                    <th>RCNumber</th>
                    <th>LicenceNumber</th> 
                    <th>PollutionCheck</th>
                    <th>PollutionExp.</th> 
                    <th>Insurance</th>
                    <th>InsuranceExpirey</th> -->
                    <th>Digital</th>
                        <th>Cash</th>
                    <th>TotalFare</th>
                      <th>PaidDate</th>
                       
                   
                    
        </tr>
      </thead>
      ';

      
  date_default_timezone_set('Asia/Kolkata');
$daytoday = date('Y-m-d ');
foreach($sel as $gtgt)
{
$goid = $gtgt->go_id;
$rid = $gtgt->r_id;

$did =$gtgt->d_id;


$PassangerCount = $gtgt->passengerCount;
$transactionId = $gtgt->t_id;
$totalFare = $gtgt->totalFare;
$digital = $gtgt->digital;
$cash=$gtgt->cash;
$paiddate=$gtgt->paidDate;

$count =DB::table('transactionDetails')->where('go_id','=','$goid')->count();
echo '
<td>'.$goid.'</td>
<td>'.$count.'</td>
<td>'.$did.'</td>
<td>'.$rid.'</td>

<td> '.$PassangerCount.'</td>
<td>'.$transactionId.'</td>
<td>'.$digital.'</td>
<td>'.$cash.'</td>
<td>'.$totalFare.'</td>
<td>'.$paiddate.'</td>





</tr>';

}
echo '
      </table>
      </div>
      </div>';
      ?>
 @endif


<!-- hardcode table begans -->
 @if (@isset($had))
<?php 
$sel =DB::table('hardCodeValues')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();

echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

  <h3>Hard code</h3>
      </div>
        
  </div>

  <div  class="ids">
  <table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
        <thead>
          <tr>
            
             <th>SNO</th>
  
            <th>Name</th>        
       
                      <th>Value</th>
                      <th>Edit</th>
                      
                 
                      
                   
                  
                     
                
                      
          </tr>
        </thead>
        ';

      
foreach($sel as $hade)
{
  
$sno = $hade->sNo;
$name = $hade->name;

$value = $hade->value;

echo '
<tr>



<td>'.$sno.'</td>
<td>'.$name.'</td>
<td>'.$value.'</td> 

<td><input type="button" class="Edithard" aid="'.$sno.'" nid="'.$name.'" vid="'.$value.'" value="Edit"></td>



</tr>';

}
echo '
      </table>
      </div>';

?>
@endif
<!-- hardcode table Ends -->

<!-- get supervisor registration starts-->
 @if (@isset($spr))
<?php 
$sel =DB::table('agentsRegistration')->select('*')->where('verified','Accepted')->where('s_id','=','0')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();

echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

  <h3> Accepted Supervisor</h3>
      </div>
        
  </div>

  <div  class="ids">
  <table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
        <thead>
          <tr>
            
             <th>SupId</th>
  
            <th>First Name</th>        
       
                      <th>Mobile</th>
                      <th>Qualification</th> 
                      <th>SmartPhone</th>
                    <th>Bike</th> 
                 
                      
                   
                    
                       <th>Document</th>
                      <th>Status</th>
                           <th>Payed</th>
                      <th>Assign</th>
                 
                      <th>Action</th>

                      
  
                     <!--
  
                        
                      <th>DocumentNumber</th>
                       <th>CreatedBy</th> 
                      <th>CreatedDate</th>
                      <th>ModifiedDate</th> 
                      <th>ModifiedBy</th> -->
                     
                
                      
          </tr>
        </thead>
        ';

      
foreach($sel as $spr)
{
  
$agentid = $spr->id;
$firstname = $spr->firstName;

$mobile = $spr->mobileNumber;
$qualification=$spr->qualification;
$SmartPhone = $spr->smartPhone;
$bike = $spr->bike;
$requestedRole = $spr->requestedRole;

$assignedRole = $spr->assignedRole;

$document = $spr->documentLocation;

$SupervisorId = $spr->s_id;
$workingstatus = $spr->workingStatus;

$createdBy = $spr->createdBy;
$createdDate = $spr->createdDate;
$modifiedDate=$spr->modifiedDate;
$modifiedBy=$spr->modifiedBy; 

$payed = DB::table('paymentDetails')->select('*')->where('receiverId',$agentid)->count();

if($payed != 0)
{
$paysel = DB::table('paymentDetails')->select(DB::raw('SUM(amountPaid) as total'))->where('receiverId',$agentid)->groupBy('receiverId')->get();

foreach ($paysel as $payed) {

$pay = $payed->total;

}
 
 } 
 else
 {
  $pay = 0;
 }
//$driverid = $rid->d_id;
//$NoOfRides = $rid->r_id;


echo '
<tr>

<td ><a href="#" class="Payment" id='.$agentid.'>'.$agentid.'</a></td>
<td ><a href="#" class="ids10" id='.$agentid.'>'.$firstname.'</a></td>
<td>'.$mobile.'</td>
<td> '.$qualification.'</a></td>
<td>'.$SmartPhone.'</td>
<td>'.$bike.'</td>';

if($document == '')
{
  echo '
  <td>--</td>';
}
else{
  echo '
<td><a   href="'.$document.'" download='.$firstname.'>Doc</a></td>';
}
echo '
<td>'.$workingstatus.'</td>
<!--


<td>'.$createdBy.'</td>
<td>'.$createdDate.'</td>
<td>'.$modifiedDate.'</td> -->
<td>'.$pay.'</td>
<td><input type="button" class="AssignAgnt" aid="'.$agentid.'"  value="AssignAgnt"></td> 

<td><input type="button" class="superActive" aid="'.$agentid.'"  value="Active">&nbsp;<input type="button" class="superInActive" rid="'.$agentid.'"" value="Inactive"></td>





</tr>';

}
echo '
      </table>
      </div>';

?>
@endif
<!-- get supervisor registration ends-->

<!--Routes  starts here -->
       @if (@isset($rts))
<?php
$sel =DB::table('locationDetails')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();
echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
      <h3>Routes</h3>
        
<div class="heading"  style="background-color:orange;width:15%; color:ash;font-size:15px;float:right;" >
   <a href="#" id="AddRoutes"> Add Routes</a>
      </div> 
  </div>
  <div>
  </div>
  <br><p></p>

  <div  class="ids">
  <table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
        <thead>
          <tr>
            
            <th>Source</th>
  
            <th>Destination</th> 
            <th>Coupon</th> 
            <th>Discount</th>        
            <th>AutoLatestCost</th>
                      <th>AutoOldCost</th>
                      <th>CarLatestCost</th> 
                      <th>CarOldCost</th>
                    <th>EstimatedTime</th> 
      
                       <th>status</th>
                        <th>Edit</th>
                        <th>Action</th>
          </tr>
          </thead>
        ';     
foreach($sel as $rts)
{
  $id = $rts->id;
  $Source = $rts->source;
  $Destination = $rts->destination;
   $coupon = $rts->cashCouponCode;
    $discount = $rts->amount;
  
  $AutoLatestCost =$rts->autoLatestCost;
  $AutoOldCost = $rts->autoOldCost;
  $CarLatestCost = $rts->cabLatestCost;
  $CarOldCost = $rts->cabOldCost;
  $EstimatedTime = $rts->estimatedTime;
  //$CreatedBy=$fet["createdBy"];
  $CreatedDate = $rts->createdDate;
  //$ModefiedBy = $fet["modifiedBy"];
  $ModefiedDate = $rts->modifiedDate;
  $status=$rts->status;

//$driverid = $rid->d_id;
//$NoOfRides = $rid->r_id;

echo '
<tr>
<td>'.$Source.'</td>
<td>'.$Destination.'</td>
<td>'.$coupon.'</td>
<td>'.$discount.'</td>
<td>'.$AutoLatestCost.'</td>

<td> '.$AutoOldCost.'</td>
<td>'.$CarLatestCost.'</td>
<td>'.$CarOldCost.'</td>
<td>'.$EstimatedTime.'</td>


<td>'.$status.'</td>
<td><input type="button" class="Edit" aid="'.$Source.'"  AutoLatestCost="'.$AutoLatestCost.'" did="'.$Destination.'" cid="'.$id.'"  AutoOldCost="'.$AutoOldCost.'" CarLatestCost="'.$CarLatestCost.'" CarOldCost="'.$CarOldCost.'"   value="Edit"></td>
<td><input type="button" class="Active" aid="'.$Source.'" did="'.$Destination.'" cid="'.$CreatedDate.'" value="Active">&nbsp;<input type="button" class="InActive" rid="'.$Source.'" did="'.$Destination.'" cid="'.$CreatedDate.'" value="Inactive"></td>






</tr>';

}
echo '
      </table>
      </div>';

?>
@endif
<!--Routes  ends here -->
<!--Routes  ends here -->

<!-- Referral starts here -->
@if (@isset($rfl))
<?php
$sel =DB::table('usersLogin')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();
echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
      <h3>Referral Ids</h3>
        

        
  </div>
  <div>

  </div>
  <br><p></p>

  <div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
          
          <th>Ids</th>

          <th>Name</th>        
          <th>Referral Ids</th>
                  
         
        </tr>
        </thead>
  
      ';

foreach($sel as $rfl)
{
 

  $id =  $rfl->id;
$Name = $rfl->userName;
$referralCode =$rfl->referralCode;

echo '
<tr>
<td>'.$id.'</td>
<td>'.$Name.'</td>
<td>'.$referralCode.'</td>


</tr>';

}
echo '
      </table>
      </div>';

?>
@endif
<!-- Referral  ends here -->


<!-- get declined supervisors -->
@if (@isset($sha))
<?php
$sel =DB::table('agentsRegistration')->select('*')->where('verified','Rejected')->where('s_id','!=','0')->get();


//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();
echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
  <div class="cont">
    
<div class="heading" >

<h3> Rejected Supervisor <h3>
  </div>
    
</div>

<div  class="ids">
<table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
      <thead>
        <tr>
           <th>SupervisorId</th>
          

          <th>First Name</th>        
          <th>LastName</th>
                    <th>Mobile</th>
                    <th>Qualification</th> 
                    <th>SmartPhone</th>
                  <th>Bike</th> 
                
                    
                 <th>DocumentType</th>
                    <th>Document</th>
                   
                   
              

                   <!--

                      <th>DocumentType</th>
                    <th>DocumentNumber</th>
                     <th>CreatedBy</th> 
                    <th>CreatedDate</th>
                    <th>ModifiedDate</th> 
                    <th>ModifiedBy</th> -->
                   
              
                    
        </tr>
      </thead>
      ';

      
foreach($sel as $sha)
{
  $agentid = $sha->id;
$firstname = $sha->firstName;
$lastname =$sha->lastName;
$mobile =$sha->mobileNumber;
$qualification=$sha->qualification;
$SmartPhone = $sha->smartPhone;
$bike = $sha->bike;
$requestedRole = $sha->requestedRole;

$assignedRole = $sha->assignedRole;
$documentType=$sha->documentType;
$document = $sha->documentLocation;
$SupervisorId = $sha->s_id;
$workingstatus = $sha->workingStatus;

$createdBy = $sha->createdBy;
$createdDate = $sha->createdDate;
$modifiedDate=$sha->modifiedDate;
$modifiedBy=$sha->modifiedBy; 

//$driverid = $rid->d_id;
//$NoOfRides = $rid->r_id;

echo'
<tr>
<td><a href="#" class="ids5" id='.$agentid.'>'.$agentid.'</a></td>

<td>'.$firstname.'</td>
<td>'.$lastname.'</td>
<td>'.$mobile.'</td>
<td> '.$qualification.'</a></td>
<td>'.$SmartPhone.'</td>
<td>'.$bike.'</td>
<td>'.$documentType.'</td>';

if($document == '')
{
echo '<td>--</td>';
}
else
{
echo '
<td>'.$document.'</td>';

}

echo '</tr>';

}
echo '
      </table>
      </div>';
?>
@endif
<!-- get declined supervisors ends-->

<!-- cadcoins  starts -->
@if (@isset($ksd))
<?php

$sel =DB::table('cadcoins')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();
echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

   <h3>cadCoins</h3>
      </div>
        
  </div>

  <div  class="ids">
  <table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
        <thead>
          <tr>
                 <th>rid</th> 
            <th>GetInId</th>
                 <th>Gincoins</th>
            <th>GetoutId</th>
                 <th>Goutcoins</th>
                 <th>DId</th>
                 <th>Dcoins</th>
                 <th>Sid</th>
                 <th>Scoins</th>
                 <th>Pid</th>
                 <th>Pcoins</th>
                      
                      
                     
                      
          </tr>
        </thead>
        ';
  

foreach($sel as $ksd)
{
 $rid=$ksd->rid;
$getinid=$ksd->getinid;
$getincadcoins = $ksd->gincoins;
$getoutid=$ksd->getoutid;
$getoutcadcoins = $ksd->goutcoins;
$did =$ksd->did;
$drivercadcoins  = $ksd->drcoins;
$sid= $ksd->sid;
$SupervisorCadcoins = $ksd->scoins;
$pid= $ksd->pid;
$pcoins = $ksd->pcoins;

echo '
<td>'.$rid.'</td>
<td>'.$getinid.'</td>
<td>'.$getincadcoins.'</td>
<td>'.$getoutid.'</td>
<td>'.$getoutcadcoins.'</td>
<td>'.$sid.'</td>
<td>'.$SupervisorCadcoins.'</td>
<td>'.$drivercadcoins.'</td>
<td>'.$SupervisorCadcoins.'</td>
<td>'.$pid.'</td>
<td>'.$pcoins.'</td>

</tr>';



}
echo '
      </table>
      </div>';

?>
@endif
<!-- cadcoins ends -->


<!-- Passanger Feedback starts -->
@if (@isset($psg))
<?php
$sel =DB::table('passengerDetails')->join('passengerFeedback','passengerDetails.id','=','passengerFeedback.id')->select('*')->get();


//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();
echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

   <h3>Passenger</h3>
      </div>
        
  </div>

  <div  class="ids">
  <table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
        <thead>
          <tr>
              <th>Name</th> 
            <th>Number</th>
            <th>Email</th>
            <th>DriverId</th> 
            <th>RideId</th> 
            <th>Performance</th>
            <th>Review</th>            
          </tr>
        </thead>
        ';
  

foreach($sel as $psg)
{
 

  $name = $psg->name;
$number =$psg->number;
$email=$psg->email;
$DriverId=$psg->driverid;
$rideid=$psg->rideId;
$Performance=$psg->performance;
$review=$psg->review;

echo '
<td>'.$name.'</td>

<td>'.$number.'</td>
<td>'.$email.'</td>
<td>'.$DriverId.'</td>
<td>'.$rideid.'</td>
<td>'.$Performance.'</td>
<td>'.$review.'</td>
</tr>';



}
echo '
      </table>
      </div>';

?>
@endif
<!-- Passanger Feedback  starts -->


<!-- Passanger count starts -->
@if (@isset($pnt))
<?php
$sel =DB::table('passengerDetails')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();
echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

   <h3>Passenger</h3>
      </div>
        
  </div>

  <div  class="ids">
  <table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
        <thead>
          <tr>
              <th>Name</th> 
            <th>Number</th>
            <th>Email</th>
                   
          </tr>
        </thead>
        ';
  

foreach($sel as $psg)
{
 

  $name = $psg->name;
$number =$psg->number;
$email=$psg->email;


echo '
<td>'.$name.'</td>

<td>'.$number.'</td>
<td>'.$email.'</td>

</tr>';
}
echo '
      </table>
      </div>';
?>
@endif
<!-- Passanger count ends -->

<!-- Passanger request .js starts -->
@if (@isset($rpa))
<?php
$sel =DB::table('passengerRequest')->select('*')->get();
//$sel=DB::table('driverfeedback')->join('ridedetails','driverfeedback.r_id','=','ridedetails.r_id')->select('driverfeedback.','ridedetails.')->get();
echo '
<br>
  <br>
  <div class="driver-content" id="mainfun" >
      <div class="cont">
        
<div class="heading" >

   <h3>Passenger</h3>
      </div>
        
  </div>

  <div  class="ids">
  <table id="extable" class="table table-striped table-bordered" style="width:100%;text-align:center;">
        <thead>
          <tr>
              <th>Rideid</th> 
            <th>GiId</th>
            <th>PassengerName</th>
            <th>Mobile</th> 
            <th>Source</th>
            <th>Destination</th>
            <th>Vehicle</th> 
            <th>Seats</th>
            <th>Fare</th>
            <th>Status</th> 
            <th>D_id</th>       
          </tr>
        </thead>
        ';
  

foreach($sel as $psg)
{
 

  $rideid = $psg->ride_id;
$giid =$psg->gi_id;
$name=$psg->passengerName;
$mobile=$psg->mobileNumber;
$source = $psg->source;
$destination=$psg->destination;
$vehicletype=$psg->vehicleType;
$seats=$psg->seats;
$fare=$psg->fare;
$status=$psg->status_ride;
$did=$psg->d_id;

if($status == 0)
{

  $sts = "Request";
}
elseif($status == 1)
{
$sts = "Accept";
}
elseif($status == 2)
{
$sts = "Riding";
}
elseif($status == 3)
{
$sts = "Reject";
}
elseif($status == 4)
{
$sts = "cancel";
}
elseif($status == 5)
{
$sts = "Ride Complete";
}
elseif($status == 6)
{
$sts = "Agent Cancel";
}

echo '
<td>'.$rideid.'</td>

<td>'.$giid.'</td>
<td>'.$name.'</td>
<td>'.$mobile.'</td>
<td>'.$source.'</td>
<td>'.$destination.'</td>
<td>'.$vehicletype.'</td>
<td>'.$seats.'</td>
<td>'.$fare.'</td>


<td>'.$sts.'</td>
<td>'.$did.'</td>

</tr>';



}
echo '
      </table>
      </div>';

?>
@endif
<!-- Passanger request .js ends -->


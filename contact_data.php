<?php

@session_start();

if(isset($_GET['logout'])){

session_unset();
session_destroy(); 
?>
<script>  window.location = "https://www.mindforceresearch.com/contact_login.php";  </script>

<?php

}




if($_SESSION["id"]=="" && $_SESSION["uname"]==""){
?>
<script>  window.location = "https://www.mindforceresearch.com/contact_login.php";  </script>

<?php
}



include("include/db.php");

$dbc= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

  
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="CodeHim">
<style>
.wrappable {
    white-space: normal;
}      
</style>

<!-- jQuery -->
  <script type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.js"></script> 
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" href= "https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> 
<link rel="stylesheet" href= "https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css"> 

<link rel="stylesheet" href= "https://cdn.datatables.net/buttons/3.1.1/css/buttons.dataTables.css"> 

  
  <!-- DataTables JS -->


<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script> 
<script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script> 
<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script> 

<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script> 




   
</head>
   <body>
      <header class="cd__intro">
         <h1> All Contact DATA <style="color: green;"><?php if($_SESSION["id"]<>"" && $_SESSION["uname"]<>""){echo ucfirst($_SESSION["uname"]);}?></style>&nbsp; <a href="https://www.mindforceresearch.com/contact_data.php?logout">Logout</a></h1>
               </header>
      <main class="cd__main">
         <table id="tableID" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
		<th>Message</th>
		<th>Date/Time</th>
            </tr>
        </thead>
        <tbody>

<?php
    $q = "SELECT count(*) as `numrows` FROM `contactdata` ORDER BY `id` ASC";
    $c = mysqli_query($dbc,$q);
    if($c) {
        if($t = mysqli_fetch_assoc($c)) {
            $numrows = $t['numrows'];

	    if($numrows>500) {
		$delrows = $numrows - 500;
 		$delq = "delete FROM `contactdata` ORDER BY `datetime` ASC limit ".$delrows;
    		$delc = mysqli_query($dbc,$delq);

	    }	

        }
    }

   // $numrows = 0;
    $rowsperpage = 5;
    $currpage = isset($_REQUEST['currpageno']) && $_REQUEST['currpageno'] != 0 ? $_REQUEST['currpageno'] : 1;
    $numpages = ceil($numrows / $rowsperpage);
    $startrow = ($currpage - 1) * $rowsperpage;
    if($startrow > $numrows) {
        $startrow = $numrows - $rowsperpage;
    }
    if($startrow < 0) {
        $startrow = 0;
    }


    $q = "SELECT * FROM `contactdata` ORDER BY `id` ASC";
    $r = mysqli_query($dbc,$q);

    while($userlist = mysqli_fetch_assoc($r)){ 
?>

            <tr>
                <td style="width:10%"><?php echo $userlist['firstname']; ?></td>
                <td><?php echo $userlist['lastname']; ?></td>
                <td><?php echo $userlist['company']; ?></td>
                <td ><?php echo $userlist['email']; ?></td>
                <td><?php echo $userlist['phone']; ?></td>
		<td><?php echo $userlist['subject']; ?></td>
		<td><?php echo $userlist['message']; ?></td>
		<td><?php echo $userlist['datetime']; ?></td>

            </tr>
<?php } ?>
        </tbody>
    </table>


<script>

new DataTable('#tableID', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});


</script>

      </main>
   </body>
</html>
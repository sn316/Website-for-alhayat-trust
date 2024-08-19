<?php 
include "incl/head.php";
include "incl/class.php";
$sql="SELECT * FROM Donner WHERE is_request=1";
$id='';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sqll="UPDATE Donner SET is_request=0 WHERE id={$id}";
    try {
        mysqli_query($con,$sqll);
    } catch (\Throwable $th) {
        //throw $th;
    }
}
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Donners request</h2>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">

  
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Image<?php echo $id;  ?></th>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Father Name</th>
                    <th>Contact</th>
                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                    <th>Profission</th>
                    <th>Donation Type</th>
                    <th>Donation Amount</th>
                    <th>Address</th>
                    <th>checked</th>
                  </tr>
                </thead>
                <tbody>
                <?php
try {
  $re=mysqli_query($con,$sql);
  if(mysqli_num_rows($re)>0){
    while($record=mysqli_fetch_assoc($re)){
    ?>
                  <tr>
                  <td>
              <img src="images\donner\<?php echo $record['Image']; ?>" class="img-fluid" alt="">
            </td>
                  <td><?php echo $record['DonnerName']; ?></td>
                  <td><?php echo $record['FatherName']; ?></td>
                  <td><?php echo $record['Contact']; ?></td>
                  <td><?php echo $record['Occupation']; ?></td>
                  <td><?php echo $record['Donation_Type']; ?></td>
                  <td><?php echo $record['Donation_ammount']; ?></td>
                  <td><?php echo $record['Donation_Address']; ?></td>
                  <form action="" method="post">
                  <td><a class="btn btn-danger" href="?id=<?php echo $record['id']; ?>">Ok</a></td>
                  </form>
                  </tr>
                  <?php
                  }
                } else
                {

  ?>
  
  
  <tr>
    <td colspan="9"><font color="green" size="5"><center>No Record Found</center></font></td>
  </tr>
  
  <?php
}
} catch (\Throwable $th) {
  //throw $th;
}
?>
 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->


  </div>
</section>

</main><!-- End #main -->

<?php 
include "incl/foot.php";
?>
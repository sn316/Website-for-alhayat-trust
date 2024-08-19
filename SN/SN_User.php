<?php
include "incl/head.php";
include "incl/class.php";
$sql="SELECT * FROM Donner";
?>
  <main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Admin Users</h2>
    <a class="btn btn-info" href="add_donner.php">Add User</a>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Image</th>
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
                    <th>Status</th>
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
                  <td><?php echo $record['Image']; ?></td>
                  <td><?php echo $record['DonnerName']; ?></td>
                  <td><?php echo $record['FatherName']; ?></td>
                  <td><?php echo $record['Contact']; ?></td>
                  <td><?php echo $record['Occupation']; ?></td>
                  <td><?php echo $record['Donation_Type']; ?></td>
                  <td><?php echo $record['Donation_ammount']; ?></td>
                  <td><?php echo $record['Donation_Address']; ?></td>
                  <td><?php
                  if($record['is_active']==1){
                    echo "Active";
                  }else{
                    echo "Not Active";
                  } ?></td>
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

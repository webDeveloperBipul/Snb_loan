<?php
include('action/sql_config.php');

session_start();




if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    $password = $_SESSION["password"];
    
}else {
    echo "not working";
       
    header('location: index.php');
}

// Start the session

if (isset($name)) {

  include('part/header.php');

   ?>

<!-- ==================================================== -->



          <!-- Begin Page Content -->
          <div class="container-fluid">
          
            <!-- Page Heading -->
            <div class="d-flex align-items-center mb-4">
            <h4 class="mb-0">মূলপাতা</h4>
            
              <a href="comity.php" class="d-none ml-auto mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">কমিটি</a>
              <a href="running_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">বর্তমান সদস্য</a>
              <a href="add_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">সদস্য যোগ করুন</a>
            </div>
          
          

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">মোট ঋণ প্রদান</div>
                      <div class="h5 mb-0 bangla font-weight-bold text-gray-800">

                      <?php
                      $sql = "SELECT sum(loan_amount) AS `total` FROM `all_member_form_data` ";
                      
                      $result = mysqli_query($conn, $sql);
                      $data = mysqli_fetch_array($result);
                      $pay_amount = $data['total'];

                      if($pay_amount > 0){
                        echo "৳"." ".$pay_amount;
                      }
                      else{
                        echo "৳ 0";
                      }
                    
                      ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">মোট আদায়কৃত কিস্তি</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">


                        <?php
                          $sql = "SELECT sum(joma + savings) AS `total` FROM `member_premier_data` ";
                          
                          $result = mysqli_query($conn, $sql);
                          $data = mysqli_fetch_array($result);
                          $premier = $data['total'];

                          if($premier > 0){
                            echo "৳"." ".$premier;
                          }
                          else{
                            echo "৳ 0";
                          }
                        
                          ?> টাকা

                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">মোট অনাদায়কৃত কিস্তি</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(total_amount) AS `total` FROM `all_member_form_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $total_amount = $data['total'];
                        $unpaid = $total_amount - $premier;

                        if($unpaid > 0){
                          echo "৳"." ".$unpaid;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                                                <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">মোট আদায়কৃত মুনাফা</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(savings) AS `total` FROM `member_premier_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $savings = $data['total'];

                        if($savings > 0){
                          echo "৳"." ".$savings;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


                                  <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">অনাদায়কৃত মোট মুনাফা</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(profit_amount) AS `total` FROM `all_member_form_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $loan_amount = $data['total'];

                        $unpaid_save = $loan_amount - $savings;

                        if($unpaid_save > 0){
                          echo "৳"." ".$unpaid_save;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>




                                                         <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">সম্ভাব্য মোট মুনাফা</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                            <?php
                        $sql = "SELECT sum(profit_amount) AS `total` FROM `all_member_form_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $loan_amount = $data['total'];

                        if($loan_amount > 0){
                          echo "৳"." ".$loan_amount;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
              
              
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">মোট অন্যান্য ফি আদায়</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">


          <?php
            $sql = "SELECT sum(add_cost+others_cost) AS `total` FROM `all_member_form_data` ";
            
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            $others_cost = $data['total'];

            if($others_cost > 0){
              echo "৳"." ".$others_cost;
            }
            else{
              echo "৳ 0";
            }
          
            ?> টাকা

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

    

  
           <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1"> কমিটির মোট সঞ্চয়</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(savings+others_fee) AS `total` FROM `comity_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $savings = $data['total'];

                        if($savings > 0){
                          echo "৳"." ".$savings;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-dark shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">সদস্যের মোট সঞ্চয় </div>
          <div class="h5 mb-0 bangla font-weight-bold text-gray-800">

          <?php
            $sql = "SELECT sum(savings) AS `total` FROM `member_premier_data` ";
            
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            $savings = $data['total'];

            if($savings > 0){
              echo "৳"." ".$savings;
            }
            else{
              echo "৳ 0";
            }
          
            ?> টাকা

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

     
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-info text-uppercase mb-1">বর্তমান ব্যালেন্স</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                    
                      <?php
                        $sql = "SELECT sum(savings+others_fee) AS `total` FROM `comity_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $total_amount = $data['total'];

                        $balence = $total_amount - $pay_amount;
                        $total = $premier + $balence + $others_cost;
                        
                        
                        if($total <= 0){
                          echo "<span class='text-danger'>৳"." ".$total. " </span>";
                        }
                        else{
                          echo "<span class='text-primary'>৳"." ".$total. " </span>";
                        }
                        ?>

                      টাকা
                      

                      </div>
                    </div>



                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          

          



<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

        
          <?php
            $sql = "SELECT sum(total_amount) AS `total` FROM `all_member_form_data` ";
            
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            $total_amount = $data['total'];

            echo "৳"." ".$total_amount;

            ?> টাকা

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>




    


          </div>

          



          
          <!-- /Content Row -->



           <!-- Content Row -->
  <div class="row">







<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-sm font-weight-bold text-info text-uppercase mb-1">বর্তমান সদস্য সংখ্যা</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php
              $sql = "SELECT * FROM all_member_form_data ORDER BY id";
              if ($result = mysqli_query($conn, $sql)) {
                  // Return the number of rows in result set
                  $rowcount = mysqli_num_rows($result);
                  echo "<span>" .$rowcount . "</span>";
                  // Free result set
                  mysqli_free_result($result);
              }

              ?> জন

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-sm font-weight-bold text-info text-uppercase mb-1">কমিটির সদস্য সংখ্যা</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php
              $sql = "SELECT * FROM comity ORDER BY id";
              if ($result = mysqli_query($conn, $sql)) {
                  // Return the number of rows in result set
                  $rowcount = mysqli_num_rows($result);
                  echo "<span>" .$rowcount . "</span>";
                  // Free result set
                  mysqli_free_result($result);
              }

              ?> জন

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>






<!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Primary
                      <div class="text-white-50 small">#4e73df</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Success
                      <div class="text-white-50 small">#1cc88a</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Info
                      <div class="text-white-50 small">#36b9cc</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      Warning
                      <div class="text-white-50 small">#f6c23e</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Danger
                      <div class="text-white-50 small">#e74a3b</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Secondary
                      <div class="text-white-50 small">#858796</div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php
          ">Logout</a>
        </div>
      </div>
    </div>
  </div>


<!-- ==================================================== -->

<?php

include('part/footer.php');

}

?>

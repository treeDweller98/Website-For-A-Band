
    <div class="container">
        <div class="row">
          <div class="col">
            <div class="text-center">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Profile</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ticket History</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Merch Order History</button>
              </li>
            </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card m-5  " style=" box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.19);">
               
                  <h5 class="card-header p-3"  style="background-color:#a2b9bc">My Account</h5>
                 
                  <div class="card-body bg-black">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                      <div class="row ">
                        <h6>USER INFORMATION</h6>
                        <div class="col-lg-6 p-4">
                          <form>
                            <b class="m-2">Username:</b>
                            <input class="form-control  m-2" name="username" value= <?php echo $_SESSION["id"] ?> readonly>
                            <b class="m-2">First Name:</b>
                            <input class="form-control m-2" name="username" value=<?php echo $fname ?> readonly>
                            
                            
                          </form>
                        </div>
                        <div class="col-lg-6 p-4">
                          <form>
                            <b class="m-2">Email Address:</b>
                            <input class="form-control m-2" name="username" value=<?php echo $email ?> readonly>
                            <b class="m-2">Last Name:</b>
                            <input class="form-control m-2" name="username" value=<?php echo $lname ?> readonly>
                          </form>
                        </div>
                        <hr class="mt-3">  
                      </div>
                      <div class="row">
                        <h6>CONTACT INFORMATION</h6>
                        <div class="col-lg-12 px-4 pt-4">
                            <form>
                                <b class="m-4">Address:</b>
                                <input class="form-control mx-3 mt-2" name="username" value=<?php echo $address ?> readonly>
                                <div class="row mt-4">
                                  <div class="col-4">
                                    <b class="m-4">Phone:</b>
                                    <input class="form-control  mx-3 mt-2" name="username" value=<?php echo $phone ?> readonly>
                                  </div>
                                  <div class="col-4">
                                    <b class="m-4">Zip-Code:</b>
                                    <input class="form-control  mx-3 mt-2" name="username" value=<?php echo $zipCode ?> readonly>
                                  
                                  </div>
                                  <div class="col-4">
                                    <b class="m-4">Country:</b>
                                    <input class="form-control mx-3 mt-2" name="username" value=<?php echo $country ?> readonly>
                                      
                                  </div>
                                </div> 
                            </form>
                        </div>
                      </div>
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="table-responsive min-vh-100">
                  <table class="table table-striped table-dark table-hover">
                      <thead>
                          <tr style="text-align:center;">
                              <th scope="col">Ticket ID</th>
                              <th scope="col">TIERS</th>
                              <th scope="col">Concert Name</th>
                              <th scope="col">Concert Schedule</th>
                              <th scope="col">Price</th>
                              <th scope="col">Purchased Date</th>
                          </tr>
                      </thead>
                      <tbody class="text-center" >
                       
                        <?php 
                          $count = 0;
                          while($rows2 = $ticketResult->fetch_assoc()){
                            
                          
                        ?>
                          <tr>
                            <td><?php echo $rows2['idTicket']; ?></td> 
                            <td><?php echo $rows2['tierName']; ?> </td>
                            <td><?php echo $rows2['name']; ?></td>
                            <td><?php echo $rows2['schedule'];?> </td>
                            <td><?php echo $rows2['price']; ?></td>
                            <td><?php echo $rows2['buyDate']; ?> </td>
                          </tr>
                          <?php 
                              $count = $count +1  ; 
                            }
                          ?>

                      </tbody>
                      <?php 
                      if($count == 0){
                              echo <<<HTML
                                <div class="alert alert-warning" role="alert">
                                  No Bookings have been done so far!
                                </div>
                                HTML;
                            }
                      ?>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                  <?php 
                    $counter = 0;
                    while($rows = $merchResult->fetch_assoc()){
                  ?>
                  <div class="accordion-item m-4 ">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <div>
                          <h4> Invoice: <?php echo $rows['idOrder']; ?> </h4>
                          <p>
                          Date: <?php echo $rows['orderTime']; ?>
                          </p>
                        </div>  
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                      <div class="accordion-body" >
                        
                        <table class="ticket mt-3 ">
                          <thead>
                            <tr>
                              <th><span >Item</span></th>
                              <th><span>Merch Name</span></th>
                              <th><span>Quantity</span></th>
                              <th><span >Price</span></th>
                              <th><span >Status</span></th>
                            </tr>
                          </thead>
                          <tbody >
                            <tr > 
                              <td><span><img src=<?php echo $rows['imageUrl'] ; ?> style="width:10%; height:10%"></span></td>
                              <td><span><?php echo $rows['name']; ?> </span></td>
                              <td><span ><?php echo $rows['quantity']; ?></span></td>
                              <td><span>BDT</span><span> <?php echo $rows['price']; ?></span></td>
                              <td><span > <?php echo $rows['paidStatus']; ?></span></td>
                            </tr>
                          </tbody>
                        </table>
                       
                        <table  class="ticket mt-5" style="width:30%">
                          <div class="text-center">
                            <tr>
                              <th><span >Total</span></th>
                              <td><span>$</span><span><?php echo $rows['quantity']*$rows['price']; ?></span></td>
                            </tr>
                          
                              <tr>
                                <th><span >Paid By</span></th>
                                <td><span><?php $rows['paymentMethod'] ?></span></td>
                              </tr>
                           
                          </div>
                        </table>
                   
                      </div>
                    </div>
                  </div> 
                  <?php
                     $counter = $counter + 1;
                    }
                   
                      if($counter == 0){
                        echo <<<HTML
                              <div class="alert alert-warning" role="alert">
                                <h5>You did not buy any merches yets! Hurry Up and Grab Now.</h5>
                                <h6>To purchase click on the link below:</h6>
                                <button type="button" class="btn btn-primary">Click here.</button>
                              </div>
                        HTML;
                      }
                  ?>

              </div>
             
            </div>
        </div>
    </div>

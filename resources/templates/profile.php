<main>
    <div class="container">
        <div class="row">
          <div class="col">
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
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card m-5" style=" box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.19);">
                  <h5 class="card-header p-3">My Account</h5>
                 
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                      <div class="row ">
                        <h6>USER INFORMATION</h6>
                        <div class="col-lg-6 p-4">
                          <form>
                            <b class="m-2">Username:</b>
                            <input class="form-control  m-2" name="username" value="{username}" required>
                            <b class="m-2">First Name:</b>
                            <input class="form-control m-2" name="username" value="{username}" required>
                            
                            
                          </form>
                        </div>
                        <div class="col-lg-6 p-4">
                          <form>
                            <b class="m-2">Email Address:</b>
                            <input class="form-control m-2" name="username" value="{username}" required>
                            <b class="m-2">Last Name:</b>
                            <input class="form-control m-2" name="username" value="{username}" required>
                          </form>
                        </div>
                        <hr class="mt-3">  
                      </div>
                      <div class="row">
                        <h6>CONTACT INFORMATION</h6>
                        <div class="col-lg-12 px-4 pt-4">
                            <form>
                                <b class="m-4">Address:</b>
                                <input class="form-control mx-3 mt-2" name="username" value="{username}" required>
                                <span class="d-flex m-5">
                                    <b class="m-4">Address:</b>
                                    <input class="form-control " name="username" value="{username}" required>
                                    <b class="m-4">Address:</b>
                                    <input class="form-control " name="username" value="{username}" required>
                                </span>
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
                      <tbody  >
                        <tr style="text-align:center">
                          
                          <td>
                             here
                          </td>
                          <td>Here</td>
                          <td>Here</td>
                          <td>Here</td>
                          <td>Here</td>
                          <td>Here</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <div>
                          <h4> Invoice # 101138</h4>
                          <p>
                          Date: January 1, 2012
                          </p>
                        </div>  
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                      <div class="accordion-body">
                        
                        <table class="ticket mt-3">
                          <thead>
                            <tr>
                              <th><span >Item</span></th>
                              <th><span>Something</span></th>
                              <th><span >Status</span></th>
                              <th><span>Quantity</span></th>
                              <th><span >Price</span></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><span>Experience Review</span></td>
                              <td><span >$</span><span>150.00</span></td>
                              <td><span >4</span></td>
                              <td><span data-prefix>$</span><span>600.00</span></td>
                            </tr>
                          </tbody>
                        </table>
                        <table  class="ticket" style="width:30%">
                          <div class="text-center">
                            <tr>
                              <th><span >Total</span></th>
                              <td><span>$</span><span>600.00</span></td>
                            </tr>
                            <tr>
                              <th><span >Amount Paid</span></th>
                              <td><span>$</span><span>600.00</span></td>
                            </tr>
                          </div>
                        </table>
                      </div>
                    </div>
                  </div> 
              </div>
            </div>
        </div>
    </div>
    
</main>
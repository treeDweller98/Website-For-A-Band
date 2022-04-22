<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand justify-content-center" href="#">Menu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Nav tabs -->
        <ul class="nav nav-pills" id="myTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="merch-tab" data-bs-toggle="tab" data-bs-target="#merch" type="button" role="tab" aria-controls="merch" aria-selected="true">
              Merch
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="concert-tab" data-bs-toggle="tab" data-bs-target="#concert" type="button" role="tab" aria-controls="concert" aria-selected="false">
              Concerts
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="false">
              Users
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>



<div class="tab-content">
    <div class="tab-pane active" id="merch" role="tabpanel" aria-labelledby="merch-tab">
        <?php renderLayoutWithContentFile("admin-view-merch.php", $variables); ?>
    </div>
    <div class="tab-pane active" id="concert" role="tabpanel" aria-labelledby="concert-tab">
        <?php renderLayoutWithContentFile("admin-view-concert.php", $variables); ?>
    </div>

    <div class="tab-pane active" id="user" role="tabpanel" aria-labelledby="user-tab">
        <?php renderLayoutWithContentFile("admin-view-user.php", $variables); ?>
    </div>
</div>

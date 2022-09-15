<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container">
  <a class="navbar-brand" href="index.php"><img src="purnim_logo.png" class="img-fluid"> Purnim Realty</img></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="propertyforsalesearch.php">Buy</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="listyourproperties.php">Sell</a>
        </li>


        <li class="nav-item">
        <a class="nav-link"  href="adminmanageproperties.php">
        Manage Properties</a>
        </li>

        <li class="nav-item">
        <a class="nav-link"  href="adminmessages.php">
        Messages</a>
        </li>

        <li class="nav-item">
        <a class="nav-link"  href="adminaccount.php">
        <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
        </li>

        <li class="nav-item">
        <a class="nav-link"  href="logout.php" style="text-decoration:none;">Log Out</a>
        </li>

        <li class="nav-item">
        <a class="nav-link"  href="https://www.facebook.com/profile.php?id=100082189214495" style="text-decoration:none;">&nbsp;&nbsp;<img src="facebook_icon.jpeg" style="width:30px;height:30px;"> </a>
        </li>

        <li class="nav-item">
        <a class="nav-link"  href="mailto:contactus@purnimonline.com" style="text-decoration:none;"> &nbsp;&nbsp; <img src="email_icon.png" style="width:30px;height:30px;"></a>
        </li>

      </ul>
    </div>
  </div>
</nav>
</div>

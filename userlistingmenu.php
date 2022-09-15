<nav class="navbar navbar-expand-sm bg-lignth navbar-light">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="purnim_logo.png" class="img-fluid"></img> Purnim Realty </a>
    <a class="nav-link" href="searchresultbuyview.php?databasecol=selltype&filterby=sale">Buy</a>
    <a class="nav-link" href="searchresultrentview.php?databasecol=selltype&filterby=rent">Rent</a>
    <a class="nav-link" href="listyourpropertiesform.php">Sell</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">

        <li class="nav-item">
        <a class="nav-link"  href="useraccuont.php">
        <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
        </li>

        <li class="nav-item">
        <a class="nav-link"  href="logout.php" style="text-decoration:none;">Log Out</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="homeloan.php">Home Loan</a>
        </li>


        <li class="nav-item">
        <a class="nav-link"  href="https://www.facebook.com/profile.php?id=100082189214495" style="text-decoration:none;">&nbsp;&nbsp;<img src="facebook_icon.jpeg" style="width:30px;height:30px;"> </a>
        </li>

        <li class="nav-item">
          <!--<a class="nav-link" href="https://stom20211.github.io/online-store/">Onlie Store</a> -->
        </li>
      </ul>
    </form>
    </div>
  </div>
</nav>

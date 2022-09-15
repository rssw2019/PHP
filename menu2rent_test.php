<nav class="navbar navbar-expand-sm bg-lignth navbar-light">
  <div class="container">

    <form method="POST" action ="searchbuybycity.php">
        <button type="submit" class="btn btn-primary btn-sm my-1" name = "searchbycity">
                    Search by City
        </button>
    </form>

    
    <form method="POST" action ="searchbuybydistrict.php">
        <button type="submit" class="btn btn-primary btn-sm my-1" name = "searchbydistrict">
                    Search by District
        </button>
    </form>
    <form action= "searchresultbuyview.php?databasecol1=selltype&filterby1=sale&databasecol2=proptype&filterby2=house" method="POST">
                <button type ="submit" name="submitproperty" class="btn btn-primary btn-sm my-1">House For Sale</button>
    </form>
    <form action= "searchresultbuyview.php?databasecol1=selltype&filterby1=sale&databasecol2=proptype&filterby2=land" method="POST">
                <button type ="submit" name="submitproperty" class="btn btn-primary btn-sm my-1">Land For Sale </button>
    </form>
    
    <form action= "login.php">
                <button type ="submit" name="submitproperty" class="btn btn-primary btn-sm my-1">List Your Property </button>
    </form>


  </div>
</nav>

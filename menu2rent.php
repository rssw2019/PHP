<nav class="navbar navbar-expand-sm bg-lignth navbar-light">
  <div class="container">
      
    <form method="POST" action ="searchrentbycity.php">
        <button type="submit" class="btn btn-primary btn-sm my-1" name = "searchbycity">
                    Search Rent by City
        </button>
    </form>
    <form method="POST" action ="searchrentbydistrict.php">
        <button type="submit" class="btn btn-primary btn-sm my-1" name = "searchbycity">
                    Search Rent by District
        </button>
    </form>
    <form action= "searchresultbuyview.php?databasecol1=selltype&filterby1=rent&databasecol2=proptype&filterby2=room" method="POST">
                <button type ="submit" name="submitproperty" class="btn btn-primary btn-sm my-1">Rooms for Rent</button>
    </form>
    
    </form>
    <form action= "searchresultbuyview.php?databasecol1=selltype&filterby1=rent&databasecol2=proptype&filterby2=house" method="POST">
        <button type ="submit" name="submitproperty" class="btn btn-primary btn-sm my-1">House For Rent
        </button>
    </form>
    
    <form action= "login.php">
                <button type ="link" name="submitproperty" class="btn btn-primary btn-sm my-1">List your Rental Property </button>
  </div>
</nav>

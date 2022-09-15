<nav class="navbar navbar-expand-sm bg-lignth navbar-light">
  <div class="container">
    <form action= "searchresltview.php?databasecol1=selltype&filterby1=sale&databasecol2=proptype&filterby2=house" method="POST">
                <button type ="submit" name="submitproperty" class="btn btn-primary btn-sm">House For Sale</button>
    </form>
    <form action= "searchresltview.php?databasecol1=selltype&filterby1=sale&databasecol2=proptype&filterby2=land" method="POST">
                <button type ="submit" name="submitproperty" class="btn btn-primary btn-sm">Land For Sale </button>
    </form>
    <form action= "searchresltview.php?databasecol1=selltype&filterby1=rent&databasecol2=proptype&filterby2=apartment" method="POST">
        <button type ="submit" name="submitproperty" class="btn btn-primary btn-sm">Apartments For Rent
        </button>
    </form>
    <form method="POST" action ="searchbycity.php">
        <button type="submit" class="btn btn-primary btn-sm" name = "searchbycity">
                    Search By Cities
        </button>
    </form>
  </div>
</nav>

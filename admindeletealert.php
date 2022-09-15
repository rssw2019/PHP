<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<?php
    $title ="Purnim Realty -Admin Delete Alert";
?>

<?php
    include 'head.php';
?>

<body style="background-color:lightgray;">
    <div class="container-fluid">
        <?php
            include "menu1.php";
        ?>
    </div>
    <div class="container-fluid">
        <br>

        <div class="card">
            <div class="card-header">
                <h4>Delete Alert!</h4>
            </div>
            <div class="card-body">
            <p class="card-text">
                Are you sure you want to delete this data? This action cannot be reversed.
                <form action ="adminmanageproperties.php" method="POST">
                    <button type="submit" class="btn btn-primary" name = "delete"> No, go back to Manage Properties 
                    </button>
                </form>
                <br>
                <?php
                $admin_id=$_POST['id'];
                
                ?>
        
                <form action ="adminpropertydelete.php" method="POST">
                    <input type="hidden" name ="id"  value ="<?php echo $admin_id; ?>">
                    <button type="submit" class="btn btn-danger" name = "delete"> Yes delete property
                    </button>
                </form>
            </p>
            <?php
                include '../footer.php';
            ?>
        </div>
    </div>

</body>
</html>


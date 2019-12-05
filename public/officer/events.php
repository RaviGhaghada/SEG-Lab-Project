<?php require_once('../../private/initialise.php'); 

include(SHARED_PATH . '/officer_header.php');
include(SHARED_PATH . '/classes/societyevent.class.php');

if(is_post_request()) {
	$query = "SELECT * FROM societyEvents";
}
else{
	date_default_timezone_set("Europe/London");
	$date = date('Y-m-d H:i:s', time());
	$query = "SELECT * FROM societyEvents WHERE releaseDate < '".$date."' AND expiryDate > '".$date."'";
}
?>

<div class="container mt-5 mb-5">
    <h1>Events</h1> <br>
    
    <table class="table">
        <thead>
            <tr>
                <th>Event ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Event Date</th>
                <th>Release Date</th>
                <th>Expiry Date</th>
                <th>&nbsp;</th>
                <th>
                <a href=eventCreate.php><button class="btn btn-primary btn-lg">+</button></a>
                </th>
                
          </tr>   
        </thead>
        <tbody>
        <?php			
			$connection = db_connect();
            $result_set = mysqli_query($connection, $query);
    
            while($events = mysqli_fetch_assoc($result_set)){
                echo "<tr>";
                    echo "<th scope=\"row\">".$events["id"]."</th>";
                    echo "<td>".$events["name"]."</td>";
                    echo "<td>".$events["description"]."</td>";
                    echo "<td>".$events["eventDate"]."</td>";
                    echo "<td>".$events["releaseDate"]."</td>";
                    echo "<td>".$events["expiryDate"]."</td>";
                    echo "<td> <a href=eventEdit.php?id=".$events["id"].">Edit</td>";
                    echo "<td> <a href=eventDelete.php?id=".$events["id"].">Delete</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    
	<br>
	
	<?php
		if(is_post_request()){
			echo "<form action=".url_for('/officer/events.php')." method='get'>";
				echo "<div id='operations'>";
				echo "<input type='submit' class='btn btn-danger' value='Hide unreleased/expired events' />";
		}
		else{
			echo "<form action=".url_for('/officer/events.php')." method='post'>";
				echo "<div id='operations'>";
				echo "<input type='submit' class='btn btn-info' value='Show unreleased/expired events' />";
		}
		
		echo "</div>";
		echo "</form>";
	?>
	<br>
    <br>
	<br>

</div>
 
<?php
	include(SHARED_PATH . '/footer.php');
	
    mysqli_free_result($result_set);
    db_disconnect($connection)
?>

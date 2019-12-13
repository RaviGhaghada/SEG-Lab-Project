<?php 
require_once('../private/initialise.php');
require_once('../private/shared/header.php');
require_once('../private/shared/classes/societyevent.class.php');
require_once('../private/shared/classes/tournament.class.php');
?>

<?php
// Register user to tournament
if(is_post_request() && $_POST['signup'] === 'true'){
    $tournament = Tournament::find_by_id($_POST['tournament']);
    $tournament->add_competitor(get_session_id());
} elseif (is_post_request() && $_POST['signup'] === 'false'){
    $tournament = Tournament::find_by_id($_POST['tournament']);
    $tournament->remove_competitor(get_session_id());
}

?>

<div class="container mt-5 mb-5">
	<h2>KCLCS</h2>
    <img src="./static/chessSocietyLogo.jpg" alt="logo" width="10%" height="10%">
    <hr>
    <h3>
        <form action = "<?php $_PHP_SELF ?>" method = "POST">
            <button name="type" value="events" type="submit">Events</button>
            <button name="type" value="tournaments" type="submit">Tournaments</button>
        </form>
    </h3>
    <?php

    // User clicked tournaments
    if(is_post_request() && $_POST['type'] === 'tournaments'){
        $tournaments = Tournament::find_all();

        // Fetch non-expired tournaments
        for ($i=0; $i < count($tournaments); $i++) {
            if(strtotime($tournaments[$i]->signupDeadline) < time()) {
                unset($tournaments[$i]);
            }
        }

        // Sort tournaments for deadline
        usort($tournaments, function($a, $b){
            if($b->signupDeadline < $a->signupDeadline) return -1;
            elseif ($a->signupDeadline === $b->signupDeadline) return 0;
            else return 1;
        });

        foreach ($tournaments as $tournament) {
            echo("
                <h4>" . h($tournament->name) . "</h4>
                ");
            if($tournament->signupDeadline != ''){
                $date = date_create_from_format('Y-m-d H:i:s', $tournament->signupDeadline);
                echo("<p>" . h($date->format('Y-m-d')) . "</p>");
                if(!$tournament->has_competitor(get_session_id())){
                    // User not signed up
                    ?>
                    <form action = "<?php $_PHP_SELF ?>" method = "POST">
                        <input type="hidden" name="type" value="<?php echo($_POST['type']); ?>">
                        <input type="hidden" name="tournament" value="<?php echo($tournament->id); ?>">
                        <button name="signup" value="true" type="submit">Sign Up</button>
                    </form>
                <?php 
                }else{
                    ?>
                    <form action = "<?php $_PHP_SELF ?>" method = "POST">
                        <input type ="hidden" name="type" value="<?php echo($_POST['type']); ?>">
                        <input type="hidden" name="tournament" value="<?php echo($tournament->id); ?>">
                        Signed up!
                        <button name="signup" value="false" type="submit">X</button>
                    </form>
                    <?php
                }
            }
            echo ("<hr>");
        }


    // User clicked events, or page just loaded
    } else {
        $events = SocietyEvent::find_all();

        // Fetch non-expired events
        for ($i=0; $i < count($events); $i++) { 
            if(strtotime($events[$i]->expiryDate) < time()) {
                unset($events[$i]);
            }
        }

        // Sort events for release date
        usort($events, function($a, $b){
            if($b->releaseDate < $a->releaseDate) return -1;
            elseif ($a == $b) return 0;
            else return 1;
        });

        foreach ($events as $event) {
            echo("
                <h4>" . h($event->name) . "</h4>
                <p>" . h($event->description) . "</p>
                ");
            if($event->eventDate != ''){
                $date = date_create_from_format('Y-m-d H:i:s', $event->eventDate);
                echo("<small><i>" . h($date->format('Y-m-d')) . "</i></small>");
            }
            echo ("<hr>");
        }

    }
    
    

    
    

    

    
    
    ?>
</div>

<?php include '../private/shared/footer.php' ?>
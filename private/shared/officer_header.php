<!doctype html>

<html lang="en">
  <head>
    <title>Admin Portal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/SEG-Lab-Project/public/index.php">KCLSU</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/SEG-Lab-Project/public/officer/news/news.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/SEG-Lab-Project/public/officer/events/events.php">Events</a>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="/SEG-Lab-Project/public/officer/tournaments/tournaments.php">Tournaments</a>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="/SEG-Lab-Project/public/officer/members/viewMembers.php">Members</a>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="/SEG-Lab-Project/public/officer/statistics.php">Elo Distribution</a>
            </li>
          </ul>
        <div class="collapse navbar-collapse justify-content-end">
         <ul class="navbar-nav">
            <li class="nav-item px-md-1">
              <a class="nav-link" href="/SEG-Lab-Project/public/index.php">Public</button></a>
            </li>
            <li class="nav-item px-md-1">
              <a class="nav-link" href="/SEG-Lab-Project/public/member/profiles/index.php?id= <?php echo get_session_id()?>">Profile</a>
            </li>
            <li class="nav-item px-md-1">
              <a href="/SEG-Lab-Project/public/logout.php"><button type="button" class="btn btn-secondary">Log out</button></a>
            </li>
          </ul>
        </div>
        </div>
      </nav>
    </header>
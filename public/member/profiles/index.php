<?php require_once('../../../private/initialise.php'); ?>

<?php
    if(!isset($_GET['id'])) {
        redirect_to(url_for('/index.php'));
    }
    $id = $_GET['id'];
    if($id !== get_session_id()){
        redirect_to(url_for('/index.php'));
    }
    $member = Member::find_by_id($id);
?>

<?php $page_title = 'Profile'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content" class="container mt-5 mb-5">

<a class="back-link" href="<?php echo url_for('/index.php'); // change to home page ?>">&laquo; Back to Home</a>

<div class="member show"><br><br>

  <h1>Member: <?php echo h($member->full_name()); ?></h1><hr>
  <div class="attributes">
    <?php echo "First Name: " . h($member->fName) . "<br>"; ?>
    <?php echo "Last Name: " . h($member->lName) . "<br>"; ?>
    <?php echo "Address: " . h($member->address) . "<br>"; ?>
    <?php echo "Phone Number: " . h($member->phoneNum) . "<br>"; ?>
    <?php echo "Gender: " . h($member->gender) . "<br>"; ?>
    <?php echo "Date of Birth: " . h($member->dob) . "<br>"; ?>
    <?php echo "Rating: " . h($member->rating) . "<br>"; ?>
    <?php echo "Role: " . h($member->role) . "<br>"; ?><br>
    <a class="action" href="<?php echo url_for('/member/profiles/edit.php?id=' . h(u($member->id))); ?>"><button class="btn btn-primary">Edit Profile</button></a>
    <a class="action" href="<?php echo url_for('/member/profiles/delete.php?id=' . h(u($member->id))); ?>"><button class="btn btn-danger">Delete Profile</button></a>
    	  
  </div>

</div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>

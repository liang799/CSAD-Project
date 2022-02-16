<?php
require_once 'include/home.php';

if (isset($_GET['id'])) {
	$postid = $_GET['id'];
} else {
	header('Location: home.php');
	exit;
}

$getPost = mysqli_query($conn, "SELECT * FROM forum JOIN accounts WHERE post_id='$postid'");
$post = mysqli_fetch_array($getPost);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<?php include "include/bootstrap.php" //bootstrap stylesheets and scripts ?>
		<title>Home</title>
		<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
	</head>
	<body style="background-color: green">
			<!---- Navbar ---->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">TREE.com</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#account" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
                <div class="collapse navbar-collapse" id="account">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  <img src="<?php echo $picture ?>" width="40" height="40" class="rounded-circle">
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="edit-profile.php">Edit Profile</a>
							<a class="dropdown-item" href="include/logout.php">Log Out</a>
						</div>
					  </li>   
                    </ul>                    
                </div>
            </div>
            </nav>

        <div class="container rounded bg-white">
              <div class="row" style="margin-top:100px; margin-bottom: 100px; padding: 35px">
                <!-- Main content -->
                <div class="col-lg-12 mb-3">
                  <div class="row text-left mb-5">
					  <div class="col-lg-12 mb-3 mb-sm-0">
					  </div>
                  </div>
                  <!-- Parent Post --->
					<?php newResult($postid, $post['title'], $post['timestamp'], $post['userName'], $post['content']); ?>

					<button class="btn btn-primary has-icon btn-block" type="button"
							data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@<?php echo $post['userName'] ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
							 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-2">
						<line x1="12" y1="5" x2="12" y2="19"></line>
						<line x1="5" y1="12" x2="19" y2="12"></line>
						</svg>
							New Reply
					</button>
                </div>
                <div class="col-lg-9 mb-3">
                  <div class="row text-right mb-5">
					  <div class="col-lg-9 mb-3 mb-sm-0">
						  <!--- replies --->
<?php						  newPost('kkl', 'tea', 'asdf', 'asdf', 'kasdf'); ?>
					  </div>
                  </div>
              </div>
            </div>
		</div>





<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Reply: </label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


		<?php include 'include/footer.php' ?>
	</body>

	<script>
		var exampleModal = document.getElementById('exampleModal')
		exampleModal.addEventListener('show.bs.modal', function (event) {
		  var button = event.relatedTarget
		  var recipient = button.getAttribute('data-bs-whatever')
		  var modalTitle = exampleModal.querySelector('.modal-title')
		  modalTitle.textContent = 'New Reply to ' + recipient
		})
	</script>
</html>
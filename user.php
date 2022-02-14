
<!DOCTYPE html>
<!-- saved from url=(0044)http://localhost/CSAD_GROUP_PROJECT/user.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title></title>
        <!--Loads in Bootstrap, JQuery, and more-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here">
<link rel="stylesheet" href="./user_files/bootstrap.min.css">
<link rel="stylesheet" href="./user_files/all.min.css">
<link href="css/styles.css" rel="stylesheet" />
<script src="./user_files/jquery.slim.min.js.download"></script>
<script src="./user_files/popper.min.js.download"></script>
<script src="./user_files/bootstrap.min.js.download"></script>        <style>
            .imagehover {
                position: relative;
                width: 50%;
            }

            .imagehover {
                opacity: 1;
                display: block;
                width: 100%;
                height: auto;
                transition: .5s ease;
                backface-visibility: hidden;
            }

            .imagehover-middle {
                transition: .5s ease;
                opacity: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;
            }

            .imagehover:hover .imagehover {
                opacity: 0.3;
            }

            .imagehover:hover .imagehover-middle {
                opacity: 1;
            }

            .imagehover-text {
                background-color: #04AA6D;
                color: white;
                font-size: 16px;
                padding: 16px 32px;
            }
        </style>
    </head>
    <body data-new-gr-c-s-check-loaded="14.1049.0" data-gr-ext-installed="">
        <!--Starts session if it does not exist-->



<!--Navigation Bar  navbar navbar-expand-sm bg-dark navbar-dark sticky-top  -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top py-3" id="mainNav">
    <a class="navbar-brand" href="http://localhost/CSAD-Project/index.php">TREE.com</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/CSAD-Project/index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/CSAD-Project/index.php#about">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/CSAD-Project/home.php">Forum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/CSAD-Project/index.php">Gallery</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/CSAD_GROUP_PROJECT/user.php">joe</a>        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/CSAD_GROUP_PROJECT/logout.php">Logout</a>        </li>
        <form class="form-inline my-2 my-lg-0 ml-3">
            <input class="form-control mr-sm-2" type="search" placeholder="Click here!" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </ul>
</nav>        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-4">

                    <!--Profile name, picture, and status-->
                    <h2>'s Profile</h2>
                    <div class="imagehover">
                        <img class="rounded-circle imagehover mx-auto d-block" src="./user_files/default.png" style="width:128px;height:128px">
                        <a href="http://localhost/CSAD_GROUP_PROJECT/editprofilepicture.php">
                            <!--If it user is looking at his own profile, show "Update Profile Picture"-->
                            <div class="imagehover-middle">
                            <div class="imagehover-text" style="height:50%">
                                <input type="file" name="file">
                                <input type="submit" name="submit" value="Upload">
                            </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-2 mb-1"></div>

                    <!--Links-->
                    <h2>Socials</h2>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/CSAD_GROUP_PROJECT/user.php#">Instagram</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/CSAD_GROUP_PROJECT/user.php#">Youtube</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/CSAD_GROUP_PROJECT/user.php#">TikTok</a>
                        </li>
                    </ul>
                    <hr class="d-sm-none">
                </div>

                <!--About Me-->
                <div class="col-sm-8">
                    <h2>About Me</h2>
                    <h5>Name:</h5>                    
                    <h5>Member Since:</h5>2022-02-13 17:48:37                    <h5>Email:</h5>                    <h5>Description:</h5>                    <br>

                    <!--If it user is looking at his own profile, show "Edit Profile" Button-->
                                            <div class="mt-2">
                            <a href="http://localhost/CSAD_GROUP_PROJECT/editprofile.php?edit=15">
                                <input class="btn btn-success" type="button" value="Edit Profile">
                            </a>
                        </div>
                    
                    <div class="mt-2 text-success">
                                            </div>
                </div>
            </div>
        </div>
        <!--
Footer
-->

<footer id="footer" class="footer py-5 bg-dark text-center" style="margin-bottom: 0px; margin-top: 65.2px;" "="">
    <p class="m-0 text-center text-white">For more inquiries call us at +65 6432 5891
        <br>
        Find us at Jurong fishery Port Singapore
    </p>
    <br>
    <div class="container columns">
        <a href="http://localhost/CSAD_GROUP_PROJECT/about.php" class="btn btn-primary">About Us</a>
        <a href="http://localhost/CSAD_GROUP_PROJECT/faq.php" class="btn btn-primary">Frequently Asked Questions</a>
        <a href="mailto:treefeetspls@environmentalist.org" class="btn btn-primary">Contact us</a>
        <a href="http://localhost/CSAD_GROUP_PROJECT/forum.php" class="btn btn-primary">Forum</a>
        <br>
        <br>
        <a href="http://localhost/CSAD_GROUP_PROJECT/aboutus.php" class="btn btn-primary">Our Location</a>
    </div>
</footer>

<script>
$(document).ready(function() {

    var docHeight = $(window).height();
    var footerHeight = $('#footer').height();
    var footerTop = $('#footer').position().top + footerHeight;

    if (footerTop < docHeight)
        $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
});
</script>    
</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>
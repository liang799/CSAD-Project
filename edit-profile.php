<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>Snippet - BBBootstrap</title>
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
		<link href='' rel='stylesheet'>
		<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
			<style>
				body {
				background: rgb(99, 39, 120)
				}

				.form-control:focus {
				box-shadow: none;
				border-color: #BA68C8
				}

				.profile-button {
				background: rgb(99, 39, 120);
				box-shadow: none;
				border: none
				}

				.profile-button:hover {
				background: #682773
				}

				.profile-button:focus {
				background: #682773;
				box-shadow: none
				}

				.profile-button:active {
				background: #682773;
				box-shadow: none
				}

				.back:hover {
				color: #682773;
				cursor: pointer
				}

				.labels {
				font-size: 11px
				}

				.add-experience:hover {
				background: #BA68C8;
				color: #fff;
				cursor: pointer;
				border: solid 1px #BA68C8
				}

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
	<body oncontextmenu='return false' class='snippet-body'>
		<div class="container rounded bg-white mt-5 mb-5">
			<div class="row">
					<div class="col-md-3 border-right">
						<div class="d-flex flex-column align-items-center text-center p-3 py-5">

                    <div class="imagehover">
                        <img class="rounded-circle imagehover mx-auto d-block" src="uploads/default.png" style="width:128px;height:128px">
                        <a href="http://localhost/CSAD_GROUP_PROJECT/editprofilepicture.php">
                            <!--If it user is looking at his own profile, show "Update Profile Picture"-->
							<div class="imagehover-middle">
								<div class="imagehover-text" style="height:50%">Update Profile Picture</div>
							</div>
						</a>
                    </div>
								<span class="font-weight-bold">Edogaru</span>
						</div>	
					</div>
					<div class="col-md-5 border-right"></div>
					<div class="col-md-4">
						<div class="p-3 py-5">
							<div class="d-flex justify-content-between align-items-center experience">
									<span>Rate Experience </span>
							</div><br>
						</div>
					</div>
			</div>
		</div>
		<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
	</body>
</html>
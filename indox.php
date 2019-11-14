<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="Colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>PHP</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<div class="container">
  <header class="page-header">
  </header>
  <main id="app">
    <router-view></router-view>
  </main>
</div>
	
	<div class="container">
	<div class="col-md-6">
			<h2>Data</h2><a href="tambah.php" class="btn btn-success">Tambah</a>
	</div>
	</br>
	
	</div>
		
	<style type="text/css">
		/* Show it is fixed to the top */
		body {
		  min-height: 75rem;
		  padding-top: 5.5rem;
		}
		.logo {
		width: 160px;
		float: left;
		margin-right: 15px;
		}

	</style>
	
	
</head>

<?php include "config/koneksi.php"; 
	$guests = mysqli_query($con, "SELECT * FROM guest");
?>

<body>

	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand" href="#">Registrasi</a>
	  </div>
	</nav>

	<div class="container"> 
	    <div class="row" >

				
			<div class="col-md-12">
				<div class="card">
				  <div class="card-header">
				  	List Users
				  </div>
				  <div class="card-body">
							
					 <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>id</th>
				            <th>title</th>
				            <th>content</th>
							<th>description</th>
				            <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
				        	<?php while ($g = mysqli_fetch_array($guests)){ ?>
					            <tr>
					                <td width="15%"><?php echo $g['name'] ?></td>
					                <td width="10%"><?php echo $g['contact'] ?></td>
									<td width="20%"><?php echo $g['email'] ?></td>
					                <td><?php echo $g['address'] ?></td>
					                <td><button type="button" class="btn btn-secondary btn-sm" style="margin-right: 4px" data-toggle="modal" data-target="#edit-<?php echo $g['id'] ?>"><i class="glyphicon glyphicon-pencil"></i> Edit</button>

					                	<a href="delete_guest.php?user=<?php echo $g['id'] ?>"  class="btn btn-danger btn-sm" onclick="return confirm('Apakah user ini akan di hapus ?');"><i class="glyphicon glyphicon-trash"></i> Del</a>
					         
					            	</td>
					            </tr>
								<!-- Trigger the modal with a button -->
								<!-- Modal -->
								
				        	<?php } ?>
					    </tbody>
					  </table>
				  </div> 
				</div>
			</div>

		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('#characterLeft').text('140 characters left');
		    $('#addr').keydown(function () {
		        var max = 140;
		        var len = $(this).val().length;
		        if (len >= max) {
		            $('#characterLeft').text('You have reached the limit');
		            $('#characterLeft').addClass('red');
		            $('#btnSubmit').addClass('disabled');            
		        } 
		        else {
		            var ch = max - len;
		            $('#characterLeft').text(ch + ' characters left');
		            $('#btnSubmit').removeClass('disabled');
		            $('#characterLeft').removeClass('red');            
		        }
		    });  

		} );
	</script>

</body>
</html>


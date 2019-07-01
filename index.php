<!DOCTYPE html>
	<head>
		<title>WPoets Full Stack Test</title>
		<meta charset="utf-8">
		<meta name="viewport" width="device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
	</head>
	<body>
		<div class="container">
			<form action="CRUD.php" method="POST">
				<div class="form-row justify-content-center">
					<div class="col-auto">
						<input type="text" name="username" class="form-control" id="username" placeholder="User Name">
					</div>
					<div class="col-auto">
						<input type="text" name="password" class="form-control" id="password" placeholder="Password">
					</div>
					<div class="col-auto">
						<button type="submt" name="save" class="btn btn-info">Save</button>
					</div>
				</div>
			</form>
		</div>
		<?php require_once("CRUD.php"); ?>
		<div class="container">
			<?php if(isset($_SESSION['msg'])); ?>
			<div class="<?= $_SESSION['alert']; ?>">
				<?= $_SESSION['msg'];
				unset($_SESSION['msg']); ?>
			</div>
			<?php endif; ?>
			<table class="crud-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Password</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<form action="CRUD.php" method="POST">
						<?php 
							$sQuery = "SELECT * from account";
							$result = $conn->query($sQuery);
							while($row = $result->fetch_assoc());
						?>
						<tr>
							<td><?= $row['id']; ?></td>
							<td><?= $row['username'] ?></td>
							<td><?= $row['password'] ?></td>
							<td>
								<button type="submit" name="delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
								<button type="submit" name="edit" value="" class="btn btn-primary">Edit</button>
							</td>
						</tr>
					</form>
				</tbody>
			</table>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				setTimeout(function(){
					$(.alert).remove();
				},3000);
				$(".btn-primary").click(function() {
					$(".table").find('tr').eq(this.value).each(function){
						$("#username").val($(this).find('td').eq(1).text());
						$("#password").val($(this).find('td').eq(2).text());
						$(".btn-info").val($(this).find('td').eq(2).text());
					});
					$(".btn-info").attr("name","edit");
				});
			});
		</script>
	</body>
</html>

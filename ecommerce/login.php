<?php 
require_once("php/header.php");
require_once("usuario-logica.php");
?>
<div class="container">
	<h2>LOGIN</h2>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<form action="usuario-login.php" method="post">
				<div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" name="login" placeholder="login" required>
				</div>
				<div class="form-group">
          <label for="senha">Login</label>
          <input type="password" class="form-control" id="senha" name="senha" placeholder="senha" required>
				</div>	
        <button type="submit" class="btn btn-primary">Logar</button>
			</form>
		</div>
	</div>
</div>

<?php include("php/footer.php"); ?>
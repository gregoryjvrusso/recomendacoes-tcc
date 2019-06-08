<?php include("php/header.php"); ?>
	
<script>
  $(function () {
    $('.carousel').carousel()
  });
</script>
<style>
  .texto-categoria{
    font-size: 18px;
  }
</style>
<div class="container content">
  <div class="row">
    <div class="col-md-6">
      <h1>Cadastrar Usuário</h1>
      <form action="usuario-adicionar.php" method="post">
				<div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" name="login" placeholder="Login">
        </div>
				<div class="form-group">
          <label for="password">Senha</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
          <label for="data_nascimento">Data Nascimento</label>
          <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Data Nascimento" value="01/01/1990">
        </div>
				<div class="genero">
					<p class="texto-categoria">Sexo</p>
					<div class="row">
						<div class="col-md-4">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sexo" id="masculino" value="M" checked="checked">
								<label class="form-check-label" for="masculino">
									Masculino
								</label>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sexo" id="feminino" value="F">
								<label class="form-check-label" for="feminino">
									Feminino
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="email@email.com.br">
        </div>
				<div class="form-group">
          <label for="endereco">Endereco</label>
          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="rua">
        </div>
				<div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="bairro">
        </div>
				<div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="cidade">
        </div>
				<div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="SP">
        </div>
				<div class="form-group">
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais" name="pais" placeholder="País" value="Brasil">
        </div>
				<div class="form-group">
          <label for="cep">CEP</label>
          <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="11111-111">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </div>
</div>
<?php include("php/footer.php"); ?>


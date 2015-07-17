<div ng-controller="CustomerController" class="col-md-6 col-sm-8 col-xs-12">
	<form ng-submit="save()" name="customerForm">
		<fieldset>
			<legend>Novo Cliente</legend>
			
			<div class="form-group">
				<label for="inputNome">Nome</label>
				<input type="text" class="form-control" focus="true" name="inputNome" id="inputNome" placeholder="Nome" ng-required="true" ng-model="nome">
			</div>
			
			<div class="form-group">
				<label for="inputSobrenome">Sobrenome</label>
				<input type="text" class="form-control" name="inputSobrenome" id="inputSobrenome" placeholder="Sobrenome" ng-required="true" ng-model="sobrenome">
			</div>

			<div class="form-group">
				<label for="inputCpf">CPF</label>
				<input type="text" class="form-control" name="inputCpf" id="inputCpf" placeholder="CPF" ng-required="true" ng-model="cpf">
			</div>
			
			<div class="form-group">
				<label for="inputEmail">E-mail</label>
				<input type="email" class="form-control" name="email" id="inputEmail" placeholder="E-mail" ng-required="true" ng-model="email">
			</div>
			
			<div class="form-group">
				<label for="inputConfirmaEmail">Confirma E-mail</label>
				<input type="email" class="form-control" name="confirmaEmail" id="inputConfirmaEmail" placeholder="E-mail" ng-required="true" ng-model="confirmaEmail">
			</div>
			
			<div class="form-group">
				<label for="inputPassword">Senha</label>
				<input type="password" ng-minlength="6" class="form-control" name="password" id="inputPassword" placeholder="Senha" ng-required="true" ng-model="password">
			</div>
			
			<div class="form-group">
				<label for="inputConfirmaPassword">Confirma Senha</label>
				<input type="password" ng-minlength="6" class="form-control" name="confirmaPassword" id="inputConfirmaPassword" placeholder="Senha" ng-required="true" ng-model="confirmaPassword">
			</div>
			
			<div class="form-group">
				<label for="inputTelefone">Telefone</label>
				<input type="text" class="form-control" name="inputTelefone" id="inputTelefone" placeholder="Telefone" ng-required="true" ng-model="telefone">
			</div>
			
			<div class="form-group">
				<label for="inputEndereco">Endereço</label>
				<input type="text" class="form-control" name="inputEndereco" id="inputEndereco" placeholder="Endereço" ng-required="true" ng-model="endereco">
			</div>
			
			<div class="form-group">
				<label for="inputBairro">Bairro</label>
				<input type="text" class="form-control" name="inputBairro" id="inputBairro" placeholder="Bairro" ng-required="true" ng-model="bairro">
			</div>
			
			<div class="form-group">
				<label for="inputCidade">Cidade</label>
				<input type="text" class="form-control" name="inputCidade" id="inputCidade" placeholder="Cidade" ng-required="true" ng-model="cidade">
			</div>

			<div class="form-group">
				<label for="inputEstado">Estado</label>
				<input type="text" class="form-control" name="inputEstado" id="inputEstado" placeholder="Estado" ng-required="true" ng-model="estado">
			</div>


			<button type="submit" class="btn btn-primary">Salvar</button>
		</fieldset>
	</form>
	
</div>
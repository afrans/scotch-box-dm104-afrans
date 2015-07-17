<div ng-controller="CustomerController" class="col-md-6 col-sm-8 col-xs-12">
	<form ng-submit="save()" name="customerForm">
		<fieldset>
			<legend>Novo Cliente</legend>
			
			<div class="alert alert-danger" ng-show="displayMessageError" role="alert">
				<p>{{messageError}}</p>
			</div>
			
			<div class="form-group">
				<label for="inputNome">Nome</label>
				<input type="text" class="form-control" focus="true" id="inputNome" placeholder="Nome" ng-required="true" ng-model="nome">
			</div>
			
			<div class="form-group">
				<label for="inputSobrenome">Sobrenome</label>
				<input type="text" class="form-control" id="inputSobrenome" placeholder="Sobrenome" ng-required="true" ng-model="sobreNome">
			</div>

			<div class="form-group">
				<label for="inputCpf">CPF</label>
				<input type="text" class="form-control" id="inputCpf" placeholder="CPF" ng-required="true" ng-model="cpf">
			</div>
			
			<div class="form-group">
				<label for="inputEmail">E-mail</label>
				<input type="email" class="form-control" id="inputEmail" placeholder="E-mail" ng-required="true" ng-model="email">
			</div>
			
			<div class="form-group">
				<label for="inputConfirmaEmail">Confirma E-mail</label>
				<input type="email" class="form-control" id="inputConfirmaEmail" placeholder="E-mail" ng-required="true" ng-model="confirmaEmail">
			</div>
			
			<div class="form-group">
				<label for="inputPassword">Senha</label>
				<input type="password" class="form-control" id="inputPassword" placeholder="Senha" ng-required="true" ng-model="password">
			</div>
			
			<div class="form-group">
				<label for="inputConfirmaPassword">Confirma Senha</label>
				<input type="password" class="form-control" id="inputConfirmaPassword" placeholder="Senha" ng-required="true" ng-model="confirmaPassword">
			</div>
			
			<div class="form-group">
				<label for="inputTelefone">Telefone</label>
				<input type="text" class="form-control" id="inputTelefone" placeholder="Telefone" ng-required="true" ng-model="telefone">
			</div>
			
			<div class="form-group">
				<label for="inputEndereco">Endereço</label>
				<input type="text" class="form-control" id="inputEndereco" placeholder="Endereço" ng-required="true" ng-model="endereco">
			</div>
			
			<div class="form-group">
				<label for="inputBairro">Bairro</label>
				<input type="text" class="form-control" id="inputBairro" placeholder="Bairro" ng-required="true" ng-model="bairro">
			</div>
			
			<div class="form-group">
				<label for="inputCidade">Cidade</label>
				<input type="text" class="form-control" id="inputCidade" placeholder="Cidade" ng-required="true" ng-model="cidade">
			</div>

			<div class="form-group">
				<label for="inputEstado">Estado</label>
				<input type="text" class="form-control" id="inputEstado" placeholder="Estado" ng-required="true" ng-model="estado">
			</div>

			<button type="submit" class="btn btn-primary">Salvar</button>
		</fieldset>
	</form>
	
</div>
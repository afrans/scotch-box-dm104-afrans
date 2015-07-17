<div ng-controller="LoginController" class="col-md-6 col-sm-8 col-xs-12">
	<form ng-submit="doLogin()" name="loginForm">
		<fieldset>
			<legend>Login</legend>
			
			<div class="alert alert-danger" ng-show="displayMessageError" role="alert">
				<p>{{messageError}}</p>
			</div>
			
			<div class="form-group">
				<label for="inputEmail1">E-mail</label>
				<input type="email" class="form-control" name="email" id="inputEmail1" placeholder="E-mail" ng-required="true" ng-model="email">
			</div>
			<div class="form-group">
				<label for="inputPassword1">Senha</label>
				<input type="password" class="form-control" name="password" id="inputPassword1" placeholder="Senha" ng-required="true" ng-model="password">
			</div>

			<button type="submit" class="btn btn-primary">Logar</button>
		</fieldset>
	</form>
	
	<div class="message_new_register">
		<p>Não tem cadastro? Faça seu cadastro <a href="/#/customer">aqui!</a></p>
	</div>
</div>
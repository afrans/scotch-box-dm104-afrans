<div ng-controller="LoginController" class="col-md-6 col-sm-8 col-xs-12">
	<form ng-submit="doLogin()">
		<fieldset>
			<legend>Login</legend>
			
			<div><p class="bg-danger" ng-show="{{messageError}}">{{messageError}}</p></div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">E-mail</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail" required ng-model="email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Senha</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" required ng-model="password">
			</div>

			<button type="submit" class="btn btn-primary">Logar</button>
		</fieldset>
	</form>
	
	<div class="message_new_register">
		<p>Não tem cadastro? Faça seu cadastro <a href="">aqui!</a></p>
	</div>
</div>
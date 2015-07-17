<h2>Itens no carrinho:</h2>

<div class="alert alert-danger" ng-show="displayMessageError" role="alert">
	<p>{{messageError}}</p>
</div>

<div ng-init="loadCartFromSessionStorage()">

	<table class="table table-bordered"> 
		<thead class="text-center">
			<th>Produto</th>
			<th>Valor</th>
			<th>Excluir</th>
		</thead>
		
		<tbody>
			<tr ng-repeat="product in cartItens">
				<td>{{product.nome}}</td>
				<td>{{product.preco | currency:"R$"}}</td>
				<td class="text-center"><span class="glyphicon glyphicon-trash remove-item" ng-click="removeItem(product)"></span></td>
			</tr>
			
			<tr ng-show="cartItens.length === 0">
				<td colspan="3">Carrinho Vazio!</td>
			</tr>
			
			<tr class="success" ng-show="cartItens.length > 0">
				<td class="">Total</td>
				<td>{{billingAccount | currency:"R$"}}</td>
				<td class="text-center"><button class="btn btn-primary" type="button" ng-click="closeOrdered()">Fechar Pedido</button></td>
			</tr>
		</tbody>
	</table>	
</div>


<h2>Meus pedidos:</h2>

<div ng-init="loadPedidos()">

	<table class="table table-bordered"> 
		<thead class="text-center">
			<th>Número Pedido</th>
			<th>Data do Pedido</th>
			<th>Valor total</th>
			<th>Status</th>
		</thead>
		
		<tbody>
			<tr ng-repeat="pedido in pedidos">
				<td>{{pedido.venda_id}}</td>
				<td>{{pedido.data_venda | date}}</td>	
				<td>{{pedido.valor_total | currency:"R$"}}</td>
				<td>{{pedido.status}}</td>
			</tr>
		</tbody>
	</table>	
</div>
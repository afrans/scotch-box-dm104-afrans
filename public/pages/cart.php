<h2>Itens no carrinho:</h2>

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

	<div>
		
	</div>
	
</div>
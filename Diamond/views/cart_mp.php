		<script src="https://sdk.mercadopago.com/js/v2"></script>
		<script>
			const mp = new MercadoPago("TEST-abf30c85-39df-4756-be3e-f7fefeabb98e");
		</script>

<h1>Checkout Mercado Pago</h1>

<?php if(!empty($error)): ?>
<div class="warn">
	<?php echo $error; ?>
</div>
<?php endif; ?>

<h3>Dados Pessoais</h3>

<form method="POST">
	<strong>Nome:</strong><br/>
	<input type="text" name="name" value="Gabriel Avelar" /><br/><br/>

	<strong>CPF:</strong><br/>
	<input type="text" name="cpf" value="13511002621" /><br/><br/>

	<strong>Telefone:</strong><br/>
	<input type="text" name="telefone" value="31995091973" /><br/><br/>

	<strong>E-mail:</strong><br/>
	<input type="email" name="email" value="gabrielavelar18@gmail.com" /><br/><br/>

	<strong>Senha:</strong><br/>
	<input type="password" name="pass" value="123" /><br/><br/>

	<h3>Informações de Endereço</h3>

	<strong>CEP:</strong><br/>
	<input type="text" name="cep" value="35930302"/><br/><br/>

	<strong>Rua:</strong><br/>
	<input type="text" name="rua" value="Rua Matipó" /><br/><br/>

	<strong>Número:</strong><br/>
	<input type="text" name="numero" value="442" /><br/><br/>

	<strong>Complemento:</strong><br/>
	<input type="text" name="complemento" /><br/><br/>

	<strong>Bairro:</strong><br/>
	<input type="text" name="bairro" value="Belmonte" /><br/><br/>

	<strong>Cidade:</strong><br/>
	<input type="text" name="cidade" value="João Monlevade" /><br/><br/>

	<strong>Estado:</strong><br/>
	<input type="text" name="estado" value="MG" /><br/><br/>

	<input type="submit" value="Efetuar Compra" class="button efetuarCompra" />
</form>
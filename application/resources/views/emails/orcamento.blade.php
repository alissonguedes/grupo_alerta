<h2>Contato do site {{ get_config('site_title') }}</h2>

<p>
	O cliente <strong>{{ $request->nome }}</strong> entrou em contato através do site com o interesse em obter detalhes sobre os seguintes serviços:
</p>

<p>
<ul>
	@if (isset($request->servicos))
		@foreach ($request->servicos as $servico)
			<li>{{ $servico }}</li>
		@endforeach
	@endif
	@if (isset($request->outros_servicos))
		<li>{{ $request->outros }}</li>
	@endif
</ul>
</p>


<p>Dados do cliente:</p>

<table border="1" style="border-collapse: collapse">
	<tr>
		<td style="text-align: right !important; font-weight: bold !important;">Nome: </td>
		<td>{{ $request->nome }}</td>
	</tr>
	<tr>
		<td style="text-align: right !important; font-weight: bold !important;">E-mail:</td>
		<td>{{ $request->email }}</td>
	</tr>
	<tr>
		<td style="text-align: right !important; font-weight: bold !important;">Telefone: </td>
		<td>{{ $request->telefone }}</td>
	</tr>
	<tr>
		<td style="text-align: right !important; font-weight: bold !important;">Endereço:</td>
		<td>{{ $request->endereco }}</td>
	</tr>
	<tr>
		<td style="text-align: right !important; font-weight: bold !important;">Cidade:</td>
		<td>{{ $request->cidade }}</td>
	</tr>
	<tr>
		<td style="text-align: right !important; font-weight: bold !important;">Estado:</td>
		<td>{{ $request->estado }}</td>
	</tr>
</table>

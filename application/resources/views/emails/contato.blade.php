<h2>Contato do site {{ get_config('site_title') }}</h2>

<p>
	O cliente <strong>{{ $request->nome }}</strong> entrou em contato através do site, dirigindo-se ao setor <strong>{{ $request->setor }}</strong>:
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
		<td style="text-align: right !important; font-weight: bold !important;">Cidade: </td>
		<td>{{ $request->cidade }}</td>
	</tr>
	<tr>
		<td style="text-align: right !important; font-weight: bold !important;">Estado:</td>
		<td>{{ $request->setor }}</td>
	</tr>
	<tr>
		<td style="text-align: right !important; font-weight: bold !important;">Mensagem:</td>
		<td>{{ $request->mensagem }}</td>
	</tr>
</table>

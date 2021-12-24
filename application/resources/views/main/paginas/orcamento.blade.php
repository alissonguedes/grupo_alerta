@extends('main.paginas.template')

@section('title', 'Orçamento')
@section('subtitle', 'Grupo Alerta - Orçamento')

@section('content')

	<div class="container">

		<div class="row">

			<div class="col s12 l6">

				<div class="text_orcamento">

					<div class="text_line2 f_impact">
						Solicite uma consulta do nosso<br>especialista de vendas<br><br>
					</div>

					<div class="text_line3">
						<span style="font-size: 20px;"><strong>Faça uma consulta técnica conosco.</strong></span><br><br>
						Preencha o formulário e aguarde nosso contato. Um de nossos consultores irá telefonar para você e agendar uma visita técnica ao local onde você gostaria de fazer sua segurança.
						<br><br>
						Após uma avaliação detalhada, nosso departamento comercial gera um orçamento com base em todos os requisitos levantados e discutidos com você a respeito da melhor opção para sua necessidade.
						<br><br>
						<strong>Então entre em contato agora e solicite sua consulta!</strong>
					</div>

				</div>

			</div>

			<div class="col s12 l6">

				<!--Formulário-->
				<div class="box_formulario right">

					<div class="title_form">Preencha o Formulário</div>

					<form method="post" action="{{ route('contato.send_mail_orcamento') }}" novalidate>
						@csrf
						@method('post')

						<div class="input-field">
							<input type="text" name="nome" class="caixa_form browser-default" placeholder="Nome Completo" required>
						</div>
						<div class="input-field">
							<input type="text" name="email" class="caixa_form browser-default" placeholder="E-mail" value="{{ isset($_POST['email']) ? $_POST['email'] : null }}" required>
						</div>
						<div class="input-field">
							<input type="text" name="telefone" class="caixa_form browser-default" placeholder="(DDD)+Telefone" required>
						</div>
						<div class="input-field">
							<input type="text" name="endereco" class="caixa_form browser-default" placeholder="Endereço" required>
						</div>
						<div class="input-field">
							<input type="text" name="cidade" class="caixa_form browser-default" placeholder="Cidade" required>
						</div>
						<div class="input-field">
							<select name="estado" class="caixa_form browser-default" required>
								<option value="" selected disabled>Selecione um Estado</option>
								<option value="Acre-AC">Acre</option>
								<option value="Alagoas-AL">Alagoas</option>
								<option value="Amapá-AP">Amapá</option>
								<option value="Amazonas-AM">Amazonas</option>
								<option value="Bahia-BA">Bahia</option>
								<option value="Ceará-CE">Ceará</option>
								<option value="Distrito Federal-DF">Distrito Federal</option>
								<option value="Espirito Santo-ES">Espírito Santo</option>
								<option value="Goiás-GO">Goiás</option>
								<option value="Maranhão-MA">Maranhão</option>
								<option value="Mato Grosso-MT">Mato Grosso</option>
								<option value="Mato Grosso do Sul-MS">Mato Grosso do Sul</option>
								<option value="Minas Gerais-MG">Minas Gerais</option>
								<option value="Pará-PA">Pará</option>
								<option value="Paraíba-PB">Paraíba</option>
								<option value="Paraná-PR">Paraná</option>
								<option value="Pernambuco-PE">Pernambuco</option>
								<option value="Piauí-PI">Piauí</option>
								<option value="Rio de Janeiro-RJ">Rio de Janeiro</option>
								<option value="Rio Grande do Norte-RN">Rio Grande do Norte</option>
								<option value="Rio Grande do Sul-RS">Rio Grande do Sul</option>
								<option value="Rondônia-RO">Rondônia</option>
								<option value="Roraima-RR">Roraima</option>
								<option value="Santa Catarina-SC">Santa Catarina</option>
								<option value="São Paulo-SP">São Paulo</option>
								<option value="Sergipe-SE">Sergipe</option>
								<option value="Tocantins-TO">Tocantins</option>
							</select>
						</div>
						<style>
							[type="checkbox"]+span:not(.lever) {
								padding-left: 25px;
								margin-right: 15px;
								color: #fff;
							}

							[type="checkbox"]:checked+span:not(.lever):before {
								border-right-color: #fff;
								border-bottom-color: #fff;
							}

						</style>
						<div class="text_form">Escolha quais serviços deseja:</div>
						<div class="input-field">
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Alarme" class="browser-default">
									<span> Alarme </span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Cerca" class="browser-default"> <span>Cerca</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="CFTV" class="browser-default"> <span>CFTV</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Monitoramento" class="browser-default"> <span>Monitoramento</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Manutenção" class="browser-default"> <span>Manutenção</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Controle de Acesso" class="browser-default"> <span>Controle de Acesso</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Vigilância Armada e Desarmada" class="browser-default"> <span>Vigilância Armada e Desarmada</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Rastreamento de Veículos" class="browser-default"> <span>Rastreamento de Veículos</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Terceirização de Serviços" class="browser-default"> <span>Terceirização de Serviços</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="servicos[]" value="Construção" class="browser-default"> <span>Construção</span>
								</label>
							</div>
							<div class="">
								<label>
									<input type="checkbox" name="outros_servicos" class="browser-default"> <span>Outros</span>
								</label>
							</div>
						</div>
						<div class="text_form">Caso tenha marcado <strong>"Outros"</strong> Informe qual:</div>
						<div class="input-field">
							<input type="text" name="outros" id="outros" class="caixa_form browser-default" disabled="disabled">
						</div>
						<script>
						 $(function() {
						  $('input[name="outros_servicos"]').on('change', function() {
						   if ($(this).prop('checked')) $(this).parents().find('input#outros').attr('disabled', false).focus();
						   else $(this).parents().find('input#outros').attr('disabled', true).removeClass('.error').find('.error').remove();
						  });
						 });
						</script>

						<br>
						<button type="submit" class="bt_form f_avante" name="enviar">Solicitar Orçamento</button>
					</form>
				</div>

			</div>
		</div>
	</div>

@endsection

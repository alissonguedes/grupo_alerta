<!DOCTYPE html>
<?php include "head.php"; ?>


<body class="page-template-default page page-id-12986 dsvy-sidebar-no elementor-default elementor-kit-12597 elementor-page elementor-page-12986">
<div id="page" class="site dsvy-parent-header-style-2">
	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
	<header id="masthead" class="site-header dsvy-header-style-2">
		<div class="dsvy-header-overlay">
	<div class="dsvy-header-height-wrapper">
		<div class="dsvy-header-inner dsvy-sticky-logo-yes dsvy-responsive-logo-no dsvy-responsive-header-bgcolor-white dsvy-header-wrapper dsvy-bg-color-transparent dsvy-header-sticky-yes dsvy-sticky-type- dsvy-sticky-bg-color-white">

			<?php include "header.php"; ?>

		</div><!-- .dsvy-header-inner -->
	</div><!-- .dsvy-header-height-wrapper -->
</div>
					<div class="dsvy-title-bar-wrapper  dsvy-bg-color-transparent dsvy-bg-image-yes dsvy-titlebar-style-left">
		<div class="container">
			<div class="dsvy-title-bar-content">
				<div class="dsvy-title-bar-content-inner">
					<div class="dsvy-tbar"><div class="dsvy-tbar-inner container"><h1 class="dsvy-tbar-title"> CONTATO</h1></div></div>					<div class="dsvy-breadcrumb"><div class="dsvy-breadcrumb-inner"><span><a title="Go to Digicop Demo 2." href="https://digicop.designervily.com/demo2" class="home"><span>Grupo Alerta</span></a></span><span class="sep">-</span><span class="post post-page current-item">Contato</span></div></div>				</div>
			</div><!-- .dsvy-title-bar-content -->
		</div><!-- .container -->
	</div><!-- .dsvy-title-bar-wrapper -->
	</header><!-- #masthead -->
	<div class="site-content-contain ">
		<div class="site-content-wrap">
			<div id="content" class="site-content container">


				<!--Formulário-->
				<div class="box_formulario">
				  <div class="title_form">Preencha o Formulário</div>
				  <form method="post" action="env_orcamento.php">
				    <input type="text" name="nome" class="caixa_form" placeholder="Nome Completo" required>
				    <input type="text" name="email" class="caixa_form" placeholder="E-mail" required>
				    <input type="text" name="fone" class="caixa_form" placeholder="(DDD)+Telefone" required>
				    <input type="text" name="endereço" class="caixa_form" placeholder="Endereço" required>
				    <input type="text" name="cidade" class="caixa_form" placeholder="Cidade" required>
				    <select name="uf" class="caixa_form" required>
				      <option value="#" selected disabled>Selecione um Estado</option>
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
				    <div class="text_form">Escolha quais serviços deseja:</div>
				    <!-- AQUI ESTAVA INVERTIDO, O VALUE ESTAVA SERVE E NAME O QUE DEVERIA ESTÁ NO VALUE

				    NO 'NAME' DEVE FICAR O NOME DA VÁRIAVEL QUE SERÁ USADA NO PHP, OS [] (COLCHETES) CRIA UMA ARRAY DESSE ATRIBUTO, LOGO TODOS OS VALORES MARCADOS SERÃO PREENCHIDOS NO ARRAY serv[]

				     -->
				    <input type="checkbox" name="serv[]" value="Alarme">Alarme<br>
				    <input type="checkbox" name="serv[]" value="Cerca">Cerca<br>
				    <input type="checkbox" name="serv[]" value="CFTV">CFTV<br>
				    <input type="checkbox" name="serv[]" value="Monitoramento">Monitoramento<br>
				    <input type="checkbox" name="serv[]" value="Manutenção">Manutenção<br>
				    <input type="checkbox" name="serv[]" value="Controle de Acesso">Controle de Acesso<br>
				    <input type="checkbox" name="serv[]" value="Vigilância Armada e Desarmada">Vigilância Armada e Desarmada<br>
				    <input type="checkbox" name="serv[]" value="Rastreamento de Veículos">Rastreamento de Veículos<br>
				    <input type="checkbox" name="serv[]" value="Terceirização de Serviços">Terceirização de Serviços<br>
				    <input type="checkbox" name="serv[]" value="Construção">Construção<br>
				    <input type="checkbox" name="serv[]" value="Outros">Outros<br><br>

				    <div class="text_form">Caso tenha marcado <strong>"Outros"</strong> Informe qual:</div>
				    <input type="text" name="outro" class="caixa_form">
				    <br>
				    <input type="submit" class="bt_form f_avante" name="enviar" value="Solicitar Orçamento">
				  </form>
				</div>


				<?php
				$msg=0;
				$msg= $_REQUEST['msg'];
				?>
				<?php if($msg == 'enviado'): ?>
				  <div class="box_interesse2 bg_transparent">
				        <div class="box msg">
				            <div class="title_box f_futura" style="text-align: center; line-height:normal;  text-transform:uppercase;">Orçamento enviado com sucesso!</div>
				            <div class="nome_do_produto_box f_avante" style="text-align: center;">
				            Aguarde! Entraremos em contato com você o mais breve possível.
				            </div>
				            <a class="bt_x" id="amigo2" data-element=".box_interesse2"></a>
				        </div>
					</div>
				<?php endif ?>


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



			</div><!-- #content -->
			</div><!-- .site-content-wrap -->

			<?php
			$msg=0;
			$msg= $_REQUEST['msg'];
			?>
			<?php if($msg == 'enviado'): ?>
			  <div class="box_interesse2 bg_transparent">
			        <div class="box msg">
			            <div class="title_box f_futura" style="text-align: center; line-height:normal;  text-transform:uppercase;">Orçamento enviado com sucesso!</div>
			            <div class="nome_do_produto_box f_avante" style="text-align: center;">
			            Aguarde! Entraremos em contato com você o mais breve possível.
			            </div>
			            <a class="bt_x" id="amigo2" data-element=".box_interesse2"></a>
			        </div>
				</div>
			<?php endif ?>

<?php include "footer.php"; ?>

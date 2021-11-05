@extends('main.paginas.template')

@section('title', 'Orçamento')
@section('subtitle', 'Grupo Alerta - Orçamento')

@section('content')

    <!--Formulário-->
    <div class="box_formulario">
        <div class="title_form">Preencha o Formulário</div>
        <form method="post" action="{{ route('contato.send_mail') }}" novalidate>
            @csrf
            @method('post')

            @error('nome')
                O nome é importante
            @enderror
            <div class="input-field">
                <input type="text" name="nome" class="caixa_form" placeholder="Nome Completo" required>
            </div>
            <div class="input-field">
                <input type="text" name="email" class="caixa_form" placeholder="E-mail" value="{{ isset($_POST['email']) ? $_POST['email'] : null }}" required>
            </div>
            <div class="input-field">
                <input type="text" name="telefone" class="caixa_form" placeholder="(DDD)+Telefone" required>
            </div>
            <div class="input-field">
                <input type="text" name="endereco" class="caixa_form" placeholder="Endereço" required>
            </div>
            <div class="input-field">
                <input type="text" name="cidade" class="caixa_form" placeholder="Cidade" required>
            </div>
            <div class="input-field">
                <select name="estado" class="caixa_form" required>
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
            <div class="input-field">
                <div class="text_form">Escolha quais serviços deseja:</div>
                <label>
                    <input type="checkbox" name="servicos[]" value="Alarme">
                    <span> Alarme </span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="Cerca"> <span>Cerca</span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="CFTV"> <span>CFTV</span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="Monitoramento"> <span>Monitoramento</span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="Manutenção"> <span>Manutenção</span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="Controle de Acesso"> <span>Controle de Acesso</span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="Vigilância Armada e Desarmada"> <span>Vigilância Armada e Desarmada</span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="Rastreamento de Veículos"> <span>Rastreamento de Veículos</span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="Terceirização de Serviços"> <span>Terceirização de Serviços</span>
                </label>
                <label>
                    <input type="checkbox" name="servicos[]" value="Construção"> <span>Construção</span>
                </label>
                <br>
                <label>
                    <input type="checkbox" name="outros_servicos"> <span>Outros</span>
                </label>
                <div class="text_form">Caso tenha marcado <strong>"Outros"</strong> Informe qual:</div>
                <input type="text" name="outros" id="outros" class="caixa_form" disabled="disabled">
            </div>
            <script>
                $(function() {
                    $('input[name="outros_servicos"]').on('change', function() {
                        if ($(this).prop('checked')) $(this).parents('.input-field').find('input#outros').attr('disabled', false).focus();
                        else $(this).parents('.input-field').find('input#outros').attr('disabled', true).removeClass('.error').find('.error').remove();
                    });
                });
            </script>

            <br>
            <input type="submit" class="bt_form f_avante" name="enviar" value="Solicitar Orçamento">
        </form>
    </div>

    <style>
        .input-field {
            margin-bottom: 15px;
        }

        .input-field input:disabled {
            background: rgba(255, 255, 255, 0.3) !important;
        }

        .input-field label {
            margin-right: 20px;
            cursor: pointer;
        }

        .input-field input,
        .input-field select,
        checkbox {
            margin-bottom: 0;
        }

        .input-field.error .error {
            position: relative;
            font-size: 13px;
            color: var(--red-lighten-4);
        }

        .input-field .material-icons {
            font-size: inherit;
            top: -32px;
            position: absolute;
            color: var(--red);
            right: 10px;
        }

    </style>

    <div class="container">
        <div class="text_orcamento ">

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

@endsection

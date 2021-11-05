@extends('admin.layouts.app')

@section('title', 'Páginas')

@section('content')

    <div class="responsive-table">

        <div class="top flex mb-1">

            <div class="actions action-btns flex flex-col align-itens-center">

                <div class="show-buttons">
                    <button type="button" class="btn btn-large waves-effect" data-href="{{ route('admin.paginas.add') }}" data-tooltip="Adicionar">
                        <i class="material-icons">
                            add
                        </i>
                    </button>
                </div>

                <div class="hide-buttons">

                    {{-- <button class="btn btn-large waves-effect translator" data-link="{{ route('admin.dicionario') }}" data-tooltip="Traduzir" style="border: none">
                    <i class="material-icons">translate</i>
                </button> --}}

                    <button class="btn btn-large update waves-effect" name="status" value="0" data-tooltip="" data-on="Bloquear" data-off="Desbloquear" data-link="{{ route('admin.paginas.patch', 'status') }}" data-method="patch">
                        <i class="material-icons" data-on="lock" data-off="lock_open"></i>
                    </button>

                    <button class="btn btn-large excluir waves-effect" disabled="disabled" data-link="{{ route('admin.paginas.delete') }}" style="border: none" data-tooltip="Excluir">
                        <i class="material-icons">delete_forever</i>
                    </button>

                    <div class="buttons selecteds-label white-text">
                    </div>

                </div>

            </div>

            <div class="clear">
            </div>

        </div>

        <div class="content">

            @if ($paginate->count() > 0)

                @foreach ($paginate as $menu)
                    <h4 class="title">{{ $menu->label }}</h4>
                    <div class="dd">
                        @php echo $paginas -> getPaginas($menu -> id) @endphp
                    </div>
                @endforeach
            @endif

        </div>

    </div>

    <style>
        h4.title {
            font-size: 24px;
            color: #fff;
            line-height: 2;
            overflow: hidden;
            position: relative;
        }

        h4.title::after {
            content: '';
            color: #fff;
            width: 100%;
            border: none;
            height: 1px;
            line-height: 2;
            background: #fff;
            /* position: absolute; */
            display: flex;
            place-content: end;
            /* align-items: center; */
            line-height: 3rem;
            top: 25px;
        }

        .dd-content {
            display: block;
            height: 30px;
            margin: 5px 0;
            padding: 5px 10px 5px 40px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #000;
            background: #000;
            background: -webkit-linear-gradient(top, #000 0%, #000 100%);
            background: -moz-linear-gradient(top, #000 0%, #000 100%);
            background: linear-gradient(top, #000 0%, #000 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            font-size: 16px;
            color: var(--amber);
        }

        .dd-dragel {
            background: #000;
        }

        .dd-content .btn {
            border: 1px solid #ddd;
            display: block;
            position: absolute;
            top: 3px;
            right: 10px;
            bottom: 0;
            display: flex;
            flex: 1;
            align-items: center;
            place-content: center;
            text-align: center;
            width: 24px;
            height: 24px;
            border-radius: 24px;

        }

        .dd-content .btn i {
            font-size: 12px;
			top: -1px;
			position: relative;
        }

        .dd-content .btn i {}

        .dd3-handle {
            position: absolute;
            margin: 0;
            left: 0;
            top: 0;
            cursor: pointer;
            width: 30px;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 1px solid #000;
            background: #000;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .dd3-handle:hover {
            background: var(--amber);
        }

        .dd3-handle:hover::before {
            color: #000 !important;
        }

    </style>

@endsection

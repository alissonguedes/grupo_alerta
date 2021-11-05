{? $records = [] ?}

@if ($paginate->total() > 0)

    @foreach ($paginate as $row)

        <tr class="{{ $row->status === '0' ? 'blocked' : null }}" id="{{ $row->id }}" data-disabled="false">

            <td width="1%" data-disabled="true">
                <label>
                    <input type="checkbox" name="id[]" class="light-blue" value="{{ $row->id }}" data-status="{{ $row->status }}">
                    <span></span>
                </label>
            </td>
            <td>
                <img src="{{ asset($row->imagem) }}" alt="" width="50">
            </td>
            <td>{{ $row->titulo }}</td>
            <td class="center-align"><i class="material-icons">{{ $row->status === '0' ? 'lock' : 'check' }}</i>
            </td>
            <td class="center-align" data-disabled="true">
                <button data-href="{{ route('admin.banners.edit', $row->id) }}" class="btn btn-flat btn-edit btn-floating float-none">
                </button>
            </td>
        </tr>

    @endforeach

    <div id="pagination">

        <ul>
            <li>
                <button class="btn btn-flat btn-floating waves-effect" data-href="{{ !$paginate->onFirstPage() ? $paginate->previousPageUrl() : '#' }}" data-tooltip="Anterior" {{ $paginate->onFirstPage() ? 'disabled' : null }}>
                    <i class="material-icons">keyboard_arrow_left</i>
                </button>
            </li>

            <li>
                <button class="btn btn-flat btn-floating waves-effect" data-href="{{ $paginate->currentPage() < $paginate->lastPage() ? $paginate->nextPageUrl() : '#' }}" data-tooltip="Próxima" {{ $paginate->currentPage() === $paginate->lastPage() ? 'disabled' : null }}>
                    <i class="material-icons">keyboard_arrow_right</i>
                </button>
            </li>

        </ul>

    </div>

    <div id="info">
        <button data-href="#" class="btn btn-flat waves-effect">
            {{ $paginate->firstItem() }} - {{ $paginate->lastItem() }} de {{ $paginate->total() }}
            {{-- {{ $paginate -> perPage() }} --}}
        </button>
    </div>

@else

    <div class="no-results white-text center-align">
        Nenhum registro encontrado.
    </div>

    <div id="pagination"></div>

    <div id="info"></div>

@endif

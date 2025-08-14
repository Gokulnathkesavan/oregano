<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $outlet->name }}</td>
    <td>{{ $outlet->location }}</td>
    <td>{{ $outlet->slug }}</td>
    <td>
        @if($outlet->status == '1')
            <span class="badge badge-success">Active</span>
        @else
            <span class="badge badge-secondary">Inactive</span>
        @endif
    </td>
    <td>{{ $outlet->entries->count() }}</td>
    <td>
        <button class="btn btn-sm btn-outline-primary" title="Edit" onclick="openEditModal({{ $outlet }})">
            <i class="fa fa-pencil-square"></i>
        </button>

        <button class="btn btn-sm btn-outline-success" title="Generate URL"
            onclick="showLinkModal('{{ url('/') }}/entry/{{ $outlet->slug }}')">
            <i class="fa fa-link"></i>
        </button>

        <button type="button" class="btn btn-sm btn-outline-danger" title="Delete"
            onclick="confirmDelete({{ $outlet->id }}, '{{ $outlet->name }}')">
            <i class="fa fa-trash-o"></i>
        </button>

    </td>
</tr>
<div class="card">
    <div class="card-body">
        <table class="table" id="outlet-table">
            <thead>
                <tr>
                    <th>S No</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Entries Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($outlets as $outlet)
                    @include('outlet.partials.table-row', ['outlet' => $outlet, 'loop' => $loop])
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No outlets found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <nav aria-label="Page navigation example" class="mt-3">
            <ul class="pagination pagination-primary pagin-border-primary justify-content-center">
                <li class="page-item {{ $outlets->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $outlets->previousPageUrl() ?? 'javascript:void(0)' }}" tabindex="-1">
                        Previous
                    </a>
                </li>
                @foreach ($outlets->getUrlRange(1, $outlets->lastPage()) as $page => $url)
                    <li class="page-item {{ $outlets->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
                <li class="page-item {{ !$outlets->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $outlets->nextPageUrl() ?? 'javascript:void(0)' }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>


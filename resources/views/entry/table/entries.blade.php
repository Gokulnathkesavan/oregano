@extends('layouts.simple.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/js-datatables/style.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-6">
                    <h4>Entries List</h4>
                </div>


            </div>
        </div>



        <!-- Filter Form -->
        <div class="mb-3 row">
            <div class="col-12">
                <form method="GET" action="{{ route('admin.entries.index') }}" class="row g-2 align-items-center">

                    <div class="col-md-4">
                        <select name="outlet_id" class="form-select">
                            <option value="">-- Select Outlet --</option>
                            @foreach($allOutlets as $id => $name)
                                <option value="{{ $id }}" {{ request('outlet_id') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- <div class="col-md-3">
                        <select name="terms_accepted" class="form-select">
                            <option value="">-- Terms Accepted --</option>
                            <option value="1" {{ request('terms_accepted') === '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ request('terms_accepted') === '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div> -->

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>

                    <div class="col-auto">
                        <a href="{{ route('admin.entries.index') }}" class="btn btn-secondary">Reset</a>
                    </div>

                    <!-- Right side CSV export -->
                    <div class="col-auto ms-auto">
                        <a href="{{ route('admin.entries.export.csv', request()->all()) }}" class="btn btn-success">
                            <i class="fa fa-file-csv"></i> Export CSV
                        </a>
                    </div>

                </form>
            </div>
        </div>



        <!-- Entries Table -->
        <div class="card">
            <div class="card-body">
                <table class="table" id="entry-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Outlet</th>
                            <th>Bill Number</th>
                            <!-- <th>Bill Image</th> -->
                            <th>Terms Accepted</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($entries as $entry)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $entry->name }}</td>
                                <td>{{ $entry->email }}</td>
                                <td>{{ $entry->mobile_number }}</td>
                                <td>{{ $entry->outlet->name ?? 'N/A' }}</td>
                                <td>{{ $entry->bill_number ?? 'N/A' }}</td>
                                <!-- <td>
                                    @if($entry->bill_image)
                                        <a href="{{ asset('storage/' . $entry->bill_image) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $entry->bill_image) }}" alt="Bill Image"
                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td> -->

                                <td>
                                    @if($entry->terms_accepted)
                                        <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-secondary">No</span>
                                    @endif
                                </td>
                                <td>{{ $entry->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No entries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <nav aria-label="Page navigation example" class="mt-3">
                    <ul class="pagination pagination-primary pagin-border-primary justify-content-center">
                        <li class="page-item {{ $entries->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $entries->previousPageUrl() ?? 'javascript:void(0)' }}"
                                tabindex="-1">Previous</a>
                        </li>
                        @foreach ($entries->getUrlRange(1, $entries->lastPage()) as $page => $url)
                            <li class="page-item {{ $entries->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
                        <li class="page-item {{ !$entries->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $entries->nextPageUrl() ?? 'javascript:void(0)' }}">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/js-datatables/simple-datatables@latest.js') }}"></script>
    <script>
        // Initialize datatable
        const dataTable = new simpleDatatables.DataTable("#entry-table");
    </script>
@endsection
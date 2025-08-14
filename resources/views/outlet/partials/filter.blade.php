<div class="mb-3 row">
    <div class="col-12">
        <form method="GET" action="{{ route('admin.outlets.index') }}" class="row g-2 align-items-center">

            <div class="col-md-4">
                <select name="search" class="form-select">
                    <option value="">-- Select Outlet Name --</option>
                    @foreach($allOutletNames as $name)
                        <option value="{{ $name }}" {{ request('search') == $name ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">-- All Status --</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="col-md-3">
                <select name="location" class="form-select">
                    <option value="">-- Select Location --</option>
                    @foreach($allLocations as $location)
                        <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                            {{ $location }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-1">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col-md-1">
                <a href="{{ route('admin.outlets.index') }}" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>
    </div>
</div>

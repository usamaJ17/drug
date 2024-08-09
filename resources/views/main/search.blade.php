@extends('layouts/layoutMaster')

@section('title', ' Vertical Layouts - Forms')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
  'resources/assets/vendor/libs/select2/select2.scss',
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
  'resources/assets/vendor/libs/moment/moment.js',
  'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/select2/select2.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/form-layouts.js'])
@endsection

@section('content')
<!-- Basic Layout -->
<div class="row">
  <div class="col-xl mb-6">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Search Drugs</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('drug-search') }}" method="POST">
            @csrf
          <div class="mb-6">
            <label class="form-label" for="basic-default-fullname">NDC / Name</label>
            <input type="text" class="form-control" id="basic-default-fullname" name="ndc" placeholder="Enter Name or NDC" />
          </div>
          <div class="mb-6">
            <label for="insurance" class="form-label">Insurance</label>
            <select id="insurance" class="select2 form-select form-select-lg" name="insurance" data-allow-clear="true">
                <option >Select Insurance</option>
                @foreach ($uniqueInsurances as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-6">
            <label class="form-label" for="basic-default-group">Group</label>
            <input type="text" class="form-control" id="basic-default-group" name="customer_group" placeholder="Enter Group Name" />
          </div>
          <div class="mb-6">
            <label class="form-label" for="basic-default-bin">Bin</label>
            <input type="text" id="basic-default-bin" class="form-control" name="bin" placeholder="Enter Bin" />
          </div>
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

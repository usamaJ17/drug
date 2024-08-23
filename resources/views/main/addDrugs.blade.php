@extends('layouts/layoutMaster')

@section('title', ' Import Drugs')

<!-- Vendor Styles -->
@section('vendor-style')
    @vite([])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/moment/moment.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/forms-file-upload.js'])
@endsection

@section('content')
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl mb-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Import Drugs Excel</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('drug-add-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="Format" class="form-label">Import Format</label>
                            <select id="Format" class="form-select" name="format" data-allow-clear="true">
                                <option>Select Format</option>
                                <option value="liberty">Liberty</option>
                                <option value="pioneer">Pioneer</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="basic-default-fullname">Import Excel</label>
                            <input type="file" class="form-control" name="file" placeholder="Import Excel" />
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

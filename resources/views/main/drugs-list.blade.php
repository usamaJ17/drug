@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
@endsection

@section('page-script')
    @vite('resources/assets/js/app-drugs-list.js')
@endsection

@section('content')

    <!-- Users List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
                <thead class="border-top">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Drug Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NDC
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Insurance
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer Group Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Primary Ins Pay
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Net Profit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Profit Per Pill
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drugs as $item)
                        <tr
                            class="bg-gray-800 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-white-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->ndc }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->qty }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->insurance }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->bin }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->customer_group }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->primary_ins_pay }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->net_profit }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($item->net_profit / $item->qty, 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

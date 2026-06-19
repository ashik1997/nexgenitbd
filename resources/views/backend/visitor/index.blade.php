@extends('layouts.backend.app')
@push('title')
    Visitor activity
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Visitor activity table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Visitor activity</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">

                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header bg-danger">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-0">Browser</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dash-flag-icon">
                            <table class="table table-borderless mb-2">
                                <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Browser</th>
                                    <th scope="col">Counter</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Internet Explorer</td>
                                    <td>{{ $visitors->where('browser', 'Internet Explorer')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Firefox</td>
                                    <td>{{ $visitors->where('browser', 'Firefox')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Safari</td>
                                    <td>{{ $visitors->where('browser', 'Safari')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Chrome</td>
                                    <td>{{ $visitors->where('browser', 'Chrome')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Edge</td>
                                    <td>{{ $visitors->where('browser', 'Edge')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Opera</td>
                                    <td>{{ $visitors->where('browser', 'Opera')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Netscape</td>
                                    <td>{{ $visitors->where('browser', 'Netscape')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Maxthon</td>
                                    <td>{{ $visitors->where('browser', 'Maxthon')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Konqueror</td>
                                    <td>{{ $visitors->where('browser', 'Konqueror')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>UC Browser</td>
                                    <td>{{ $visitors->where('browser', 'UC Browser')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Handheld Browser</td>
                                    <td>{{ $visitors->where('browser', 'Handheld Browser')->count() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header bg-danger">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-0">OS/Device</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dash-flag-icon">
                            <table class="table table-borderless mb-2">
                                <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Counter</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mobile</td>
                                    <td>{{ $visitors->where('os', 'Mobile')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>BlackBerry</td>
                                    <td>{{ $visitors->where('os', 'BlackBerry')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Android</td>
                                    <td>{{ $visitors->where('os', 'Android')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>iPad</td>
                                    <td>{{ $visitors->where('os', 'iPad')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>iPod</td>
                                    <td>{{ $visitors->where('os', 'iPod')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Ubuntu</td>
                                    <td>{{ $visitors->where('os', 'Ubuntu')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Linux</td>
                                    <td>{{ $visitors->where('os', 'Linux')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Windows 10</td>
                                    <td>{{ $visitors->where('os', 'Windows 10')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Windows 8.1</td>
                                    <td>{{ $visitors->where('os', 'Windows 8.1')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Windows 8</td>
                                    <td>{{ $visitors->where('os', 'Windows 8')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Windows 7</td>
                                    <td>{{ $visitors->where('os', 'Windows 7')->count() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header bg-danger">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-0">Country/Location</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dash-flag-icon">
                            <table class="table table-borderless mb-2">
                                <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Counter</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>All of page visit</td>
                                    <td>{{ $visitors->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>All of visitor</td>
                                    <td>{{ $visitors->groupBy('ip')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Page visit from Bangladesh </td>
                                    <td>{{ $visitors->where('country', 'Bangladesh')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Bangladeshi visitor </td>
                                    <td>{{ $visitors->where('country', 'Bangladesh')->groupBy('ip')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Page visit from India</td>
                                    <td>{{ $visitors->where('country', 'India')->count() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Indian visitor</td>
                                    <td>{{ $visitors->where('country', 'India')->groupBy('ip')->count() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ip</th>
                                    <th>country</th>
                                    <th>city</th>
                                    <th>currency</th>
                                    <th>browser</th>
                                    <th>device</th>
                                    <th>os</th>
                                    <th>Created</th>
                                    <th>Url</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--    data imported by ajax datatables     --}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ip</th>
                                    <th>country</th>
                                    <th>city</th>
                                    <th>currency</th>
                                    <th>browser</th>
                                    <th>device</th>
                                    <th>os</th>
                                    <th>Created</th>
                                    <th>Url</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                @if(Request::is('visitorActivity.index'))
                    ajax: '{!! route('visitorActivity.index') !!}',
                @elseif(Request::is('visitor.today'))
                    ajax: '{!! route('visitor.today') !!}',
                @elseif(Request::is('visitor.last_seven_day'))
                    ajax: '{!! route('visitor.last_seven_day') !!}',
                @elseif(Request::is('visitor.last_thirty_day'))
                    ajax: '{!! route('visitor.last_thirty_day') !!}',
                @endif

                columns: [
                    { data: 'ip', name: 'ip' },
                    { data: 'country', name: 'country' },
                    { data: 'city', name: 'city' },
                    { data: 'currency', name: 'currency' },
                    { data: 'browser', name: 'browser' },
                    { data: 'device', name: 'device' },
                    { data: 'os', name: 'os' },
                    { data: 'create', name: 'create' },
                    { data: 'url', name: 'url' },
                ],
                order: [[ 0, 'desc' ]],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                    });
                }
            });
        });
    </script>
@endpush

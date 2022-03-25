@extends('admin::layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="table-rep-plugin">
                <form name="search">
                    <div class="row mb-3">
                        <div class="col-lg-2 mb-3">
                            <input type="text" name="account" placeholder="帳號" class="form-control">
                        </div>
                        <div class="col-lg-1 mb-3 text-right">
                            <button class="btn btn-primary waves-effect">查詢</button>
                        </div>
                    </div>
                </form>
                <div class="row mb-3">
                    <div class="offset-lg-8 col-lg-4 offset-md-7 col-md-5 offset-xl-9 col-xl-3 text-right">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="{{route('Admin.Point.create')}}" class="btn btn-primary waves-effect waves-light">點數操作</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" data-pattern="priority-columns" data-add-focus-btn="false" data-add-display-all-btn="false">
                    <table id="datatable" class="table table-hover" cellspacing="0" width="100%">
                        <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th data-priority="1">帳號</th>
                            <th data-priority="1">交易類型</th>
                            <th data-priority="1">交易前點數</th>
                            <th data-priority="2">交易點數</th>
                            <th data-priority="2">交易後點數</th>
                            <th data-priority="3">備註</th>
                            <th data-priority="5">操作時間</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
@push('style')
<link href="{{Universal::version('/dinj/admin/assets/plugins/daterangepicker/css/daterangepicker.css')}}" rel="stylesheet" />
@endpush
@push('javascript')
<script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/daterangepicker/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/daterangepicker/js/daterangepicker.min.js')}}"></script>
<script>
    var search = makeDataTable(
        "#datatable",
        "{{route('Dinj.PointRecords.index',[],false)}}",
        "GET",
        function(d) {
            d.form = $('form[name=search]').serializeObject();
        },
        [
            { data: "uuid",  className: "text-center", render: (data, type, full, meta) => { return meta.row + 1 + meta.settings._iDisplayStart;}},
            { data: "member",    className: "text-center" ,render:(data,type,row,meta) => { return data.account;}},
            { data: "cost_type",    className: "text-center" },
            { data: "before_point",    className: "text-center" },
            { data: "cost",    className: "text-center" },
            { data: "after_point",    className: "text-center" },
            { data: "remark",    className: "text-center" },
            { data: function(data) {
                return TimeFormat(data.created_at);
            }, className: "text-center"},
        ],
        function(){
        }
    );
    $("form[name=search]").submit(function() {
        search.ajax.reload(null, false);
        return false;
    });
    
</script>
@endpush
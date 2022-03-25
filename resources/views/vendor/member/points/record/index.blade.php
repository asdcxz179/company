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
                        <div class="col-lg-2 mb-3">
                            <input type="text" name="company" placeholder="公司名稱" class="form-control">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <input type="text" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <input type="text" name="phone" placeholder="手機電話" class="form-control">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <select name="status" class="form-control">
                                <option value="">狀態</option>
                                <option value="1">啟用</option>
                                <option value="0">停用</option>
                            </select>
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
                                <a href="{{route('Admin.Member.create')}}" class="btn btn-primary waves-effect waves-light">新增公司</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" data-pattern="priority-columns" data-add-focus-btn="false" data-add-display-all-btn="false">
                    <table id="datatable" class="table table-hover" cellspacing="0" width="100%">
                        <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th data-priority="1">公司編號</th>
                            <th data-priority="1">公司名稱</th>
                            <th data-priority="2">帳號</th>
                            <th data-priority="2">負責人</th>
                            <th data-priority="3">Email</th>
                            <th data-priority="4">手機電話</th>
                            <th data-priority="5">註冊時間</th>
                            <th data-priority="6">狀態</th>
                            <th data-priority="7">編輯</th>
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
            { data: "number",    className: "text-center"},
            { data: "company",    className: "text-center", render:(data,type,row,meta) => { return (row.info.find(item=>item.key=="company")??{}).value; }},
            { data: "account",    className: "text-center",render:(data,type,row,meta) => { return `<a href="/Backend/Member/${row.uuid}">${data}</a>`;} },
            { data: "name",    className: "text-center" },
            { data: "email",    className: "text-center", render:(data,type,row,meta) => { return (row.info.find(item=>item.key=="email")??{}).value; }},
            { data: "phone",    className: "text-center", render:(data,type,row,meta) => { return (row.info.find(item=>item.key=="phone")??{}).value; }},
            { data: function(data) {
                return TimeFormat(data.created_at);
            }, className: "text-center"},
            { data: "uuid",    className: "text-center", render:(data,type,row,meta) => { return `<input class="status" type="checkbox" ${((row.status)?'checked':'')} data-id="${data}" data-plugin="switchery" data-color="#64b0f2" data-size="small">`; }},
            { data: "uuid",    className: "text-center", render: (data,type,row,meta) => { return `<a href="/Backend/Member/${data}/edit"><i class="zmdi zmdi-edit text-info"></i></a>`; }},
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
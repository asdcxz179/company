@extends('admin::layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="table-rep-plugin">
                <!-- <form name="search">
                    <div class="row mb-3">
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
                </form> -->
                <div class="table-responsive" data-pattern="priority-columns" data-add-focus-btn="false" data-add-display-all-btn="false">
                    <table id="datatable" class="table table-hover" cellspacing="0" width="100%">
                        <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th data-priority="1">產品名稱</th>
                            <th data-priority="1">API費用</th>
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
@endpush
@push('javascript')
<script>
    var search = makeDataTable(
        "#datatable",
        "{{route('Dinj.Products.index',[],false)}}",
        "GET",
        function(d) {
            d.form = $('form[name=search]').serializeObject();
        },
        [
            { data: "id",  className: "text-center", render: (data, type, full, meta) => { return meta.row + 1 + meta.settings._iDisplayStart;}},
            { data: "name",    className: "text-center"},
            { data: "default_fee",    className: "text-center"},
            { data: "status",    className: "text-center" },
            { data: "id",    className: "text-center", render: (data,type,row,meta) => { return `<a href="/Backend/Products/${data}/edit"><i class="zmdi zmdi-edit text-info"></i></a>`; }},
        ],
        function(){
        }
    );
    // $("form[name=search]").submit(function() {
    //     search.ajax.reload(null, false);
    //     return false;
    // });
</script>
@endpush
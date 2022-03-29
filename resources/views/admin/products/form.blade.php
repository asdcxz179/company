@extends('admin::layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                    <form name="product" data-parsley-validate>
                        <fieldset class="form-group">
                            <label for="name">產品名稱<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="產品名稱" parsley-trigger="change" required data-parsley-length="[1,30]">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="default_fee">API費用<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="default_fee" id="default_fee" placeholder="API費用" parsley-trigger="change" required step="0.01">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="status">產品狀態<span class="text-danger">*</span></label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="1">啟用</option>
                                <option value="0">維護</option>
                            </select>
                        </fieldset>
                        <button type="button" onclick="location.href='{{ route('Admin.Products.index') }}'" class="btn btn-white waves-effect waves-light">回上一頁</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">確定</button>
                    </form>
                </div><!-- end col -->

            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>
@endsection
@push('style')
@endpush
@push('javascript')
<script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/i18n/zh_tw.js')}}"></script>
<script type="text/javascript">
   
    sendApi( "{{ route('Admin.Products.show',['Product' => request()->Product],false) }}","GET","", (data) => {
        setForm("form[name=product]", data.data);
    });
    sendForm('form[name=product]', "{{ route('Admin.Products.update',['Product' => request()->Product],false) }}", "PUT",function(data){
        toastr.options = {
            "showDuration": 100,
            "hideDuration": 300,
            "timeOut":1500,
            "onHidden": function() {
                location.href='{{ route('Admin.Products.index') }}';
            }
        };
        toastr.success(data.message);
    });
</script>
@endpush

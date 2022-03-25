@extends('admin::layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                    <form name="form" data-parsley-validate>
                        <fieldset class="form-group">
                            <label for="company_address">帳號<span class="text-danger">*</span></label>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <select name="account" class="form-control" required>
                                        <option value="">請選擇帳號</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="type">類型<span class="text-danger">*</span></label>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <select name="type" class="form-control" required>
                                        <option value="">請選擇類型</option>
                                        <option value="add">加值</option>
                                        <option value="sub">扣除</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="point">點數<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="point" id="point" placeholder="點數" parsley-trigger="change" required>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="remark">備註<span class="text-danger"></span></label>
                            <textarea name="remark" id="remark" cols="30" rows="10" class="form-control"></textarea>
                        </fieldset>
                        <button type="button" onclick="location.href='{{ route('Admin.PointRecords.index') }}'" class="btn btn-white waves-effect waves-light">回上一頁</button>
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
    sendApi( "{{ route('Dinj.Member.index',[],false) }}","GET","", (data) => {
        var str = `<option value="">請選擇帳號</option>`;
        data.data.original.data.map((item) => {
            str += `<option value="${item.account}">${item.account}</option>`;
        });
        $("select[name=account]").html(str);
    });
    
  
    sendForm('form[name=form]', "{{ route('Admin.Point.store',[],false) }}", "POST",function(data){
        toastr.options = {
            "showDuration": 100,
            "hideDuration": 300,
            "timeOut":1500,
            "onHidden": function() {
                location.href='{{ route('Admin.PointRecords.index') }}';
            }
        };
        toastr.success(data.message);
    });
</script>
@endpush

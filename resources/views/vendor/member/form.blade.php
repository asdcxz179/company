@extends('admin::layouts.main')
<?php $formType = ($method=="POST") ?>
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                    <form name="users" data-parsley-validate>
                        <fieldset class="form-group">
                            <label for="account">帳號<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="account" name="account" @if(!$formType) disabled @endif placeholder="帳號" required data-parsley-length="[6,20]" parsley-trigger="change" data-parsley-type="alphanum">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="name">姓名<span class="text-danger"></span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="姓名" parsley-trigger="change" data-parsley-length="[1,30]">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="email">Email<span class="text-danger"></span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" parsley-trigger="change" >
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="phone">手機電話<span class="text-danger"></span></label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="手機電話" parsley-trigger="change" minlength="10">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="sex">性別<span class="text-danger"></span></label>
                            <div class="row" id="sex">
                                <div class="radio radio-primary col-sm-2">
                                    <input type="radio" name="sex" id="radio1" value="1" data-parsley-errors-container="#sex-errors">
                                    <label for="radio1">
                                        {{__("member::Admin.SEX.1")}}
                                    </label>
                                </div>
                                <div class="radio radio-primary col-sm-2">
                                    <input type="radio" name="sex" id="radio2" value="0">
                                    <label for="radio2">
                                    {{__("member::Admin.SEX.0")}}
                                    </label>
                                </div>
                            </div>
                            <div id="permission_type-errors"></div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="birthday">生日<span class="text-danger"></span></label>
                            <input type="date" class="form-control" name="birthday" id="birthday" placeholder="生日" parsley-trigger="change" minlength="10">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="password">密碼@if($formType)<span class="text-danger">*</span>@endif</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="密碼" data-parsley-length="[6,20]" parsley-trigger="change"
                                @if($formType) required @endif
                            >
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="password_confirmation">確認密碼@if($formType)<span class="text-danger">*</span>@endif</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="確認密碼" data-parsley-length="[6,20]" parsley-trigger="change" data-parsley-equalto="#password"
                                @if($formType) required @endif
                            >
                        </fieldset>
                        <button type="button" onclick="location.href='{{ route('Admin.Member.index') }}'" class="btn btn-white waves-effect waves-light">回上一頁</button>
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
@if(!$formType)
<script>
    sendApi( "{{ route('Admin.Member.show',['Member' => request()->Member],false) }}","GET","", (data) => {
        setForm("form[name=users]", data.data);
        data.data.info.map((item) => {
            let object = new Object();
            object[item.key] = item.value;
            setForm("form[name=users]", object);
        });
    })
</script>
@endif
<script type="text/javascript">
    sendForm('form[name=users]', "{{ ($formType)?route('Admin.Member.store',[],false):route('Admin.Member.update',['Member' => request()->Member],false) }}", "{{$method}}",function(data){
        toastr.options = {
            "showDuration": 100,
            "hideDuration": 300,
            "timeOut":1500,
            "onHidden": function() {
                location.href='{{ route('Admin.Member.index') }}';
            }
        };
        toastr.success(data.message);
    });
</script>
@endpush

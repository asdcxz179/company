@extends('admin::layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                    <button type="button" onclick="location.href='{{ route('Admin.Member.index') }}'" class="btn btn-white waves-effect waves-light">回上一頁</button>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>
@endsection
@push('style')
@endpush
@push('javascript')
<script type="text/javascript" src="{{Universal::version('/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{Universal::version('/assets/plugins/parsleyjs/i18n/zh_tw.js')}}"></script>
<script src="{{Universal::version('/js/admin/service/message.js')}}"></script>
<script>
    sendApi( "{{ route('Admin.Member.show',['Member' => request()->Member],false) }}","GET","", (data) => {
        console.log(data);
    })
</script>
@endpush
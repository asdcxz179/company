@section('settings')
<div class="row mb-3">
    <div class="col-12">
        <button type="button" class="btn btn-sm btn-info waves-effect waves-light" data-toggle="modal" data-target="#setting-modal">
            <i class="zmdi zmdi-plus"></i>新增通道
        </button>
    </div>
</div>
@endsection
@section('settings_modal')
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="setting-modal" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">設定通道</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="setting" data-parsley-validate>
                <input type="hidden" name="account">
                <div class="modal-body">
                    <fieldset class="form-group">
                        <label for="channel">選擇通道<span class="text-danger">*</span></label>
                        <select class="form-control" name="channel" id="channel" required parsley-trigger="change">
                            <option value="">請選擇通道</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="name">名稱<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="名稱" parsley-trigger="change" required >
                    </fieldset>
                    <div id="setting_area"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">關閉</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">確定</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('javascript')
<script>
    var settings = {};
    sendApi( "{{ route('Dinj.Type.index',[],false) }}?type=email","GET","", (data) => {
        var str = `<option value="">請選擇通道</option>`;
        data.data.types.map((item) => {
            str += `<option value="${item.app}">${item.name}</option>`
        });
        $('form[name=setting] select[name=channel]').html(str);
        settings = data.data.settings;
    });
    $('form[name=setting] select[name=channel]').change(function(){
        var str = ``;
        let data = $(this).val();
        if(data) {
            settings[data].map(item => {
               str += `<fieldset class="form-group">
                            <label for="name">${item.name}<span class="text-danger">*</span></label>
                            <input type="${item.type}" class="form-control" name="${item.name}" placeholder="${item.name}" parsley-trigger="change" required >
                        </fieldset>`; 
            });
        }
        $('form[name=setting] #setting_area').html(str);
    });

    sendForm('form[name=setting]', "{{ route('Dinj.Channel.store',[],false) }}", "POST",function(data){
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
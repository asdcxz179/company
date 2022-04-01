@section('settings')
<div class="row mb-3">
    <div class="col-12">
        <button type="button" class="btn btn-sm btn-info waves-effect waves-light" data-toggle="modal" data-target="#setting-modal">
            <i class="zmdi zmdi-plus"></i>新增通道
        </button>
    </div>
</div>
<div class="row mb-3" id="channel_content">

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
                <input type="hidden" name="products_id" value="{{request()->Product}}">
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
    Object.defineProperties(detail,
        {
            code : {
                set: function(newValue) {
                    sendApi( `{{ route('Dinj.Type.index',[],false) }}?type=${newValue}`,"GET","", (data) => {
                        var str = `<option value="">請選擇通道</option>`;
                        data.data.types.map((item) => {
                            str += `<option value="${item.app}">${item.name}</option>`
                        });
                        $('form[name=setting] select[name=channel]').html(str);
                        settings = data.data.settings;
                    });
                    getChannel();
                }
            }
        }
    )
    
    function getChannel() {
        sendApi( "{{ route('Dinj.Channel.index',[],false) }}?products_id={{request()->Product}}","GET","", (data) => {
            var str = '';
            data.data.map(item=>{
                let checked = "";
                if(item.id == detail.channel) {
                    checked = "checked";
                }
                str += `<div class="col-3">
                            <div class="card m-b-20 ">
                                <div class="card-block">
                                    <div class="radio radio-success m-l-5">
                                        <input type="radio" name="channel" id="channel_${item.id}" value="${item.id}" ${checked}>
                                        <label for="channel_${item.id}"><h4 class="card-title">${item.name}</h4></label>
                                        <button type="button" class="btn btn-sm btn-danger float-right waves-effect waves-light delete-channel" data-id="${item.id}">刪除</button>
                                    </div>`
                let keys = Object.keys(item.setting);
                keys.map((key)=>{
                    str += `<p class="card-text">${key} : <span class="text-primary">${item.setting[key]}</span></p>`
                });
                                    
                str +=              `
                                </div>
                            </div>
                        </div>`
            });
            $('#channel_content').html(str);
        });
    }
    
    $('form[name=setting] select[name=channel]').change(function(){
        var str = ``;
        let data = $(this).val();
        if(data) {
            let keys = Object.keys(settings[data]);
            settings[data].map(item => {
                str += `<fieldset class="form-group">
                            <label for="name">${item.name}<span class="text-danger">*</span></label>
                            <input type="${item.type}" class="form-control" name="setting[${item.name}]" placeholder="${item.name}" parsley-trigger="change" required >
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
                // location.href='{{ route('Admin.Products.index') }}';
            }
        };
        $('#setting-modal').modal('hide');
        getChannel();
    });
    
    $(document).on('click','.delete-channel',function(){
        let value = $('form[name=product] input[name=channel]:checked').val();
        let id = $(this).data('id');
        if(value == id) {
            toastr.error("不得刪除已設定資料");
        }else{
            Swal.fire({
                title: '確定要刪除嗎?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "確定",
                cancelButtonText: "取消",
            }).then((result) => {
                if (result.isConfirmed) {
                    sendApi( `{{ route('Dinj.Channel.index',[],false) }}/${id}`,"DELETE","", (data) => {
                        toastr.options = {
                            "showDuration": 500,
                            "hideDuration": 500,
                        };
                        toastr.success(data.message);
                        getChannel();
                    });
                }
            });
        }
    });
</script>
@endpush
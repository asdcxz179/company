@section('settings')
<div class="row mb-3">
    <div class="col-12">
        <button type="button" class="btn btn-sm btn-info waves-effect waves-light" data-toggle="modal" data-target="#setting-modal">
            <i class="zmdi zmdi-plus"></i>新增通道
        </button>
    </div>
</div>
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
                        <label for="name">名稱<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="名稱" parsley-trigger="change" required >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="remark">備註<span class="text-danger"></span></label>
                        <textarea name="remark" id="remark" cols="30" rows="10" class="form-control"></textarea>
                    </fieldset>
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
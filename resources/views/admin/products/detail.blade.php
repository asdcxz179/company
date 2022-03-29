@extends('admin::layouts.main')
@section('content')

<div class="row">
    <div class="col-3">
        <div class="card-box" id="member_detail">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="logo" id="account"></h3>
                    </div>
                    <div class="float-right">
                        <h5>新增時間<br>
                            <small id="created_at"></small>
                        </h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">

                        <div class="float-left m-t-30">
                            <address>
                                <strong>狀態 : </strong><span class="label label-success" id="status_name"></span>
                                <br>
                                <strong>公司名稱 : </strong><span id="company"></span>
                                <br>
                                <strong>公司統一編號 : </strong><span id="uniform_number"></span>
                                <br>
                                <strong>公司電話 : </strong><span id="company_phone"></span>
                                <br>
                                <strong>公司地址 : </strong><span id="company_city"></span><span id="company_area"></span><span id="company_address"></span>
                                <br>
                                <strong>負責人 : </strong><span id="name"></span>
                                <br>
                                <strong>手機電話 : </strong><span id="phone"></span>
                                <br>
                                <strong>Email : </strong><span id="email"></span>
                                <br>
                                <strong>性別 : </strong><span id="sex"></span>
                                <br>
                                <strong>生日 : </strong><span id="birthday"></span>
                                <br>
                            </address>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="m-h-50"></div>

                <!-- <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead class="bg-faded">
                                <tr><th>#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total</th>
                                </tr></thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>LCD</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>1</td>
                                    <td>$380</td>
                                    <td>$380</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mobile</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>5</td>
                                    <td>$50</td>
                                    <td>$250</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>LED</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>2</td>
                                    <td>$500</td>
                                    <td>$1000</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>LCD</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>3</td>
                                    <td>$300</td>
                                    <td>$900</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Mobile</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>5</td>
                                    <td>$80</td>
                                    <td>$400</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
                <!-- <hr>
                <div class="hidden-print">
                    <div class="float-right">
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                    </div>
                    <div class="clearfix"></div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                    <button type="button" onclick="location.href='{{ route('Admin.Member.index') }}'" class="btn btn-white waves-effect waves-light">回上一頁</button>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div>
    <div class="col-6">
        <div class="card-box" id="member_key">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="logo" >API 金鑰</h3>
                    </div>
                </div>
                <hr>
                <div class="row" >
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>名稱</th>
                                    <th>金鑰</th>
                                    <th>密鑰</th>
                                    <th>備註</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                <tr>
                                    <td colspan="6" class="text-center">無</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="m-h-50"></div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#makeKey-modal">產生金鑰</button>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="makeKey-modal" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">產生金鑰</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="makeKey" data-parsley-validate>
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
                    <button type="submit" class="btn btn-primary waves-effect waves-light">產生</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('style')
@endpush
@push('javascript')
<script>
    sendApi( "{{ route('Dinj.Member.show',['Member' => request()->Member],false) }}","GET","", (data) => {
        var result = data.data;
        Object.keys(result).map((item)=>{
            let text = '';
            switch (item) {
                case "created_at":
                    text = TimeFormat(result[item]);
                    break;
                default:
                    text = result[item];
                    break;
            }
            $(`#member_detail #${item}`).text(text);
        });
        data.data.info.map((item) => {
            $(`#member_detail #${item.key}`).text(item.trans);
        });
        $("form[name=makeKey] input[name=account]").val(data.data.account);
    });

    function makeApiTable() {
        sendApi( "{{ route('Dinj.Key.show',['Key' => request()->Member],false) }}","GET","", (data) => {
            var str = "";
            data.data.map((item,key) => {
                str += `<tr>
                            <td>${(key+1)}</td>
                            <td>${item.name}</td>
                            <td>${item.key}</td>
                            <td>${item.secret}</td>
                            <td>${item.remark??""}</td>
                            <td>
                                <button class="btn btn-sm btn-danger waves-effect waves-light deleteKey" data-id="${item.id}">刪除</button>
                            </td>
                        </tr>`;
            });
            $(`#member_key #content`).html(str);
        });
    }

    makeApiTable();
    
    sendForm('form[name=makeKey]', "{{ route('Dinj.Key.store',[],false) }}", "POST",function(data){
        toastr.options = {
            "showDuration": 100,
            "hideDuration": 300,
            "timeOut":1500,
        };
        toastr.success(data.message);
        $("#makeKey-modal").modal("hide");
        makeApiTable();
        $("form[name=makeKey]")[0].reset();
        $("form[name=makeKey] button[type=submit]").attr("disabled",false);
    });

    $(document).on("click",".deleteKey",function(){
        sendApi( `{{ route('Dinj.Key.index',[],false) }}/${$(this).data("id")}`,"DELETE","", (data) => {
            toastr.options = {
                "showDuration": 100,
                "hideDuration": 300,
                "timeOut":1500,
            };
            toastr.success(data.message);
            makeApiTable();
        });
    });
</script>
@endpush
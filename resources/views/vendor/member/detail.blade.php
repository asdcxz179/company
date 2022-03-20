@extends('admin::layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
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
    </div><!-- end col -->
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
    })
</script>
@endpush
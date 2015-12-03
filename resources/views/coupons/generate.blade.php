@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Coupon Codes</div>
                <div class="panel-body">
                    <form action="{{ url('coupons/generate') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="coupon_codes">Coupon Codes CSV</label>
                            <input type="file" name="coupon_codes" id="coupon_codes">
                        </div>
                        <div class="form-group">
                            <label for="coupon_template">Coupon Template (.jpg, .png only)</label>
                            <input type="file" name="coupon_template" id="coupon_template">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


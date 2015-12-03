<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Coupon</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-info" style="margin-top: 50px;">
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
</body>
</html>


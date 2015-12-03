<?php

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use League\Csv\Reader;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return view('home');
});

$app->get('coupons/generate', function () use ($app) {
    return view('coupons.generate');
});

$app->post('coupons/generate', function (Request $request) use ($app) {
    $title = 'momo@'.time();
    $csvFile = $request->file('coupon_codes');
    $templateFile = $request->file('coupon_template');

    $csv = Reader::createFromPath($csvFile->getRealPath());
    $csv->setNewline("\r");
    $headers = $csv->fetchOne();
    $rows = $csv->setOffset(1)->fetchAll();

    $imageManager = new ImageManager();


    $filesystem = new \Illuminate\Filesystem\Filesystem();
    $filesystem->makeDirectory(storage_path('app/coupons/'. $title), 0777, true);

    //dd($rows);
    foreach ($rows as $row) {
        $code = $row[0];
        $template = $imageManager->make($templateFile->getRealPath());
        $template->text($code, 620, 310, function($font){
            $font->file(storage_path('app/fonts/Lato-Regular.ttf'));
            $font->size(24);
            $font->align('center');
        });
        $template->save(storage_path('app/coupons/'. $title.'/'.$code.'.'.$templateFile->getClientOriginalExtension()));
    }

    echo 'Done';
});
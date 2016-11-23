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
    $title        = 'momo@' . time();
    $csvFile      = $request->file('coupon_codes');
    $templateFile = $request->file('coupon_template');

    $csv     = Reader::createFromPath($csvFile->getRealPath());
    $csv->setNewline("\r");
    $headers = $csv->fetchOne();
    $rows    = $csv->setOffset(1)->fetchAll();

    $imageManager = new ImageManager();


    $filesystem = new \Illuminate\Filesystem\Filesystem();
    $filesystem->makeDirectory(storage_path('app/coupons/' . $title), 0777, true);

    $coordX   = $request->get('text_coord_x');
    $coordY   = $request->get('text_coord_y');
    $fontSize = $request->get('font_size');
    $fontColor = $request->get('font_color');
    //dd($rows);
    foreach ($rows as $row) {
        $code     = $row[0];
        $template = $imageManager->make($templateFile->getRealPath());
        $template->text($code, $coordX, $coordY, function($font) use($fontSize, $fontColor) {
            $font->file(storage_path('app/fonts/Lato-Bold.ttf'));
            $font->size($fontSize);
            $font->color($fontColor);
//            $font->align('center');
        });
        $template->save(storage_path('app/coupons/' . $title . '/' . $code . '.' . $templateFile->getClientOriginalExtension()));
    }

    echo 'Done';
});

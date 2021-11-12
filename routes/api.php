<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add', function (Request $request) {
    $model = new \App\Models\Member;
    $model->name = $request->name;
    $model->dob = $request->dob;
    $model->dod = $request->dod;
    $model->blood_group = $request->blood_group;
    $model->address = $request->address;
    $model->employed = $request->employed;
    $model->phones = $request->phones;
    $model->max_qualification = $request->max_qualification;
    $model->married = $request->married;
    $model->parent_id = $request->parent_id;
    $model->in_law = false;
    $model->male = $request->male;
    $model->aadhar = $request->aadhar;
    $model->email = $request->email;
    $model->alive = $request->alive;
    $model->occupation = $request->occupation;
    $model->save();

    if ($request->married) {
        $spouseModel = new \App\Models\Member();
        $spouseModel->name = $request->spouse['name'];
        $spouseModel->dob = $request->spouse['dob'];
        $spouseModel->dod = $request->spouse['dod'];
        $spouseModel->blood_group = $request->spouse['blood_group'];
        $spouseModel->address = $request->spouse['address'];
        $spouseModel->employed = $request->spouse['employed'];
        $spouseModel->phones = $request->spouse['phones'];
        $spouseModel->max_qualification = $request->spouse['max_qualification'];
        $spouseModel->married = $request->spouse['married'];
        $spouseModel->spouse_id = $model->id;
        $spouseModel->in_law = true;
        $spouseModel->male = $request->spouse['male'];
        $spouseModel->aadhar = $request->spouse['aadhar'];
        $spouseModel->email = $request->spouse['email'];
        $spouseModel->alive = $request->spouse['alive'];
        $spouseModel->fathers_name = $request->spouse['fathers_name'];
        $spouseModel->mothers_name = $request->spouse['mothers_name'];
        $spouseModel->occupation = $request->spouse['occupation'];
    }

    return response()->json(['message' => 'success']);
});

Route::get('parents', function () {
    $model = \App\Models\Member::with('spouse')->where('married', 1)->get();
    $data = [];
    foreach ($model as $member) {
        $temp = [
            'label' => $member->spouse ? $member->name . ' - ' . $member->spouse->name : $member->name,
            'value' => $member->id
        ];
        $data[] = $temp;
    }
});

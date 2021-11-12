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
    $parent = \App\Models\Member::find($request->parent['value']);
    $dob = NULL;
    $dod = NULL;
    if ($request->dob) {
        $d = explode("-", $request->dob);
        $dob = $d[2] . '-' . $d[1] . '-' . $d[0];
    }
    if ($request->dod) {
        $d = explode("-", $request->dod);
        $dod = $d[2] . '-' . $d[1] . '-' . $d[0];
    }
    $phones = [];
    foreach ($request->phones as $phone) {
        if ($phone) {
            $phones[] = $phone;
        }
    }
    $model = new \App\Models\Member;
    $model->name = $request->name;
    $model->dob = $dob;
    $model->dod = $dod;
    $model->blood_group = $request->blood_group;
    $model->address = $request->address;
    $model->employed = $request->employed;
    $model->phones = $phones;
    $model->max_qualification = $request->max_qualification;
    $model->married = $request->married;
    $model->parent_id = $request->parent['value'];
    $model->in_law = false;
    $model->male = $request->male;
    $model->aadhar = $request->aadhar;
    $model->email = $request->email;
    $model->alive = $request->alive;
    $model->occupation = $request->occupation;
    $model->level = $parent->level + 1;
    $model->save();

    if ($request->married) {
        $dob = NULL;
        $dod = NULL;
        if ($request->spouse['dob']) {
            $d = explode("-", $request->spouse['dob']);
            $dob = $d[2] . '-' . $d[1] . '-' . $d[0];
        }
        if ($request->spouse['dod']) {
            $d = explode("-", $request->spouse['dod']);
            $dod = $d[2] . '-' . $d[1] . '-' . $d[0];
        }
        $phones = [];
        foreach ($request->phones as $phone) {
            if ($phone) {
                $phones[] = $phone;
            }
        }
        $spouseModel = new \App\Models\Member();
        $spouseModel->name = $request->spouse['name'];
        $spouseModel->dob = $dob;
        $spouseModel->dod = $dod;
        $spouseModel->blood_group = $request->spouse['blood_group'];
        $spouseModel->address = $request->spouse['address'];
        $spouseModel->employed = $request->spouse['employed'];
        $spouseModel->phones = $phones;
        $spouseModel->max_qualification = $request->spouse['max_qualification'];
        $spouseModel->married = $request->spouse['married'];
        $spouseModel->spouse_id = $model->id;
        $spouseModel->in_law = true;
        $spouseModel->male = !$request->male;
        $spouseModel->aadhar = $request->spouse['aadhar'];
        $spouseModel->email = $request->spouse['email'];
        $spouseModel->alive = $request->spouse['alive'];
        $spouseModel->fathers_name = $request->spouse['fathers_name'];
        $spouseModel->mothers_name = $request->spouse['mothers_name'];
        $spouseModel->occupation = $request->spouse['occupation'];
        $spouseModel->level = $model->level;
        $spouseModel->save();
    }

    return response()->json(['message' => 'success']);
});

Route::get('parents', function () {
    $model = \App\Models\Member::with('spouse')->where('married', 1)->where('in_law', 0)->orderBy('name')->get();
    $data = [];
    foreach ($model as $member) {
        $temp = [
            'label' => $member->spouse ? $member->name . ' - ' . $member->spouse->name : $member->name,
            'value' => $member->id
        ];
        $data[] = $temp;
    }

    return $data;
});

Route::get('members', function () {
    $members = \App\Models\Member::with(['parent', 'parent.spouse', 'spouseof'])->get();
    $data = [];
    foreach ($members as $member) {
        $relation = '';
        if ($member->parent) {
            $relation = $member->parent->name . ' - ' . $member->parent->spouse->name . ' (Parents)';
        } elseif ($member->in_law) {
            $relation = $member->spouseof->name;
            if ($member->male) {
                $relation .= ' (Wife)';
            } else {
                $relation .= ' (Husband)';
            }
        }
        $temp = [
            'id' => $member->id,
            'name' => $member->name,
            'relation' => $relation
        ];
        $data[] = $temp;
    }
    return $data;
});

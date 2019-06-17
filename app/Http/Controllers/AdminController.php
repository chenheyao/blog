<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function add()
    {
        return view('admin.add');
    }

    public function addHandel(Request $request)
    {
        $date=request()->all();
        $request->validate([
            'name' => 'required|unique:admin|max:5',
            'age' => 'required',
            'tel' => 'required',
            'email' => 'required',
        ],[
            'name.required'=>'姓名不能为空',
            'name.unique'=>'该姓名已存在',
            'name.max'=>'姓名不能大于5个字符',
            'age.required'=>'年龄不能为空',
            'tel.required'=>'电话不能为空',
            'email.required'=>'邮箱不能为空不能为空',
        ]);
           
        $data=DB::table('admin')->insert([
            'name' =>$date['name'],
            'sex' =>$date['sex'],
            'age' =>$date['age'],
            'tel' =>$date['tel'],
            'email' =>$date['email']
        ]);
        if($data){
            return redirect('admin/index');
        }
    }

    public function index()
    {
        $data=DB::table('admin')->get();
        return view('admin.index',['data'=>$data]);
    }

    public function del($id)
    {
        $data=DB::table('admin')->where(['id'=>$id])->delete();
        if($data){
            return redirect('admin/index');
        }
    }

    public function edit($id){
        $data=DB::table('admin')->where(['id'=>$id])->first();
        return view('admin.edit',['data'=>$data]);
    }

    public function editHandel($id)
    {
        $date=request()->all();
        $res=DB::table('admin')->where(['id'=>$id])->update([
            'name' =>$date['name'],
            'sex' =>$date['sex'],
            'age' =>$date['age'],
            'tel' =>$date['tel'],
            'email' =>$date['email']
        ]);
        if($res){
            return redirect('admin/index');
        }else{
            return redirect('admin/index');
        }
    }
}
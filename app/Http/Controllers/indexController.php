<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Tools\Tools;
use DB;

class indexController extends Controller
{
    public function add()
    {
        
        return view('index.add');
    }

    public function addHandel(Request $request)
    {
        
        $data=$request->all();  
        $data['time'] = time();
        // dd($request->hasFile('img'));
        if($request->hasFile('img')){
            $res= $this->upload($request,'img');
            // dd($res);
           if($res['code']){
               $data['img'] = $res['imgurl'];
           }
         }
        $res=DB::table('index')->insert([
            'name'=>$data['name'],
            'img' =>$data['img'],
            'number'=>$data['number'],
            'time' =>$data['time']
        ]);
        
        if($res){
            return redirect('index/list');
        }
    }
    public function upload(Request $request,$file)
    {
        if($request->file($file)->isValid()){
            $photo = $request->file($file);
            //dd($photo);
             //$extension = $photo->extension();         
             $store_result = $photo->store(date('Ymd'));         
              //$store_result = $photo->storeAs('photo', 'test.jpg');         
            return ['code'=>1,'imgurl'=>$store_result];
        }else{
            return ['code'=>0,'message'=>'上传错误'];
        }
    } 

    public function list(Request $request)
    {
        $redis=new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num=$redis->incr('num');
        echo $num."<br>";
      
        $req=$request->all();
        $where=[];
        if($req['name']??''){
            $where[]=['name','like',"%$req[name]%"];
        }
        $data=DB::table('index')->where($where)->paginate(2);
       return view('index.list',['data'=>$data,'req'=>$req]);
    }

    public function del($id)
    {
        $data=DB::table('index')->where(['id'=>$id])->delete();
        if($data){
            return redirect('index/list');
        }
    }

    public function edit($id)
    {
        $data=DB::table('index')->where(['id'=>$id])->first();
        return view('index.edit',['data'=>$data]);
    }

    public function editHandel($id)
    {
        $data=request()->all();
        $res=DB::table('index')->where(['id'=>$id])->update([
            'name'=>$data['name'],
            'number'=>$data['number'],
        ]);
        if($res){
            return redirect('index/list');
        }else{
            return redirect('index/list');
        }
        
    }
}

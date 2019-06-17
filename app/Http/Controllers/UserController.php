<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Tools\Tools;
use DB;
 
class UserController extends Controller
{
  public $tools;
  public $redis;
  public function __construct(Tools $tools){
    $this->tools =$tools;
    $this->redis =$this->tools->getRedis();
  } 

public function loginAdd()
{
  return view('user.loginAdd');
}

public function loginHandel()
{
  $title=request()->title;
  $pwd=request()->pwd;
  $data=DB::table('login')->where('title',$title)->where('pwd',$pwd)->first();
  if($data){
    session(['id'=>$data->id]);
    return ['code'=>'1'];
  }else{
    return ['code'=>'2'];
  }
}

public function loginSave()
{
  return view('user.loginSave');
}

public function saveAdd()
{
  $data=request()->all();
  $date=DB::table('login')->insert([
    'title' =>$data['title'],
    'pwd' =>$data['pwd']
  ]);
  if($date){
    return redirect('user/loginAdd');
  }
  
}

  public function add()
  {
    // $redis= new \Redis();
    // $redis->connect('127.0.0.1','6379');
    // $redis->incr('num');
    // $num =$redis->get('num');
    // echo $num."<br/>";
  
      return view('user.add');
  }

  public function addHandel(Request $request)
  {
       $data =request()->except(['_token']);
      $path = $request->file('file')->store('public');
      echo asset('storage'.'/'.$path);
      $date =DB::table('user')->insert($data);
      if($date){
          return redirect('user/list');
      }     
  }

  public function list()
  { 
    $query =request()->all();
    $where=[];
    if($query['username']??''){
      $where[]=['username','like',"%$query[username]%"];
    }
      $data=DB::table('user')->where($where)->paginate(2);
       return view('user.list',['data'=>$data,'query'=>$query]); 
  }
  public function del($id)
  {
    $date=DB::table('user')->where(['id'=>$id])->delete();
    if($date){
        return redirect('user/list');
    }
  }

  public function edit($id)
  {
      $data=DB::table('user')->where(['id'=>$id])->first();
    return view('user.edit',['data'=>$data]);
  }

  public function update($id)
  {
    $data=request()->except('_token');
    $date=DB::table('user')->where(['id'=>$id])->update($data);
    if($date){
        return redirect('user/list');
    }else{
      return redirect('user/list');
    }
  }
}

<link rel="stylesheet" href="{{asset('css/page.css')}}" type="text/css">
<form action="">
    <input type="text" name='username' value="{{$query['username']??''}}">
   <button>搜索</button>
</form>
<table border=1>
    <tr>
        <td>ID</td>
        <td>姓名</td>
        <td>性别</td>
        <td>电话</td>
        <td>图片</td>
        <td>操作</td>
    </tr>
    @if($data)
    @foreach($data as $v)
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->username}}</td>
        <td>{{$v->sex}}</td>
        <td>{{$v->tel}}</td>
        <td>{{$v->file}}</td>
        <td>
        <a href="{{url('user/del',['id'=>$v->id])}}">删除</a>
        <a href="{{url('user/edit',['id'=>$v->id])}}">修改</a>
        </td>
    </tr>
    @endforeach
    @endif
</table>
{{$data->appends($query)->links()}}
<link rel="stylesheet" href="{{asset('css/page.css')}}" type="text/css">
<form action="">
    <input type="text" name="name"  value="{{$req['name']??''}}">
    <button>搜索</button>
</form>
 <table border=1>
        <tr>
            <td>货物名称</td>
            <td>货物图片</td>
            <td>库存</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        @if($data)
       @foreach($data as $v)
        <tr>
            <td>{{$v->name}}</td>
            <td>
                <img src="{{config('app.img_url')}}{{$v->img}}" width="100">
            </td>
            <td>{{$v->number}}</td>
            <td>{{date('Y-m-d',$v->time)}}</td>
            <td>
            <a href="{{url('index/del',['id'=>$v->id])}}">删除</a>
            <a href="{{url('index/edit',['id'=>$v->id])}}">修改</a>
            </td>
        </tr>
        @endforeach
        @endif
</table>
{{$data->appends($req)->links()}}
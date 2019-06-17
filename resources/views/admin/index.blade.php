<table border=1>
    <tr>
        <td>ID</td>
        <td>姓名</td>
        <td>性别</td>
        <td>年龄</td>
        <td>电话</td>
        <td>邮箱</td>
        <td>操作</td>
    </tr>
    @foreach($data as $v)
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->sex}}</td>
        <td>{{$v->age}}</td>
        <td>{{$v->tel}}</td>
        <td>{{$v->email}}</td>
        <td>
            <a href="{{url('admin/del',['id'=>$v->id])}}">删除</a>
            <a href="{{url('admin/edit',['id'=>$v->id])}}">修改</a>
        </td>
    </tr>
    @endforeach
</table>
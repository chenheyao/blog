<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('admin/editHandel/'.$data->id)}}" method='post'>

    @csrf
        <table border=1>
            <tr>
                <td>用户名：</td>
                <td><input type="text" name="name" value="{{$data->name}}"></td>
            </tr>
            <tr>
                <td>性别：</td>
                <td>
                    <input type="radio" name="sex" value="男" {{$data->sex=='男'?'checked':''}}>男
                    <input type="radio" name="sex" value="女" {{$data->sex=='女'?'checked':''}}>女
                </td>
            </tr>
            <tr>
                <td>年龄：</td>
                <td><input type="text" name="age"  value="{{$data->age}}"></td>
            </tr>
            <tr>
                <td>电话：</td>
                <td><input type="text" name="tel"  value="{{$data->tel}}"></td>
            </tr>
            <tr>
                <td>邮箱：</td>
                <td><input type="text" name="email"  value="{{$data->email}}"></td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>
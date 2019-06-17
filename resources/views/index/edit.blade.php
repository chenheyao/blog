<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('index/editHandel/'.$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
        <table border=1>
            <tr>
                <td>商品名称</td>
                <td><input type="text" name="name" value="{{$data->name}}"></td>
            </tr>
            <tr>
                <td>商品图片</td>
                <td><input type="file" name="img" value="{{$data->img}}"></td>
            </tr>
            <tr>
                <td>商品库存</td>
                <td><input type="text" name="number" value="{{$data->number}}"></td>
            </tr>
            <tr>
                <td><input type="submit" value="提交"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>
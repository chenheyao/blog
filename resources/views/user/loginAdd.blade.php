<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
    <form action="">
        <table border=1>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="title" id="title"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="pwd" id="pwd"></td>
            </tr>
            <tr>
                <td>
                <input type="submit" value="提交" id="sub">
                <a href="{{url('user/loginSave')}}">注册</a>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>
<script>
    $(function(){
       $.ajaxSetup({
           headers:
           {
               'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
       });
        $("#sub").click(function(){
            var title=$("#title").val();
            var pwd=$("#pwd").val();
            $.post(
                "loginHandel",
                {title:title,pwd:pwd},
                function(msg){
                    if(msg.code==1){
                        alert('登录成功');
                        location.href='/user/add';
                    }else{
                        alert('登录失败');
                    }
                }
            )
            return false;
        })
    })
</script>
<html>
<head>
    <title>Form Login</title>

    <style>
    body{
        background: url('src/gmbr.jpg');
        margin:0;
        font-family: 'Open Sans', sans-serif;
    }

    fieldset{
        margin:100 auto;
        width:370px;
        height:450px;
        border:2px solid white;
        background-color: grey;
    }

    label{
        font-family:tahoma;
        color:green;
    }

    input{
        position :center;
        margin:5px;
        padding:10px;
        width:350px;
        height:40px;
        border : 1px solid white;
        border-radius :10px;
    }

    select{
        position: center;
        margin: 5px;
        padding: 10px;
        width: 300px;
        height: 40px;
        border: 1px solid white;
        border-radius: 10px;
    }

    #submit
{
    color: white;
    background-color: #428df5;
}

#input
{
    background-color: #f1f1f1;
}
</style>
</head>

<body>

    <h1 align="center"> SPP : ONLINE</h1>

    <form action="login_validasi.php" method="post">
    <fieldset>

    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>

    <legend align="center">
        <img src="src/jb.png" width="90" height="85">
    </legend>

    <table>
        <p align="center"><b>LOGIN</b></p>

        <tr>
            <td>
                <input name="username" type="text" placeholder="Username" id="input">
            </td>
        </tr>

        <tr>
            <td>
                <input name="password" type="password" placeholder="Password" id="input">
            </td>
        </tr>

        <tr></tr>
        <tr></tr>

        <tr>
            <td>
                <input name="login" type="submit" value="LOGIN" id="submit">
            </td>
        </tr>
        <tr><td> </tr></td>
         <tr><td> </tr></td>
         <tr><td align="center"> <a href = "bayar.php"> CEK PEMBAYARAN </a></tr></td> 



    </table>

    </fieldset>

</form>
</body>
</html>
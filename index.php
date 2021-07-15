<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #leftbox {
        float:left; 
        width:33%;
        height:280px;
    }
    #middlebox{
        float:left; 
        width:33%;
        height:280px;
    }
    #rightbox{
        float:right;
        width:33%;
        height:280px;
    }
    h1{
        color:blue;
        text-align:center;
    }
</style>
<body>
    <h1>This is a simple demo of AWS face recognition</h1>
    <div id = 'boxes'>
        <div id = 'leftbox'>
            <img src='Capture1.png'/>
        </div> 
        <div id = 'middlebox'>
            <img src='Capture2.png'/>
        </div>
        <div id = 'rightbox'>
            <img src='my1.jpg'/>
        </div>
    </div>
    <form method="get" action="facematch.php">
    <div id = 'boxes'>
        <div id = 'leftbox'>
            <h2>Reference Image</h2>
        </div> 
        <div id = 'middlebox'>
            <button type="submit" name="imagematch" value="Capture2.png">Match This with Reference</button>
        </div>
        <div id = 'rightbox'>
            <button type="submit" name="imagematch" value="my1.jpg">Match This with Reference</button>
        </div>
    </div>
    </form>
</body>
</html>
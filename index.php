<?php 
    $conn=mysqli_connect("localhost", "root", 111111);
    mysqli_select_db($conn, "opentutorials");
    $result=mysqli_query($conn,"SELECT*FROM topic");
   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header img{
            float: right;
            width: 100px;
            height: 100px;
        }
        h1 {
            text-align: center;
            border-bottom: 1px solid gray;
            padding: 50px; margin: 0;
            }

        ul {
            border-right: 1px solid gray;
            width: 150px; margin:0;
            padding: 40px;
        }

        body { 
        margin: 0;
        }

        body.white{  
            background-color: white;
        color:black;
        }
        body.black{
            background-color: black;
        color:white;
        }
        #control{
            float: right;
            width: 100px;
            height: 20px;
            padding: 20px;
        }
        #grid{
            display: grid;
            grid-template-columns: 270px 1fr;
        }

        @media(max-width: 900px){
            #grid{
                display: block;
            }
            ul{border-right:none;}
            div{padding: 15px;}
        }


    </style>
</head>
<body id = "target">
    <header>
    <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩">
    </header>
    <h1><a href="index.php">hello coding!</a></h1>

    <div id="grid">
    <ul>
    <?php
    while($row=mysqli_fetch_assoc($result)){
    echo '<li><a href="http://localhost/firstproject/php/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
    }
    ?>
    </ul>


    <div>
        <div id ="control">
            <input type = "button" value ="white" onclick="document.getElementById('target').className='white'"/>
            <input type = "button" value="black" onclick="document.getElementById('target').className='black'"/>
            <a href="http://localhost/firstproject/php/write.php">쓰기</a>
    </div>
    <article>
       
        <?php
        if(empty($_GET['id'])===false){
        $sql='SELECT*FROM topic WHERE id='.$_GET['id'];
        $sql="SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<h2>'.$row['title'].'</h2>';
        echo '<p>'.$row['name'].'</p>';
        echo $row['description'];
        }
        ?>
    
    </article>
</body>
</html>
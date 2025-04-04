<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="index.html">
    <title>Services</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body{
            width: 100%;
            background-color: #809faa;
        }
        .title h1{
            text-align: center;
            padding-top: 50px;
            font-size: 42px;
        }
        .title h1::after{
            content: "";
            height: 4px;
            width: 230px;
            background-color: #000;
            display: block;
            margin: auto;
        }
        .services{
            width: 85%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 75px auto;
            text-align: center;
        }
        .card{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
            margin: 0px 20px;
            padding: 20px 20px;
            background-color: #efefef;
            border-radius: 10px;
            cursor: pointer;
        }
        .card:hover{
            background-color: #b8d4de;
            transition: 0.4s ease;
        }
        .card .icon{
            font-size: 35px;
            margin-bottom: 10px;
        }
        .card h2{
            font-size: 28px;
            color: #c94f4f;
            margin-bottom: 20px;
        }
        .card p{
            font-size: 17px;
            margin-bottom: 30px;
            line-height: 1.5;
            color: #5e5e5e;
        }
        .button{
            font-size: 15px;
            text-decoration: none;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            letter-spacing: 1px;
            background-color: #2c677c;
        }
        .button:hover{
            background-color: #c94f4f;
            transition: 0.4s ease;
        }
        @media screen and (max-width: 940px) {
            .services{
                display: flex;
                flex-direction: column;
            }
            .card{
                width: 85%;
                display: flex;
                margin: 20px 0px;
            }
        }
    </style>
</head>
<body>
    <div class="section">
        <div class="title">
            <h1>Our Services</h1>
        </div>
        <div class="services">
           <div class="card">
            <div class="icon">
                <i class="fa-solid fa-person-running"></i>  
            </div>
            <h2>Strength Training</h2>
            <p>In this program , you are trained to improve your Strength through many exercises</p>
            <a href="" class="button">Read More</a>
           </div>
           <div class="card">
            <div class="icon">
                <i class="fa-solid fa-fire"></i>
            </div>
            <h2>Fat Burning</h2>
            <p>This program is suitable for you who wants to get rid of your fat and lose their weight</p>
            <a href="" class="button">Read More</a>
           </div>
           <div class="card">
            <div class="icon">
                <i class="fa-solid fa-heart"></i>
            </div>
            <h2>Health Fitness</h2>
            <p>This program is designed for those who exercises only for their body fitness not body building</p>
            <a href="" class="button">Read More</a>

           </div>
        </div>
    </div>
</body>
</html>
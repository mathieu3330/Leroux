<!DOCTYPE html>
<html>
<head>
    <title>Outillage - {{ $data['outillage'] }}</title>
    <style>
        .logo img {
            width: 120px;
            float: right;
        }
        .list .label {
           font-weight: bold;
        }
        .img-response {
            max-height: 300px;
        }
    </style>
</head>
<body>

    <div class="logo">
        <img src="{{ public_path('logo.jpg') }}" alt="leroux logo">
    </div>
    
    <div class="project">
        <h2>Outillage - {{ $data['outillage'] }}</h2>
        <div class="details">
            <p><b>Date:</b> {{ $data['date'] }}</p>
            <p><b>Prenom:</b> {{ $data['prenom'] }}</p>
            <p><b>Nom:</b> {{ $data['nom'] }}</p>
            <p><b>Outil:</b> {{ $data['outil'] }}</p>
            <p><b>Commentaire:</b> {{ $data['comment'] }}</p>
            <p><b>Images:</b></p>
            <p>
            @if(isset($data['image-url-out']))
                <img class="img-response" src="{{ public_path() . '/' . $data['image-url-out'] }}" alt="{{ $data['image-url-out'] }}"/>
            @endif
            </p>

            <p>
            @if(isset($data['image1-url-out']))
                <img class="img-response" src="{{ public_path() . '/' . $data['image1-url-out'] }}" alt="{{ $data['image1-url-out'] }}"/> 
            @endif
            </p>
        </div>
    </div>
    
</body>
</html>
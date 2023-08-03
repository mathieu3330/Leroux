<!DOCTYPE html>
<html>
<head>
    <title>Outillage - {{ $data['outillage'] }}</title>
    <style>
        .logo img {
            width: 120px;
            float: right;
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
            <p><b>Image:</b></p>
            <p>
                <img class="img-response" src="{{ public_path() . '/' . $data['image-url-out'] }}" alt="{{ $data['image-url-out'] }}"/>
            </p>
        </div>
    </div>
    
</body>
</html>
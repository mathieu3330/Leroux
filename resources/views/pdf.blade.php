<!DOCTYPE html>
<html>
<head>
    <title>{{ $checklist }}</title>
    <style>
        .logo img {
            width: 120px;
            float: right;
        }
        .list .label {
           font-weight: bold;
        }
        .list .img-response {
            max-height: 300px;
        }
    </style>
</head>
<body>

    <div class="logo">
        <img src="{{ public_path('logo.jpg') }}" alt="leroux logo">
    </div>
    
    <div class="project">
        <h2>Compte rendu du : {{ $reportDate }}</h2>
        <div class="details">
            <p><b>Ville:</b> {{ $data['ville'] }}</p>
            <p><b>Promoteur:</b> {{ $data['promoteur'] }}</p>
            <p><b>N Etudes:</b> {{ $data['numetude'] }}</p>
            <p><b>Localisation:</b> {{ $data['Localisation'] }}</p>
        </div>
    </div>
    
    <div class="questions">
        <div class="list">
            @foreach ($questions as $question)
                <p class="label"><u> {{ 'Question-' . $loop->iteration . ': ' }}</u> {{ $question->question }} </p>
                @if(array_key_exists('Q' . $loop->iteration, $data))
                    <p class="response"> {{ CustomHelpers::mapToLabel($data['Q' . $loop->iteration]) }}</p>
                @else
                    <p class="response"> - </p>
                @endif

                @if(array_key_exists('image-url-Q' . $loop->iteration, $data) && !is_null($data['image-url-Q' . $loop->iteration]))
                <img class="img-response" src="{{ public_path() . '/' . $data['image-url-Q' . $loop->iteration] }}" alt="{{$data['image-url-Q' . $loop->iteration] }}"/>
                @endif

            @endforeach
        </div>
    </div>

</body>
</html>
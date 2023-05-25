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
        .rotate-right-90 {
            transform: rotate(90deg);
        }
        .margin {
            margin-top: 5px;
            margin-bottom: 5px;
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

                @if(array_key_exists('img-Q' . $loop->iteration, $data))
                <img class="img-response rotate-right-90 margin" src="data:{{$data['img-Q' . $loop->iteration]->getClientMimeType()}};base64,{{base64_encode($data['img-Q' . $loop->iteration]->get())}}"/>
                @endif

            @endforeach
        </div>
    </div>

</body>
</html>
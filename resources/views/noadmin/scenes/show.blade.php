<x-app-layout>

    <style>
        iframe {
            width: 500px;
            height: 500px;
        }

    </style>


    <div class="container py-2 sm:py-8 lg:py-40">

        <iframe allowvr="yes" allowfullscreen="yes" src="{{$url}}" class="embed-responsive-item container well well-small span6" frameborder="0"></iframe>
        <div class="text-center pt-4" >
            @php
                $type = 'final';
            @endphp
            <a href="{{route('questions.index',[$scene, $type])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Terminar Experiencia</a>
        </div>
    </div>

    <br />





</x-app-layout>

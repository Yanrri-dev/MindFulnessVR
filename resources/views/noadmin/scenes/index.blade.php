<x-app-layout>

    <div class="container py-8" >

        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            @foreach ($scenes as $scene)
                <article class="w-full h-80 bg-cover bg-center"style="background-image: url(@if($scene->image){{Storage::url($scene->image->url)}}@else https://cooperativa.cl/noticias/site/artic/20210225/imag/foto_0000000120210225100311.jpg @endif) ">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            @php
                                $type= 'inicio'
                            @endphp
                            <a href="{{route('questions.index',[$scene, $type])}}">
                                {{$scene->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach

        </div>

    </div>

</x-app-layout>

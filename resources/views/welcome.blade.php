<x-app-layout>

    <style>
        .snap-x {
            scroll-snap-type: x mandatory;

          scroll-behavior: smooth;
          -webkit-overflow-scrolling: touch;
        }
        .snap-start {
          scroll-snap-align: start;
        }

    </style>


    <div class="flex flex-col items-center m-8">

        <div class="w-full bg-white rounded overflow-x-hidden flex snap-x" style="height: 40vh">

        <div class="snap-start w-full h-full flex items-center justify-center text-white text-4xl font-bold flex-shrink-0 bg-black relative" id="slide-1">
            <img src="{{Storage::url('/scenes/torres-del-paine-12xchile-1.jpg')}}" class="h-full w-full object-cover absolute inset-0 z-10 opacity-25">
            <h1 class="z-20 text-center">MindFulness VR</h1>
        </div>
        <div class="snap-start w-full h-full flex items-center justify-center text-white text-4xl font-bold flex-shrink-0 bg-black relative" id="slide-2">
            <img src="{{Storage::url('/scenes/siete-tazas-salto-la-leona-12xchile-1.jpg')}}" class="h-full w-full object-cover absolute inset-0 z-10 opacity-25">
            <h1 class="z-20 text-center">MindFulness VR</h1>
        </div>
        <div class="snap-start w-full h-full flex items-center justify-center text-white text-4xl font-bold flex-shrink-0 bg-black relative" id="slide-3">
            <img src="{{Storage::url('/scenes/desierto-atacama-12xchile-1.jpg')}}" class="h-full w-full object-cover absolute inset-0 z-10 opacity-25">
            <h1 class="z-20 text-center">MindFulness VR</h1>
        </div>
        </div>

        <div class="flex mt-8">
            <a class="w-8 mr-1 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center" href="#slide-1">1</a>
            <a class="w-8 mr-1 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center" href="#slide-2">2</a>
            <a class="w-8 mr-1 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center" href="#slide-3">3</a>
        </div>
    </div>

</x-app-layout>

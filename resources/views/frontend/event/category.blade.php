@extends('app')

@section('title',$Category->category_name)

@section('content')
    <div class="container p-6">

        <div class="flex-column md:flex p-6">
            <div class="w-full md:w-1/4 mb-6">
                <div class="">
                    <h3 class="text-2xl font-normal text-black px-2 rounded-t uppercase border-b border-gray-200">{{ $Category->category_name }}</h3>
                    <ul class="mt-2">
                        @foreach($Category->ChildCategories as $ChildCategory)
                            <li class="font-thin text-xl uppercase px-2 py-1 hover:text-primary">
                                <a href="{{ url('category/'.$ChildCategory->slug) }}">{{ $ChildCategory->category_name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="w-full md:w-3/4 ml-6 mr-6">
                <div class="container flex flex-wrap">
                    @forelse($Category->Events as $Event)
                        <div class="w-full p-2 rounded mb-6">
                            <div class="w-full shadow-lg rounded">
                                <div class="flex border border-gray-200 rounded hover:border-gray-300">
                                    <div class="w-full md:w-1/3">
                                        <img class="rounded-l shadow-lg w-full h-full" src="{{ asset('images/1.png') }}" />
                                    </div>

                                    <div class="w-full md:w-2/3">
                                        <a class="m-3 text-black font-normal text-lg block" href="{{ url('event/'.$Event->slug) }}">
                                            {{ $Event->title }}
                                        </a>

                                        <div class="m-3 text-sm text-justify">
                                            {{ Str::limit($Event->description,250) }}
                                        </div>
                                        <div class="bg-gray-100 shadow-inner p-2 rounded-b flex text-center items-stretch">
                                            <div class="w-1/3 text-xs border-r">
                                                {{ json_decode($Event->date)[0] }}
                                            </div>
                                            <div class="w-1/3 text-xs border-r align-middle self-stretch">
                                                <a href="{{ url('place/'.$Event->place->slug)  }}">{{ $Event->place->name}}</a>
                                            </div>
                                            <div class="w-1/3 text-xs align-middle self-stretch">
                                                <a href="{{ url('organizer/'.$Event->Organizer->slug) }}">{{ $Event->Organizer->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <message title="Upss !" message="Bu Kategoriye Henüz Etkinlik Girilmedi" color="blue"/>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import MyInput from "../../../js/components/MyInput";
    export default {
        components: {MyInput}
    }
</script>

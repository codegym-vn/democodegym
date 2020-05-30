@extends("layout")

@section("content")
    @foreach($articles as $article)
        <div class="row article-item">
            <div class="col-md-2 feature-image">
                <img src="{{asset("storage/".$article->feature)}}"/>
            </div>
            <div class="col-md-6">
                <h4 class="article-item-title"><a href="{{route("articles.show", ["id" => $article->id])}}">{{$article->title}}</a></h4>
                <p>{{substr($article->content, 0, 200)}}</p>
            </div>
        </div>
    @endforeach
@endsection
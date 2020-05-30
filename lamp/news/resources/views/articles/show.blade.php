@extends("layout")

@section("content")
    <div class="row">
        <div class="col-md-8 article-controls">
            <form method="post" action="{{route("articles.delete", ["id"=>$article->id])}}" onsubmit="return confirm('Are you sure?');">
                {{csrf_field()}}
                <input type="submit" class="btn btn-danger pull-right" value="DELETE"/>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 article-feature">
            <img src="{{asset("storage/".$article->feature)}}"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3>{{$article->title}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <p>
                {{$article->content}}
            </p>
        </div>
    </div>
@endsection
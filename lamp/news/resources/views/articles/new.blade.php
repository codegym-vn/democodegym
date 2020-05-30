@extends("layout")

@section("content")
    <h2>Create new article</h2>
    <div class="row">
         <div class="col-md-8">
             <form method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
                 <div class="form-group">
                     <label>Title</label>
                     <input type="text" name="title" class="form-control"/>
                 </div>
                 <div class="form-group">
                     <label>Content</label>
                     <textarea class="form-control article-content" name="content" ></textarea>
                 </div>
                 <div class="form-group">
                     <label>Feature</label>
                     <input type="file" name="feature" class="form-control"/>
                 </div>

                 <div class="form-group">
                     <input type="submit" class="btn btn-success" value="Create"/>
                 </div>
             </form>
         </div>
    </div>
@endsection
<?php
    use App\Models\ArticlesExtra;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
    <div class="container">
        <a href="/dashboard/articles/create" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new Articles</a>
        

        @foreach ($articles as $article)
        <?php
            $cats = ArticlesExtra::where(['article_id'=>$article->id])->first();
            $finalCats = explode(",",$cats->cats);
        ?>
            <div class="col-md-12">
                <a href="/dashboard/articles/{{ $article->id }}"><h1>{{ $article->title }}</h1></a>
                <span class="badge">{{ $article->created_at }}</span>

                <div class="pull-right">
                    @foreach ($finalCats as $cat)
                        <span class="label label-danger">{{ $cat }}</span>
                    @endforeach
                </div>

                <a href="/dashboard/articles/{{ $article->id }}/edit" class='btn btn-info btn-xs'><span class="glyphicon glyphicon-edit"></span> Edit </a> 
                
                <form action="/dashboard/articles/{{ $article->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">
                        <a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
@extends('layouts.app')

@section('content')
    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой статьи -->
        <form action="{{ route('admin.article.store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя статьи -->
            <div class="form-group">
                <label for="article-name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="article-name" class="form-control">
                </div>
                <br><br>
                <label for="article-fill" class="col-sm-3 control-label">Article</label>
                <div class="col-sm-6">
                <textarea name="article" id="article-fill" class="form-control"></textarea>
                    </div>
            </div>

            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Add an article
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

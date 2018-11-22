
<form class="form-horizontal" method="POST" 
action=" @if(!isset($post)) {{ route('post-store') }} @else {{ route('post-update', ['id' => $post->id]) }} @endif">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title" class="col-md-2 control-label">Titre</label>

        <div class="col-md-10">
            <input id="title" type="text" class="form-control" 
                name="title" 
                value="
                @if(NULL != old('title')) {{ old('title') }} 
                @elseif(isset($post)) {{ $post->title }}@endif" 
                required>

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
        <label for="category" class="col-md-2 control-label">Catégorie</label>

        <div class="col-md-6">
            <select class="form-control" name="category">
                <option @if(NULL == old('category') && !isset($post)) 
                    selected 
                    @endif value="">-</option>
                @foreach ($categories as $cat)            
                
                    <option value="{{ $cat->id }}" 
                        @if(isset($post) && $post->category_id == $cat->id) 
                            selected 
                        @endif>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label for="content" class="col-md-2 control-label">Contenu</label>

        <div class="col-md-10">
            <textarea name="content" 
            id="content" cols="30" 
            class="form-control" rows="10">@if( NULL != old('content') ){{ old('content') }}
            @elseif(isset($post)) {{ $post->content }}@endif</textarea>

            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <button type="submit" class="btn btn-primary col-sm-offset-2">
        @if(!isset($post)) Créer le post @else Enregistrer @endif
    </button>
</form>

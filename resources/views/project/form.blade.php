@extends('layouts.app')

@section('styles')
@endsection

@section('title', $project ? $project->name : 'New Project')


@section('content')
<div class="prose text-center m-auto">
    <h1>{{ $project ? 'Edit' : 'New' }} Project</h1>
    <form class="flex justify-center flex-col space-y-4 w-3/4 m-auto text-left text-base" method="POST" action="{{ $project ? '/project/'.$project->id : '/project' }}" enctype="multipart/form-data">
        @method($project ? 'PATCH' : 'POST')
        @csrf

        <label>
            <span>Name</span>
            <input type="text" name="name" value="{{ $project?->name ?? ''}}" class="block rounded @error('email') border-red-500 @enderror" />
            @error('name')
            <p class="text-red-500 text-xs italic" style="margin:0px;">{{ $message }}</p>
            @enderror
        </label>
        <label>
            <span>Skills</span>
            <select name="skills[]" multiple class="block rounded @error('email') border-red-500 @enderror">
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ $project?->skills->contains($skill->id) ? 'selected' : '' }}>{{ $skill->name }}</option>
                @endforeach
            </select>
        </label>
        <label>
            <span>Description</label>
            <markdown-editor input-name="description" content="{{ $project ? $project->description : '' }}"></markdown-editor>
        </label>
        <label>
            <span>Photos</label>
            <image-uploader input-name="photos" existing="{{$project?->photos->toJson()}}"></image-uploader>
        </span>
        

        <input type="hidden" name="portfolio" value="1" />
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
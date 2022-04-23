@extends('layout')
@section('title', 'Posterios - Forum Discussion')
<link rel="shortcut icon" href="{{ asset('image/icon-logo-white.png') }}">
<link rel="stylesheet" href="{{ asset('css/forumDetail.css') }}">

@include('navbar')

@if (!Auth::check())


@else

    <div class="container mt-lg-4">
        @foreach ($forums as $f)
            <div class="card card-quest">
                <div class="card-header bg-transparent">
                    <div class="row row-cols-auto">
                        <div class="col">
                            @if ($f->image == null)
                                @if ($f->gender == "Male")
                                    <img src="{{ asset('image/user-male.png') }}" alt="user image" class="user-image">
                                @else
                                    <img src="{{ asset('image/user-female.png') }}" alt="user image" class="user-image">
                                @endif
                            @else
                                <img src="{{ asset('storage/'.$f->image) }}" alt="user image" class="user-image">
                            @endif
                        </div>
                        <div class="col">
                            <h6>{{ $f->name }}</h6>
                            <small class="text-muted">{{ $f->forum_category }} • {{ $f->forum_subcategory }} • Asked {{ Carbon\Carbon::parse($f->created_at)->diffForHumans()}} • Modified {{ Carbon\Carbon::parse($f->updated_at)->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $f->forum_title }}</h4>
                    <p class="card-text text-muted">{{ $f->forum_message }}</p>
                </div>
                <div class="p-2">
                    @if ($f->forum_image == null)

                    @else
                        <img src="{{ asset('storage/'.$f->forum_image) }}" class="card-img-bottom" alt="image">
                    @endif
                </div>
                <div class="mt-lg-4">
                    <div class="p-3 d-flex justify-content-end">
                        @if (Auth::user()->id == $f->user_id)
                            <a href="#" class="edit-but" data-bs-toggle="modal" data-bs-target="#editForum">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                                Edit Forum
                            </a>
                            @include('profile.modalEditForum')
                            <a href="#" class="reply-but" data-bs-toggle="modal" data-bs-target="#createReply">
                                Balas
                            </a>
                        @else
                            <a href="#" class="reply-but" data-bs-toggle="modal" data-bs-target="#createReply">Balas</a>
                        @endif
                    </div>
                    @include('profile.modalReplyForum')
                </div>
            </div>
        @endforeach








        <div class="mt-xl-5">
            <h3>Answer</h3>
        </div>
        <div class="card mt-lg-2 p-3">
            @foreach ($replies as $r)
                <div class="row row-cols-auto">
                    <div class="col">
                        @if ($r->image == null)
                            @if ($r->gender == "Male")
                                <img src="{{ asset('image/user-male.png') }}" alt="user image" class="user-image">
                            @else
                                <img src="{{ asset('image/user-female.png') }}" alt="user image" class="user-image">
                            @endif
                        @else
                            <img src="{{ asset('storage/'.$r->image) }}" alt="user image" class="user-image">
                        @endif
                    </div>
                    <div class="col">
                        <h6>{{ $r->username }} <span class="text-muted"><small>• {{ Carbon\Carbon::parse($r->updated_at)->diffForHumans()}}</small></span></h6>
                        <p class="reply">{{ $r->reply_message }}</p>
                        @if ($r->reply_image == null)

                        @else
                            <img src="{{ asset('storage/'.$r->reply_image) }}" class="card-img-bottom" alt="image">
                        @endif
                    </div>
                </div>
                @if (Auth::user()->id == $r->user_id)
                    <div class="d-flex justify-content-end">
                        <a href="#modalEditReplyForum_{{ $r->id }}" class="edit-answer-but" data-bs-toggle="modal" data-bs-target="#modalEditReplyForum_{{ $r->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill text-secondary" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                        @include('profile.modalEditReplyForum')
                    </div>
                @else
                @endif
                <hr>
            @endforeach
        </div>

    </div>

@endif

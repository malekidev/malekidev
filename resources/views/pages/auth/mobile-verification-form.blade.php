@extends('layouts.main')
@section('title','تایید شماره موبایل')
@section('content')
    <div class="mx-6 my-12 flex flex-col items-center gap-4">
        <div class="shadow rounded p-4 md:w-1/3 w-full flex flex-col items-center">
            <p class="p-8 text-center text-xl text-green-500">
                <span class="font-extrabold">دوست عزیزم :)</span>
                برای این که بتونی از وب سایت ما استفاده کنی ، اول باید شماره تلفن خودت رو تایید کنی
                برای اینکه کد تایید برات ارسال بشه میتونی روی لینک زیر کلیک کنی
            </p>
            <form class="w-full" action="{{route('verify-phone.send')}}" method="post">
                @csrf
                <button type="submit" class="bg-indigo-300 text-indigo-950 p-2 rounded w-full my-4">
                    ارسال کد
                </button>
            </form>
        </div>
    </div>
@endsection

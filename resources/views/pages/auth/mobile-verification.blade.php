@extends('layouts.main')
@section('title','تایید شماره موبایل')
@section('content')
    <div class="mx-6 my-12 flex flex-col items-center gap-4">
        <div class="shadow rounded p-4 md:w-1/3 w-full flex flex-col items-center">
            <p class="p-8 text-center text-xl text-green-500">
                کد تایید برای شما ارسال شد ، کد را در فیلد زیر وارد کرده و دکمه ارسال کد را بزنید
            </p>
            <form class="w-full" action="{{route('register.post')}}" method="post">
                @csrf
                <div class="flex flex-col my-4">
                    <x-inputs.label>کد تایید :</x-inputs.label>
                    <otp-input></otp-input>
                    @error('name')
                    <span class="text-red-600 my-2 mr-1">{{$message}} </span>
                    @enderror
                </div>
                <button type="submit" class="bg-indigo-300 text-indigo-950 p-2 rounded w-full my-4">
                    ارسال کد
                </button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.main')
@section('title','ثبت نام')
@section('content')
    <div class="mx-6 my-12 flex flex-col items-center gap-4">
        <h1 class="font-extrabold text-xl text-indigo-950">ثبت نام در وب سایت</h1>
        <div class="shadow rounded p-4 md:w-1/3 w-full">
            <form action="{{route('register.post')}}" method="post">
                @csrf
                <div class="flex flex-col my-4">
                    <x-inputs.label>نام و نام خانوادگی :</x-inputs.label>
                    <x-inputs.text name="name"/>
                    @error('name')
                    <span class="text-red-600 my-2 mr-1">{{$message}} </span>
                    @enderror
                </div>
                <div class="flex flex-col my-4">
                    <x-inputs.label>شماره همراه :</x-inputs.label>
                    <phone-input phone="{{old('phone')}}"></phone-input>
                    @error('phone')
                    <span class="text-red-600 my-2 mr-1">{{$message}} </span>
                    @enderror
                </div>
                <div class="flex flex-col my-4">
                    <x-inputs.label>ایمیل :</x-inputs.label>
                    <x-inputs.text name="email" dir="ltr"/>
                    @error('email')
                    <span class="text-red-600 my-2 mr-1">{{$message}} </span>
                    @enderror
                </div>
                <div class="flex flex-col my-4">
                    <x-inputs.label>رمز عبور :</x-inputs.label>
                    <x-inputs.text name="password" dir="ltr"/>
                    @error('password')
                    <span class="text-red-600 my-2 mr-1">{{$message}} </span>
                    @enderror
                </div>
                <button type="submit" class="bg-indigo-300 text-indigo-950 p-2 rounded w-full my-4">
                    ثبت نام
                </button>
            </form>
        </div>
    </div>
@endsection

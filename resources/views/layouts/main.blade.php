<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مهدی ملکی - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app" >
    <header class="flex items-center flex-col shadow">
        <div class="p-3 bg-indigo-950 text-white flex justify-center w-full">
                <span>
                    تخفیف ویژه دوره آموزش برنامه نویسی :>
                </span>
        </div>
        <div class="flex justify-between items-center p-5 w-[100%] md:w-[80%] ">
            <div class="md:text-2xl sm:text-xl text-lg flex items-center text-indigo-950">
                    <span class="md:text-3xl text-2xl font-extrabold mx-2">
                        < / >
                    </span>
                <span class="font-medium invisible sm:visible">
                        وب سایت شخصی مهدی ملکی
                    </span>
            </div>
            @guest()
                <div class="flex gap-2 md:text-base text-xs">
                    <a href="{{route('login')}}" class="bg-indigo-950 text-white rounded p-2">ورود</a>
                    <a href="{{route('register')}} " class="bg-indigo-300 text-indigo-950 rounded p-2">ثبت نام</a>
                </div>
            @endguest

        </div>
    </header>
    @if(session('shouldVerify'))
        <div class="w-full bg-red-500 p-4 flex justify-center">
            <span class="text-white text-xl">
                برای استفاده از تمام امکانات باید شماره تلفن خودتون رو
                <a href="{{route('verify-phone.show')}}" class="text-gray-800">تایید</a>
                کنید
            </span>

        </div>
    @endif
    @yield('content')
</div>
</body>
</html>

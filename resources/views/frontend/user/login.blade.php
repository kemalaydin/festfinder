@extends('app')

@section('title')
    Login
@stop

@section('content')
    <div class="container flex my-6 py-6">
        <div class="w-1/3 m-auto rounded shadow-lg p-3 border border-secondary-100">
            <h3 class="text-center text-lg font-bold text-secondary">Login</h3>

            <hr class="border-t mt-4 border-secondary-100 shadow" />

            <div class="mt-6">
                <label for="email" class="text-sm text-gray-900">E-mail Address</label>
                <input type="email" id="email" name="email" class="p-2 text-sm border border-secondary-100 focus:border-secondary placeholder-secondary-200 rounded block w-full focus:outline-none" placeholder="(eg: name@mail.com)"/>
            </div>

            <div class="mt-4">
                <label for="password" class="text-sm text-gray-900">Password</label>
                <input type="password" id="password" name="password" class="p-2 text-sm border border-secondary-100 focus:border-secondary placeholder-secondary-200 rounded block w-full focus:outline-none" placeholder="(eg: ItIsSecretPassword)"/>
            </div>

            <div class="mt-4">
                <a href="#" class="text-secondary text-sm mt-2">Forgot my password</a>
                <button class="py-2 px-4 float-right bg-secondary text-white rounded hover:bg-secondary-400 focus:outline-none shadow-lg">
                    Sign In
                </button>
            </div>
        </div>
    </div>

@stop

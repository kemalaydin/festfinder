@extends('app')

@section('title')
    Register
@stop

@section('content')
    <div class="container flex my-6 py-6">
        <div class="w-1/3 m-auto rounded shadow-lg p-3 border border-secondary-100">
            <h3 class="text-center text-lg font-bold text-secondary">Register</h3>

            <hr class="border-t mt-4 border-secondary-100 shadow" />

            <div class="flex">
                <div class="w-2/4 mr-2">
                    <div class="mt-4">
                        <label for="firstname" class="text-sm text-gray-900">First Name</label>
                        <input type="text" id="firstname" name="firstname" class="p-2 text-sm border border-secondary-100 focus:border-secondary placeholder-primary-100 rounded block w-full focus:outline-none" />
                    </div>
                </div>

                <div class="w-2/4 ml-2">
                    <div class="mt-4">
                        <label for="lastname" class="text-sm text-gray-900">Last Name</label>
                        <input type="text" id="lastname" name="lastname" class="p-2 text-sm border border-secondary-100 focus:border-secondary placeholder-secondary-200 rounded block w-full focus:outline-none" />
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <label for="email" class="text-sm text-gray-900">Email Address</label>
                <input type="email" id="email" name="email" class="p-2 text-sm border border-secondary-100 focus:border-secondary placeholder-secondary-200 rounded block w-full focus:outline-none" />
            </div>

            <div class="mt-4">
                <label for="password" class="text-sm text-gray-900">Password</label>
                <input type="password" id="password" name="password" class="p-2 text-sm border border-secondary-100 focus:border-secondary placeholder-secondary-200 rounded block w-full focus:outline-none" />
            </div>

            <div class="mt-4">
                <button class="py-2 px-4 float-right bg-secondary text-white rounded hover:bg-secondary-400 focus:outline-none shadow-lg">
                    Sign Up
                </button>
            </div>
        </div>
    </div>

@stop

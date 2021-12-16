@section('title', 'ایجاد حساب کاربری جدید')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600"/>
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            ایجاد حساب کاربری جدید
        </h2>

        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            یا
            <a href="{{ route('login') }}"
               class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                ورود به حساب کاربری
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 leading-5">
                        نام
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="first_name" id="first_name" type="text" required autofocus
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('first_name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"/>
                    </div>

                    @error('first_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="last_name" class="block text-sm font-medium text-gray-700 leading-5">
                        نام خانوادگی
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="last_name" id="last_name" type="text" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('last_name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"/>
                    </div>

                    @error('last_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{--                <div class="mt-6">--}}
                {{--                    <label for="national_code" class="block text-sm font-medium text-gray-700 leading-5">--}}
                {{--                        کد ملی--}}
                {{--                    </label>--}}

                {{--                    <div class="mt-1 rounded-md shadow-sm">--}}
                {{--                        <input wire:model.lazy="national_code" id="national_code" type="text" inputmode="numeric"--}}
                {{--                               required autofocus--}}
                {{--                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('national_code') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"/>--}}
                {{--                    </div>--}}

                {{--                    @error('national_code')--}}
                {{--                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}

                <div class="mt-6">
                    <label for="mobile" class="block text-sm font-medium text-gray-700 leading-5">
                        موبایل
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="mobile" id="mobile" type="text" inputmode="tel" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('mobile') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"/>
                    </div>

                    @error('mobile')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="mobile" class="block text-sm font-medium text-gray-700 leading-5">
                        تاریخ تولد
                    </label>

                    <div class="mt-1 rounded-md shadow-sm grid grid-cols-3">
                        <select wire:model.lazy="day" id="day"
                                class="form-select block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('day') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                            @for($i =0; $i<32; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select wire:model.lazy="month" id="month"
                                class="form-select block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('month') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                            <option value="1">فروردین</option>
                            <option value="2">اردیبهشت</option>
                            <option value="3">خرداد</option>
                            <option value="4">تیر</option>
                            <option value="5">مرداد</option>
                            <option value="6">شهریور</option>
                            <option value="7">مهر</option>
                            <option value="8">آبان</option>
                            <option value="9">آذر</option>
                            <option value="10">دی</option>
                            <option value="11">بهمن</option>
                            <option value="12">اسفند</option>
                        </select>
                        <input wire:model.lazy="year" id="year" type="number" inputmode="numeric" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('year') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"/>
                    </div>

                    @error('day')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('month')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('year')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        جنسیت
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <x-form.radio name="gender" value="1">آقا</x-form.radio>
                        <x-form.radio name="gender" value="2">خانم</x-form.radio>
                    </div>

                    @error('gender')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        رمز عبور
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"/>
                    </div>

                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 leading-5">
                        تکرار رمز عبور
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password"
                               required
                               class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 appearance-none rounded-md focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                </div>

                <x-google-recaptcha/>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            ثبت نام
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

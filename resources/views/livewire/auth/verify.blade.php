@section('title', 'Verify your email address')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600"/>
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            اعتبار سنجی موبایل
        </h2>

        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            یا
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                خروج از حساب
            </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            @if (session('resent'))
                <div class="flex items-center px-4 py-3 mb-6 text-sm text-white bg-green-500 rounded shadow"
                     role="alert">
                    <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"></path>
                    </svg>

                    <p>یک پیامک حاوی کد فعال سازی برای شما ارسال شد.</p>
                </div>
            @endif

            @if (session('too_soon_resend'))
                <div class="flex items-center px-4 py-3 mb-6 text-sm text-white bg-yellow-500 rounded shadow"
                     role="alert">
                    <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"></path>
                    </svg>

                    <p>لطفا قبل از درخواست مجدد کد اعتبار سنجی 2 دقیقه صبر کنید.</p>
                </div>
            @endif

            @if (session('wrong'))
                <div class="flex items-center px-4 py-3 mb-6 text-sm text-white bg-yellow-500 rounded shadow"
                     role="alert">
                    <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"></path>
                    </svg>

                    <p>کد فعال سازی صحیح نیست!</p>
                </div>
            @endif

            @if (session('internal_error'))
                <div class="flex items-center px-4 py-3 mb-6 text-sm text-white bg-red-500 rounded shadow" role="alert">
                    <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"></path>
                    </svg>

                    <p>متاسفانه به دلیل یک مشکل در سیستم قادر به ارسال کد فعال سازی نبودیم. متخصصان ما به زودی مشکل را
                        برطرف خواهد کرد. لطفا بعدا دوباره تلاش کنید. با تشکر از صبوری شما.</p>
                </div>
            @endif

            <div class="text-sm text-gray-700">
                <p>قبل از ادامه لازم است که موبایل خود تایید کنید.</p>

            </div>

            <form wire:submit.prevent="verify">

                <div class="mt-6">
                    <label for="code" class="block text-sm font-medium text-gray-700 leading-5">
                        کد فعال سازی
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="code" id="code" type="text" inputmode="numeric" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('code') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"/>
                    </div>

                    @error('code')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6" x-data="{remain:120}", x-init="setInterval(()=>{ if(remain > 0) remain -= 1 },1000)">
                    <div class="flex items-center" :class="{'hidden': remain ==0}">
                        <span x-text="remain"></span>
                        &nbsp;
                        ثانیه
                    </div>

                    <div class="text-sm leading-5">
                        <a wire:click="resend"
                           :class="{'hidden': remain !=0}"
                           class="hidden font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            کد فعال سازی دریافت نکرده اید؟
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                تایید و فعال سازی
                            </button>
                        </span>
                </div>
            </form>
        </div>
    </div>
</div>

<x-guest-layout>
    <x-authentication-card>
        <a class="navbar-brand" href="{{ route('login') }}"><img src="{{ asset('sb-admin/images/logo3.png') }}"
                alt="Logo"></a>
        <br>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Bạn vui lòng xác nhận qua email để có thể mua sắm sản phẩm một cách hiệu quả nhất! C.O.I Cosmestics xin chân thành cảm ơn!') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email bạn đã cung cấp trong tài khoản mà bạn đăng kí.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Gửi lại email xác minh!') }}
                    </x-button>
                </div>
            </form>

            <div>
                {{-- <a href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Edit Profile') }}</a> --}}

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                        {{ __('Đăng xuất') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>

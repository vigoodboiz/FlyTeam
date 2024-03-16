<x-guest-layout>
    <x-authentication-card>
        @if (session('status'))
            <div>{{ session('status') }}</div>
        @endif
        <a class="navbar-brand" href="./"><img src="{{ asset('sb-admin/images/logo3.png') }}" alt="Logo"></a><br>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Bạn đã quên mật khẩu của mình? Không sao hết cả, bạn chỉ cần nhập địa chỉ email của bạn vào đây chúng tôi sẽ gửi liên kết để lấy lại mật khẩu cho bạn.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.forgot') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Liên kết đặt lại mật khẩu email!') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

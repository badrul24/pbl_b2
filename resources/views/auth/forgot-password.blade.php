<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password - Manajemen Arsip</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8 bg-gray-100">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/70 to-gray-900/70 backdrop-blur-sm"></div>

    <div class="w-full max-w-md relative z-10 px-2">
        <div class="bg-white/95 backdrop-blur-md shadow-2xl rounded-2xl px-6 pt-6 pb-6 mb-4 border border-gray-200/50 transform transition duration-500 hover:scale-[1.01]">
            <div class="flex items-center mb-5">
                <div class="p-3 bg-blue-50 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Reset Password</h2>
                    <p class="text-gray-600 text-sm">Manajemen Arsip - PNP</p>
                </div>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            @if (session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-6 animate-pulse">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md mb-6 animate-pulse">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="mb-4 text-center">
                <p class="text-gray-600 text-xs">Enter your email address and we'll send you a link to reset your password.</p>
            </div>

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 text-xs font-semibold mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="your@email.com"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="pl-8 shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 text-sm leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <button
                    type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 shadow-lg hover:shadow-xl"
                >
                    Send Reset Link
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-gray-600 text-xs">Remember your password? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium transition duration-200">Back to login</a></p>
            </div>
        </div>

        <div class="text-center text-white text-xs">
            Copyright &copy; {{ date("Y") }} PNP | Politeknik Negeri Padang
        </div>
    </div>
</body>
</html>

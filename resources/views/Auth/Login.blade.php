@extends('Layout.Guest')
@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <!-- Card container -->
    <div class="w-full max-w-md border border-[#17202e] bg-shadcn-gray rounded-lg shadow-lg overflow-hidden">
        <!-- Card header -->
        <div class="p-6 border-b border-[#1e293b]">
            <h2 class="text-2xl font-bold text-[#f8fafc]">
                Sign in to your account
            </h2>
            <p class="mt-2 text-sm text-[#94a3b8]">
                Or
                <a href="#" class="font-medium text-white hover:text-[#e2e8f0]">
                    create a new account
                </a>
            </p>
        </div>
        
        <!-- Card body -->
        <div class="p-6">
            <form action="#" method="POST">
                @csrf
                <div class="space-y-4">
                    <div class="space-y-1">
                        <label for="email-address" class="block text-sm font-medium text-[#94a3b8]">
                            Email address
                        </label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required 
                            class="w-full px-3 py-2 border border-[#1e293b] rounded-md text-[#f8fafc] bg-[#11151b] placeholder-[#64748b] focus:outline-none focus:ring-2 focus:ring-white focus:border-white text-sm" 
                            placeholder="name@example.com">
                    </div>
                    
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-[#94a3b8]">
                            Password
                        </label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="w-full px-3 py-2 border border-[#1e293b] rounded-md text-[#f8fafc] bg-[#11151b] placeholder-[#64748b] focus:outline-none focus:ring-2 focus:ring-white focus:border-white text-sm" 
                            placeholder="••••••••">
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" 
                                class="h-4 w-4 text-white focus:ring-white border-[#1e293b] bg-[#11151b] rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-[#94a3b8]">
                                Remember me
                            </label>
                        </div>
                        
                        <div class="text-sm">
                            <a href="#" class="font-medium text-white hover:text-[#e2e8f0]">
                                Forgot password?
                            </a>
                        </div>
                    </div>
                    
                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-[#020817] bg-white hover:bg-[#e2e8f0] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-colors">
                            Sign in
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
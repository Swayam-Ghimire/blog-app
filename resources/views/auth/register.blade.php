<x-layout>
    <div class="custom-form-container" id="register">
        <h1 class="custom-form-title">Register</h1>
        <form action="{{ route('auth.register') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div class="custom-input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="name" id="lname" placeholder="(e.g Swayam Ghimire)" required>
                <label for="name">User Name</label>
            </div>
            <div class="custom-input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="(e.g abc@gmail.com)" required>
                <label for="email">E-mail</label>
            </div>
            <div class="custom-input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="custom-input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password_confirmation" id="password" placeholder="Confirm Password" required>
                <label for="password_confirmation">Confirm Password</label>
            </div>

            <div class="custom-file-input">
                <label for="picture" class="picture">
                    <i class="fas fa-upload mr-2"></i> Upload Picture
                </label>
                <input type="file" id="picture" name="picture" class="hidden">
                <span id="file-name" class="ml-2 text-gray-600"></span>
            </div>            
            <input type="submit" value="Register" class="custom-btn" name="SignUp">
        </form>
        <x-error/>
        <div class="custom-links">
            <p>Already have an account?</p>
            <a href="{{ route('auth.login') }}">Login</a>
        </div>
    </div>
</x-layout>
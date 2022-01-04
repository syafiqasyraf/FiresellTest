<template>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-4">

            @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif
            
            @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif
            
            <main class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal text-center">Log In</h1>

                <form action="/login" method="post">
                    @csrf

                    <div class="form-floating">
                        <input type="email" name="email" id="Email" 
                        class="form-control @error ('email') is-invalid @enderror" placeholder="Email address" 
                        required autofocus value="{{ old('email') }}"> 
                        <label for="Email" class="sr-only">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <label for="Password" class="sr-only">Password</label>
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            
                <small class="d-block text-center mt-3">
                    Belum Daftar?<a href="/register"> Daftar Sekarang!</a>
                </small>  
            </main>
        </div>
     </div>
    </div>
</template>

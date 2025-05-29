@extends('layout.guest')

@section('content')
    <main class="d-flex justify-content-center align-items-center h-100">
        <div class="card w-25">
            <div class="card-body">
                <form action={{ route('login') }} method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço de email</label>
                        <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) name="email" aria-describedby="emailHelp"
                            placeholder="Seu email">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('password')]) name="password" type="password" placeholder="Senha">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @error('credentials')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <p class="text-center">Não tem uma conta? <a class="text-primary" href="{{ route('register') }}">Registrar</a></p>

                    <button type="submit" class="btn btn-block btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </main>
@endsection

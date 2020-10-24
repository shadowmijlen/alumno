<div class="login-box">
    <div class="card" style="border-radius: 20px;">
        <div class="card-body">
            <p class="login-box-msg" style="color: #138496">Inicia sesión para comenzar</p>
            @if ($errors->all())
            <div class="alert alert-warning alert-dismissable mb-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <div class="alert-text">
                    @foreach ($errors->all() as $message)
                    {{ $message }}
                    @endforeach
                </div>
            </div>
            @endif
            <form action="{{ route('login_post') }}" method="post" autocomplete="off">
                @csrf
                <div class="input-group mb-3">
                    <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror"
                        name="usuario" value="{{ old('usuario') }}" required autofocus autocomplete="off" placeholder="Ingresa tu usuario">
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" autocomplete="off" placeholder="Ingresa tu contraseña">
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btnModal btn-block">INGRESAR</button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#">¿Olvidaste la contraseña?</a>
                    </div>
                    <div class="col-12">
                        <a href="#">Registro</a>
                    </div>                    
                    <!-- /.col -->
                </div>                
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
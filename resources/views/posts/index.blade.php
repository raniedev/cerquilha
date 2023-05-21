@auth
    @include('template-top')
                <!-- PARTE CENTRO -->
                <div class="centro">
                    @can('criar_postagens', App\Models\User::class)
                        @include('partials.postagem')
                        @include('partials.emojis')
                    @else
                        <p class="msg-erro"><i class="uil uil-exclamation-triangle"></i> Você está impossibilitado de criar uma postagem.</p>
                    @endcan
                        <div id="postagens">
                            @include('posts.postagens')
                        </div>
                </div>
                <script src="{{asset('js/post.js')}}"></script>
    @include('template-bot')
@endauth

@include('partials.guest')
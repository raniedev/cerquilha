            <!-- PARTE DIREITA -->
            <div class="direita">
                @include('partials.direita')
            </div>
        </main>

        @include('partials.customizar-tema')

        <button class="icone-auxiliar voltar-topo" onclick="voltarTopo()">
            <i class="uil uil-arrow-up"></i>
        </button>
        <button class="icone-auxiliar ir-base" onclick="voltarBase()">
            <i class="uil uil-arrow-down"></i>
        </button>

        @include('partials.footer')
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>
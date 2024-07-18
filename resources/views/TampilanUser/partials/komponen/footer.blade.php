<footer class="bg-white py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0">Copyright &copy; Nerin2024</div>
            </div>
            <div class="col-auto">
                <a class="small" href="{{ route('login.index') }}">Login</a>
                <span class="mx-1">&middot;</span>
                <a class="small"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="cursor: pointer">Contact</a>
            </div>
        </div>
    </div>
</footer>

  @include('TampilanUser.partials.komponen.ModalContact')
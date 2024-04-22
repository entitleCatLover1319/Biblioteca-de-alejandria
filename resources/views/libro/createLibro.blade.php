<x-app-layout>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    <div class="card-header">
                        Registro de nuevo libro.
                    </div>
                    <form class="needs-validation" enctype="multipart/form-data" action="/libro" method="POST">
                        @csrf

                        <x-forms.normalInput
                            name="titulo"
                            label="Título: "
                            placeholder="Ingrese el titulo del libro"
                            required
                            maxlength="255"
                        />

                        <x-forms.normalInput
                            name="autor"
                            label="Autor:"
                            placeholder="Ingrese el autor"
                            maxlength="255"
                            list="autores"
                            required
                        />

                        <div class="flex justify-center">
                            <button class="btn btn-primary" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

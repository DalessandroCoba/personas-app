<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mostrar Datos</title>
</head>

<body>

    <div class="container">
    <div class="titulo text-center">
    <h1>Mostrar datos</h1>

    @if (session("Correcto"))
        <div class="alert alert-success">{{  session("Correcto") }}</div>
    @endif

    @if (session("Incorrecto"))
    <div class="alert alert-danger">{{  session("Incorrecto") }}</div>
@endif
    </div>

  <!-- Modal añadir datos-->
  <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddLabel">Add Datos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form method="POST" action="{{ route("comuna.create") }}">
                @csrf
                <div class="mb-3">
                  <label for="comu_codi" class="form-label">Register Code</label>
                  <input type="number" class="form-control" id="comu_codi" aria-describedby="emailHelp" name="comu_codi">
                </div>
                <div class="mb-3">
                  <label for="comu_nomb" class="form-label">Register Commune</label>
                  <input type="text" class="form-control" id="comu_nomb" name="comu_nomb">
                </div>

                <div class="mb-3">
                  <label for="Muni_codi" class="form-label">Register Municipality</label>
                  <input type="number" class="form-control" id="Muni_codi" name="Muni_codi">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>

<div class="tabla p-5">
    <button class="btn btn-success btn" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir Comuna</button>
    <table class="table table-responsive table sm">
        <thead>
          <tr>
            <th scope="col">Code</th>
            <th scope="col">Commune</th>
            <th scope="col">Municipality</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">

            @foreach ($datos as $item)
            
            <tr>
                    <td>{{ $item->comu_codi }}</td>
                    <td>{{ $item->comu_nomb }}</td>
                    <td>{{ $item->muni_nomb }}</td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalditar{{ $item->comu_codi }}" class="btn btn-warning bt-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn btn-warning bt-sm"><i class="fa-solid fa-trash"></i></a>
                    </td>
  
  <!-- Modal modificar datos-->
  <div class="modal fade" id="modalditar{{ $item->comu_codi }}" tabindex="-1" aria-labelledby="modaleditarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaleditarLabel">modify data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form method="POST" action="{{ route("comuna.update") }}">
                @csrf
                <div class="mb-3">
                  <label for="comu_codi" class="form-label">modify Code</label>
                  <input type="text" class="form-control" id="comu_codi" aria-describedby="emailHelp" name="comu_codi" value="{{ $item->comu_codi }}" readonly>
                </div>
                <div class="mb-3">
                  <label for="comu_nomb" class="form-label">modify Commune</label>
                  <input type="text" class="form-control" id="comu_nomb" name="comu_nomb" value="{{ $item->comu_nomb }}">
                </div>

                <div class="mb-3">
                  <label for="Muni_codi" class="form-label">modify Municipality</label>
                  <input type="number" class="form-control" id="Muni_codi" name="Muni_codi" value="{{ $item->muni_codi }}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">modify</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>
              </tr>

            @endforeach
          
        </tbody>
      </table>
    </div>
</div>

    </body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/45f76979a6.js" crossorigin="anonymous"></script>
</html>
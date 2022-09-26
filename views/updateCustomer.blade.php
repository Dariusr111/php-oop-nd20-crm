<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kliento atnaujinimas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">Redaguoti kliento informaciją</div>
                <div class="card-body">


                    <form action="" method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="{{$updateCustomer->id}}" >
                        <div class="mb-3">
                            <label for="" class="form-label">Vardas</label>
                            <input name="name" type="text" class="form-control" value="{{$updateCustomer->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pavarde</label>
                            <input name="surname" type="text" class="form-control" value="{{$updateCustomer->surname}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Telefonas</label>
                            <input name="phone" type="text" class="form-control" value="{{$updateCustomer->phone}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">El. Paštas</label>
                            <input name="email" type="text" class="form-control" value="{{$updateCustomer->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Adresas</label>
                            <input name="address" type="text" class="form-control" value="{{$updateCustomer->address}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pozicija</label>
                            <input name="position" type="text" class="form-control" value="{{$updateCustomer->position}}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Kompanija</label>
                            <select class="form-control" name="company_id">

                                @foreach($companies as $company)
                                    <option value="{{$company->id}}" {{$updateCustomer->company_id == $company->id ? 'selected' : ''}}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kalbėjimo data</label>
                                <input name="date" type="date" class="form-control" value="{{$conversation->date}}">
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Kalbejimo tekstas</label>
                                <input name="conversation" type="text" class="form-control" value="{{$conversation->conversation}}">
                            </div>

                        <button class="btn btn-success mt-2">Redaguoti</button>
                        <a href="index.php" class="btn btn-info float-end mt-2">Atgal</a>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

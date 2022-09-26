{{-- Klientu sarasas --}}
<div class="row">

    <div class="card mt-3">

        <div class="card-header">

            <h1>Klientų sąrašas  <a class="btn btn-warning float-end" href="createCustomer.php">Sukurti naują klientą</a></h1>
        </div>
        <div class="card-body">
            <div class="col-md-12 d-flex flex-row">
                <table class="table">
                    <thead>
                    <tr class="table-warning text-center">
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Telefonas</th>
                        <th>El. Paštas</th>
                        <th>Adresas</th>
                        <th>Pozicija</th>
                        <th>Data</th>
                        <th>Kalbėjimo tekstas</th>
                        <th>Kompanija</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                        <tbody>
                        @foreach($customers as $customer)
                        <tr class="table-light text-center">
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->surname}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->position}}</td>
                            <td>{{$customer->getConversations($customer->id)->date}}</td>
                            <td>{{$customer->getConversations($customer->id)->conversation}}</td>
                            <td>{{($customer->getCompany()->name)}}</td>
                            <td><a class="btn btn-success" href="updateCustomer.php?id={{$customer->id}}">Update</a></td>
                            <td><a class="btn btn-danger" href="?deleteCustomer_id={{$customer->id}}">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

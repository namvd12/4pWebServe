<div class="tab-pane fade show " id="categoriesListTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
                <label for="">Categorie List</label>
                <a class="btn btn-primary" onclick="listSettingClick('categoriesAddTab')">Add new</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th>Categorie</th>
                        <th>Number device</th>
                        <th>Action</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listCat as $cat)                      
                        <tr class="text-center" style="vertical-align: middle">
                            <td>{{ $cat['name'] }}</td>
                            <td>{{ $cat['numberDevice'] }}</td>
                            <td>{{ $cat['action'] }}</td>
                            <td>{{ $cat['status'] }}</td>
                            <td>
                                <button class="btn btn-outline-primary"onclick="editCategory('{{ $cat['catID'] }}')">Edit</button>
                                <button class="btn btn-outline-primary" onclick="deleteCategory('{{ $cat['catID'] }}')" >Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
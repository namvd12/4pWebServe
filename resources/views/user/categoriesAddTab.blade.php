<div class="tab-pane fade show " id="categoriesAddTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">Categorie Add</label>
            <div>
                <a class="btn btn-primary" onclick="saveNewCategories()">Save</a>
                <a href="javascript:window.location.href=window.location.href" class="btn btn-outline-primary">Cancel</a>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6">
                        <label class="">Name</label>
                        <input type="text" class="form-control" name="categoriesName" id="categoriesName" placeholder="Enter Categories name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="">Action</label>
                        <select class="form-select" id="categoriesAction" name="categoriesAction">
                            <option>Handle 1</option>
                            <option>Handle 2</option>
                            <option>Handle 3</option>
                            <option>Handle 4</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="">Status</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="option1" name="options" value="active" checked>Active
                            <label class="form-check-label" for="radio1"></label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="option2" name="options" value="inactive">Inactive
                            <label class="form-check-label" for="radio2"></label>
                          </div>
                    </div>
                    <div class="col-md-12">
                        <label >Description</label>
                        <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                    </div>
                    <div class="col-md12">
                        <div class="d-flex justify-content-between">
                            <label for="">List device</label>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddDevice" onclick="modalMode('AddListDeviceCategories')">Add device</a>
                        </div>
                        <table class="table" id="AddListDeviceCategories">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        {{-- <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
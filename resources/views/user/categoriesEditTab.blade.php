<div class="tab-pane fade show" id="categoriesEditTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">Categorie Edit</label>
            @if(isset($category))
                <a class="btn btn-outline-primary" onclick="saveEditCategory('{{ $category['catID'] }}')">Save</a>
            @else
                <a class="btn btn-primary">Save</a>
            @endif
        </div>
        <div class="card-body">
            <form action="">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6">
                        <label class="">Name</label>
                        @if(isset($category))
                            <input type="text" class="form-control" name="categoriesNameEdit" id="categoriesNameEdit" value="{{ $category['name'] }}">
                        @else
                            <input type="text" class="form-control" name="categoriesNameEdit" id="categoriesNameEdit">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="">Action</label>
                        <select class="form-select" id="categoriesActionEdit" name="categoriesActionEdit" >
                            @php
                            $isHandle1Checked = "";
                            $isHandle2Checked = "";
                            $isHandle3Checked = "";
                            $isHandle4Checked = "";
                            if(isset($category))
                            {
                                switch ($category['action']) {
                                    case 'Handle 1':
                                        $isHandle1Checked = "selected";
                                        break;
                                    case 'Handle 2':
                                        $isHandle2Checked = "selected";
                                        break;
                                    case 'Handle 3':
                                        $isHandle3Checked = "selected";
                                        break;
                                    case 'Handle 4':
                                        $isHandle4Checked = "selected";
                                        break;
                                    default:
                                        $isHandle1Checked = "selected";
                                        break;
                                }
                            }
                            @endphp   
                            <option {{ $isHandle1Checked }}>Handle 1 </option>
                            <option {{ $isHandle2Checked }}>Handle 2 </option>
                            <option {{ $isHandle3Checked }}>Handle 3 </option>
                            <option {{ $isHandle4Checked }}>Handle 4 </option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="">Status</label>
                        @php
                            $isActiveChecked = "";
                            $isInActiveChecked = "";
                            if(isset($category))
                            {
                                switch ($category['status']) {
                                    case 'Active':
                                        $isActiveChecked = "checked"; 
                                        break;
                                    case 'Inactive':
                                        $isInActiveChecked = "checked";
                                        break;                                   
                                    default:
                                        $isActiveChecked = "checked"; 
                                        break;
                                }
                            }
                        @endphp
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="optionsEdit" value="Active" {{ $isActiveChecked }}>Active
                            <label class="form-check-label" for="radio1"></label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="optionsEdit" value="Inactive" {{ $isInActiveChecked }}>Inactive
                            <label class="form-check-label" for="radio2"></label>
                          </div>
                    </div>
                    <div class="col-md-12">
                        <label >Description</label>
                        @if(isset($category))
                            <textarea class="form-control" rows="3" id="descriptionEdit" name="descriptionEdit">{{ $category['description'] }}</textarea>
                        @else
                            <textarea class="form-control" rows="3" id="descriptionEdit" name="descriptionEdit"></textarea>
                        @endif
                    </div>
                    <div class="col-md12">
                        <div class="d-flex justify-content-between">
                            <label for="">List device</label>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddDevice" onclick="modalMode('EditListDeviceCategories')">Add device</a>
                        </div>
                        <table class="table" id="EditListDeviceCategories">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>  
                                @if($listDevice != null)
                                    @foreach($listDevice as $device)
                                        <tr>
                                            <td>{{ $device['deviceCode'] }}</td>
                                            <td>{{ $device['deviceName'] }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary" onclick="deleteDeviceCategory(this)">Delete</button>
                                            </td>
                                        </tr>                            
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
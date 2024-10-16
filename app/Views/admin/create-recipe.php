<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <h5 class="card-header">
                Create New Recipe
            </h5>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div>
                            <label for="storeName" class="form-label">Title</label>
                            <input type="text" class="form-control" id="storeName">
                        </div>
                        <div class="mt-3">  
                            <label for="StoreComment" class="form-label">Details</label>
                            <textarea class="form-control" id="StoreComment" rows="9"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label for="formFile" class="form-label">Recipe Image</label>
                            <img src="assets/img/default-img.jpg" alt="" style="width: 100%;max-height: 150px;object-fit: cover;"/>
                            <input class="form-control mt-2" type="file" id="formFile">
                        </div>
                        <div class="mt-3">
                            <label for="storeName" class="form-label">Time</label>
                            <input type="text" class="form-control" id="storeName">
                        </div>
                    </div>
                </div>

                <!-- <div class="divider mt-12">
                    <div class="divider-text">Prices per Shop</div>
                </div> -->

                <div class="other-details mt-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="divider">
                                <div class="divider-text">Steps</div>
                            </div> 
                            <div class="steps-area">
                                <div class="mt-3 steps-container">  
                                    <label class="form-label">Step 1</label>
                                    <div style="display: inline-flex; width: 100%;">
                                        <textarea class="form-control" rows="1"></textarea>
                                        <button type="button" class="btn btn-icon btn-outline-danger ml-3 delSteps" style="margin-left: 5px;visibility: hidden;">
                                            <span class="tf-icons bx bx-trash bx-22px"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3 steps-container">  
                                    <label class="form-label">Step 2</label>
                                    <div style="display: inline-flex; width: 100%;">
                                        <textarea class="form-control" rows="1"></textarea>
                                        <button type="button" class="btn btn-icon btn-outline-danger ml-3 delSteps" style="margin-left: 5px;visibility: hidden;">
                                            <span class="tf-icons bx bx-trash bx-22px"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="addSteps" class="btn rounded-pill btn-outline-primary mt-3 text-center" style="margin-left: auto;margin-right: auto;display: block!important;">
                                <span class="tf-icons bx bx-plus bx-18px me-2"></span>Add More Steps
                            </button>
                        </div>
                        <div class="col-6">
                            <div class="divider">
                                <div class="divider-text">Ingredients</div>
                            </div> 
                            <div>
                                <label class="form-label">Ingredient Name Here</label>
                                <div style="display: inline-flex; width: 100%;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="">
                                        <span class="input-group-text selected-unit">g</span>
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end unit-selector">
                                            <li><a class="dropdown-item" href="javascript:void(0);">g</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">mg</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Kg</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">ml</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">L</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Whole</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Half</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">pc/pcs</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">tbsp</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">tsp</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">ounce</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">pound</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">cup</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-icon btn-outline-danger ml-3" style="margin-left: 5px;">
                                        <span class="tf-icons bx bx-trash bx-22px"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Ingredient Name Here</label>
                                <div style="display: inline-flex; width: 100%;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="">
                                        <span class="input-group-text selected-unit">g</span>
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end unit-selector">
                                            <li><a class="dropdown-item" href="javascript:void(0);">g</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">mg</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Kg</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">ml</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">L</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Whole</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Half</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">pc/pcs</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">tbsp</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">tsp</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">ounce</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">pound</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">cup</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-icon btn-outline-danger ml-3" style="margin-left: 5px;">
                                        <span class="tf-icons bx bx-trash bx-22px"></span>
                                    </button>
                                </div>
                            </div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#ChooseIngredients" class="btn rounded-pill btn-outline-primary mt-3 text-center" style="margin-left: auto;margin-right: auto;display: block!important;">
                                <span class="tf-icons bx bx-plus bx-18px me-2"></span>Add Ingredients
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="m-0">
            <div class="card-footer">
                <a href="" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create
                    </button>
                </a>
            </div>
        </div>

    </div>
    <!-- / Content -->

    <div class="modal fade" id="ChooseIngredients" aria-labelledby="ChooseIngredientsLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ChooseIngredientsLabel">Select Ingredient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-search"></i></span>
                            <input type="text" id="searchIngrids" class="form-control" placeholder="Search..." aria-label="Search..." onkeyup="myFunction()">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="list-group" id="ingrids-list">
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Soufflé pastry pie ice</span>
                            </label>
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Bear claw cake biscuit</span>
                            </label>
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Tart tiramisu cake</span>
                            </label>
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Bonbon toffee muffin</span>
                            </label>
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Dragée tootsie roll</span>
                            </label>
                        </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
                        Select
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
            
<script>
    function myFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('searchIngrids');
        filter = input.value.toUpperCase();
        ul = document.getElementById("ingrids-list");
        li = ul.getElementsByTagName('label');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("span")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            } else {
            li[i].style.display = "none";
            }
        }
    }

    var StepCount = 2;
    $('#addSteps').click(function(){
        $('.steps-container').find('button').css('visibility','hidden');
        $('.steps-area').append($('.steps-container').eq(0).clone());
        $('.steps-area').find('.steps-container').eq(StepCount).find('button').css('visibility', 'visible');
        $('.steps-area').find('.steps-container').eq(StepCount).find('label').text('Step ' + parseInt(StepCount + 1));
        StepCount++;
    })
    $(document)
    .on('click','.delSteps',function(){
        $(this).closest('.steps-container').remove();
        StepCount--;
        if(StepCount != 2){
            $('.steps-area').find('.steps-container').eq(parseInt(StepCount - 1)).find('button').css('visibility', 'visible');
        }
    })
</script>

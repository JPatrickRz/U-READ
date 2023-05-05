<div>
    <form action="{{ route('publishers.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf

        {{-- STEP 1 --}}
        <div class="card w-100" style="margin-top: -40px">

            <div class="card-header bg-secondary text-white">Publication Info</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="source_title">Source Title</label>
                            <input type="text" class="form-control" id="source_title" name="source_title" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-8 mt-2">
                        <div class="form-group">
                            <label for="abstract">Abstract</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <input type="text" class="form-control" id="publisher" name="publisher" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" id="year" name="year" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <label for="patent_status">Patent Status</label>
                            <div class="input-group">
                                <select class="form-control" id="patent_status" name="patent_status" required>
                                    <option value="Copyright">Copyright</option>
                                    <option value="Patented">Patented</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>

            {{-- STEP 2 --}}
            <div class="card-header bg-secondary text-white">Contributions</div>
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="author_position">Position:</label>
                             <input type="text" name="author_position" id="author_position" value="Author" class="form-control" readonly>
                         </div>
                     </div>
                 </div>
                 <div class="row form-authors">
                     <div class="col-md-4 mt-2">
                         <div class="form-group">
                             <label for="author_first_name">First Name:</label>
                             <input type="text" class="form-control" id="author_first_name" name="author_first_name[]" required autocomplete="off">
                         </div>
                     </div>
                     <div class="col-md-2 mt-2">
                         <div class="form-group">
                             <label for="author_mi_middle">Middle Initial:</label>
                             <input type="text" class="form-control" id="author_mi_middle" name="author_mi_middle[]" maxlength="1" autocomplete="off">
                         </div>
                     </div>
                     <div class="col-md-4 mt-2">
                         <div class="form-group">
                             <label for="author_last_name">Last Name:</label>
                             <input type="text" class="form-control" id="author_last_name" name="author_last_name[]" required autocomplete="off">
                         </div>
                     </div>
                     <div class="col-md-2">
                         <div class="form-group">
                             <label for="author_suffix">Suffix:</label>
                             <div class="input-group">
                                 <select class="form-control" id="author_suffix" name="author_suffix[]">
                                     <option value="">None</option>
                                     <option value="Jr.">Jr.</option>
                                     <option value="Sr.">Sr.</option>
                                     <option value="III">III</option>
                                     <option value="IV">IV</option>
                                     <option value="V">V</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
                 
            <div class="card-footer" style="margin-top: 10px">
                <div class="float-right">
                    <button id="add-contributor-btn" class="btn btn-medium btn-primary">
                        <i class="bi bi-plus plus-icon"></i> Add
                    </button>                                          
                </div>
            </div>
            

            {{-- Step 3 --}}
             <div class="card-header bg-secondary text-white">More Information</div>
             <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adviser_position">Position:</label>
                                <input type="text" name="adviser_position" id="adviser_position" value="Adviser" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row form-adviser">
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <label for="adviser_first_name">First Name:</label>
                                <input type="text" class="form-control" id="adviser_first_name" name="adviser_first_name[]" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2 mt-2">
                            <div class="form-group">
                                <label for="adviser_mi_middle">Middle Initial:</label>
                                <input type="text" class="form-control" id="adviser_mi_middle" name="adviser_mi_middle[]" maxlength="1" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <label for="adviser_last_name">Last Name:</label>
                                <input type="text" class="form-control" id="adviser_last_name" name="adviser_last_name[]" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="adviser_suffix">Suffix:</label>
                                <div class="input-group">
                                    <select class="form-control" id="adviser_suffix" name="adviser_suffix[]">
                                        <option value="">None</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer" style="margin-top: 10px">
                    <div class="float-right">
                        <button id="add-adviser-btn" class="btn btn-medium btn-primary">
                            <i class="bi bi-plus plus-icon"></i> Add
                        </button>                                          
                    </div>
                </div>

                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="panel_position">Position:</label>
                                <input type="text" name="panel_position" id="panel_position" value="Panel" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row form-panel">
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <label for="panel_first_name">First Name:</label>
                                <input type="text" class="form-control" id="panel_first_name" name="panel_first_name[]" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2 mt-2">
                            <div class="form-group">
                                <label for="panel_mi_middle">Middle Initial:</label>
                                <input type="text" class="form-control" id="panel_mi_middle" name="panel_mi_middle[]" maxlength="1" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <label for="panel_last_name">Last Name:</label>
                                <input type="text" class="form-control" id="panel_last_name" name="panel_last_name[]" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="panel_suffix">Suffix:</label>
                                <div class="input-group">
                                    <select class="form-control" id="panel_suffix" name="panel_suffix[]">
                                        <option value="">None</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="card-footer" style="margin-top: 10px">
                    <div class="float-right">
                        <button id="add-panel-btn" class="btn btn-medium btn-primary">
                            <i class="bi bi-plus plus-icon"></i>Add
                        </button>                                          
                    </div>
                </div>


                {{-- STEP 4 --}}
                <div class="card-header bg-secondary text-white">Department</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input department-checkbox" type="radio" name="department" value="Accountancy Program">
                                    <label class="form-check-label">
                                        Accountancy Program (AP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input department-checkbox" type="radio" name="department" value="Arts and Science Program">
                                    <label class="form-check-label">
                                        Arts and Science Program (ASP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input department-checkbox" type="radio" name="department" value="Business Administrator Program">
                                    <label class="form-check-label">
                                        Business Administrator Program (BAP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input department-checkbox" type="radio" name="department" value="Computer Studies Program">
                                    <label class="form-check-label">
                                        Computer Studies Program (CSP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input department-checkbox" type="radio" name="department" value="Criminal Justice Education Program">
                                    <label class="form-check-label">
                                        Criminal Justice Education Program (CJEP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input department-checkbox" type="radio" name="department" value="Engineering and Technology Program">
                                    <label class="form-check-label">
                                        Engineering and Technology Program (ETP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input department-checkbox" type="radio" name="department" value="Teacher Education Program">
                                    <label class="form-check-label">
                                        Teacher Education Program (TEP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input department-checkbox" type="radio" name="department" value="Nursing Program">
                                    <label class="form-check-label">
                                        Nursing Program (NP)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>                

                {{-- STEP 5 --}}
                <div class="card-header bg-secondary text-white">Attachment</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere quasi aperiam, dolor magni doloremque quas fugit sint iure, corporis ex ducimus laboriosam illo et laudantium numquam, est corrupti porro aspernatur cupiditate nesciunt? Iste error alias quidem aperiam labore ducimus nobis, natus vitae. Aliquam, ipsa nesciunt! Neque enim rem distinctio nostrum.
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pdf_file">Upload PDF File</label>
                                <input type="file" class="form-control-file" id="pdf_file" name="pdf_file" accept=".pdf">
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="text-center mt-4" style="margin-left: 10px; margin-bottom: 10px; ">
                    <button class="btn btn-primary btn-md d-block" type="submit">
                      <i class="bi bi-save"></i>Save
                    </button>

                    @if (session('info'))
                    <script>
                        toastr.success('{{ session('info') }}');
                    </script>
                    @endif
                </div>
            </div>
    </form>
</div>

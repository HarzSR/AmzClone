@extends('admin.layouts.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(\Illuminate\Support\Facades\Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong> {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('neutral_message'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Notice: </strong> {{ \Illuminate\Support\Facades\Session::get('neutral_message') }}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success: </strong> {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong>
                            <br>
                            @foreach($errors->all() as $error)
                                &emsp; &#x2022; {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            @if($slug == 'personal')
                @if($userStatus == '')
                    <form action="{{ url('/admin/vendor-update/' . $slug) }}" method="POST" id="updateVendorDetails" name="updateVendorDetails" enctype="multipart/form-data">
                        @csrf
                @elseif($userStatus == 'disabled')
                    <form action="#">
                @endif
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-3">
                            <div class="card profile-card">
                                <div class="profile-header">&nbsp;</div>
                                <div class="profile-body">
                                    <div class="image-area">
                                        <img src="@if(!empty(Auth::guard('admin')->user()->image)  && file_exists(public_path('admin/images/vendor_images/' . Auth::guard('admin')->user()->image))) {{ asset('admin/images/vendor_images/' . Auth::guard('admin')->user()->image) }} @else ../../admin/images/user.png  @endif" alt="Vendor - Profile Image" width="128px" height="128px"/>
                                    </div>
                                    <div class="content-area">
                                        <h3>{{ ucwords($userDetails['name']) }}</h3>
                                        <p></p>
                                    </div>
                                    @if(!empty(Auth::guard('admin')->user()->image) && file_exists(public_path('admin/images/vendor_images/' . Auth::guard('admin')->user()->image)))
                                        <div class="btn-group-xs align-right">
                                            <button type="button" id="deleteVendor" name="deleteVendor" dataId="vendor-image" dataName="Vendor Image" slug="personal" class="btn bg-red waves-effect m-r-5 m-t-5">Delete</button>
                                        </div>
                                    @elseif(!empty(Auth::guard('admin')->user()->image))
                                        <div class="btn-group-xs align-right">
                                            <button type="button" id="deleteVendor" name="deleteVendor" dataId="vendor-image" dataName="Vendor Image" slug="personal" class="btn bg-red waves-effect m-r-5 m-t-5">Invalid Image for Admin. Suggest click here.</button>
                                        </div>
                                    @endif
                                </div>
                                @if($userStatus == '')
                                    <div class="profile-footer">
                                        <label for="vendorImage">Update Vendor Image</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" class="form-control" id="vendorImage" name="vendorImage" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="card">
                                <div class="header">
                                    <h2 style="display: inline-block;">
                                        UPDATE VENDOR DETAILS
                                    </h2>
                                    @if($userDetails['status'] == 1)
                                        <button class="btn btn-success waves-effect m-t--5" style="display: inline-block; float: right; pointer-events: none;">
                                            ACTIVE
                                        </button>
                                    @elseif($userDetails['status'] == 0)
                                        <button class="btn btn-danger waves-effect m-t--5" style="display: inline-block; float: right; pointer-events: none;">
                                            IN-ACTIVE
                                        </button>
                                    @else
                                        <button type="button" onclick="location.href='{{ url('admin/fix-vendor') }}';" class="btn btn-primary waves-effect m-t--5" style="display: inline-block; float: right;">
                                            UNKNOWN
                                        </button>
                                    @endif
                                </div>
                                <div class="body">
                                    <div class="col-md-3">
                                        <label>Vendor Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['name']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>User Type</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['type']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Vendor Email</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ $userDetails['email'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Vendor Number</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['mobile']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    @if($userStatus == 'disabled')
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    @endif
                                    @if($userStatus == '')
                                        <div class="col-md-4">
                                            <label>New Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" @if(!empty(old('name'))) value="{{ ucwords(old('name')) }}" @else value="{{ trim(ucwords($userDetails['name'])) }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>New Mobile</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="number" name="number" class="form-control" placeholder="Enter Mobile" @if(!empty(old('mobile'))) value="{{ ucwords(old('mobile')) }}" @else value="{{ trim(ucwords($userDetails['mobile'])) }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>New Country</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="country" name="country" data-live-search="true">
                                                        <option value="" disabled selected>Country</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Aland Islands">Aland Islands</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Curacao">Curacao</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernsey">Guernsey</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                        <option value="Kosovo">Kosovo</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montenegro">Montenegro</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                        <option value="Saint Helena">Saint Helena</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Martin">Saint Martin</option>
                                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Sint Maarten">Sint Maarten</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                        <option value="South Sudan">South Sudan</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Timor-Leste">Timor-Leste</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Viet Nam">Viet Nam</option>
                                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                        <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>New Address</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="address" name="address" class="form-control" placeholder="Enter Name" @if(!empty(old('name'))) value="{{ ucwords(old('name')) }}" @else value="{{ trim(ucwords($vendorDetails['address'])) }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>New City</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="city" name="city" class="form-control" placeholder="Enter Mobile" @if(!empty(old('mobile'))) value="{{ ucwords(old('mobile')) }}" @else value="{{ trim(ucwords($vendorDetails['city'])) }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>New State</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="state" name="state" class="form-control" placeholder="Enter Name" @if(!empty(old('name'))) value="{{ ucwords(old('name')) }}" @else value="{{ trim(ucwords($vendorDetails['state'])) }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>New Pincode</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter Mobile" @if(!empty(old('mobile'))) value="{{ ucwords(old('mobile')) }}" @else value="{{ trim($vendorDetails['pincode']) }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="password">Notes</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="description" id="note" name="note" class="form-control no-resize" placeholder="Enter Notes" @if(!empty(old('note'))) value="{{ ucwords(old('note')) }}" @else @if ($userDetails['notes'] != null) value="{{ trim(ucwords($userDetails['notes'])) }}" @endif @endif>
                                                </div>
                                                @if(!empty(Auth::guard('admin')->user()->notes))
                                                    <div class="btn-group-xs align-right">
                                                        <button type="button" id="deleteVendor" name="deleteVendor"  dataId="vendor-notes" dataName="Notes" slug="personal" class="btn bg-red waves-effect m-t-5">Delete</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect" id="detailUpdate" name="detailUpdate">UPDATE</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @elseif($slug == 'business')
                @if($businessStatus == '')
                    <form action="{{ url('/admin/vendor-update/' . $slug) }}" method="POST" id="updateVendorDetails" name="updateVendorDetails" enctype="multipart/form-data">
                        @csrf
                @elseif($businessStatus == 'disabled')
                    <form action="#">
                @endif
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-3">
                            <div class="card profile-card">
                                <div class="profile-header">&nbsp;</div>
                                <div class="profile-body">
                                    <div class="image-area">
                                        <img src="@if(!empty($vendorBusinessDetails['image'])  && file_exists(public_path('admin/images/business_images/' . $vendorBusinessDetails['image']))) {{ asset('admin/images/admin_images/' . $vendorBusinessDetails['image']) }} @else ../../admin/images/user.png  @endif" alt="AdminBSB - Business Image" width="128px" height="128px"/>
                                    </div>
                                    <div class="content-area">
                                        <h3>{{ ucwords($vendorBusinessDetails['shop_name']) }}</h3>
                                        <p></p>
                                    </div>
                                    @if(!empty($vendorBusinessDetails['image'])  && file_exists(public_path('admin/images/business_images/' . $vendorBusinessDetails['image'])))
                                        <div class="btn-group-xs align-right">
                                            <button type="button" id="deleteVendor" name="deleteVendor" dataId="vendor-image" dataName="Business Image" slug="business" class="btn bg-red waves-effect m-r-5 m-t-5">Delete</button>
                                        </div>
                                    @elseif(!empty($vendorBusinessDetails['image']))
                                        <div class="btn-group-xs align-right">
                                            <button type="button" id="deleteVendor" name="deleteVendor" dataId="vendor-image" dataName="Business Image" slug="business" class="btn bg-red waves-effect m-r-5 m-t-5">Invalid Image for Admin. Suggest click here.</button>
                                        </div>
                                    @endif
                                </div>
                                <div class="profile-footer">
                                    @if($businessStatus == '')
                                        <label for="businessImage">Update Business Image</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" class="form-control" id="businessImage" name="businessImage" accept="image/*">
                                            </div>
                                        </div>
                                    @endif
                                    <ul>
                                        <li>
                                            <span>{{ ucwords($vendorBusinessDetails['address_proof_document']) }}</span>
                                            <span><button type="button" data-toggle="modal" data-target="#viewAddressProof" class="btn bg-blue btn-xs waves-effect">View</button></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal fade" id="viewAddressProof" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header modal-col-blue">
                                                <h4 class="modal-title" id="viewAddressProof">{{ ucwords($vendorBusinessDetails['address_proof']) }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="../../admin/images/user.png" alt="AdminBSB - Proof Document" style="pointer-events: none"/>
                                            </div>
                                            <div class="modal-footer" >
                                                <button type="button" class="btn btn-link waves-effect bg-red" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="card">
                                <div class="header">
                                    <h2 style="display: inline-block;">
                                        UPDATE BUSINESS DETAILS
                                    </h2>
                                    @if($vendorBusinessDetails['status'] == 1)
                                        <button class="btn btn-success waves-effect m-t--5" style="display: inline-block; float: right; pointer-events: none;">
                                            ACTIVE
                                        </button>
                                    @elseif($vendorBusinessDetails['status'] == 0)
                                        <button class="btn btn-danger waves-effect m-t--5" style="display: inline-block; float: right; pointer-events: none;">
                                            IN-ACTIVE
                                        </button>
                                    @else
                                        <button type="button" onclick="location.href='{{ url('admin/fix-vendor') }}';" class="btn btn-primary waves-effect m-t--5" style="display: inline-block; float: right;">
                                            UNKNOWN
                                        </button>
                                    @endif
                                </div>
                                <div class="body">
                                    <div class="col-md-3">
                                        <label>Shop Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_name']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Shop Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_address']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Shop Area</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_area']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Shop City</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_city']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Shop Pincode / Zipcode</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_pincode']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Shop State</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_state']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Shop City</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_city']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Shop Email</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_email']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Shop Number</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_mobile']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Shop Email</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($vendorBusinessDetails['shop_website']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    @if($businessStatus == 'disabled')
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    @endif
                                    @if($businessStatus == '')
                                        <div class="col-md-6">
                                            <label for="password">New Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" @if(!empty(old('name'))) value="{{ ucwords(old('name')) }}" @else value="{{ trim(ucwords($userDetails['name'])) }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password">New Mobile</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="number" name="number" class="form-control" placeholder="Enter Mobile" @if(!empty(old('mobile'))) value="{{ ucwords(old('mobile')) }}" @else value="{{ trim(ucwords($userDetails['mobile'])) }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="password">Notes</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="description" id="note" name="note" class="form-control no-resize" placeholder="Enter Notes" @if(!empty(old('note'))) value="{{ ucwords(old('note')) }}" @else @if ($userDetails['notes'] != null) value="{{ trim(ucwords($userDetails['notes'])) }}" @endif @endif>
                                                </div>
                                                @if(!empty(Auth::guard('admin')->user()->notes))
                                                    <div class="btn-group-xs align-right">
                                                        <button type="button" id="deleteAdmin" name="deleteAdmin"  dataId="vendor-notes" dataName="Notes" class="btn bg-red waves-effect m-t-5">Delete</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect" id="detailUpdate" name="detailUpdate">UPDATE</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @elseif($slug == 'bank')
                @if($businessStatus == '')
                    <form action="{{ url('/admin/vendor-update/' . $slug) }}" method="POST" id="updateVendorDetails" name="updateVendorDetails">
                        @csrf
                @elseif($businessStatus == 'disabled')
                    <form action="#">
                @endif
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2 style="display: inline-block;">
                                        UPDATE BANK DETAILS
                                    </h2>
                                    @if($userDetails['status'] == 1)
                                        <button class="btn btn-success waves-effect m-t--5" style="display: inline-block; float: right; pointer-events: none;">
                                            ACTIVE
                                        </button>
                                    @elseif($userDetails['status'] == 0)
                                        <button class="btn btn-danger waves-effect m-t--5" style="display: inline-block; float: right; pointer-events: none;">
                                            IN-ACTIVE
                                        </button>
                                    @else
                                        <button type="button" onclick="location.href='{{ url('admin/fix-vendor') }}';" class="btn btn-primary waves-effect m-t--5" style="display: inline-block; float: right;">
                                            UNKNOWN
                                        </button>
                                    @endif
                                </div>
                                <div class="body">
                                    <div class="col-md-3">
                                        <label for="email_address">Admin Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['name']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email_address">Admin Type</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['type']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email_address">Admin Email</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ $userDetails['email'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email_address">Admin Number</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['mobile']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password">New Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" @if(!empty(old('name'))) value="{{ ucwords(old('name')) }}" @else value="{{ trim(ucwords($userDetails['name'])) }}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password">New Mobile</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="number" name="number" class="form-control" placeholder="Enter Mobile" @if(!empty(old('mobile'))) value="{{ ucwords(old('mobile')) }}" @else value="{{ trim(ucwords($userDetails['mobile'])) }}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="password">Notes</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="description" id="note" name="note" class="form-control no-resize" placeholder="Enter Notes" @if(!empty(old('note'))) value="{{ ucwords(old('note')) }}" @else @if ($userDetails['notes'] != null) value="{{ trim(ucwords($userDetails['notes'])) }}" @endif @endif>
                                            </div>
                                            @if(!empty(Auth::guard('admin')->user()->notes))
                                                <div class="btn-group-xs align-right">
                                                    <button type="button" id="deleteAdmin" name="deleteAdmin"  dataId="vendor-notes" dataName="Notes" slug="bank" class="btn bg-red waves-effect m-t-5">Delete</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect" id="detailUpdate" name="detailUpdate">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </section>

@endsection
